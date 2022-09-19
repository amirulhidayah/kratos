<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PerencanaanKeongTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('perencanaan_keong')->delete();

        \DB::table('perencanaan_keong')->insert(array(
            0 =>
            array(
                'id' => '5fa15403-b90f-4c7f-8c77-5076bc262028',
                'opd_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c95',
                'sub_indikator' => 'Mengecek sampel keong pada setiap kolam',
                'nilai_pembiayaan' => 20000000,
                'sumber_dana' => 'DAK',
                'status' => 1,
                'tanggal_konfirmasi' => '2021-01-06',
                'alasan_ditolak' => '-',
                'created_at' => '2021-01-06 11:21:05',
                'updated_at' => '2021-01-06 11:33:32',
            ),
            1 =>
            array(
                'id' => '66417cb6-4595-439d-8e67-87f292255a3c',
                'opd_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c10',
                'sub_indikator' => 'Memberi tanda pada kolam yang bebas maupun yang terdeteksi keong schistosomiasis',
                'nilai_pembiayaan' => 20000000,
                'sumber_dana' => 'DAU',
                'status' => 1,
                'tanggal_konfirmasi' => '2021-02-06',
                'alasan_ditolak' => '-',
                'created_at' => '2021-02-06 11:32:51',
                'updated_at' => '2021-02-06 11:33:16',
            ),
            2 =>
            array(
                'id' => '76628878-af22-4ae8-be21-eaa420265982',
                'opd_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c95',
                'sub_indikator' => 'Pengambilan tinja siswa siswi di sekolah',
                'nilai_pembiayaan' => 10000000,
                'sumber_dana' => 'DAK',
                'status' => 2,
                'tanggal_konfirmasi' => '2022-09-30',
                'alasan_ditolak' => 'Dokumen Kurang Lengkap',
                'created_at' => '2022-01-08 01:15:57',
                'updated_at' => NULL,
            ),
            3 =>
            array(
                'id' => '76628878-af22-4ae8-be21-eaa420265983',
                'opd_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c95',
                'sub_indikator' => 'Penaburan Obat',
                'nilai_pembiayaan' => 15000000,
                'sumber_dana' => 'DAU',
                'status' => 0,
                'tanggal_konfirmasi' => NULL,
                'alasan_ditolak' => '-',
                'created_at' => '2022-01-06 01:16:57',
                'updated_at' => NULL,
            ),
            4 =>
            array(
                'id' => '76628878-af22-4ae8-be21-eaa420265984',
                'opd_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c95',
                'sub_indikator' => 'Pembersihan Habitat Keong',
                'nilai_pembiayaan' => 12000000,
                'sumber_dana' => 'DAK',
                'status' => 1,
                'tanggal_konfirmasi' => '2022-01-03',
                'alasan_ditolak' => '-',
                'created_at' => '2022-01-02 01:17:57',
                'updated_at' => NULL,
            ),
            5 =>
            array(
                'id' => '76628878-af22-4ae8-be21-eaa420265985',
                'opd_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c96',
                'sub_indikator' => 'Penyuluhan Masyarakat',
                'nilai_pembiayaan' => 8000000,
                'sumber_dana' => 'DAK',
                'status' => 1,
                'tanggal_konfirmasi' => '2022-01-12',
                'alasan_ditolak' => '-',
                'created_at' => '2022-01-11 01:18:57',
                'updated_at' => NULL,
            ),
            6 =>
            array(
                'id' => '76628878-af22-4ae8-be21-eaa420265986',
                'opd_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c97',
                'sub_indikator' => 'Mengindentifikasi Kolam terdeteksi schistosomiasis',
                'nilai_pembiayaan' => 8500000,
                'sumber_dana' => 'DAU',
                'status' => 1,
                'tanggal_konfirmasi' => '2022-01-15',
                'alasan_ditolak' => '-',
                'created_at' => '2022-01-15 01:19:57',
                'updated_at' => NULL,
            ),
            7 =>
            array(
                'id' => '76628878-af22-4ae8-be21-eaa420265987',
                'opd_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c10',
                'sub_indikator' => 'Pemusnahan Keong',
                'nilai_pembiayaan' => 1250000,
                'sumber_dana' => 'DAK',
                'status' => 1,
                'tanggal_konfirmasi' => '2022-02-01',
                'alasan_ditolak' => '-',
                'created_at' => '2022-02-01 01:20:57',
                'updated_at' => NULL,
            ),
        ));
    }
}
