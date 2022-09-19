<?php

namespace App\Http\Controllers\masterData\lokasi;

use App\Exports\DesaExport;
use App\Http\Controllers\Controller;
use App\Models\Desa;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Facades\Excel;

class LokasiDesaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Desa::orderBy('nama', 'asc')->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $actionBtn = '<a href="' . url('master-data/lokasi/desa' . '/' . $row->id . '/edit') . '" class="btn btn-warning btn-round btn-sm mr-1" value="' . $row->id . '"><i class="fa fa-edit"></i></a><button id="btn-delete" class="btn btn-danger btn-round btn-sm mr-1" value="' . $row->id . '" ><i class="fa fa-trash"></i></button>';
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

        return view('dashboard.pages.masterData.lokasi.desa.index');
    }

    public function tabel(Request $request)
    {
        if ($request->ajax()) {
            $data = Desa::orderBy('nama', 'asc')->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $actionBtn = '<a href="' . url('master-data/lokasi/desa' . '/' . $row->id . '/edit') . '" class="btn btn-warning btn-round btn-sm mr-1" value="' . $row->id . '"><i class="fa fa-edit"></i></a><button id="btn-delete" class="btn btn-danger btn-round btn-sm mr-1" value="' . $row->id . '" ><i class="fa fa-trash"></i></button>';
                    return $actionBtn;
                })
                ->addColumn('luas', function ($row) {
                    return $row->luas . " m<sup>2</sup>";
                })
                ->addColumn('statusPolygon', function ($row) {
                    if ($row->polygon) {
                        return '<span class="badge bg-success text-light border-none">Ada</span>';
                    } else {
                        return '<span class="badge bg-danger text-light border-none">Tidak Ada</span>';
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

        return view('dashboard.pages.masterData.lokasi.desa.tabel');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.pages.masterData.lokasi.desa.create');
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
                'nama' => ['required', Rule::unique('desa')->withoutTrashed()],
                'kode' => ['required', Rule::unique('desa')->withoutTrashed()],
                'polygon' => 'required',
                'luas' => 'required',
                'warna_polygon' => ['required', Rule::unique('desa')->withoutTrashed()],
            ],
            [
                'nama.required' => 'Nama Desa tidak boleh kosong',
                'kode.required' => 'Kode tidak boleh kosong',
                'nama.unique' => 'Nama Desa sudah ada',
                'kode.unique' => 'Kode sudah ada',
                'luas.required' => 'Luas wilayah tidak boleh kosong',
                'polygon.required' => 'Polygon tidak boleh kosong',
                'warna_polygon.required' => 'Warna tidak boleh kosong',
                'warna_polygon.unique' => 'Warna sudah ada',
            ]
        );

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()]);
        }

        $desa = new Desa();
        $desa->nama = $request->nama;
        $desa->kode = $request->kode;
        $desa->luas = $request->luas;
        $desa->polygon = $request->polygon;
        $desa->warna_polygon = $request->warna_polygon;
        $desa->save();

        return response()->json(['status' => 'success']);
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
        return view('dashboard.pages.masterData.lokasi.desa.edit', compact(['desa']));
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
        $validator = Validator::make(
            $request->all(),
            [
                'nama' => ['required', Rule::unique('desa')->ignore($desa->id)->withoutTrashed()],
                'kode' => ['required', Rule::unique('desa')->ignore($desa->id)->withoutTrashed()],
                'polygon' => 'required',
                'luas' => 'required',
                'warna_polygon' => ['required', Rule::unique('desa')->ignore($desa->id)->withoutTrashed()],
            ],
            [
                'nama.required' => 'Nama Desa tidak boleh kosong',
                'nama.unique' => 'Nama Desa sudah ada',
                'kode.required' => 'Kode tidak boleh kosong',
                'kode.unique' => 'Kode sudah ada',
                'luas.required' => 'Luas Desa tidak boleh kosong',
                'polygon.required' => 'Polygon tidak boleh kosong',
                'warna_polygon.required' => 'Warna tidak boleh kosong',
                'warna_polygon.unique' => 'Warna sudah ada',
            ]
        );

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()]);
        }

        $desa->nama = $request->nama;
        $desa->kode = $request->kode;
        $desa->luas = $request->luas;
        $desa->polygon = $request->polygon;
        $desa->warna_polygon = $request->warna_polygon;
        $desa->save();

        return response()->json(['status' => 'success']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Desa  $desa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Desa $desa)
    {
        $desa->delete();

        return response()->json(['status' => 'success']);
    }

    public function getMapData(Request $request)
    {
        if ($request->id) {
            $desa = Desa::find($request->id);
        } else {
            $desa = Desa::whereNotNull('polygon')->where(function ($query) use ($request) {
                if ($request->desaId) {
                    $query->where('id', '==', $request->desaId);
                }
            })->orderBy('id', 'desc')->get();
        }

        if ($desa) {
            return response()->json(['status' => 'success', 'data' => $desa]);
        } else {
            return response()->json(['status' => 'error']);
        }
    }

    public function export()
    {
        $daftarDesa = Desa::orderBy('nama', 'asc')->get();
        $tanggal = Carbon::parse(Carbon::now())->translatedFormat('d F Y');

        return Excel::download(new DesaExport($daftarDesa), "Export Data Desa-" . $tanggal . "-" . rand(1, 9999) . '.xlsx');
    }
}
