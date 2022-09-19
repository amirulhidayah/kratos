<?php

namespace App\Http\Controllers\masterData;

use App\Models\OPD;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Yajra\DataTables\Facades\DataTables;

class OPDController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = OPD::orderBy('created_at', 'desc')->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $actionBtn = '<button id="btn-edit" class="btn btn-warning btn-rounded btn-sm mr-1" value="' . $row->id . '" ><i class="fas fa-edit"></i></button><button id="btn-delete" class="btn btn-danger btn-rounded btn-sm mr-1" value="' . $row->id . '" > <i class="fas fa-trash-alt"></i></button>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('dashboard.pages.masterData.opd.index');
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
     * @param  \App\Http\Requests\StoreOPDRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'nama' => ['required', Rule::unique('opd')->withoutTrashed()],
            ],
            [
                'nama.required' => 'Nama OPD tidak boleh kosong',
                'nama.unique' => 'Nama OPD sudah ada',
            ]
        );

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()]);
        }

        $opd = new OPD();
        $opd->nama = $request->nama;
        $opd->save();

        return response()->json(['status' => 'success']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\OPD  $oPD
     * @return \Illuminate\Http\Response
     */
    public function show(OPD $opd)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\OPD  $oPD
     * @return \Illuminate\Http\Response
     */
    public function edit(OPD $opd)
    {
        return response()->json($opd);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateOPDRequest  $request
     * @param  \App\Models\OPD  $oPD
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, OPD $opd)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'nama' => ['required', Rule::unique('opd')->ignore($opd->id)->withoutTrashed()],
            ],
            [
                'nama.required' => 'Nama OPD tidak boleh kosong',
                'nama.unique' => 'Nama OPD sudah ada',
            ]
        );

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()]);
        }

        $opd->nama = $request->nama;
        $opd->save();

        return response()->json(['status' => 'success']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\OPD  $oPD
     * @return \Illuminate\Http\Response
     */
    public function destroy(OPD $opd)
    {
        $opd->delete();

        return response()->json(['status' => 'success']);
    }
}
