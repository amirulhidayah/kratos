<?php

namespace App\Http\Controllers\intervensi;


use Carbon\Carbon;
use App\Models\OPD;
use App\Models\Anak;
use App\Models\Desa;
use App\Models\Lokasi;
use App\Models\OrangTua;
use App\Models\Kecamatan;
use App\Models\Realisasi;
use App\Models\OPDTerkait;
use App\Models\Perencanaan;
use Illuminate\Http\Request;
use App\Models\DesaPerencanaan;
use App\Exports\RealisasiExport;
use App\Models\DokumenRealisasi;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\HasilRealisasiExport;
use App\Models\PendudukRealisasi;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;

class RealisasiController extends Controller
{
    public function dataRealisasi()
    {
        $query = Realisasi::with('perencanaan')
            ->whereHas('perencanaan', function ($query) {
                if (Auth::user()->role == 'OPD') {
                    $query->where('opd_id', Auth::user()->opd_id);
                    $query->orWhereHas('opdTerkait', function ($q) {
                        $q->where('opd_id', Auth::user()->opd_id);
                    });
                }
            })
            ->latest();
        return $query;
    }

    public function index(Request $request)
    {
        $realisasi = $this->dataRealisasi();

        if ($request->ajax()) {
            $data = $realisasi
                // filtering
                ->where(function ($query) use ($request) {
                    if ($request->tahun_filter && $request->tahun_filter != 'semua') {
                        $query->whereYear('created_at', $request->tahun_filter);
                    }

                    if ($request->opd_filter && $request->opd_filter != 'semua') {
                        $query->whereHas('perencanaan', function ($q) use ($request) {
                            $q->where('opd_id', $request->opd_filter);
                        });
                    }

                    if ($request->status_filter && $request->status_filter != 'semua') {
                        $filter = $request->status_filter;
                        if (in_array($filter, array("-", 1, 2, 3))) {
                            if ($filter == "-") {
                                $query->where('status', 0);
                            } else {
                                $query->where('status', $filter);
                            }
                        }
                    }

                    if ($request->search_filter) {
                        $query->whereHas('perencanaan', function ($query2) use ($request) {
                            $query2->whereHas('indikator', function ($query3) use ($request) {
                                $query3->where('nama', 'like', '%' . $request->search_filter . '%');
                            });
                        });
                    }
                })->get();

            return DataTables::of($data)
                ->addIndexColumn()

                ->addColumn('sub_indikator', function ($row) {
                    return $row->perencanaan->indikator->nama;
                })

                ->addColumn('opd', function ($row) {
                    if (Auth::user()->role == 'OPD') {
                        if ($row->perencanaan->opd_id == Auth::user()->opd_id) {
                            return $row->perencanaan->opd->nama;
                        } else {
                            return '<span class="badge badge-primary">' . $row->perencanaan->opd->nama . '</span>';
                        }
                    } else {
                        return $row->perencanaan->opd->nama;
                    }
                })

                ->addColumn('nilai_pembiayaan', function ($row) {
                    return $row->perencanaan->nilai_pembiayaan;
                })

                ->addColumn('jumlah_penduduk', function ($row) {
                    $btn = null;
                    if ($row->status == 3) {
                        if ($row->pendudukRealisasi->count() == 0) {
                            $btn .= '<span class="badge fw-bold badge-warning m-1">Penduduk Belum Ditambahkan</span>';
                        }

                        if ($row->pendudukRealisasi->count() > 0) {
                            $btn .= '<span class="badge badge-count fw-bold m-1">' . $row->pendudukRealisasi->count() . '</span>';
                        }

                        if ($row->perencanaan->opd_id == Auth::user()->opd_id) {
                            $btn .= '<br> <a href="' . url('realisasi-intervensi/tambah-penduduk-realisasi') . '/' . $row->id . '" class="btn btn-info btn-sm btn-rounded shadow-sm text-white"><i class="fas fa-plus"></i> Tambah</a>';
                        }
                        return $btn;
                    } else {
                        if ($row->pendudukRealisasi->count() > 0) {
                            $btn = '<span class="badge badge-count fw-bold m-1">' . $row->pendudukRealisasi->count() . '</span>';
                            return $btn;
                        } else {
                            $btn .= '<span class="badge badge-count fw-bold m-1">' . $row->pendudukRealisasi->count() . '</span>';
                            return $btn;
                        }
                    }
                })

                ->addColumn('status_laporan', function ($row) {
                    if ($row->status == 0) {
                        return '<span class="badge fw-bold badge-warning">Menunggu Konfirmasi</span>';
                    } else if ($row->status == 1) {
                        return '<span class="badge fw-bold badge-success">Disetujui</span>';
                    } else if ($row->status == 2) {
                        return '<span class="badge fw-bold badge-danger">Ditolak</span>';
                    } else if ($row->status == 3) {
                        return '<span class="badge fw-bold badge-info m-1">Dalam Proses</span>';
                    }
                })

                ->addColumn('action', function ($row) {
                    $actionBtn = '<div class="text-center justify-content-center text-white my-1">';
                    if ($row->status == 0) {
                        if (Auth::user()->role == 'OPD') {
                            $actionBtn .= '<a href="' . route('realisasi-intervensi.show', $row->id) . '" id="btn-show" class="btn btn-rounded btn-primary btn-sm text-white shadow btn-lihat my-1" data-toggle="tooltip" data-placement="top" title="Lihat"><i class="fas fa-eye"></i></a> ';
                            if (Auth::user()->opd_id == $row->perencanaan->opd_id) {
                                $actionBtn .= '<a href="' . route('realisasi-intervensi.edit', $row->id) . '" id="btn-edit" class="btn btn-rounded btn-warning btn-sm my-1 text-white shadow" data-toggle="tooltip" data-placement="top" title="Ubah"><i class="fas fa-edit"></i></a> ';
                                $actionBtn .= '<button id="btn-delete" class="btn btn-rounded btn-danger btn-sm my-1 text-white shadow btn-delete" data-toggle="tooltip" data-placement="top" title="Hapus" value="' . $row->id . '"><i class="fas fa-trash"></i></button>';
                            }
                        } else { //admin & pimpinan
                            if (Auth::user()->role == 'Admin') {
                                $actionBtn .= '<a href="' . route('realisasi-intervensi.show', $row->id) . '" id="btn-show" class="btn btn-rounded btn-secondary btn-sm text-white shadow btn-lihat my-1" data-toggle="tooltip" data-placement="top" title="Konfirmasi"><i class="fas fa-lg fa-clipboard-check"></i></a> ';
                            } else {
                                $actionBtn .= '<a href="' . route('realisasi-intervensi.show', $row->id) . '" id="btn-show" class="btn btn-rounded btn-primary btn-sm text-white shadow btn-lihat my-1" data-toggle="tooltip" data-placement="top" title="Lihat"><i class="fas fa-eye"></i></a> ';
                            }
                        }
                    } else if ($row->status == 1) {
                        $actionBtn .= '<a href="' . route('realisasi-intervensi.show', $row->id) . '" id="btn-show" class="btn btn-rounded btn-primary btn-sm text-white shadow btn-lihat my-1" data-toggle="tooltip" data-placement="top" title="Lihat"><i class="fas fa-eye"></i></a> ';
                        if (Auth::user()->role == 'Admin') {
                            $actionBtn .= '<a href="' . route('realisasi-intervensi.edit', $row->id) . '" id="btn-edit" class="btn btn-rounded btn-warning btn-sm my-1 text-white shadow" data-toggle="tooltip" data-placement="top" title="Ubah"><i class="fas fa-edit"></i></a> ';
                            $actionBtn .= '<button id="btn-delete" class="btn btn-rounded btn-danger btn-sm my-1 text-white shadow btn-delete" data-toggle="tooltip" data-placement="top" title="Hapus" value="' . $row->id . '"><i class="fas fa-trash"></i></button>';
                        }
                    } else { // > 2 ditolak / belum menambahkan penduduk
                        $actionBtn .= '<a href="' . route('realisasi-intervensi.show', $row->id) . '" id="btn-show" class="btn btn-rounded btn-primary btn-sm text-white shadow btn-lihat my-1" data-toggle="tooltip" data-placement="top" title="Lihat"><i class="fas fa-eye"></i></a> ';
                        if ((Auth::user()->role == 'OPD') && (Auth::user()->opd_id == $row->perencanaan->opd_id)) {
                            $actionBtn .= '<a href="' . route('realisasi-intervensi.edit', $row->id) . '" id="btn-edit" class="btn btn-rounded btn-warning btn-sm my-1 text-white shadow" data-toggle="tooltip" data-placement="top" title="Ubah"><i class="fas fa-edit"></i></a> ';
                            $actionBtn .= '<button id="btn-delete" class="btn btn-rounded btn-danger btn-sm my-1 text-white shadow btn-delete" data-toggle="tooltip" data-placement="top" title="Hapus" value="' . $row->id . '"><i class="fas fa-trash"></i></button>';
                        }
                    }
                    $actionBtn .= '</div>';
                    return $actionBtn;
                })

                ->rawColumns([
                    'jumlah_penduduk',
                    'status_laporan',
                    'opd',
                    'action',
                ])
                ->make(true);
        }

        if (Auth::user()->role == 'OPD') {
            $totalMenungguKonfirmasiRealisasi = Realisasi::with('perencanaan')->whereHas('perencanaan', function ($q) {
                $q->where('opd_id', Auth::user()->opd_id);
            })->where('status', 2)->count();
        } else {
            $totalMenungguKonfirmasiRealisasi = Realisasi::where('status', 0)->count();
        }

        $tahun = $this->dataRealisasi()->select(DB::raw('YEAR(created_at) year'))
            ->groupBy('year')
            ->pluck('year');

        $opdFilter = [];
        $iter = 1;
        foreach ($this->dataRealisasi()->get() as $item) {
            $data = [
                'id' => $item->perencanaan->opd_id,
                'nama' => $item->perencanaan->opd->nama
            ];
            if ($iter == 1) {
                array_push($opdFilter, $data);
            } else {
                $found_key = array_search($item->perencanaan->opd_id, array_column($opdFilter, 'id'));
                if (!$found_key) {
                    array_push($opdFilter, $data);
                }
            }
            $iter++;
        }

        return view('dashboard.pages.intervensi.realisasi.index', ['opdFilter' => $opdFilter, 'totalMenungguKonfirmasiRealisasi' => $totalMenungguKonfirmasiRealisasi, 'tahun' => $tahun]);
    }

