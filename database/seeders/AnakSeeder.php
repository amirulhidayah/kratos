<?php

namespace Database\Seeders;

use App\Models\Anak;
use App\Models\OrangTua;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator;

class AnakSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $arrayJenisKelamin = ['Laki-Laki', 'Perempuan'];

        $faker = app(Generator::class);


        for ($i = 0; $i < 150; $i++) {
            $randomNumber = rand(0, 1);

            if ($randomNumber == 1) {
                $orangTua = OrangTua::inRandomOrder()->first();
                $jenisKelamin = $arrayJenisKelamin[array_rand($arrayJenisKelamin)];
                $tanggalLahir = Carbon::now()->subYears(rand(1, 5))->subMonth(rand(1, 12))->subDay(rand(1, 30))->format('Y-m-d');
                $bbLahir = rand(2 * 10, 13 * 10) / 10;
                $tbLahir = rand(45 * 10, 97 * 10) / 10;


                if ($jenisKelamin == 'Laki-Laki') {
                    $nama = $faker->name('male');
                } else {
                    $nama = $faker->name('female');
                }

                $anak = new Anak();
                $anak->nama = $nama;
                $anak->nik = $faker->nik;
                $anak->jenis_kelamin = $jenisKelamin;
                $anak->bb_lahir = $bbLahir;
                $anak->tb_lahir = $tbLahir;
                $anak->tanggal_lahir = $tanggalLahir;
                $anak->orang_tua_id = $orangTua->id;
                $anak->save();
            }
        }
    }
}
