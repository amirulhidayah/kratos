<?php

use App\Models\Siswa;
use App\Models\Perencanaan;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ListController;
use App\Http\Controllers\ImportController;
use App\Http\Controllers\DashboardController;
use Database\Seeders\PerencanaanManusiaSeeder;
use App\Http\Controllers\masterData\OPDController;
use App\Http\Controllers\PengaturanAkunController;
use App\Http\Controllers\dokumen\RoadMapController;
use App\Http\Controllers\masterData\AkunController;
use App\Http\Controllers\masterData\HewanController;
use App\Http\Controllers\masterData\TahunController;
use App\Http\Controllers\dokumen\MasterPlanController;
use App\Http\Controllers\masterData\PendudukController;
use App\Http\Controllers\masterData\sekolah\SiswaController;
use App\Http\Controllers\masterData\sekolah\SekolahController;
use App\Http\Controllers\masterData\lokasi\LokasiDesaController;
use App\Http\Controllers\masterData\lokasi\LokasiHewanController;
use App\Http\Controllers\masterData\lokasi\LokasiKeongController;
use App\Http\Controllers\masterData\sekolah\JenjangSekolahController;
use App\Http\Controllers\intervensi\realisasi\keong\RealisasiKeongController;
use App\Http\Controllers\intervensi\perencanaan\keong\PerencanaanKeongController;
use App\Http\Controllers\intervensi\realisasi\manusia\RealisasiManusiaController;
use App\Http\Controllers\intervensi\perencanaan\manusia\PerencanaanManusiaController;
use App\Http\Controllers\intervensi\perencanaan\hewan\PerencanaanHewanController;
use App\Http\Controllers\intervensi\realisasi\hewan\RealisasiHewanController;
use App\Http\Controllers\LandingPageController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [LandingPageController::class, 'index']);

