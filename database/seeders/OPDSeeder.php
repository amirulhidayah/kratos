<?php

namespace Database\Seeders;

use App\Models\OPD;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class OPDSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $insert = [
            [
                'id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c95',
                'nama' => 'Dinas Kesehatan',
            ],
            [
                'id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c96',
                'nama' => 'Dinas Sosial',
            ],
            [
                'id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c97',
                'nama' => 'Dinas Kebersihan',
            ],
            [
                'id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c98',
                'nama' => 'Dinas Kependudukan',
            ],
            [
                'id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c99',
                'nama' => 'Dinas Pekerjaan Umum',
            ],
            [
                'id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c10',
                'nama' => 'Dinas Lingkungan Hidup',
            ],
            [
                'id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c11',
                'nama' => 'Dinas Pendidikan',
            ]
        ];

        OPD::insert($insert);
    }
}
