<?php

namespace App\Http\Controllers\masterData\wilayah;

use App\Http\Controllers\Controller;
use App\Models\Desa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Facades\Excel;
use Yajra\DataTables\Facades\DataTables;

class DesaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $kecamatanId = $request->kecamatan;
        if ($request->ajax()) {
            $data = Desa::orderBy('nama', 'asc')->where('kecamatan_id', $kecamatanId)->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $actionBtn = '<a href="' . url('master-data/wilayah/kecamatan' . '/' . $row->id . '/edit') . '" class="btn btn-warning btn-round btn-sm mr-1" value="' . $row->id . '"><i class="fa fa-edit"></i></a><button id="btn-delete" class="btn btn-danger btn-round btn-sm mr-1" value="' . $row->id . '" ><i class="fa fa-trash"></i></button>';
                    return $actionBtn;
                })
                ->addColumn('luas', function ($row) {
                    return $row->luas . " Km<sup>2</sup>";
                })
                ->addColumn('statusPolygon', function ($row) {
                    if ($row->polygon) {
                        return '<span class="badge bg-success text-light border-0">Ada</span>';
                    } else {
                        return '<span class="badge bg-danger text-light border-0">Tidak Ada</span>';
                    }
                })
                ->addColumn('warnaPolygon', function ($row) {
                    if ($row->warna_polygon) {
                        return '<input type="color" id="favcolor" name="favcolor" value="' . $row->warna_polygon . '" disabled>';
                    } else {
                        return '<span class="badge bg-danger text-light">Tidak Ada</span>';
                    }
                })
                ->rawColumns(['action', 'statusPolygon', 'warnaPolygon', 'luas'])
                ->make(true);
        }

        return view('dashboard.pages.masterData.wilayah.desa.index', compact('kecamatanId'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Desa  $desa
     * @return \Illuminate\Http\Response
     */
    public function show(Desa $desa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Desa  $desa
     * @return \Illuminate\Http\Response
     */
    public function edit(Desa $desa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Desa  $desa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Desa $desa)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Desa  $desa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Desa $desa)
    {
        //
    }

    public function getMapData(Request $request)
    {
        if ($request->id) {
            $desa = Desa::find($request->id);
        } else {
            $desa = Desa::whereNotNull('polygon')->where(function ($query) use ($request) {
                if ($request->kecamatanId) {
                    $query->where('kecamatan_id', '=', $request->kecamatanId);
                }
            })->orderBy('id', 'desc')->get();
        }

        if ($desa) {
            return response()->json(['status' => 'success', 'data' => $desa, 'kecamatan' => $request->kecamatanId]);
        } else {
            return response()->json(['status' => 'error']);
        }
    }
}
