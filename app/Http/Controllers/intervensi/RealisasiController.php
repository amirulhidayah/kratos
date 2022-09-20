<?php

namespace App\Http\Controllers\intervensi;


use Carbon\Carbon;
use App\Models\OPD;
use App\Models\Desa;
use App\Models\Lokasi;
use Illuminate\Http\Request;
use App\Models\Realisasi;
use App\Models\OPDTerkait;
use App\Models\Perencanaan;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\RealisasiExport;
use App\Models\DokumenRealisasi;
use App\Models\LokasiPerencanaan;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;
use App\Exports\HasilRealisasiExport;

class RealisasiController extends Controller
{
    public function dataPerencanaan()
    {
        $query = Perencanaan::with('opd', 'lokasiPerencanaan', 'realisasi', 'opdTerkait')
            ->where('status', 1)
            ->where(function ($query) {
                if (Auth::user()->role == 'OPD') {
                    $query->where('opd_id', Auth::user()->opd_id);
                    $query->orWhereHas('opdTerkait', function ($q) {
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
        $realisasi = $this->dataPerencanaan();

        if ($request->ajax()) {
            $data = $realisasi
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
                            $query->whereHas('realisasi', function ($query2) use ($request) {
                                $query2->where('status', 1);
                                $query2->havingRaw('max(progress) = 100');
                            });
                        }
                        if ($request->status_filter == 'belum_selesai') {
                            $query->where(function ($query2) use ($request) {
                                $query2->whereHas('realisasi', function ($query3) use ($request) {
                                    $query3->where('status', 1);
                                    $query3->havingRaw('max(progress) != 100');
                                });
                                $query2->orWhereDoesntHave('realisasi');
                            });
                        }
                        if ($request->status_filter == 'belum_ada_laporan') {
                            $query->whereDoesntHave('realisasi');
                        }

                        if (in_array($request->status_filter, array("-", 1, 2))) {
                            $query->whereHas('realisasi', function ($query2) use ($request) {
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
                    foreach ($row->realisasi->where('status', 1) as $item) {
                        $penggunaanAnggaran += $item->penggunaan_anggaran;
                    }
                    return $penggunaanAnggaran;
                })

                ->addColumn('sisa_anggaran', function ($row) {
                    $penggunaanAnggaran = 0;
                    foreach ($row->realisasi->where('status', 1) as $item) {
                        $penggunaanAnggaran += $item->penggunaan_anggaran;
                    }
                    $sisaAnggaran = $row->nilai_pembiayaan - $penggunaanAnggaran;
                    return $sisaAnggaran;
                })

                ->addColumn('progress', function ($row) {
                    if ($row->realisasi->where('status', 1)->count() > 0) {
                        return $row->realisasi->where('status', 1)->max('progress') . ' %';
                    } else {
                        return '0 %';
                    }
                })

                ->addColumn('status', function ($row) {
                    $status = '<div>';
                    if ($row->realisasi->where('status', 1)->max('progress') == 100) {
                        $status .=  '<span class="badge badge-info">Selesai Terealisasi</span>';
                    } else {
                        if ($row->realisasi->where('status', 0)->count() > 0) {
                            $status .= '<span class="badge badge-warning my-1 mx-1">Menunggu Konfirmasi : <span class="font-weight-bold">' . $row->realisasi->where('status', 0)->count() . '</span></span>';
                        }
                        if ($row->realisasi->where('status', 1)->count() > 0) {
                            $status .= '<span class="badge badge-success my-1 mx-1">Laporan Disetujui : <span class="font-weight-bold">' . $row->realisasi->where('status', 1)->count() . '</span></span>';
                        }
                        if ($row->realisasi->where('status', 2)->count() > 0) {
                            $status .= '<span class="badge badge-danger my-1 mx-1">Laporan Ditolak : <span class="font-weight-bold">' . $row->realisasi->where('status', 2)->count() . '</span></span>';
                        }

                        if ($row->realisasi->count() == 0) {
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
                    $actionBtn .= '<a href="' . route('realisasi-intervensi.show', $row->id) . '" id="btn-show" class="btn btn-rounded btn-primary btn-sm text-white shadow btn-lihat my-1" data-toggle="tooltip" data-placement="top" title="Lihat"><i class="fas fa-eye"></i></a> ';
                    $actionBtn .= '</div>';
                    return $actionBtn;
                })

                ->rawColumns([
                    'status',
                    'progress',
                    'opd',
                    'action',
                    'lokasi_keong',
                ])
                ->make(true);
        }

        if (Auth::user()->role == 'OPD') {
            $listPerencanaan = Perencanaan::where('opd_id', Auth::user()->opd_id)->where('status', 1)->pluck('id')->toArray();
            $totalMenungguKonfirmasiRealisasi = Realisasi::whereIn('perencanaan_id', $listPerencanaan)->where('status', 2)->count();
        } else {
            $totalMenungguKonfirmasiRealisasi = Realisasi::where('status', 0)->count();
        }

        $tahun = $this->dataPerencanaan()->select(DB::raw('YEAR(created_at) year'))
            ->groupBy('year')
            ->pluck('year');

        $realisasi = $this->dataPerencanaan()->groupBy('opd_id')->get();

        return view('dashboard.pages.intervensi.realisasi.subIndikator.index', ['realisasi' => $realisasi, 'totalMenungguKonfirmasiRealisasi' => $totalMenungguKonfirmasiRealisasi, 'tahun' => $tahun]);
    }

    public function tabelLaporan(Request $request)
    {
        if ($request->ajax()) {
            $data = Realisasi::with('perencanaan')->where('perencanaan_id', $request->id_perencanaan)
                ->where(function ($query) {
                    if (Auth::user()->role == 'OPD') {
                        $query->whereHas('perencanaan', function ($q) {
                            $q->where('opd_id', Auth::user()->opd_id);
                        });
                        $query->orWhere(function ($q) { // OPD Terkait hanya bisa melihat yang telah di setujui
                            $q->whereHas('perencanaan', function ($q2) {
                                $q2->whereHas('opdTerkait', function ($q3) {
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

                ->addColumn('jumlah_lokasi', function ($row) {
                    return $row->lokasiRealisasi->count();
                })

                ->addColumn('status', function ($row) {
                    if ($row->status == 0) {
                        return '<span class="badge badge-pill badge-warning">Menunggu Konfirmasi</span>';
                    } else if ($row->status == 1) {
                        return '<span class="badge badge-pill badge-success">Disetujui</span>';
                    } else {
                        return '<span class="badge badge-pill badge-danger">Ditolak</span>';
                    }
                })

                ->addColumn('progress', function ($row) {
                    return $row->progress . ' %';
                })
                ->addColumn('action', function ($row) {
                    $actionBtn = '<div class="text-center justify-content-center text-white my-1">';
                    if ($row->status == 0) {
                        if (Auth::user()->role == 'OPD') {
                            $actionBtn .= '<a href="' . url('realisasi-intervensi/show-laporan', $row->id) . '" id="btn-show" class="btn btn-rounded btn-primary btn-sm text-white shadow btn-lihat my-1" data-toggle="tooltip" data-placement="top" title="Lihat"><i class="fas fa-eye"></i></a> ';
                            if (Auth::user()->opd_id == $row->perencanaan->opd_id) {
                                $actionBtn .= '<a href="' . route('realisasi-intervensi.edit', $row->id) . '" id="btn-edit" class="btn btn-rounded btn-warning btn-sm my-1 text-white shadow" data-toggle="tooltip" data-placement="top" title="Ubah"><i class="fas fa-edit"></i></a> ';
                                $actionBtn .= '<button id="btn-delete" class="btn btn-rounded btn-danger btn-sm my-1 text-white shadow btn-delete" data-toggle="tooltip" data-placement="top" title="Hapus" value="' . $row->id . '"><i class="fas fa-trash"></i></button>';
                            }
                        } else { //admin & pimpinan
                            if (Auth::user()->role == 'Admin') {
                                $actionBtn .= '<a href="' . url('realisasi-intervensi/show-laporan', $row->id) . '" id="btn-show" class="btn btn-rounded btn-secondary btn-sm text-white shadow btn-lihat my-1" data-toggle="tooltip" data-placement="top" title="Konfirmasi"><i class="fas fa-lg fa-clipboard-check"></i></a> ';
                            } else { // pimpinan
                                $actionBtn .= '<a href="' . url('realisasi-intervensi/show-laporan', $row->id) . '" id="btn-show" class="btn btn-rounded btn-primary btn-sm text-white shadow btn-lihat my-1" data-toggle="tooltip" data-placement="top" title="Lihat"><i class="fas fa-eye"></i></a> ';
                            }
                        }
                    } else if ($row->status == 1) {
                        $actionBtn .= '<a href="' . url('realisasi-intervensi/show-laporan', $row->id) . '" id="btn-show" class="btn btn-rounded btn-primary btn-sm text-white shadow btn-lihat my-1" data-toggle="tooltip" data-placement="top" title="Lihat"><i class="fas fa-eye"></i></a> ';
                        if (Auth::user()->role == 'Admin') {
                            $actionBtn .= '<a href="' . route('realisasi-intervensi.edit', $row->id) . '" id="btn-edit" class="btn btn-rounded btn-warning btn-sm my-1 text-white shadow" data-toggle="tooltip" data-placement="top" title="Ubah"><i class="fas fa-edit"></i></a> ';
                        }
                    } else { // > 2
                        $actionBtn .= '<a href="' . url('realisasi-intervensi/show-laporan', $row->id) . '" id="btn-show" class="btn btn-rounded btn-primary btn-sm text-white shadow btn-lihat my-1" data-toggle="tooltip" data-placement="top" title="Lihat"><i class="fas fa-eye"></i></a> ';
                        if ((Auth::user()->role == 'OPD') && (Auth::user()->opd_id == $row->perencanaan->opd_id)) {
                            $actionBtn .= '<a href="' . route('realisasi-intervensi.edit', $row->id) . '" id="btn-edit" class="btn btn-rounded btn-warning btn-sm my-1 text-white shadow" data-toggle="tooltip" data-placement="top" title="Ubah"><i class="fas fa-edit"></i></a> ';
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


    public function create(Perencanaan $realisasi_intervensi)
    {
    }

    public function createPelaporan(Perencanaan $realisasi_intervensi)
    {
        $rencana_intervensi = $realisasi_intervensi;
        if ((Auth::user()->role == 'Admin') || (Auth::user()->opd_id != $rencana_intervensi->opd_id)) {
            abort('403', 'Oops! anda tidak memiliki akses ke sini.');
        }

        $countStatusSelainDisetujui = Realisasi::where('perencanaan_id', $realisasi_intervensi->id)
            ->whereIn('status', [0, 2])
            ->count();

        if (Auth::user()->role == 'OPD') {
            if ($countStatusSelainDisetujui > 0) {
                abort('403', 'Maaf, anda tidak dapat menambahkan laporan apabila terdapat laporan yang berstatus "Menunggu Dikonfirmasi" / "Ditolak". Untuk Data "Ditolak", silahkan klik tombol "Ubah" pada laporan yang berstatus "Ditolak" dan Perbarui datanya. Kemudian untuk data "Menunggu Konfirmasi", silahkan hubungi Admin untuk dapat diproses secepatnya.');
            }
            if ($rencana_intervensi->created_at->year != Carbon::now()->year) {
                abort('403', 'Maaf, anda sudah tidak dapat membuat laporan pada sub indikator ini karena sudah berganti tahun.');
            }
            if ($rencana_intervensi->realisasi->where('progress', 100)->count() > 0) {
                abort('403', 'Maaf, anda sudah tidak dapat membuat laporan pada sub indikator ini karena sudah mencapai progress 100%.');
            }
        }

        $getLokasiBelumTerealisasi = $rencana_intervensi->lokasiPerencanaan->whereNull('realisasi_id')->pluck('lokasi_id')->toArray();
        $lokasiKeong = Lokasi::with(['desa', 'pemilikLokasi', 'pemilikLokasi.penduduk'])->whereIn('id', $getLokasiBelumTerealisasi)->get();

        $penggunaanAnggaran = 0;
        foreach ($rencana_intervensi->realisasi->where('status', 1) as $item) {
            $penggunaanAnggaran += $item->penggunaan_anggaran;
        }
        $sisaAnggaran = $rencana_intervensi->nilai_pembiayaan - $penggunaanAnggaran;
        $data = [
            'rencanaIntervensi' => $rencana_intervensi,
            'desa' => Desa::all(),
            'lokasiPerencanaan' => json_encode($rencana_intervensi->lokasiPerencanaan->pluck('lokasi_id')->toArray()),
            'lokasiPerencanaanArr' => $rencana_intervensi->lokasiPerencanaan->whereNull('realisasi_id')->pluck('lokasi_id')->toArray(),
            'opdTerkait' => json_encode($rencana_intervensi->opdTerkait->pluck('opd_id')->toArray()),
            'dataMap' => $lokasiKeong,
            'countSisaAnggaran' => $sisaAnggaran,
        ];

        return view('dashboard.pages.intervensi.realisasi.pelaporan.create', $data);
    }

    public function show(Perencanaan $realisasi_intervensi)
    {
        $rencana_intervensi = $realisasi_intervensi;
        $penggunaanAnggaran = 0;
        foreach ($rencana_intervensi->realisasi->where('status', 1) as $item) {
            $penggunaanAnggaran += $item->penggunaan_anggaran;
        }
        $sisaAnggaran = $rencana_intervensi->nilai_pembiayaan - $penggunaanAnggaran;
        $data = [
            'rencana_intervensi' => $rencana_intervensi,
            'tw1' => $rencana_intervensi->realisasi->where('tw', 1)->where('status', 1)->max('progress'),
            'tw2' => $rencana_intervensi->realisasi->where('tw', 2)->where('status', 1)->max('progress'),
            'tw3' => $rencana_intervensi->realisasi->where('tw', 3)->where('status', 1)->max('progress'),
            'tw4' => $rencana_intervensi->realisasi->where('tw', 4)->where('status', 1)->max('progress'),
            'opdTerkait' => json_encode($rencana_intervensi->opdTerkait->pluck('opd_id')->toArray()),
            'opd' => OPD::orderBy('nama')->whereNot('id', $rencana_intervensi->opd_id)->get(),
            'countPenggunaanAnggaran' => $penggunaanAnggaran,
            'countSisaAnggaran' => $sisaAnggaran,
        ];
        return view('dashboard.pages.intervensi.realisasi.subIndikator.show', $data);
    }

    public function store(Request $request)
    {
        $rencana_intervensi = Perencanaan::find($request->id_perencanaan);
        $penggunaanAnggaran = 0;
        foreach ($rencana_intervensi->realisasi->where('status', 1) as $item) {
            $penggunaanAnggaran += $item->penggunaan_anggaran;
        }
        $sisaAnggaran = $rencana_intervensi->nilai_pembiayaan - $penggunaanAnggaran;

        $validator = Validator::make(
            $request->all(),
            [
                'lokasi' => 'required',
                'penggunaan_anggaran' => 'required',
            ],
            [
                'lokasi.required' => 'Lokasi harus dipilih',
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

        $countTotalLokasiPerencanaan = LokasiPerencanaan::where('perencanaan_id', $request->id_perencanaan)->count();
        $countLokasiTerealisasi = LokasiPerencanaan::where('perencanaan_id', $request->id_perencanaan)->whereNotNull('realisasi_id')->count();
        $countLokasiDipilih = count($request->lokasi);
        $countPencapaian = ((100 / $countTotalLokasiPerencanaan) * ($countLokasiTerealisasi + $countLokasiDipilih));

        $dataRealisasi = [
            'perencanaan_id' => $request->id_perencanaan,
            'penggunaan_anggaran' => $request->penggunaan_anggaran,
            'tw' => $tw,
            'progress' => round($countPencapaian, 2),
            'status' => 0,
        ];

        $insertRealisasi = Realisasi::create($dataRealisasi);

        $updateLokasiPerencanaan = LokasiPerencanaan::whereIn('lokasi_id', $request->lokasi)->where('perencanaan_id', $request->id_perencanaan)->get();

        // update realisasi_id
        foreach ($updateLokasiPerencanaan as $item) {
            $item->realisasi_id = $insertRealisasi->id;
            $item->save();
        }

        $no_dokumen = 1;
        $perencanaan = Perencanaan::find($request->id_perencanaan);
        if ($request->nama_dokumen != null) {
            for ($i = 0; $i < $countFileDokumen; $i++) {
                $namaFile = mt_rand() . '-' . $request->nama_dokumen[$i] . '-' . $perencanaan->sub_indikator . '-' . $no_dokumen . '.' . $request->file_dokumen[$i]->getClientOriginalExtension();

                $request->file_dokumen[$i]->storeAs(
                    'uploads/dokumen/realisasi/keong',
                    $namaFile
                );

                $dataDokumen = [
                    'realisasi_id' => $insertRealisasi->id,
                    'nama' => $request->nama_dokumen[$i],
                    'file' => $namaFile,
                    'no_urut' => $no_dokumen,
                ];

                DokumenRealisasi::create($dataDokumen);
                $no_dokumen++;
            }
        }

        return response()->json('kirim');
    }

    public function edit(Realisasi $realisasi_intervensi)
    {
        if (Auth::user()->role == 'Admin') {
            if (in_array($realisasi_intervensi->status, [0, 2])) {
                abort('403', 'Oops! anda tidak memiliki akses ke sini.');
            }
        } else if (Auth::user()->role == 'OPD') {
            if (Auth::user()->opd_id != $realisasi_intervensi->perencanaan->opd_id) {
                abort('403', 'Oops! anda tidak memiliki akses ke sini.');
            }
            if (in_array($realisasi_intervensi->status, [1])) {
                abort('403', 'Oops! anda tidak memiliki akses ke sini.');
            }
        } else {
            abort('403', 'Oops! anda tidak memiliki akses ke sini.');
        }

        $lokasiPerencanaanArr = LokasiPerencanaan::where('perencanaan_id', $realisasi_intervensi->perencanaan_id)
            ->where(function ($query) use ($realisasi_intervensi) {
                $query->where('realisasi_id', $realisasi_intervensi->id);
                $query->orWhereNull('realisasi_id');
            })->pluck('lokasi_id')->toArray();

        $getLokasiBelumTerealisasi = $realisasi_intervensi->perencanaan->lokasiPerencanaan->whereNull('realisasi_id')->pluck('lokasi_id')->toArray();
        $lokasi = Lokasi::with(['desa', 'pemilikLokasi', 'pemilikLokasi.penduduk'])->whereIn('id', $getLokasiBelumTerealisasi)->get();

        $rencana_intervensi = $realisasi_intervensi->perencanaan;
        $penggunaanAnggaran = 0;
        foreach ($rencana_intervensi->realisasi->where('status', 1) as $item) {
            $penggunaanAnggaran += $item->penggunaan_anggaran;
        }
        $sisaAnggaran = $rencana_intervensi->nilai_pembiayaan - $penggunaanAnggaran;

        $data = [
            'realisasiIntervensi' => $realisasi_intervensi,
            'rencanaIntervensi' => $realisasi_intervensi->perencanaan,
            'desa' => Desa::all(),
            'lokasiPerencanaan' => json_encode($realisasi_intervensi->perencanaan->lokasiPerencanaan->where('realisasi_id', $realisasi_intervensi->id)->pluck('lokasi_id')->toArray()),
            'lokasiPerencanaanArr' => $lokasiPerencanaanArr,
            'opdTerkait' => json_encode($realisasi_intervensi->perencanaan->opdTerkait->pluck('opd_id')->toArray()),
            'opd' => OPD::orderBy('nama')->whereNot('id', Auth::user()->opd_id)->get(),
            'dataMap' => $lokasi,
            'countSisaAnggaran' => $sisaAnggaran,
        ];

        return view('dashboard.pages.intervensi.realisasi.pelaporan.edit', $data);
    }

    public function update(Request $request, Realisasi $realisasi_intervensi)
    {
        $rencana_intervensi = Perencanaan::find($request->id_perencanaan);
        $penggunaanAnggaran = 0;
        foreach ($rencana_intervensi->realisasi->where('status', 1) as $item) {
            $penggunaanAnggaran += $item->penggunaan_anggaran;
        }
        $sisaAnggaran = $rencana_intervensi->nilai_pembiayaan - $penggunaanAnggaran;

        $validator = Validator::make(
            $request->all(),
            [
                'lokasi' => $realisasi_intervensi->status != 1 ? 'required' : '',
                'penggunaan_anggaran' => $realisasi_intervensi->status != 1 ? 'required' : '',
            ],
            [
                'lokasi.required' => 'Lokasi harus dipilih',
                'penggunaan_anggaran.required' => 'Penggunaan Anggaran harus diisi',
            ]
        );

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()]);
        }

        if ($realisasi_intervensi->status != 1 && $request->penggunaan_anggaran > $sisaAnggaran) {
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

        // update lokasi perencanaan
        if ($realisasi_intervensi->status != 1) {
            foreach ($realisasi_intervensi->lokasiRealisasi as $item) {
                $item->realisasi_id = NULL;
                $item->status = 0;
                $item->save();
            }

            $updateLokasiPerencanaan = LokasiPerencanaan::whereIn('lokasi_id', $request->lokasi)->where('perencanaan_id', $request->id_perencanaan)->get();

            foreach ($updateLokasiPerencanaan as $item) {
                $item->realisasi_id = $realisasi_intervensi->id;
                $item->save();
            }
        }

        // Hapus dokumen lama
        if ($request->deleteDocumentOld != null) {
            $deleteDocumentOld = explode(',', $request->deleteDocumentOld);
            foreach ($deleteDocumentOld as $item) {
                $namaFile = DokumenRealisasi::where('id', $item)->first()->file;
                if (Storage::exists('uploads/dokumen/realisasi/keong/' . $namaFile)) {
                    Storage::delete('uploads/dokumen/realisasi/keong/' . $namaFile);
                }
                DokumenRealisasi::where('id', $item)->delete();
            }
        }

        // update deskripsi/title dokumen lama
        if ($request->nama_dokumen_old) {
            foreach ($request->nama_dokumen_old as $key => $value) {
                $idUpdateNama = $realisasi_intervensi->dokumenRealisasi[$key]->id;
                $dataDokumen = DokumenRealisasi::find($idUpdateNama);

                $dataDokumen->update([
                    'nama' => $request->nama_dokumen_old[$key],
                ]);
            }
        }

        //  update file dokumen lama
        if ($request->file_dokumen_old) {
            foreach ($request->file_dokumen_old as $key => $value) {
                $idUpdateDokumen = $realisasi_intervensi->dokumenRealisasi[$key]->id;
                $dataDokumen = DokumenRealisasi::find($idUpdateDokumen);
                if (Storage::exists('uploads/dokumen/realisasi/keong/' . $dataDokumen->file)) {
                    Storage::delete('uploads/dokumen/realisasi/keong/' . $dataDokumen->file);
                }

                $namaFile = mt_rand() . '-' . $request->nama_dokumen_old[$key] . '-' . $realisasi_intervensi->perencanaan->sub_indikator . '-' .  $dataDokumen->no_urut . '.' . $value->getClientOriginalExtension();
                $value->storeAs('uploads/dokumen/realisasi/keong/', $namaFile);

                $update = [
                    'nama' => $request->nama_dokumen_old[$key],
                    'file' => $namaFile,
                ];

                $dataDokumen->update($update);
            }
        }

        // update dokumen baru
        $no_dokumen = $realisasi_intervensi->dokumenRealisasi->max('no_urut') + 1;
        if ($request->nama_dokumen != null) {
            for ($i = 0; $i < $countFileDokumen; $i++) {
                $namaFile = mt_rand() . '-' . $request->nama_dokumen[$i] . '-' . $realisasi_intervensi->perencanaan->sub_indikator . '-' .  $no_dokumen . '.' . $request->file_dokumen[$i]->getClientOriginalExtension();
                $request->file_dokumen[$i]->storeAs(
                    'uploads/dokumen/realisasi/keong/',
                    $namaFile
                );

                $dataDokumen = [
                    'realisasi_id' => $realisasi_intervensi->id,
                    'nama' => $request->nama_dokumen[$i],
                    'file' => $namaFile,
                    'no_urut' => $no_dokumen,
                ];

                DokumenRealisasi::create($dataDokumen);
                $no_dokumen++;
            }
        }

        // update data laporan
        $countTotalLokasiPerencanaan = LokasiPerencanaan::where('perencanaan_id', $request->id_perencanaan)->count();
        $countLokasiTerealisasi = LokasiPerencanaan::where('perencanaan_id', $request->id_perencanaan)->whereNotNull('realisasi_id')->count();
        // $countLokasiDipilih = count($request->lokasi);
        $countPencapaian = ((100 / $countTotalLokasiPerencanaan) * $countLokasiTerealisasi);

        $dataRealisasi = [];
        if ($realisasi_intervensi->status != 1) {
            $dataRealisasi = [
                'penggunaan_anggaran' => $request->penggunaan_anggaran,
                'progress' => round($countPencapaian, 2)
            ];
        }

        if (Auth::user()->role == 'OPD') {
            $dataRealisasi['status'] = 0;
            $dataRealisasi['alasan_ditolak'] = '-';
        }
        $realisasi_intervensi->update($dataRealisasi);

        return response()->json('perbarui');
    }

    public function showLaporan(Realisasi $realisasi_intervensi)
    {
        $getLokasiTerealisasi = $realisasi_intervensi->lokasiRealisasi->pluck('lokasi_id')->toArray();
        $lokasiKeong = Lokasi::with(['desa', 'pemilikLokasi', 'pemilikLokasi.penduduk'])->whereIn('id', $getLokasiTerealisasi)->get();
        $data = [
            'rencana_intervensi' => $realisasi_intervensi->perencanaan,
            'realisasi_intervensi' => $realisasi_intervensi,
            'dataMap' => $lokasiKeong,

        ];
        return view('dashboard.pages.intervensi.realisasi.pelaporan.show', $data);
    }

    public function konfirmasi(Realisasi $realisasi_intervensi, Request $request)
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

        $realisasi_intervensi->update($data);

        // update lokasi perencanaan
        foreach ($realisasi_intervensi->lokasiRealisasi as $item) {
            if ($request->status == 1) {
                $item->status = 1;
            } else {
                $item->status = 2;
            }
            $item->save();
        }

        return response()->json(['success' => 'Berhasil mengkonfirmasi']);
    }

    public function updateOPD(Perencanaan $realisasi_intervensi, Request $request)
    {
        $rencana_intervensi = $realisasi_intervensi;
        $rencana_intervensi->opdTerkait()->delete();

        foreach ($request->opd_terkait as $item) {
            $data = [
                'perencanaan_id' => $rencana_intervensi->id,
                'opd_id' => $item,
            ];
            OPDTerkait::create($data);
        }
        return $realisasi_intervensi;
    }

    public function deleteOPD(OPDTerkait $realisasi_intervensi)
    {
        $realisasi_intervensi->delete();
        return response()->json(['success' => 'Berhasil menghapus OPD terkait']);
    }

    public function deleteLaporan(Realisasi $realisasi_intervensi)
    {
        if ($realisasi_intervensi->lokasiRealisasi) {
            foreach ($realisasi_intervensi->lokasiRealisasi as $item) {
                $data = [
                    'status' => 0,
                    'realisasi_id' => NULL,
                ];
                $item->update($data);
            }
        }

        if ($realisasi_intervensi->dokumenRealisasi) {
            foreach ($realisasi_intervensi->dokumenRealisasi as $item) {
                $namaFile = $item->file;
                if (Storage::exists('uploads/dokumen/realisasi/keong/' . $namaFile)) {
                    Storage::delete('uploads/dokumen/realisasi/keong/' . $namaFile);
                }
            }
            $realisasi_intervensi->dokumenRealisasi()->delete();
        }

        $realisasi_intervensi->delete();
        return response()->json(['success' => 'Berhasil menghapus laporan']);
    }

    public function deleteSemuaLaporan(Perencanaan $realisasi_intervensi)
    {
        $rencana_intervensi = $realisasi_intervensi;

        if ($rencana_intervensi->realisasi) {
            foreach ($rencana_intervensi->realisasi as $item) {
                foreach ($item->lokasiRealisasi as $item2) {
                    $data = [
                        'status' => 0,
                        'realisasi_id' => NULL,
                    ];
                    $item2->update($data);
                }
                foreach ($item->dokumenRealisasi as $item3) {
                    $namaFile = $item3->file;
                    if (Storage::exists('uploads/dokumen/realisasi/keong/' . $namaFile)) {
                        Storage::delete('uploads/dokumen/realisasi/keong/' . $namaFile);
                    }
                }
                $item->dokumenRealisasi()->delete();
            }

            $rencana_intervensi->realisasi()->delete();
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
        $habitatKeong = LokasiPerencanaan::where('status', 1)
            ->groupBy('lokasi_id')
            ->pluck('lokasi_id')
            ->toArray();

        $dataHabitatKeong = Lokasi::with('listIndikator', 'desa')->whereIn('id', $habitatKeong);

        if ($request->ajax()) {
            $data = $dataHabitatKeong
                // filtering
                ->where(function ($query) use ($request) {
                    if ($request->opd_filter && $request->opd_filter != 'semua') {
                        $query->whereHas('listIndikator', function ($query2) use ($request) {
                            $query2->whereHas('perencanaan', function ($query3) use ($request) {
                                $query3->where(function ($query4) use ($request) {
                                    $query4->where('opd_id', $request->opd_filter);
                                    $query4->orWhereHas('opdTerkait', function ($query5) use ($request) {
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
                            $query2->whereHas('perencanaan', function ($query3) use ($request) {
                                $query3->where('id', $request->indikator_filter);
                                if ($request->tahun_filter && $request->tahun_filter != 'semua') {
                                    $query3->whereYear('created_at', $request->tahun_filter);
                                }
                            });
                        });
                    }

                    if ($request->tahun_filter && $request->tahun_filter != 'semua') {
                        $query->whereHas('listIndikator', function ($query2) use ($request) {
                            $query2->whereHas('perencanaan', function ($query3) use ($request) {
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

                ->addColumn('list_indikator', function ($row) use ($request) {
                    $list = '<ol class="mb-0">';
                    foreach ($row->listIndikator as $row2) {
                        if ($request->tahun_filter && $request->tahun_filter != 'semua') {
                            if (Carbon::parse($row2->perencanaan->created_at)->format('Y') == $request->tahun_filter) {
                                $list .= '<li>' . $row2->perencanaan->sub_indikator . '</li>';
                            }
                        } else {
                            $list .= '<li>' . $row2->perencanaan->sub_indikator . '</li>';
                        }
                    }
                    $list .= '</ol>';
                    return $list;
                })

                ->addColumn('list_opd', function ($row) use ($request) {
                    $list = '<ol class="mb-0">';
                    foreach ($row->listIndikator as $row2) {
                        if ($request->tahun_filter && $request->tahun_filter != 'semua') {
                            if (Carbon::parse($row2->perencanaan->created_at)->format('Y') == $request->tahun_filter) {
                                $list .= '<li class="font-weight-bold">' . $row2->perencanaan->opd->nama . '</li>';
                                if ($row2->perencanaan->opdTerkait) {
                                    foreach ($row2->perencanaan->opdTerkait as $row3) {
                                        $list .= '<p class="p-0 m-0"> -' . $row3->opd->nama . '</p>';
                                    }
                                }
                            }
                        } else {
                            $list .= '<li class="font-weight-bold">' . $row2->perencanaan->opd->nama . '</li>';
                            if ($row2->perencanaan->opdTerkait) {
                                foreach ($row2->perencanaan->opdTerkait as $row3) {
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
                            if (Carbon::parse($row2->realisasi->created_at)->format('Y') == $request->tahun_filter) {
                                $list .= '<li>' . Carbon::parse($row2->realisasi->created_at)->translatedFormat('d F Y') . '</li>';
                            }
                        } else {
                            $list .= '<li>' . Carbon::parse($row2->realisasi->created_at)->translatedFormat('d F Y') . '</li>';
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

        foreach ($dataHabitatKeong->get() as $item) {
            foreach ($item->listIndikator as $row) {
                $dataSubIndikator = [
                    'id' => $row->perencanaan->id,
                    'sub_indikator' => $row->perencanaan->sub_indikator,
                    'tahun' => $row->perencanaan->created_at->format('Y'),
                    'created_at' => $row->perencanaan->created_at
                ];
                $dataOpd = [
                    'id' => $row->perencanaan->opd->id,
                    'opd' => $row->perencanaan->opd->nama
                ];
                array_push($filterSubIndikator, $dataSubIndikator);
                array_push($filterOpd, $dataOpd);
                if ($row->perencanaan->opdTerkait) {
                    foreach ($row->perencanaan->opdTerkait as $row2) {
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

        return view('dashboard.pages.hasilRealisasi.keong.index', ['filterSubIndikator' => $filterSubIndikator, 'filterOpd' => $filterOpd, 'filterTahun' => $filterTahun]);
    }

    public function export()
    {
        $dataRealisasi = Perencanaan::with('opd', 'lokasiPerencanaan', 'realisasi')
            ->where('status', 1)
            ->where(function ($query) {
                if (Auth::user()->role == 'OPD') {
                    $query->where('opd_id', Auth::user()->opd_id);
                    $query->orWhereHas('opdTerkait', function ($q) {
                        $q->where('status', 1);
                        $q->where('opd_id', Auth::user()->opd_id);
                    });
                }
            })
            ->latest()->get();
        // return view('dashboard.pages.intervensi.realisasi.keong.subIndikator.export', ['dataRealisasi' => $dataRealisasi]);

        $tanggal = Carbon::parse(Carbon::now())->translatedFormat('d F Y');

        return Excel::download(new RealisasiExport($dataRealisasi), "Export Data Realisasi Habitat Keong" . "-" . $tanggal . "-" . rand(1, 9999) . '.xlsx');
    }

    public function exportHasilRealisasi()
    {
        $habitatKeong = LokasiPerencanaan::where('status', 1)
            ->groupBy('lokasi_id')
            ->pluck('lokasi_id')
            ->toArray();

        $dataRealisasi = Lokasi::with('listIndikator', 'desa')->whereIn('id', $habitatKeong)->get();
        // return view('dashboard.pages.hasilRealisasi.keong.export', ['dataRealisasi' => $dataRealisasi]);

        $tanggal = Carbon::parse(Carbon::now())->translatedFormat('d F Y');

        return Excel::download(new HasilRealisasiExport($dataRealisasi), "Export Data Hasil Realisasi Habitat Keong" . "-" . $tanggal . "-" . rand(1, 9999) . '.xlsx');
    }
}
