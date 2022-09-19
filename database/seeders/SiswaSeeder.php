<?php

namespace Database\Seeders;

use App\Models\Penduduk;
use App\Models\Sekolah;
use App\Models\Siswa;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 200; $i++) {
            $randomNumber = rand(0, 1);
            if ($randomNumber == 1) {
                $idSiswa = Siswa::pluck('penduduk_id');
                $sekolah = Sekolah::inRandomOrder()->first();
                $penduduk = Penduduk::inRandomOrder()->whereNotIn('id', $idSiswa)->first();

                $siswa = new Siswa();
                $siswa->sekolah_id = $sekolah->id;
                $siswa->penduduk_id = $penduduk->id;
                $siswa->save();
            }
        }
    }
}
