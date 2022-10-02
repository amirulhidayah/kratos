<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DokumenPerencanaanTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('dokumen_perencanaan')->delete();
        
        \DB::table('dokumen_perencanaan')->insert(array (
            0 => 
            array (
                'id' => '07bf4a4b-6b53-4469-834f-6a9b679cf965',
                'perencanaan_id' => '05a722bc-3504-4ef4-a5a7-08629ea1952c',
                'nama' => 'Dokumen Perencanaan b',
                'file' => '1361776916-Dokumen Perencanaan b-Dinas Kesehatan-1.pdf',
                'no_urut' => 1,
                'created_at' => '2022-09-22 00:47:22',
                'updated_at' => '2022-09-22 00:47:22',
            ),
            1 => 
            array (
                'id' => '1882f9bc-a040-4cef-b3dc-0cf81d56b445',
                'perencanaan_id' => '6e1e11f9-b285-46d5-af90-847d5e5fa602',
                'nama' => 'Dokumen Perencanaan b',
                'file' => '540497769-Dokumen Perencanaan b-Dinas Kesehatan-1.pdf',
                'no_urut' => 1,
                'created_at' => '2022-09-22 00:50:25',
                'updated_at' => '2022-09-22 00:50:25',
            ),
            2 => 
            array (
                'id' => '47062d2b-d0bc-4233-99f5-4fc6d58d1e07',
                'perencanaan_id' => 'd41ed3a7-8ce0-4309-8068-aa7839a132e1',
                'nama' => 'Dokumen Perencanaan r',
                'file' => '807116783-Dokumen Perencanaan r-Dinas Kebersihan-1.pdf',
                'no_urut' => 1,
                'created_at' => '2022-09-21 15:12:14',
                'updated_at' => '2022-09-21 15:12:14',
            ),
            3 => 
            array (
                'id' => '5a36ac8f-ecec-4462-95a1-6a31ba8e9a51',
                'perencanaan_id' => 'd782e166-f1ac-4e68-866a-84917e214c76',
                'nama' => 'Dokumen Perencanaan g',
                'file' => '1258680443-Dokumen Perencanaan g-Dinas Kesehatan-1.pdf',
                'no_urut' => 1,
                'created_at' => '2022-09-22 00:49:00',
                'updated_at' => '2022-09-22 00:49:00',
            ),
            4 => 
            array (
                'id' => '6725e8a9-f9d3-4ea8-9ac7-a14e7ac4f2d3',
                'perencanaan_id' => 'f884c0d6-ec2c-4038-8440-2eab2a2a4431',
                'nama' => 'Dokumen Perencanaan p',
                'file' => '995481321-Dokumen Perencanaan p-Dinas Kebersihan-1.pdf',
                'no_urut' => 1,
                'created_at' => '2022-09-22 00:35:41',
                'updated_at' => '2022-09-22 00:35:41',
            ),
            5 => 
            array (
                'id' => '67c236b5-cc39-45eb-9593-057ea7c98bd9',
                'perencanaan_id' => 'b8b2d7a0-047e-431d-950b-04c13814c5bc',
                'nama' => 'Dokumen Perencanaan r',
                'file' => '1818177951-Dokumen Perencanaan r-Dinas Kebersihan-1.pdf',
                'no_urut' => 1,
                'created_at' => '2022-09-21 15:19:01',
                'updated_at' => '2022-09-21 15:19:01',
            ),
            6 => 
            array (
                'id' => '85beef92-d4ba-4cf1-b27f-eb61ec511ca0',
                'perencanaan_id' => '28f813fc-f9d9-4a7d-b161-508ad436001e',
                'nama' => 'Dokumen Perencanaan b',
                'file' => '1426184739-Dokumen Perencanaan b-Dinas Kebersihan-1.pdf',
                'no_urut' => 1,
                'created_at' => '2022-09-21 15:14:14',
                'updated_at' => '2022-09-21 15:14:14',
            ),
            7 => 
            array (
                'id' => '8b1b9cc1-63a0-4a48-a855-6aa1a32b37c3',
                'perencanaan_id' => '8674fd2c-041d-49ac-8dd8-adbacb7476ed',
                'nama' => 'Dokumen Perencanaan g',
                'file' => '1962832105-Dokumen Perencanaan g-Dinas Kebersihan-1.pdf',
                'no_urut' => 1,
                'created_at' => '2022-09-21 15:16:04',
                'updated_at' => '2022-09-21 15:16:04',
            ),
            8 => 
            array (
                'id' => '9b0a28d3-6022-4659-b562-5defca809b72',
                'perencanaan_id' => '4daef7d5-86d9-4d28-8a5c-1823b8fae6d9',
                'nama' => 'Dokumen Perencanaan p',
                'file' => '512679814-Dokumen Perencanaan p-Dinas Kesehatan-1.pdf',
                'no_urut' => 1,
                'created_at' => '2022-09-22 00:51:56',
                'updated_at' => '2022-09-22 00:51:56',
            ),
            9 => 
            array (
                'id' => 'b29334e8-b850-461c-9529-7f66873b7e83',
                'perencanaan_id' => 'aa3c387f-90a5-4148-9ccd-680c6d1f41a0',
                'nama' => 'Dokumen Perencanaan r',
                'file' => '1698814217-Dokumen Perencanaan r-Dinas Kesehatan-1.pdf',
                'no_urut' => 1,
                'created_at' => '2022-09-22 00:45:35',
                'updated_at' => '2022-09-22 00:45:35',
            ),
            10 => 
            array (
                'id' => 'bd58b1bc-860f-44a6-b14b-bfd1ff248b7b',
                'perencanaan_id' => 'd41ed3a7-8ce0-4309-8068-aa7839a132e1',
                'nama' => 'Dokumen Perencanaan p',
                'file' => '1751659701-Dokumen Perencanaan p-Dinas Kebersihan-2.pdf',
                'no_urut' => 2,
                'created_at' => '2022-09-21 15:12:14',
                'updated_at' => '2022-09-21 15:12:14',
            ),
        ));
        
        
    }
}