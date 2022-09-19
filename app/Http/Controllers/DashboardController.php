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
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $tahun = $request->tahun;
        $totalData = $this->_totalData();
        $lokasi = $this->_lokasi();
        $totalHewan = $this->_totalHewan();
        $intervensi = $this->_intervensi($tahun);

        $tabelKeong = $this->_tabelKeong($tahun);
        $tabelManusia = $this->_tabelManusia($tahun);
        $tabelHewan = $this->_tabelHewan($tahun);

        $anggaranPerencanaan = $this->_anggaranPerencanaan($tahun);
        $penggunaanAnggaran = $this->_penggunaanAnggaran($tahun);

        $tabelAnggaranKeong = $this->_tabelAnggaranKeong($tahun);
        $tabelAnggaranManusia = $this->_tabelAnggaranManusia($tahun);
        $tabelAnggaranHewan = $this->_tabelAnggaranHewan($tahun);
        $tabelAnggaranSemua = $this->_tabelAnggaranSemua($tahun);

        $perencanaanKeong = PerencanaanKeong::where(function ($query) {
            if (Auth::user()->role == 'OPD') {
                $query->where('opd_id', Auth::user()->opd_id);
            }
        })->latest()->get();
        $totalPerencanaanKeongTidakTerselesaikan = 0;

        $perencanaanManusia = PerencanaanManusia::where(function ($query) {
            if (Auth::user()->role == 'OPD') {
                $query->where('opd_id', Auth::user()->opd_id);
            }
        })->latest()->get();
        $totalPerencanaanManusiaTidakTerselesaikan = 0;

        $perencanaanHewan = PerencanaanHewan::where(function ($query) {
            if (Auth::user()->role == 'OPD') {
                $query->where('opd_id', Auth::user()->opd_id);
            }
        })->latest()->get();
        $totalPerencanaanHewanTidakTerselesaikan = 0;

        if (Auth::user()->role == 'OPD') {
            $totalMenungguKonfirmasiPerencanaanKeong = PerencanaanKeong::where('status', 2)->where('opd_id', Auth::user()->opd_id)->count();
            $totalMenungguKonfirmasiPerencanaanManusia = PerencanaanManusia::where('status', 2)->where('opd_id', Auth::user()->opd_id)->count();
            $totalMenungguKonfirmasiPerencanaanHewan = PerencanaanHewan::where('status', 2)->where('opd_id', Auth::user()->opd_id)->count();

            $listPerencanaanKeong = PerencanaanKeong::where('opd_id', Auth::user()->opd_id)->where('status', 1)->pluck('id')->toArray();
            $totalMenungguKonfirmasiRealisasiKeong = RealisasiKeong::whereIn('perencanaan_keong_id', $listPerencanaanKeong)->where('status', 2)->count();
            $listPerencanaanManusia = PerencanaanManusia::where('opd_id', Auth::user()->opd_id)->where('status', 1)->pluck('id')->toArray();
            $totalMenungguKonfirmasiRealisasiManusia = RealisasiManusia::whereIn('perencanaan_manusia_id', $listPerencanaanManusia)->where('status', 2)->count();
            $listPerencanaanHewan = PerencanaanHewan::where('opd_id', Auth::user()->opd_id)->where('status', 1)->pluck('id')->toArray();
            $totalMenungguKonfirmasiRealisasiHewan = RealisasiHewan::whereIn('perencanaan_hewan_id', $listPerencanaanHewan)->where('status', 2)->count();

            foreach ($perencanaanKeong as $row) {
                if (($row->created_at->year != Carbon::now()->year) && ($row->realisasiKeong->where('status', 1)->max('progress') != 100) && ($row->alasan_tidak_terselesaikan == null) && ($row->status_baca == null)) {
                    $totalPerencanaanKeongTidakTerselesaikan++;
                }
            }

            foreach ($perencanaanManusia as $row) {
                if (($row->created_at->year != Carbon::now()->year) && ($row->realisasiManusia->where('status', 1)->max('progress') != 100) && ($row->alasan_tidak_terselesaikan == null) && ($row->status_baca == null)) {
                    $totalPerencanaanManusiaTidakTerselesaikan++;
                }
            }

            foreach ($perencanaanHewan as $row) {
                if (($row->created_at->year != Carbon::now()->year) && ($row->realisasiHewan->where('status', 1)->max('progress') != 100) && ($row->alasan_tidak_terselesaikan == null) && ($row->status_baca == null)) {
                    $totalPerencanaanHewanTidakTerselesaikan++;
                }
            }
        } else if (in_array(Auth::user()->role, ['Admin', 'Pimpinan'])) {
            $totalMenungguKonfirmasiPerencanaanKeong = PerencanaanKeong::where('status', 0)->count();
            $totalMenungguKonfirmasiPerencanaanManusia = PerencanaanManusia::where('status', 0)->count();
            $totalMenungguKonfirmasiPerencanaanHewan = PerencanaanHewan::where('status', 0)->count();

            $totalMenungguKonfirmasiRealisasiKeong = RealisasiKeong::where('status', 0)->count();
            $totalMenungguKonfirmasiRealisasiManusia = RealisasiManusia::where('status', 0)->count();
            $totalMenungguKonfirmasiRealisasiHewan = RealisasiHewan::where('status', 0)->count();

            foreach ($perencanaanKeong as $row) {
                if (($row->created_at->year != Carbon::now()->year) && ($row->realisasiKeong->where('status', 1)->max('progress') != 100) && ($row->alasan_tidak_terselesaikan != null) && ($row->status_baca != 1)) {
                    $totalPerencanaanKeongTidakTerselesaikan++;
                }
            }

            foreach ($perencanaanManusia as $row) {
                if (($row->created_at->year != Carbon::now()->year) && ($row->realisasiManusia->where('status', 1)->max('progress') != 100) && ($row->alasan_tidak_terselesaikan != null) && ($row->status_baca != 1)) {
                    $totalPerencanaanManusiaTidakTerselesaikan++;
                }
            }

            foreach ($perencanaanHewan as $row) {
                if (($row->created_at->year != Carbon::now()->year) && ($row->realisasiHewan->where('status', 1)->max('progress') != 100) && ($row->alasan_tidak_terselesaikan != null) && ($row->status_baca != 1)) {
                    $totalPerencanaanHewanTidakTerselesaikan++;
                }
            }
        }

        $tahunKeong = PerencanaanKeong::selectRaw('year(created_at) year')->groupBy('year')->get()->pluck('year')->toArray();
        $tahunManusia = PerencanaanManusia::selectRaw('year(created_at) year')->groupBy('year')->get()->pluck('year')->toArray();
        $tahunHewan = PerencanaanHewan::selectRaw('year(created_at) year')->groupBy('year')->get()->pluck('year')->toArray();
        $daftarTahun = array_unique(array_merge($tahunKeong, $tahunManusia, $tahunHewan));

        return view('dashboard.pages.dashboard', compact(
            [
                'totalData',
                'lokasi',
                'totalHewan',
                'intervensi',
                'tabelKeong',
                'tabelManusia',
                'tabelHewan',
                'anggaranPerencanaan',
                'penggunaanAnggaran',
                'tabelAnggaranKeong',
                'tabelAnggaranManusia',
                'tabelAnggaranHewan',
                'tabelAnggaranSemua',
                'totalMenungguKonfirmasiPerencanaanKeong',
                'totalMenungguKonfirmasiPerencanaanManusia',
                'totalMenungguKonfirmasiPerencanaanHewan',
                'totalMenungguKonfirmasiRealisasiKeong',
                'totalMenungguKonfirmasiRealisasiManusia',
                'totalMenungguKonfirmasiRealisasiHewan',
                'totalPerencanaanKeongTidakTerselesaikan',
                'totalPerencanaanManusiaTidakTerselesaikan',
                'totalPerencanaanHewanTidakTerselesaikan',
                'daftarTahun',
                'tahun'
            ]
        ));
    }

    private function _tabelKeong($tahun)
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

        foreach ($daftarOPD as $opd) {
            $perencanaan = PerencanaanKeong::where('opd_id', $opd->id)->where('status', 1)->where(function ($query) use ($tahun) {
                if (($tahun != '') && $tahun != 'Semua') {
                    $query->where('created_at', 'LIKE', '%' . $tahun . '%');
                }
            })->count();
            $realisasi = RealisasiKeong::with(['perencanaanKeong'])->whereHas('perencanaanKeong', function ($query) use ($opd) {
                $query->where('opd_id', $opd->id);
            })->where('progress', '=', 100)->where(function ($query) use ($tahun) {
                if (($tahun != '') && $tahun != 'Semua') {
                    $query->where('created_at', 'LIKE', '%' . $tahun . '%');
                }
            })->count();

            if ($perencanaan == 0) {
                $persentase = '-';
            } else {
                $persentase = round(($realisasi / $perencanaan) * 100, 2);
            }

            $tabel[] = [
                'opd' => $opd->nama,
                'perencanaan' => round($perencanaan, 2),
                'realisasi' => round($realisasi, 2),
                'persentase' => $persentase
            ];
        }

        return $tabel;
    }

    private function _tabelManusia($tahun)
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
        foreach ($daftarOPD as $opd) {
            $perencanaan = PerencanaanManusia::where('opd_id', $opd->id)->where('status', 1)->where(function ($query) use ($tahun) {
                if (($tahun != '') && $tahun != 'Semua') {
                    $query->where('created_at', 'LIKE', '%' . $tahun . '%');
                }
            })->count();
            $realisasi = RealisasiManusia::with(['perencanaanManusia'])->whereHas('perencanaanManusia', function ($query) use ($opd) {
                $query->where('opd_id', $opd->id);
            })->where('progress', '=', 100)->where(function ($query) use ($tahun) {
                if (($tahun != '') && $tahun != 'Semua') {
                    $query->where('created_at', 'LIKE', '%' . $tahun . '%');
                }
            })->count();

            if ($perencanaan == 0) {
                $persentase = '-';
            } else {
                $persentase = round(($realisasi / $perencanaan) * 100, 2);
            }

            $tabel[] = [
                'opd' => $opd->nama,
                'perencanaan' => round($perencanaan, 2),
                'realisasi' => round($realisasi, 2),
                'persentase' => $persentase
            ];
        }

        return $tabel;
    }

    private function _tabelHewan($tahun)
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
        foreach ($daftarOPD as $opd) {
            $perencanaan = PerencanaanHewan::where('opd_id', $opd->id)->where('status', 1)->where(function ($query) use ($tahun) {
                if (($tahun != '') && $tahun != 'Semua') {
                    $query->where('created_at', 'LIKE', '%' . $tahun . '%');
                }
            })->count();
            $realisasi = RealisasiHewan::with(['perencanaanHewan'])->whereHas('perencanaanHewan', function ($query) use ($opd) {
                $query->where('opd_id', $opd->id);
            })->where(function ($query) use ($tahun) {
                if (($tahun != '') && $tahun != 'Semua') {
                    $query->where('created_at', 'LIKE', '%' . $tahun . '%');
                }
            })->where('progress', '=', 100)->count();

            if ($perencanaan == 0) {
                $persentase = '-';
            } else {
                $persentase = round(($realisasi / $perencanaan) * 100, 2);
            }

            $tabel[] = [
                'opd' => $opd->nama,
                'perencanaan' => round($perencanaan, 2),
                'realisasi' => round($realisasi, 2),
                'persentase' => $persentase
            ];
        }

        return $tabel;
    }

    private function _intervensi($tahun)
    {
        $daftarOPD = OPD::orderBy('nama', 'asc')->get()->pluck('id');
        $data = [];
        $perencanaanKeong = PerencanaanKeong::where('status', 1)->where(function ($query) use ($daftarOPD) {
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
        $perencanaanHewan = PerencanaanHewan::where('status', 1)->where(function ($query) use ($daftarOPD) {
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
        $perencanaanManusia = PerencanaanManusia::where('status', 1)->where(function ($query) use ($daftarOPD) {
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
        $perencanaanTotal = $perencanaanHewan + $perencanaanKeong + $perencanaanManusia;

        $realisasiKeong = RealisasiKeong::where('progress', '=', 100)->whereHas('perencanaanKeong', function ($query) use ($daftarOPD) {
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
        $realisasiHewan = RealisasiHewan::where('progress', '=', 100)->whereHas('perencanaanHewan', function ($query) use ($daftarOPD) {
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
        $realisasiManusia = RealisasiManusia::where('progress', '=', 100)->whereHas('perencanaanManusia', function ($query) use ($daftarOPD) {
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
        $realisasiTotal = $realisasiHewan + $realisasiKeong + $realisasiManusia;

        $persentaseKeong = $perencanaanKeong == 0 ? 0 : round(($realisasiKeong / $perencanaanKeong) * 100, 2);
        $persentaseHewan = $perencanaanHewan == 0 ? 0 : round(($realisasiHewan / $perencanaanHewan) * 100, 2);
        $persentaseManusia = $perencanaanManusia == 0 ? 0 : round(($realisasiManusia / $perencanaanManusia) * 100, 2);
        $persentaseTotal = $perencanaanTotal == 0 ? 0 : round(($realisasiTotal / $perencanaanTotal) * 100, 2);

        $data = [
            'perencanaanKeong' => $perencanaanKeong,
            'perencanaanHewan' => $perencanaanHewan,
            'perencanaanManusia' => $perencanaanManusia,
            'perencanaanTotal' => $perencanaanTotal,
            'realisasiKeong' => $realisasiKeong,
            'realisasiHewan' => $realisasiHewan,
            'realisasiManusia' => $realisasiManusia,
            'realisasiTotal' => $realisasiTotal,
            'persentaseKeong' => $persentaseKeong,
            'persentaseHewan' => $persentaseHewan,
            'persentaseManusia' => $persentaseManusia,
            'persentaseTotal' => $persentaseTotal
        ];

        return $data;
    }

    private function _lokasi()
    {
        $desa = Desa::count();
        $lokasiKeong = LokasiKeong::count();
        $lokasiHewan = LokasiHewan::count();

        $data = [
            'desa' => $desa,
            'lokasiKeong' => $lokasiKeong,
            'lokasiHewan' => $lokasiHewan
        ];

        return $data;
    }

    private function _totalHewan()
    {
        $arrayHewan = [];
        $daftarHewan = Hewan::orderBy('nama', 'asc')->get();
        foreach ($daftarHewan as $hewan) {
            $jumlahHewan = JumlahHewan::where('hewan_id', $hewan->id)
                ->sum('jumlah');

            $arrayHewan[] = [
                'nama_hewan' => $hewan->nama,
                'jumlah' => $jumlahHewan
            ];
        }

        return $arrayHewan;
    }

    private function _totalData()
    {
        $penduduk = Penduduk::count();
        $sekolah = Sekolah::count();
        $siswaSekolah = Siswa::count();
        $opd = OPD::count();

        $data = [
            'penduduk' => $penduduk,
            'sekolah' => $sekolah,
            'siswaSekolah' => $siswaSekolah,
            'opd' => $opd
        ];

        return $data;
    }

    private function _anggaranPerencanaan($tahun)
    {
        $daftarOPD = OPD::orderBy('nama', 'asc')->get()->pluck('id');
        $anggaranKeong = PerencanaanKeong::where('status', 1)->where(function ($query) use ($daftarOPD) {
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

        $anggaranManusia = PerencanaanManusia::where('status', 1)->where(function ($query) use ($daftarOPD) {
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

        $anggaranHewan = PerencanaanHewan::where('status', 1)->where(function ($query) use ($daftarOPD) {
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
            'anggaranKeong' => $anggaranKeong,
            'anggaranManusia' => $anggaranManusia,
            'anggaranHewan' => $anggaranHewan,
        ];

        return $data;
    }

    private function _penggunaanAnggaran($tahun)
    {
        $daftarOPD = OPD::orderBy('nama', 'asc')->get()->pluck('id');
        $anggaranPerencanaan = $this->_anggaranPerencanaan($tahun);

        $persenKeong = 0;
        $persenManusia = 0;
        $persenHewan = 0;
        $persenSisa = 0;
        $persenTotal = 0;

        $penggunaanKeong = RealisasiKeong::where('status', 1)->whereHas('perencanaanKeong', function ($query) use ($daftarOPD) {
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
        })->sum('penggunaan_anggaran');

        $penggunaanManusia = RealisasiManusia::where('status', 1)->whereHas('perencanaanManusia', function ($query) use ($daftarOPD) {
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
        })->sum('penggunaan_anggaran');

        $penggunaanHewan = RealisasiHewan::where('status', 1)->whereHas('perencanaanHewan', function ($query) use ($daftarOPD) {
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
        })->sum('penggunaan_anggaran');

        if ($anggaranPerencanaan['anggaranKeong'] != 0) {
            $persenKeong = round(($penggunaanKeong / $anggaranPerencanaan['anggaranKeong']) * 100, 2);
        }

        if ($anggaranPerencanaan['anggaranManusia'] != 0) {
            $persenManusia = round(($penggunaanManusia / $anggaranPerencanaan['anggaranManusia']) * 100, 2);
        }

        if ($anggaranPerencanaan['anggaranHewan'] != 0) {
            $persenHewan = round(($penggunaanHewan / $anggaranPerencanaan['anggaranHewan']) * 100, 2);
        }

        $anggaranTotal = $anggaranPerencanaan['anggaranKeong'] + $anggaranPerencanaan['anggaranManusia'] + $anggaranPerencanaan['anggaranHewan'];
        $penggunaanAnggaran = $penggunaanKeong + $penggunaanHewan + $penggunaanManusia;
        $sisa = $anggaranTotal - $penggunaanAnggaran;


        if ($anggaranTotal != 0) {
            $persenTotal = round(($penggunaanKeong + $penggunaanManusia + $penggunaanHewan)  / ($anggaranPerencanaan['anggaranKeong'] + $anggaranPerencanaan['anggaranManusia'] + $anggaranPerencanaan['anggaranHewan']) * 100, 2);

            $persenSisa = round(($sisa / $anggaranTotal) * 100, 2);
        }

        $data = [
            'penggunaanKeong' => $penggunaanKeong,
            'penggunaanManusia' => $penggunaanManusia,
            'penggunaanHewan' => $penggunaanHewan,
            'persenKeong' => $persenKeong,
            'persenManusia' => $persenManusia,
            'persenHewan' => $persenHewan,
            'persenTotal' => $persenTotal,
            'persenSisa' => $persenSisa
        ];

        return $data;
    }

    private function _tabelAnggaranKeong($tahun)
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
        foreach ($daftarOPD as $opd) {
            $perencanaan = PerencanaanKeong::where('opd_id', $opd->id)->where('status', 1)->where(function ($query) use ($tahun) {
                if (($tahun != '') && $tahun != 'Semua') {
                    $query->where('created_at', 'LIKE', '%' . $tahun . '%');
                }
            })->sum('nilai_pembiayaan');
            $perencanaanDau = PerencanaanKeong::where('opd_id', $opd->id)->where('sumber_dana', 'DAU')->where(function ($query) use ($tahun) {
                if (($tahun != '') && $tahun != 'Semua') {
                    $query->where('created_at', 'LIKE', '%' . $tahun . '%');
                }
            })->where('status', 1)->sum('nilai_pembiayaan');
            $perencanaanDak = PerencanaanKeong::where('opd_id', $opd->id)->where('sumber_dana', 'DAK')->where(function ($query) use ($tahun) {
                if (($tahun != '') && $tahun != 'Semua') {
                    $query->where('created_at', 'LIKE', '%' . $tahun . '%');
                }
            })->where('status', 1)->sum('nilai_pembiayaan');

            $realisasi = RealisasiKeong::with(['perencanaanKeong'])->where('status', 1)->whereHas('perencanaanKeong', function ($query) use ($opd) {
                $query->where('opd_id', $opd->id);
            })->where(function ($query) use ($tahun) {
                if (($tahun != '') && $tahun != 'Semua') {
                    $query->where('created_at', 'LIKE', '%' . $tahun . '%');
                }
            })->sum('penggunaan_anggaran');
            $realisasiDau = RealisasiKeong::with(['perencanaanKeong'])->where('status', 1)->whereHas('perencanaanKeong', function ($query) use ($opd) {
                $query->where('sumber_dana', 'DAU');
                $query->where('opd_id', $opd->id);
            })->where(function ($query) use ($tahun) {
                if (($tahun != '') && $tahun != 'Semua') {
                    $query->where('created_at', 'LIKE', '%' . $tahun . '%');
                }
            })->sum('penggunaan_anggaran');
            $realisasiDak = RealisasiKeong::with(['perencanaanKeong'])->where('status', 1)->whereHas('perencanaanKeong', function ($query) use ($opd) {
                $query->where('sumber_dana', 'DAK');
                $query->where('opd_id', $opd->id);
            })->where(function ($query) use ($tahun) {
                if (($tahun != '') && $tahun != 'Semua') {
                    $query->where('created_at', 'LIKE', '%' . $tahun . '%');
                }
            })->sum('penggunaan_anggaran');

            if ($perencanaan == 0) {
                $persentase = '-';
            } else {
                $persentase = round(($realisasi / $perencanaan) * 100, 2);
            }

            if ($perencanaanDau == 0) {
                $persentaseDau = '-';
            } else {
                $persentaseDau = round(($realisasiDau / $perencanaanDau) * 100, 2);
            }

            if ($perencanaanDak == 0) {
                $persentaseDak = '-';
            } else {
                $persentaseDak = round(($realisasiDak / $perencanaanDak) * 100, 2);
            }

            $tabel[] = [
                'opd' => $opd->nama,
                'perencanaan' => round($perencanaan, 2),
                'perencanaanDau' => round($perencanaanDau, 2),
                'perencanaanDak' => round($perencanaanDak, 2),
                'realisasi' => round($realisasi, 2),
                'realisasiDau' => round($realisasiDau, 2),
                'realisasiDak' => round($realisasiDak, 2),
                'persentase' => $persentase,
                'persentaseDau' => $persentaseDau,
                'persentaseDak' => $persentaseDak,
            ];
        }

        return $tabel;
    }

    private function _tabelAnggaranManusia($tahun)
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
        foreach ($daftarOPD as $opd) {
            $perencanaan = PerencanaanManusia::where('opd_id', $opd->id)->where('status', 1)->where(function ($query) use ($tahun) {
                if (($tahun != '') && $tahun != 'Semua') {
                    $query->where('created_at', 'LIKE', '%' . $tahun . '%');
                }
            })->sum('nilai_pembiayaan');
            $perencanaanDau = PerencanaanManusia::where('opd_id', $opd->id)->where('sumber_dana', 'DAU')->where('status', 1)->where(function ($query) use ($tahun) {
                if (($tahun != '') && $tahun != 'Semua') {
                    $query->where('created_at', 'LIKE', '%' . $tahun . '%');
                }
            })->sum('nilai_pembiayaan');
            $perencanaanDak = PerencanaanManusia::where('opd_id', $opd->id)->where('sumber_dana', 'DAK')->where('status', 1)->where(function ($query) use ($tahun) {
                if (($tahun != '') && $tahun != 'Semua') {
                    $query->where('created_at', 'LIKE', '%' . $tahun . '%');
                }
            })->sum('nilai_pembiayaan');

            $realisasi = RealisasiManusia::with(['perencanaanManusia'])->where('status', 1)->whereHas('perencanaanManusia', function ($query) use ($opd) {
                $query->where('opd_id', $opd->id);
            })->where(function ($query) use ($tahun) {
                if (($tahun != '') && $tahun != 'Semua') {
                    $query->where('created_at', 'LIKE', '%' . $tahun . '%');
                }
            })->sum('penggunaan_anggaran');
            $realisasiDau = RealisasiManusia::with(['perencanaanManusia'])->where('status', 1)->whereHas('perencanaanManusia', function ($query) use ($opd) {
                $query->where('sumber_dana', 'DAU');
                $query->where('opd_id', $opd->id);
            })->where(function ($query) use ($tahun) {
                if (($tahun != '') && $tahun != 'Semua') {
                    $query->where('created_at', 'LIKE', '%' . $tahun . '%');
                }
            })->sum('penggunaan_anggaran');
            $realisasiDak = RealisasiManusia::with(['perencanaanManusia'])->where('status', 1)->whereHas('perencanaanManusia', function ($query) use ($opd) {
                $query->where('sumber_dana', 'DAK');
                $query->where('opd_id', $opd->id);
            })->where(function ($query) use ($tahun) {
                if (($tahun != '') && $tahun != 'Semua') {
                    $query->where('created_at', 'LIKE', '%' . $tahun . '%');
                }
            })->sum('penggunaan_anggaran');

            if ($perencanaan == 0) {
                $persentase = '-';
            } else {
                $persentase = round(($realisasi / $perencanaan) * 100, 2);
            }

            if ($perencanaanDau == 0) {
                $persentaseDau = '-';
            } else {
                $persentaseDau = round(($realisasiDau / $perencanaanDau) * 100, 2);
            }

            if ($perencanaanDak == 0) {
                $persentaseDak = '-';
            } else {
                $persentaseDak = round(($realisasiDak / $perencanaanDak) * 100, 2);
            }

            $tabel[] = [
                'opd' => $opd->nama,
                'perencanaan' => round($perencanaan, 2),
                'perencanaanDau' => round($perencanaanDau, 2),
                'perencanaanDak' => round($perencanaanDak, 2),
                'realisasi' => round($realisasi, 2),
                'realisasiDau' => round($realisasiDau, 2),
                'realisasiDak' => round($realisasiDak, 2),
                'persentase' => $persentase,
                'persentaseDau' => $persentaseDau,
                'persentaseDak' => $persentaseDak,
            ];
        }

        return $tabel;
    }

    private function _tabelAnggaranHewan($tahun)
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
        foreach ($daftarOPD as $opd) {
            $perencanaan = PerencanaanHewan::where('opd_id', $opd->id)->where('status', 1)->where(function ($query) use ($tahun) {
                if (($tahun != '') && $tahun != 'Semua') {
                    $query->where('created_at', 'LIKE', '%' . $tahun . '%');
                }
            })->sum('nilai_pembiayaan');
            $perencanaanDau = PerencanaanHewan::where('opd_id', $opd->id)->where('sumber_dana', 'DAU')->where('status', 1)->where(function ($query) use ($tahun) {
                if (($tahun != '') && $tahun != 'Semua') {
                    $query->where('created_at', 'LIKE', '%' . $tahun . '%');
                }
            })->sum('nilai_pembiayaan');
            $perencanaanDak = PerencanaanHewan::where('opd_id', $opd->id)->where('sumber_dana', 'DAK')->where('status', 1)->where(function ($query) use ($tahun) {
                if (($tahun != '') && $tahun != 'Semua') {
                    $query->where('created_at', 'LIKE', '%' . $tahun . '%');
                }
            })->sum('nilai_pembiayaan');

            $realisasi = RealisasiHewan::with(['perencanaanHewan'])->where('status', 1)->whereHas('perencanaanHewan', function ($query) use ($opd) {
                $query->where('opd_id', $opd->id);
            })->where(function ($query) use ($tahun) {
                if (($tahun != '') && $tahun != 'Semua') {
                    $query->where('created_at', 'LIKE', '%' . $tahun . '%');
                }
            })->sum('penggunaan_anggaran');
            $realisasiDau = RealisasiHewan::with(['perencanaanHewan'])->where('status', 1)->whereHas('perencanaanHewan', function ($query) use ($opd) {
                $query->where('sumber_dana', 'DAU');
                $query->where('opd_id', $opd->id);
            })->where(function ($query) use ($tahun) {
                if (($tahun != '') && $tahun != 'Semua') {
                    $query->where('created_at', 'LIKE', '%' . $tahun . '%');
                }
            })->sum('penggunaan_anggaran');
            $realisasiDak = RealisasiHewan::with(['perencanaanHewan'])->where('status', 1)->whereHas('perencanaanHewan', function ($query) use ($opd) {
                $query->where('sumber_dana', 'DAK');
                $query->where('opd_id', $opd->id);
            })->where(function ($query) use ($tahun) {
                if (($tahun != '') && $tahun != 'Semua') {
                    $query->where('created_at', 'LIKE', '%' . $tahun . '%');
                }
            })->sum('penggunaan_anggaran');

            if ($perencanaan == 0) {
                $persentase = '-';
            } else {
                $persentase = round(($realisasi / $perencanaan) * 100, 2);
            }

            if ($perencanaanDau == 0) {
                $persentaseDau = '-';
            } else {
                $persentaseDau = round(($realisasiDau / $perencanaanDau) * 100, 2);
            }

            if ($perencanaanDak == 0) {
                $persentaseDak = '-';
            } else {
                $persentaseDak = round(($realisasiDak / $perencanaanDak) * 100, 2);
            }

            $tabel[] = [
                'opd' => $opd->nama,
                'perencanaan' => round($perencanaan, 2),
                'perencanaanDau' => round($perencanaanDau, 2),
                'perencanaanDak' => round($perencanaanDak, 2),
                'realisasi' => round($realisasi, 2),
                'realisasiDau' => round($realisasiDau, 2),
                'realisasiDak' => round($realisasiDak, 2),
                'persentase' => $persentase,
                'persentaseDau' => $persentaseDau,
                'persentaseDak' => $persentaseDak,
            ];
        }

        return $tabel;
    }

    private function _tabelAnggaranSemua($tahun)
    {
        $tabel = [];
        $tabelAnggaranHewan = $this->_tabelAnggaranHewan($tahun);
        $tabelAnggaranKeong = $this->_tabelAnggaranKeong($tahun);
        $tabelAnggaranManusia = $this->_tabelAnggaranManusia($tahun);

        for ($i = 0; $i < count($tabelAnggaranHewan); $i++) {
            $persentase = '-';
            $persentaseDau = '-';
            $persentaseDak = '-';

            $perencanaan = $tabelAnggaranHewan[$i]['perencanaan'] + $tabelAnggaranKeong[$i]['perencanaan'] + $tabelAnggaranManusia[$i]['perencanaan'];
            $perencanaanDau = $tabelAnggaranHewan[$i]['perencanaanDau'] + $tabelAnggaranKeong[$i]['perencanaanDau'] + $tabelAnggaranManusia[$i]['perencanaanDau'];
            $perencanaanDak = $tabelAnggaranHewan[$i]['perencanaanDak'] + $tabelAnggaranKeong[$i]['perencanaanDak'] + $tabelAnggaranManusia[$i]['perencanaanDak'];

            $realisasi = $tabelAnggaranHewan[$i]['realisasi'] + $tabelAnggaranKeong[$i]['realisasi'] + $tabelAnggaranManusia[$i]['realisasi'];
            $realisasiDau = $tabelAnggaranHewan[$i]['realisasiDau'] + $tabelAnggaranKeong[$i]['realisasiDau'] + $tabelAnggaranManusia[$i]['realisasiDau'];
            $realisasiDak = $tabelAnggaranHewan[$i]['realisasiDak'] + $tabelAnggaranKeong[$i]['realisasiDak'] + $tabelAnggaranManusia[$i]['realisasiDak'];

            if ($perencanaan != 0) {
                $persentase = round(($realisasi / $perencanaan) * 100, 2);
            }

            if ($perencanaanDau != 0) {
                $persentaseDau = round(($realisasiDau / $perencanaanDau) * 100, 2);
            }

            if ($perencanaanDak != 0) {
                $persentaseDak = round(($realisasiDak / $perencanaanDak) * 100, 2);
            }


            $tabel[] = [
                'opd' => $tabelAnggaranHewan[$i]['opd'],
                'perencanaan' => $perencanaan,
                'perencanaanDau' => $perencanaanDau,
                'perencanaanDak' => $perencanaanDak,
                'realisasi' => $realisasi,
                'realisasiDau' => $realisasiDau,
                'realisasiDak' => $realisasiDak,
                'persentase' => $persentase,
                'persentaseDau' => $persentaseDau,
                'persentaseDak' => $persentaseDak,
            ];
        }

        return $tabel;
    }

    public function exportIntervensi(Request $request)
    {
        $tipe = $request->tipe;
        $tahun = $request->tahun;
        if (!in_array($tipe, ['semua', 'keong', 'manusia', 'hewan'])) {
            return redirect()->back();
        }

        $tabelKeong = $this->_tabelKeong($tahun);
        $tabelManusia = $this->_tabelManusia($tahun);
        $tabelHewan = $this->_tabelHewan($tahun);

        $tanggal = Carbon::parse(Carbon::now())->translatedFormat('d F Y');

        return Excel::download(new IntervensiExport($tipe, $tabelKeong, $tabelManusia, $tabelHewan, $tahun), "Export Intervensi" . "-" . $tipe . '-' . $tanggal . "-" . rand(1, 9999) . '.xlsx');
    }

    public function exportAnggaran(Request $request)
    {
        $tipe = $request->tipe;
        $tahun = $request->tahun;
        if (!in_array($tipe, ['semua', 'keong', 'manusia', 'hewan'])) {
            return redirect()->back();
        }

        $tabelAnggaranKeong = $this->_tabelAnggaranKeong($tahun);
        $tabelAnggaranManusia = $this->_tabelAnggaranManusia($tahun);
        $tabelAnggaranHewan = $this->_tabelAnggaranHewan($tahun);
        $tabelAnggaranSemua = $this->_tabelAnggaranSemua($tahun);

        $tanggal = Carbon::parse(Carbon::now())->translatedFormat('d F Y');

        return Excel::download(new AnggaranIntervensiExport($tipe, $tabelAnggaranKeong, $tabelAnggaranManusia, $tabelAnggaranHewan, $tabelAnggaranSemua, $tahun), "Export Anggaran Intervensi" . "-" . $tipe . '-' . $tanggal . "-" . rand(1, 9999) . '.xlsx');
    }
}
