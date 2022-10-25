<?php

namespace App\Http\Controllers;

use App\Exports\DaftarPengukuranAnakExport;
use App\Exports\DemografiPengukuranAnakExport;
use App\Models\Anak;
use App\Models\Desa;
use App\Models\Kecamatan;
use App\Models\PengukuranAnak;
use App\Models\Posyandu;
use App\Models\Puskesmas;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Facades\Excel;
use Yajra\DataTables\Facades\DataTables;

class DaftarPengukuranAnakController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Anak::with(['pengukuranAnakTerakhir'])->where(function ($query) use ($request) {
                if ($request->nama_nik) {
                    $query->where('nama', 'LIKE', '%' .  $request->nama_nik . '%');
                    $query->orWhere('nik', 'LIKE', '%' . $request->nama_nik . '%');
                }
            })->where(function ($query) use ($request) {
                if ($request->jenis_filter == "wilayah") {
                    if ($request->kecamatan_id && $request->kecamatan_id != "semua") {
                        $query->whereHas('orangTua', function ($query) use ($request) {
                            $query->whereHas('desa', function ($query) use ($request) {
                                $query->where('kecamatan_id', $request->kecamatan_id);
                            });
                        });
                    }

                    if ($request->desa_id && $request->desa_id != "semua") {
                        $query->whereHas('orangTua', function ($query) use ($request) {
                            $query->where('desa_id', $request->desa_id);
                        });
                    }
                }

                if ($request->jenis_filter == 'pelayanan_kesehatan') {
                    if ($request->puskesmas_id && $request->puskesmas_id != "semua") {
                        $query->whereHas('pengukuranAnakTerakhir', function ($query) use ($request) {
                            $query->where('puskesmas_id', $request->puskesmas_id);
                        });
                    }

                    if ($request->posyandu_id && $request->posyandu_id != "semua") {
                        $query->whereHas('pengukuranAnakTerakhir', function ($query) use ($request) {
                            $query->where('posyandu_id', $request->posyandu_id);
                        });
                    }
                }

                if ($request->jenis_kelamin && $request->jenis_kelamin != "semua") {
                    $query->where('jenis_kelamin', $request->jenis_kelamin);
                }
            })->where(function ($query) use ($request) {
                if ($request->bb_u && $request->bb_u != "semua") {
                    $query->whereHas('pengukuranAnakTerakhir', function ($query) use ($request) {
                        $query->where('bb_u', $request->bb_u);
                    });
                }

                if ($request->tb_u && $request->tb_u != "semua") {
                    $query->whereHas('pengukuranAnakTerakhir', function ($query) use ($request) {
                        $query->where('tb_u', $request->tb_u);
                    });
                }

                if ($request->bb_tb && $request->bb_tb != "semua") {
                    $query->whereHas('pengukuranAnakTerakhir', function ($query) use ($request) {
                        $query->where('bb_tb', $request->bb_tb);
                    });
                }
            })->orderBy('created_at', 'desc')->get()->sortByDesc(function ($data) {
                return $data->pengukuranAnakLewatTanggalLahir->count();
            });
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('nama', function ($row) {
                    $nama = '<p class="mt-2 mb-0">' .  $row->nama . '</p>';

                    if (count($row->pengukuranAnakLewatTanggalLahir) > 0) {
                        $nama .= '<p class="blink-soft"><span class="badge badge-danger"> Terdapat Pengukuran yang Tanggal Pengukurannya Kurang Dari Tanggal Lahir</span></p>';
                    }
                    return $nama;
                })
                ->addColumn('tanggal_lahir', function ($row) {
                    return Carbon::parse($row->tanggal_lahir)->translatedFormat('d F Y');
                })
                ->addColumn('tanggal_pengukuran', function ($row) {
                    if ($row->pengukuranAnakTerakhir) {
                        return Carbon::parse($row->pengukuranAnakTerakhir->tanggal_pengukuran)->translatedFormat('d F Y');
                    } else {
                        return "<span class='badge badge-primary'>Belum Ada</span>";
                    }
                })
                ->addColumn('usia_saat_ukur', function ($row) {
                    if ($row->pengukuranAnakTerakhir) {
                        $tanggalLahir = Carbon::parse($row->tanggal_lahir)->format('Y-m-d');
                        $tanggalUkur = Carbon::parse($row->pengukuranAnakTerakhir->tanggal_pengukuran)->format('Y-m-d');
                        return usiaSebut($tanggalLahir, $tanggalUkur);
                        // return Carbon::parse($row->pengukuranAnakTerakhir->tanggal_pengukuran)->translatedFormat('d F Y');
                    } else {
                        return "<span class='badge badge-primary'>Belum Ada</span>";
                    }
                })
                ->addColumn('berat', function ($row) {
                    if ($row->pengukuranAnakTerakhir) {
                        return $row->pengukuranAnakTerakhir->berat . ' Kg';
                    } else {
                        return "<span class='badge badge-primary'>Belum Ada</span>";
                    }
                })
                ->addColumn('tinggi', function ($row) {
                    if ($row->pengukuranAnakTerakhir) {
                        return $row->pengukuranAnakTerakhir->tinggi . ' Cm';
                    } else {
                        return "<span class='badge badge-primary'>Belum Ada</span>";
                    }
                })
                ->addColumn('lila', function ($row) {
                    if ($row->pengukuranAnakTerakhir) {
                        return $row->pengukuranAnakTerakhir->lila;
                    } else {
                        return "<span class='badge badge-primary'>Belum Ada</span>";
                    }
                })
                ->addColumn('bb_u', function ($row) {
                    if ($row->pengukuranAnakTerakhir) {
                        return $row->pengukuranAnakTerakhir->bb_u;
                    } else {
                        return "<span class='badge badge-primary'>Belum Ada</span>";
                    }
                })
                ->addColumn('tb_u', function ($row) {
                    if ($row->pengukuranAnakTerakhir) {
                        return $row->pengukuranAnakTerakhir->tb_u;
                    } else {
                        return "<span class='badge badge-primary'>Belum Ada</span>";
                    }
                })
                ->addColumn('bb_tb', function ($row) {
                    if ($row->pengukuranAnakTerakhir) {
                        return $row->pengukuranAnakTerakhir->bb_tb;
                    } else {
                        return "<span class='badge badge-primary'>Belum Ada</span>";
                    }
                })
                ->addColumn('puskesmas', function ($row) {
                    return $row->pengukuranAnakTerakhir->puskesmas->nama ?? '-';
                })
                ->addColumn('posyandu', function ($row) {
                    return $row->pengukuranAnakTerakhir->posyandu->nama ?? '-';
                })
                ->addColumn('kecamatan', function ($row) {
                    return $row->orangTua->desa->kecamatan->nama ?? '-';
                })
                ->addColumn('desa', function ($row) {
                    return $row->orangTua->desa->nama ?? '-';
                })
                ->addColumn('action', function ($row) {
                    $actionBtn = '';

                    $actionBtn .= '<button class="btn btn-success btn-rounded btn-sm mr-1 my-1" id="btn-lihat" value="' . $row->id . '"><i class="far fa-eye"></i></button>';

                    if (Auth::user()->role == "Admin") {
                        if ($row->pengukuranAnakTerakhir) {
                            $actionBtn .= '<a class="btn btn-secondary btn-rounded btn-sm mr-1 my-1" href="' . url('pengukuran-anak/' . $row->id)  . '" ><i class="fas fa-ruler"></i></a>';
                        } else {
                            $actionBtn .= '<a class="btn btn-secondary btn-rounded btn-sm mr-1 my-1" href="' . url('pengukuran-anak/' . $row->id . '/create')  . '" ><i class="fas fa-ruler"></i></a>';
                        }
                    } else {
                        $actionBtn .= '<a class="btn btn-secondary btn-rounded btn-sm mr-1 my-1" href="' . url('pengukuran-anak/' . $row->id)  . '" ><i class="fas fa-ruler"></i></a>';
                    }
                    return $actionBtn;
                })
                ->rawColumns(['action', 'nama', 'orang_tua', 'tanggal_pengukuran', 'usia_saat_ukur', 'berat', 'tinggi', 'lila', 'bb_u', 'tb_u', 'bb_tb'])
                ->make(true);
        }

        $daftarKecamatan = Kecamatan::orderBy('nama', 'asc')->get();
        // $daftarJumlahPenduduk = $this->_getJumlahPenduduk();

        return view('dashboard.pages.daftarPengukuranAnak.index', compact(['daftarKecamatan']));
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
     * @param  \App\Models\PengukuranAnak  $pengukuranAnak
     * @return \Illuminate\Http\Response
     */
    public function show(PengukuranAnak $pengukuranAnak)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PengukuranAnak  $pengukuranAnak
     * @return \Illuminate\Http\Response
     */
    public function edit(PengukuranAnak $pengukuranAnak)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PengukuranAnak  $pengukuranAnak
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PengukuranAnak $pengukuranAnak)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PengukuranAnak  $pengukuranAnak
     * @return \Illuminate\Http\Response
     */
    public function destroy(PengukuranAnak $pengukuranAnak)
    {
        //
    }

    public function exportPengukuranAnak(Request $request)
    {
        $daftarPengukuranAnak = Anak::with(['pengukuranAnakTerakhir'])->where(function ($query) use ($request) {
            if ($request->jenis_filter == "wilayah") {
                if ($request->kecamatan_id && $request->kecamatan_id != "semua") {
                    $query->whereHas('orangTua', function ($query) use ($request) {
                        $query->whereHas('desa', function ($query) use ($request) {
                            $query->where('kecamatan_id', $request->kecamatan_id);
                        });
                    });
                }

                if ($request->desa_id && $request->desa_id != "semua") {
                    $query->whereHas('orangTua', function ($query) use ($request) {
                        $query->where('desa_id', $request->desa_id);
                    });
                }
            }

            if ($request->jenis_filter == 'pelayanan_kesehatan') {
                if ($request->puskesmas_id && $request->puskesmas_id != "semua") {
                    $query->whereHas('pengukuranAnakTerakhir', function ($query) use ($request) {
                        $query->where('puskesmas_id', $request->puskesmas_id);
                    });
                }

                if ($request->posyandu_id && $request->posyandu_id != "semua") {
                    $query->whereHas('pengukuranAnakTerakhir', function ($query) use ($request) {
                        $query->where('posyandu_id', $request->posyandu_id);
                    });
                }
            }

            if ($request->jenis_kelamin && $request->jenis_kelamin != "semua") {
                $query->where('jenis_kelamin', $request->jenis_kelamin);
            }
        })->where(function ($query) use ($request) {
            if ($request->bb_u && $request->bb_u != "semua") {
                $query->whereHas('pengukuranAnakTerakhir', function ($query) use ($request) {
                    $query->where('bb_u', $request->bb_u);
                });
            }

            if ($request->tb_u && $request->tb_u != "semua") {
                $query->whereHas('pengukuranAnakTerakhir', function ($query) use ($request) {
                    $query->where('tb_u', $request->tb_u);
                });
            }

            if ($request->bb_tb && $request->bb_tb != "semua") {
                $query->whereHas('pengukuranAnakTerakhir', function ($query) use ($request) {
                    $query->where('bb_tb', $request->bb_tb);
                });
            }
        })->orderBy('created_at', 'desc')->get();

        $tanggal = Carbon::parse(Carbon::now())->translatedFormat('d F Y');

        $jenisKelamin = $request->jenis_kelamin;
        $bbU = $request->bb_u;
        $tbU = $request->tb_u;
        $bbTb = $request->bb_tb;
        $jenisFilter = $request->jenis_filter;
        $kecamatan = Kecamatan::find($request->kecamatan_id);
        $desa = Desa::find($request->desa_id);
        $puskesmas = Puskesmas::find($request->puskesmas_id);
        $posyandu = Posyandu::find($request->posyandu_id);

        return Excel::download(new DaftarPengukuranAnakExport($daftarPengukuranAnak, $jenisKelamin, $bbU, $tbU, $bbTb, $jenisFilter, $kecamatan, $desa, $puskesmas, $posyandu), "Export Data Daftar Pengukuran Anak" . "-" . $tanggal . "-" . rand(1, 9999) . '.xlsx');
    }

    public function exportJumlah(Request $request)
    {
        $tabelJumlah = $this->_tabelJumlah($request);
        $tanggal = Carbon::parse(Carbon::now())->translatedFormat('d F Y');

        return Excel::download(new DemografiPengukuranAnakExport($tabelJumlah), "Export Data Demografi Pengukuran Anak" . "-" . $tanggal . "-" . rand(1, 9999) . '.xlsx');
    }

    private function _tabelJumlah($request)
    {
        $namaKecamatan = Kecamatan::find($request->kecamatan_id);
        $namaWilayah = '';
        if ($namaKecamatan) {
            $wilayah = 'Kecamatan';
            $namaWilayah = $namaKecamatan->nama;
        } else {
            $wilayah = 'Wilayah';
            $namaWilayah = 'Semua';
        }

        $daftarDesa = Desa::orderBy('kecamatan_id', 'asc')->orderBy('nama', 'asc')->whereHas('kecamatan', function ($query) use ($request) {
            if ($request->kecamatan_id && $request->kecamatan_id != "semua") {
                $query->where('id', $request->kecamatan_id);
            }
        })->where(function ($query) use ($request) {
            if ($request->desa_id && $request->desa_id != "semua") {
                $query->where('id', $request->desa_id);
            }
        })->get();

        $tabelDesa = [];

        foreach ($daftarDesa as $desa) {
            $query = Anak::with(['pengukuranAnakTerakhir'])->desa($desa->id);
            $totalData = $this->_totalData($query);
            $bbU = $this->_bbu($query);
            $tbU = $this->_tbu($query);
            $bbtb = $this->_bbtb($query);
            $tabelDesa[] = [
                'desa' => $desa->nama,
                'kecamatan' => $desa->kecamatan->nama,
                'total' => $totalData,
                'bbU' => $bbU,
                'tbU' => $tbU,
                'bbTb' => $bbtb
            ];
        }

        return [
            'wilayah' =>  $wilayah,
            'nama_wilayah' => $namaWilayah,
            'tabelDesa' => $tabelDesa
        ];
    }

    public function getJumlah(Request $request)
    {
        $query = Anak::with(['pengukuranAnakTerakhir'])->kecamatan($request->kecamatan_id)->desa($request->desa_id);
        $totalData = $this->_totalData($query);
        $bbU = $this->_bbu($query);
        $tbU = $this->_tbu($query);
        $bbtb = $this->_bbtb($query);

        $namaDesa = Desa::find($request->desa_id);
        $namaKecamatan = Kecamatan::find($request->kecamatan_id);
        $namaWilayah = '';
        if ($namaDesa && $namaKecamatan) {
            $wilayah = 'Desa';
            $namaWilayah = $namaDesa->nama;
        } else if ($namaKecamatan) {
            $wilayah = 'Kecamatan';
            $namaWilayah = $namaKecamatan->nama;
        } else {
            $wilayah = 'Wilayah';
            $namaWilayah = 'Semua';
        }

        return response()->json([
            'wilayah' =>  $wilayah,
            'nama_wilayah' => $namaWilayah,
            'total' => $totalData,
            'bbU' => $bbU,
            'tbU' => $tbU,
            'bbTb' => $bbtb
        ]);
    }

    private function _totalData($query)
    {
        $laki = with(clone $query)->jenisKelamin('Laki-Laki')->count();
        $perempuan = with(clone $query)->jenisKelamin('Perempuan')->count();
        $total = $laki + $perempuan;
        $belumUkur =  with(clone $query)->whereDoesntHave('pengukuranAnakTerakhir')->count();

        return [
            'laki' => $laki,
            'perempuan' => $perempuan,
            'total' => $total,
            'belumUkur' => $belumUkur
        ];
    }

    private function _bbu($query)
    {
        $sangatKurangLaki = with(clone $query)->bbU('Sangat Kurang')->jenisKelamin('Laki-Laki')->count();
        $sangatKurangPerempuan = with(clone $query)->bbU('Sangat Kurang')->jenisKelamin('Perempuan')->count();
        $totalSangatKurang = $sangatKurangLaki + $sangatKurangPerempuan;

        $kurangLaki = with(clone $query)->bbU('Kurang')->jenisKelamin('Laki-Laki')->count();
        $kurangPerempuan = with(clone $query)->bbU('Kurang')->jenisKelamin('Perempuan')->count();
        $totalKurang = $kurangLaki + $kurangPerempuan;

        $normalLaki = with(clone $query)->bbU('Berat Badan Normal')->jenisKelamin('Laki-Laki')->count();
        $normalPerempuan = with(clone $query)->bbU('Berat Badan Normal')->jenisKelamin('Perempuan')->count();
        $totalNormal = $normalLaki + $normalPerempuan;

        $lebihLaki = with(clone $query)->bbU('Berat Badan Lebih')->jenisKelamin('Laki-Laki')->count();
        $lebihPerempuan = with(clone $query)->bbU('Berat Badan Lebih')->jenisKelamin('Perempuan')->count();
        $totalLebih = $lebihLaki + $lebihPerempuan;

        return [
            [
                'nama' => 'Sangat Kurang',
                'laki' => $sangatKurangLaki,
                'perempuan' => $sangatKurangPerempuan,
                'total' => $totalSangatKurang
            ],
            [
                'nama' => 'Kurang',
                'laki' => $kurangLaki,
                'perempuan' => $kurangPerempuan,
                'total' => $totalKurang
            ],
            [
                'nama' => 'Berat Badan Normal',
                'laki' => $normalLaki,
                'perempuan' => $normalPerempuan,
                'total' => $totalNormal
            ],
            [
                'nama' => 'Berat Badan Lebih',
                'laki' => $lebihLaki,
                'perempuan' => $lebihPerempuan,
                'total' => $totalLebih
            ],
        ];
    }

    private function _tbu($query)
    {
        $sangatPendekLaki = with(clone $query)->tbU('Sangat Pendek')->jenisKelamin('Laki-Laki')->count();
        $sangatPendekPerempuan = with(clone $query)->tbU('Sangat Pendek')->jenisKelamin('Perempuan')->count();
        $totalSangatPendek = $sangatPendekLaki + $sangatPendekPerempuan;

        $pendekLaki = with(clone $query)->tbU('Pendek')->jenisKelamin('Laki-Laki')->count();
        $pendekPerempuan = with(clone $query)->tbU('Pendek')->jenisKelamin('Perempuan')->count();
        $totalPendek = $pendekLaki + $pendekPerempuan;

        $normalLaki = with(clone $query)->tbU('Normal')->jenisKelamin('Laki-Laki')->count();
        $normalPerempuan = with(clone $query)->tbU('Normal')->jenisKelamin('Perempuan')->count();
        $totalNormal = $normalLaki + $normalPerempuan;

        $tinggiLaki = with(clone $query)->tbU('Tinggi')->jenisKelamin('Laki-Laki')->count();
        $tinggiPerempuan = with(clone $query)->tbU('Tinggi')->jenisKelamin('Perempuan')->count();
        $totalTinggi = $tinggiLaki + $tinggiPerempuan;

        return [
            [
                'nama' => 'Sangat Pendek',
                'laki' => $sangatPendekLaki,
                'perempuan' => $sangatPendekPerempuan,
                'total' => $totalSangatPendek
            ],
            [
                'nama' => 'Pendek',
                'laki' => $pendekLaki,
                'perempuan' => $pendekPerempuan,
                'total' => $totalPendek
            ],
            [
                'nama' => 'Normal',
                'laki' => $normalLaki,
                'perempuan' => $normalPerempuan,
                'total' => $totalNormal
            ],
            [
                'nama' => 'Tinggi',
                'laki' => $tinggiLaki,
                'perempuan' => $tinggiPerempuan,
                'total' => $totalTinggi
            ],
        ];
    }

    private function _bbtb($query)
    {
        $giziBurukLaki = with(clone $query)->bbTb('Gizi Buruk')->jenisKelamin('Laki-Laki')->count();
        $giziBurukPerempuan = with(clone $query)->bbTb('Gizi Buruk')->jenisKelamin('Perempuan')->count();
        $totalGiziBuruk = $giziBurukLaki + $giziBurukPerempuan;

        $giziKurangLaki = with(clone $query)->bbTb('Gizi Kurang')->jenisKelamin('Laki-Laki')->count();
        $giziKurangPerempuan = with(clone $query)->bbTb('Gizi Kurang')->jenisKelamin('Perempuan')->count();
        $totalGiziKurang = $giziKurangLaki + $giziKurangPerempuan;

        $giziBaikLaki = with(clone $query)->bbTb('Gizi Baik')->jenisKelamin('Laki-Laki')->count();
        $giziBaikPerempuan = with(clone $query)->bbTb('Gizi Baik')->jenisKelamin('Perempuan')->count();
        $totalGiziBaik = $giziBaikLaki + $giziBaikPerempuan;

        $beresikoLaki = with(clone $query)->bbTb('Beresiko Gizi Lebih')->jenisKelamin('Laki-Laki')->count();
        $beresikoPerempuan = with(clone $query)->bbTb('Beresiko Gizi Lebih')->jenisKelamin('Perempuan')->count();
        $totalBeresiko = $beresikoLaki + $beresikoPerempuan;

        $giziLebihLaki = with(clone $query)->bbTb('Gizi Lebih')->jenisKelamin('Laki-Laki')->count();
        $giziLebihPerempuan = with(clone $query)->bbTb('Gizi Lebih')->jenisKelamin('Perempuan')->count();
        $totalGiziLebih = $giziLebihLaki + $giziLebihPerempuan;

        $obesitasLaki = with(clone $query)->bbTb('Obesitas')->jenisKelamin('Laki-Laki')->count();
        $obesitasPerempuan = with(clone $query)->bbTb('Obesitas')->jenisKelamin('Perempuan')->count();
        $totalObesitas = $obesitasLaki + $obesitasPerempuan;

        return [
            [
                'nama' => 'Gizi Buruk',
                'laki' => $giziBurukLaki,
                'perempuan' => $giziBurukPerempuan,
                'total' => $totalGiziBuruk
            ],
            [
                'nama' => 'Gizi Kurang',
                'laki' => $giziKurangLaki,
                'perempuan' => $giziKurangPerempuan,
                'total' => $totalGiziKurang
            ],
            [
                'nama' => 'Gizi Baik',
                'laki' => $giziBaikLaki,
                'perempuan' => $giziBaikPerempuan,
                'total' => $totalGiziBaik
            ],
            [
                'nama' => 'Beresiko Gizi Lebih',
                'laki' => $beresikoLaki,
                'perempuan' => $beresikoPerempuan,
                'total' => $totalBeresiko
            ],
            [
                'nama' => 'Gizi Lebih',
                'laki' => $giziLebihLaki,
                'perempuan' => $giziLebihPerempuan,
                'total' => $totalGiziLebih
            ],
            [
                'nama' => 'Obesitas',
                'laki' => $obesitasLaki,
                'perempuan' => $obesitasPerempuan,
                'total' => $totalObesitas
            ],
        ];
    }
}
