<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PerencanaanHewanTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('perencanaan_hewan')->delete();
        
        \DB::table('perencanaan_hewan')->insert(array (
            0 => 
            array (
                'id' => '3e6d54e2-995c-44ab-9530-47ab2b628773',
                'opd_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c95',
                'sub_indikator' => 'Pemberian Obat/Vitamin untuk hewan ternak',
                'nilai_pembiayaan' => 10000000,
                'sumber_dana' => 'DAU',
                'status' => 1,
                'tanggal_konfirmasi' => '2022-01-09',
                'alasan_ditolak' => '-',
                'created_at' => '2022-01-09 12:45:27',
                'updated_at' => '2022-01-09 13:30:23',
            ),
            1 => 
            array (
                'id' => '47c49fdb-370e-426c-99e9-ebe0bfe14787',
                'opd_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c95',
                'sub_indikator' => 'Sosialisasi Kepada Pemillik Ternak',
                'nilai_pembiayaan' => 8000000,
                'sumber_dana' => 'DAU',
                'status' => 0,
                'tanggal_konfirmasi' => NULL,
                'alasan_ditolak' => NULL,
                'created_at' => '2022-02-02 13:09:57',
                'updated_at' => '2022-08-27 13:09:57',
            ),
            2 => 
            array (
                'id' => '5aabc047-e5bb-4d9c-bf0a-12ee1e88eb68',
                'opd_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c95',
                'sub_indikator' => 'Pemeriksaan Ternak',
                'nilai_pembiayaan' => 10000000,
                'sumber_dana' => 'DAK',
                'status' => 2,
                'tanggal_konfirmasi' => '2022-01-03',
                'alasan_ditolak' => 'lokasi terlalu sedikit',
                'created_at' => '2022-01-03 12:39:44',
                'updated_at' => '2022-01-03 13:06:16',
            ),
            3 => 
            array (
                'id' => '6aa72a31-194d-4363-a282-084f5e6362d3',
                'opd_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c97',
                'sub_indikator' => 'Penyuntikan Vaksin pada hewan ternak',
                'nilai_pembiayaan' => 4000000,
                'sumber_dana' => 'DAK',
                'status' => 1,
                'tanggal_konfirmasi' => '2022-08-27',
                'alasan_ditolak' => '-',
                'created_at' => '2022-08-27 13:11:57',
                'updated_at' => '2022-09-06 13:30:35',
            ),
            4 => 
            array (
                'id' => 'c913a980-7786-4008-ae5b-62f581a35945',
                'opd_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c95',
                'sub_indikator' => 'Pemeriksaan Tinja Ternak',
                'nilai_pembiayaan' => 15000000,
                'sumber_dana' => 'DAK',
                'status' => 1,
                'tanggal_konfirmasi' => '2021-01-10',
                'alasan_ditolak' => '-',
                'created_at' => '2021-01-10 13:29:41',
                'updated_at' => '2021-01-10 14:02:45',
            ),
            5 => 
            array (
                'id' => 'cc85aa2c-d07b-45e9-9629-f2590f12ee63',
                'opd_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c10',
                'sub_indikator' => 'Mendata Jumlah Hewan Ternak',
                'nilai_pembiayaan' => 20000000,
                'sumber_dana' => 'DAK',
                'status' => 1,
                'tanggal_konfirmasi' => '2021-01-08',
                'alasan_ditolak' => '-',
                'created_at' => '2021-01-08 14:02:33',
                'updated_at' => '2021-01-08 14:02:52',
            ),
        ));
        
        
    }
}