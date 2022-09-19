<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class LokasiPerencanaanHewanTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('lokasi_perencanaan_hewan')->delete();
        
        \DB::table('lokasi_perencanaan_hewan')->insert(array (
            0 => 
            array (
                'id' => '0d828df2-26cf-4dd4-9cc4-4df548dec1df',
                'perencanaan_hewan_id' => '6aa72a31-194d-4363-a282-084f5e6362d3',
                'realisasi_hewan_id' => '04402e24-eb12-473f-9dfa-fd7472f38e5a',
                'lokasi_hewan_id' => '01b2f7f7-8743-4b93-b5af-08c79faff122',
                'status' => 1,
                'created_at' => '2022-08-27 13:43:26',
                'updated_at' => '2022-08-27 21:52:40',
            ),
            1 => 
            array (
                'id' => '0e08893f-800f-43ca-adf4-1e4160e380c7',
                'perencanaan_hewan_id' => '6aa72a31-194d-4363-a282-084f5e6362d3',
                'realisasi_hewan_id' => '31d18aa3-236a-40c5-bf62-7b30146f74c7',
                'lokasi_hewan_id' => '01b2f7f7-8743-4b93-b5af-08c79faff128',
                'status' => 2,
                'created_at' => '2022-08-27 13:43:26',
                'updated_at' => '2022-08-27 21:53:49',
            ),
            2 => 
            array (
                'id' => '0e32d954-d814-4099-be52-28b86ea9a254',
                'perencanaan_hewan_id' => '47c49fdb-370e-426c-99e9-ebe0bfe14787',
                'realisasi_hewan_id' => NULL,
                'lokasi_hewan_id' => '01b2f7f7-8743-4b93-b5af-08c79faff127',
                'status' => 0,
                'created_at' => '2022-08-27 13:09:57',
                'updated_at' => '2022-08-27 13:09:57',
            ),
            3 => 
            array (
                'id' => '16385ae0-fb9e-460b-abed-786245e759b2',
                'perencanaan_hewan_id' => '47c49fdb-370e-426c-99e9-ebe0bfe14787',
                'realisasi_hewan_id' => NULL,
                'lokasi_hewan_id' => '01b2f7f7-8743-4b93-b5af-08c79faff122',
                'status' => 0,
                'created_at' => '2022-08-27 13:09:57',
                'updated_at' => '2022-08-27 13:09:57',
            ),
            4 => 
            array (
                'id' => '1663731e-ca5d-447f-add9-686a61448b3f',
                'perencanaan_hewan_id' => '3e6d54e2-995c-44ab-9530-47ab2b628773',
                'realisasi_hewan_id' => '5a81e758-96db-4419-899a-713a7e5d2a12',
                'lokasi_hewan_id' => '01b2f7f7-8743-4b93-b5af-08c79faff127',
                'status' => 1,
                'created_at' => '2022-08-27 12:45:39',
                'updated_at' => '2022-08-27 21:46:52',
            ),
            5 => 
            array (
                'id' => '1a4280e7-7cfc-4188-bc1b-6cf226600476',
                'perencanaan_hewan_id' => '6aa72a31-194d-4363-a282-084f5e6362d3',
                'realisasi_hewan_id' => NULL,
                'lokasi_hewan_id' => '01b2f7f7-8743-4b93-b5af-08c79faff139',
                'status' => 0,
                'created_at' => '2022-08-27 13:43:26',
                'updated_at' => '2022-08-27 13:43:26',
            ),
            6 => 
            array (
                'id' => '20694d55-57c5-425f-99a0-587f68f37299',
                'perencanaan_hewan_id' => '47c49fdb-370e-426c-99e9-ebe0bfe14787',
                'realisasi_hewan_id' => NULL,
                'lokasi_hewan_id' => '01b2f7f7-8743-4b93-b5af-08c79faff134',
                'status' => 0,
                'created_at' => '2022-08-27 13:09:57',
                'updated_at' => '2022-08-27 13:09:57',
            ),
            7 => 
            array (
                'id' => '22635e2b-8260-4f8c-b536-f10bd41135cb',
                'perencanaan_hewan_id' => 'cc85aa2c-d07b-45e9-9629-f2590f12ee63',
                'realisasi_hewan_id' => 'd105f8a6-d1c3-45a9-a651-799edaef60d8',
                'lokasi_hewan_id' => '01b2f7f7-8743-4b93-b5af-08c79faff134',
                'status' => 1,
                'created_at' => '2022-09-06 14:02:33',
                'updated_at' => '2022-09-06 17:15:02',
            ),
            8 => 
            array (
                'id' => '2533b3e8-7375-4fdd-9bfe-cd4d1ed45a22',
                'perencanaan_hewan_id' => '5aabc047-e5bb-4d9c-bf0a-12ee1e88eb68',
                'realisasi_hewan_id' => NULL,
                'lokasi_hewan_id' => '01b2f7f7-8743-4b93-b5af-08c79faff121',
                'status' => 0,
                'created_at' => '2022-08-27 12:42:00',
                'updated_at' => '2022-08-27 12:42:00',
            ),
            9 => 
            array (
                'id' => '2935f8ed-f57d-496d-91f0-99ad188e534e',
                'perencanaan_hewan_id' => 'c913a980-7786-4008-ae5b-62f581a35945',
                'realisasi_hewan_id' => 'b805ef82-4514-4ac8-9c36-14c198fb60a7',
                'lokasi_hewan_id' => '01b2f7f7-8743-4b93-b5af-08c79faff139',
                'status' => 1,
                'created_at' => '2022-09-06 13:29:41',
                'updated_at' => '2022-09-06 17:04:27',
            ),
            10 => 
            array (
                'id' => '3ade274d-3ce5-47ef-836c-528d120ef21c',
                'perencanaan_hewan_id' => 'cc85aa2c-d07b-45e9-9629-f2590f12ee63',
                'realisasi_hewan_id' => NULL,
                'lokasi_hewan_id' => '01b2f7f7-8743-4b93-b5af-08c79faff140',
                'status' => 0,
                'created_at' => '2022-09-06 14:02:33',
                'updated_at' => '2022-09-06 14:02:33',
            ),
            11 => 
            array (
                'id' => '3c3a25b9-6b2e-4e04-9342-ab321bc520ee',
                'perencanaan_hewan_id' => 'c913a980-7786-4008-ae5b-62f581a35945',
                'realisasi_hewan_id' => 'fcb85c59-fef3-4e41-91ea-2abb3a9d498a',
                'lokasi_hewan_id' => '01b2f7f7-8743-4b93-b5af-08c79faff128',
                'status' => 1,
                'created_at' => '2022-09-06 13:29:41',
                'updated_at' => '2022-09-06 17:01:36',
            ),
            12 => 
            array (
                'id' => '3d1e1330-ea9f-4321-b070-da42cbafd350',
                'perencanaan_hewan_id' => '3e6d54e2-995c-44ab-9530-47ab2b628773',
                'realisasi_hewan_id' => '55c87f2e-5bb9-4784-9f91-46e6c3d839e5',
                'lokasi_hewan_id' => '01b2f7f7-8743-4b93-b5af-08c79faff139',
                'status' => 0,
                'created_at' => '2022-08-27 12:45:39',
                'updated_at' => '2022-08-27 21:48:26',
            ),
            13 => 
            array (
                'id' => '3db86775-15bf-49e8-b158-5c3b3d9283a2',
                'perencanaan_hewan_id' => 'cc85aa2c-d07b-45e9-9629-f2590f12ee63',
                'realisasi_hewan_id' => 'd105f8a6-d1c3-45a9-a651-799edaef60d8',
                'lokasi_hewan_id' => '01b2f7f7-8743-4b93-b5af-08c79faff127',
                'status' => 1,
                'created_at' => '2022-09-06 14:02:33',
                'updated_at' => '2022-09-06 17:15:02',
            ),
            14 => 
            array (
                'id' => '5d57802e-0491-4ab9-a890-fdca80e47d92',
                'perencanaan_hewan_id' => '6aa72a31-194d-4363-a282-084f5e6362d3',
                'realisasi_hewan_id' => NULL,
                'lokasi_hewan_id' => '01b2f7f7-8743-4b93-b5af-08c79faff140',
                'status' => 0,
                'created_at' => '2022-08-27 13:43:26',
                'updated_at' => '2022-08-27 13:43:26',
            ),
            15 => 
            array (
                'id' => '5d9d379c-63d4-4a66-b1d5-7f95a72e19b2',
                'perencanaan_hewan_id' => 'c913a980-7786-4008-ae5b-62f581a35945',
                'realisasi_hewan_id' => 'fcb85c59-fef3-4e41-91ea-2abb3a9d498a',
                'lokasi_hewan_id' => '01b2f7f7-8743-4b93-b5af-08c79faff133',
                'status' => 1,
                'created_at' => '2022-09-06 13:29:41',
                'updated_at' => '2022-09-06 17:01:36',
            ),
            16 => 
            array (
                'id' => '5fb5d9ef-96c7-4aec-be52-75a9695a6417',
                'perencanaan_hewan_id' => 'cc85aa2c-d07b-45e9-9629-f2590f12ee63',
                'realisasi_hewan_id' => 'ec98cdf4-4330-4a90-bb8a-280a7b6c91a2',
                'lokasi_hewan_id' => '01b2f7f7-8743-4b93-b5af-08c79faff128',
                'status' => 1,
                'created_at' => '2022-09-06 14:02:33',
                'updated_at' => '2022-09-06 17:16:37',
            ),
            17 => 
            array (
                'id' => '6836369e-783b-40b1-96b6-64dadd80f4bf',
                'perencanaan_hewan_id' => 'c913a980-7786-4008-ae5b-62f581a35945',
                'realisasi_hewan_id' => 'a68fe649-f08d-49fd-90de-b185d6f8c6af',
                'lokasi_hewan_id' => '01b2f7f7-8743-4b93-b5af-08c79faff122',
                'status' => 1,
                'created_at' => '2022-09-06 13:29:41',
                'updated_at' => '2022-09-06 17:00:25',
            ),
            18 => 
            array (
                'id' => '6b383609-c89e-4a5a-aa07-e2e0bfa91694',
                'perencanaan_hewan_id' => '47c49fdb-370e-426c-99e9-ebe0bfe14787',
                'realisasi_hewan_id' => NULL,
                'lokasi_hewan_id' => '01b2f7f7-8743-4b93-b5af-08c79faff121',
                'status' => 0,
                'created_at' => '2022-08-27 13:09:57',
                'updated_at' => '2022-08-27 13:09:57',
            ),
            19 => 
            array (
                'id' => '6b828270-d9f5-4404-9e14-0c1737be01db',
                'perencanaan_hewan_id' => '3e6d54e2-995c-44ab-9530-47ab2b628773',
                'realisasi_hewan_id' => '532a089d-2f10-44d6-a9e8-ef2036c69a3c',
                'lokasi_hewan_id' => '01b2f7f7-8743-4b93-b5af-08c79faff128',
                'status' => 1,
                'created_at' => '2022-08-27 12:45:39',
                'updated_at' => '2022-08-27 21:47:35',
            ),
            20 => 
            array (
                'id' => '76f4d515-0a2b-4c69-99fd-168d2135cbe1',
                'perencanaan_hewan_id' => '47c49fdb-370e-426c-99e9-ebe0bfe14787',
                'realisasi_hewan_id' => NULL,
                'lokasi_hewan_id' => '01b2f7f7-8743-4b93-b5af-08c79faff140',
                'status' => 0,
                'created_at' => '2022-08-27 13:09:57',
                'updated_at' => '2022-08-27 13:09:57',
            ),
            21 => 
            array (
                'id' => '827b5d8b-3a29-4fb8-8b55-869dac82a86f',
                'perencanaan_hewan_id' => '3e6d54e2-995c-44ab-9530-47ab2b628773',
                'realisasi_hewan_id' => '5a81e758-96db-4419-899a-713a7e5d2a12',
                'lokasi_hewan_id' => '01b2f7f7-8743-4b93-b5af-08c79faff121',
                'status' => 1,
                'created_at' => '2022-08-27 12:45:39',
                'updated_at' => '2022-08-27 21:46:52',
            ),
            22 => 
            array (
                'id' => '91516d3a-bef4-4165-a05f-6f87f7f2f660',
                'perencanaan_hewan_id' => '5aabc047-e5bb-4d9c-bf0a-12ee1e88eb68',
                'realisasi_hewan_id' => NULL,
                'lokasi_hewan_id' => '01b2f7f7-8743-4b93-b5af-08c79faff122',
                'status' => 0,
                'created_at' => '2022-08-27 12:42:00',
                'updated_at' => '2022-08-27 12:42:00',
            ),
            23 => 
            array (
                'id' => '959993f0-1107-4818-958c-2a5b1cd51d1a',
                'perencanaan_hewan_id' => 'c913a980-7786-4008-ae5b-62f581a35945',
                'realisasi_hewan_id' => 'a68fe649-f08d-49fd-90de-b185d6f8c6af',
                'lokasi_hewan_id' => '01b2f7f7-8743-4b93-b5af-08c79faff121',
                'status' => 1,
                'created_at' => '2022-09-06 13:29:41',
                'updated_at' => '2022-09-06 17:00:25',
            ),
            24 => 
            array (
                'id' => '99a73896-94b7-476b-a9ee-c79e3a55b686',
                'perencanaan_hewan_id' => 'c913a980-7786-4008-ae5b-62f581a35945',
                'realisasi_hewan_id' => 'b805ef82-4514-4ac8-9c36-14c198fb60a7',
                'lokasi_hewan_id' => '01b2f7f7-8743-4b93-b5af-08c79faff140',
                'status' => 1,
                'created_at' => '2022-09-06 13:29:41',
                'updated_at' => '2022-09-06 17:04:27',
            ),
            25 => 
            array (
                'id' => 'bf611e63-d26a-4d6c-9936-27a32352ef30',
                'perencanaan_hewan_id' => 'cc85aa2c-d07b-45e9-9629-f2590f12ee63',
                'realisasi_hewan_id' => 'ec98cdf4-4330-4a90-bb8a-280a7b6c91a2',
                'lokasi_hewan_id' => '01b2f7f7-8743-4b93-b5af-08c79faff133',
                'status' => 1,
                'created_at' => '2022-09-06 14:02:33',
                'updated_at' => '2022-09-06 17:16:37',
            ),
            26 => 
            array (
                'id' => 'bf745534-93e3-45c1-9b2d-5ccda34c5f06',
                'perencanaan_hewan_id' => 'c913a980-7786-4008-ae5b-62f581a35945',
                'realisasi_hewan_id' => 'b805ef82-4514-4ac8-9c36-14c198fb60a7',
                'lokasi_hewan_id' => '01b2f7f7-8743-4b93-b5af-08c79faff134',
                'status' => 1,
                'created_at' => '2022-09-06 13:29:41',
                'updated_at' => '2022-09-06 17:04:27',
            ),
            27 => 
            array (
                'id' => 'bff1b477-5de5-477f-be5d-6fcc82f9efa8',
                'perencanaan_hewan_id' => 'cc85aa2c-d07b-45e9-9629-f2590f12ee63',
                'realisasi_hewan_id' => 'd105f8a6-d1c3-45a9-a651-799edaef60d8',
                'lokasi_hewan_id' => '01b2f7f7-8743-4b93-b5af-08c79faff121',
                'status' => 1,
                'created_at' => '2022-09-06 14:02:33',
                'updated_at' => '2022-09-06 17:15:02',
            ),
            28 => 
            array (
                'id' => 'c162c3a7-b283-4a26-87ba-bbe7aee758bb',
                'perencanaan_hewan_id' => '3e6d54e2-995c-44ab-9530-47ab2b628773',
                'realisasi_hewan_id' => '532a089d-2f10-44d6-a9e8-ef2036c69a3c',
                'lokasi_hewan_id' => '01b2f7f7-8743-4b93-b5af-08c79faff122',
                'status' => 1,
                'created_at' => '2022-08-27 12:45:39',
                'updated_at' => '2022-08-27 21:47:35',
            ),
            29 => 
            array (
                'id' => 'c33709d7-ba84-4cc5-8b50-1091ad5b2014',
                'perencanaan_hewan_id' => '3e6d54e2-995c-44ab-9530-47ab2b628773',
                'realisasi_hewan_id' => '55c87f2e-5bb9-4784-9f91-46e6c3d839e5',
                'lokasi_hewan_id' => '01b2f7f7-8743-4b93-b5af-08c79faff133',
                'status' => 0,
                'created_at' => '2022-08-27 12:45:39',
                'updated_at' => '2022-08-27 21:48:26',
            ),
            30 => 
            array (
                'id' => 'c37bf6dc-6566-434b-b6be-d38bf50ff184',
                'perencanaan_hewan_id' => 'cc85aa2c-d07b-45e9-9629-f2590f12ee63',
                'realisasi_hewan_id' => 'd105f8a6-d1c3-45a9-a651-799edaef60d8',
                'lokasi_hewan_id' => '01b2f7f7-8743-4b93-b5af-08c79faff122',
                'status' => 1,
                'created_at' => '2022-09-06 14:02:33',
                'updated_at' => '2022-09-06 17:15:02',
            ),
            31 => 
            array (
                'id' => 'c502669a-25c2-4a2e-9bd0-9b3b5832588f',
                'perencanaan_hewan_id' => '6aa72a31-194d-4363-a282-084f5e6362d3',
                'realisasi_hewan_id' => '31d18aa3-236a-40c5-bf62-7b30146f74c7',
                'lokasi_hewan_id' => '01b2f7f7-8743-4b93-b5af-08c79faff133',
                'status' => 2,
                'created_at' => '2022-08-27 13:43:26',
                'updated_at' => '2022-08-27 21:53:49',
            ),
            32 => 
            array (
                'id' => 'c99fefbf-d263-4ea2-85fd-7efb92b91ec6',
                'perencanaan_hewan_id' => '47c49fdb-370e-426c-99e9-ebe0bfe14787',
                'realisasi_hewan_id' => NULL,
                'lokasi_hewan_id' => '01b2f7f7-8743-4b93-b5af-08c79faff139',
                'status' => 0,
                'created_at' => '2022-08-27 13:09:57',
                'updated_at' => '2022-08-27 13:09:57',
            ),
            33 => 
            array (
                'id' => 'cef088cd-72b1-42ac-84df-dfcd8b6f8558',
                'perencanaan_hewan_id' => 'c913a980-7786-4008-ae5b-62f581a35945',
                'realisasi_hewan_id' => 'a68fe649-f08d-49fd-90de-b185d6f8c6af',
                'lokasi_hewan_id' => '01b2f7f7-8743-4b93-b5af-08c79faff127',
                'status' => 1,
                'created_at' => '2022-09-06 13:29:41',
                'updated_at' => '2022-09-06 17:00:25',
            ),
            34 => 
            array (
                'id' => 'd51d394a-72d3-4a8b-9e2d-03c4c9472aec',
                'perencanaan_hewan_id' => '6aa72a31-194d-4363-a282-084f5e6362d3',
                'realisasi_hewan_id' => '04402e24-eb12-473f-9dfa-fd7472f38e5a',
                'lokasi_hewan_id' => '01b2f7f7-8743-4b93-b5af-08c79faff127',
                'status' => 1,
                'created_at' => '2022-08-27 13:43:26',
                'updated_at' => '2022-08-27 21:52:40',
            ),
            35 => 
            array (
                'id' => 'd60a73ed-20c6-4b41-ad98-e7ab373665f2',
                'perencanaan_hewan_id' => 'cc85aa2c-d07b-45e9-9629-f2590f12ee63',
                'realisasi_hewan_id' => 'ec98cdf4-4330-4a90-bb8a-280a7b6c91a2',
                'lokasi_hewan_id' => '01b2f7f7-8743-4b93-b5af-08c79faff139',
                'status' => 1,
                'created_at' => '2022-09-06 14:02:33',
                'updated_at' => '2022-09-06 17:16:37',
            ),
            36 => 
            array (
                'id' => 'dc6a3d88-c699-4e9d-a3d3-222f354b055d',
                'perencanaan_hewan_id' => '6aa72a31-194d-4363-a282-084f5e6362d3',
                'realisasi_hewan_id' => '04402e24-eb12-473f-9dfa-fd7472f38e5a',
                'lokasi_hewan_id' => '01b2f7f7-8743-4b93-b5af-08c79faff121',
                'status' => 1,
                'created_at' => '2022-08-27 13:43:26',
                'updated_at' => '2022-08-27 21:52:40',
            ),
            37 => 
            array (
                'id' => 'e62147fd-9231-4c42-af70-442fc9ab12f5',
                'perencanaan_hewan_id' => '47c49fdb-370e-426c-99e9-ebe0bfe14787',
                'realisasi_hewan_id' => NULL,
                'lokasi_hewan_id' => '01b2f7f7-8743-4b93-b5af-08c79faff128',
                'status' => 0,
                'created_at' => '2022-08-27 13:09:57',
                'updated_at' => '2022-08-27 13:09:57',
            ),
            38 => 
            array (
                'id' => 'ee351745-fe78-460c-8823-e2bf5bd0f6de',
                'perencanaan_hewan_id' => '6aa72a31-194d-4363-a282-084f5e6362d3',
                'realisasi_hewan_id' => '31d18aa3-236a-40c5-bf62-7b30146f74c7',
                'lokasi_hewan_id' => '01b2f7f7-8743-4b93-b5af-08c79faff134',
                'status' => 2,
                'created_at' => '2022-08-27 13:43:26',
                'updated_at' => '2022-08-27 21:53:49',
            ),
        ));
        
        
    }
}