    public function tabelPenduduk(Request $request)
    {
        if ($request->ajax()) {
            $data = PendudukRealisasi::with('orangTua', 'anak')->where('realisasi_id', $request->realisasi_id)
                // filtering
                // ->where(function ($query) use ($request) {
                //     if ($request->tahun_filter && $request->tahun_filter != 'semua') {
                //         $query->whereYear('created_at', $request->tahun_filter);
                //     }

                //     if ($request->opd_filter && $request->opd_filter != 'semua') {
                //         $query->whereHas('perencanaan', function ($q) use ($request) {
                //             $q->where('opd_id', $request->opd_filter);
                //         });
                //     }

                //     if ($request->search_filter) {
                //         $query->whereHas('perencanaan', function ($query) use ($request) {
                //             $query->where('sub_indikator', 'like', '%' . $request->search_filter . '%');
                //         });
                //     }
                // })
                ->orderBy('nomor', 'ASC')
                ->get();

            return DataTables::of($data)
                ->addIndexColumn()

                ->addColumn('nama_ayah', function ($row) {
                    return $row->orangTua->nama_ayah;
                })

                ->addColumn('nama_ibu', function ($row) {
                    return $row->orangTua->nama_ibu;
                })

                ->addColumn('nama_anak', function ($row) {
                    if ($row->sasaran_intervensi != 'Orang Tua') {
                        return $row->anak->nama;
                    }
                })

                ->addColumn('kecamatan', function ($row) {
                    return $row->orangTua->desa->kecamatan->nama;
                })

                ->addColumn('desa', function ($row) {
                    return $row->orangTua->desa->nama;
                })

                ->rawColumns([
                    'status',
                    'opd',
                    'action',
                ])
                ->make(true);
        }
    }