Route::group(['middleware' => 'guest'], function () {
    Route::get('/login', [AuthController::class, 'index'])->name('login');
    Route::post('/cekLogin', [AuthController::class, 'cekLogin']);
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::resource('/dashboard', DashboardController::class);
    Route::post('/dashboard/export/intervensi/{tipe}', [DashboardController::class, 'exportIntervensi']);
    Route::post('/dashboard/export/anggaran/{tipe}', [DashboardController::class, 'exportAnggaran']);

    // Keong
    Route::resource('rencana-intervensi-keong', PerencanaanKeongController::class);
    Route::post('rencana-intervensi-keong/konfirmasi/{rencana_intervensi_keong}', PerencanaanKeongController::class . '@konfirmasi');
    Route::get('rencana-intervensi-keong/map/{rencana_intervensi_keong}', PerencanaanKeongController::class . '@map');
    Route::post('export-perencanaan-keong', PerencanaanKeongController::class . '@export');
    Route::put('rencana-intervensi-keong/buat-alasan-tidak-terselesaikan/{rencana_intervensi_keong}', PerencanaanKeongController::class . '@buatAlasanTidakTerselesaikan');
    Route::post('rencana-intervensi-keong/baca-alasan-tidak-terselesaikan/{rencana_intervensi_keong}', PerencanaanKeongController::class . '@bacaAlasanTidakTerselesaikan');


    Route::resource('realisasi-intervensi-keong', RealisasiKeongController::class);
    Route::get('tabel-laporan-realisasi-keong', RealisasiKeongController::class . '@tabelLaporan');
    Route::get('realisasi-intervensi-keong/create-pelaporan/{realisasi_intervensi_keong}', RealisasiKeongController::class . '@createPelaporan');
    Route::get('realisasi-intervensi-keong/show-laporan/{realisasi_intervensi_keong}', RealisasiKeongController::class . '@showLaporan');
    Route::post('realisasi-intervensi-keong/konfirmasi/{realisasi_intervensi_keong}', RealisasiKeongController::class . '@konfirmasi');
    Route::post('realisasi-intervensi-keong/update-opd/{realisasi_intervensi_keong}', RealisasiKeongController::class . '@updateOPD');
    Route::delete('realisasi-intervensi-keong/delete-opd/{realisasi_intervensi_keong}', RealisasiKeongController::class . '@deleteOPD');
    Route::delete('realisasi-intervensi-keong/delete-laporan/{realisasi_intervensi_keong}', RealisasiKeongController::class . '@deleteLaporan');
    Route::delete('realisasi-intervensi-keong/delete-semua-laporan/{realisasi_intervensi_keong}', RealisasiKeongController::class . '@deleteSemuaLaporan');
    Route::get('hasil-realisasi-keong', RealisasiKeongController::class . '@hasilRealisasi');
    Route::post('export-realisasi-keong', RealisasiKeongController::class . '@export');
    Route::post('export-hasil-realisasi-keong', RealisasiKeongController::class . '@exportHasilRealisasi');


    // Manusia
    Route::resource('rencana-intervensi-manusia', PerencanaanManusiaController::class)->parameters([
        'rencana-intervensi-manusia' => 'rencana_intervensi_manusia'
    ]);
    Route::post('rencana-intervensi-manusia/konfirmasi/{rencana_intervensi_manusia}', PerencanaanManusiaController::class . '@konfirmasi');
    Route::post('export-perencanaan-manusia', PerencanaanManusiaController::class . '@export');
    Route::put('rencana-intervensi-manusia/buat-alasan-tidak-terselesaikan/{rencana_intervensi_manusia}', PerencanaanManusiaController::class . '@buatAlasanTidakTerselesaikan');
    Route::post('rencana-intervensi-manusia/baca-alasan-tidak-terselesaikan/{rencana_intervensi_manusia}', PerencanaanManusiaController::class . '@bacaAlasanTidakTerselesaikan');

    Route::resource('realisasi-intervensi-manusia', RealisasiManusiaController::class)->parameters([
        'realisasi-intervensi-manusia' => 'realisasi_intervensi_manusia'
    ]);
    Route::get('tabel-laporan-realisasi-manusia', RealisasiManusiaController::class . '@tabelLaporan');
    Route::get('realisasi-intervensi-manusia/create-pelaporan/{realisasi_intervensi_manusia}', RealisasiManusiaController::class . '@createPelaporan');
    Route::get('realisasi-intervensi-manusia/show-laporan/{realisasi_intervensi_manusia}', RealisasiManusiaController::class . '@showLaporan');
    Route::post('realisasi-intervensi-manusia/konfirmasi/{realisasi_intervensi_manusia}', RealisasiManusiaController::class . '@konfirmasi');
    Route::post('realisasi-intervensi-manusia/update-opd/{realisasi_intervensi_manusia}', RealisasiManusiaController::class . '@updateOPD');
    Route::delete('realisasi-intervensi-manusia/delete-opd/{realisasi_intervensi_manusia}', RealisasiManusiaController::class . '@deleteOPD');
    Route::delete('realisasi-intervensi-manusia/delete-laporan/{realisasi_intervensi_manusia}', RealisasiManusiaController::class . '@deleteLaporan');
    Route::delete('realisasi-intervensi-manusia/delete-semua-laporan/{realisasi_intervensi_manusia}', RealisasiManusiaController::class . '@deleteSemuaLaporan');
    Route::get('hasil-realisasi-manusia', RealisasiManusiaController::class . '@hasilRealisasi');
    Route::post('export-realisasi-manusia', RealisasiManusiaController::class . '@export');
    Route::post('export-hasil-realisasi-manusia', RealisasiManusiaController::class . '@exportHasilRealisasi');



    // Hewan
    Route::resource('rencana-intervensi-hewan', PerencanaanHewanController::class);
    Route::post('rencana-intervensi-hewan/konfirmasi/{rencana_intervensi_hewan}', PerencanaanHewanController::class . '@konfirmasi');
    Route::get('rencana-intervensi-hewan/map/{rencana_intervensi_hewan}', PerencanaanHewanController::class . '@map');
    Route::post('export-perencanaan-hewan', PerencanaanHewanController::class . '@export');
    Route::put('rencana-intervensi-hewan/buat-alasan-tidak-terselesaikan/{rencana_intervensi_hewan}', PerencanaanHewanController::class . '@buatAlasanTidakTerselesaikan');
    Route::post('rencana-intervensi-hewan/baca-alasan-tidak-terselesaikan/{rencana_intervensi_hewan}', PerencanaanHewanController::class . '@bacaAlasanTidakTerselesaikan');


    Route::resource('realisasi-intervensi-hewan', RealisasiHewanController::class);
    Route::get('tabel-laporan-realisasi-hewan', RealisasiHewanController::class . '@tabelLaporan');
    Route::get('realisasi-intervensi-hewan/create-pelaporan/{realisasi_intervensi_hewan}', RealisasiHewanController::class . '@createPelaporan');
    Route::get('realisasi-intervensi-hewan/show-laporan/{realisasi_intervensi_hewan}', RealisasiHewanController::class . '@showLaporan');
    Route::post('realisasi-intervensi-hewan/konfirmasi/{realisasi_intervensi_hewan}', RealisasiHewanController::class . '@konfirmasi');
    Route::post('realisasi-intervensi-hewan/update-opd/{realisasi_intervensi_hewan}', RealisasiHewanController::class . '@updateOPD');
    Route::delete('realisasi-intervensi-hewan/delete-opd/{realisasi_intervensi_hewan}', RealisasiHewanController::class . '@deleteOPD');
    Route::delete('realisasi-intervensi-hewan/delete-laporan/{realisasi_intervensi_hewan}', RealisasiHewanController::class . '@deleteLaporan');
    Route::delete('realisasi-intervensi-hewan/delete-semua-laporan/{realisasi_intervensi_hewan}', RealisasiHewanController::class . '@deleteSemuaLaporan');
    Route::get('hasil-realisasi-hewan', RealisasiHewanController::class . '@hasilRealisasi');
    Route::post('export-realisasi-hewan', RealisasiHewanController::class . '@export');
    Route::post('export-hasil-realisasi-hewan', RealisasiHewanController::class . '@exportHasilRealisasi');



    // Master Data
    // Lokasi
    Route::get('master-data/lokasi/desa/tabel', [LokasiDesaController::class, 'tabel']);
    Route::post('master-data/lokasi/desa/export', [LokasiDesaController::class, 'export']);
    Route::resource('master-data/lokasi/desa', LokasiDesaController::class);

    Route::post('master-data/lokasi/keong/export-demografi', [LokasiKeongController::class, 'exportDemografi']);
    Route::post('master-data/lokasi/keong/export', [LokasiKeongController::class, 'export']);
    Route::resource('master-data/lokasi/keong', LokasiKeongController::class)->parameters(
        [
            'keong' => 'lokasi_keong'
        ]
    );
    Route::post('master-data/lokasi/hewan/export-demografi', [LokasiHewanController::class, 'exportDemografi']);
    Route::post('master-data/lokasi/hewan/export-lokasi', [LokasiHewanController::class, 'exportLokasiHewan']);
    Route::resource('master-data/lokasi/hewan', LokasiHewanController::class)->parameters(
        [
            'hewan' => 'lokasi_hewan'
        ]
    );
    Route::post('master-data/siswa/detail-siswa', [SiswaController::class, 'detailSiswa']);

    Route::group(['middleware' => ['role:Admin|Pimpinan']], function () {
        Route::resource('master-data/opd', OPDController::class)->only(
            'index',
            'show'
        );
    });

    Route::group(['middleware' => ['role:Admin']], function () {
        Route::resource('master-data/opd', OPDController::class)->except(
            'index',
            'show'
        );
        Route::resource('master-data/hewan', HewanController::class);
        Route::resource('master-data/tahun', TahunController::class);

        // Akun
        Route::resource('master-data/akun', AkunController::class)->parameters(['akun' => 'user']);

        // Dokumen
        Route::resource('dokumen/road-map', RoadMapController::class)->parameters(['road-map' => 'road_map'])->except(
            'index',
            'show'
        );
        Route::resource('dokumen/master-plan', MasterPlanController::class)->parameters(['master-plan' => 'master-plan'])->except(
            'index',
            'show'
        );

        Route::resource('master-data/penduduk', PendudukController::class)->except(
            'index',
            'show'
        );

        Route::resource('master-data/sekolah/{jenjangSekolah}', SekolahController::class)->parameters([
            '{jenjangSekolah}' => 'sekolah'
        ])->except(
            'index',
            'show'
        );

        Route::resource('master-data/siswa/{sekolah}', SiswaController::class)->parameters([
            '{sekolah}' => 'siswa'
        ])->except(
            'index',
            'show'
        );
    });

    Route::get('map/desa', [LokasiDesaController::class, 'getMapData']);
    Route::get('map/keong', [LokasiKeongController::class, 'getMapData']);
    Route::get('map/hewan', [LokasiHewanController::class, 'getMapData']);

    // List
    Route::get('list/desa', [ListController::class, 'desa']);
    Route::get('list/hewan', [ListController::class, 'hewan']);

    // Dokumen
    Route::resource('dokumen/road-map', RoadMapController::class)->parameters(['road-map' => 'road_map'])->only(
        'index',
        'show'
    );
    Route::resource('dokumen/master-plan', MasterPlanController::class)->parameters(['master-plan' => 'master-plan'])->only(
        'index',
        'show'
    );

    // Pengaturan Akun
    Route::get('pengaturan-akun', [PengaturanAkunController::class, 'index']);
    Route::put('pengaturan-akun', [PengaturanAkunController::class, 'update']);

    // Penduduk
    Route::post('master-data/penduduk/export-jumlah', [PendudukController::class, 'exportJumlah']);
    Route::post('master-data/penduduk/export', [PendudukController::class, 'export']);
    Route::resource('master-data/penduduk', PendudukController::class)->only(
        'index',
        'show'
    );

    // Sekolah
    Route::post('master-data/jenjang-sekolah/export', [JenjangSekolahController::class, 'export']);
    Route::get('master-data/jenjang-sekolah', [JenjangSekolahController::class, 'index']);

    Route::post('master-data/sekolah/{jenjangSekolah}/export', [SekolahController::class, 'export']);
    Route::resource('master-data/sekolah/{jenjangSekolah}', SekolahController::class)->parameters([
        '{jenjangSekolah}' => 'sekolah'
    ])->only(
        'index',
        'show'
    );

    Route::post('master-data/siswa/{sekolah}/export', [SiswaController::class, 'export']);
    Route::post('master-data/siswa/{sekolah}/delete-selected', [SiswaController::class, 'deleteSelected']);
    Route::resource('master-data/siswa/{sekolah}', SiswaController::class)->parameters([
        '{sekolah}' => 'siswa'
    ])->only(
        'index',
        'show'
    );
});
