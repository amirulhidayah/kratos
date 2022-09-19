<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MasterPlanSeeder extends Seeder
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
                'id' => '0075b51c-49c0-4e81-a3b3-a6b4e21b3q01',
                'nama' => 'Master Plan 1',
                'tahun_id' => '4f66aa3a-6ee9-4f6a-9f0a-3c7473319f01',
                'file' => 'Lorem 1 Red.pdf',
                'created_at' => '2022-08-15 13:36:17'
            ],
            [
                'id' => '0075b51c-49c0-4e81-a3b3-a6b4e21b3q02',
                'nama' => 'Master Plan 2',
                'tahun_id' => '4f66aa3a-6ee9-4f6a-9f0a-3c7473319f02',
                'file' => 'Lorem 2 Blue.pdf',
                'created_at' => '2022-08-15 13:36:16'
            ],
            [
                'id' => '0075b51c-49c0-4e81-a3b3-a6b4e21b3q03',
                'nama' => 'Master Plan 3',
                'tahun_id' => '4f66aa3a-6ee9-4f6a-9f0a-3c7473319f03',
                'file' => 'Lorem 3 Ungu.pdf',
                'created_at' => '2022-08-15 13:36:15'
            ],
            [
                'id' => '0075b51c-49c0-4e81-a3b3-a6b4e21b3q04',
                'nama' => 'Master Plan 4',
                'tahun_id' => '4f66aa3a-6ee9-4f6a-9f0a-3c7473319f04',
                'file' => 'Lorem 4 Green.pdf',
                'created_at' => '2022-08-15 13:36:14'
            ],
        ];

        DB::table('master_plan')->insert($data);
    }
}
