<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LokasiHewanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $insert = [
            // Anca
            [
                'id' => '01b2f7f7-8743-4b93-b5af-08c79faff121',
                'desa_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c20',
                'nama' => 'Ternak 1 Anca',
                'latitude' => '-1.275998',
                'longitude' => '120.062874',
                'deskripsi' => '-',
                'status' => 1,
                'created_at' => '2020-08-10 10:29:31',
            ],
            [
                'id' => '01b2f7f7-8743-4b93-b5af-08c79faff122',
                'desa_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c20',
                'nama' => 'Ternak 2 Anca',
                'latitude' => '-1.274303',
                'longitude' => '120.062699',
                'deskripsi' => '-',
                'status' => 1,
                'created_at' => '2020-08-10 10:30:30',
            ],
            // Langko
            [
                'id' => '01b2f7f7-8743-4b93-b5af-08c79faff127',
                'desa_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c21',
                'nama' => 'Ternak 1 Langko',
                'latitude' => '-1.340337',
                'longitude' => '120.022173',
                'deskripsi' => '-',
                'status' => 1,
                'created_at' => '2020-08-10 10:35:29',
            ],
            [
                'id' => '01b2f7f7-8743-4b93-b5af-08c79faff128',
                'desa_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c21',
                'nama' => 'Ternak 2 Langko',
                'latitude' => '-1.348963',
                'longitude' => '120.033731',
                'deskripsi' => '-',
                'status' => 1,
                'created_at' => '2020-08-10 10:36:28',
            ],
            // Puro`o
            [
                'id' => '01b2f7f7-8743-4b93-b5af-08c79faff133',
                'desa_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c23',
                'nama' => 'Ternak 1 Puro`o',
                'latitude' => '-1.363248',
                'longitude' => '120.022139',
                'deskripsi' => '-',
                'status' => 1,
                'created_at' => '2020-08-10 10:41:27',
            ],
            [
                'id' => '01b2f7f7-8743-4b93-b5af-08c79faff134',
                'desa_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c23',
                'nama' => 'Ternak 2 Puro`o',
                'latitude' => '-1.361946',
                'longitude' => '120.038805',
                'deskripsi' => '-',
                'status' => 1,
                'created_at' => '2020-08-10 10:42:26',
            ],
            // Tomado
            [
                'id' => '01b2f7f7-8743-4b93-b5af-08c79faff139',
                'desa_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c24',
                'nama' => 'Ternak 1 Tomado',
                'latitude' => '-1.321349',
                'longitude' => '120.119618',
                'deskripsi' => '-',
                'status' => 1,
                'created_at' => '2020-08-10 10:47:25',
            ],
            [
                'id' => '01b2f7f7-8743-4b93-b5af-08c79faff140',
                'desa_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c24',
                'nama' => 'Ternak 2 Tomado',
                'latitude' => '-1.297746',
                'longitude' => '120.158081',
                'deskripsi' => '-',
                'status' => 1,
                'created_at' => '2020-08-10 10:48:24',
            ],
        ];

        DB::table('lokasi_hewan')->insert($insert);
    }
}
