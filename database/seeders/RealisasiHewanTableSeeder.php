<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RealisasiHewanTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('realisasi_hewan')->delete();
        
        \DB::table('realisasi_hewan')->insert(array (
            0 => 
            array (
                'id' => '04402e24-eb12-473f-9dfa-fd7472f38e5a',
                'perencanaan_hewan_id' => '6aa72a31-194d-4363-a282-084f5e6362d3',
                'penggunaan_anggaran' => 1500000,
                'tw' => 1,
                'progress' => 37.5,
                'status' => 1,
                'tanggal_konfirmasi' => '2022-02-20',
                'alasan_ditolak' => '-',
                'created_at' => '2022-02-20 21:52:23',
                'updated_at' => '2022-08-27 21:52:40',
            ),
            1 => 
            array (
                'id' => '31d18aa3-236a-40c5-bf62-7b30146f74c7',
                'perencanaan_hewan_id' => '6aa72a31-194d-4363-a282-084f5e6362d3',
                'penggunaan_anggaran' => 2000000,
                'tw' => 2,
                'progress' => 75.0,
                'status' => 2,
                'tanggal_konfirmasi' => '2022-05-27',
                'alasan_ditolak' => 'Dokumen kurang lengkap',
                'created_at' => '2022-05-20 21:53:29',
                'updated_at' => '2022-08-27 21:53:49',
            ),
            2 => 
            array (
                'id' => '532a089d-2f10-44d6-a9e8-ef2036c69a3c',
                'perencanaan_hewan_id' => '3e6d54e2-995c-44ab-9530-47ab2b628773',
                'penggunaan_anggaran' => 2500000,
                'tw' => 2,
                'progress' => 66.67,
                'status' => 1,
                'tanggal_konfirmasi' => '2022-04-27',
                'alasan_ditolak' => '-',
                'created_at' => '2022-04-27 21:47:25',
                'updated_at' => '2022-08-27 21:47:35',
            ),
            3 => 
            array (
                'id' => '55c87f2e-5bb9-4784-9f91-46e6c3d839e5',
                'perencanaan_hewan_id' => '3e6d54e2-995c-44ab-9530-47ab2b628773',
                'penggunaan_anggaran' => 3000000,
                'tw' => 3,
                'progress' => 100.0,
                'status' => 0,
                'tanggal_konfirmasi' => NULL,
                'alasan_ditolak' => NULL,
                'created_at' => '2022-08-27 21:48:26',
                'updated_at' => '2022-08-27 21:48:26',
            ),
            4 => 
            array (
                'id' => '5a81e758-96db-4419-899a-713a7e5d2a12',
                'perencanaan_hewan_id' => '3e6d54e2-995c-44ab-9530-47ab2b628773',
                'penggunaan_anggaran' => 2000000,
                'tw' => 1,
                'progress' => 33.33,
                'status' => 1,
                'tanggal_konfirmasi' => '2022-01-27',
                'alasan_ditolak' => '-',
                'created_at' => '2022-01-27 21:45:41',
                'updated_at' => '2022-08-27 21:46:52',
            ),
            5 => 
            array (
                'id' => 'a68fe649-f08d-49fd-90de-b185d6f8c6af',
                'perencanaan_hewan_id' => 'c913a980-7786-4008-ae5b-62f581a35945',
                'penggunaan_anggaran' => 7000000,
                'tw' => 1,
                'progress' => 37.5,
                'status' => 1,
                'tanggal_konfirmasi' => '2021-01-30',
                'alasan_ditolak' => '-',
                'created_at' => '2021-01-30 16:59:38',
                'updated_at' => '2021-01-30 17:00:25',
            ),
            6 => 
            array (
                'id' => 'b805ef82-4514-4ac8-9c36-14c198fb60a7',
                'perencanaan_hewan_id' => 'c913a980-7786-4008-ae5b-62f581a35945',
                'penggunaan_anggaran' => 4000000,
                'tw' => 3,
                'progress' => 100.0,
                'status' => 1,
                'tanggal_konfirmasi' => '2021-09-28',
                'alasan_ditolak' => '-',
                'created_at' => '2021-09-28 17:04:12',
                'updated_at' => '2021-09-28 17:04:27',
            ),
            7 => 
            array (
                'id' => 'd105f8a6-d1c3-45a9-a651-799edaef60d8',
                'perencanaan_hewan_id' => 'cc85aa2c-d07b-45e9-9629-f2590f12ee63',
                'penggunaan_anggaran' => 10000000,
                'tw' => 2,
                'progress' => 50.0,
                'status' => 1,
                'tanggal_konfirmasi' => '2021-04-20',
                'alasan_ditolak' => '-',
                'created_at' => '2021-04-20 17:14:41',
                'updated_at' => '2021-04-20 17:15:02',
            ),
            8 => 
            array (
                'id' => 'ec98cdf4-4330-4a90-bb8a-280a7b6c91a2',
                'perencanaan_hewan_id' => 'cc85aa2c-d07b-45e9-9629-f2590f12ee63',
                'penggunaan_anggaran' => 8000000,
                'tw' => 3,
                'progress' => 87.5,
                'status' => 1,
                'tanggal_konfirmasi' => '2021-09-06',
                'alasan_ditolak' => '-',
                'created_at' => '2021-09-06 17:16:28',
                'updated_at' => '2021-09-06 17:16:37',
            ),
            9 => 
            array (
                'id' => 'fcb85c59-fef3-4e41-91ea-2abb3a9d498a',
                'perencanaan_hewan_id' => 'c913a980-7786-4008-ae5b-62f581a35945',
                'penggunaan_anggaran' => 4000000,
                'tw' => 2,
                'progress' => 62.5,
                'status' => 1,
                'tanggal_konfirmasi' => '2021-04-10',
                'alasan_ditolak' => '-',
                'created_at' => '2021-04-10 17:01:27',
                'updated_at' => '2021-04-10 17:01:36',
            ),
        ));
        
        
    }
}