<?php

namespace App\Http\Controllers\masterData\lokasi;

use App\Exports\DemografiLokasiKeongExport;
use App\Exports\LokasiKeongExport;
use App\Http\Controllers\Controller;
use App\Models\Desa;
use App\Models\LokasiKeong;
use App\Models\PemilikLokasiKeong;
use App\Models\Penduduk;
use App\Policies\KeongPolicy;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Facades\Excel;

class LokasiKeongController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = LokasiKeong::orderBy('created_at', 'desc')->where(function ($query) use ($request) {
                if ($request->desa_id && $request->desa_id != "semua") {
                    $query->where('desa_id', $request->desa_id);
                }

                if ($request->search) {
                    $query->where('nama', 'like', '%' . $request->search . '%');
                }
            })->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('desa', function ($row) {
                    return $row->desa->nama;
                })
                ->addColumn('status', function ($row) {
                    if ($row->status == 1) {
                        return '<span class="badge bg-success text-light border-0">Aktif</span>';
                    } else {
                        return '<span class="badge bg-danger text-light border-0">Tidak Aktif</span>';
                    }
                })
                ->addColumn('koordinat', function ($row) {
                    return $row->latitude . ' / ' . $row->longitude;
                })
                ->addColumn('pemilik', function ($row) {
                    $pemilikKeong = '';
                    if (count($row->pemilikLokasiKeong) > 0) {
                        foreach ($row->pemilikLokasiKeong as $pemilik) {
                            $pemilikKeong .= '<p class="my-0"> -' . $pemilik->penduduk->nama . '</p>';
                        }
                        return $pemilikKeong;
                    } else {
                        return '-';
                    }
                })
                ->addColumn('action', function ($row) {
                    $actionBtn = '<a href="' . url('master-data/lokasi/keong' . '/' . $row->id . '/edit') . '" class="btn btn-warning btn-round btn-sm mr-1" value="' . $row->id . '"><i class="fa fa-edit"></i></a><button id="btn-delete" class="btn btn-danger btn-round btn-sm mr-1" value="' . $row->id . '" ><i class="fa fa-trash"></i></button>';
                    return $actionBtn;
                })
                ->rawColumns(['action', 'status', 'warnaPolygon', 'luas', 'koordinat', 'pemilik'])
                ->make(true);
        }

        $daftarDesa = Desa::orderBy('nama', 'asc')->get();

        return view('dashboard.pages.masterData.lokasi.keong.index', compact(['daftarDesa']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $daftarDesa = Desa::with(['penduduk'])->orderBy('nama', 'asc')->get();
        return view('dashboard.pages.masterData.lokasi.keong.create', compact(['daftarDesa']));
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
                'deskripsi' => 'required',
                'desa_id' => 'required',
                'latitude' => 'required',
                'longitude' => 'required',
                'status' => 'required',
            ],
            [
                'nama.required' => 'Nama Lokasi tidak boleh kosong',
                'deskripsi.required' => 'Deskripsi lokasi tidak boleh kosong',
                'desa_id.required' => 'Desa tidak boleh kosong',
                'latitude.required' => 'Latitude tidak boleh kosong',
                'longitude.required' => 'Longitude tidak boleh kosong',
                'status.required' => 'Status tidak boleh kosong',
            ]
        );

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()]);
        }

        $lokasiKeong = new LokasiKeong();
        $lokasiKeong->nama = $request->nama;
        $lokasiKeong->deskripsi = $request->deskripsi;
        $lokasiKeong->desa_id = $request->desa_id;
        $lokasiKeong->latitude = $request->latitude;
        $lokasiKeong->longitude = $request->longitude;
        $lokasiKeong->status = $request->status;
        $lokasiKeong->save();

        if ($request->penduduk_id) {
            for ($i = 0; $i < count($request->penduduk_id); $i++) {
                $pemilikLokasiKeong = new PemilikLokasiKeong();
                $pemilikLokasiKeong->lokasi_keong_id = $lokasiKeong->id;
                $pemilikLokasiKeong->penduduk_id = $request->penduduk_id[$i];
                $pemilikLokasiKeong->save();
            }
        }


        return response()->json(['status' => 'success']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\LokasiKeong  $lokasiKeong
     * @return \Illuminate\Http\Response
     */
    public function show(LokasiKeong $lokasiKeong)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\LokasiKeong  $lokasiKeong
     * @return \Illuminate\Http\Response
     */
    public function edit(LokasiKeong $lokasiKeong)
    {
        $arrPemilik = $lokasiKeong->pemilikLokasiKeong->pluck('penduduk_id')->toArray();
        $arrPendudukHapus = Penduduk::whereIn('id', $arrPemilik)->onlyTrashed()->get()->toArray();

        $id = $lokasiKeong->desa_id;
        $daftarDesa = Desa::orderBy('nama', 'asc')->get();

        if ($id) {
            $desaHapus = Desa::where('id', $id)->withTrashed()->first();
            if ($desaHapus->trashed()) {
                $daftarDesa->push($desaHapus);
            }
        }
        return view('dashboard.pages.masterData.lokasi.keong.edit', compact(['daftarDesa', 'lokasiKeong', 'arrPendudukHapus']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\LokasiKeong  $lokasiKeong
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, LokasiKeong $lokasiKeong)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'nama' => 'required',
                'deskripsi' => 'required',
                'desa_id' => 'required',
                'latitude' => 'required',
                'longitude' => 'required',
                'status' => 'required',
            ],
            [
                'nama.required' => 'Nama Lokasi tidak boleh kosong',
                'deskripsi.required' => 'Deskripsi lokasi tidak boleh kosong',
                'desa_id.required' => 'Desa tidak boleh kosong',
                'latitude.required' => 'Latitude tidak boleh kosong',
                'longitude.required' => 'Longitude tidak boleh kosong',
                'status.required' => 'Status tidak boleh kosong',
            ]
        );

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()]);
        }

        $lokasiKeong->nama = $request->nama;
        $lokasiKeong->deskripsi = $request->deskripsi;
        $lokasiKeong->desa_id = $request->desa_id;
        $lokasiKeong->latitude = $request->latitude;
        $lokasiKeong->longitude = $request->longitude;
        $lokasiKeong->status = $request->status;
        $lokasiKeong->save();

        if ($request->penduduk_id) {
            $pemilikLokasi = PemilikLokasiKeong::where('lokasi_keong_id', $lokasiKeong->id)->whereNotIn('penduduk_id', $request->penduduk_id)->forceDelete();
            for ($i = 0; $i < count($request->penduduk_id); $i++) {
                $pemilikLokasi = PemilikLokasiKeong::updateOrCreate(
                    ['lokasi_keong_id' => $lokasiKeong->id, 'penduduk_id' => $request->penduduk_id[$i]],
                    []
                );
            }
        }

        return response()->json(['status' => 'success']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LokasiKeong  $lokasiKeong
     * @return \Illuminate\Http\Response
     */
    public function destroy(LokasiKeong $lokasiKeong)
    {
        $lokasiKeong->delete();
        $lokasiKeong->pemilikLokasiKeong()->delete();

        return response()->json(['status' => 'success']);
    }

    public function getMapData(Request $request)
    {
        if ($request->id) {
            $keong = LokasiKeong::with(['desa', 'pemilikLokasiKeong', 'pemilikLokasiKeong.penduduk'])->find($request->id);
        } else {
            $keong = LokasiKeong::with(['desa', 'pemilikLokasiKeong', 'pemilikLokasiKeong.penduduk'])->orderBy('id', 'desc')->get();
        }

        if ($keong) {
            return response()->json(['status' => 'success', 'data' => $keong]);
        } else {
            return response()->json(['status' => 'error']);
        }
    }

    public function export(Request $request)
    {
        $lokasiKeong = LokasiKeong::orderBy('created_at', 'desc')->where(function ($query) use ($request) {
            if ($request->desa_id && $request->desa_id != "semua") {
                $query->where('desa_id', $request->desa_id);
            }
        })->get();
        $tanggal = Carbon::parse(Carbon::now())->translatedFormat('d F Y');

        return Excel::download(new LokasiKeongExport($lokasiKeong), "Export Data Lokasi Keong-" . $tanggal . "-" . rand(1, 9999) . '.xlsx');
    }

    public function exportDemografi()
    {
        $daftarDesa = Desa::orderBy('nama', 'asc')->get();
        $tanggal = Carbon::parse(Carbon::now())->translatedFormat('d F Y');

        return Excel::download(new DemografiLokasiKeongExport($daftarDesa), "Export Data Demografi Lokasi Keong-" . $tanggal . "-" . rand(1, 9999) . '.xlsx');
    }
}
