<?php

namespace Database\Seeders;

use App\Models\Lokasi;
use App\Models\Penduduk;
use Illuminate\Database\Seeder;
use App\Models\PemilikLokasi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PemilikLokasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $lokasi = Lokasi::all();
        foreach ($lokasi as $lokasi) {
            $randNumber = rand(0, 1);
            if ($randNumber == 1) {
                $penduduk = Penduduk::inRandomOrder()->first();

                $pemilikLokasi = new PemilikLokasi();
                $pemilikLokasi->lokasi_id = $lokasi->id;
                $pemilikLokasi->penduduk_id = $penduduk->id;
                $pemilikLokasi->save();
            }
        }
    }
}
