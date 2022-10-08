<?php

namespace Database\Seeders;

use App\Models\Anak;
use App\Models\OrangTua;
use App\Models\PemeriksaanAnak;
use App\Models\PengukuranAnak;
use App\Models\Posyandu;
use App\Models\Puskesmas;
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

                $tanggalPengukuran = Carbon::parse($tanggalLahir)->addYear(rand(1, 5))->addMonth(rand(1, 12))->addDay(rand(1, 30))->format('Y-m-d');
                $usiaBulan = Carbon::parse($tanggalLahir)->diffInMonths(Carbon::parse($tanggalPengukuran));
                $usiaSebut = usiaSebut($tanggalLahir, $tanggalPengukuran);
                $berat = rand($bbLahir * 10, 22.4 * 10) / 10;
                $tinggi = rand($tbLahir * 10, 110 * 10) / 10;

                $puskesmas = Puskesmas::inRandomOrder()->first();
                if (rand(0, 1) == 1) {
                    $posyandu = Posyandu::inRandomOrder()->where('puskesmas_id', $puskesmas->id)->first();
                }

                if (rand(0, 1) == 1) {
                    $pengukuranAnak = new PengukuranAnak();
                    $pengukuranAnak->anak_id = $anak->id;
                    $pengukuranAnak->berat = $berat;
                    $pengukuranAnak->tinggi = $tinggi;
                    $pengukuranAnak->lila = rand(0, 15);
                    $pengukuranAnak->tanggal_pengukuran = $tanggalPengukuran;
                    $pengukuranAnak->bb_u = bbu($usiaBulan, $jenisKelamin, $berat);
                    $pengukuranAnak->tb_u = tbu($usiaBulan, $jenisKelamin, $tinggi);
                    $pengukuranAnak->bb_tb = bbtb($usiaBulan, $jenisKelamin, $tinggi, $berat);
                    $pengukuranAnak->usia_saat_ukur = $usiaSebut;
                    $pengukuranAnak->created_at = $tanggalPengukuran;
                    $pengukuranAnak->puskesmas_id = $puskesmas->id;
                    $pengukuranAnak->posyandu_id = $posyandu->id ?? null;
                    $pengukuranAnak->save();
                }
            }
        }
    }
}
