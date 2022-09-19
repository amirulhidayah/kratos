<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RealisasiManusiaTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('realisasi_manusia')->delete();
        
        \DB::table('realisasi_manusia')->insert(array (
            0 => 
            array (
                'id' => '22cda26a-21f6-497b-9013-258f84593136',
                'perencanaan_manusia_id' => 'e24a52eb-b522-4a5c-a03f-3e9d89f2eab0',
                'penggunaan_anggaran' => 1000000,
                'tw' => 1,
                'progress' => 33.33,
                'status' => 1,
                'tanggal_konfirmasi' => '2022-02-26',
                'alasan_ditolak' => '-',
                'created_at' => '2022-02-26 11:47:17',
                'updated_at' => '2022-08-26 11:48:19',
            ),
            1 => 
            array (
                'id' => '28078655-c1cf-4ec1-a446-a8fb80637de4',
                'perencanaan_manusia_id' => 'aaa668fe-dfae-47df-9732-0d7dd22f9297',
                'penggunaan_anggaran' => 6000000,
                'tw' => 1,
                'progress' => 33.33,
                'status' => 1,
                'tanggal_konfirmasi' => '2021-03-13',
                'alasan_ditolak' => '-',
                'created_at' => '2021-03-13 16:09:46',
                'updated_at' => '2021-03-13 16:10:14',
            ),
            2 => 
            array (
                'id' => '397760aa-eedc-4e59-baa4-473ea8aeb0ca',
                'perencanaan_manusia_id' => 'aaa668fe-dfae-47df-9732-0d7dd22f9297',
                'penggunaan_anggaran' => 3000000,
                'tw' => 2,
                'progress' => 60.0,
                'status' => 1,
                'tanggal_konfirmasi' => '2021-05-22',
                'alasan_ditolak' => '-',
                'created_at' => '2021-05-22 16:11:23',
                'updated_at' => '2021-05-22 16:11:34',
            ),
            3 => 
            array (
                'id' => '829a007f-91be-4f2b-a71a-26b53b0b1280',
                'perencanaan_manusia_id' => 'fc3995c2-d9bc-4a98-800b-1298f5ae1165',
                'penggunaan_anggaran' => 2500000,
                'tw' => 3,
                'progress' => 57.14,
                'status' => 1,
                'tanggal_konfirmasi' => '2022-06-26',
                'alasan_ditolak' => '-',
                'created_at' => '2022-06-26 11:57:17',
                'updated_at' => '2022-08-26 11:57:33',
            ),
            4 => 
            array (
                'id' => '9423f60a-e8ab-4ed0-a0d0-fa0c915d0e74',
                'perencanaan_manusia_id' => '00326039-0a88-495b-8670-2b9098ce4600',
                'penggunaan_anggaran' => 2000000,
                'tw' => 3,
                'progress' => 100.0,
                'status' => 1,
                'tanggal_konfirmasi' => '2022-08-28',
                'alasan_ditolak' => '-',
                'created_at' => '2022-08-28 13:43:03',
                'updated_at' => '2022-08-28 13:43:22',
            ),
            5 => 
            array (
                'id' => 'a74fae2b-adfc-439f-9025-770e31d6b3f6',
                'perencanaan_manusia_id' => 'aaa668fe-dfae-47df-9732-0d7dd22f9297',
                'penggunaan_anggaran' => 4400000,
                'tw' => 4,
                'progress' => 100.0,
                'status' => 1,
                'tanggal_konfirmasi' => '2021-11-11',
                'alasan_ditolak' => '-',
                'created_at' => '2021-11-11 16:14:44',
                'updated_at' => '2021-11-11 16:14:44',
            ),
            6 => 
            array (
                'id' => 'ad51a011-0dae-41ce-91a2-22ff4b9e85f2',
                'perencanaan_manusia_id' => 'bd5fd8db-f1c6-4622-b94a-0baeb92547f2',
                'penggunaan_anggaran' => 10000000,
                'tw' => 2,
                'progress' => 37.5,
                'status' => 1,
                'tanggal_konfirmasi' => '2021-05-02',
                'alasan_ditolak' => '-',
                'created_at' => '2021-05-02 16:05:17',
                'updated_at' => '2022-05-06 15:40:57',
            ),
            7 => 
            array (
                'id' => 'b3848658-4a55-4ce5-95ff-54cf9371ce20',
                'perencanaan_manusia_id' => 'e24a52eb-b522-4a5c-a03f-3e9d89f2eab0',
                'penggunaan_anggaran' => 7000000,
                'tw' => 3,
                'progress' => 100.0,
                'status' => 0,
                'tanggal_konfirmasi' => NULL,
                'alasan_ditolak' => NULL,
                'created_at' => '2022-08-26 11:50:14',
                'updated_at' => '2022-08-26 11:50:14',
            ),
            8 => 
            array (
                'id' => 'd43a0f24-7a59-4951-b583-87a58e1092ad',
                'perencanaan_manusia_id' => 'bd5fd8db-f1c6-4622-b94a-0baeb92547f2',
                'penggunaan_anggaran' => 10000000,
                'tw' => 3,
                'progress' => 68.75,
                'status' => 1,
                'tanggal_konfirmasi' => '2021-08-03',
                'alasan_ditolak' => '-',
                'created_at' => '2021-08-03 15:42:48',
                'updated_at' => '2022-08-06 15:43:16',
            ),
            9 => 
            array (
                'id' => 'd9e809ae-3e83-4fbd-8832-b1077cf93edf',
                'perencanaan_manusia_id' => '00326039-0a88-495b-8670-2b9098ce4600',
                'penggunaan_anggaran' => 1000000,
                'tw' => 3,
                'progress' => 50.0,
                'status' => 1,
                'tanggal_konfirmasi' => '2022-08-28',
                'alasan_ditolak' => '-',
                'created_at' => '2022-08-28 13:36:44',
                'updated_at' => '2022-08-28 13:36:59',
            ),
            10 => 
            array (
                'id' => 'e3de8d8a-63bb-4333-b32f-c4c2110a0122',
                'perencanaan_manusia_id' => 'aaa668fe-dfae-47df-9732-0d7dd22f9297',
                'penggunaan_anggaran' => 4500000,
                'tw' => 3,
                'progress' => 80.0,
                'status' => 1,
                'tanggal_konfirmasi' => '2021-07-29',
                'alasan_ditolak' => '-',
                'created_at' => '2021-07-29 16:12:56',
                'updated_at' => '2021-07-29 16:13:36',
            ),
            11 => 
            array (
                'id' => 'f653bfc9-9bf5-4717-a8fb-1cbe06c240a9',
                'perencanaan_manusia_id' => 'e24a52eb-b522-4a5c-a03f-3e9d89f2eab0',
                'penggunaan_anggaran' => 2000000,
                'tw' => 2,
                'progress' => 50.0,
                'status' => 1,
                'tanggal_konfirmasi' => '2022-05-26',
                'alasan_ditolak' => '-',
                'created_at' => '2022-05-26 11:49:16',
                'updated_at' => '2022-08-26 11:49:25',
            ),
            12 => 
            array (
                'id' => 'fb143b8d-8621-4c70-b00e-e3d61268896e',
                'perencanaan_manusia_id' => 'fc3995c2-d9bc-4a98-800b-1298f5ae1165',
                'penggunaan_anggaran' => 3000000,
                'tw' => 3,
                'progress' => 85.71,
                'status' => 2,
                'tanggal_konfirmasi' => '2022-08-26',
                'alasan_ditolak' => 'Penduduk Kurang 1',
                'created_at' => '2022-08-26 11:58:26',
                'updated_at' => '2022-08-26 11:58:41',
            ),
        ));
        
        
    }
}