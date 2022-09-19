<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HewanSeeder extends Seeder
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
                'id' => '0075b51c-49c0-4e81-a3b3-a6b4e21b3c10',
                'nama' => 'Kerbau',
            ],
            [
                'id' => '0075b51c-49c0-4e81-a3b3-a6b4e21b3c11',
                'nama' => 'Sapi',
            ],
            [
                'id' => '0075b51c-49c0-4e81-a3b3-a6b4e21b3c12',
                'nama' => 'Babi',
            ],
            [
                'id' => '0075b51c-49c0-4e81-a3b3-a6b4e21b3c13',
                'nama' => 'Anjing',
            ],
            [
                'id' => '0075b51c-49c0-4e81-a3b3-a6b4e21b3c14',
                'nama' => 'Kambing',
            ],
        ];

        DB::table('hewan')->insert($data);
    }
}
