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
                'id' => '19286c64-4753-40d6-aa86-e8d3eb404d68',
                'perencanaan_id' => 'd41ed3a7-8ce0-4309-8068-aa7839a132e1',
                'penggunaan_anggaran' => 5000000,
                'tw' => 4,
                'progress' => 88.24,
                'status' => 1,
                'tanggal_konfirmasi' => '2021-10-15',
                'alasan_ditolak' => '-',
                'created_at' => '2021-10-15 22:18:35',
                'updated_at' => '2022-09-22 22:20:16',
            ),
            1 => 
            array (
                'id' => '2aa65cb9-1967-4814-9af8-a6d3bd212119',
                'perencanaan_id' => '28f813fc-f9d9-4a7d-b161-508ad436001e',
                'penggunaan_anggaran' => 5000000,
                'tw' => 3,
                'progress' => 53.85,
                'status' => 1,
                'tanggal_konfirmasi' => '2022-09-23',
                'alasan_ditolak' => '-',
                'created_at' => '2021-04-21 00:05:54',
                'updated_at' => '2022-09-23 00:12:19',
            ),
            2 => 
            array (
                'id' => '385849ad-8fc1-413a-bd43-c2f0ad790a8c',
                'perencanaan_id' => 'd41ed3a7-8ce0-4309-8068-aa7839a132e1',
                'penggunaan_anggaran' => 5000000,
                'tw' => 4,
                'progress' => 100.0,
                'status' => 1,
                'tanggal_konfirmasi' => '2021-11-30',
                'alasan_ditolak' => '-',
                'created_at' => '2021-11-30 22:21:09',
                'updated_at' => '2022-09-22 22:23:18',
            ),
            3 => 
            array (
                'id' => '4ed15420-572a-44da-8770-0a4f62df78da',
                'perencanaan_id' => 'd41ed3a7-8ce0-4309-8068-aa7839a132e1',
                'penggunaan_anggaran' => 10000000,
                'tw' => 1,
                'progress' => 35.29,
                'status' => 1,
                'tanggal_konfirmasi' => '2021-03-03',
                'alasan_ditolak' => '-',
                'created_at' => '2021-03-03 15:28:42',
                'updated_at' => '2022-09-22 16:18:50',
            ),
            4 => 
            array (
                'id' => 'c3af84bf-2636-4040-a4b9-bed261c3e6f8',
                'perencanaan_id' => '28f813fc-f9d9-4a7d-b161-508ad436001e',
                'penggunaan_anggaran' => 10000000,
                'tw' => 3,
                'progress' => 38.46,
                'status' => 1,
                'tanggal_konfirmasi' => '2021-01-05',
                'alasan_ditolak' => '-',
                'created_at' => '2021-01-05 00:01:35',
                'updated_at' => '2022-09-23 00:04:55',
            ),
            5 => 
            array (
                'id' => 'e354d884-eb7a-4b72-a03b-2676088c398a',
                'perencanaan_id' => 'd41ed3a7-8ce0-4309-8068-aa7839a132e1',
                'penggunaan_anggaran' => 10000000,
                'tw' => 3,
                'progress' => 76.47,
                'status' => 1,
                'tanggal_konfirmasi' => '2021-07-19',
                'alasan_ditolak' => '-',
                'created_at' => '2021-07-19 21:37:55',
                'updated_at' => '2022-09-22 22:08:46',
            ),
            6 => 
            array (
                'id' => 'ed878111-330c-4d44-8203-e90884610475',
                'perencanaan_id' => 'd41ed3a7-8ce0-4309-8068-aa7839a132e1',
                'penggunaan_anggaran' => 20000000,
                'tw' => 2,
                'progress' => 58.82,
                'status' => 1,
                'tanggal_konfirmasi' => '2021-05-02',
                'alasan_ditolak' => '-',
                'created_at' => '2021-05-02 21:18:03',
                'updated_at' => '2022-09-22 21:34:37',
            ),
        ));
        
        
    }
}