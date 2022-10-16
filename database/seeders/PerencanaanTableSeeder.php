<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PerencanaanTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('perencanaan')->delete();
        
        \DB::table('perencanaan')->insert(array (
            0 => 
            array (
                'alasan_ditolak' => '-',
                'alasan_tidak_terselesaikan' => NULL,
                'created_at' => '2021-01-04 00:47:22',
                'id' => '05a722bc-3504-4ef4-a5a7-08629ea1952c',
                'indikator_id' => '46526fea-2d72-40ce-8245-d514d0e91c50',
                'nilai_pembiayaan' => 33000000,
                'opd_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c95',
                'status' => 1,
                'status_baca' => NULL,
                'sumber_dana_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3x90',
                'tanggal_konfirmasi' => '2021-01-04',
                'updated_at' => '2022-10-15 22:06:51',
            ),
            1 => 
            array (
                'alasan_ditolak' => '-',
                'alasan_tidak_terselesaikan' => NULL,
                'created_at' => '2021-01-17 15:14:14',
                'id' => '28f813fc-f9d9-4a7d-b161-508ad436001e',
                'indikator_id' => '25fffcb8-df91-4a10-9fd5-6128f679f01e',
                'nilai_pembiayaan' => 30000000,
                'opd_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c97',
                'status' => 1,
                'status_baca' => NULL,
                'sumber_dana_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3x90',
                'tanggal_konfirmasi' => '2021-01-17',
                'updated_at' => '2022-09-22 00:37:12',
            ),
            2 => 
            array (
                'alasan_ditolak' => '-',
                'alasan_tidak_terselesaikan' => NULL,
                'created_at' => '2022-01-28 22:13:39',
                'id' => '2fe3f018-8837-463e-be44-c4a8c3dcb069',
                'indikator_id' => 'beda2a47-a8be-4b3a-9438-b62857f261cd',
                'nilai_pembiayaan' => 27000000,
                'opd_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c95',
                'status' => 1,
                'status_baca' => NULL,
                'sumber_dana_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3x91',
                'tanggal_konfirmasi' => '2022-01-28',
                'updated_at' => '2022-10-15 22:27:17',
            ),
            3 => 
            array (
                'alasan_ditolak' => '-',
                'alasan_tidak_terselesaikan' => NULL,
                'created_at' => '2022-01-16 00:51:56',
                'id' => '4daef7d5-86d9-4d28-8a5c-1823b8fae6d9',
                'indikator_id' => '50957899-4fe5-456e-9e62-a5573d85f59b',
                'nilai_pembiayaan' => 20000000,
                'opd_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c95',
                'status' => 1,
                'status_baca' => NULL,
                'sumber_dana_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3x90',
                'tanggal_konfirmasi' => '2022-01-16',
                'updated_at' => '2022-10-15 21:00:52',
            ),
            4 => 
            array (
                'alasan_ditolak' => '-',
                'alasan_tidak_terselesaikan' => NULL,
                'created_at' => '2022-02-10 22:30:00',
                'id' => '5bcbda3a-4ee9-4a4d-aa38-51ca4f511f88',
                'indikator_id' => '8c4ecc70-f6fa-4af5-94b2-420084ee55ab',
                'nilai_pembiayaan' => 28000000,
                'opd_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c95',
                'status' => 1,
                'status_baca' => NULL,
                'sumber_dana_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3x92',
                'tanggal_konfirmasi' => '2022-02-10',
                'updated_at' => '2022-10-15 23:08:30',
            ),
            5 => 
            array (
                'alasan_ditolak' => '-',
                'alasan_tidak_terselesaikan' => NULL,
                'created_at' => '2022-01-11 00:50:25',
                'id' => '6e1e11f9-b285-46d5-af90-847d5e5fa602',
                'indikator_id' => '4f78975a-b868-41f9-9d88-bc8cf0601760',
                'nilai_pembiayaan' => 20000000,
                'opd_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c95',
                'status' => 1,
                'status_baca' => NULL,
                'sumber_dana_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3x90',
                'tanggal_konfirmasi' => '2022-01-11',
                'updated_at' => '2022-09-22 00:53:35',
            ),
            6 => 
            array (
                'alasan_ditolak' => '-',
                'alasan_tidak_terselesaikan' => NULL,
                'created_at' => '2022-01-10 15:16:04',
                'id' => '8674fd2c-041d-49ac-8dd8-adbacb7476ed',
                'indikator_id' => '2ba0802b-fcf5-43b0-b73a-e1012a14c2c8',
                'nilai_pembiayaan' => 35000000,
                'opd_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c97',
                'status' => 1,
                'status_baca' => NULL,
                'sumber_dana_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3x90',
                'tanggal_konfirmasi' => '2022-01-10',
                'updated_at' => '2022-09-22 00:37:30',
            ),
            7 => 
            array (
                'alasan_ditolak' => '-',
                'alasan_tidak_terselesaikan' => NULL,
                'created_at' => '2021-01-02 00:45:34',
                'id' => 'aa3c387f-90a5-4148-9ccd-680c6d1f41a0',
                'indikator_id' => '358ebd9d-fbe0-485d-8a21-bf255dce7db9',
                'nilai_pembiayaan' => 25000000,
                'opd_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c95',
                'status' => 1,
                'status_baca' => NULL,
                'sumber_dana_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3x91',
                'tanggal_konfirmasi' => '2021-01-02',
                'updated_at' => '2022-09-22 00:52:53',
            ),
            8 => 
            array (
                'alasan_ditolak' => 'Kurang berkas',
                'alasan_tidak_terselesaikan' => NULL,
                'created_at' => '2022-01-20 15:19:01',
                'id' => 'b8b2d7a0-047e-431d-950b-04c13814c5bc',
                'indikator_id' => '2dc725bd-080b-4eff-9896-131b95f9d54b',
                'nilai_pembiayaan' => 40000000,
                'opd_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c97',
                'status' => 2,
                'status_baca' => NULL,
                'sumber_dana_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3x91',
                'tanggal_konfirmasi' => '2022-01-20',
                'updated_at' => '2022-09-22 00:37:47',
            ),
            9 => 
            array (
                'alasan_ditolak' => NULL,
                'alasan_tidak_terselesaikan' => NULL,
                'created_at' => '2022-02-15 23:07:28',
                'id' => 'c9812995-a1fb-4883-ad53-daefa2e99f31',
                'indikator_id' => 'e9709a42-3581-457f-8ac2-fceda0a69239',
                'nilai_pembiayaan' => 20000000,
                'opd_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c95',
                'status' => 0,
                'status_baca' => NULL,
                'sumber_dana_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3x92',
                'tanggal_konfirmasi' => NULL,
                'updated_at' => '2022-10-15 23:07:28',
            ),
            10 => 
            array (
                'alasan_ditolak' => '-',
                'alasan_tidak_terselesaikan' => NULL,
                'created_at' => '2022-02-01 22:28:33',
                'id' => 'cedd07ba-bc7d-4bc2-acf1-c98391722b76',
                'indikator_id' => '2dc725bd-080b-4eff-9896-131b95f9d54b',
                'nilai_pembiayaan' => 34000000,
                'opd_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c95',
                'status' => 1,
                'status_baca' => NULL,
                'sumber_dana_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3x92',
                'tanggal_konfirmasi' => '2022-02-01',
                'updated_at' => '2022-10-15 22:30:16',
            ),
            11 => 
            array (
                'alasan_ditolak' => '-',
                'alasan_tidak_terselesaikan' => NULL,
                'created_at' => '2021-01-13 15:12:14',
                'id' => 'd41ed3a7-8ce0-4309-8068-aa7839a132e1',
                'indikator_id' => '0d37ea22-3415-4539-b58e-ea23a326ae13',
                'nilai_pembiayaan' => 50000000,
                'opd_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c97',
                'status' => 1,
                'status_baca' => NULL,
                'sumber_dana_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3x90',
                'tanggal_konfirmasi' => '2021-01-13',
                'updated_at' => '2022-09-22 00:37:03',
            ),
            12 => 
            array (
                'alasan_ditolak' => 'Dokumen Kurang',
                'alasan_tidak_terselesaikan' => NULL,
                'created_at' => '2022-01-01 00:49:00',
                'id' => 'd782e166-f1ac-4e68-866a-84917e214c76',
                'indikator_id' => '4d028914-259b-46ab-ac32-b3a4e97bf770',
                'nilai_pembiayaan' => 30000000,
                'opd_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c95',
                'status' => 2,
                'status_baca' => NULL,
                'sumber_dana_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3x91',
                'tanggal_konfirmasi' => '2022-01-01',
                'updated_at' => '2022-09-22 00:53:25',
            ),
            13 => 
            array (
                'alasan_ditolak' => '-',
                'alasan_tidak_terselesaikan' => NULL,
                'created_at' => '2022-01-22 00:35:41',
                'id' => 'f884c0d6-ec2c-4038-8440-2eab2a2a4431',
                'indikator_id' => '32421c7e-73d6-4d3f-9313-0c768a651462',
                'nilai_pembiayaan' => 32000000,
                'opd_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c97',
                'status' => 1,
                'status_baca' => NULL,
                'sumber_dana_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3x91',
                'tanggal_konfirmasi' => '2022-01-22',
                'updated_at' => '2022-10-15 21:48:48',
            ),
        ));
        
        
    }
}