<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SumberDanaSeeder extends Seeder
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
                'id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3x90',
                'nama' => 'DAU',
            ],
            [
                'id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3x91',
                'nama' => 'DAK',
            ],
            [
                'id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3x92',
                'nama' => 'APBD',
            ],
        ];

        DB::table('sumber_dana')->insert($data);
    }
}
