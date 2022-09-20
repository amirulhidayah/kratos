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

        $this->call(PerencanaanTableSeeder::class);
        $this->call(RealisasiTableSeeder::class);
        $this->call(OPDSeeder::class);
<<<<<<< HEAD
        $this->call(HewanSeeder::class);
        $this->call(LokasiKeongTableSeeder::class);
        $this->call(LokasiHewanSeeder::class);
        $this->call(DesaTableSeeder::class);
        $this->call(KecamatanTableSeeder::class);
        $this->call(PendudukSeeder::class);
        // $this->call(PendudukTableSeeder::class); // new
        $this->call(LokasiKeongTableSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(RealisasiKeongTableSeeder::class);
        $this->call(DokumenRealisasiKeongTableSeeder::class);
        $this->call(LokasiPerencanaanKeongTableSeeder::class);
        $this->call(TahunSeeder::class);
        $this->call(RoadMapSeeder::class);
        $this->call(MasterPlanSeeder::class);
        $this->call(JumlahHewanTableSeeder::class);
        $this->call(PemilikLokasiHewanTableSeeder::class);
        $this->call(SekolahSeeder::class);
        $this->call(SiswaSeeder::class);
        $this->call(PemilikLokasiKeongSeeder::class);
        $this->call(DokumenRealisasiManusiaTableSeeder::class);
        $this->call(OpdTerkaitManusiaTableSeeder::class);
        $this->call(PerencanaanManusiaTableSeeder::class);
        $this->call(PendudukPerencanaanManusiaTableSeeder::class);
        $this->call(DokumenPerencanaanManusiaTableSeeder::class);
        $this->call(RealisasiManusiaTableSeeder::class);
        $this->call(OpdTerkaitKeongTableSeeder::class);
        $this->call(PerencanaanHewanTableSeeder::class); // new
        $this->call(OpdTerkaitHewanTableSeeder::class); // new
        $this->call(DokumenPerencanaanHewanTableSeeder::class); // new
        $this->call(LokasiPerencanaanHewanTableSeeder::class); // new
        $this->call(RealisasiHewanTableSeeder::class);
        $this->call(DokumenRealisasiHewanTableSeeder::class);
        $this->call(PerencanaanKeongTableSeeder::class);
        $this->call(DokumenPerencanaanKeongTableSeeder::class);
        $this->call(IndikatorTableSeeder::class);
=======
        $this->call(DesaSeeder::class);
        $this->call(LokasiTableSeeder::class);
        $this->call(DokumenPerencanaanTableSeeder::class);
        $this->call(DokumenRealisasiTableSeeder::class);
        $this->call(LokasiPerencanaanTableSeeder::class);
        $this->call(OpdTerkaitTableSeeder::class);
        // $this->call(PemilikLokasiSeeder::class);
        $this->call(PendudukTableSeeder::class); // new
        $this->call(UserSeeder::class);
>>>>>>> kratos/main
    }
}
