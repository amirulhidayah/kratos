<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PerencanaanManusiaTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('perencanaan_manusia')->delete();
        
        \DB::table('perencanaan_manusia')->insert(array (
            0 => 
            array (
                'id' => '00326039-0a88-495b-8670-2b9098ce4600',
                'opd_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c96',
                'sub_indikator' => 'Melakukan survey pada warga yang telah sembuh dari gejala yang disebabkan Schistosomiasis',
                'nilai_pembiayaan' => 4000000,
                'sumber_dana' => 'DAU',
                'status' => 1,
                'tanggal_konfirmasi' => '2022-02-10',
                'alasan_ditolak' => '-',
                'created_at' => '2022-02-10 23:45:49',
                'updated_at' => '2022-02-10 13:29:42',
            ),
            1 => 
            array (
                'id' => '9c559147-af9e-4ce2-a414-17d2cfdd15f5',
                'opd_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c95',
                'sub_indikator' => 'Pengobatan pada warga yang terdampak Schistosomiasis',
                'nilai_pembiayaan' => 30000000,
                'sumber_dana' => 'DAK',
                'status' => 0,
                'tanggal_konfirmasi' => NULL,
                'alasan_ditolak' => NULL,
                'created_at' => '2022-01-15 23:35:20',
                'updated_at' => '2022-01-15 23:35:20',
            ),
            2 => 
            array (
                'id' => 'aaa668fe-dfae-47df-9732-0d7dd22f9297',
                'opd_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c11',
                'sub_indikator' => 'Memberikan edukasi terkait keong schistosomiasis pada siswa siswi di sekolah',
                'nilai_pembiayaan' => 18000000,
                'sumber_dana' => 'DAK',
                'status' => 1,
                'tanggal_konfirmasi' => '2021-01-02',
                'alasan_ditolak' => '-',
                'created_at' => '2021-01-01 12:25:24',
                'updated_at' => '2021-01-02 12:26:20',
            ),
            3 => 
            array (
                'id' => 'bac1eb88-fb66-4a73-b51d-2d6834470217',
                'opd_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c95',
                'sub_indikator' => 'Pengambilan Tinja Di Desa Anca',
                'nilai_pembiayaan' => 10000000,
                'sumber_dana' => 'DAK',
                'status' => 2,
                'tanggal_konfirmasi' => '2022-02-08',
                'alasan_ditolak' => 'Penduduk terlalu sedikit',
                'created_at' => '2022-02-08 23:26:52',
                'updated_at' => '2022-02-10 23:36:05',
            ),
            4 => 
            array (
                'id' => 'bd5fd8db-f1c6-4622-b94a-0baeb92547f2',
                'opd_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c95',
                'sub_indikator' => 'Pengambilan tinja siswa siswi di sekolah',
                'nilai_pembiayaan' => 30000000,
                'sumber_dana' => 'DAK',
                'status' => 1,
                'tanggal_konfirmasi' => '2021-01-07',
                'alasan_ditolak' => '-',
                'created_at' => '2021-01-07 12:14:46',
                'updated_at' => '2021-01-07 12:35:08',
            ),
            5 => 
            array (
                'id' => 'e24a52eb-b522-4a5c-a03f-3e9d89f2eab0',
                'opd_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c95',
                'sub_indikator' => 'Pemeriksaan Kesehatan',
                'nilai_pembiayaan' => 20000000,
                'sumber_dana' => 'DAK',
                'status' => 1,
                'tanggal_konfirmasi' => '2022-02-01',
                'alasan_ditolak' => '-',
                'created_at' => '2022-02-01 23:32:10',
                'updated_at' => '2022-02-01 23:36:51',
            ),
            6 => 
            array (
                'id' => 'fc3995c2-d9bc-4a98-800b-1298f5ae1165',
                'opd_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c97',
                'sub_indikator' => 'Memberikan sosialisasi kepada warga yang teridentifikasi gejala Schistosomiasis',
                'nilai_pembiayaan' => 9000000,
                'sumber_dana' => 'DAK',
                'status' => 1,
                'tanggal_konfirmasi' => '2022-01-13',
                'alasan_ditolak' => '-',
                'created_at' => '2022-01-13 23:42:01',
                'updated_at' => '2022-01-14 23:42:15',
            ),
        ));
        
        
    }
}