    public function create()
    {
        if (in_array(Auth::user()->role, ['Admin', 'Pimpinan'])) {
            abort('403', 'Oops! anda tidak memiliki akses ke sini.');
        }

        $listPerencanaan = Perencanaan::with('opdTerkait')->whereDoesntHave('realisasi')->where('opd_id', Auth::user()->opd_id)->where('status', 1)->whereYear('created_at', Carbon::now()->year)->get();

        $data = [
            'desa' => Desa::all(),
            'opd' => OPD::orderBy('nama')->whereNot('id', Auth::user()->opd_id)->get(),
            'listPerencanaan' => $listPerencanaan,
            // 'realisasiIntervensi' => $realisasi_intervensi,
            // 'pendudukRealisasi' => $realisasi_intervensi->pendudukRealisasi,
            'kecamatan' => Kecamatan::with('desa')->orderBy('nama')->get(),
            'orangTua' => OrangTua::latest()->get(),
        ];

        return view('dashboard.pages.intervensi.realisasi.create', $data);
    }

    // public function createPenduduk(Realisasi $realisasi_intervensi)
    // {
    //     if (Auth::user()->role == 'Admin') {
    //         if (in_array($realisasi_intervensi->status, [0, 2, 3])) {
    //             abort('403', 'Oops! anda tidak memiliki akses ke sini.');
    //         }
    //     } else if (Auth::user()->role == 'OPD') {
    //         if (Auth::user()->opd_id != $realisasi_intervensi->perencanaan->opd_id) {
    //             abort('403', 'Oops! anda tidak memiliki akses ke sini.');
    //         }
    //         if (in_array($realisasi_intervensi->status, [1])) {
    //             abort('403', 'Oops! anda tidak memiliki akses ke sini.');
    //         }
    //     } else {
    //         abort('403', 'Oops! anda tidak memiliki akses ke sini.');
    //     }


