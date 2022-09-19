<?php

namespace App\Http\Controllers\intervensi\perencanaan\manusia;

use App\Models\OPD;
use App\Models\Desa;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\OPDTerkaitManusia;
use App\Models\PerencanaanManusia;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\DokumenRealisasiManusia;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;
use App\Exports\PerencanaanManusiaExport;
use App\Models\DokumenPerencanaanManusia;
use Illuminate\Support\Facades\Validator;
use App\Models\PendudukPerencanaanManusia;
use App\Http\Requests\StorePerencanaanManusiaRequest;
use App\Http\Requests\UpdatePerencanaanManusiaRequest;

class PerencanaanManusiaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function dataPerencanaan()
    {
        $perencanaanManusia = PerencanaanManusia::with('opd', 'pendudukPerencanaanManusia', 'opdTerkaitManusia', 'realisasiManusia')
            ->where(function ($query) {
                if (Auth::user()->role == 'OPD') {
                    $query->where('opd_id', Auth::user()->opd_id);
                    $query->orWhereHas('opdTerkaitManusia', function ($q) { // OPD Terkait hanya bisa melihat yang telah di setujui
                        // $q->where('status', 1);
                        $q->where('opd_id', Auth::user()->opd_id);
                    });
                }
            })
            ->latest();
        return $perencanaanManusia;
    }

    public function index(Request $request)
    {
        $perencanaanManusia = $this->dataPerencanaan();

        if ($request->ajax()) {
            $data = $perencanaanManusia
                // filtering
                ->where(function ($query) use ($request) {
                    if ($request->tahun_filter && $request->tahun_filter != 'semua') {
                        $query->whereYear('created_at', $request->tahun_filter);
                    }

                    if ($request->opd_filter && $request->opd_filter != 'semua') {
                        $query->where('opd_id', $request->opd_filter);
                    }

                    if ($request->status_filter && $request->status_filter != 'semua') {
                        $filter = $request->status_filter;
                        if (in_array($filter, ["-", 1, 2])) {
                            if ($filter == "-") {
                                $query->where('status', 0);
                            } else {
                                $query->where('status', $filter);
                            }
                        } else {
                            if ($filter == 3) {
                                // $query->created_at->year != Carbon::now()->year;
                                $query->whereYear('created_at', '!=', Carbon::now()->year);
                                $query->whereHas('realisasiManusia', function ($q) {
                                    $q->where('status', 1);
                                    $q->havingRaw('max(progress) != ?', [100]);
                                });
                            }
                        }
                    }

                    if ($request->search_filter) {
                        $query->where(function ($query2) use ($request) {
                            $query2->where('sub_indikator', 'like', '%' . $request->search_filter . '%');
                        });
                    }
                });
            return DataTables::of($data)
                ->addIndexColumn()

                ->addColumn('status', function ($row) {
                    if ($row->status == 0) {
                        return '<span class="badge fw-bold badge-warning">Menunggu Konfirmasi</span>';
                    } else if ($row->status == 1) {
                        $status = '<div class="my-2">';
                        $status .= '<span class="badge fw-bold badge-success mb-1">Disetujui</span>';
                        if ($row->realisasiManusia->where('status', 1)->count() > 0) {
                            $status .=  '<br><a class="shadow" href="' . route('realisasi-intervensi-manusia.show', $row->id) . '"><span class="badge fw-bold badge-primary">Progress: ' . $row->realisasiManusia->where('status', 1)->max('progress') . '%</span></a>';
                        } else {
                            $status .=  '<br><span class="badge fw-bold badge-primary">Progress: 0%</span>';
                        }
                        if (($row->created_at->year != Carbon::now()->year) && ($row->realisasiManusia->where('status', 1)->max('progress') != 100)) {
                            $status .=  '<br><span class="badge fw-bold badge-secondary mt-1">Tidak Terselesaikan Ditahun ' . $row->created_at->year . '</span>';
                            if ($row->alasan_tidak_terselesaikan == null && $row->status_baca == null) {
                                $status .=  '<br><span class="badge fw-bold badge-danger mt-1">Belum Ada Alasan</span>';
                                if (Auth::user()->opd_id == $row->opd_id) {
                                    $status .=  '<br><button id="tambah-alasan" class="btn btn-sm btn-rounded shadow btn-danger mt-1 font-weight-bold tambah-alasan" data-id="' . $row->id . '" data-sub-indikator="' . $row->sub_indikator . '"><i class="fas fa-plus"></i> Tambahkan Alasan</button>';
                                }
                            } else {
                                if (Auth::user()->role == 'OPD') {
                                    $status .=  '<br><button id="lihat-alasan" class="btn btn-sm btn-rounded shadow btn-danger mt-1 font-weight-bold lihat-alasan" data-id="' . $row->id . '" data-sub-indikator="' . $row->sub_indikator . '" data-alasan="' . $row->alasan_tidak_terselesaikan . '"><i class="fas fa-eye"></i> Lihat Alasan</button>';
                                } else {
                                    if ($row->status_baca == 0) {
                                        $status .=  '<br><button id="lihat-alasan" class="btn btn-sm btn-rounded shadow btn-danger mt-1 font-weight-bold lihat-alasan" data-id="' . $row->id . '" data-sub-indikator="' . $row->sub_indikator . '" data-alasan="' . $row->alasan_tidak_terselesaikan . '" data-status-baca="' . $row->status_baca . '"><i class="fas fa-eye"></i> Lihat Alasan <span class="font-weight-bold">(Belum Dibaca)</span></button>';
                                    } else if ($row->status_baca == 1) {
                                        $status .=  '<br><button id="lihat-alasan" class="btn btn-sm btn-rounded shadow btn-danger mt-1 font-weight-bold lihat-alasan" data-id="' . $row->id . '" data-sub-indikator="' . $row->sub_indikator . '" data-alasan="' . $row->alasan_tidak_terselesaikan . '" data-status-baca="' . $row->status_baca . '"><i class="fas fa-eye"></i> Lihat Alasan <span style="font-style: italic;">(Sudah Dibaca)</span></button>';
                                    }
                                }
                            }
                        }
                        $status .= '</div>';
                        return $status;
                    } else if ($row->status == 2) {
                        return '<span class="badge fw-bold badge-danger">Ditolak</span>';
                    }
                })

                ->addColumn('jumlah_penduduk', function ($row) {
                    return $row->pendudukPerencanaanManusia->count();
                })

                ->addColumn('opd', function ($row) {
                    if (Auth::user()->role == 'OPD') {
                        if ($row->opd_id == Auth::user()->opd_id) {
                            return $row->opd->nama;
                        } else {
                            return '<span class="badge badge-primary">' . $row->opd->nama . '</span>';
                        }
                    } else {
                        return $row->opd->nama;
                    }
                })

                ->addColumn('action', function ($row) {
                    $actionBtn = '<div class="text-center justify-content-center text-white my-1">';
                    if ($row->status == 0) {
                        if (Auth::user()->role == 'OPD') {
                            $actionBtn .= '<a href="' . route('rencana-intervensi-manusia.show', $row->id) . '" id="btn-show" class="btn btn-rounded btn-primary btn-sm text-white shadow btn-lihat my-1" data-toggle="tooltip" data-placement="top" title="Lihat"><i class="fas fa-eye"></i></a> ';
                            if (Auth::user()->opd_id == $row->opd_id) {
                                $actionBtn .= '<a href="' . route('rencana-intervensi-manusia.edit', $row->id) . '" id="btn-edit" class="btn btn-rounded btn-warning btn-sm my-1 text-white shadow" data-toggle="tooltip" data-placement="top" title="Ubah"><i class="fas fa-edit"></i></a> ';
                                $actionBtn .= '<button id="btn-delete" class="btn btn-rounded btn-danger btn-sm my-1 text-white shadow btn-delete" data-toggle="tooltip" data-placement="top" title="Hapus" value="' . $row->id . '"><i class="fas fa-trash"></i></button>';
                            }
                        } else { //admin & pimpinan
                            if (Auth::user()->role == 'Admin') {
                                $actionBtn .= '<a href="' . route('rencana-intervensi-manusia.show', $row->id) . '" id="btn-show" class="btn btn-rounded btn-secondary btn-sm text-white shadow btn-lihat my-1" data-toggle="tooltip" data-placement="top" title="Konfirmasi"><i class="fas fa-lg fa-clipboard-check"></i></a> ';
                            } else {
                                $actionBtn .= '<a href="' . route('rencana-intervensi-manusia.show', $row->id) . '" id="btn-show" class="btn btn-rounded btn-primary btn-sm text-white shadow btn-lihat my-1" data-toggle="tooltip" data-placement="top" title="Lihat"><i class="fas fa-eye"></i></a> ';
                            }
                        }
                    } else if ($row->status == 1) {
                        $actionBtn .= '<a href="' . route('rencana-intervensi-manusia.show', $row->id) . '" id="btn-show" class="btn btn-rounded btn-primary btn-sm text-white shadow btn-lihat my-1" data-toggle="tooltip" data-placement="top" title="Lihat"><i class="fas fa-eye"></i></a> ';
                        if (Auth::user()->role == 'Admin') {
                            $actionBtn .= '<a href="' . route('rencana-intervensi-manusia.edit', $row->id) . '" id="btn-edit" class="btn btn-rounded btn-warning btn-sm my-1 text-white shadow" data-toggle="tooltip" data-placement="top" title="Ubah"><i class="fas fa-edit"></i></a> ';
                            $actionBtn .= '<button id="btn-delete" class="btn btn-rounded btn-danger btn-sm my-1 text-white shadow btn-delete" data-toggle="tooltip" data-placement="top" title="Hapus" value="' . $row->id . '"><i class="fas fa-trash"></i></button>';
                        }
                    } else { // > 2
                        $actionBtn .= '<a href="' . route('rencana-intervensi-manusia.show', $row->id) . '" id="btn-show" class="btn btn-rounded btn-primary btn-sm text-white shadow btn-lihat my-1" data-toggle="tooltip" data-placement="top" title="Lihat"><i class="fas fa-eye"></i></a> ';
                        if ((Auth::user()->role == 'OPD') && (Auth::user()->opd_id == $row->opd_id)) {
                            $actionBtn .= '<a href="' . route('rencana-intervensi-manusia.edit', $row->id) . '" id="btn-edit" class="btn btn-rounded btn-warning btn-sm my-1 text-white shadow" data-toggle="tooltip" data-placement="top" title="Ubah"><i class="fas fa-edit"></i></a> ';
                            $actionBtn .= '<button id="btn-delete" class="btn btn-rounded btn-danger btn-sm my-1 text-white shadow btn-delete" data-toggle="tooltip" data-placement="top" title="Hapus" value="' . $row->id . '"><i class="fas fa-trash"></i></button>';
                        }
                    }
                    $actionBtn .= '</div>';
                    return $actionBtn;
                })

                ->rawColumns([
                    'status',
                    'opd',
                    'action',
                ])
                ->make(true);
        }

        $perencanaanManusia2 = PerencanaanManusia::where(function ($query) {
            if (Auth::user()->role == 'OPD') {
                $query->where('opd_id', Auth::user()->opd_id);
            }
        })->latest()->get();
        $countPerencanaanTidakTerselesaikan = 0;
        if (Auth::user()->role == 'OPD') {
            foreach ($perencanaanManusia2 as $row) {
                if (($row->created_at->year != Carbon::now()->year) && ($row->realisasiManusia->where('status', 1)->max('progress') != 100) && ($row->alasan_tidak_terselesaikan == null) && ($row->status_baca == null)) {
                    $countPerencanaanTidakTerselesaikan++;
                }
            }

            $totalMenungguKonfirmasiPerencanaanManusia = PerencanaanManusia::where('status', 2)->where('opd_id', Auth::user()->opd_id)->count();
        } else {
            foreach ($perencanaanManusia2 as $row) {
                if (($row->created_at->year != Carbon::now()->year) && ($row->realisasiManusia->where('status', 1)->max('progress') != 100) && ($row->alasan_tidak_terselesaikan != null) && ($row->status_baca != 1)) {
                    $countPerencanaanTidakTerselesaikan++;
                }
            }

            $totalMenungguKonfirmasiPerencanaanManusia = PerencanaanManusia::where('status', 0)->count();
        }

        $totalAlasanTidakTerselesaikan = $countPerencanaanTidakTerselesaikan;

        $tahun = $this->dataPerencanaan()->select(DB::raw('YEAR(created_at) year'))
            ->groupBy('year')
            ->pluck('year');

        $perencanaanManusia3 = $this->dataPerencanaan()->groupBy('opd_id')->get();

        return view('dashboard.pages.intervensi.perencanaan.manusia.subIndikator.index', ['perencanaanManusia' => $perencanaanManusia3, 'totalMenungguKonfirmasiPerencanaan' => $totalMenungguKonfirmasiPerencanaanManusia, 'tahun' => $tahun, 'totalAlasanTidakTerselesaikan' => $totalAlasanTidakTerselesaikan]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (in_array(Auth::user()->role, ['Admin', 'Pimpinan'])) {
            abort('403', 'Oops! anda tidak memiliki akses ke sini.');
        }

        if (Auth::user()->role == 'OPD') {
            $perencanaanManusia = PerencanaanManusia::where('opd_id', Auth::user()->opd_id)->get();
            $countPerencanaanTidakTerselesaikan = null;
            foreach ($perencanaanManusia as $row) {
                if (($row->created_at->year != Carbon::now()->year) && ($row->realisasiManusia->where('status', 1)->max('progress') != 100) && ($row->alasan_tidak_terselesaikan == null) && ($row->status_baca == null)) {
                    $countPerencanaanTidakTerselesaikan++;
                }
            }
            if ($countPerencanaanTidakTerselesaikan) {
                abort('403', 'Terdapat ' . $countPerencanaanTidakTerselesaikan . ' data perencanaan yang telah dibuat di tahun sebelumnya, tetapi belum meiliki alasan kenapa tidak terselesaikan. Silahkan kembali dan berikan alasan pada data perencanaan yang tidak terselesaikan pada tahun sebelumnya dengan meng-klik tombol "Tambahkan Alasan". Setelah itu anda dapat mengajukan perencanaan baru ditahun ini.');
            }
        }

        $data = [
            'desa' => Desa::all(),
            'opd' => OPD::orderBy('nama')->whereNot('id', Auth::user()->opd_id)->get(),
        ];
        return view('dashboard.pages.intervensi.perencanaan.manusia.subIndikator.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePerencanaanManusiaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'sub_indikator' => 'required',
                'penduduk' => 'required',
                'nilai_pembiayaan' => 'required',
                'sumber_dana' => 'required',
            ],
            [
                'sub_indikator.required' => 'Sub Indikator harus diisi',
                'penduduk.required' => 'Penduduk harus dipilih',
                'nilai_pembiayaan.required' => 'Nilai Pembiayaan harus diisi',
                'sumber_dana.required' => 'Sumber Dana harus dipilih',
            ]
        );

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()]);
        }

        if ($request->nama_dokumen != null) {
            $countFileDokumen = count($request->file_dokumen ?? []);
            $countNamaDokumen = count($request->nama_dokumen);

            if ($countFileDokumen == $countNamaDokumen) {
                if (in_array(null, $request->nama_dokumen)) {
                    return 'nama_dokumen_kosong';
                }
            } else {
                return 'nama_dokumen_kosong_dan_file_dokumen_kosong';
            }
        }

        $dataPerencanaan = [
            'opd_id' => Auth::user()->opd_id,
            'sub_indikator' => $request->sub_indikator,
            'nilai_pembiayaan' => $request->nilai_pembiayaan,
            'sumber_dana' => $request->sumber_dana,
        ];

        $insertPerencanaan = PerencanaanManusia::create($dataPerencanaan);

        if ($request->penduduk != null) {
            foreach ($request->penduduk as $penduduk) {
                $dataPenduduk = [
                    'perencanaan_manusia_id' => $insertPerencanaan->id,
                    'penduduk_id' => $penduduk,
                ];
                $insertPenduduk = PendudukPerencanaanManusia::create($dataPenduduk);
            }
        }

        if ($request->opd_terkait != null) {
            foreach ($request->opd_terkait as $opd) {
                $dataOPDTerkait = [
                    'perencanaan_manusia_id' => $insertPerencanaan->id,
                    'opd_id' => $opd,
                ];
                $insertOPDTerkait = OPDTerkaitManusia::create($dataOPDTerkait);
            }
        }

        $no_dokumen = 1;
        if ($request->nama_dokumen != null) {
            for ($i = 0; $i < $countFileDokumen; $i++) {
                $namaFile = mt_rand() . '-' . $request->nama_dokumen[$i] . '-' . $request->sub_indikator . '-' . $no_dokumen . '.' . $request->file_dokumen[$i]->getClientOriginalExtension();

                $request->file_dokumen[$i]->storeAs(
                    'uploads/dokumen/perencanaan/manusia',
                    $namaFile
                );

                $dataDokumen = [
                    'perencanaan_manusia_id' => $insertPerencanaan->id,
                    'nama' => $request->nama_dokumen[$i],
                    'file' => $namaFile,
                    'no_urut' => $no_dokumen,
                ];

                DokumenPerencanaanManusia::create($dataDokumen);
                $no_dokumen++;
            }
        }

        return response()->json('kirim');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PerencanaanManusia  $perencanaanManusia
     * @return \Illuminate\Http\Response
     */
    public function show(PerencanaanManusia $rencana_intervensi_manusia)
    {
        return view('dashboard.pages.intervensi.perencanaan.manusia.subIndikator.show', compact('rencana_intervensi_manusia'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PerencanaanManusia  $perencanaanManusia
     * @return \Illuminate\Http\Response
     */
    public function edit(PerencanaanManusia $rencana_intervensi_manusia)
    {
        if (Auth::user()->role == 'Admin') {
            if (in_array($rencana_intervensi_manusia->status, [0, 2])) {
                abort('403', 'Oops! anda tidak memiliki akses ke sini.');
            }
        } else if (Auth::user()->role == 'OPD') {
            if (Auth::user()->opd_id != $rencana_intervensi_manusia->opd_id) {
                abort('403', 'Oops! anda tidak memiliki akses ke sini.');
            }
            if (in_array($rencana_intervensi_manusia->status, [1])) {
                abort('403', 'Oops! anda tidak memiliki akses ke sini.');
            }
        } else {
            abort('403', 'Oops! anda tidak memiliki akses ke sini.');
        }

        $data = [
            'rencanaIntervensiManusia' => $rencana_intervensi_manusia,
            'desa' => Desa::all(),
            'pendudukPerencanaanManusia' => json_encode($rencana_intervensi_manusia->pendudukPerencanaanManusia->pluck('penduduk_id')->toArray()),
            'opdTerkaitManusia' => json_encode($rencana_intervensi_manusia->opdTerkaitManusia->pluck('opd_id')->toArray()),
            'opd' => OPD::whereNot('id', $rencana_intervensi_manusia->opd_id)->orderBy('nama')->get(),

        ];
        return view('dashboard.pages.intervensi.perencanaan.manusia.subIndikator.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePerencanaanManusiaRequest  $request
     * @param  \App\Models\PerencanaanManusia  $perencanaanManusia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PerencanaanManusia $rencana_intervensi_manusia)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'sub_indikator' => 'required',
                'penduduk' => $rencana_intervensi_manusia->realisasiManusia->count() == 0 ? 'required' : '',
                'nilai_pembiayaan' => $rencana_intervensi_manusia->realisasiManusia->count() == 0 ? 'required' : '',
                'sumber_dana' => 'required',
            ],
            [
                'sub_indikator.required' => 'Sub Indikator harus diisi',
                'penduduk.required' => 'Lokasi harus dipilih',
                'nilai_pembiayaan.required' => 'Nilai Pembiayaan harus diisi',
                'sumber_dana.required' => 'Sumber Dana harus dipilih',
            ]
        );

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()]);
        }

        // validate untuk dokumen lama
        if (in_array(null, $request->nama_dokumen_old)) {
            return 'nama_dokumen_kosong_old';
        }

        // validate untuk dokumen baru
        if ($request->nama_dokumen != null) {
            $countFileDokumen = count($request->file_dokumen ?? []);
            $countNamaDokumen = count($request->nama_dokumen);

            if ($countFileDokumen == $countNamaDokumen) {
                if (in_array(null, $request->nama_dokumen)) {
                    return 'nama_dokumen_kosong';
                }
            } else {
                return 'nama_dokumen_kosong_dan_file_dokumen_kosong';
            }
        }

        // update lokasi perencanaan
        if ($rencana_intervensi_manusia->realisasiManusia->count() == 0) {
            $rencana_intervensi_manusia->pendudukPerencanaanManusia()->delete();
            if ($request->penduduk != null) {
                foreach ($request->penduduk as $penduduk) {
                    $dataPenduduk = [
                        'perencanaan_manusia_id' => $rencana_intervensi_manusia->id,
                        'penduduk_id' => $penduduk,
                    ];
                    $insertPenduduk = PendudukPerencanaanManusia::create($dataPenduduk);
                }
            }
        }

        // update opd terkait
        $rencana_intervensi_manusia->opdTerkaitManusia()->delete();
        if ($request->opd_terkait != null) {
            foreach ($request->opd_terkait as $opd) {
                $dataOPDTerkait = [
                    'perencanaan_manusia_id' => $rencana_intervensi_manusia->id,
                    'opd_id' => $opd,
                ];
                $insertOPDTerkait = OPDTerkaitManusia::create($dataOPDTerkait);
            }
        }

        // Hapus dokumen lama
        if ($request->deleteDocumentOld != null) {
            $deleteDocumentOld = explode(',', $request->deleteDocumentOld);
            foreach ($deleteDocumentOld as $item) {
                $namaFile = DokumenPerencanaanManusia::where('id', $item)->first()->file;
                if (Storage::exists('uploads/dokumen/perencanaan/manusia/' . $namaFile)) {
                    Storage::delete('uploads/dokumen/perencanaan/manusia/' . $namaFile);
                }
                DokumenPerencanaanManusia::where('id', $item)->delete();
            }
        }

        // update deskripsi/title dokumen lama
        if ($request->nama_dokumen_old) {
            foreach ($request->nama_dokumen_old as $key => $value) {
                $idUpdateNama = $rencana_intervensi_manusia->dokumenPerencanaanManusia[$key]->id;
                $dataDokumen = DokumenPerencanaanManusia::find($idUpdateNama);

                $dataDokumen->update([
                    'nama' => $request->nama_dokumen_old[$key],
                ]);
            }
        }

        //  update file dokumen lama
        if ($request->file_dokumen_old) {
            foreach ($request->file_dokumen_old as $key => $value) {
                $idUpdateDokumen = $rencana_intervensi_manusia->dokumenPerencanaanManusia[$key]->id;
                $dataDokumen = DokumenPerencanaanManusia::find($idUpdateDokumen);
                if (Storage::exists('uploads/dokumen/perencanaan/manusia/' . $dataDokumen->file)) {
                    Storage::delete('uploads/dokumen/perencanaan/manusia/' . $dataDokumen->file);
                }

                $namaFile = mt_rand() . '-' . $request->nama_dokumen_old[$key] . '-' . $request->sub_indikator . '-' .  $dataDokumen->no_urut . '.' . $value->getClientOriginalExtension();
                $value->storeAs('uploads/dokumen/perencanaan/manusia/', $namaFile);

                $update = [
                    'nama' => $request->nama_dokumen_old[$key],
                    'file' => $namaFile,
                ];

                $dataDokumen->update($update);
            }
        }

        // update dokumen baru
        $no_dokumen = $rencana_intervensi_manusia->dokumenPerencanaanManusia->max('no_urut') + 1;
        if ($request->nama_dokumen != null) {
            for ($i = 0; $i < $countFileDokumen; $i++) {
                $namaFile = mt_rand() . '-' . $request->nama_dokumen[$i] . '-' . $request->sub_indikator . '-' .  $no_dokumen . '.' . $request->file_dokumen[$i]->getClientOriginalExtension();
                $request->file_dokumen[$i]->storeAs(
                    'uploads/dokumen/perencanaan/manusia/',
                    $namaFile
                );

                $dataDokumen = [
                    'perencanaan_manusia_id' => $rencana_intervensi_manusia->id,
                    'nama' => $request->nama_dokumen[$i],
                    'file' => $namaFile,
                    'no_urut' => $no_dokumen,
                ];

                DokumenPerencanaanManusia::create($dataDokumen);
                $no_dokumen++;
            }
        }

        // update data perencanaan
        $dataPerencanaan = [
            'sub_indikator' => $request->sub_indikator,
            'sumber_dana' => $request->sumber_dana,
        ];

        if ($rencana_intervensi_manusia->realisasiManusia->count() == 0) {
            $dataPerencanaan['nilai_pembiayaan'] = $request->nilai_pembiayaan;
        }


        if (Auth::user()->role == 'OPD') {
            $dataPerencanaan['status'] = 0;
            $dataPerencanaan['alasan_ditolak'] = '-';
        }
        $rencana_intervensi_manusia->update($dataPerencanaan);

        return response()->json('perbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PerencanaanManusia  $perencanaanManusia
     * @return \Illuminate\Http\Response
     */
    public function destroy(PerencanaanManusia $rencana_intervensi_manusia)
    {
        $rencana_intervensi_manusia->opdTerkaitManusia()->delete();
        $rencana_intervensi_manusia->pendudukPerencanaanManusia()->delete();

        if ($rencana_intervensi_manusia->dokumenPerencanaanManusia) {
            foreach ($rencana_intervensi_manusia->dokumenPerencanaanManusia as $item) {
                if (Storage::exists('uploads/dokumen/perencanaan/manusia/' . $item->file)) {
                    Storage::delete('uploads/dokumen/perencanaan/manusia/' . $item->file);
                }
            }
        }
        $rencana_intervensi_manusia->dokumenPerencanaanManusia()->delete();

        if ($rencana_intervensi_manusia->realisasiManusia) {
            foreach ($rencana_intervensi_manusia->realisasiManusia as $item) {
                foreach ($item->dokumenRealisasiManusia as $doc) {
                    if (Storage::exists('uploads/dokumen/realisasi/manusia/' . $doc->file)) {
                        Storage::delete('uploads/dokumen/realisasi/manusia/' . $doc->file);
                    }
                    DokumenRealisasiManusia::where('id', $item->id)->delete();
                }
                $item->dokumenRealisasiManusia()->delete();
            }
        }

        $rencana_intervensi_manusia->realisasiManusia()->delete();
        $rencana_intervensi_manusia->delete();

        return response()->json(['success' => 'Data berhasil dihapus']);
    }

    public function konfirmasi(PerencanaanManusia $rencana_intervensi_manusia, Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'status' => 'required',
                'alasan_ditolak' => $request->status == 2 ? 'required' : '',
            ],
            [
                'status.required' => 'Status harus diisi',
                'alasan_ditolak.required' => 'Alasan ditolak harus diisi',
            ]
        );

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()]);
        }

        $data = [
            'status' => $request->status,
            'alasan_ditolak' => $request->status == 2 ? $request->alasan_ditolak : '-',
            'tanggal_konfirmasi' => Carbon::now(),
        ];

        $rencana_intervensi_manusia->update($data);

        return response()->json(['success' => 'Berhasil mengkonfirmasi']);
    }

    public function export()
    {
        $dataPerencanaan = PerencanaanManusia::with('opd', 'pendudukPerencanaanManusia')
            ->where(function ($query) {
                if (Auth::user()->role == 'OPD') {
                    $query->where('opd_id', Auth::user()->opd_id);
                    $query->orWhereHas('opdTerkaitManusia', function ($q) { // OPD Terkait hanya bisa melihat yang telah di setujui
                        $q->where('status', 1);
                        $q->where('opd_id', Auth::user()->opd_id);
                    });
                }
            })
            ->latest()->get();
        // return view('dashboard.pages.intervensi.perencanaan.manusia.subIndikator.export', ['dataPerencanaan' => $dataPerencanaan]);

        $tanggal = Carbon::parse(Carbon::now())->translatedFormat('d F Y');

        return Excel::download(new PerencanaanManusiaExport($dataPerencanaan), "Export Data Perencanaan Manusia" . "-" . $tanggal . "-" . rand(1, 9999) . '.xlsx');
    }

    public function buatAlasanTidakTerselesaikan(PerencanaanManusia $rencana_intervensi_manusia, Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'alasan_tidak_terselesaikan' => 'required',
            ],
            [
                'alasan_tidak_terselesaikan.required' => 'Alasan harus diisi',
            ]
        );

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()]);
        }

        $data = [
            'alasan_tidak_terselesaikan' => $request->alasan_tidak_terselesaikan,
            'status_baca' => 0
        ];

        $rencana_intervensi_manusia->update($data);

        return $rencana_intervensi_manusia;
    }

    public function bacaAlasanTidakTerselesaikan(PerencanaanManusia $rencana_intervensi_manusia)
    {
        $rencana_intervensi_manusia->update(['status_baca' => 1]);
        return $rencana_intervensi_manusia;
    }
}
