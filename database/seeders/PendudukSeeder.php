<?php

namespace Database\Seeders;

use App\Models\Desa;
use App\Models\Penduduk;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Generator;

class PendudukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b4d01',
                'nama' => 'Soony Moore',
                'nik' => '7206091803080002',
                'jenis_kelamin' => 'Laki-Laki',
                'tempat_lahir' => 'Puro\'o',
                'tanggal_lahir' => '2022-03-21',
                'agama' => 'Islam',
                'status_pendidikan' => 'Tidak Sekolah',
                'pekerjaan' => 'Tidak Bekerja',
                'golongan_darah' => 'Tidak Tahu',
                'status_perkawinan' => 'Belum Kawin',
                'tanggal_perkawinan' => null,
                'kewarganegaraan' => 'WNI',
                'no_paspor' => null,
                'no_kitap' => null,
                'alamat' => 'ANCA',
                'desa_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c20',
                'created_at' => '2022-08-16 16:00:55'
            ],
            [
                'id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b4d02',
                'nama' => 'Diplo',
                'nik' => '7206091803080003',
                'jenis_kelamin' => 'Laki-Laki',
                'tempat_lahir' => 'Puro\'o',
                'tanggal_lahir' => '2022-03-19',
                'agama' => 'Islam',
                'status_pendidikan' => 'Tidak Sekolah',
                'pekerjaan' => 'Tidak Bekerja',
                'golongan_darah' => 'Tidak Tahu',
                'status_perkawinan' => 'Belum Kawin',
                'tanggal_perkawinan' => null,
                'kewarganegaraan' => 'WNI',
                'no_paspor' => null,
                'no_kitap' => null,
                'alamat' => 'ANCA',
                'desa_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c20',
                'created_at' => '2022-08-16 16:00:54'
            ],
            [
                'id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b4d03',
                'nama' => 'Martin',
                'nik' => '7206091803080004',
                'jenis_kelamin' => 'Perempuan',
                'tempat_lahir' => 'Puro\'o',
                'tanggal_lahir' => '2022-05-21',
                'agama' => 'Kristen',
                'status_pendidikan' => 'Tidak Sekolah',
                'pekerjaan' => 'Tidak Bekerja',
                'golongan_darah' => 'Tidak Tahu',
                'status_perkawinan' => 'Belum Kawin',
                'tanggal_perkawinan' => null,
                'kewarganegaraan' => 'WNI',
                'no_paspor' => null,
                'no_kitap' => null,
                'alamat' => 'ANCA',
                'desa_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c20',
                'created_at' => '2022-08-16 16:00:53'
            ],
            [
                'id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b4d04',
                'nama' => 'Garrix',
                'nik' => '7206091803080005',
                'jenis_kelamin' => 'Laki-Laki',
                'tempat_lahir' => 'Puro\'o',
                'tanggal_lahir' => '2018-05-21',
                'agama' => 'Kristen',
                'status_pendidikan' => 'Tidak Sekolah',
                'pekerjaan' => 'Tidak Bekerja',
                'golongan_darah' => 'Tidak Tahu',
                'status_perkawinan' => 'Belum Kawin',
                'tanggal_perkawinan' => null,
                'kewarganegaraan' => 'WNI',
                'no_paspor' => null,
                'no_kitap' => null,
                'alamat' => 'ANCA',
                'desa_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c20',
                'created_at' => '2022-08-16 16:00:52'
            ],
            [
                'id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b4d05',
                'nama' => 'Jana',
                'nik' => '7206091803080006',
                'jenis_kelamin' => 'Perempuan',
                'tempat_lahir' => 'Puro\'o',
                'tanggal_lahir' => '2018-01-21',
                'agama' => 'Kristen',
                'status_pendidikan' => 'Tidak Sekolah',
                'pekerjaan' => 'Tidak Bekerja',
                'golongan_darah' => 'Tidak Tahu',
                'status_perkawinan' => 'Belum Kawin',
                'tanggal_perkawinan' => null,
                'kewarganegaraan' => 'WNI',
                'no_paspor' => null,
                'no_kitap' => null,
                'alamat' => 'ANCA',
                'desa_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c20',
                'created_at' => '2022-08-16 16:00:51'
            ],
            [
                'id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b4d06',
                'nama' => 'Zelda',
                'nik' => '7206091803080007',
                'jenis_kelamin' => 'Perempuan',
                'tempat_lahir' => 'Puro\'o',
                'tanggal_lahir' => '2018-12-21',
                'agama' => 'Kristen',
                'status_pendidikan' => 'Tidak Sekolah',
                'pekerjaan' => 'Tidak Bekerja',
                'golongan_darah' => 'Tidak Tahu',
                'status_perkawinan' => 'Belum Kawin',
                'tanggal_perkawinan' => null,
                'kewarganegaraan' => 'WNI',
                'no_paspor' => null,
                'no_kitap' => null,
                'alamat' => 'ANCA',
                'desa_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c20',
                'created_at' => '2022-08-16 16:00:50'
            ],
            [
                'id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b4d07',
                'nama' => 'Marcelo',
                'nik' => '7206091803080008',
                'jenis_kelamin' => 'Laki-Laki',
                'tempat_lahir' => 'Puro\'o',
                'tanggal_lahir' => '2018-12-21',
                'agama' => 'Kristen',
                'status_pendidikan' => 'SD',
                'pekerjaan' => 'Tidak Bekerja',
                'golongan_darah' => 'Tidak Tahu',
                'status_perkawinan' => 'Belum Kawin',
                'tanggal_perkawinan' => null,
                'kewarganegaraan' => 'WNI',
                'no_paspor' => null,
                'no_kitap' => null,
                'alamat' => 'ANCA',
                'desa_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c20',
                'created_at' => '2022-08-16 16:00:49'
            ],
            [
                'id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b4d08',
                'nama' => 'Anton',
                'nik' => '7206091803080009',
                'jenis_kelamin' => 'Laki-Laki',
                'tempat_lahir' => 'Puro\'o',
                'tanggal_lahir' => '2018-12-21',
                'agama' => 'Kristen',
                'status_pendidikan' => 'SD',
                'pekerjaan' => 'Tidak Bekerja',
                'golongan_darah' => 'Tidak Tahu',
                'status_perkawinan' => 'Belum Kawin',
                'tanggal_perkawinan' => null,
                'kewarganegaraan' => 'WNI',
                'no_paspor' => null,
                'no_kitap' => null,
                'alamat' => 'ANCA',
                'desa_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c20',
                'created_at' => '2022-08-16 16:00:48'
            ],
            [
                'id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b4d09',
                'nama' => 'Abdul',
                'nik' => '7206091803080010',
                'jenis_kelamin' => 'Laki-Laki',
                'tempat_lahir' => 'Puro\'o',
                'tanggal_lahir' => '2018-12-21',
                'agama' => 'Kristen',
                'status_pendidikan' => 'SMP',
                'pekerjaan' => 'Tidak Bekerja',
                'golongan_darah' => 'Tidak Tahu',
                'status_perkawinan' => 'Belum Kawin',
                'tanggal_perkawinan' => null,
                'kewarganegaraan' => 'WNI',
                'no_paspor' => null,
                'no_kitap' => null,
                'alamat' => 'ANCA',
                'desa_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c20',
                'created_at' => '2022-08-16 16:00:47'
            ],
            [
                'id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b4d10',
                'nama' => 'Reyna',
                'nik' => '7206091803080011',
                'jenis_kelamin' => 'Perempuan',
                'tempat_lahir' => 'Puro\'o',
                'tanggal_lahir' => '2018-12-21',
                'agama' => 'Kristen',
                'status_pendidikan' => 'SMP',
                'pekerjaan' => 'Tidak Bekerja',
                'golongan_darah' => 'Tidak Tahu',
                'status_perkawinan' => 'Belum Kawin',
                'tanggal_perkawinan' => null,
                'kewarganegaraan' => 'WNI',
                'no_paspor' => null,
                'no_kitap' => null,
                'alamat' => 'ANCA',
                'desa_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c20',
                'created_at' => '2022-08-16 16:00:46'
            ],
        ];

        DB::table('penduduk')->insert($data);

        $agama = ['Islam', 'Kristen', 'Hindu', 'Budha', 'Katolik', 'Konghucu'];
        $golongan_darah = ['Tidak Tahu', 'A', 'B', 'AB', 'O', 'A+', 'A-', 'B+', 'B-', 'AB+', 'AB-', 'O+', 'O-'];
        $jenis_kelamin = ['Laki-Laki', 'Perempuan'];
        $pekerjaan = ['Tidak Bekerja', 'Ibu Rumah Tangga', 'Karyawan Swasta', 'PNS / TNI-POLRI', 'Wiraswasta / Wirausaha', 'Petani / Pekebun', 'Pekerjaan Tidak Tetap', 'Pelajar / Mahasiswa'];
        $status_pendidikan = ['Tidak Sekolah', 'SD', 'SMP', 'SMA', 'Diploma 1', 'Diploma 2', 'Diploma 3', 'S1 / Diploma 4', 'S2', 'S3'];
        $status_perkawinan = ['Belum Kawin', 'Kawin Belum Tercatat', 'Kawin Tercatat', 'Cerai Hidup', 'Cerai Mati'];

        $faker = app(Generator::class);

        for ($i = 0; $i < 500; $i++) {

            $desa = Desa::inRandomOrder()->first();

            $tanggal_lahir = $faker->date($format = 'Y-m-d', $max = 'now');
            $umur = Carbon::parse($tanggal_lahir)->age;
            $tanggal_perkawinan = null;

            if ($umur < 7) {
                $status_pendidikan = 'Tidak Sekolah';
                $status_perkawinan = 'Belum Kawin';
                $pekerjaan = 'Tidak Bekerja';
            } else if ($umur >= 7 && $umur <= 15) {
                $status_pendidikan = ['Tidak Sekolah', 'SD', 'SMP'];
                $status_pendidikan = $status_pendidikan[array_rand($status_pendidikan)];

                $status_perkawinan = 'Belum Kawin';
                $pekerjaan = 'Tidak Bekerja';
            } else if ($umur > 15 && $umur <= 21) {
                $status_pendidikan = ['Tidak Sekolah', 'SD', 'SMP', 'SMA'];
                $status_pendidikan = $status_pendidikan[array_rand($status_pendidikan)];

                $status_perkawinan = ['Belum Kawin', 'Kawin Belum Tercatat', 'Kawin Tercatat', 'Cerai Hidup', 'Cerai Mati'];
                $status_perkawinan = $status_perkawinan[array_rand($status_perkawinan)];
                if ($status_perkawinan != 'Belum Kawin') {
                    $tanggal_perkawinan = $faker->date($format = 'Y-m-d', $max = 'now');
                }
                $pekerjaan = ['Tidak Bekerja', 'Ibu Rumah Tangga', 'Karyawan Swasta', 'PNS / TNI-POLRI', 'Wiraswasta / Wirausaha', 'Petani / Pekebun', 'Pekerjaan Tidak Tetap', 'Pelajar / Mahasiswa'];
                $pekerjaan = $pekerjaan[array_rand($pekerjaan)];
            } else {
                $status_pendidikan = ['Tidak Sekolah', 'SD', 'SMP', 'SMA', 'Diploma 1', 'Diploma 2', 'Diploma 3', 'S1 / Diploma 4', 'S2', 'S3'];
                $status_pendidikan = $status_pendidikan[array_rand($status_pendidikan)];

                $status_perkawinan = ['Belum Kawin', 'Kawin Belum Tercatat', 'Kawin Tercatat', 'Cerai Hidup', 'Cerai Mati'];
                $status_perkawinan = $status_perkawinan[array_rand($status_perkawinan)];
                if ($status_perkawinan != 'Belum Kawin') {
                    $tanggal_perkawinan = $faker->date($format = 'Y-m-d', $max = 'now');
                }

                $pekerjaan = ['Tidak Bekerja', 'Ibu Rumah Tangga', 'Karyawan Swasta', 'PNS / TNI-POLRI', 'Wiraswasta / Wirausaha', 'Petani / Pekebun', 'Pekerjaan Tidak Tetap', 'Pelajar / Mahasiswa'];
                $pekerjaan = $pekerjaan[array_rand($pekerjaan)];
            }

            $penduduk = new Penduduk();
            $penduduk->nama = $faker->name;
            $penduduk->nik = $faker->nik;
            $penduduk->jenis_kelamin = $jenis_kelamin[array_rand($jenis_kelamin)];
            $penduduk->tempat_lahir = $faker->city;
            $penduduk->tanggal_lahir = $tanggal_lahir;
            $penduduk->agama = $agama[array_rand($agama)];
            $penduduk->status_pendidikan = $status_pendidikan;
            $penduduk->pekerjaan = $pekerjaan;
            $penduduk->golongan_darah = $golongan_darah[array_rand($golongan_darah)];
            $penduduk->status_perkawinan = $status_perkawinan;
            $penduduk->tanggal_perkawinan = $tanggal_perkawinan;
            $penduduk->kewarganegaraan = 'WNI';
            $penduduk->no_paspor = null;
            $penduduk->no_kitap = null;
            $penduduk->alamat = $desa->nama;
            $penduduk->desa_id = $desa->id;
            $penduduk->save();
        }
    }
}
