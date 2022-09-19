<?php

namespace Database\Seeders;

use App\Models\LokasiKeong;
use App\Models\PemilikLokasiKeong;
use App\Models\Penduduk;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PemilikLokasiKeongSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $lokasiKeong = LokasiKeong::get();
        foreach ($lokasiKeong as $lokasi) {
            $randNumber = rand(0, 1);
            if ($randNumber == 1) {
                $penduduk = Penduduk::inRandomOrder()->first();

                $pemilikLokasiKeong = new PemilikLokasiKeong();
                $pemilikLokasiKeong->lokasi_keong_id = $lokasi->id;
                $pemilikLokasiKeong->penduduk_id = $penduduk->id;
                $pemilikLokasiKeong->save();
            }
        }
    }
}
