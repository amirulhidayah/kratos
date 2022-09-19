<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TahunSeeder extends Seeder
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
                'id' => '4f66aa3a-6ee9-4f6a-9f0a-3c7473319f01',
                'tahun' => '2015'
            ],
            [
                'id' => '4f66aa3a-6ee9-4f6a-9f0a-3c7473319f02',
                'tahun' => '2016'
            ],
            [
                'id' => '4f66aa3a-6ee9-4f6a-9f0a-3c7473319f03',
                'tahun' => '2017'
            ],
            [
                'id' => '4f66aa3a-6ee9-4f6a-9f0a-3c7473319f04',
                'tahun' => '2018'
            ],
            [
                'id' => '4f66aa3a-6ee9-4f6a-9f0a-3c7473319f05',
                'tahun' => '2019'
            ],
            [
                'id' => '4f66aa3a-6ee9-4f6a-9f0a-3c7473319f06',
                'tahun' => '2020'
            ],
            [
                'id' => '4f66aa3a-6ee9-4f6a-9f0a-3c7473319f07',
                'tahun' => '2021'
            ],
            [
                'id' => '4f66aa3a-6ee9-4f6a-9f0a-3c7473319f08',
                'tahun' => '2022'
            ],
            [
                'id' => '4f66aa3a-6ee9-4f6a-9f0a-3c7473319f09',
                'tahun' => '2023'
            ],
            [
                'id' => '4f66aa3a-6ee9-4f6a-9f0a-3c7473319f10',
                'tahun' => '2024'
            ],
            [
                'id' => '4f66aa3a-6ee9-4f6a-9f0a-3c7473319f11',
                'tahun' => '2025'
            ],
        ];

        DB::table('tahun')->insert($data);
    }
}
