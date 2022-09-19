<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RealisasiKeongTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('realisasi_keong')->delete();
        
        \DB::table('realisasi_keong')->insert(array (
            0 => 
            array (
                'id' => '34ec0294-d921-4cd3-99fb-13dbe8ef5e69',
                'perencanaan_keong_id' => '5fa15403-b90f-4c7f-8c77-5076bc262028',
                'penggunaan_anggaran' => 8000000,
                'tw' => 1,
                'progress' => 40.0,
                'status' => 1,
                'tanggal_konfirmasi' => '2021-03-09',
                'alasan_ditolak' => '-',
                'created_at' => '2021-03-08 15:08:41',
                'updated_at' => '2021-03-08 15:10:44',
            ),
            1 => 
            array (
                'id' => '3a729127-7f21-4cf8-88ba-10de0d67cdb6',
                'perencanaan_keong_id' => '76628878-af22-4ae8-be21-eaa420265984',
                'penggunaan_anggaran' => 2000000,
                'tw' => 2,
                'progress' => 42.86,
                'status' => 1,
                'tanggal_konfirmasi' => '2022-04-23',
                'alasan_ditolak' => '-',
                'created_at' => '2022-04-23 20:44:20',
                'updated_at' => '2022-04-23 20:44:40',
            ),
            2 => 
            array (
                'id' => '442fd3ce-eef0-442b-b173-008237449104',
                'perencanaan_keong_id' => '76628878-af22-4ae8-be21-eaa420265984',
                'penggunaan_anggaran' => 1000000,
                'tw' => 4,
                'progress' => 85.71,
                'status' => 0,
                'tanggal_konfirmasi' => NULL,
                'alasan_ditolak' => NULL,
                'created_at' => '2022-11-28 20:51:01',
                'updated_at' => '2022-11-28 20:51:01',
            ),
            3 => 
            array (
                'id' => '547c6f6f-827a-4c9f-a720-cb119da8e0e2',
                'perencanaan_keong_id' => '76628878-af22-4ae8-be21-eaa420265984',
                'penggunaan_anggaran' => 1000000,
                'tw' => 1,
                'progress' => 28.57,
                'status' => 1,
                'tanggal_konfirmasi' => '2022-01-10',
                'alasan_ditolak' => '-',
                'created_at' => '2022-01-10 20:41:40',
                'updated_at' => '2022-01-10 20:41:53',
            ),
            4 => 
            array (
                'id' => '66283c96-ead5-40fd-a506-1d746c08d6b9',
                'perencanaan_keong_id' => '76628878-af22-4ae8-be21-eaa420265984',
                'penggunaan_anggaran' => 3000000,
                'tw' => 2,
                'progress' => 57.14,
                'status' => 1,
                'tanggal_konfirmasi' => '2022-06-03',
                'alasan_ditolak' => '-',
                'created_at' => '2022-06-03 20:46:16',
                'updated_at' => '2022-06-03 20:46:45',
            ),
            5 => 
            array (
                'id' => '68d5db04-70e8-4e19-ae4e-a8f3e1e452a0',
                'perencanaan_keong_id' => '76628878-af22-4ae8-be21-eaa420265984',
                'penggunaan_anggaran' => 4000000,
                'tw' => 3,
                'progress' => 71.43,
                'status' => 1,
                'tanggal_konfirmasi' => '2022-08-17',
                'alasan_ditolak' => '-',
                'created_at' => '2022-08-17 20:49:04',
                'updated_at' => '2022-08-17 20:49:19',
            ),
            6 => 
            array (
                'id' => '7852b2d9-080d-474f-b0a9-1560c07be671',
                'perencanaan_keong_id' => '5fa15403-b90f-4c7f-8c77-5076bc262028',
                'penggunaan_anggaran' => 7000000,
                'tw' => 4,
                'progress' => 100.0,
                'status' => 1,
                'tanggal_konfirmasi' => '2021-10-10',
                'alasan_ditolak' => '-',
                'created_at' => '2021-10-10 15:12:29',
                'updated_at' => '2022-10-10 15:12:45',
            ),
            7 => 
            array (
                'id' => '9392b3cc-537c-49b3-bc91-d320a17d703f',
                'perencanaan_keong_id' => '76628878-af22-4ae8-be21-eaa420265986',
                'penggunaan_anggaran' => 1000000,
                'tw' => 2,
                'progress' => 40.0,
                'status' => 1,
                'tanggal_konfirmasi' => '2022-04-21',
                'alasan_ditolak' => '-',
                'created_at' => '2022-04-21 13:11:56',
                'updated_at' => '2022-08-28 13:12:50',
            ),
            8 => 
            array (
                'id' => 'cc9b49d7-8cfc-4527-ac2c-2ade8adcefe4',
                'perencanaan_keong_id' => '66417cb6-4595-439d-8e67-87f292255a3c',
                'penggunaan_anggaran' => 7000000,
                'tw' => 3,
                'progress' => 72.22,
                'status' => 1,
                'tanggal_konfirmasi' => '2021-07-06',
                'alasan_ditolak' => '-',
                'created_at' => '2021-07-05 14:50:49',
                'updated_at' => '2021-09-05 14:51:09',
            ),
            9 => 
            array (
                'id' => 'cfaef6bf-d139-46d2-97f8-6eb83af04d0c',
                'perencanaan_keong_id' => '66417cb6-4595-439d-8e67-87f292255a3c',
                'penggunaan_anggaran' => 6000000,
                'tw' => 2,
                'progress' => 33.33,
                'status' => 1,
                'tanggal_konfirmasi' => '2021-03-02',
                'alasan_ditolak' => '-',
                'created_at' => '2021-03-01 14:48:03',
                'updated_at' => '2021-03-01 14:48:43',
            ),
            10 => 
            array (
                'id' => 'f6b09084-f1bf-453d-bc36-ece196f46782',
                'perencanaan_keong_id' => '76628878-af22-4ae8-be21-eaa420265986',
                'penggunaan_anggaran' => 2000000,
                'tw' => 3,
                'progress' => 100.0,
                'status' => 1,
                'tanggal_konfirmasi' => '2022-08-28',
                'alasan_ditolak' => '-',
                'created_at' => '2022-08-28 13:13:51',
                'updated_at' => '2022-08-28 13:14:04',
            ),
            11 => 
            array (
                'id' => 'fec555f8-3cbe-48b7-a597-ec84c0838b1a',
                'perencanaan_keong_id' => '5fa15403-b90f-4c7f-8c77-5076bc262028',
                'penggunaan_anggaran' => 5000000,
                'tw' => 3,
                'progress' => 73.33,
                'status' => 1,
                'tanggal_konfirmasi' => '2021-07-07',
                'alasan_ditolak' => '-',
                'created_at' => '2021-07-07 15:11:37',
                'updated_at' => '2021-07-07 15:11:46',
            ),
        ));
        
        
    }
}