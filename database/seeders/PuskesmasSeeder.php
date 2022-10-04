<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PuskesmasSeeder extends Seeder
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
                'id' => '9xa15403-b90f-4c7f-8c77-5076bc262021',
                'nama' => 'Puskesmas Pipikoro',
                'kecamatan_id' => '7210010'
            ],
            [
                'id' => '9xa15403-b90f-4c7f-8c77-5076bc262022',
                'nama' => 'Puskesmas Kulawi',
                'kecamatan_id' => '7210020'
            ],
            [
                'id' => '9xa15403-b90f-4c7f-8c77-5076bc262023',
                'nama' => 'Puskesmas Dolo Barat',
                'kecamatan_id' => '7210090'
            ],
        ];

        DB::table('puskesmas')->insert($data);
    }
}
