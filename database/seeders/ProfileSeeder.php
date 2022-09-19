<?php

namespace Database\Seeders;

use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProfileSeeder extends Seeder
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
                'id' => 1,
                'user_id' => 1,
                'opd_id' => 1,
                'nama' => 'Administrator',
                'jenis_kelamin' => 'Laki-laki',
                'tempat_lahir' => 'Palopo',
                'tanggal_lahir' => '1997-09-07',
                'alamat' => 'Jl. Palopo',
                'provinsi' => 73,
                'kabupaten_kota' => 7373,
                'kecamatan' => 7373020,
                'desa_kelurahan' => 7373020003,
                'nomor_hp' => '081212121212',
                'email' => 'inosuke@gmail.com',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'id' => 2,
                'user_id' => 4,
                'opd_id' => 1,
                'nama' => 'Inosuke',
                'jenis_kelamin' => 'Laki-laki',
                'tempat_lahir' => 'Palopo',
                'tanggal_lahir' => '2006-04-17',
                'alamat' => 'Jl. Bahonsuai',
                'provinsi' => 72,
                'kabupaten_kota' => 7203,
                'kecamatan' => 7203041,
                'desa_kelurahan' => 7203041003,
                'nomor_hp' => '081212121212',
                'email' => 'inosuke@gmail.com',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'id' => 3,
                'user_id' => 2,
                'opd_id' => 1,
                'nama' => 'Zenetsu',
                'jenis_kelamin' => 'Perempuan',
                'tempat_lahir' => 'Siwa',
                'tanggal_lahir' => '2001-12-22',
                'alamat' => 'Jl. Siwa',
                'provinsi' => 73,
                'kabupaten_kota' => 7313,
                'kecamatan' => 7313120,
                'desa_kelurahan' => 7313120006,
                'nomor_hp' => '02187897989',
                'email' => 'zenetsu@gmail.com',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
        ];

        DB::table('profiles')->insert($data);
    }
}
