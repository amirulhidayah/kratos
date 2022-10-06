<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PosyanduSeeder extends Seeder
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
                'id' => '0eaff97e-3100-4d1c-957c-04a3f10b2201',
                'puskesmas_id' => '9xa15403-b90f-4c7f-8c77-5076bc262021',
                'nama' => 'Posyandu Kalamanta',
                'desa_id' => '7210010001'
            ],
            [
                'id' => '0eaff97e-3100-4d1c-957c-04a3f10b2202',
                'puskesmas_id' => '9xa15403-b90f-4c7f-8c77-5076bc262021',
                'nama' => 'Posyandu Mamu',
                'desa_id' => '7210010002'
            ],
            [
                'id' => '0eaff97e-3100-4d1c-957c-04a3f10b2203',
                'puskesmas_id' => '9xa15403-b90f-4c7f-8c77-5076bc262021',
                'nama' => 'Posyandu Banasu',
                'desa_id' => '7210010003'
            ],
            [
                'id' => '0eaff97e-3100-4d1c-957c-04a3f10b2204',
                'puskesmas_id' => '9xa15403-b90f-4c7f-8c77-5076bc262022',
                'nama' => 'Posyandu MOA',
                'desa_id' => '7210020001'
            ],
            [
                'id' => '0eaff97e-3100-4d1c-957c-04a3f10b2205',
                'puskesmas_id' => '9xa15403-b90f-4c7f-8c77-5076bc262023',
                'nama' => 'Posyandu BOBO',
                'desa_id' => '7210090001'
            ],
            [
                'id' => '0eaff97e-3100-4d1c-957c-04a3f10b2206',
                'puskesmas_id' => '9xa15403-b90f-4c7f-8c77-5076bc262023',
                'nama' => 'Posyandu MANTIKOLE',
                'desa_id' => '7210090002'
            ],
        ];

        DB::table('posyandu')->insert($data);
    }
}
