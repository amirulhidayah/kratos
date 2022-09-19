<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class LokasiPerencanaanKeongTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('lokasi_perencanaan_keong')->delete();
        
        \DB::table('lokasi_perencanaan_keong')->insert(array (
            0 => 
            array (
                'id' => '095b1436-f222-42db-9d91-09bb8394f959',
                'perencanaan_keong_id' => '76628878-af22-4ae8-be21-eaa420265986',
                'realisasi_keong_id' => 'f6b09084-f1bf-453d-bc36-ece196f46782',
                'lokasi_keong_id' => '9b31ab4a-a620-4116-98da-b2aab892bdf5',
                'status' => 1,
                'created_at' => '2022-08-28 12:57:31',
                'updated_at' => '2022-08-28 13:14:04',
            ),
            1 => 
            array (
                'id' => '0f024b67-0d2c-4b1b-843e-4bb3ac23c0c8',
                'perencanaan_keong_id' => '66417cb6-4595-439d-8e67-87f292255a3c',
                'realisasi_keong_id' => NULL,
                'lokasi_keong_id' => '9b31ab4a-a620-4116-98da-b2aab892bdf5',
                'status' => 0,
                'created_at' => '2022-09-06 11:32:51',
                'updated_at' => '2022-09-06 11:32:51',
            ),
            2 => 
            array (
                'id' => '1107b436-e379-414b-935e-f1b5db37a11b',
                'perencanaan_keong_id' => '5fa15403-b90f-4c7f-8c77-5076bc262028',
                'realisasi_keong_id' => '34ec0294-d921-4cd3-99fb-13dbe8ef5e69',
                'lokasi_keong_id' => '30c5a0f7-3063-40df-ab06-2854b758c9c4',
                'status' => 1,
                'created_at' => '2022-09-06 11:21:05',
                'updated_at' => '2022-09-06 15:10:44',
            ),
            3 => 
            array (
                'id' => '142fc526-5d73-42a1-9556-81493bf642e5',
                'perencanaan_keong_id' => '66417cb6-4595-439d-8e67-87f292255a3c',
                'realisasi_keong_id' => 'cc9b49d7-8cfc-4527-ac2c-2ade8adcefe4',
                'lokasi_keong_id' => 'db000a30-4d80-4d9b-bf79-09169284f620',
                'status' => 1,
                'created_at' => '2022-09-06 11:32:51',
                'updated_at' => '2022-09-06 14:51:09',
            ),
            4 => 
            array (
                'id' => '188c5883-bc4c-461a-8a07-5172f62260f6',
                'perencanaan_keong_id' => '5fa15403-b90f-4c7f-8c77-5076bc262028',
                'realisasi_keong_id' => 'fec555f8-3cbe-48b7-a597-ec84c0838b1a',
                'lokasi_keong_id' => '251a674d-3ff8-4dfa-94ca-baad11480f75',
                'status' => 1,
                'created_at' => '2022-09-06 11:21:05',
                'updated_at' => '2022-09-06 15:11:46',
            ),
            5 => 
            array (
                'id' => '1f966cc7-7c6c-4bed-9bae-5e7955e4e0dd',
                'perencanaan_keong_id' => '5fa15403-b90f-4c7f-8c77-5076bc262028',
                'realisasi_keong_id' => '34ec0294-d921-4cd3-99fb-13dbe8ef5e69',
                'lokasi_keong_id' => 'e6457d30-71c3-4cd7-84ba-957c6f9694d0',
                'status' => 1,
                'created_at' => '2022-09-06 11:21:05',
                'updated_at' => '2022-09-06 15:10:44',
            ),
            6 => 
            array (
                'id' => '32b6457d-47df-4ca4-b2e0-59e250636783',
                'perencanaan_keong_id' => '5fa15403-b90f-4c7f-8c77-5076bc262028',
                'realisasi_keong_id' => 'fec555f8-3cbe-48b7-a597-ec84c0838b1a',
                'lokasi_keong_id' => 'd788232e-d308-4949-8da6-2e3242040334',
                'status' => 1,
                'created_at' => '2022-09-06 11:21:05',
                'updated_at' => '2022-09-06 15:11:46',
            ),
            7 => 
            array (
                'id' => '35a3d896-3a39-4ed0-a37f-7faee69b6276',
                'perencanaan_keong_id' => '66417cb6-4595-439d-8e67-87f292255a3c',
                'realisasi_keong_id' => 'cc9b49d7-8cfc-4527-ac2c-2ade8adcefe4',
                'lokasi_keong_id' => '27a501de-59e6-4019-9a16-c3593520a5c1',
                'status' => 1,
                'created_at' => '2022-09-06 11:32:51',
                'updated_at' => '2022-09-06 14:51:09',
            ),
            8 => 
            array (
                'id' => '36d4b68e-9fc7-4903-a573-59669ce2da94',
                'perencanaan_keong_id' => '5fa15403-b90f-4c7f-8c77-5076bc262028',
                'realisasi_keong_id' => 'fec555f8-3cbe-48b7-a597-ec84c0838b1a',
                'lokasi_keong_id' => '40b9add6-a118-49d4-9e63-82c9539cb7bf',
                'status' => 1,
                'created_at' => '2022-09-06 11:21:05',
                'updated_at' => '2022-09-06 15:11:46',
            ),
            9 => 
            array (
                'id' => '37157b1e-eef2-4b8d-a7c7-98a79c492662',
                'perencanaan_keong_id' => '66417cb6-4595-439d-8e67-87f292255a3c',
                'realisasi_keong_id' => 'cc9b49d7-8cfc-4527-ac2c-2ade8adcefe4',
                'lokasi_keong_id' => '61089d02-2504-4ce2-8f75-62da30a5125d',
                'status' => 1,
                'created_at' => '2022-09-06 11:32:51',
                'updated_at' => '2022-09-06 14:51:09',
            ),
            10 => 
            array (
                'id' => '3798c9a1-256d-4c7d-856f-45affe65d770',
                'perencanaan_keong_id' => '5fa15403-b90f-4c7f-8c77-5076bc262028',
                'realisasi_keong_id' => '7852b2d9-080d-474f-b0a9-1560c07be671',
                'lokasi_keong_id' => '13dd96ef-c203-4f96-9a1a-34aecf9d3267',
                'status' => 1,
                'created_at' => '2022-09-06 11:21:05',
                'updated_at' => '2022-09-06 15:12:45',
            ),
            11 => 
            array (
                'id' => '38f4330f-5008-489c-a4b5-dec9af6a3890',
                'perencanaan_keong_id' => '66417cb6-4595-439d-8e67-87f292255a3c',
                'realisasi_keong_id' => NULL,
                'lokasi_keong_id' => '0eaff97e-3100-4d1c-957c-04a3f10b22dc',
                'status' => 0,
                'created_at' => '2022-09-06 11:32:51',
                'updated_at' => '2022-09-06 11:32:51',
            ),
            12 => 
            array (
                'id' => '390c91fd-6aa0-4b68-93c7-bda094a4d59c',
                'perencanaan_keong_id' => '66417cb6-4595-439d-8e67-87f292255a3c',
                'realisasi_keong_id' => 'cfaef6bf-d139-46d2-97f8-6eb83af04d0c',
                'lokasi_keong_id' => 'd566c184-4383-4400-b0cc-22df4d5c6995',
                'status' => 1,
                'created_at' => '2022-09-06 11:32:51',
                'updated_at' => '2022-09-06 14:48:43',
            ),
            13 => 
            array (
                'id' => '3b714fd4-b099-4f85-b6ee-bd3288df6027',
                'perencanaan_keong_id' => '66417cb6-4595-439d-8e67-87f292255a3c',
                'realisasi_keong_id' => 'cc9b49d7-8cfc-4527-ac2c-2ade8adcefe4',
                'lokasi_keong_id' => 'd79a69d1-817e-4854-8b84-3277edcc6824',
                'status' => 1,
                'created_at' => '2022-09-06 11:32:51',
                'updated_at' => '2022-09-06 14:51:09',
            ),
            14 => 
            array (
                'id' => '475d54c7-c6f9-430c-b643-192e86db6f3a',
                'perencanaan_keong_id' => '5fa15403-b90f-4c7f-8c77-5076bc262028',
                'realisasi_keong_id' => '7852b2d9-080d-474f-b0a9-1560c07be671',
                'lokasi_keong_id' => 'd438f811-629f-4b46-bac2-6b1cae027b30',
                'status' => 1,
                'created_at' => '2022-09-06 11:21:05',
                'updated_at' => '2022-09-06 15:12:45',
            ),
            15 => 
            array (
                'id' => '4a2b21a7-4b25-482d-9089-563cc9a967f9',
                'perencanaan_keong_id' => '66417cb6-4595-439d-8e67-87f292255a3c',
                'realisasi_keong_id' => 'cfaef6bf-d139-46d2-97f8-6eb83af04d0c',
                'lokasi_keong_id' => 'b93e6fd5-d1c6-4d76-89b8-78d924fbcdd4',
                'status' => 1,
                'created_at' => '2022-09-06 11:32:51',
                'updated_at' => '2022-09-06 14:48:43',
            ),
            16 => 
            array (
                'id' => '4c65724f-c039-497b-9843-fd9fe378cf99',
                'perencanaan_keong_id' => '66417cb6-4595-439d-8e67-87f292255a3c',
                'realisasi_keong_id' => 'cc9b49d7-8cfc-4527-ac2c-2ade8adcefe4',
                'lokasi_keong_id' => '251a674d-3ff8-4dfa-94ca-baad11480f75',
                'status' => 1,
                'created_at' => '2022-09-06 11:32:51',
                'updated_at' => '2022-09-06 14:51:09',
            ),
            17 => 
            array (
                'id' => '4cbf5d9f-96ef-4718-bc7f-fcef6b6c6fa2',
                'perencanaan_keong_id' => '76628878-af22-4ae8-be21-eaa420265986',
                'realisasi_keong_id' => '9392b3cc-537c-49b3-bc91-d320a17d703f',
                'lokasi_keong_id' => '857118ba-5d3c-430d-bd1a-5046d69338e1',
                'status' => 1,
                'created_at' => '2022-08-28 12:57:31',
                'updated_at' => '2022-08-28 13:12:50',
            ),
            18 => 
            array (
                'id' => '4f27cf3d-3434-4b65-bf6a-0c31fc0a6ad6',
                'perencanaan_keong_id' => '5fa15403-b90f-4c7f-8c77-5076bc262028',
                'realisasi_keong_id' => '7852b2d9-080d-474f-b0a9-1560c07be671',
                'lokasi_keong_id' => 'c80914ee-e075-4dbf-9b7b-4af0ecb6402b',
                'status' => 1,
                'created_at' => '2022-09-06 11:21:05',
                'updated_at' => '2022-09-06 15:12:45',
            ),
            19 => 
            array (
                'id' => '5207a4ca-9669-4220-ae6e-bf89508ff8b2',
                'perencanaan_keong_id' => '66417cb6-4595-439d-8e67-87f292255a3c',
                'realisasi_keong_id' => 'cc9b49d7-8cfc-4527-ac2c-2ade8adcefe4',
                'lokasi_keong_id' => '21469d9c-5458-4dde-b453-06ec25532af5',
                'status' => 1,
                'created_at' => '2022-09-06 11:32:51',
                'updated_at' => '2022-09-06 14:51:09',
            ),
            20 => 
            array (
                'id' => '5b739206-e633-4a3b-b5e1-c056bfdcd0bb',
                'perencanaan_keong_id' => '5fa15403-b90f-4c7f-8c77-5076bc262028',
                'realisasi_keong_id' => '34ec0294-d921-4cd3-99fb-13dbe8ef5e69',
                'lokasi_keong_id' => 'b93e6fd5-d1c6-4d76-89b8-78d924fbcdd4',
                'status' => 1,
                'created_at' => '2022-09-06 11:21:05',
                'updated_at' => '2022-09-06 15:10:44',
            ),
            21 => 
            array (
                'id' => '5bb026d3-066d-4f24-bca4-cc198a09b066',
                'perencanaan_keong_id' => '5fa15403-b90f-4c7f-8c77-5076bc262028',
                'realisasi_keong_id' => '7852b2d9-080d-474f-b0a9-1560c07be671',
                'lokasi_keong_id' => 'd2e9f22c-dca5-42da-8abf-762aa597eb20',
                'status' => 1,
                'created_at' => '2022-09-06 11:21:05',
                'updated_at' => '2022-09-06 15:12:45',
            ),
            22 => 
            array (
                'id' => '5c3d4ef5-307d-4454-a094-900cb8222cca',
                'perencanaan_keong_id' => '66417cb6-4595-439d-8e67-87f292255a3c',
                'realisasi_keong_id' => NULL,
                'lokasi_keong_id' => 'd2e9f22c-dca5-42da-8abf-762aa597eb20',
                'status' => 0,
                'created_at' => '2022-09-06 11:32:51',
                'updated_at' => '2022-09-06 11:32:51',
            ),
            23 => 
            array (
                'id' => '66237716-8425-4dc3-981f-ecc37715db95',
                'perencanaan_keong_id' => '76628878-af22-4ae8-be21-eaa420265986',
                'realisasi_keong_id' => 'f6b09084-f1bf-453d-bc36-ece196f46782',
                'lokasi_keong_id' => '65454a3b-8bc6-4ec9-9c5c-c23aa2553e3e',
                'status' => 1,
                'created_at' => '2022-08-28 12:57:31',
                'updated_at' => '2022-08-28 13:14:04',
            ),
            24 => 
            array (
                'id' => '741c97fd-209d-403d-ab40-8940cb9143b5',
                'perencanaan_keong_id' => '66417cb6-4595-439d-8e67-87f292255a3c',
                'realisasi_keong_id' => 'cfaef6bf-d139-46d2-97f8-6eb83af04d0c',
                'lokasi_keong_id' => '30c5a0f7-3063-40df-ab06-2854b758c9c4',
                'status' => 1,
                'created_at' => '2022-09-06 11:32:51',
                'updated_at' => '2022-09-06 14:48:43',
            ),
            25 => 
            array (
                'id' => '747e8600-b9b0-49b9-85f9-e2b91af86958',
                'perencanaan_keong_id' => '66417cb6-4595-439d-8e67-87f292255a3c',
                'realisasi_keong_id' => 'cfaef6bf-d139-46d2-97f8-6eb83af04d0c',
                'lokasi_keong_id' => '136ac647-012f-4af7-86b5-4cf209e22c2c',
                'status' => 1,
                'created_at' => '2022-09-06 11:32:51',
                'updated_at' => '2022-09-06 14:48:43',
            ),
            26 => 
            array (
                'id' => '7af9a4ab-d979-4404-94c4-064df2ecd94a',
                'perencanaan_keong_id' => '76628878-af22-4ae8-be21-eaa420265986',
                'realisasi_keong_id' => 'f6b09084-f1bf-453d-bc36-ece196f46782',
                'lokasi_keong_id' => '9ce72d2c-2a53-4368-ae9f-7abbf77230e3',
                'status' => 1,
                'created_at' => '2022-08-28 12:57:31',
                'updated_at' => '2022-08-28 13:14:04',
            ),
            27 => 
            array (
                'id' => '800814d1-bfdc-43d2-86dc-5fc74dd4fd27',
                'perencanaan_keong_id' => '5fa15403-b90f-4c7f-8c77-5076bc262028',
                'realisasi_keong_id' => 'fec555f8-3cbe-48b7-a597-ec84c0838b1a',
                'lokasi_keong_id' => '61089d02-2504-4ce2-8f75-62da30a5125d',
                'status' => 1,
                'created_at' => '2022-09-06 11:21:05',
                'updated_at' => '2022-09-06 15:11:46',
            ),
            28 => 
            array (
                'id' => '87d6b0d0-5ae6-4f10-ab70-beaad47065d3',
                'perencanaan_keong_id' => '76628878-af22-4ae8-be21-eaa420265986',
                'realisasi_keong_id' => '9392b3cc-537c-49b3-bc91-d320a17d703f',
                'lokasi_keong_id' => 'b93e6fd5-d1c6-4d76-89b8-78d924fbcdd4',
                'status' => 1,
                'created_at' => '2022-08-28 12:57:31',
                'updated_at' => '2022-08-28 13:12:50',
            ),
            29 => 
            array (
                'id' => '993d9888-cb4b-49a4-bff0-39bf508a41ab',
                'perencanaan_keong_id' => '66417cb6-4595-439d-8e67-87f292255a3c',
                'realisasi_keong_id' => NULL,
                'lokasi_keong_id' => '40b9add6-a118-49d4-9e63-82c9539cb7bf',
                'status' => 0,
                'created_at' => '2022-09-06 11:32:51',
                'updated_at' => '2022-09-06 11:32:51',
            ),
            30 => 
            array (
                'id' => '9e43e749-a5ac-4ccb-8a8d-ee0040fd0610',
                'perencanaan_keong_id' => '76628878-af22-4ae8-be21-eaa420265986',
                'realisasi_keong_id' => 'f6b09084-f1bf-453d-bc36-ece196f46782',
                'lokasi_keong_id' => 'c7f3bc85-717e-4daa-b71d-fcbcc5ff7463',
                'status' => 1,
                'created_at' => '2022-08-28 12:57:31',
                'updated_at' => '2022-08-28 13:14:04',
            ),
            31 => 
            array (
                'id' => 'a4a1fc8a-3277-4ccd-b228-9a74b8856923',
                'perencanaan_keong_id' => '76628878-af22-4ae8-be21-eaa420265982',
                'realisasi_keong_id' => NULL,
                'lokasi_keong_id' => '0352420a-8bb8-41c1-af72-9728d2b8c140',
                'status' => 0,
                'created_at' => '2020-08-10 10:20:00',
                'updated_at' => NULL,
            ),
            32 => 
            array (
                'id' => 'a4a1fc8a-3277-4ccd-b228-9a74b8856924',
                'perencanaan_keong_id' => '76628878-af22-4ae8-be21-eaa420265982',
                'realisasi_keong_id' => NULL,
                'lokasi_keong_id' => '0eaff97e-3100-4d1c-957c-04a3f10b22dc',
                'status' => 0,
                'created_at' => '2020-08-10 10:20:00',
                'updated_at' => NULL,
            ),
            33 => 
            array (
                'id' => 'a4a1fc8a-3277-4ccd-b228-9a74b8856925',
                'perencanaan_keong_id' => '76628878-af22-4ae8-be21-eaa420265982',
                'realisasi_keong_id' => NULL,
                'lokasi_keong_id' => '136ac647-012f-4af7-86b5-4cf209e22c2c',
                'status' => 0,
                'created_at' => '2020-08-10 10:20:00',
                'updated_at' => NULL,
            ),
            34 => 
            array (
                'id' => 'a4a1fc8a-3277-4ccd-b228-9a74b8856926',
                'perencanaan_keong_id' => '76628878-af22-4ae8-be21-eaa420265982',
                'realisasi_keong_id' => NULL,
                'lokasi_keong_id' => '13dd96ef-c203-4f96-9a1a-34aecf9d3267',
                'status' => 0,
                'created_at' => '2020-08-10 10:20:00',
                'updated_at' => NULL,
            ),
            35 => 
            array (
                'id' => 'a4a1fc8a-3277-4ccd-b228-9a74b8856927',
                'perencanaan_keong_id' => '76628878-af22-4ae8-be21-eaa420265982',
                'realisasi_keong_id' => NULL,
                'lokasi_keong_id' => '1aa50c9f-1883-4775-b851-e7a07d78fc59',
                'status' => 0,
                'created_at' => '2020-08-10 10:20:00',
                'updated_at' => NULL,
            ),
            36 => 
            array (
                'id' => 'a4a1fc8a-3277-4ccd-b228-9a74b8856928',
                'perencanaan_keong_id' => '76628878-af22-4ae8-be21-eaa420265982',
                'realisasi_keong_id' => NULL,
                'lokasi_keong_id' => '1d803d15-672a-4bae-8e47-fab6c2a93e4f',
                'status' => 0,
                'created_at' => '2020-08-10 10:20:00',
                'updated_at' => NULL,
            ),
            37 => 
            array (
                'id' => 'a4a1fc8a-3277-4ccd-b228-9a74b8856929',
                'perencanaan_keong_id' => '76628878-af22-4ae8-be21-eaa420265982',
                'realisasi_keong_id' => NULL,
                'lokasi_keong_id' => '1dafdf99-cb60-4f16-858b-6af966f43084',
                'status' => 0,
                'created_at' => '2020-08-10 10:20:00',
                'updated_at' => NULL,
            ),
            38 => 
            array (
                'id' => 'a4a1fc8a-3277-4ccd-b228-9a74b8856931',
                'perencanaan_keong_id' => '76628878-af22-4ae8-be21-eaa420265983',
                'realisasi_keong_id' => NULL,
                'lokasi_keong_id' => '21469d9c-5458-4dde-b453-06ec25532af5',
                'status' => 0,
                'created_at' => '2020-08-10 10:20:00',
                'updated_at' => NULL,
            ),
            39 => 
            array (
                'id' => 'a4a1fc8a-3277-4ccd-b228-9a74b8856932',
                'perencanaan_keong_id' => '76628878-af22-4ae8-be21-eaa420265983',
                'realisasi_keong_id' => NULL,
                'lokasi_keong_id' => '251a674d-3ff8-4dfa-94ca-baad11480f75',
                'status' => 0,
                'created_at' => '2020-08-10 10:20:00',
                'updated_at' => NULL,
            ),
            40 => 
            array (
                'id' => 'a4a1fc8a-3277-4ccd-b228-9a74b8856933',
                'perencanaan_keong_id' => '76628878-af22-4ae8-be21-eaa420265983',
                'realisasi_keong_id' => NULL,
                'lokasi_keong_id' => '27a501de-59e6-4019-9a16-c3593520a5c1',
                'status' => 0,
                'created_at' => '2020-08-10 10:20:00',
                'updated_at' => NULL,
            ),
            41 => 
            array (
                'id' => 'a4a1fc8a-3277-4ccd-b228-9a74b8856934',
                'perencanaan_keong_id' => '76628878-af22-4ae8-be21-eaa420265983',
                'realisasi_keong_id' => NULL,
                'lokasi_keong_id' => '30c5a0f7-3063-40df-ab06-2854b758c9c4',
                'status' => 0,
                'created_at' => '2020-08-10 10:20:00',
                'updated_at' => NULL,
            ),
            42 => 
            array (
                'id' => 'a4a1fc8a-3277-4ccd-b228-9a74b8856935',
                'perencanaan_keong_id' => '76628878-af22-4ae8-be21-eaa420265983',
                'realisasi_keong_id' => NULL,
                'lokasi_keong_id' => '40b9add6-a118-49d4-9e63-82c9539cb7bf',
                'status' => 0,
                'created_at' => '2020-08-10 10:20:00',
                'updated_at' => NULL,
            ),
            43 => 
            array (
                'id' => 'a4a1fc8a-3277-4ccd-b228-9a74b8856936',
                'perencanaan_keong_id' => '76628878-af22-4ae8-be21-eaa420265984',
                'realisasi_keong_id' => '3a729127-7f21-4cf8-88ba-10de0d67cdb6',
                'lokasi_keong_id' => '61089d02-2504-4ce2-8f75-62da30a5125d',
                'status' => 1,
                'created_at' => '2020-08-10 10:20:00',
                'updated_at' => '2022-04-23 20:44:40',
            ),
            44 => 
            array (
                'id' => 'a4a1fc8a-3277-4ccd-b228-9a74b8856937',
                'perencanaan_keong_id' => '76628878-af22-4ae8-be21-eaa420265984',
                'realisasi_keong_id' => '68d5db04-70e8-4e19-ae4e-a8f3e1e452a0',
                'lokasi_keong_id' => '65454a3b-8bc6-4ec9-9c5c-c23aa2553e3e',
                'status' => 1,
                'created_at' => '2020-08-10 10:20:00',
                'updated_at' => '2022-08-17 20:49:19',
            ),
            45 => 
            array (
                'id' => 'a4a1fc8a-3277-4ccd-b228-9a74b8856938',
                'perencanaan_keong_id' => '76628878-af22-4ae8-be21-eaa420265984',
                'realisasi_keong_id' => '66283c96-ead5-40fd-a506-1d746c08d6b9',
                'lokasi_keong_id' => '6c8bc624-6552-4112-aa54-b85293575969',
                'status' => 1,
                'created_at' => '2020-08-10 10:20:00',
                'updated_at' => '2022-06-03 20:46:45',
            ),
            46 => 
            array (
                'id' => 'a4a1fc8a-3277-4ccd-b228-9a74b8856939',
                'perencanaan_keong_id' => '76628878-af22-4ae8-be21-eaa420265984',
                'realisasi_keong_id' => '547c6f6f-827a-4c9f-a720-cb119da8e0e2',
                'lokasi_keong_id' => '857118ba-5d3c-430d-bd1a-5046d69338e1',
                'status' => 1,
                'created_at' => '2020-08-10 10:20:00',
                'updated_at' => '2022-01-10 20:41:53',
            ),
            47 => 
            array (
                'id' => 'a4a1fc8a-3277-4ccd-b228-9a74b8856941',
                'perencanaan_keong_id' => '76628878-af22-4ae8-be21-eaa420265984',
                'realisasi_keong_id' => NULL,
                'lokasi_keong_id' => '9b31ab4a-a620-4116-98da-b2aab892bdf5',
                'status' => 0,
                'created_at' => '2020-08-10 10:20:00',
                'updated_at' => NULL,
            ),
            48 => 
            array (
                'id' => 'a4a1fc8a-3277-4ccd-b228-9a74b8856942',
                'perencanaan_keong_id' => '76628878-af22-4ae8-be21-eaa420265984',
                'realisasi_keong_id' => '442fd3ce-eef0-442b-b173-008237449104',
                'lokasi_keong_id' => '9ce72d2c-2a53-4368-ae9f-7abbf77230e3',
                'status' => 0,
                'created_at' => '2020-08-10 10:20:00',
                'updated_at' => '2022-11-28 20:51:01',
            ),
            49 => 
            array (
                'id' => 'a4a1fc8a-3277-4ccd-b228-9a74b8856943',
                'perencanaan_keong_id' => '76628878-af22-4ae8-be21-eaa420265984',
                'realisasi_keong_id' => '547c6f6f-827a-4c9f-a720-cb119da8e0e2',
                'lokasi_keong_id' => 'b93e6fd5-d1c6-4d76-89b8-78d924fbcdd4',
                'status' => 1,
                'created_at' => '2020-08-10 10:20:00',
                'updated_at' => '2022-01-10 20:41:53',
            ),
            50 => 
            array (
                'id' => 'a4a1fc8a-3277-4ccd-b228-9a74b8856944',
                'perencanaan_keong_id' => '76628878-af22-4ae8-be21-eaa420265985',
                'realisasi_keong_id' => NULL,
                'lokasi_keong_id' => 'c7f3bc85-717e-4daa-b71d-fcbcc5ff7463',
                'status' => 0,
                'created_at' => '2020-08-10 10:20:00',
                'updated_at' => NULL,
            ),
            51 => 
            array (
                'id' => 'a4a1fc8a-3277-4ccd-b228-9a74b8856945',
                'perencanaan_keong_id' => '76628878-af22-4ae8-be21-eaa420265985',
                'realisasi_keong_id' => NULL,
                'lokasi_keong_id' => 'c80914ee-e075-4dbf-9b7b-4af0ecb6402b',
                'status' => 0,
                'created_at' => '2020-08-10 10:20:00',
                'updated_at' => NULL,
            ),
            52 => 
            array (
                'id' => 'a4a1fc8a-3277-4ccd-b228-9a74b8856946',
                'perencanaan_keong_id' => '76628878-af22-4ae8-be21-eaa420265985',
                'realisasi_keong_id' => NULL,
                'lokasi_keong_id' => 'cd6321e9-f35d-4a35-b6e6-fd5a2b7ebf86',
                'status' => 0,
                'created_at' => '2020-08-10 10:20:00',
                'updated_at' => NULL,
            ),
            53 => 
            array (
                'id' => 'a4a1fc8a-3277-4ccd-b228-9a74b8856947',
                'perencanaan_keong_id' => '76628878-af22-4ae8-be21-eaa420265985',
                'realisasi_keong_id' => NULL,
                'lokasi_keong_id' => 'd066eb89-04de-4028-a9c2-a1377daf1440',
                'status' => 0,
                'created_at' => '2020-08-10 10:20:00',
                'updated_at' => NULL,
            ),
            54 => 
            array (
                'id' => 'a4a1fc8a-3277-4ccd-b228-9a74b8856948',
                'perencanaan_keong_id' => '76628878-af22-4ae8-be21-eaa420265985',
                'realisasi_keong_id' => NULL,
                'lokasi_keong_id' => 'd2e9f22c-dca5-42da-8abf-762aa597eb20',
                'status' => 0,
                'created_at' => '2020-08-10 10:20:00',
                'updated_at' => NULL,
            ),
            55 => 
            array (
                'id' => 'a4a1fc8a-3277-4ccd-b228-9a74b8856949',
                'perencanaan_keong_id' => '76628878-af22-4ae8-be21-eaa420265985',
                'realisasi_keong_id' => NULL,
                'lokasi_keong_id' => 'd438f811-629f-4b46-bac2-6b1cae027b30',
                'status' => 0,
                'created_at' => '2020-08-10 10:20:00',
                'updated_at' => NULL,
            ),
            56 => 
            array (
                'id' => 'a4a1fc8a-3277-4ccd-b228-9a74b8856950',
                'perencanaan_keong_id' => '76628878-af22-4ae8-be21-eaa420265985',
                'realisasi_keong_id' => NULL,
                'lokasi_keong_id' => 'd566c184-4383-4400-b0cc-22df4d5c6995',
                'status' => 0,
                'created_at' => '2020-08-10 10:20:00',
                'updated_at' => NULL,
            ),
            57 => 
            array (
                'id' => 'a4a1fc8a-3277-4ccd-b228-9a74b8856958',
                'perencanaan_keong_id' => '76628878-af22-4ae8-be21-eaa420265987',
                'realisasi_keong_id' => NULL,
                'lokasi_keong_id' => '0eaff97e-3100-4d1c-957c-04a3f10b22dc',
                'status' => 0,
                'created_at' => '2020-08-10 10:20:00',
                'updated_at' => NULL,
            ),
            58 => 
            array (
                'id' => 'a4a1fc8a-3277-4ccd-b228-9a74b8856959',
                'perencanaan_keong_id' => '76628878-af22-4ae8-be21-eaa420265987',
                'realisasi_keong_id' => NULL,
                'lokasi_keong_id' => '13dd96ef-c203-4f96-9a1a-34aecf9d3267',
                'status' => 0,
                'created_at' => '2020-08-10 10:20:00',
                'updated_at' => NULL,
            ),
            59 => 
            array (
                'id' => 'a4a1fc8a-3277-4ccd-b228-9a74b8856960',
                'perencanaan_keong_id' => '76628878-af22-4ae8-be21-eaa420265987',
                'realisasi_keong_id' => NULL,
                'lokasi_keong_id' => '1d803d15-672a-4bae-8e47-fab6c2a93e4f',
                'status' => 0,
                'created_at' => '2020-08-10 10:20:00',
                'updated_at' => NULL,
            ),
            60 => 
            array (
                'id' => 'a4a1fc8a-3277-4ccd-b228-9a74b8856961',
                'perencanaan_keong_id' => '76628878-af22-4ae8-be21-eaa420265987',
                'realisasi_keong_id' => NULL,
                'lokasi_keong_id' => '21469d9c-5458-4dde-b453-06ec25532af5',
                'status' => 0,
                'created_at' => '2020-08-10 10:20:00',
                'updated_at' => NULL,
            ),
            61 => 
            array (
                'id' => 'a4a1fc8a-3277-4ccd-b228-9a74b8856962',
                'perencanaan_keong_id' => '76628878-af22-4ae8-be21-eaa420265987',
                'realisasi_keong_id' => NULL,
                'lokasi_keong_id' => 'c80914ee-e075-4dbf-9b7b-4af0ecb6402b',
                'status' => 0,
                'created_at' => '2020-08-10 10:20:00',
                'updated_at' => NULL,
            ),
            62 => 
            array (
                'id' => 'a4a1fc8a-3277-4ccd-b228-9a74b8856963',
                'perencanaan_keong_id' => '76628878-af22-4ae8-be21-eaa420265987',
                'realisasi_keong_id' => NULL,
                'lokasi_keong_id' => '40b9add6-a118-49d4-9e63-82c9539cb7bf',
                'status' => 0,
                'created_at' => '2020-08-10 10:20:00',
                'updated_at' => NULL,
            ),
            63 => 
            array (
                'id' => 'a4a1fc8a-3277-4ccd-b228-9a74b8856964',
                'perencanaan_keong_id' => '76628878-af22-4ae8-be21-eaa420265987',
                'realisasi_keong_id' => NULL,
                'lokasi_keong_id' => '65454a3b-8bc6-4ec9-9c5c-c23aa2553e3e',
                'status' => 0,
                'created_at' => '2020-08-10 10:20:00',
                'updated_at' => NULL,
            ),
            64 => 
            array (
                'id' => 'a4a1fc8a-3277-4ccd-b228-9a74b8856965',
                'perencanaan_keong_id' => '76628878-af22-4ae8-be21-eaa420265987',
                'realisasi_keong_id' => NULL,
                'lokasi_keong_id' => '857118ba-5d3c-430d-bd1a-5046d69338e1',
                'status' => 0,
                'created_at' => '2020-08-10 10:20:00',
                'updated_at' => NULL,
            ),
            65 => 
            array (
                'id' => 'babc71d8-eb11-4937-9ac1-94db3542d94d',
                'perencanaan_keong_id' => '66417cb6-4595-439d-8e67-87f292255a3c',
                'realisasi_keong_id' => 'cfaef6bf-d139-46d2-97f8-6eb83af04d0c',
                'lokasi_keong_id' => '857118ba-5d3c-430d-bd1a-5046d69338e1',
                'status' => 1,
                'created_at' => '2022-09-06 11:32:51',
                'updated_at' => '2022-09-06 14:48:43',
            ),
            66 => 
            array (
                'id' => 'bb33ee60-7dc2-47d4-9586-95a0f3e3cfdf',
                'perencanaan_keong_id' => '5fa15403-b90f-4c7f-8c77-5076bc262028',
                'realisasi_keong_id' => '34ec0294-d921-4cd3-99fb-13dbe8ef5e69',
                'lokasi_keong_id' => 'd566c184-4383-4400-b0cc-22df4d5c6995',
                'status' => 1,
                'created_at' => '2022-09-06 11:21:05',
                'updated_at' => '2022-09-06 15:10:44',
            ),
            67 => 
            array (
                'id' => 'bb35a43a-a73c-49ec-8996-3ebf431745e2',
                'perencanaan_keong_id' => '5fa15403-b90f-4c7f-8c77-5076bc262028',
                'realisasi_keong_id' => 'fec555f8-3cbe-48b7-a597-ec84c0838b1a',
                'lokasi_keong_id' => 'd79a69d1-817e-4854-8b84-3277edcc6824',
                'status' => 1,
                'created_at' => '2022-09-06 11:21:05',
                'updated_at' => '2022-09-06 15:11:46',
            ),
            68 => 
            array (
                'id' => 'c212899d-0fda-40c4-9a3c-a9666e76dba5',
                'perencanaan_keong_id' => '76628878-af22-4ae8-be21-eaa420265986',
                'realisasi_keong_id' => 'f6b09084-f1bf-453d-bc36-ece196f46782',
                'lokasi_keong_id' => '61089d02-2504-4ce2-8f75-62da30a5125d',
                'status' => 1,
                'created_at' => '2022-08-28 12:57:31',
                'updated_at' => '2022-08-28 13:14:04',
            ),
            69 => 
            array (
                'id' => 'c719dcff-b6b0-4109-b087-f610770a46be',
                'perencanaan_keong_id' => '66417cb6-4595-439d-8e67-87f292255a3c',
                'realisasi_keong_id' => 'cc9b49d7-8cfc-4527-ac2c-2ade8adcefe4',
                'lokasi_keong_id' => 'd066eb89-04de-4028-a9c2-a1377daf1440',
                'status' => 1,
                'created_at' => '2022-09-06 11:32:51',
                'updated_at' => '2022-09-06 14:51:09',
            ),
            70 => 
            array (
                'id' => 'ca39795d-983a-4f55-a2ee-8d8571c89dc8',
                'perencanaan_keong_id' => '66417cb6-4595-439d-8e67-87f292255a3c',
                'realisasi_keong_id' => 'cfaef6bf-d139-46d2-97f8-6eb83af04d0c',
                'lokasi_keong_id' => 'e6457d30-71c3-4cd7-84ba-957c6f9694d0',
                'status' => 1,
                'created_at' => '2022-09-06 11:32:51',
                'updated_at' => '2022-09-06 14:48:43',
            ),
            71 => 
            array (
                'id' => 'ca623c2e-9064-4bc8-80e4-d3c4e81de254',
                'perencanaan_keong_id' => '5fa15403-b90f-4c7f-8c77-5076bc262028',
                'realisasi_keong_id' => '34ec0294-d921-4cd3-99fb-13dbe8ef5e69',
                'lokasi_keong_id' => '136ac647-012f-4af7-86b5-4cf209e22c2c',
                'status' => 1,
                'created_at' => '2022-09-06 11:21:05',
                'updated_at' => '2022-09-06 15:10:44',
            ),
            72 => 
            array (
                'id' => 'cf08af1c-041b-406d-8597-06703bb7a0ea',
                'perencanaan_keong_id' => '66417cb6-4595-439d-8e67-87f292255a3c',
                'realisasi_keong_id' => NULL,
                'lokasi_keong_id' => '9ce72d2c-2a53-4368-ae9f-7abbf77230e3',
                'status' => 0,
                'created_at' => '2022-09-06 11:32:51',
                'updated_at' => '2022-09-06 11:32:51',
            ),
            73 => 
            array (
                'id' => 'dae753ff-c297-495f-a857-c218fe28454e',
                'perencanaan_keong_id' => '76628878-af22-4ae8-be21-eaa420265986',
                'realisasi_keong_id' => 'f6b09084-f1bf-453d-bc36-ece196f46782',
                'lokasi_keong_id' => '6c8bc624-6552-4112-aa54-b85293575969',
                'status' => 1,
                'created_at' => '2022-08-28 12:57:31',
                'updated_at' => '2022-08-28 13:14:04',
            ),
            74 => 
            array (
                'id' => 'dd7f27eb-b808-4cc7-b965-fcd1b5962054',
                'perencanaan_keong_id' => '76628878-af22-4ae8-be21-eaa420265986',
                'realisasi_keong_id' => '9392b3cc-537c-49b3-bc91-d320a17d703f',
                'lokasi_keong_id' => '30c5a0f7-3063-40df-ab06-2854b758c9c4',
                'status' => 1,
                'created_at' => '2022-08-28 12:57:31',
                'updated_at' => '2022-08-28 13:12:50',
            ),
            75 => 
            array (
                'id' => 'eb591e77-cf84-4949-bbfd-dcbd53a9449b',
                'perencanaan_keong_id' => '76628878-af22-4ae8-be21-eaa420265986',
                'realisasi_keong_id' => '9392b3cc-537c-49b3-bc91-d320a17d703f',
                'lokasi_keong_id' => '136ac647-012f-4af7-86b5-4cf209e22c2c',
                'status' => 1,
                'created_at' => '2022-08-28 12:57:31',
                'updated_at' => '2022-08-28 13:12:50',
            ),
            76 => 
            array (
                'id' => 'f1d75d53-e5f4-4a26-85df-c8c9e4230be1',
                'perencanaan_keong_id' => '5fa15403-b90f-4c7f-8c77-5076bc262028',
                'realisasi_keong_id' => '34ec0294-d921-4cd3-99fb-13dbe8ef5e69',
                'lokasi_keong_id' => '857118ba-5d3c-430d-bd1a-5046d69338e1',
                'status' => 1,
                'created_at' => '2022-09-06 11:21:05',
                'updated_at' => '2022-09-06 15:10:44',
            ),
        ));
        
        
    }
}