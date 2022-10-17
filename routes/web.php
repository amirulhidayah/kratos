<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ListController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\masterData\OPDController;
use App\Http\Controllers\PengaturanAkunController;
use App\Http\Controllers\masterData\PendudukController;
use App\Http\Controllers\masterData\lokasi\LokasiDesaController;
use App\Http\Controllers\intervensi\RealisasiController;
use App\Http\Controllers\intervensi\PerencanaanController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\masterData\IndikatorController;
use App\Http\Controllers\masterData\wilayah\DesaController;
use App\Http\Controllers\masterData\wilayah\KecamatanController;
use App\Http\Controllers\masterData\AkunController;
use App\Http\Controllers\masterData\AnakController;
use App\Http\Controllers\masterData\OrangTuaAnakController;
use App\Http\Controllers\masterData\OrangTuaController;
use App\Http\Controllers\masterData\PosyanduController;
use App\Http\Controllers\masterData\PuskesmasController;
use App\Http\Controllers\masterData\SumberDanaController;
use App\Http\Controllers\DaftarPengukuranAnakController;
use App\Http\Controllers\HitungController;
use App\Http\Controllers\PengukuranAnakController;
use App\Imports\PuskesmasPosyanduImport;
use Maatwebsite\Excel\Facades\Excel;

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
    Route::resource('rencana-intervensi', PerencanaanController::class);
    Route::post('rencana-intervensi/konfirmasi/{rencana_intervensi}', PerencanaanController::class . '@konfirmasi');
    Route::get('rencana-intervensi/map/{rencana_intervensi}', PerencanaanController::class . '@map');
    Route::post('export-perencanaan', PerencanaanController::class . '@export');
    Route::put('rencana-intervensi/buat-alasan-tidak-terselesaikan/{rencana_intervensi}', PerencanaanController::class . '@buatAlasanTidakTerselesaikan');
    Route::post('rencana-intervensi/baca-alasan-tidak-terselesaikan/{rencana_intervensi}', PerencanaanController::class . '@bacaAlasanTidakTerselesaikan');


    Route::resource('realisasi-intervensi', RealisasiController::class);
    Route::get('tabel-laporan-realisasi', RealisasiController::class . '@tabelLaporan');
    Route::get('realisasi-intervensi/create-pelaporan/{realisasi_intervensi}', RealisasiController::class . '@createPelaporan');
    Route::get('realisasi-intervensi/show-laporan/{realisasi_intervensi}', RealisasiController::class . '@showLaporan');
    Route::post('realisasi-intervensi/konfirmasi/{realisasi_intervensi}', RealisasiController::class . '@konfirmasi');
    Route::post('realisasi-intervensi/update-opd/{realisasi_intervensi}', RealisasiController::class . '@updateOPD');
    Route::delete('realisasi-intervensi/delete-opd/{realisasi_intervensi}', RealisasiController::class . '@deleteOPD');
    Route::delete('realisasi-intervensi/delete-laporan/{realisasi_intervensi}', RealisasiController::class . '@deleteLaporan');
    Route::delete('realisasi-intervensi/delete-semua-laporan/{realisasi_intervensi}', RealisasiController::class . '@deleteSemuaLaporan');
    Route::get('hasil-realisasi', RealisasiController::class . '@hasilRealisasi');
    Route::post('export-realisasi', RealisasiController::class . '@export');
    Route::post('export-hasil-realisasi', RealisasiController::class . '@exportHasilRealisasi');




    // Master Data

    Route::group(['middleware' => ['role:Admin|Pimpinan']], function () {
        Route::resource('master-data/opd', OPDController::class)->only(
            'index',
            'show'
        );
    });

    Route::post('master-data/anak/export', [AnakController::class, 'export']);
    Route::post('master-data/orang-tua/export', [OrangTuaController::class, 'export']);
    Route::post('daftar-pengukuran-anak/jumlah-data', [DaftarPengukuranAnakController::class, 'getJumlah']);
    Route::post('daftar-pengukuran-anak/export-pengukuran-anak', [DaftarPengukuranAnakController::class, 'exportPengukuranAnak']);
    Route::post('daftar-pengukuran-anak/export-jumlah', [DaftarPengukuranAnakController::class, 'exportJumlah']);

    Route::group(['middleware' => ['role:Admin']], function () {
        Route::resource('master-data/opd', OPDController::class)->except(
            'index',
            'show'
        );

        Route::resource('master-data/orang-tua/anak/{orangTua}', OrangTuaAnakController::class)->except(
            'index',
            'show'
        )->parameters([
            '{orangTua}' => 'anak'
        ]);

        Route::resource('master-data/orang-tua', OrangTuaController::class)->except(
            'index',
            'show'
        );

        Route::resource('master-data/anak', AnakController::class)->except(
            'index',
            'show'
        );
        Route::resource('master-data/penduduk', PendudukController::class)->except(
            'index',
            'show'
        );
        // Indikator
        Route::resource('master-data/indikator', IndikatorController::class);

        // Wilayah
        Route::get('map/kecamatan', [KecamatanController::class, 'getMapData']);

        Route::post('master-data/wilayah/kecamatan/export', [KecamatanController::class, 'export']);
        Route::resource('master-data/wilayah/kecamatan', KecamatanController::class);

        Route::post('master-data/wilayah/desa/{kecamatan}/export', [DesaController::class, 'export']);
        Route::get('map/desa', [DesaController::class, 'getMapData']);
        Route::resource('master-data/wilayah/desa/{kecamatan}', DesaController::class)->parameters([
            '{kecamatan}' => 'desa'
        ]);
        Route::resource('master-data/akun', AkunController::class)->parameters(['akun' => 'user']);

        Route::resource('pengukuran-anak/{anak}', PengukuranAnakController::class)->except(
            'index',
            'show'
        )->parameters(
            ['{anak}' => 'pengukuranAnak']
        );

        Route::resource('daftar-pengukuran-anak', DaftarPengukuranAnakController::class)->except(
            'index',
            'show'
        );
    });


    Route::resource('daftar-pengukuran-anak', DaftarPengukuranAnakController::class)->only(
        'index',
        'show'
    );
    // Pengaturan Akun
    Route::get('pengaturan-akun', [PengaturanAkunController::class, 'index']);
    Route::put('pengaturan-akun', [PengaturanAkunController::class, 'update']);

    Route::resource('master-data/puskesmas', PuskesmasController::class)->parameters(['puskesmas' => 'puskesmas']);
    Route::resource('master-data/posyandu/{puskesmas}', PosyanduController::class)->parameters([
        '{puskesmas}' => 'posyandu'
    ]);
    Route::resource('master-data/sumber-dana', SumberDanaController::class)->parameters(['sumber-dana' => 'sumberDana']);

    // Orang Tua
    Route::resource('master-data/orang-tua/anak/{orangTua}', OrangTuaAnakController::class)->only(
        'index',
        'show'
    )->parameters([
        '{orangTua}' => 'anak'
    ]);

    Route::resource('master-data/anak', AnakController::class)->only(
        'index',
        'show'
    );
    Route::resource('master-data/orang-tua', OrangTuaController::class)->only(
        'index',
        'show'
    );

    Route::resource('pengukuran-anak/{anak}', PengukuranAnakController::class)->only(
        'index',
        'show'
    )->parameters(
        ['{anak}' => 'pengukuranAnak']
    );

    // Penduduk
    Route::get('master-data/penduduk/jumlah-penduduk', [PendudukController::class, 'getJumlahPenduduk']);
    Route::post('master-data/penduduk/export-jumlah', [PendudukController::class, 'exportJumlah']);
    Route::post('master-data/penduduk/export', [PendudukController::class, 'export']);
    Route::resource('master-data/penduduk', PendudukController::class)->only(
        'index',
        'show'
    );

    // List
    Route::get('list/puskesmas', [ListController::class, 'puskesmas']);
    Route::get('list/posyandu', [ListController::class, 'posyandu']);
    Route::get('list/kecamatan', [ListController::class, 'kecamatan']);
    Route::get('list/desa', [ListController::class, 'desa']);
    Route::get('list/orang-tua', [ListController::class, 'orangTua']);

    Route::get('importPuskesmas', function () {
        Excel::import(new PuskesmasPosyanduImport, 'Posyandupuskesmas.xlsx');
        echo "Berhasil";
    });

    Route::get('hitung/pengukuran-anak', [HitungController::class, 'pengukuranAnak']);

    Route::get('coba', function () {
        echo bbtb(1, 'Perempuan', 49, 3.5);
    });
});
