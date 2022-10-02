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
                'id' => '05a722bc-3504-4ef4-a5a7-08629ea1952c',
                'opd_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c95',
                'indikator_id' => '46526fea-2d72-40ce-8245-d514d0e91c50',
                'nilai_pembiayaan' => 33000000,
                'sumber_dana' => 'DAK',
                'status' => 1,
                'tanggal_konfirmasi' => '2021-01-04',
                'alasan_ditolak' => '-',
                'alasan_tidak_terselesaikan' => NULL,
                'status_baca' => NULL,
                'created_at' => '2021-01-04 00:47:22',
                'updated_at' => '2022-09-22 00:53:00',
            ),
            1 => 
            array (
                'id' => '28f813fc-f9d9-4a7d-b161-508ad436001e',
                'opd_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c97',
                'indikator_id' => '25fffcb8-df91-4a10-9fd5-6128f679f01e',
                'nilai_pembiayaan' => 30000000,
                'sumber_dana' => 'DAK',
                'status' => 1,
                'tanggal_konfirmasi' => '2021-01-17',
                'alasan_ditolak' => '-',
                'alasan_tidak_terselesaikan' => NULL,
                'status_baca' => NULL,
                'created_at' => '2021-01-17 15:14:14',
                'updated_at' => '2022-09-22 00:37:12',
            ),
            2 => 
            array (
                'id' => '4daef7d5-86d9-4d28-8a5c-1823b8fae6d9',
                'opd_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c95',
                'indikator_id' => '50957899-4fe5-456e-9e62-a5573d85f59b',
                'nilai_pembiayaan' => 20000000,
                'sumber_dana' => 'DAK',
                'status' => 0,
                'tanggal_konfirmasi' => NULL,
                'alasan_ditolak' => NULL,
                'alasan_tidak_terselesaikan' => NULL,
                'status_baca' => NULL,
                'created_at' => '2022-01-16 00:51:56',
                'updated_at' => '2022-09-22 00:51:56',
            ),
            3 => 
            array (
                'id' => '6e1e11f9-b285-46d5-af90-847d5e5fa602',
                'opd_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c95',
                'indikator_id' => '4f78975a-b868-41f9-9d88-bc8cf0601760',
                'nilai_pembiayaan' => 20000000,
                'sumber_dana' => 'DAK',
                'status' => 1,
                'tanggal_konfirmasi' => '2022-01-11',
                'alasan_ditolak' => '-',
                'alasan_tidak_terselesaikan' => NULL,
                'status_baca' => NULL,
                'created_at' => '2022-01-11 00:50:25',
                'updated_at' => '2022-09-22 00:53:35',
            ),
            4 => 
            array (
                'id' => '8674fd2c-041d-49ac-8dd8-adbacb7476ed',
                'opd_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c97',
                'indikator_id' => '2ba0802b-fcf5-43b0-b73a-e1012a14c2c8',
                'nilai_pembiayaan' => 35000000,
                'sumber_dana' => 'DAK',
                'status' => 1,
                'tanggal_konfirmasi' => '2022-01-10',
                'alasan_ditolak' => '-',
                'alasan_tidak_terselesaikan' => NULL,
                'status_baca' => NULL,
                'created_at' => '2022-01-10 15:16:04',
                'updated_at' => '2022-09-22 00:37:30',
            ),
            5 => 
            array (
                'id' => 'aa3c387f-90a5-4148-9ccd-680c6d1f41a0',
                'opd_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c95',
                'indikator_id' => '358ebd9d-fbe0-485d-8a21-bf255dce7db9',
                'nilai_pembiayaan' => 25000000,
                'sumber_dana' => 'DAU',
                'status' => 1,
                'tanggal_konfirmasi' => '2021-01-02',
                'alasan_ditolak' => '-',
                'alasan_tidak_terselesaikan' => NULL,
                'status_baca' => NULL,
                'created_at' => '2021-01-02 00:45:34',
                'updated_at' => '2022-09-22 00:52:53',
            ),
            6 => 
            array (
                'id' => 'b8b2d7a0-047e-431d-950b-04c13814c5bc',
                'opd_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c97',
                'indikator_id' => '2dc725bd-080b-4eff-9896-131b95f9d54b',
                'nilai_pembiayaan' => 40000000,
                'sumber_dana' => 'DAU',
                'status' => 2,
                'tanggal_konfirmasi' => '2022-01-20',
                'alasan_ditolak' => 'Kurang berkas',
                'alasan_tidak_terselesaikan' => NULL,
                'status_baca' => NULL,
                'created_at' => '2022-01-20 15:19:01',
                'updated_at' => '2022-09-22 00:37:47',
            ),
            7 => 
            array (
                'id' => 'd41ed3a7-8ce0-4309-8068-aa7839a132e1',
                'opd_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c97',
                'indikator_id' => '0d37ea22-3415-4539-b58e-ea23a326ae13',
                'nilai_pembiayaan' => 50000000,
                'sumber_dana' => 'DAK',
                'status' => 1,
                'tanggal_konfirmasi' => '2021-01-13',
                'alasan_ditolak' => '-',
                'alasan_tidak_terselesaikan' => NULL,
                'status_baca' => NULL,
                'created_at' => '2021-01-13 15:12:14',
                'updated_at' => '2022-09-22 00:37:03',
            ),
            8 => 
            array (
                'id' => 'd782e166-f1ac-4e68-866a-84917e214c76',
                'opd_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c95',
                'indikator_id' => '4d028914-259b-46ab-ac32-b3a4e97bf770',
                'nilai_pembiayaan' => 30000000,
                'sumber_dana' => 'DAU',
                'status' => 2,
                'tanggal_konfirmasi' => '2022-01-01',
                'alasan_ditolak' => 'Dokumen Kurang',
                'alasan_tidak_terselesaikan' => NULL,
                'status_baca' => NULL,
                'created_at' => '2022-01-01 00:49:00',
                'updated_at' => '2022-09-22 00:53:25',
            ),
            9 => 
            array (
                'id' => 'f884c0d6-ec2c-4038-8440-2eab2a2a4431',
                'opd_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c97',
                'indikator_id' => '32421c7e-73d6-4d3f-9313-0c768a651462',
                'nilai_pembiayaan' => 32000000,
                'sumber_dana' => 'DAU',
                'status' => 0,
                'tanggal_konfirmasi' => NULL,
                'alasan_ditolak' => NULL,
                'alasan_tidak_terselesaikan' => NULL,
                'status_baca' => NULL,
                'created_at' => '2022-01-22 00:35:41',
                'updated_at' => '2022-09-22 00:35:41',
            ),
        ));
        
        
    }
}