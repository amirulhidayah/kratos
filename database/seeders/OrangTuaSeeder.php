<?php

namespace Database\Seeders;

use App\Models\Desa;
use App\Models\OrangTua;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator;

class OrangTuaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = app(Generator::class);
        for ($i = 0; $i < 300; $i++) {
            $desa = Desa::inRandomOrder()->first();

            $randomNumberIbu = rand(0, 1);
            $randomNumberAyah = rand(0, 1);
            $rt = rand(1, 10);
            $rw = rand(1, 10);

            if ((($randomNumberIbu == 1) && ($randomNumberAyah == 1)) || (($randomNumberIbu == 0) && ($randomNumberAyah == 0))) {
                $namaAyah = $faker->name('male');
                $nikAyah = $faker->nik;
                $namaIbu = $faker->name('female');
                $nikIbu = $faker->nik;
            } else if ((($randomNumberIbu == 1) && ($randomNumberAyah == 0))) {
                $namaAyah = null;
                $nikAyah = null;
                $namaIbu = $faker->name('female');
                $nikIbu = $faker->nik;
            } else {
                $namaAyah = $faker->name('male');
                $nikAyah = $faker->nik;
                $namaIbu = null;
                $nikIbu = null;
            }

            $orangTua = new OrangTua();
            $orangTua->nama_ibu = $namaIbu;
            $orangTua->nik_ibu = $nikIbu;
            $orangTua->nama_ayah = $namaAyah;
            $orangTua->nik_ayah = $nikAyah;
            $orangTua->rt = $rt;
            $orangTua->rw = $rw;
            $orangTua->alamat = 'RT.' . $rt . ', RW.' . $rw . ', Desa ' . $desa->nama;
            $orangTua->desa_id = $desa->id;
            $orangTua->save();
        }
    }
}
