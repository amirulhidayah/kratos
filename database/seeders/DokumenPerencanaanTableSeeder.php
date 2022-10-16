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
                'created_at' => '2022-10-15 22:13:39',
                'file' => '2022652701-Dokumen Perencanaan-Dinas Kesehatan-1.pdf',
                'id' => '03e941e3-0f36-49e8-83d3-68ef805754bd',
                'nama' => 'Dokumen Perencanaan',
                'no_urut' => 1,
                'perencanaan_id' => '2fe3f018-8837-463e-be44-c4a8c3dcb069',
                'updated_at' => '2022-10-15 22:13:39',
            ),
            1 => 
            array (
                'created_at' => '2022-09-22 00:47:22',
                'file' => '1361776916-Dokumen Perencanaan b-Dinas Kesehatan-1.pdf',
                'id' => '07bf4a4b-6b53-4469-834f-6a9b679cf965',
                'nama' => 'Dokumen Perencanaan b',
                'no_urut' => 1,
                'perencanaan_id' => '05a722bc-3504-4ef4-a5a7-08629ea1952c',
                'updated_at' => '2022-09-22 00:47:22',
            ),
            2 => 
            array (
                'created_at' => '2022-10-15 23:07:28',
                'file' => '427228689-Dokumen Perencanaan-Dinas Kesehatan-1.pdf',
                'id' => '0ab37fe4-7d3a-4972-bac5-3b461b1592e6',
                'nama' => 'Dokumen Perencanaan',
                'no_urut' => 1,
                'perencanaan_id' => 'c9812995-a1fb-4883-ad53-daefa2e99f31',
                'updated_at' => '2022-10-15 23:07:28',
            ),
            3 => 
            array (
                'created_at' => '2022-09-22 00:50:25',
                'file' => '540497769-Dokumen Perencanaan b-Dinas Kesehatan-1.pdf',
                'id' => '1882f9bc-a040-4cef-b3dc-0cf81d56b445',
                'nama' => 'Dokumen Perencanaan b',
                'no_urut' => 1,
                'perencanaan_id' => '6e1e11f9-b285-46d5-af90-847d5e5fa602',
                'updated_at' => '2022-09-22 00:50:25',
            ),
            4 => 
            array (
                'created_at' => '2022-10-15 22:28:33',
                'file' => '940152161-Dokumen Perencanaan-Dinas Kesehatan-1.pdf',
                'id' => '2dc4c4c3-b4f0-49b6-84ae-222426b46783',
                'nama' => 'Dokumen Perencanaan',
                'no_urut' => 1,
                'perencanaan_id' => 'cedd07ba-bc7d-4bc2-acf1-c98391722b76',
                'updated_at' => '2022-10-15 22:28:33',
            ),
            5 => 
            array (
                'created_at' => '2022-09-21 15:12:14',
                'file' => '807116783-Dokumen Perencanaan r-Dinas Kebersihan-1.pdf',
                'id' => '47062d2b-d0bc-4233-99f5-4fc6d58d1e07',
                'nama' => 'Dokumen Perencanaan r',
                'no_urut' => 1,
                'perencanaan_id' => 'd41ed3a7-8ce0-4309-8068-aa7839a132e1',
                'updated_at' => '2022-09-21 15:12:14',
            ),
            6 => 
            array (
                'created_at' => '2022-09-22 00:49:00',
                'file' => '1258680443-Dokumen Perencanaan g-Dinas Kesehatan-1.pdf',
                'id' => '5a36ac8f-ecec-4462-95a1-6a31ba8e9a51',
                'nama' => 'Dokumen Perencanaan g',
                'no_urut' => 1,
                'perencanaan_id' => 'd782e166-f1ac-4e68-866a-84917e214c76',
                'updated_at' => '2022-09-22 00:49:00',
            ),
            7 => 
            array (
                'created_at' => '2022-10-15 22:30:00',
                'file' => '1141723862-Dokumen Perencanaan-Dinas Kesehatan-1.pdf',
                'id' => '6345716b-608f-4001-9d1c-26cf69b3462a',
                'nama' => 'Dokumen Perencanaan',
                'no_urut' => 1,
                'perencanaan_id' => '5bcbda3a-4ee9-4a4d-aa38-51ca4f511f88',
                'updated_at' => '2022-10-15 22:36:59',
            ),
            8 => 
            array (
                'created_at' => '2022-09-22 00:35:41',
                'file' => '995481321-Dokumen Perencanaan p-Dinas Kebersihan-1.pdf',
                'id' => '6725e8a9-f9d3-4ea8-9ac7-a14e7ac4f2d3',
                'nama' => 'Dokumen Perencanaan p',
                'no_urut' => 1,
                'perencanaan_id' => 'f884c0d6-ec2c-4038-8440-2eab2a2a4431',
                'updated_at' => '2022-09-22 00:35:41',
            ),
            9 => 
            array (
                'created_at' => '2022-09-21 15:19:01',
                'file' => '1818177951-Dokumen Perencanaan r-Dinas Kebersihan-1.pdf',
                'id' => '67c236b5-cc39-45eb-9593-057ea7c98bd9',
                'nama' => 'Dokumen Perencanaan r',
                'no_urut' => 1,
                'perencanaan_id' => 'b8b2d7a0-047e-431d-950b-04c13814c5bc',
                'updated_at' => '2022-09-21 15:19:01',
            ),
            10 => 
            array (
                'created_at' => '2022-09-21 15:14:14',
                'file' => '1426184739-Dokumen Perencanaan b-Dinas Kebersihan-1.pdf',
                'id' => '85beef92-d4ba-4cf1-b27f-eb61ec511ca0',
                'nama' => 'Dokumen Perencanaan b',
                'no_urut' => 1,
                'perencanaan_id' => '28f813fc-f9d9-4a7d-b161-508ad436001e',
                'updated_at' => '2022-09-21 15:14:14',
            ),
            11 => 
            array (
                'created_at' => '2022-09-21 15:16:04',
                'file' => '1962832105-Dokumen Perencanaan g-Dinas Kebersihan-1.pdf',
                'id' => '8b1b9cc1-63a0-4a48-a855-6aa1a32b37c3',
                'nama' => 'Dokumen Perencanaan g',
                'no_urut' => 1,
                'perencanaan_id' => '8674fd2c-041d-49ac-8dd8-adbacb7476ed',
                'updated_at' => '2022-09-21 15:16:04',
            ),
            12 => 
            array (
                'created_at' => '2022-09-22 00:51:56',
                'file' => '512679814-Dokumen Perencanaan p-Dinas Kesehatan-1.pdf',
                'id' => '9b0a28d3-6022-4659-b562-5defca809b72',
                'nama' => 'Dokumen Perencanaan p',
                'no_urut' => 1,
                'perencanaan_id' => '4daef7d5-86d9-4d28-8a5c-1823b8fae6d9',
                'updated_at' => '2022-09-22 00:51:56',
            ),
            13 => 
            array (
                'created_at' => '2022-09-22 00:45:35',
                'file' => '1698814217-Dokumen Perencanaan r-Dinas Kesehatan-1.pdf',
                'id' => 'b29334e8-b850-461c-9529-7f66873b7e83',
                'nama' => 'Dokumen Perencanaan r',
                'no_urut' => 1,
                'perencanaan_id' => 'aa3c387f-90a5-4148-9ccd-680c6d1f41a0',
                'updated_at' => '2022-09-22 00:45:35',
            ),
            14 => 
            array (
                'created_at' => '2022-09-21 15:12:14',
                'file' => '1751659701-Dokumen Perencanaan p-Dinas Kebersihan-2.pdf',
                'id' => 'bd58b1bc-860f-44a6-b14b-bfd1ff248b7b',
                'nama' => 'Dokumen Perencanaan p',
                'no_urut' => 2,
                'perencanaan_id' => 'd41ed3a7-8ce0-4309-8068-aa7839a132e1',
                'updated_at' => '2022-09-21 15:12:14',
            ),
        ));
        
        
    }
}