<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RealisasiTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('realisasi')->delete();
        
        \DB::table('realisasi')->insert(array (
            0 => 
            array (
                'alasan_ditolak' => '-',
                'created_at' => '2022-05-20 22:55:33',
                'id' => '63eeb154-465f-48f8-95e9-b5667f0e139d',
                'perencanaan_id' => 'cedd07ba-bc7d-4bc2-acf1-c98391722b76',
                'status' => 0,
                'tanggal_konfirmasi' => NULL,
                'updated_at' => '2022-10-15 23:04:39',
            ),
            1 => 
            array (
                'alasan_ditolak' => '-',
                'created_at' => '2022-05-15 22:40:47',
                'id' => '81ea6d05-ef7c-48de-be86-74c5055e1d66',
                'perencanaan_id' => '2fe3f018-8837-463e-be44-c4a8c3dcb069',
                'status' => 1,
                'tanggal_konfirmasi' => '2022-10-15',
                'updated_at' => '2022-10-15 22:51:19',
            ),
            2 => 
            array (
                'alasan_ditolak' => 'Terlalu sedikit penduduk',
                'created_at' => '2022-05-05 21:50:08',
                'id' => '9a856b65-481e-496b-8da6-77dfe5a97adf',
                'perencanaan_id' => 'f884c0d6-ec2c-4038-8440-2eab2a2a4431',
                'status' => 2,
                'tanggal_konfirmasi' => '2022-10-15',
                'updated_at' => '2022-10-15 21:53:34',
            ),
            3 => 
            array (
                'alasan_ditolak' => NULL,
                'created_at' => '2022-04-20 20:39:24',
                'id' => 'bd9891f8-2e65-4cdd-87d2-48d65d00a36d',
                'perencanaan_id' => '8674fd2c-041d-49ac-8dd8-adbacb7476ed',
                'status' => 3,
                'tanggal_konfirmasi' => NULL,
                'updated_at' => '2022-10-15 20:39:24',
            ),
            4 => 
            array (
                'alasan_ditolak' => '-',
                'created_at' => '2021-04-15 19:35:41',
                'id' => 'c43dafca-4f0d-4581-82b1-0fca2c0a5070',
                'perencanaan_id' => 'aa3c387f-90a5-4148-9ccd-680c6d1f41a0',
                'status' => 1,
                'tanggal_konfirmasi' => '2021-04-20',
                'updated_at' => '2022-10-15 20:31:10',
            ),
            5 => 
            array (
                'alasan_ditolak' => NULL,
                'created_at' => '2022-04-03 20:49:52',
                'id' => 'da8702d4-9cc8-4a60-92cf-50e69b657347',
                'perencanaan_id' => '6e1e11f9-b285-46d5-af90-847d5e5fa602',
                'status' => 3,
                'tanggal_konfirmasi' => NULL,
                'updated_at' => '2022-10-15 20:49:52',
            ),
            6 => 
            array (
                'alasan_ditolak' => '-',
                'created_at' => '2022-04-30 21:03:27',
                'id' => 'fdc17db5-c785-4335-91f3-985848766bb5',
                'perencanaan_id' => '4daef7d5-86d9-4d28-8a5c-1823b8fae6d9',
                'status' => 1,
                'tanggal_konfirmasi' => '2022-10-15',
                'updated_at' => '2022-10-15 21:39:40',
            ),
        ));
        
        
    }
}