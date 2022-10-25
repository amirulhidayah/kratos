<?php

namespace App\Http\Controllers\masterData;

use App\Http\Controllers\Controller;
use App\Models\Puskesmas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Yajra\DataTables\Facades\DataTables;

class PuskesmasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Puskesmas::orderBy('created_at', 'desc')->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $actionBtn = '<a href="' . url('master-data/posyandu' . '/' . $row->id) . '" class="btn btn-success btn-round btn-sm mr-1" value="' . $row->id . '"><i class="fa fa-eye"></i></a><a id="btn-edit" class="btn btn-warning btn-rounded btn-sm mr-1" href="' . url('master-data/puskesmas/' . $row->id . '/edit')  . '" ><i class="fas fa-edit"></i></a><button id="btn-delete" class="btn btn-danger btn-rounded btn-sm mr-1" value="' . $row->id . '" > <i class="fas fa-trash-alt"></i></button>';
                    return $actionBtn;
                })
                ->addColumn('kecamatan', function ($row) {
                    return $row->kecamatan->nama;
                })
                ->rawColumns(['action', 'nama', 'kecamatan'])
                ->make(true);
        }

        return view('dashboard.pages.masterData.puskesmas.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('dashboard.pages.masterData.puskesmas.create');
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
                'nama' => 'required',
                'kecamatan_id' => 'required'
            ],
            [
                'nama.required' => 'Nama tidak boleh kosong',
                'kecamatan_id.required' => 'Kecamatan tidak boleh kosong',
            ]
        );

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()]);
        }

        $puskesmas = new Puskesmas();
        $puskesmas->nama = $request->nama;
        $puskesmas->kecamatan_id = $request->kecamatan_id;
        $puskesmas->save();


        return response()->json(['status' => 'success']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Puskesmas  $puskesmas
     * @return \Illuminate\Http\Response
     */
    public function show(Puskesmas $puskesmas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Puskesmas  $puskesmas
     * @return \Illuminate\Http\Response
     */
    public function edit(Puskesmas $puskesmas)
    {
        return view('dashboard.pages.masterData.puskesmas.edit', compact(['puskesmas']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Puskesmas  $puskesmas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Puskesmas $puskesmas)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'nama' => 'required',
                'kecamatan_id' => 'required',
            ],
            [
                'nama.required' => 'Nama tidak boleh kosong',
                'kecamatan_id.required' => 'Kecamatan tidak boleh kosong',
            ]
        );

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()]);
        }

        $puskesmas->nama = $request->nama;
        $puskesmas->kecamatan_id = $request->kecamatan_id;
        $puskesmas->save();


        return response()->json(['status' => 'success']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Puskesmas  $puskesmas
     * @return \Illuminate\Http\Response
     */
    public function destroy(Puskesmas $puskesmas)
    {
        $puskesmas->delete();
        $puskesmas->posyandu()->delete();

        return response()->json(['status' => 'success']);
    }
}
