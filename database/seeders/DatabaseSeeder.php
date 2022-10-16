<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Database\Seeders\OPDSeeder;
use Illuminate\Database\Seeder;
use Database\Seeders\UserSeeder;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Database\Seeders\PendudukTableSeeder;
use Database\Seeders\PemilikLokasiKeongSeeder;
use Database\Seeders\DokumenRealisasiKeongTableSeeder;


class DatabaseSeeder extends Seeder
{

    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Storage::deleteDirectory('/uploads');
        Storage::makeDirectory('/uploads');

        File::copyDirectory(
            public_path('file_dummy'),
            storage_path('app/public/uploads')
        );




        // $this->call(PendudukTableSeeder::class); // new
        // $this->call(PendudukSeeder::class);
        // $this->call(PuskesmasSeeder::class);
        // $this->call(PosyanduSeeder::class);
        $this->call(IndikatorTableSeeder::class);
        $this->call(DesaTableSeeder::class);
        $this->call(KecamatanTableSeeder::class);
        $this->call(OPDSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(SumberDanaSeeder::class);
        $this->call(PuskesmasTableSeeder::class);
        $this->call(PosyanduTableSeeder::class);
        $this->call(OrangTuaTableSeeder::class);
        $this->call(AnakTableSeeder::class);
        $this->call(PengukuranAnakTableSeeder::class);


        $this->call(PerencanaanTableSeeder::class);
        $this->call(OpdTerkaitTableSeeder::class);
        $this->call(DokumenPerencanaanTableSeeder::class);
        $this->call(RealisasiTableSeeder::class);
        $this->call(PendudukRealisasiTableSeeder::class);
        $this->call(DokumenRealisasiTableSeeder::class);
        $this->call(OrangTuaTableSeeder::class);
        $this->call(AnakTableSeeder::class);
        $this->call(PengukuranAnakTableSeeder::class);
    }
}
