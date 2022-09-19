<?php

namespace App\Http\Controllers\intervensi\realisasi\manusia;

use App\Models\OPD;
use App\Models\Desa;
use App\Models\Penduduk;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\RealisasiManusia;
use App\Models\OPDTerkaitManusia;
use App\Models\PerencanaanManusia;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\RealisasiManusiaExport;
use App\Models\DokumenRealisasiManusia;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;
use App\Models\PendudukPerencanaanManusia;
use App\Exports\HasilRealisasiManusiaExport;
use App\Http\Requests\StoreRealisasiManusiaRequest;
use App\Http\Requests\UpdateRealisasiManusiaRequest;

class RealisasiManusiaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function dataPerencanaan()
    {
        $query = PerencanaanManusia::with('opd', 'pendudukPerencanaanManusia', 'realisasiManusia',  'opdTerkaitManusia')
            ->where('status', 1)
            ->where(function ($query) {
                if (Auth::user()->role == 'OPD') {
                    $query->where('opd_id', Auth::user()->opd_id);
                    $query->orWhereHas('opdTerkaitManusia', function ($q) {
                        $q->where('status', 1);
                        $q->where('opd_id', Auth::user()->opd_id);
                    });
                }
            })
            ->latest();
        return $query;
    }

    public function index(Request $request)
    {
        $realisasiManusia = $this->dataPerencanaan();
        if ($request->ajax()) {
            $data = $realisasiManusia
                // filtering
                ->where(function ($query) use ($request) {
                    if ($request->tahun_filter && $request->tahun_filter != 'semua') {
                        $query->whereYear('created_at', $request->tahun_filter);
                    }

                    if ($request->opd_filter && $request->opd_filter != 'semua') {
                        $query->where('opd_id', $request->opd_filter);
                    }

                    if ($request->status_filter && $request->status_filter != 'semua') {
                        if ($request->status_filter == 'selesai') {
                            $query->whereHas('realisasiManusia', function ($query2) use ($request) {
                                $query2->where('status', 1);
                                $query2->havingRaw('max(progress) = 100');
                            });
                        }
                        if ($request->status_filter == 'belum_selesai') {
                            $query->where(function ($query2) use ($request) {
                                $query2->whereHas('realisasiManusia', function ($query3) use ($request) {
                                    $query3->where('status', 1);
                                    $query3->havingRaw('max(progress) != 100');
                                });
                                $query2->orWhereDoesntHave('realisasiManusia');
                            });
                        }
                        if ($request->status_filter == 'belum_ada_laporan') {
                            $query->whereDoesntHave('realisasiManusia');
                        }

                        if (in_array($request->status_filter, array("-", 1, 2))) {
                            $query->whereHas('realisasiManusia', function ($query2) use ($request) {
                                if ($request->status_filter == "-") {
                                    $query2->where('status', 0);
                                } else {
                                    if ($request->status_filter == 1) {
                                        $query2->where('status', 1);
                                        $query2->max('progress') != 100;
                                    } else {
                                        $query2->where('status', $request->status_filter);
                                    }
                                }
                            });
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

                ->addColumn('penggunaan_anggaran', function ($row) {
                    $penggunaanAnggaran = 0;
                    foreach ($row->realisasiManusia->where('status', 1) as $item) {
                        $penggunaanAnggaran += $item->penggunaan_anggaran;
                    }
                    return $penggunaanAnggaran;
                })

                ->addColumn('sisa_anggaran', function ($row) {
                    $penggunaanAnggaran = 0;
                    foreach ($row->realisasiManusia->where('status', 1) as $item) {
                        $penggunaanAnggaran += $item->penggunaan_anggaran;
                    }
                    $sisaAnggaran = $row->nilai_pembiayaan - $penggunaanAnggaran;
                    return $sisaAnggaran;
                })

                ->addColumn('progress', function ($row) {
                    if ($row->realisasiManusia->where('status', 1)->count() > 0) {
                        return $row->realisasiManusia->where('status', 1)->max('progress') . ' %';
                    } else {
                        return '0 %';
                    }
                })

                ->addColumn('status', function ($row) {
                    $status = '<div>';
                    if ($row->realisasiManusia->where('status', 1)->max('progress') == 100) {
                        $status .=  '<span class="badge badge-info">Selesai Terealisasi</span>';
                    } else {
                        if ($row->realisasiManusia->where('status', 0)->count() > 0) {
                            $status .= '<span class="badge badge-warning my-1 mx-1">Menunggu Konfirmasi : <span class="font-weight-bold">' . $row->realisasiManusia->where('status', 0)->count() . '</span></span>';
                        }
                        if ($row->realisasiManusia->where('status', 1)->count() > 0) {
                            $status .= '<span class="badge badge-success my-1 mx-1">Laporan Disetujui : <span class="font-weight-bold">' . $row->realisasiManusia->where('status', 1)->count() . '</span></span>';
                        }
                        if ($row->realisasiManusia->where('status', 2)->count() > 0) {
                            $status .= '<span class="badge badge-danger my-1 mx-1">Laporan Ditolak : <span class="font-weight-bold">' . $row->realisasiManusia->where('status', 2)->count() . '</span></span>';
                        }

                        if ($row->realisasiManusia->count() == 0) {
                            $status .= '<span class="badge badge-dark">Belum Ada Laporan</span>';
                        }
                    }
                    $status .= '</div>';
                    return $status;
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
                    $actionBtn .= '<a href="' . route('realisasi-intervensi-manusia.show', $row->id) . '" id="btn-show" class="btn btn-rounded btn-primary btn-sm text-white shadow btn-lihat my-1" data-toggle="tooltip" data-placement="top" title="Lihat"><i class="fas fa-eye"></i></a> ';
                    $actionBtn .= '</div>';
                    return $actionBtn;
                })

                ->rawColumns([
                    'status',
                    'progress',
                    'opd',
                    'action',
                ])
                ->make(true);
        }

        if (Auth::user()->role == 'OPD') {
            $listPerencanaanManusia = PerencanaanManusia::where('opd_id', Auth::user()->opd_id)->where('status', 1)->pluck('id')->toArray();
            $totalMenungguKonfirmasiRealisasiManusia = RealisasiManusia::whereIn('perencanaan_manusia_id', $listPerencanaanManusia)->where('status', 2)->count();
        } else {
            $totalMenungguKonfirmasiRealisasiManusia = RealisasiManusia::where('status', 0)->count();
        }

        $tahun = $this->dataPerencanaan()->select(DB::raw('YEAR(created_at) year'))
            ->groupBy('year')
            ->pluck('year');

        $realisasiManusia = $this->dataPerencanaan()->groupBy('opd_id')->get();

        return view('dashboard.pages.intervensi.realisasi.manusia.subIndikator.index', ['realisasiManusia' => $realisasiManusia, 'totalMenungguKonfirmasiRealisasi' => $totalMenungguKonfirmasiRealisasiManusia, 'tahun' => $tahun]);
    }

    public function tabelLaporan(Request $request)
    {
        if ($request->ajax()) {
            $data = RealisasiManusia::with('perencanaanManusia')->where('perencanaan_manusia_id', $request->id_perencanaan)
                ->where(function ($query) {
                    if (Auth::user()->role == 'OPD') {
                        $query->whereHas('perencanaanManusia', function ($q) {
                            $q->where('opd_id', Auth::user()->opd_id);
                        });
                        $query->orWhere(function ($q) { // OPD Terkait hanya bisa melihat yang telah di setujui
                            $q->whereHas('perencanaanManusia', function ($q2) {
                                $q2->whereHas('opdTerkaitManusia', function ($q3) {
                                    $q3->where('opd_id', Auth::user()->opd_id);
                                });
                            });
                            // $q->where('status', 1);
                        });
                    }
                })
                ->latest();
            return DataTables::of($data)
                ->addIndexColumn()

                ->addColumn('status', function ($row) {
                    if ($row->status == 0) {
                        return '<span class="badge badge-pill badge-warning">Menunggu Konfirmasi</span>';
                    } else if ($row->status == 1) {
                        return '<span class="badge badge-pill badge-success">Disetujui</span>';
                    } else {
                        return '<span class="badge badge-pill badge-danger">Ditolak</span>';
                    }
                })

                ->addColumn('jumlah_penduduk', function ($row) {
                    return $row->pendudukRealisasiManusia->count();
                })


                ->addColumn('progress', function ($row) {
                    return $row->progress . ' %';
                })
                ->addColumn('action', function ($row) {
                    $actionBtn = '<div class="text-center justify-content-center text-white my-1">';
                    if ($row->status == 0) {
                        if (Auth::user()->role == 'OPD') {
                            $actionBtn .= '<a href="' . url('realisasi-intervensi-manusia/show-laporan', $row->id) . '" id="btn-show" class="btn btn-rounded btn-primary btn-sm text-white shadow btn-lihat my-1" data-toggle="tooltip" data-placement="top" title="Lihat"><i class="fas fa-eye"></i></a> ';
                            if (Auth::user()->opd_id == $row->perencanaanManusia->opd_id) {
                                $actionBtn .= '<a href="' . route('realisasi-intervensi-manusia.edit', $row->id) . '" id="btn-edit" class="btn btn-rounded btn-warning btn-sm my-1 text-white shadow" data-toggle="tooltip" data-placement="top" title="Ubah"><i class="fas fa-edit"></i></a> ';
                                $actionBtn .= '<button id="btn-delete" class="btn btn-rounded btn-danger btn-sm my-1 text-white shadow btn-delete" data-toggle="tooltip" data-placement="top" title="Hapus" value="' . $row->id . '"><i class="fas fa-trash"></i></button>';
                            }
                        } else { //admin & pimpinan
                            if (Auth::user()->role == 'Admin') {
                                $actionBtn .= '<a href="' . url('realisasi-intervensi-manusia/show-laporan', $row->id) . '" id="btn-show" class="btn btn-rounded btn-secondary btn-sm text-white shadow btn-lihat my-1" data-toggle="tooltip" data-placement="top" title="Konfirmasi"><i class="fas fa-lg fa-clipboard-check"></i></a> ';
                            } else { // pimpinan
                                $actionBtn .= '<a href="' . url('realisasi-intervensi-manusia/show-laporan', $row->id) . '" id="btn-show" class="btn btn-rounded btn-primary btn-sm text-white shadow btn-lihat my-1" data-toggle="tooltip" data-placement="top" title="Lihat"><i class="fas fa-eye"></i></a> ';
                            }
                        }
                    } else if ($row->status == 1) {
                        $actionBtn .= '<a href="' . url('realisasi-intervensi-manusia/show-laporan', $row->id) . '" id="btn-show" class="btn btn-rounded btn-primary btn-sm text-white shadow btn-lihat my-1" data-toggle="tooltip" data-placement="top" title="Lihat"><i class="fas fa-eye"></i></a> ';
                        if (Auth::user()->role == 'Admin') {
                            $actionBtn .= '<a href="' . route('realisasi-intervensi-manusia.edit', $row->id) . '" id="btn-edit" class="btn btn-rounded btn-warning btn-sm my-1 text-white shadow" data-toggle="tooltip" data-placement="top" title="Ubah"><i class="fas fa-edit"></i></a> ';
                        }
                    } else { // > 2
                        $actionBtn .= '<a href="' . url('realisasi-intervensi-manusia/show-laporan', $row->id) . '" id="btn-show" class="btn btn-rounded btn-primary btn-sm text-white shadow btn-lihat my-1" data-toggle="tooltip" data-placement="top" title="Lihat"><i class="fas fa-eye"></i></a> ';
                        if ((Auth::user()->role == 'OPD') && (Auth::user()->opd_id == $row->perencanaanManusia->opd_id)) {
                            $actionBtn .= '<a href="' . route('realisasi-intervensi-manusia.edit', $row->id) . '" id="btn-edit" class="btn btn-rounded btn-warning btn-sm my-1 text-white shadow" data-toggle="tooltip" data-placement="top" title="Ubah"><i class="fas fa-edit"></i></a> ';
                            $actionBtn .= '<button id="btn-delete" class="btn btn-rounded btn-danger btn-sm my-1 text-white shadow btn-delete" data-toggle="tooltip" data-placement="top" title="Hapus" value="' . $row->id . '"><i class="fas fa-trash"></i></button>';
                        }
                    }
                    $actionBtn .= '</div>';
                    return $actionBtn;
                })

                ->rawColumns([
                    'status',
                    'action',
                ])
                ->make(true);
        }
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

    public function createPelaporan(PerencanaanManusia $realisasi_intervensi_manusia)
    {
        $rencana_intervensi_manusia = $realisasi_intervensi_manusia;
        if ((Auth::user()->role == 'Admin') || (Auth::user()->opd_id != $rencana_intervensi_manusia->opd_id)) {
            abort('403', 'Oops! anda tidak memiliki akses ke sini.');
        }

        $countStatusSelainDisetujui = RealisasiManusia::where('perencanaan_manusia_id', $realisasi_intervensi_manusia->id)
            ->whereIn('status', [0, 2])
            ->count();

        if (Auth::user()->role == 'OPD') {
            if ($countStatusSelainDisetujui > 0) {
                abort('403', 'Maaf, anda tidak dapat menambahkan laporan apabila terdapat laporan yang berstatus "Menunggu Dikonfirmasi" / "Ditolak". Untuk Data "Ditolak", silahkan klik tombol "Ubah" pada laporan yang berstatus "Ditolak" dan Perbarui datanya. Kemudian untuk data "Menunggu Konfirmasi", silahkan hubungi Admin untuk dapat diproses secepatnya.');
            }
            if ($rencana_intervensi_manusia->created_at->year != Carbon::now()->year) {
                abort('403', 'Maaf, anda sudah tidak dapat membuat laporan pada sub indikator ini karena sudah berganti tahun.');
            }


            if ($rencana_intervensi_manusia->realisasiManusia->where('progress', 100)->count() > 0) {
                abort('403', 'Maaf, anda sudah tidak dapat membuat laporan pada sub indikator ini karena sudah mencapai progress 100%.');
            }
        }

        $penggunaanAnggaran = 0;
        foreach ($rencana_intervensi_manusia->realisasiManusia->where('status', 1) as $item) {
            $penggunaanAnggaran += $item->penggunaan_anggaran;
        }
        $sisaAnggaran = $rencana_intervensi_manusia->nilai_pembiayaan - $penggunaanAnggaran;
        $data = [
            'rencanaIntervensiManusia' => $rencana_intervensi_manusia,
            'desa' => Desa::all(),
            'pendudukPerencanaanManusia' => json_encode($rencana_intervensi_manusia->pendudukPerencanaanManusia->pluck('penduduk_id')->toArray()),
            'pendudukPerencanaanManusiaArr' => $rencana_intervensi_manusia->pendudukPerencanaanManusia->whereNull('realisasi_manusia_id')->pluck('penduduk_id')->toArray(),
            'opdTerkaitManusia' => json_encode($rencana_intervensi_manusia->opdTerkaitManusia->pluck('opd_id')->toArray()),
            'countSisaAnggaran' => $sisaAnggaran,
        ];

        return view('dashboard.pages.intervensi.realisasi.manusia.pelaporan.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreRealisasiManusiaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rencana_intervensi_manusia = PerencanaanManusia::find($request->id_perencanaan);
        $penggunaanAnggaran = 0;
        foreach ($rencana_intervensi_manusia->realisasiManusia->where('status', 1) as $item) {
            $penggunaanAnggaran += $item->penggunaan_anggaran;
        }
        $sisaAnggaran = $rencana_intervensi_manusia->nilai_pembiayaan - $penggunaanAnggaran;

        $validator = Validator::make(
            $request->all(),
            [
                'penduduk' => 'required',
                'penggunaan_anggaran' => 'required',
            ],
            [
                'penduduk.required' => 'Penduduk harus dipilih',
                'penggunaan_anggaran.required' => 'Penggunaan Anggaran harus diisi',
            ]
        );

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()]);
        }

        if ($request->penggunaan_anggaran > $sisaAnggaran) {
            return 'max_sisa_anggaran';
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

        $bulanSekarang = Carbon::now()->month;

        if (($bulanSekarang >= 1 && $bulanSekarang <= 3)) {
            $tw = 1;
        } else if (($bulanSekarang >= 4 && $bulanSekarang <= 6)) {
            $tw = 2;
        } else if (($bulanSekarang >= 7 && $bulanSekarang <= 9)) {
            $tw = 3;
        } else {
            $tw = 4;
        }

        $countTotalPendudukPerencanaan = PendudukPerencanaanManusia::where('perencanaan_manusia_id', $request->id_perencanaan)->count();
        $countPendudukTerealisasi = PendudukPerencanaanManusia::where('perencanaan_manusia_id', $request->id_perencanaan)->whereNotNull('realisasi_manusia_id')->count();
        $countPendudukDipilih = count($request->penduduk);
        $countPencapaian = ((100 / $countTotalPendudukPerencanaan) * ($countPendudukTerealisasi + $countPendudukDipilih));

        $dataRealisasi = [
            'perencanaan_manusia_id' => $request->id_perencanaan,
            'penggunaan_anggaran' => $request->penggunaan_anggaran,
            'tw' => $tw,
            'progress' => round($countPencapaian, 2),
            'status' => 0,
        ];

        $insertRealisasi = RealisasiManusia::create($dataRealisasi);

        $updatePendudukPerencanaan = PendudukPerencanaanManusia::whereIn('penduduk_id', $request->penduduk)->where('perencanaan_manusia_id', $request->id_perencanaan)->get();

        // update realisasi_manusia_id
        foreach ($updatePendudukPerencanaan as $item) {
            $item->realisasi_manusia_id = $insertRealisasi->id;
            $item->save();
        }

        $no_dokumen = 1;
        $perencanaanManusia = PerencanaanManusia::find($request->id_perencanaan);
        if ($request->nama_dokumen != null) {
            for ($i = 0; $i < $countFileDokumen; $i++) {
                $namaFile = mt_rand() . '-' . $request->nama_dokumen[$i] . '-' . $perencanaanManusia->sub_indikator . '-' . $no_dokumen . '.' . $request->file_dokumen[$i]->getClientOriginalExtension();

                $request->file_dokumen[$i]->storeAs(
                    'uploads/dokumen/realisasi/manusia',
                    $namaFile
                );

                $dataDokumen = [
                    'realisasi_manusia_id' => $insertRealisasi->id,
                    'nama' => $request->nama_dokumen[$i],
                    'file' => $namaFile,
                    'no_urut' => $no_dokumen,
                ];

                DokumenRealisasiManusia::create($dataDokumen);
                $no_dokumen++;
            }
        }

        return response()->json('kirim');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RealisasiManusia  $realisasiManusia
     * @return \Illuminate\Http\Response
     */
    public function show(PerencanaanManusia $realisasi_intervensi_manusia)
    {
        $rencana_intervensi_manusia = $realisasi_intervensi_manusia;
        $penggunaanAnggaran = 0;
        foreach ($rencana_intervensi_manusia->realisasiManusia->where('status', 1) as $item) {
            $penggunaanAnggaran += $item->penggunaan_anggaran;
        }
        $sisaAnggaran = $rencana_intervensi_manusia->nilai_pembiayaan - $penggunaanAnggaran;
        $data = [
            'rencana_intervensi_manusia' => $rencana_intervensi_manusia,
            'tw1' => $rencana_intervensi_manusia->realisasiManusia->where('tw', 1)->where('status', 1)->max('progress'),
            'tw2' => $rencana_intervensi_manusia->realisasiManusia->where('tw', 2)->where('status', 1)->max('progress'),
            'tw3' => $rencana_intervensi_manusia->realisasiManusia->where('tw', 3)->where('status', 1)->max('progress'),
            'tw4' => $rencana_intervensi_manusia->realisasiManusia->where('tw', 4)->where('status', 1)->max('progress'),
            'opdTerkait' => json_encode($rencana_intervensi_manusia->opdTerkaitManusia->pluck('opd_id')->toArray()),
            'opd' => OPD::orderBy('nama')->whereNot('id', $rencana_intervensi_manusia->opd_id)->get(),
            'countPenggunaanAnggaran' => $penggunaanAnggaran,
            'countSisaAnggaran' => $sisaAnggaran,
        ];
        return view('dashboard.pages.intervensi.realisasi.manusia.subIndikator.show', $data);
    }

    public function showLaporan(RealisasiManusia $realisasi_intervensi_manusia)
    {
        $getPendudukTerealisasi = $realisasi_intervensi_manusia->pendudukRealisasiManusia->pluck('penduduk_id')->toArray();
        $penduduk = Penduduk::with('desa')->whereIn('id', $getPendudukTerealisasi)->get();
        $data = [
            'rencana_intervensi_manusia' => $realisasi_intervensi_manusia->perencanaanManusia,
            'realisasi_intervensi_manusia' => $realisasi_intervensi_manusia,
            'dataPendudukRealisasi' => $penduduk,

        ];
        return view('dashboard.pages.intervensi.realisasi.manusia.pelaporan.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RealisasiManusia  $realisasiManusia
     * @return \Illuminate\Http\Response
     */
    public function edit(RealisasiManusia $realisasi_intervensi_manusia)
    {
        if (Auth::user()->role == 'Admin') {
            if (in_array($realisasi_intervensi_manusia->status, [0, 2])) {
                abort('403', 'Oops! anda tidak memiliki akses ke sini.');
            }
        } else if (Auth::user()->role == 'OPD') {
            if (Auth::user()->opd_id != $realisasi_intervensi_manusia->perencanaanManusia->opd_id) {
                abort('403', 'Oops! anda tidak memiliki akses ke sini.');
            }
            if (in_array($realisasi_intervensi_manusia->status, [1])) {
                abort('403', 'Oops! anda tidak memiliki akses ke sini.');
            }
        } else {
            abort('403', 'Oops! anda tidak memiliki akses ke sini.');
        }

        $pendudukPerencanaanManusiaArr = PendudukPerencanaanManusia::where('perencanaan_manusia_id', $realisasi_intervensi_manusia->perencanaan_manusia_id)
            ->where(function ($query) use ($realisasi_intervensi_manusia) {
                $query->where('realisasi_manusia_id', $realisasi_intervensi_manusia->id);
                $query->orWhereNull('realisasi_manusia_id');
            })->pluck('penduduk_id')->toArray();

        $getPendudukBelumTerealisasi = $realisasi_intervensi_manusia->perencanaanManusia->pendudukPerencanaanManusia->whereNull('realisasi_manusia_id')->pluck('penduduk_id')->toArray();
        $penduduk = Penduduk::with('desa')->whereIn('id', $getPendudukBelumTerealisasi)->get();

        $rencana_intervensi_manusia = $realisasi_intervensi_manusia->perencanaanManusia;
        $penggunaanAnggaran = 0;
        foreach ($rencana_intervensi_manusia->realisasiManusia->where('status', 1) as $item) {
            $penggunaanAnggaran += $item->penggunaan_anggaran;
        }
        $sisaAnggaran = $rencana_intervensi_manusia->nilai_pembiayaan - $penggunaanAnggaran;

        $data = [
            'realisasiIntervensiManusia' => $realisasi_intervensi_manusia,
            'rencanaIntervensiManusia' => $realisasi_intervensi_manusia->perencanaanManusia,
            'desa' => Desa::all(),
            'pendudukPerencanaanManusia' => json_encode($realisasi_intervensi_manusia->perencanaanManusia->pendudukPerencanaanManusia->where('realisasi_manusia_id', $realisasi_intervensi_manusia->id)->pluck('penduduk_id')->toArray()),
            'pendudukPerencanaanManusiaArr' => $pendudukPerencanaanManusiaArr,
            'dataPendudukBelumRealisasi' => $penduduk,
            'countSisaAnggaran' => $sisaAnggaran,
        ];

        return view('dashboard.pages.intervensi.realisasi.manusia.pelaporan.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateRealisasiManusiaRequest  $request
     * @param  \App\Models\RealisasiManusia  $realisasiManusia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RealisasiManusia $realisasi_intervensi_manusia)
    {
        $rencana_intervensi_manusia = PerencanaanManusia::find($request->id_perencanaan);
        $penggunaanAnggaran = 0;
        foreach ($rencana_intervensi_manusia->realisasiManusia->where('status', 1) as $item) {
            $penggunaanAnggaran += $item->penggunaan_anggaran;
        }
        $sisaAnggaran = $rencana_intervensi_manusia->nilai_pembiayaan - $penggunaanAnggaran;

        $validator = Validator::make(
            $request->all(),
            [
                'penduduk' => $realisasi_intervensi_manusia->status != 1 ? 'required' : '',
                'penggunaan_anggaran' => $realisasi_intervensi_manusia->status != 1 ? 'required' : '',
            ],
            [
                'penduduk.required' => 'Penduduk harus dipilih',
                'penggunaan_anggaran.required' => 'Penggunaan Anggaran harus diisi',
            ]
        );

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()]);
        }

        if ($realisasi_intervensi_manusia->status != 1 && $request->penggunaan_anggaran > $sisaAnggaran) {
            return 'max_sisa_anggaran';
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

        // update penduduk perencanaan
        if ($realisasi_intervensi_manusia->status != 1) {
            foreach ($realisasi_intervensi_manusia->pendudukRealisasiManusia as $item) {
                $item->realisasi_manusia_id = NULL;
                $item->status = 0;
                $item->save();
            }

            $updatePendudukPerencanaan = PendudukPerencanaanManusia::whereIn('penduduk_id', $request->penduduk)->where('perencanaan_manusia_id', $request->id_perencanaan)->get();

            foreach ($updatePendudukPerencanaan as $item) {
                $item->realisasi_manusia_id = $realisasi_intervensi_manusia->id;
                $item->save();
            }
        }


        // Hapus dokumen lama
        if ($request->deleteDocumentOld != null) {
            $deleteDocumentOld = explode(',', $request->deleteDocumentOld);
            foreach ($deleteDocumentOld as $item) {
                $namaFile = DokumenRealisasiManusia::where('id', $item)->first()->file;
                if (Storage::exists('uploads/dokumen/realisasi/manusia/' . $namaFile)) {
                    Storage::delete('uploads/dokumen/realisasi/manusia/' . $namaFile);
                }
                DokumenRealisasiManusia::where('id', $item)->delete();
            }
        }

        // update deskripsi/title dokumen lama
        if ($request->nama_dokumen_old) {
            foreach ($request->nama_dokumen_old as $key => $value) {
                $idUpdateNama = $realisasi_intervensi_manusia->dokumenRealisasiManusia[$key]->id;
                $dataDokumen = DokumenRealisasiManusia::find($idUpdateNama);

                $dataDokumen->update([
                    'nama' => $request->nama_dokumen_old[$key],
                ]);
            }
        }

        //  update file dokumen lama
        if ($request->file_dokumen_old) {
            foreach ($request->file_dokumen_old as $key => $value) {
                $idUpdateDokumen = $realisasi_intervensi_manusia->dokumenRealisasiManusia[$key]->id;
                $dataDokumen = DokumenRealisasiManusia::find($idUpdateDokumen);
                if (Storage::exists('uploads/dokumen/realisasi/manusia/' . $dataDokumen->file)) {
                    Storage::delete('uploads/dokumen/realisasi/manusia/' . $dataDokumen->file);
                }

                $namaFile = mt_rand() . '-' . $request->nama_dokumen_old[$key] . '-' . $realisasi_intervensi_manusia->perencanaanManusia->sub_indikator . '-' .  $dataDokumen->no_urut . '.' . $value->getClientOriginalExtension();
                $value->storeAs('uploads/dokumen/realisasi/manusia/', $namaFile);

                $update = [
                    'nama' => $request->nama_dokumen_old[$key],
                    'file' => $namaFile,
                ];

                $dataDokumen->update($update);
            }
        }

        // update dokumen baru
        $no_dokumen = $realisasi_intervensi_manusia->dokumenRealisasiManusia->max('no_urut') + 1;
        if ($request->nama_dokumen != null) {
            for ($i = 0; $i < $countFileDokumen; $i++) {
                $namaFile = mt_rand() . '-' . $request->nama_dokumen[$i] . '-' . $realisasi_intervensi_manusia->perencanaanManusia->sub_indikator . '-' .  $no_dokumen . '.' . $request->file_dokumen[$i]->getClientOriginalExtension();
                $request->file_dokumen[$i]->storeAs(
                    'uploads/dokumen/realisasi/manusia/',
                    $namaFile
                );

                $dataDokumen = [
                    'realisasi_manusia_id' => $realisasi_intervensi_manusia->id,
                    'nama' => $request->nama_dokumen[$i],
                    'file' => $namaFile,
                    'no_urut' => $no_dokumen,
                ];

                DokumenRealisasiManusia::create($dataDokumen);
                $no_dokumen++;
            }
        }

        // update data laporan
        $countTotalPendudukPerencanaan = PendudukPerencanaanManusia::where('perencanaan_manusia_id', $request->id_perencanaan)->count();
        $countPendudukTerealisasi = PendudukPerencanaanManusia::where('perencanaan_manusia_id', $request->id_perencanaan)->whereNotNull('realisasi_manusia_id')->count();
        // $countPendudukDipilih = count($request->penduduk);
        $countPencapaian = ((100 / $countTotalPendudukPerencanaan) * $countPendudukTerealisasi);

        $dataRealisasi = [];
        if ($realisasi_intervensi_manusia->status != 1) {
            $dataRealisasi = [
                'penggunaan_anggaran' => $request->penggunaan_anggaran,
                'progress' => round($countPencapaian, 2)
            ];
        }

        if (Auth::user()->role == 'OPD') {
            $dataRealisasi['status'] = 0;
            $dataRealisasi['alasan_ditolak'] = '-';
        }
        $realisasi_intervensi_manusia->update($dataRealisasi);

        return response()->json('perbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RealisasiManusia  $realisasiManusia
     * @return \Illuminate\Http\Response
     */
    public function destroy(RealisasiManusia $realisasiManusia)
    {
        //
    }

    public function konfirmasi(RealisasiManusia $realisasi_intervensi_manusia, Request $request)
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

        $realisasi_intervensi_manusia->update($data);

        // update penduduk perencanaan
        foreach ($realisasi_intervensi_manusia->pendudukRealisasiManusia as $item) {
            if ($request->status == 1) {
                $item->status = 1;
            } else {
                $item->status = 2;
            }
            $item->save();
        }

        return response()->json(['success' => 'Berhasil mengkonfirmasi']);
    }

    public function updateOPD(PerencanaanManusia $realisasi_intervensi_manusia, Request $request)
    {
        $rencana_intervensi_manusia = $realisasi_intervensi_manusia;
        $rencana_intervensi_manusia->opdTerkaitManusia()->delete();

        foreach ($request->opd_terkait as $item) {
            $data = [
                'perencanaan_manusia_id' => $rencana_intervensi_manusia->id,
                'opd_id' => $item,
            ];
            OPDTerkaitManusia::create($data);
        }
        return $realisasi_intervensi_manusia;
    }

    public function deleteOPD(OPDTerkaitManusia $realisasi_intervensi_manusia)
    {
        $realisasi_intervensi_manusia->delete();
        return response()->json(['success' => 'Berhasil menghapus OPD terkait']);
    }

    public function deleteLaporan(RealisasiManusia $realisasi_intervensi_manusia)
    {
        if ($realisasi_intervensi_manusia->pendudukRealisasiManusia) {
            foreach ($realisasi_intervensi_manusia->pendudukRealisasiManusia as $item) {
                $data = [
                    'status' => 0,
                    'realisasi_manusia_id' => NULL,
                ];
                $item->update($data);
            }
        }

        if ($realisasi_intervensi_manusia->dokumenRealisasiManusia) {
            foreach ($realisasi_intervensi_manusia->dokumenRealisasiManusia as $item) {
                $namaFile = $item->file;
                if (Storage::exists('uploads/dokumen/realisasi/manusia/' . $namaFile)) {
                    Storage::delete('uploads/dokumen/realisasi/manusia/' . $namaFile);
                }
            }
            $realisasi_intervensi_manusia->dokumenRealisasiManusia()->delete();
        }

        $realisasi_intervensi_manusia->delete();
        return response()->json(['success' => 'Berhasil menghapus laporan']);
    }

    public function deleteSemuaLaporan(PerencanaanManusia $realisasi_intervensi_manusia)
    {
        $rencana_intervensi_manusia = $realisasi_intervensi_manusia;

        if ($rencana_intervensi_manusia->realisasiManusia) {
            foreach ($rencana_intervensi_manusia->realisasiManusia as $item) {
                foreach ($item->pendudukRealisasiManusia as $item2) {
                    $data = [
                        'status' => 0,
                        'realisasi_manusia_id' => NULL,
                    ];
                    $item2->update($data);
                }
                foreach ($item->dokumenRealisasiManusia as $item3) {
                    $namaFile = $item3->file;
                    if (Storage::exists('uploads/dokumen/realisasi/manusia/' . $namaFile)) {
                        Storage::delete('uploads/dokumen/realisasi/manusia/' . $namaFile);
                    }
                }
                $item->dokumenRealisasiManusia()->delete();
            }

            $rencana_intervensi_manusia->realisasiManusia()->delete();
        }
        return response()->json(['success' => 'Berhasil menghapus laporan']);
    }

    function unique_multidim_array($array, $key)
    {
        $temp_array = array();
        $i = 0;
        $key_array = array();

        foreach ($array as $val) {
            if (!in_array($val[$key], $key_array)) {
                $key_array[$i] = $val[$key];
                $temp_array[$i] = $val;
            }
            $i++;
        }
        return $temp_array;
    }

    public function hasilRealisasi(Request $request)
    {
        $habitatManusia = PendudukPerencanaanManusia::where('status', 1)
            ->groupBy('penduduk_id')
            ->pluck('penduduk_id')
            ->toArray();

        $dataPenduduk = Penduduk::with('listIndikator', 'desa')->whereIn('id', $habitatManusia);

        if ($request->ajax()) {
            $data = $dataPenduduk
                // filtering
                ->where(function ($query) use ($request) {
                    if ($request->opd_filter && $request->opd_filter != 'semua') {
                        $query->whereHas('listIndikator', function ($query2) use ($request) {
                            $query2->whereHas('perencanaanManusia', function ($query3) use ($request) {
                                $query3->where(function ($query4) use ($request) {
                                    $query4->where('opd_id', $request->opd_filter);
                                    $query4->orWhereHas('opdTerkaitManusia', function ($query5) use ($request) {
                                        $query5->where('opd_id', $request->opd_filter);
                                    });
                                });
                                if ($request->tahun_filter && $request->tahun_filter != 'semua') {
                                    $query3->whereYear('created_at', $request->tahun_filter);
                                }
                            });
                        });
                    }

                    if ($request->indikator_filter && $request->indikator_filter != 'semua') {
                        $query->whereHas('listIndikator', function ($query2) use ($request) {
                            $query2->whereHas('perencanaanManusia', function ($query3) use ($request) {
                                $query3->where('id', $request->indikator_filter);
                                if ($request->tahun_filter && $request->tahun_filter != 'semua') {
                                    $query3->whereYear('created_at', $request->tahun_filter);
                                }
                            });
                        });
                    }

                    if ($request->tahun_filter && $request->tahun_filter != 'semua') {
                        $query->whereHas('listIndikator', function ($query2) use ($request) {
                            $query2->whereHas('perencanaanManusia', function ($query3) use ($request) {
                                $query3->whereYear('created_at', $request->tahun_filter);
                            });
                        });
                    }

                    if ($request->search_filter) {
                        $query->where(function ($query2) use ($request) {
                            $query2->where('nama', 'like', '%' . $request->search_filter . '%');
                        });
                    }
                });
            return DataTables::of($data)
                ->addIndexColumn()

                ->addColumn('list_indikator', function ($row)  use ($request) {
                    $list = '<ol class="mb-0">';
                    foreach ($row->listIndikator as $row2) {
                        if ($request->tahun_filter && $request->tahun_filter != 'semua') {
                            if (Carbon::parse($row2->perencanaanManusia->created_at)->format('Y') == $request->tahun_filter) {
                                $list .= '<li>' . $row2->perencanaanManusia->sub_indikator . '</li>';
                            }
                        } else {
                            $list .= '<li>' . $row2->perencanaanManusia->sub_indikator . '</li>';
                        }
                    }
                    $list .= '</ol>';
                    return $list;
                })

                ->addColumn('list_opd', function ($row) use ($request) {
                    $list = '<ol class="mb-0">';
                    foreach ($row->listIndikator as $row2) {
                        if ($request->tahun_filter && $request->tahun_filter != 'semua') {
                            if (Carbon::parse($row2->perencanaanManusia->created_at)->format('Y') == $request->tahun_filter) {
                                $list .= '<li class="font-weight-bold">' . $row2->perencanaanManusia->opd->nama . '</li>';
                                if ($row2->perencanaanManusia->opdTerkaitManusia) {
                                    foreach ($row2->perencanaanManusia->opdTerkaitManusia as $row3) {
                                        $list .= '<p class="p-0 m-0"> -' . $row3->opd->nama . '</p>';
                                    }
                                }
                            }
                        } else {
                            $list .= '<li class="font-weight-bold">' . $row2->perencanaanManusia->opd->nama . '</li>';
                            if ($row2->perencanaanManusia->opdTerkaitManusia) {
                                foreach ($row2->perencanaanManusia->opdTerkaitManusia as $row3) {
                                    $list .= '<p class="p-0 m-0"> -' . $row3->opd->nama . '</p>';
                                }
                            }
                        }
                    }
                    $list .= '</ol>';
                    return $list;
                })

                ->addColumn('tanggal_intervensi', function ($row) use ($request) {
                    $list = '<ol class="mb-0">';
                    foreach ($row->listIndikator as $row2) {
                        if ($request->tahun_filter && $request->tahun_filter != 'semua') {
                            if (Carbon::parse($row2->realisasiManusia->created_at)->format('Y') == $request->tahun_filter) {
                                $list .= '<li>' . Carbon::parse($row2->realisasiManusia->created_at)->translatedFormat('d F Y') . '</li>';
                            }
                        } else {
                            $list .= '<li>' . Carbon::parse($row2->realisasiManusia->created_at)->translatedFormat('d F Y') . '</li>';
                        }
                    }
                    $list .= '</ol>';
                    return $list;
                })

                ->rawColumns([
                    'list_indikator',
                    'list_opd',
                    'tanggal_intervensi'
                ])
                ->make(true);
        }

        $filterSubIndikator = [];
        $filterOpd = [];

        foreach ($dataPenduduk->get() as $item) {
            foreach ($item->listIndikator as $row) {
                $dataSubIndikator = [
                    'id' => $row->perencanaanManusia->id,
                    'sub_indikator' => $row->perencanaanManusia->sub_indikator,
                    'tahun' => $row->perencanaanManusia->created_at->format('Y'),
                    'created_at' => $row->perencanaanManusia->created_at
                ];
                $dataOpd = [
                    'id' => $row->perencanaanManusia->opd->id,
                    'opd' => $row->perencanaanManusia->opd->nama
                ];
                array_push($filterSubIndikator, $dataSubIndikator);
                array_push($filterOpd, $dataOpd);
                if ($row->perencanaanManusia->opdTerkaitManusia) {
                    foreach ($row->perencanaanManusia->opdTerkaitManusia as $row2) {
                        $dataOpdTerkait = [
                            'id' => $row2->opd->id,
                            'opd' => $row2->opd->nama
                        ];
                        array_push($filterOpd, $dataOpdTerkait);
                    }
                }
            }
        }

        array_multisort(array_column($filterSubIndikator, 'created_at'), SORT_DESC, $filterSubIndikator);

        $filterSubIndikator = $this->unique_multidim_array($filterSubIndikator, 'id');
        $filterOpd = $this->unique_multidim_array($filterOpd, 'id');
        $filterTahun = $this->unique_multidim_array($filterSubIndikator, 'tahun');

        return view('dashboard.pages.hasilRealisasi.manusia.index', ['filterSubIndikator' => $filterSubIndikator, 'filterOpd' => $filterOpd, 'filterTahun' => $filterTahun]);
    }


    public function export()
    {
        $dataRealisasi = PerencanaanManusia::with('opd', 'pendudukPerencanaanManusia', 'realisasiManusia')
            ->where('status', 1)
            ->where(function ($query) {
                if (Auth::user()->role == 'OPD') {
                    $query->where('opd_id', Auth::user()->opd_id);
                    $query->orWhereHas('opdTerkaitManusia', function ($q) {
                        $q->where('status', 1);
                        $q->where('opd_id', Auth::user()->opd_id);
                    });
                }
            })
            ->latest()->get();
        // return view('dashboard.pages.intervensi.realisasi.manusia.subIndikator.export', ['dataPerencanaan' => $dataPerencanaan]);

        $tanggal = Carbon::parse(Carbon::now())->translatedFormat('d F Y');

        return Excel::download(new RealisasiManusiaExport($dataRealisasi), "Export Data Realisasi Manusia" . "-" . $tanggal . "-" . rand(1, 9999) . '.xlsx');
    }

    public function exportHasilRealisasi()
    {
        $penduduk = PendudukPerencanaanManusia::where('status', 1)
            ->groupBy('penduduk_id')
            ->pluck('penduduk_id')
            ->toArray();

        $dataRealisasi = Penduduk::with('listIndikator', 'desa')->whereIn('id', $penduduk)
            ->get();
        // return view('dashboard.pages.hasilRealisasi.manusia.export', ['dataRealisasi' => $dataRealisasi]);

        $tanggal = Carbon::parse(Carbon::now())->translatedFormat('d F Y');

        return Excel::download(new HasilRealisasiManusiaExport($dataRealisasi), "Export Data Hasil Realisasi Manusia" . "-" . $tanggal . "-" . rand(1, 9999) . '.xlsx');
    }
}
