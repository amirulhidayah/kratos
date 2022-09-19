<?php

namespace App\Http\Controllers\masterData\sekolah;

use App\Exports\JenjangSekolahExport;
use App\Http\Controllers\Controller;
use App\Models\Desa;
use App\Models\Sekolah;
use App\Models\Siswa;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class JenjangSekolahController extends Controller
{
    public function index()
    {
        $jumlahData = $this->_getJumlahData();
        return view('dashboard.pages.masterData.sekolah.jenjangSekolah.index', compact(['jumlahData']));
    }

    public function export()
    {
        $daftarJumlahData = $this->_getJumlahData();
        $daftarDesa = Desa::orderBy('nama', 'asc')->get();
        $tanggal = Carbon::parse(Carbon::now())->translatedFormat('d F Y');

        return Excel::download(new JenjangSekolahExport($daftarJumlahData, $daftarDesa), "Export Data Jumlah Data Jenjang Sekolah" . "-" . $tanggal . "-" . rand(1, 9999) . '.xlsx');
    }

    private function _getJumlahData()
    {
        $arrayJumlah = [];
        $arrayDesa = [];
        $arrayJenjang = ['SD', 'SMP', 'SMA / SMK'];

        foreach ($arrayJenjang as $jenjang) {
            $arrayDesa = [];

            $jumlahSekolah = Sekolah::where('jenjang', $jenjang)->count();
            $siswaLaki = Siswa::with(['sekolah', 'penduduk'])
                ->whereHas('sekolah', function ($query) use ($jenjang) {
                    $query->where('jenjang', $jenjang);
                })
                ->whereHas('penduduk', function ($query) {
                    $query->where('jenis_kelamin', 'Laki-Laki');
                })
                ->count();

            $siswaPerempuan = Siswa::with(['sekolah', 'penduduk'])
                ->whereHas('sekolah', function ($query) use ($jenjang) {
                    $query->where('jenjang', $jenjang);
                })
                ->whereHas('penduduk', function ($query) {
                    $query->where('jenis_kelamin', 'Perempuan');
                })
                ->count();

            $daftarDesa = Desa::orderBy('nama', 'asc')->get();

            foreach ($daftarDesa as $desa) {
                $jumlahSekolahDesa = Sekolah::where('jenjang', $jenjang)->where('desa_id', $desa->id)->count();
                $siswaLakiDesa = Siswa::with(['sekolah', 'penduduk'])
                    ->whereHas('sekolah', function ($query) use ($jenjang, $desa) {
                        $query->where('jenjang', $jenjang);
                        $query->where('desa_id', $desa->id);
                    })
                    ->whereHas('penduduk', function ($query) {
                        $query->where('jenis_kelamin', 'Laki-Laki');
                    })
                    ->count();

                $siswaPerempuanDesa = Siswa::with(['sekolah', 'penduduk'])
                    ->whereHas('sekolah', function ($query) use ($jenjang, $desa) {
                        $query->where('jenjang', $jenjang);
                        $query->where('desa_id', $desa->id);
                    })
                    ->whereHas('penduduk', function ($query) {
                        $query->where('jenis_kelamin', 'Perempuan');
                    })
                    ->count();

                $arrayDesa[] = [
                    'desa' => $desa->nama,
                    'jumlah_sekolah' => $jumlahSekolahDesa,
                    'siswa_laki' => $siswaLakiDesa,
                    'siswa_perempuan' => $siswaPerempuanDesa,
                    'total_siswa' => ($siswaLakiDesa + $siswaPerempuanDesa)
                ];
            }

            $arrayJumlah[] = [
                'jenjang' => $jenjang,
                'jumlah_sekolah' => $jumlahSekolah,
                'siswa_laki' => $siswaLaki,
                'siswa_perempuan' => $siswaPerempuan,
                'total_siswa' => ($siswaLaki + $siswaPerempuan),
                'desa' => $arrayDesa
            ];
        }

        return $arrayJumlah;
    }
}
