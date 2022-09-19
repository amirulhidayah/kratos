<?php

namespace App\Http\Controllers\masterData;

use App\Http\Controllers\Controller;
use App\Models\Hewan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Yajra\DataTables\Facades\DataTables;

class HewanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Hewan::orderBy('created_at', 'desc')->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $actionBtn = '<button id="btn-edit" class="btn btn-warning btn-rounded btn-sm mr-1" value="' . $row->id . '" ><i class="fas fa-edit"></i></button><button id="btn-delete" class="btn btn-danger btn-rounded btn-sm mr-1" value="' . $row->id . '" > <i class="fas fa-trash-alt"></i></button>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('dashboard.pages.masterData.hewan.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
                'nama' => ['required', Rule::unique('hewan')->withoutTrashed()],
            ],
            [
                'nama.required' => 'Nama Hewan tidak boleh kosong',
                'nama.unique' => 'Nama Hewan sudah ada',
            ]
        );

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()]);
        }

        $hewan = new Hewan();
        $hewan->nama = $request->nama;
        $hewan->save();

        return response()->json(['status' => 'success']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Hewan  $hewan
     * @return \Illuminate\Http\Response
     */
    public function show(Hewan $hewan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Hewan  $hewan
     * @return \Illuminate\Http\Response
     */
    public function edit(Hewan $hewan)
    {
        return response()->json($hewan);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Hewan  $hewan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Hewan $hewan)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'nama' => ['required', Rule::unique('hewan')->ignore($hewan->id)->withoutTrashed()],
            ],
            [
                'nama.required' => 'Nama Hewan tidak boleh kosong',
                'nama.unique' => 'Nama Hewan sudah ada',
            ]
        );

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()]);
        }

        $hewan->nama = $request->nama;
        $hewan->save();

        return response()->json(['status' => 'success']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Hewan  $hewan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Hewan $hewan)
    {
        $hewan->delete();

        return response()->json(['status' => 'success']);
    }
}
