<?php

namespace App\Http\Controllers\masterData;

use App\Http\Controllers\Controller;
use App\Models\OPD;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Yajra\DataTables\Facades\DataTables;

class AkunController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = User::orderBy('created_at', 'desc')->where(function ($query) use ($request) {
                if ($request->opd_id && $request->opd_id != "semua") {
                    $query->where('opd_id', $request->opd_id);
                }

                if ($request->role && $request->role != "semua") {
                    $query->where('role', $request->role);
                }

                if ($request->status && $request->status != "semua") {
                    $query->where('status', $request->status);
                }

                if ($request->search) {
                    $query->where('nama', 'like', '%' . $request->search . '%');
                    $query->orWhere('username', 'like', '%' . $request->search . '%');
                }
            })->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('nama', function ($row) {
                    if ($row->role == "Admin" ||  $row->role == "Pimpinan") {
                        return $row->nama;
                    } else {
                        return $row->opd->nama;
                    }
                })
                ->addColumn('opd', function ($row) {
                    return $row->opd->nama ?? '-';
                })
                ->addColumn('status', function ($row) {
                    $status = '';
                    if ($row->status == 1) {
                        $status = '<span class="badge bg-success border-0 text-light">Aktif</span>';
                    } else {
                        $status = '<span class="badge bg-danger border-0 text-light">Tidak Aktif</span>';
                    }
                    return $status;
                })
                ->addColumn('action', function ($row) {
                    $actionBtn = '<a id="btn-edit" class="btn btn-warning btn-rounded btn-sm mr-1" href="' . url('master-data/akun/' . $row->id . '/edit') . '"><i class="fas fa-edit"></i></a>';

                    if (Auth::user()->id != $row->id) {
                        $actionBtn .= '<button id="btn-delete" class="btn btn-danger btn-rounded btn-sm mr-1" value="' . $row->id . '" > <i class="fas fa-trash-alt"></i></button>';
                    }
                    return $actionBtn;
                })
                ->rawColumns(['action', 'status'])
                ->make(true);
        }

        $daftarOpd = OPD::orderBy('nama', 'asc')->get();
        return view('dashboard.pages.masterData.akun.index', compact(['daftarOpd']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $daftarOpd = OPD::orderBy('nama', 'asc')->get();
        return view('dashboard.pages.masterData.akun.create', compact(['daftarOpd']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'username' => ['required', Rule::unique('users')->withoutTrashed()],
                'nama' => $request->role == "Admin" || $request->role == "Pimpinan" ? 'required' : 'nullable',
                'password' => 'required',
                'opd_id' => $request->role == "Admin" || $request->role == "Pimpinan" ? 'nullable' : 'required',
                'role' => 'required',
                'status' => 'required'
            ],
            [
                'username.required' => 'Username tidak boleh kosong',
                'username.unique' => 'Username sudah ada',
                'nama.required' => 'Nama tidak boleh kosong',
                'password.required' => 'Password tidak boleh kosong',
                'opd_id.required' => 'OPD tidak boleh kosong',
                'role.required' => 'Role tidak boleh kosong',
                'status.required' => 'Status tidak boleh kosong',
            ]
        );

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()]);
        }

        $user = new User();
        $user->username = $request->username;
        $user->password = Hash::make($request->password);
        $user->role = $request->role;
        $user->status = $request->status;

        if ($request->role == "Admin" || $request->role == "Pimpinan") {
            $user->nama = $request->nama;
            $user->opd_id = null;
        } else {
            $user->opd_id = $request->opd_id;
            $user->nama = null;
        }

        $user->save();

        return response()->json(['status' => 'success']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $id = $user->opd_id;
        $daftarOpd = OPD::orderBy('nama', 'asc')->get();

        if ($id) {
            $opdHapus = OPD::where('id', $id)->withTrashed()->first();
            if ($opdHapus->trashed()) {
                $daftarOpd->push($opdHapus);
            }
        }
        return view('dashboard.pages.masterData.akun.edit', compact(['daftarOpd', 'user']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'username' => ['required', Rule::unique('users')->ignore($user->id)->withoutTrashed()],
                'nama' => $request->role == "Admin" || $request->role == "Pimpinan" ? 'required' : 'nullable',
                'opd_id' => $request->role == "Admin" || $request->role == "Pimpinan" ? 'nullable' : 'required',
                'role' => 'required',
                'status' => 'required'
            ],
            [
                'username.required' => 'Username tidak boleh kosong',
                'username.unique' => 'Username sudah ada',
                'nama.required' => 'Nama tidak boleh kosong',
                'opd_id.required' => 'OPD tidak boleh kosong',
                'role.required' => 'Role tidak boleh kosong',
                'status.required' => 'Status tidak boleh kosong',
            ]
        );

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()]);
        }

        if ($request->password) {
            $user->password = Hash::make($request->password);
        }
        $user->username = $request->username;
        $user->role = $request->role;
        $user->status = $request->status;
        if ($request->role == "Admin" || $request->role == "Pimpinan") {
            $user->nama = $request->nama;
            $user->opd_id = null;
        } else {
            $user->opd_id = $request->opd_id;
            $user->nama = null;
        }
        $user->save();

        return response()->json(['status' => 'success']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();

        return response()->json(['status' => 'success']);
    }
}
