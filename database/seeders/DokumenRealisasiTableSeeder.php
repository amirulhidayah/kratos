<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DokumenRealisasiTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('dokumen_realisasi')->delete();
        
        \DB::table('dokumen_realisasi')->insert(array (
            0 => 
            array (
                'created_at' => '2022-10-15 22:52:22',
                'file' => '631495917-Dokumen Realisasi-Dinas Kesehatan-1.pdf',
                'id' => '3264bd9a-dfe6-4491-93a4-25abac907149',
                'nama' => 'Dokumen Realisasi',
                'no_urut' => 1,
                'realisasi_id' => 'd0dfe5b7-acd7-43c5-9d9b-7e4dfc68265e',
                'updated_at' => '2022-10-15 22:52:22',
            ),
            1 => 
            array (
                'created_at' => '2022-10-15 22:55:33',
                'file' => '724465572-Dokumen Realisasi-Dinas Kesehatan-1.pdf',
                'id' => '642b59fb-067f-4696-911c-e6c826911873',
                'nama' => 'Dokumen Realisasi',
                'no_urut' => 1,
                'realisasi_id' => '63eeb154-465f-48f8-95e9-b5667f0e139d',
                'updated_at' => '2022-10-15 22:55:33',
            ),
            2 => 
            array (
                'created_at' => '2022-10-15 21:03:27',
                'file' => '385189562-Dokumen Realisasi-Dinas Kesehatan-1.pdf',
                'id' => '7a29a554-28d9-4b1f-ab92-818c9801103a',
                'nama' => 'Dokumen Realisasi',
                'no_urut' => 1,
                'realisasi_id' => 'fdc17db5-c785-4335-91f3-985848766bb5',
                'updated_at' => '2022-10-15 21:03:27',
            ),
            3 => 
            array (
                'created_at' => '2022-10-15 20:49:52',
                'file' => '295620197-Dokumen Realisasi-Dinas Kesehatan-1.pdf',
                'id' => '8d73e56a-77f0-4e8d-b930-cbadcf99afd8',
                'nama' => 'Dokumen Realisasi',
                'no_urut' => 1,
                'realisasi_id' => 'da8702d4-9cc8-4a60-92cf-50e69b657347',
                'updated_at' => '2022-10-15 20:49:52',
            ),
            4 => 
            array (
                'created_at' => '2022-10-15 20:39:24',
                'file' => '1843980082-Dokumen Realisasi-Dinas Kebersihan-1.pdf',
                'id' => 'd0eee1a1-3ffd-4e28-945a-8d315955fff3',
                'nama' => 'Dokumen Realisasi',
                'no_urut' => 1,
                'realisasi_id' => 'bd9891f8-2e65-4cdd-87d2-48d65d00a36d',
                'updated_at' => '2022-10-15 20:39:24',
            ),
            5 => 
            array (
                'created_at' => '2022-10-15 21:50:08',
                'file' => '1541129130-Dokumen Realisasi-Dinas Kebersihan-1.pdf',
                'id' => 'dcc5cc2c-84fa-4885-8584-87be505e7f39',
                'nama' => 'Dokumen Realisasi',
                'no_urut' => 1,
                'realisasi_id' => '9a856b65-481e-496b-8da6-77dfe5a97adf',
                'updated_at' => '2022-10-15 21:50:08',
            ),
            6 => 
            array (
                'created_at' => '2022-10-15 19:35:41',
                'file' => '879973402-Dokumen Realisasi 1-Dinas Kesehatan-1.pdf',
                'id' => 'e7b324b4-f8f3-4a1a-ac23-a6b19ba22959',
                'nama' => 'Dokumen Realisasi 1',
                'no_urut' => 1,
                'realisasi_id' => 'c43dafca-4f0d-4581-82b1-0fca2c0a5070',
                'updated_at' => '2022-10-15 19:35:41',
            ),
            7 => 
            array (
                'created_at' => '2022-10-15 19:35:41',
                'file' => '632825235-Dokumen Realisasi 2-Dinas Kesehatan-2.pdf',
                'id' => 'fb25bf3f-9ecd-4e1a-87d9-84130c01d100',
                'nama' => 'Dokumen Realisasi 2',
                'no_urut' => 2,
                'realisasi_id' => 'c43dafca-4f0d-4581-82b1-0fca2c0a5070',
                'updated_at' => '2022-10-15 19:35:41',
            ),
            8 => 
            array (
                'created_at' => '2022-10-15 22:40:47',
                'file' => '957153270-Dokumen Realisasi-Dinas Kesehatan-1.pdf',
                'id' => 'fbe56a2d-d7c0-4615-a690-efea5bd55726',
                'nama' => 'Dokumen Realisasi',
                'no_urut' => 1,
                'realisasi_id' => '81ea6d05-ef7c-48de-be86-74c5055e1d66',
                'updated_at' => '2022-10-15 22:40:47',
            ),
        ));
        
        
    }
}