<?php

namespace App\Http\Controllers\masterData;

use App\Http\Controllers\Controller;
use App\Models\SumberDana;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Yajra\DataTables\Facades\DataTables;

class SumberDanaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = SumberDana::orderBy('created_at', 'desc')->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $actionBtn = '<button id="btn-edit" class="btn btn-warning btn-rounded btn-sm mr-1" value="' . $row->id . '" ><i class="fas fa-edit"></i></button><button id="btn-delete" class="btn btn-danger btn-rounded btn-sm mr-1" value="' . $row->id . '" > <i class="fas fa-trash-alt"></i></button>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('dashboard.pages.masterData.sumberDana.index');
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
                'nama' => ['required', Rule::unique('sumber_dana')->withoutTrashed()],
            ],
            [
                'nama.required' => 'Sumber dana tidak boleh kosong',
                'nama.unique' => 'Sumber dana sudah ada',
            ]
        );

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()]);
        }

        $sumberDana = new SumberDana();
        $sumberDana->nama = $request->nama;
        $sumberDana->save();

        return response()->json(['status' => 'success']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SumberDana  $sumberDana
     * @return \Illuminate\Http\Response
     */
    public function show(SumberDana $sumberDana)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SumberDana  $sumberDana
     * @return \Illuminate\Http\Response
     */
    public function edit(SumberDana $sumberDana)
    {
        return response()->json($sumberDana);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SumberDana  $sumberDana
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SumberDana $sumberDana)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'nama' => ['required', Rule::unique('sumber_dana')->ignore($sumberDana->id)->withoutTrashed()],
            ],
            [
                'nama.required' => 'Sumber dana tidak boleh kosong',
                'nama.unique' => 'Sumber dana sudah ada',
            ]
        );

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()]);
        }

        $sumberDana->nama = $request->nama;
        $sumberDana->save();

        return response()->json(['status' => 'success']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SumberDana  $sumberDana
     * @return \Illuminate\Http\Response
     */
    public function destroy(SumberDana $sumberDana)
    {
        $sumberDana->delete();

        return response()->json(['status' => 'success']);
    }
}
