<?php

namespace App\Http\Controllers;

use App\Exports\AnggaranIntervensiExport;
use App\Exports\IntervensiExport;
use PDO;
use App\Models\OPD;
use App\Models\Desa;
use App\Models\Hewan;
use App\Models\Siswa;
use App\Models\Sekolah;
use App\Models\Penduduk;
use App\Models\JumlahHewan;
use App\Models\LokasiHewan;
use App\Models\LokasiKeong;
use Illuminate\Http\Request;
use App\Models\RealisasiHewan;
use App\Models\RealisasiKeong;
use App\Models\PerencanaanHewan;
use App\Models\PerencanaanKeong;
use App\Models\RealisasiManusia;
use App\Models\PerencanaanManusia;
use App\Http\Controllers\Controller;
use App\Models\Anak;
use App\Models\Indikator;
use App\Models\OrangTua;
use App\Models\Perencanaan;
use App\Models\Posyandu;
use App\Models\Puskesmas;
use App\Models\Realisasi;
use App\Models\SumberDana;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $tahun = $request->tahun;
        $totalData = $this->_totalData();
        $intervensi = $this->_intervensi($tahun);

        $tabel = $this->_tabel($tahun);

        $anggaranPerencanaan = $this->_anggaranPerencanaan($tahun);
        $penggunaanAnggaran = $this->_penggunaanAnggaran($tahun);

        $tabelAnggaran = $this->_tabelAnggaran($tahun);

        // $perencanaanKeong = PerencanaanKeong::where(function ($query) {
        //     if (Auth::user()->role == 'OPD') {
        //         $query->where('opd_id', Auth::user()->opd_id);
        //     }
        // })->latest()->get();
        // $totalPerencanaanKeongTidakTerselesaikan = 0;

        // $perencanaanManusia = PerencanaanManusia::where(function ($query) {
        //     if (Auth::user()->role == 'OPD') {
        //         $query->where('opd_id', Auth::user()->opd_id);
        //     }
        // })->latest()->get();
        // $totalPerencanaanManusiaTidakTerselesaikan = 0;

        // $perencanaanHewan = PerencanaanHewan::where(function ($query) {
        //     if (Auth::user()->role == 'OPD') {
        //         $query->where('opd_id', Auth::user()->opd_id);
        //     }
        // })->latest()->get();
        // $totalPerencanaanHewanTidakTerselesaikan = 0;

        // if (Auth::user()->role == 'OPD') {
        //     $totalMenungguKonfirmasiPerencanaanKeong = PerencanaanKeong::where('status', 2)->where('opd_id', Auth::user()->opd_id)->count();
        // $totalMenungguKonfirmasiPerencanaanManusia = PerencanaanManusia::where('status', 2)->where('opd_id', Auth::user()->opd_id)->count();
        // $totalMenungguKonfirmasiPerencanaanHewan = PerencanaanHewan::where('status', 2)->where('opd_id', Auth::user()->opd_id)->count();

        // $listPerencanaanKeong = PerencanaanKeong::where('opd_id', Auth::user()->opd_id)->where('status', 1)->pluck('id')->toArray();
        // $totalMenungguKonfirmasiRealisasiKeong = RealisasiKeong::whereIn('perencanaan_keong_id', $listPerencanaanKeong)->where('status', 2)->count();
        // $listPerencanaanManusia = PerencanaanManusia::where('opd_id', Auth::user()->opd_id)->where('status', 1)->pluck('id')->toArray();
        // $totalMenungguKonfirmasiRealisasiManusia = RealisasiManusia::whereIn('perencanaan_manusia_id', $listPerencanaanManusia)->where('status', 2)->count();
        // $listPerencanaanHewan = PerencanaanHewan::where('opd_id', Auth::user()->opd_id)->where('status', 1)->pluck('id')->toArray();
        // $totalMenungguKonfirmasiRealisasiHewan = RealisasiHewan::whereIn('perencanaan_hewan_id', $listPerencanaanHewan)->where('status', 2)->count();

        // foreach ($perencanaanKeong as $row) {
        //     if (($row->created_at->year != Carbon::now()->year) && ($row->realisasiKeong->where('status', 1)->max('progress') != 100) && ($row->alasan_tidak_terselesaikan == null) && ($row->status_baca == null)) {
        //         $totalPerencanaanKeongTidakTerselesaikan++;
        //     }
        // }

        // foreach ($perencanaanManusia as $row) {
        //     if (($row->created_at->year != Carbon::now()->year) && ($row->realisasiManusia->where('status', 1)->max('progress') != 100) && ($row->alasan_tidak_terselesaikan == null) && ($row->status_baca == null)) {
        //         $totalPerencanaanManusiaTidakTerselesaikan++;
        //     }
        // }

        // foreach ($perencanaanHewan as $row) {
        //     if (($row->created_at->year != Carbon::now()->year) && ($row->realisasiHewan->where('status', 1)->max('progress') != 100) && ($row->alasan_tidak_terselesaikan == null) && ($row->status_baca == null)) {
        //         $totalPerencanaanHewanTidakTerselesaikan++;
        //     }
        // }
        // } else if (in_array(Auth::user()->role, ['Admin', 'Pimpinan'])) {
        // $totalMenungguKonfirmasiPerencanaanKeong = PerencanaanKeong::where('status', 0)->count();
        // $totalMenungguKonfirmasiPerencanaanManusia = PerencanaanManusia::where('status', 0)->count();
        // $totalMenungguKonfirmasiPerencanaanHewan = PerencanaanHewan::where('status', 0)->count();

        // $totalMenungguKonfirmasiRealisasiKeong = RealisasiKeong::where('status', 0)->count();
        // $totalMenungguKonfirmasiRealisasiManusia = RealisasiManusia::where('status', 0)->count();
        // $totalMenungguKonfirmasiRealisasiHewan = RealisasiHewan::where('status', 0)->count();

        // foreach ($perencanaanKeong as $row) {
        //     if (($row->created_at->year != Carbon::now()->year) && ($row->realisasiKeong->where('status', 1)->max('progress') != 100) && ($row->alasan_tidak_terselesaikan != null) && ($row->status_baca != 1)) {
        //         $totalPerencanaanKeongTidakTerselesaikan++;
        //     }
        // }

        // foreach ($perencanaanManusia as $row) {
        //     if (($row->created_at->year != Carbon::now()->year) && ($row->realisasiManusia->where('status', 1)->max('progress') != 100) && ($row->alasan_tidak_terselesaikan != null) && ($row->status_baca != 1)) {
        //         $totalPerencanaanManusiaTidakTerselesaikan++;
        //     }
        // }

        // foreach ($perencanaanHewan as $row) {
        //     if (($row->created_at->year != Carbon::now()->year) && ($row->realisasiHewan->where('status', 1)->max('progress') != 100) && ($row->alasan_tidak_terselesaikan != null) && ($row->status_baca != 1)) {
        //         $totalPerencanaanHewanTidakTerselesaikan++;
        //     }
        // }
        // }

        $tahun = Perencanaan::selectRaw('year(created_at) year')->groupBy('year')->get()->pluck('year')->toArray();
        $daftarTahun = array_unique(array_merge($tahun));
        $daftarSumberDana = SumberDana::orderBy('nama', 'asc')->get();

        return view('dashboard.pages.dashboard', compact(
            [
                'totalData',
                'intervensi',
                'tabel',
                'anggaranPerencanaan',
                'penggunaanAnggaran',
                'tabelAnggaran',
                'daftarSumberDana',
                'daftarTahun',
                // 'totalMenungguKonfirmasiPerencanaanKeong',
                // 'totalMenungguKonfirmasiPerencanaanManusia',
                // 'totalMenungguKonfirmasiPerencanaanHewan',
                // 'totalMenungguKonfirmasiRealisasiKeong',
                // 'totalMenungguKonfirmasiRealisasiManusia',
                // 'totalMenungguKonfirmasiRealisasiHewan',
                // 'totalPerencanaanKeongTidakTerselesaikan',
                // 'totalPerencanaanManusiaTidakTerselesaikan',
                // 'totalPerencanaanHewanTidakTerselesaikan',
                'tahun'
            ]
        ));
    }

    private function _tabel($tahun)
    {
        $tabel = [];
        if (Auth::user()->role == 'OPD') {
            $daftarOPD = OPD::orderBy('nama', 'asc')->where('id', Auth::user()->opd_id)->withTrashed()->get();
        } else {
            $daftarOPD = OPD::orderBy('nama', 'asc')->where(function ($query) {
                if (Auth::user()->role == 'OPD') {
                    $query->where('id', Auth::user()->opd_id);
                }
            })->get();
        }

        $totalPerencanaan = 0;
        $totalRealisasi = 0;
        $totalPersen = 0;

        foreach ($daftarOPD as $opd) {
            $perencanaan = Perencanaan::where('opd_id', $opd->id)->where('status', 1)->where(function ($query) use ($tahun) {
                if (($tahun != '') && $tahun != 'Semua') {
                    $query->where('created_at', 'LIKE', '%' . $tahun . '%');
                }
            })->count();
            $realisasi = Realisasi::with(['perencanaan'])->whereHas('perencanaan', function ($query) use ($opd) {
                $query->where('opd_id', $opd->id);
            })->where('status', 1)->where(function ($query) use ($tahun) {
                if (($tahun != '') && $tahun != 'Semua') {
                    $query->where('created_at', 'LIKE', '%' . $tahun . '%');
                }
            })->count();

            if ($perencanaan == 0) {
                $persentase = 0;
            } else {
                $persentase = round(($realisasi / $perencanaan) * 100, 2);
            }

            $tabel[] = [
                'opd' => $opd->nama,
                'perencanaan' => round($perencanaan, 2),
                'realisasi' => round($realisasi, 2),
                'persentase' => $persentase
            ];

            $totalPerencanaan += $perencanaan;
            $totalRealisasi += $realisasi;
        }

        if ($totalPerencanaan == 0) {
            $totalPersen = 0;
        } else {
            $totalPersen = round(($totalRealisasi / $totalPerencanaan) * 100, 2);
        }

        $total = [
            'totalPerencanaan' => $totalPerencanaan,
            'totalRealisasi' => $totalRealisasi,
            'totalPersen' => $totalPersen
        ];

        return [
            'tabel' => $tabel,
            'total' => $total
        ];
    }

    private function _intervensi($tahun)
    {
        $daftarOPD = OPD::orderBy('nama', 'asc')->get()->pluck('id');
        $data = [];
        $perencanaan = Perencanaan::where('status', 1)->where(function ($query) use ($daftarOPD) {
            if (Auth::user()->role == 'OPD') {
                $query->where('opd_id', Auth::user()->opd_id);
            } else {
                $query->whereIn('opd_id', $daftarOPD);
            }
        })->where(function ($query) use ($tahun) {
            if (($tahun != '') && $tahun != 'Semua') {
                $query->where('created_at', 'LIKE', '%' . $tahun . '%');
            }
        })->count();

        $realisasi = Realisasi::where('status', '=', 1)->whereHas('perencanaan', function ($query) use ($daftarOPD) {
            $query->where(function ($query) use ($daftarOPD) {
                if (Auth::user()->role == 'OPD') {
                    $query->where('opd_id', Auth::user()->opd_id);
                } else {
                    $query->whereIn('opd_id', $daftarOPD);
                }
            });
        })->where(function ($query) use ($tahun) {
            if (($tahun != '') && $tahun != 'Semua') {
                $query->where('created_at', 'LIKE', '%' . $tahun . '%');
            }
        })->count();

        $persentase = $perencanaan == 0 ? 0 : round(($realisasi / $perencanaan) * 100, 2);

        $data = [
            'perencanaan' => $perencanaan,
            'realisasi' => $realisasi,
            'persentase' => $persentase
        ];

        return $data;
    }

    private function _totalData()
    {
        $orangTua = OrangTua::count();
        $anak = Anak::count();
        $posyandu = Posyandu::count();
        $puskesmas = Puskesmas::count();
        $indikator = Indikator::count();

        $opd = OPD::count();

        $data = [
            'orangTua' => $orangTua,
            'anak' => $anak,
            'posyandu' => $posyandu,
            'puskesmas' => $puskesmas,
            'indikator' => $indikator,
            'opd' => $opd
        ];

        return $data;
    }

    private function _anggaranPerencanaan($tahun)
    {
        $daftarOPD = OPD::orderBy('nama', 'asc')->get()->pluck('id');
        $anggaran = Perencanaan::where('status', 1)->where(function ($query) use ($daftarOPD) {
            if (Auth::user()->role == 'OPD') {
                $query->where('opd_id', Auth::user()->opd_id);
            } else {
                $query->whereIn('opd_id', $daftarOPD);
            }
        })->where(function ($query) use ($tahun) {
            if (($tahun != '') && $tahun != 'Semua') {
                $query->where('created_at', 'LIKE', '%' . $tahun . '%');
            }
        })->sum('nilai_pembiayaan');

        $data = [
            'anggaran' => $anggaran,
        ];

        return $data;
    }

    private function _penggunaanAnggaran($tahun)
    {
        $daftarOPD = OPD::orderBy('nama', 'asc')->get()->pluck('id');
        $anggaranPerencanaan = $this->_anggaranPerencanaan($tahun);

        $persenSisa = 0;
        $persenTotal = 0;

        $penggunaan = Perencanaan::whereHas('realisasi', function ($query) use ($tahun) {
            $query->where('status', 1);
            if (($tahun != '') && $tahun != 'Semua') {
                $query->where('created_at', 'LIKE', '%' . $tahun . '%');
            }
        })->where(function ($query) use ($daftarOPD) {
            $query->where(function ($query) use ($daftarOPD) {
                if (Auth::user()->role == 'OPD') {
                    $query->where('opd_id', Auth::user()->opd_id);
                } else {
                    $query->whereIn('opd_id', $daftarOPD);
                }
            });
        })->sum('nilai_pembiayaan');

        $sisa = $anggaranPerencanaan['anggaran'] - $penggunaan;
        if ($anggaranPerencanaan['anggaran'] != 0) {
            $persenTotal = round(($penggunaan / $anggaranPerencanaan['anggaran']) * 100, 2);
            $persenSisa = round(($sisa / $anggaranPerencanaan['anggaran']) * 100, 2);
        }


        $data = [
            'penggunaan' => $penggunaan,
            'persenTotal' => $persenTotal,
            'persenSisa' => $persenSisa,
            'sisa' => $sisa
        ];

        return $data;
    }

    private function _tabelAnggaran($tahun)
    {
        $tabel = [];
        $arrayPerencanaan = [];
        $arrayRealisasi = [];
        $arrayPersentase = [];
        if (Auth::user()->role == 'OPD') {
            $daftarOPD = OPD::orderBy('nama', 'asc')->where('id', Auth::user()->opd_id)->withTrashed()->get();
        } else {
            $daftarOPD = OPD::orderBy('nama', 'asc')->where(function ($query) {
                if (Auth::user()->role == 'OPD') {
                    $query->where('id', Auth::user()->opd_id);
                }
            })->get();
        }

        $daftarSumberDana = SumberDana::orderBy('nama', 'asc')->get();

        foreach ($daftarOPD as $opd) {
            $arrayPerencanaan = [];
            $arrayRealisasi = [];
            $arrayPersentase = [];
            $arraySisa = [];
            $totalPerencanaan = Perencanaan::where('opd_id', $opd->id)->where('status', 1)->where(function ($query) use ($tahun) {
                if (($tahun != '') && $tahun != 'Semua') {
                    $query->where('created_at', 'LIKE', '%' . $tahun . '%');
                }
            })->sum('nilai_pembiayaan');

            $totalRealisasi = Perencanaan::whereHas('realisasi', function ($query) use ($tahun) {
                $query->where('status', 1);
                if (($tahun != '') && $tahun != 'Semua') {
                    $query->where('created_at', 'LIKE', '%' . $tahun . '%');
                }
            })->where('opd_id', $opd->id)->sum('nilai_pembiayaan');

            if ($totalPerencanaan == 0) {
                $totalPersentase = 0;
            } else {
                $totalPersentase = round(($totalRealisasi / $totalPerencanaan) * 100, 2);
            }

            foreach ($daftarSumberDana as $sumberDana) {
                $perencanaan = Perencanaan::where('opd_id', $opd->id)->where('sumber_dana_id', $sumberDana->id)->where(function ($query) use ($tahun) {
                    if (($tahun != '') && $tahun != 'Semua') {
                        $query->where('created_at', 'LIKE', '%' . $tahun . '%');
                    }
                })->where('status', 1)->sum('nilai_pembiayaan');

                $realisasi = Perencanaan::whereHas('realisasi', function ($query) use ($tahun) {
                    $query->where('status', 1);
                    if (($tahun != '') && $tahun != 'Semua') {
                        $query->where('created_at', 'LIKE', '%' . $tahun . '%');
                    }
                })->where('sumber_dana_id', $sumberDana->id)->where('status', 1)->where('opd_id', $opd->id)->sum('nilai_pembiayaan');

                if ($perencanaan == 0) {
                    $persentase = 0;
                } else {
                    $persentase = round(($realisasi / $perencanaan) * 100, 2);
                }

                $sisaAnggaran = $perencanaan - $realisasi;

                $arrayPerencanaan[] = [
                    'sumber_dana' => $sumberDana->nama,
                    'perencanaan' => $perencanaan,
                ];

                $arrayRealisasi[] = [
                    'sumber_dana' => $sumberDana->nama,
                    'realisasi' => $realisasi,
                ];

                $arrayPersentase[] = [
                    'sumber_dana' => $sumberDana->nama,
                    'persentase' => $persentase,
                ];

                $arraySisa[] = [
                    'sumber_dana' => $sumberDana->nama,
                    'sisa_anggaran' => $sisaAnggaran
                ];
            }

            $totalSisa = $totalPerencanaan - $totalRealisasi;

            $tabel[] = [
                'opd' => $opd->nama,
                'perencanaan' => $arrayPerencanaan,
                'realisasi' => $arrayRealisasi,
                'persentase' => $arrayPersentase,
                'sisaAnggaran' => $arraySisa,
                'totalPerencanaan' => round($totalPerencanaan, 2),
                'totalRealisasi' => round($totalRealisasi, 2),
                'totalSisaAnggaran' => round($totalSisa, 2),
                'totalPersentase' => $totalPersentase,
            ];
        }

        $totalSeluruhPerencanaan = 0;
        $totalSeluruhRealisasi = 0;
        $totalSeluruhSisaAnggaran = 0;
        $totalSeluruhPersentase = 0;
        $totalArrayPerencanaan = [];
        $totalArrayRealisasi = [];
        $totalArrayPersentase = [];
        $totalArraySisaAnggaran = [];


        foreach ($tabel as $jumlah) {
            foreach ($jumlah['perencanaan'] as $perencanaan) {
                if (array_key_exists($perencanaan['sumber_dana'], $totalArrayPerencanaan))
                    $perencanaan['perencanaan'] += $totalArrayPerencanaan[$perencanaan['sumber_dana']]['perencanaan'];

                $totalArrayPerencanaan[$perencanaan['sumber_dana']] = $perencanaan;
            }

            foreach ($jumlah['realisasi'] as $realisasi) {
                if (array_key_exists($realisasi['sumber_dana'], $totalArrayRealisasi))
                    $realisasi['realisasi'] += $totalArrayRealisasi[$realisasi['sumber_dana']]['realisasi'];

                $totalArrayRealisasi[$realisasi['sumber_dana']] = $realisasi;
            }

            foreach ($jumlah['sisaAnggaran'] as $sisaAnggaran) {
                if (array_key_exists($sisaAnggaran['sumber_dana'], $totalArraySisaAnggaran))
                    $sisaAnggaran['sisa_anggaran'] += $totalArraySisaAnggaran[$sisaAnggaran['sumber_dana']]['sisa_anggaran'];

                $totalArraySisaAnggaran[$sisaAnggaran['sumber_dana']] = $sisaAnggaran;
            }

            $totalSeluruhPerencanaan += $jumlah['totalPerencanaan'];
            $totalSeluruhRealisasi += $jumlah['totalRealisasi'];
            $totalSeluruhSisaAnggaran += $jumlah['totalSisaAnggaran'];
        }

        if ($totalSeluruhPerencanaan == 0) {
            $totalSeluruhPersentase = 0;
        } else {
            $totalSeluruhPersentase = round(($totalSeluruhRealisasi / $totalSeluruhPerencanaan) * 100, 2);
        }

        $totalArrayPerencanaan = array_values($totalArrayPerencanaan);
        $totalArrayRealisasi = array_values($totalArrayRealisasi);
        $totalArraySisaAnggaran = array_values($totalArraySisaAnggaran);

        for ($i = 0; $i < count($totalArrayPerencanaan); $i++) {

            if ($totalArrayPerencanaan[$i]['perencanaan'] == 0) {
                $persentase = 0;
            } else {
                $persentase = round(($totalArrayRealisasi[$i]['realisasi'] / $totalArrayPerencanaan[$i]['perencanaan']) * 100, 2);
            }

            $totalArrayPersentase[] = [
                'sumber_dana' => $totalArrayPerencanaan[$i]['sumber_dana'],
                'persentase' => $persentase
            ];
        }

        $total = [
            'totalSeluruhPerencanaan' => $totalSeluruhPerencanaan,
            'totalSeluruhRealisasi' => $totalSeluruhRealisasi,
            'totalSeluruhPersentase' => $totalSeluruhPersentase,
            'totalSeluruhSisaAnggaran' => $totalSeluruhSisaAnggaran,
            'totalArrayPerencanaan' => $totalArrayPerencanaan,
            'totalArrayRealisasi' => $totalArrayRealisasi,
            'totalArraySisaAnggaran' => $totalArraySisaAnggaran,
            'totalArrayPersentase' => $totalArrayPersentase,
        ];

        return [
            'tabel' => $tabel,
            'total' => $total
        ];
    }

    public function exportIntervensi(Request $request)
    {
        $tahun = $request->tahun;

        $tabel = $this->_tabel($tahun);

        $tanggal = Carbon::parse(Carbon::now())->translatedFormat('d F Y');

        return Excel::download(new IntervensiExport($tabel, $tahun), "Export Intervensi" . '-' . $tanggal . "-" . rand(1, 9999) . '.xlsx');
    }

    public function exportAnggaran(Request $request)
    {
        $tahun = $request->tahun;

        $tabelAnggaran = $this->_tabelAnggaran($tahun);
        $daftarSumberDana = SumberDana::orderBy('nama', 'asc')->get();

        $tanggal = Carbon::parse(Carbon::now())->translatedFormat('d F Y');

        return Excel::download(new AnggaranIntervensiExport($tabelAnggaran, $tahun, $daftarSumberDana), "Export Anggaran Intervensi" . '-' . $tanggal . "-" . rand(1, 9999) . '.xlsx');
    }
}
