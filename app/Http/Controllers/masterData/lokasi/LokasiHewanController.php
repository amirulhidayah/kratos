<?php

namespace App\Http\Controllers\masterData\lokasi;

use App\Exports\DemografiLokasiHewanExport;
use App\Exports\LokasiHewanExport;
use App\Http\Controllers\Controller;
use App\Models\Desa;
use App\Models\Hewan;
use App\Models\JumlahHewan;
use App\Models\LokasiHewan;
use App\Models\PemilikLokasiHewan;
use App\Models\Penduduk;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;
use stdClass;

class LokasiHewanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = LokasiHewan::orderBy('created_at', 'desc')->where(function ($query) use ($request) {
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
                ->addColumn('jumlah_hewan', function ($row) {
                    $jumlah_hewan = '';
                    if (count($row->jumlahHewan) > 0) {
                        foreach ($row->jumlahHewan as $jumlah) {
                            $jumlah_hewan .= '<p class="my-0"> -' . $jumlah->hewan->nama . ' : ' . $jumlah->jumlah . '</p>';
                        }
                        return $jumlah_hewan;
                    } else {
                        return '-';
                    }
                })
                ->addColumn('pemilik', function ($row) {
                    $pemilikHewan = '';
                    if (count($row->pemilikLokasiHewan) > 0) {
                        foreach ($row->pemilikLokasiHewan as $pemilik) {
                            $pemilikHewan .= '<p class="my-0"> -' . $pemilik->penduduk->nama . '</p>';
                        }
                        return $pemilikHewan;
                    } else {
                        return '-';
                    }
                })
                ->addColumn('action', function ($row) {
                    $actionBtn = '<a href="' . url('master-data/lokasi/hewan' . '/' . $row->id . '/edit') . '" class="btn btn-warning btn-round btn-sm mr-1" value="' . $row->id . '"><i class="fa fa-edit"></i></a><button id="btn-delete" class="btn btn-danger btn-round btn-sm mr-1" value="' . $row->id . '" ><i class="fa fa-trash"></i></button>';
                    return $actionBtn;
                })
                ->rawColumns(['action', 'status', 'warnaPolygon', 'luas', 'koordinat', 'jumlah_hewan', 'pemilik'])
                ->make(true);
        }

        $daftarJumlahHewan = $this->_getJumlahHewan();
        $daftarDesa = Desa::orderBy('nama', 'asc')->get();
        return view('dashboard.pages.masterData.lokasi.hewan.index', compact(['daftarJumlahHewan', 'daftarDesa']));
    }

    public function exportLokasiHewan(Request $request)
    {
        $lokasiHewan = LokasiHewan::orderBy('created_at', 'desc')->where(function ($query) use ($request) {
            if ($request->desa_id && $request->desa_id != "semua") {
                $query->where('desa_id', $request->desa_id);
            }
        })->get();
        $jumlahLokasiHewan = [];
        $daftarHewan = Hewan::orderBy('nama', 'asc')->get();

        foreach ($lokasiHewan as $lokasi) {
            $arrayHewan = [];
            $arrayPemilik = [];
            $totalHewan = 0;
            foreach ($daftarHewan as $hewan) {
                $jumlahHewan = JumlahHewan::with(['hewan'])->where('lokasi_hewan_id', $lokasi->id)->where('hewan_id', $hewan->id)->first();
                $arrayHewan[] = [
                    'hewan' => $hewan->nama,
                    'jumlah' => $jumlahHewan ? $jumlahHewan->jumlah : '-'
                ];
                $totalHewan += $jumlahHewan ? $jumlahHewan->jumlah : 0;
            }

            foreach ($lokasi->pemilikLokasiHewan as $pemilik) {
                $arrayPemilik[] = [
                    'pemilik' => $pemilik->penduduk->nama
                ];
            }

            $jumlahLokasiHewan[] = [
                'nama' => $lokasi->nama,
                'desa' => $lokasi->desa->nama,
                'deskripsi' => $lokasi->deskripsi,
                'latitude' => $lokasi->latitude,
                'longitude' => $lokasi->longitude,
                'total_hewan' => $totalHewan,
                'jumlah_hewan' => $arrayHewan,
                'pemilik' => $arrayPemilik
            ];
        }

        $tanggal = Carbon::parse(Carbon::now())->translatedFormat('d F Y');

        return Excel::download(new LokasiHewanExport($jumlahLokasiHewan, $daftarHewan), "Export Data Lokasi Hewan-" . $tanggal . "-" . rand(1, 9999) . '.xlsx');
    }

    public function exportDemografi()
    {
        $daftarJumlahHewan = $this->_getJumlahHewan();
        $daftarHewan = Hewan::orderBy('nama', 'asc')->get();
        // dd($daftarJumlahHewan);
        $tanggal = Carbon::parse(Carbon::now())->translatedFormat('d F Y');

        return Excel::download(new DemografiLokasiHewanExport($daftarJumlahHewan, $daftarHewan), "Export Data Demografi Lokasi Hewan-" . $tanggal . "-" . rand(1, 9999) . '.xlsx');
    }

    private function _getJumlahHewan()
    {
        $daftarDesa = Desa::orderBy('nama', 'asc')->get();
        $daftarHewan = Hewan::orderBy('nama', 'asc')->get();
        $arrayDesa = [];

        foreach ($daftarDesa as $desa) {
            $arrayHewan = [];
            foreach ($daftarHewan as $hewan) {
                $jumlahHewan = JumlahHewan::where('hewan_id', $hewan->id)
                    ->whereHas('lokasiHewan', function ($query) use ($desa) {
                        $query->where('desa_id', $desa->id);
                    })->sum('jumlah');

                $arrayHewan[] = [
                    'nama_hewan' => $hewan->nama,
                    'jumlah' => $jumlahHewan
                ];
            }

            $lokasiHewan = LokasiHewan::where('desa_id', $desa->id)->count();
            $jumlahHewan = JumlahHewan::whereHas('lokasiHewan', function ($query) use ($desa) {
                $query->where('desa_id', $desa->id);
            })->sum('jumlah');

            $arrayDesa[] = [
                'desa' => $desa->nama,
                'hewan' => $arrayHewan,
                'lokasi_hewan' => $lokasiHewan,
                'jumlah' => $jumlahHewan
            ];
        }

        return $arrayDesa;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $daftarDesa = Desa::with(['penduduk'])->orderBy('nama', 'asc')->get();
        return view('dashboard.pages.masterData.lokasi.hewan.create', compact(['daftarDesa']));
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
                'hewan_id.*' => 'required',
                'jumlah_hewan.*' => 'required',
                'penduduk_id' => 'required',
            ],
            [
                'nama.required' => 'Nama Lokasi tidak boleh kosong',
                'deskripsi.required' => 'Deskripsi lokasi tidak boleh kosong',
                'desa_id.required' => 'Desa tidak boleh kosong',
                'latitude.required' => 'Latitude tidak boleh kosong',
                'longitude.required' => 'Longitude tidak boleh kosong',
                'status.required' => 'Status tidak boleh kosong',
                'hewan_id.*.required' => 'Hewan Tidak Boleh Kosong',
                'jumlah_hewan.*.required' => 'Jumlah Hewan Tidak Boleh Kosong',
                'penduduk_id.required' => 'Pemilik Hewan Tidak Boleh Kosong'
            ]
        );

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()]);
        }

        if (!$request->hewan_id) {
            return response()->json(
                [
                    'error' => [
                        'hewan-kosong' => [
                            'Hewan Ternak Tidak Boleh Kosong'
                        ]
                    ]
                ]
            );
        }


        if ($request->hewan_id != array_unique($request->hewan_id)) {
            $error = array();
            $unique = array_unique($request->hewan_id);
            $duplicates = array_diff_assoc($request->hewan_id, $unique);
            foreach ($duplicates as $key => $item) {
                $error['hewan_id' . '.' . $key] = ['Hewan Ternak Tidak Boleh Sama, Silahkan Hapus Salah 1 Data Hewan yang Sama'];
            }

            return response()->json(
                [
                    'error' => $error
                ]
            );
        }

        $lokasiHewan = new LokasiHewan();
        $lokasiHewan->nama = $request->nama;
        $lokasiHewan->deskripsi = $request->deskripsi;
        $lokasiHewan->desa_id = $request->desa_id;
        $lokasiHewan->latitude = $request->latitude;
        $lokasiHewan->longitude = $request->longitude;
        $lokasiHewan->status = $request->status;
        $lokasiHewan->save();

        for ($i = 0; $i < count($request->hewan_id); $i++) {
            $jumlahHewan = new JumlahHewan();
            $jumlahHewan->lokasi_hewan_id = $lokasiHewan->id;
            $jumlahHewan->hewan_id = $request->hewan_id[$i];
            $jumlahHewan->jumlah = $request->jumlah_hewan[$i];
            $jumlahHewan->save();
        }

        for ($i = 0; $i < count($request->penduduk_id); $i++) {
            $pemilikLokasiHewan = new PemilikLokasiHewan();
            $pemilikLokasiHewan->lokasi_hewan_id = $lokasiHewan->id;
            $pemilikLokasiHewan->penduduk_id = $request->penduduk_id[$i];
            $pemilikLokasiHewan->save();
        }

        return response()->json(['status' => 'success']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\LokasiHewan  $lokasiHewan
     * @return \Illuminate\Http\Response
     */
    public function show(LokasiHewan $lokasiHewan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\LokasiHewan  $lokasiHewan
     * @return \Illuminate\Http\Response
     */
    public function edit(LokasiHewan $lokasiHewan)
    {
        $arrPemilik = $lokasiHewan->pemilikLokasiHewan->pluck('penduduk_id')->toArray();
        $arrPendudukHapus = Penduduk::whereIn('id', $arrPemilik)->onlyTrashed()->get()->toArray();

        $id = $lokasiHewan->desa_id;
        $daftarDesa = Desa::orderBy('nama', 'asc')->get();

        if ($id) {
            $desaHapus = Desa::where('id', $id)->withTrashed()->first();
            if ($desaHapus->trashed()) {
                $daftarDesa->push($desaHapus);
            }
        }
        return view('dashboard.pages.masterData.lokasi.hewan.edit', compact(['daftarDesa', 'lokasiHewan', 'arrPendudukHapus']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\LokasiHewan  $lokasiHewan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, LokasiHewan $lokasiHewan)
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
                'hewan_id.*' => 'required',
                'jumlah_hewan.*' => 'required',
                'penduduk_id' => 'required',
            ],
            [
                'nama.required' => 'Nama Lokasi tidak boleh kosong',
                'deskripsi.required' => 'Deskripsi lokasi tidak boleh kosong',
                'desa_id.required' => 'Desa tidak boleh kosong',
                'latitude.required' => 'Latitude tidak boleh kosong',
                'longitude.required' => 'Longitude tidak boleh kosong',
                'status.required' => 'Status tidak boleh kosong',
                'hewan_id.*.required' => 'Hewan Tidak Boleh Kosong',
                'jumlah_hewan.*.required' => 'Jumlah Hewan Tidak Boleh Kosong',
                'penduduk_id.required' => 'Pemilik Hewan Tidak Boleh Kosong'
            ]
        );

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()]);
        }

        if (!$request->hewan_id) {
            return response()->json(
                [
                    'error' => [
                        'hewan-kosong' => [
                            'Hewan Ternak Tidak Boleh Kosong'
                        ]
                    ]
                ]
            );
        }


        if ($request->hewan_id != array_unique($request->hewan_id)) {
            $error = array();
            $unique = array_unique($request->hewan_id);
            $duplicates = array_diff_assoc($request->hewan_id, $unique);
            foreach ($duplicates as $key => $item) {
                $error['hewan_id' . '.' . $key] = ['Hewan Ternak Tidak Boleh Sama, Silahkan Hapus Salah 1 Data Hewan yang Sama'];
            }

            return response()->json(
                [
                    'error' => $error
                ]
            );
        }

        $lokasiHewan->nama = $request->nama;
        $lokasiHewan->deskripsi = $request->deskripsi;
        $lokasiHewan->desa_id = $request->desa_id;
        $lokasiHewan->latitude = $request->latitude;
        $lokasiHewan->longitude = $request->longitude;
        $lokasiHewan->status = $request->status;
        $lokasiHewan->save();

        // $deleteJumlahHewan = JumlahHewan::where('lokasi_hewan_id', $lokasiHewan->id)->whereNotIn('hewan_id', $request->hewan_id)->delete();

        $jumlahHewan = JumlahHewan::where('lokasi_hewan_id', $lokasiHewan->id)->whereNotIn('hewan_id', $request->hewan_id)->forceDelete();

        for ($i = 0; $i < count($request->hewan_id); $i++) {
            $jumlahHewan = JumlahHewan::updateOrCreate(
                ['lokasi_hewan_id' => $lokasiHewan->id, 'hewan_id' => $request->hewan_id[$i]],
                ['jumlah' => $request->jumlah_hewan[$i]]
            );
        }

        $pemilikLokasi = PemilikLokasiHewan::where('lokasi_hewan_id', $lokasiHewan->id)->whereNotIn('penduduk_id', $request->penduduk_id)->forceDelete();
        for ($i = 0; $i < count($request->penduduk_id); $i++) {
            $pemilikLokasi = PemilikLokasiHewan::updateOrCreate(
                ['lokasi_hewan_id' => $lokasiHewan->id, 'penduduk_id' => $request->penduduk_id[$i]],
                []
            );
        }

        return response()->json(['status' => 'success']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LokasiHewan  $lokasiHewan
     * @return \Illuminate\Http\Response
     */
    public function destroy(LokasiHewan $lokasiHewan)
    {
        $lokasiHewan->delete();

        $lokasiHewan->jumlahHewan()->delete();
        $lokasiHewan->pemilikLokasiHewan()->delete();

        return response()->json(['status' => 'success']);
    }

    public function getMapData(Request $request)
    {
        if ($request->id) {
            $keong = LokasiHewan::with(['desa', 'jumlahHewan', 'jumlahHewan.hewan', 'pemilikLokasiHewan', 'pemilikLokasiHewan.penduduk'])->find($request->id);
        } else {
            $keong = LokasiHewan::with(['desa', 'jumlahHewan', 'jumlahHewan.hewan', 'pemilikLokasiHewan', 'pemilikLokasiHewan.penduduk'])->orderBy('id', 'desc')->get();
        }

        if ($keong) {
            return response()->json(['status' => 'success', 'data' => $keong]);
        } else {
            return response()->json(['status' => 'error']);
        }
    }
}