    //     // $pendudukRealisasi = PendudukRealisasi::select('penduduk_realisasi.*', 'orang_tua.nama_ayah', 'orang_tua.nama_ibu', 'anak.nama as nama_anak')
    //     //     ->leftJoin('orang_tua', 'orang_tua.id', '=', 'penduduk_realisasi.orang_tua_id')
    //     //     ->leftJoin('anak', 'anak.id', '=', 'penduduk_realisasi.anak_id')->where('realisasi_id', $realisasi_intervensi->id)
    //     //     ->orderBy('penduduk_realisasi.nomor', 'ASC')
    //     //     ->get();

    //     // dd($pendudukRealisasi);

    //     $data = [
    //         'realisasiIntervensi' => $realisasi_intervensi,
    //         'pendudukRealisasi' => $realisasi_intervensi->pendudukRealisasi,
    //         'kecamatan' => Kecamatan::with('desa')->get(),
    //         'orangTua' => OrangTua::latest()->get(),
    //     ];


    //     // dd()
    //     // dd($data);

    //     return view('dashboard.pages.intervensi.realisasi.penentuanPenduduk.create', $data);

    //     // dd($realisasi_intervensi);
    // }

    public function insertPenduduk(Request $request)
    {
        if (in_array($request->sasaran_intervensi, ['Anak', 'Orang Tua dan Anak'])) {
            $reqAnak = 'required';
        } else {
            $reqAnak = '';
        }

        $validator = Validator::make(
            $request->all(),
            [
                'sasaran_intervensi' => 'required',
                'orang_tua_id' => 'required',
                'anak_id' => $reqAnak,
            ],
            [
                'sasaran_intervensi.required' => 'Sasaran Intervensi harus dipilih',
                'orang_tua_id.required' => 'Orang Tua harus dipilih',
                'anak_id.required' => 'Anak harus dipilih'

            ]
        );

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors(), 'data' => $request->all()]);
        }

        $realisasi = Realisasi::find($request->realisasi_id);

        $pendudukRealisasi = PendudukRealisasi::where('realisasi_id', $request->realisasi_id)
            ->where('sasaran_intervensi', $request->sasaran_intervensi)
            ->where('orang_tua_id', $request->orang_tua_id)
            ->where('anak_id', $request->anak_id)
            ->count();

        if ($pendudukRealisasi > 0) {
            return response()->json('Penduduk Sudah Ada');
        }

        $data = [
            'realisasi_id' => $request->realisasi_id,
            'sasaran_intervensi' => $request->sasaran_intervensi,
            'orang_tua_id' => $request->orang_tua_id,
            'anak_id' => $request->anak_id,
            'nomor' => $request->nomor,
            'status' => $realisasi->status
        ];

        PendudukRealisasi::create($data);

        return response()->json('Berhasil');
    }

    public function deletePenduduk(Request $request)
    {
        $find = PendudukRealisasi::where('realisasi_id', $request->realisasi_id)->where('nomor', $request->nomor)->delete();

        return response()->json('Berhasil');
    }

    public function show(Realisasi $realisasi_intervensi)
    {
        return view('dashboard.pages.intervensi.realisasi.show', compact('realisasi_intervensi'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'sub_indikator' => 'required',
            ],
            [
                'sub_indikator.required' => 'Sub Indikator harus dipilih',
            ]
        );

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()]);
        }

        $perencanaan = Perencanaan::find($request->sub_indikator);
        $perencanaan->opdTerkait()->delete();
        if ($request->opd_terkait) {
            foreach ($request->opd_terkait as $item) {
                $data = [
                    'perencanaan_id' => $perencanaan->id,
                    'opd_id' => $item,
                ];
                OPDTerkait::create($data);
            }
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

        $dataRealisasi = [
            'perencanaan_id' => $perencanaan->id,
            'status' => 3,
        ];

        $insertRealisasi = Realisasi::create($dataRealisasi);

        $no_dokumen = 1;
        if ($request->nama_dokumen != null) {
            for ($i = 0; $i < $countFileDokumen; $i++) {
                $namaFile = mt_rand() . '-' . $request->nama_dokumen[$i] . '-' . $perencanaan->opd->nama . '-' . $no_dokumen . '.' . $request->file_dokumen[$i]->getClientOriginalExtension();

                $request->file_dokumen[$i]->storeAs(
                    'uploads/dokumen/realisasi',
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

        return response()->json(['res' => 'lanjut', 'realisasi_id' => $insertRealisasi->id, 'infoSubIndikator' => $perencanaan->indikator->nama]);
    }

    public function edit(Realisasi $realisasi_intervensi, Request $request)
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

        $urlKedua = \Request::segment(2);

        $listPerencanaan = Perencanaan::with('opdTerkait')
            ->where(function ($q) use ($realisasi_intervensi) {
                $q->whereDoesntHave('realisasi');
                $q->where('opd_id', $realisasi_intervensi->perencanaan->opd_id);
                $q->where('status', 1);
                $q->whereYear('created_at', Carbon::now()->year);
            })
            ->orWhere(function ($q) use ($realisasi_intervensi) {
                $q->where('id', $realisasi_intervensi->perencanaan->id);
            })
            ->get();

        $data = [
            'realisasiIntervensi' => $realisasi_intervensi,
            'pendudukRealisasi' => $realisasi_intervensi->pendudukRealisasi,
            'listPerencanaan' => $listPerencanaan,
            'orangTua' => OrangTua::latest()->get(),
            'opd' => OPD::orderBy('nama')->whereNot('id', Auth::user()->opd_id)->get(),
            'orangTua' => OrangTua::latest()->get(),
            'kecamatan' => Kecamatan::with('desa')->orderBy('nama')->get(),
        ];

        if ($urlKedua == 'tambah-penduduk-realisasi') {
            $data['urlKedua'] = $urlKedua;
        }


        return view('dashboard.pages.intervensi.realisasi.edit', $data);
    }

    public function update(Request $request, Realisasi $realisasi_intervensi)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'sub_indikator' => 'required',
            ],
            [
                'sub_indikator.required' => 'Sub Indikator harus dipilih',
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

        // update opd terkait
        $perencanaan_id = $request->sub_indikator;
        $perencanaan = Perencanaan::find($perencanaan_id);
        $perencanaan->opdTerkait()->delete();
        if ($request->opd_terkait) {
            foreach ($request->opd_terkait as $item) {
                $data = [
                    'perencanaan_id' => $perencanaan->id,
                    'opd_id' => $item,
                ];
                OPDTerkait::create($data);
            }
        }

        // Hapus dokumen lama
        if ($request->deleteDocumentOld != null) {
            $deleteDocumentOld = explode(',', $request->deleteDocumentOld);
            foreach ($deleteDocumentOld as $item) {
                $namaFile = DokumenRealisasi::where('id', $item)->first()->file;
                if (Storage::exists('uploads/dokumen/realisasi/' . $namaFile)) {
                    Storage::delete('uploads/dokumen/realisasi/' . $namaFile);
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
                if (Storage::exists('uploads/dokumen/realisasi/' . $dataDokumen->file)) {
                    Storage::delete('uploads/dokumen/realisasi/' . $dataDokumen->file);
                }

                $namaFile = mt_rand() . '-' . $request->nama_dokumen_old[$key] . '-' . $realisasi_intervensi->perencanaan->opd->nama . '-' .  $dataDokumen->no_urut . '.' . $value->getClientOriginalExtension();
                $value->storeAs('uploads/dokumen/realisasi/', $namaFile);

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
                $namaFile = mt_rand() . '-' . $request->nama_dokumen[$i] . '-' . $realisasi_intervensi->perencanaan->opd->nama . '-' .  $no_dokumen . '.' . $request->file_dokumen[$i]->getClientOriginalExtension();
                $request->file_dokumen[$i]->storeAs(
                    'uploads/dokumen/realisasi/',
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

        $dataRealisasi = [];

        $dataRealisasi['perencanaan_id'] = $perencanaan_id;
        // if ((Auth::user()->role == 'OPD') && ($realisasi_intervensi->status != 3)) {
        //     $dataRealisasi['status'] = 0;
        //     $dataRealisasi['alasan_ditolak'] = '-';
        // }
        $realisasi_intervensi->update($dataRealisasi);

        return response()->json(['res' => 'perbarui', 'infoSubIndikator' => $perencanaan->indikator->nama]);
    }

    public function selesaiDirealisasi(Request $request)
    {
        $realisasiId = $request->realisasiId;
        $realisasi = Realisasi::find($realisasiId);

        $status = ['status' => 0];

        foreach ($realisasi->pendudukRealisasi as $item) {
            $item->update($status);
        }

        $status['alasan_ditolak'] = '-';

        $realisasi->update($status);

        return response()->json(['res' => 'Berhasil']);
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
                'status.required' => 'Konfirmasi harus diisi',
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
        foreach ($realisasi_intervensi->pendudukRealisasi as $item) {
            if ($request->status == 1) {
                $item->status = 1;
            } else {
                $item->status = 2;
            }
            $item->save();
        }

        return response()->json(['success' => 'Berhasil mengkonfirmasi']);
    }

    public function destroy(Realisasi $realisasi_intervensi)
    {
        if ($realisasi_intervensi->dokumenRealisasi) {
            foreach ($realisasi_intervensi->dokumenRealisasi as $item) {
                $namaFile = $item->file;
                if (Storage::exists('uploads/dokumen/realisasi/' . $namaFile)) {
                    Storage::delete('uploads/dokumen/realisasi/' . $namaFile);
                }
            }
            $realisasi_intervensi->dokumenRealisasi()->delete();
        }
        $realisasi_intervensi->pendudukRealisasi()->delete();
        $realisasi_intervensi->delete();

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
        $habitatKeong = DesaPerencanaan::where('status', 1)
            ->groupBy('desa_id')
            ->pluck('desa_id')
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

        return view('dashboard.pages.hasilRealisasi.index', ['filterSubIndikator' => $filterSubIndikator, 'filterOpd' => $filterOpd, 'filterTahun' => $filterTahun]);
    }

    public function export()
    {
        $dataRealisasi = Perencanaan::with('opd', 'desaPerencanaan', 'realisasi')
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
        $habitatKeong = DesaPerencanaan::where('status', 1)
            ->groupBy('desa_id')
            ->pluck('desa_id')
            ->toArray();

        $dataRealisasi = Lokasi::with('listIndikator', 'desa')->whereIn('id', $habitatKeong)->get();
        // return view('dashboard.pages.hasilRealisasi.keong.export', ['dataRealisasi' => $dataRealisasi]);

        $tanggal = Carbon::parse(Carbon::now())->translatedFormat('d F Y');

        return Excel::download(new HasilRealisasiExport($dataRealisasi), "Export Data Hasil Realisasi Habitat Keong" . "-" . $tanggal . "-" . rand(1, 9999) . '.xlsx');
    }
}
