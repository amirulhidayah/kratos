<?php

namespace App\Http\Controllers\masterData;

use App\Http\Controllers\Controller;
use App\Models\Posyandu;
use App\Models\Puskesmas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Yajra\DataTables\Facades\DataTables;

class PosyanduController extends Controller
{
    public function __construct(Request $request)
    {
        $puskesmas = Puskesmas::where('id', $request->puskesmas)->first();
        if ($puskesmas == null) {
            return redirect(url('master-data/puskesmas'))->send();
        }
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $puskesmas = Puskesmas::where('id', $request->puskesmas)->first();
        if ($request->ajax()) {
            $data = Posyandu::orderBy('created_at', 'desc')->where('puskesmas_id', $request->puskesmas)->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $actionBtn = '<a id="btn-edit" class="btn btn-warning btn-rounded btn-sm mr-1" href="' . url('master-data/posyandu/' . $row->puskesmas_id . '/' . $row->id . '/edit')  . '" ><i class="fas fa-edit"></i></a><button id="btn-delete" class="btn btn-danger btn-rounded btn-sm mr-1" value="' . $row->id . '" > <i class="fas fa-trash-alt"></i></button>';
                    return $actionBtn;
                })
                ->addColumn('desa', function ($row) {
                    return $row->desa->nama;
                })
                ->rawColumns(['action', 'nama', 'desa'])
                ->make(true);
        }

        return view('dashboard.pages.masterData.posyandu.index', compact(['puskesmas']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $puskesmas = Puskesmas::where('id', $request->puskesmas)->first();
        return view('dashboard.pages.masterData.posyandu.create', compact(['puskesmas']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $puskesmas = Puskesmas::where('id', $request->puskesmas)->first();
        $validator = Validator::make(
            $request->all(),
            [
                'nama' => 'required',
                'desa_id' => 'required'
            ],
            [
                'nama.required' => 'Nama tidak boleh kosong',
                'desa_id.required' => 'Desa tidak boleh kosong',
            ]
        );

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()]);
        }

        $posyandu = new Posyandu();
        $posyandu->nama = $request->nama;
        $posyandu->puskesmas_id = $puskesmas->id;
        $posyandu->desa_id = $request->desa_id;
        $posyandu->save();


        return response()->json(['status' => 'success']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Posyandu  $posyandu
     * @return \Illuminate\Http\Response
     */
    public function show(Posyandu $posyandu)
    {
        //
    }

    /**p
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Posyandu  $posyandu
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $puskesmas = Puskesmas::where('id', $request->puskesmas)->first();
        $posyandu = Posyandu::where('id', $request->posyandu)->first();

        if ($puskesmas == null || $posyandu == null) {
            return redirect()->back();
        }

        return view('dashboard.pages.masterData.posyandu.edit', compact(['puskesmas', 'posyandu']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Posyandu  $posyandu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $puskesmas = Puskesmas::where('id', $request->puskesmas)->first();
        $validator = Validator::make(
            $request->all(),
            [
                'nama' => 'required',
                'desa_id' => 'required'
            ],
            [
                'nama.required' => 'Nama tidak boleh kosong',
                'desa_id.required' => 'Desa tidak boleh kosong',
            ]
        );

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()]);
        }

        $posyandu = Posyandu::where('id', $request->posyandu)->first();
        $posyandu->nama = $request->nama;
        $posyandu->puskesmas_id = $puskesmas->id;
        $posyandu->desa_id = $request->desa_id;
        $posyandu->save();


        return response()->json(['status' => 'success']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Posyandu  $posyandu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $posyandu = Posyandu::where('id', $request->posyandu)->first();
        $posyandu->delete();

        return response()->json(['status' => 'success']);
    }
}
