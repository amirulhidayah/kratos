<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DokumenRealisasiTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('dokumen_realisasi')->delete();
        
        \DB::table('dokumen_realisasi')->insert(array (
            0 => 
            array (
                'id' => '0a85c157-4f58-485d-b176-2ccae0da9a6a',
                'realisasi_id' => '385849ad-8fc1-413a-bd43-c2f0ad790a8c',
                'nama' => 'Dokumen Realisasi p',
                'file' => '2137354810-Dokumen Realisasi p-Dinas Kebersihan-1.pdf',
                'no_urut' => 1,
                'created_at' => '2022-09-22 22:21:10',
                'updated_at' => '2022-09-22 22:21:10',
            ),
            1 => 
            array (
                'id' => '17f1a9cd-c780-475b-80e4-b87f6364a544',
                'realisasi_id' => 'cc9b49d7-8cfc-4527-ac2c-2ade8adcefe4',
                'nama' => 'Dokumen Realisasi Keong p',
                'file' => '1371018021-Dokumen Realisasi Keong p-Memberi tanda pada kolam yang bebas maupun yang terdeteksi keong schistosomiasis-1.pdf',
                'no_urut' => 1,
                'created_at' => '2022-09-06 14:50:49',
                'updated_at' => '2022-09-06 14:50:49',
            ),
            2 => 
            array (
                'id' => '20925c30-49b9-47d6-a37e-7144a942d033',
                'realisasi_id' => '68d5db04-70e8-4e19-ae4e-a8f3e1e452a0',
                'nama' => 'Dokumen Realisasi Keong 1 p',
                'file' => '524591169-Dokumen Realisasi Keong 1 p-Pembersihan Habitat Keong-1.pdf',
                'no_urut' => 1,
                'created_at' => '2022-08-17 20:49:04',
                'updated_at' => '2022-08-17 20:49:04',
            ),
            3 => 
            array (
                'id' => '28d2f2b2-1860-4853-a942-1471b2341677',
                'realisasi_id' => '442fd3ce-eef0-442b-b173-008237449104',
                'nama' => 'Dokumen Realisasi Keong 2 r',
                'file' => '1508051539-Dokumen Realisasi Keong 2 r-Pembersihan Habitat Keong-2.pdf',
                'no_urut' => 2,
                'created_at' => '2022-11-28 20:51:01',
                'updated_at' => '2022-11-28 20:51:01',
            ),
            4 => 
            array (
                'id' => '2a8b6427-f6d0-4f22-a11c-33745e18e3f4',
                'realisasi_id' => 'cfaef6bf-d139-46d2-97f8-6eb83af04d0c',
                'nama' => 'Dokumen Realisasi Keong r',
                'file' => '802723135-Dokumen Realisasi Keong r-Memberi tanda pada kolam yang bebas maupun yang terdeteksi keong schistosomiasis-1.pdf',
                'no_urut' => 1,
                'created_at' => '2022-09-06 14:48:03',
                'updated_at' => '2022-09-06 14:48:03',
            ),
            5 => 
            array (
                'id' => '2b27380f-8e1a-4ff5-9e73-58115957f2b4',
                'realisasi_id' => '7852b2d9-080d-474f-b0a9-1560c07be671',
                'nama' => 'Dokumen Realisasi Keong r',
                'file' => '2029553778-Dokumen Realisasi Keong r-Mengecek sampel keong pada setiap kolam-1.pdf',
                'no_urut' => 1,
                'created_at' => '2022-09-06 15:12:29',
                'updated_at' => '2022-09-06 15:12:29',
            ),
            6 => 
            array (
                'id' => '2e14583b-566f-46db-94c3-cfb66c7ddaf3',
                'realisasi_id' => 'fec555f8-3cbe-48b7-a597-ec84c0838b1a',
                'nama' => 'Dokumen Realisasi Keong b',
                'file' => '1681220332-Dokumen Realisasi Keong b-Mengecek sampel keong pada setiap kolam-1.pdf',
                'no_urut' => 1,
                'created_at' => '2022-09-06 15:11:37',
                'updated_at' => '2022-09-06 15:11:37',
            ),
            7 => 
            array (
                'id' => '3011544a-494d-4d49-a935-7586b60b9df3',
                'realisasi_id' => 'ed878111-330c-4d44-8203-e90884610475',
                'nama' => 'Dokumen Realisasi b',
                'file' => '959651161-Dokumen Realisasi b-Dinas Kebersihan-1.pdf',
                'no_urut' => 1,
                'created_at' => '2022-09-22 21:18:03',
                'updated_at' => '2022-09-22 21:18:03',
            ),
            8 => 
            array (
                'id' => '4a8b9532-c8d8-428e-a570-8d2955d30e14',
                'realisasi_id' => '19286c64-4753-40d6-aa86-e8d3eb404d68',
                'nama' => 'Dokumen Realisasi b',
                'file' => '1317075586-Dokumen Realisasi b-Dinas Kebersihan-1.pdf',
                'no_urut' => 1,
                'created_at' => '2022-09-22 22:18:35',
                'updated_at' => '2022-09-22 22:18:35',
            ),
            9 => 
            array (
                'id' => '54e432fe-eafa-4c45-858f-020e82c985c6',
                'realisasi_id' => '547c6f6f-827a-4c9f-a720-cb119da8e0e2',
                'nama' => 'Dokumen Realisasi Keong 1 r',
                'file' => '930295587-Dokumen Realisasi Keong 1 r-Pembersihan Habitat Keong-1.pdf',
                'no_urut' => 1,
                'created_at' => '2022-01-10 20:41:40',
                'updated_at' => '2022-01-10 20:41:40',
            ),
            10 => 
            array (
                'id' => '5cb72df2-4d9a-494a-a517-0f0bd8abf388',
                'realisasi_id' => '66283c96-ead5-40fd-a506-1d746c08d6b9',
                'nama' => 'Dokumen Realisasi Keong 1 r',
                'file' => '1792300995-Dokumen Realisasi Keong 1 r-Pembersihan Habitat Keong-1.pdf',
                'no_urut' => 1,
                'created_at' => '2022-06-03 20:46:17',
                'updated_at' => '2022-06-03 20:46:17',
            ),
            11 => 
            array (
                'id' => '6d211fce-6cf3-47b6-bded-89c4231626f3',
                'realisasi_id' => '9392b3cc-537c-49b3-bc91-d320a17d703f',
                'nama' => 'Dokumen Realisasi Keong r',
                'file' => '1303543068-Dokumen Realisasi Keong r-Mengindentifikasi Kolam terdeteksi schistosomiasis-1.pdf',
                'no_urut' => 1,
                'created_at' => '2022-08-28 13:11:56',
                'updated_at' => '2022-08-28 13:11:56',
            ),
            12 => 
            array (
                'id' => '7b602c25-b073-4129-befa-214837dded05',
                'realisasi_id' => '3a729127-7f21-4cf8-88ba-10de0d67cdb6',
                'nama' => 'Dokumen Realisasi Keong 2 g',
                'file' => '828425536-Dokumen Realisasi Keong 2 g-Pembersihan Habitat Keong-2.pdf',
                'no_urut' => 2,
                'created_at' => '2022-04-23 20:44:20',
                'updated_at' => '2022-04-23 20:44:20',
            ),
            13 => 
            array (
                'id' => '80f0403e-b84b-48ff-b029-5911ce0039c4',
                'realisasi_id' => '547c6f6f-827a-4c9f-a720-cb119da8e0e2',
                'nama' => 'Dokumen Realisasi Keong 2 b',
                'file' => '1751385293-Dokumen Realisasi Keong 2 b-Pembersihan Habitat Keong-2.pdf',
                'no_urut' => 2,
                'created_at' => '2022-01-10 20:41:40',
                'updated_at' => '2022-01-10 20:41:40',
            ),
            14 => 
            array (
                'id' => '8b4f6109-cbca-4ae0-8f62-b80d1e8f486d',
                'realisasi_id' => '4ed15420-572a-44da-8770-0a4f62df78da',
                'nama' => 'Dokumen Realisasi b',
                'file' => '859656484-Dokumen Realisasi rb-Dinas Kebersihan-1.pdf',
                'no_urut' => 1,
                'created_at' => '2022-09-22 15:28:42',
                'updated_at' => '2022-09-22 16:18:28',
            ),
            15 => 
            array (
                'id' => 'bbbd3ab3-0cc7-4119-80db-1241930fe3b6',
                'realisasi_id' => '3a729127-7f21-4cf8-88ba-10de0d67cdb6',
                'nama' => 'Dokumen Realisasi Keong 1 p',
                'file' => '146105404-Dokumen Realisasi Keong 1 p-Pembersihan Habitat Keong-1.pdf',
                'no_urut' => 1,
                'created_at' => '2022-04-23 20:44:20',
                'updated_at' => '2022-04-23 20:44:20',
            ),
            16 => 
            array (
                'id' => 'bed11238-7b45-406b-9275-6e7871289370',
                'realisasi_id' => 'c3af84bf-2636-4040-a4b9-bed261c3e6f8',
                'nama' => 'Dokumen Realisasi r',
                'file' => '167920396-Dokumen Realisasi r-Dinas Kebersihan-1.pdf',
                'no_urut' => 1,
                'created_at' => '2022-09-23 00:01:35',
                'updated_at' => '2022-09-23 00:01:35',
            ),
            17 => 
            array (
                'id' => 'd0a32d62-14d1-4eeb-b49b-108076761b1b',
                'realisasi_id' => '442fd3ce-eef0-442b-b173-008237449104',
                'nama' => 'Dokumen Realisasi Keong 1 g',
                'file' => '270262400-Dokumen Realisasi Keong 1 g-Pembersihan Habitat Keong-1.pdf',
                'no_urut' => 1,
                'created_at' => '2022-11-28 20:51:01',
                'updated_at' => '2022-11-28 20:51:01',
            ),
            18 => 
            array (
                'id' => 'e6233c94-e44f-4f67-8c86-f8b31b2590e8',
                'realisasi_id' => '34ec0294-d921-4cd3-99fb-13dbe8ef5e69',
                'nama' => 'Dokumen Realisasi Keong g',
                'file' => '1807520047-Dokumen Realisasi Keong g-Mengecek sampel keong pada setiap kolam-1.pdf',
                'no_urut' => 1,
                'created_at' => '2022-09-06 15:08:41',
                'updated_at' => '2022-09-06 15:08:41',
            ),
            19 => 
            array (
                'id' => 'ed9a1e09-7a16-40de-8cd6-40861eeee1c6',
                'realisasi_id' => '2aa65cb9-1967-4814-9af8-a6d3bd212119',
                'nama' => 'Dokumen Realisasi b',
                'file' => '105834677-Dokumen Realisasi b-Dinas Kebersihan-1.pdf',
                'no_urut' => 1,
                'created_at' => '2022-09-23 00:05:54',
                'updated_at' => '2022-09-23 00:05:54',
            ),
            20 => 
            array (
                'id' => 'ef31450f-49d7-4542-88aa-88837accf07c',
                'realisasi_id' => 'e354d884-eb7a-4b72-a03b-2676088c398a',
                'nama' => 'Dokumen Realisasi g',
                'file' => '637235435-Dokumen Realisasi g-Dinas Kebersihan-1.pdf',
                'no_urut' => 1,
                'created_at' => '2022-09-22 21:37:55',
                'updated_at' => '2022-09-22 21:37:55',
            ),
            21 => 
            array (
                'id' => 'feeca167-d819-4fc4-92ea-33cd5722c5e2',
                'realisasi_id' => 'f6b09084-f1bf-453d-bc36-ece196f46782',
                'nama' => 'Dokumen Realisasi Keong p',
                'file' => '113472785-Dokumen Realisasi Keong p-Mengindentifikasi Kolam terdeteksi schistosomiasis-1.pdf',
                'no_urut' => 1,
                'created_at' => '2022-08-28 13:13:51',
                'updated_at' => '2022-08-28 13:13:51',
            ),
        ));
        
        
    }
}