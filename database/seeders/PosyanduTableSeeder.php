<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PosyanduTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('posyandu')->delete();
        
        \DB::table('posyandu')->insert(array (
            0 => 
            array (
                'id' => '01feaaf4-bab2-4118-ba07-8b761a285709',
                'puskesmas_id' => '44ae2500-66d5-4609-b55a-765255454ba8',
                'nama' => 'Rambutan 1',
                'desa_id' => 7210080005,
                'deleted_at' => NULL,
                'created_at' => '2022-10-06 15:53:42',
                'updated_at' => '2022-10-06 15:53:42',
            ),
            1 => 
            array (
                'id' => '026e6a51-d192-4c22-9fac-9c456adde3b0',
                'puskesmas_id' => 'f3df3af5-38a5-432e-8daf-a69fe47e0234',
                'nama' => 'Kamaipura Iii',
                'desa_id' => 7210130003,
                'deleted_at' => NULL,
                'created_at' => '2022-10-06 15:53:42',
                'updated_at' => '2022-10-06 15:53:42',
            ),
            2 => 
            array (
                'id' => '037fd639-9de1-4726-851d-b383865ce1ae',
                'puskesmas_id' => '1fc65f68-19bc-4924-9c3c-f6c772cf023f',
                'nama' => 'Kumalasari',
                'desa_id' => 7210120001,
                'deleted_at' => NULL,
                'created_at' => '2022-10-06 15:53:42',
                'updated_at' => '2022-10-06 15:53:42',
            ),
            3 => 
            array (
                'id' => '045b99f2-c530-4237-b3e4-b62c9c74b0f8',
                'puskesmas_id' => '2cc7de06-3532-4571-85c9-1f27195ad4eb',
                'nama' => 'Lewara',
                'desa_id' => 7210140010,
                'deleted_at' => NULL,
                'created_at' => '2022-10-06 15:53:42',
                'updated_at' => '2022-10-06 15:53:42',
            ),
            4 => 
            array (
                'id' => '06732c88-9378-4729-a881-2d89e77568b3',
                'puskesmas_id' => '3a1c53b1-bc6e-4435-8cdb-ee5b010dda5f',
                'nama' => 'Kabelota Omea',
                'desa_id' => 7210030006,
                'deleted_at' => NULL,
                'created_at' => '2022-10-06 15:53:42',
                'updated_at' => '2022-10-06 15:53:42',
            ),
            5 => 
            array (
                'id' => '0826ebe8-d4e3-4079-a9fb-7d7927a7ea59',
                'puskesmas_id' => '1fc65f68-19bc-4924-9c3c-f6c772cf023f',
            'nama' => 'Aglonema (Dsn 4)',
                'desa_id' => 7210120013,
                'deleted_at' => NULL,
                'created_at' => '2022-10-06 15:53:41',
                'updated_at' => '2022-10-06 15:53:41',
            ),
            6 => 
            array (
                'id' => '08bf910c-0360-44d1-92ef-a1d012e15d85',
                'puskesmas_id' => '1af794fa-ed12-4c58-8e9e-838027b5dc26',
                'nama' => 'Katuwuna',
                'desa_id' => 7210010008,
                'deleted_at' => NULL,
                'created_at' => '2022-10-06 15:53:42',
                'updated_at' => '2022-10-06 15:53:42',
            ),
            7 => 
            array (
                'id' => '0939a4cc-e4ef-4d68-9d4c-ad2a81162ffa',
                'puskesmas_id' => '449dddd0-c208-41bb-b369-d9e08b63bd0f',
                'nama' => 'Pelangi Kasih',
                'desa_id' => 7210030004,
                'deleted_at' => NULL,
                'created_at' => '2022-10-06 15:53:42',
                'updated_at' => '2022-10-06 15:53:42',
            ),
            8 => 
            array (
                'id' => '09518473-0e84-46be-a03f-8b039ac750f8',
                'puskesmas_id' => 'f3df3af5-38a5-432e-8daf-a69fe47e0234',
                'nama' => 'Flamboyan 1',
                'desa_id' => 7210130009,
                'deleted_at' => NULL,
                'created_at' => '2022-10-06 15:53:42',
                'updated_at' => '2022-10-06 15:53:42',
            ),
            9 => 
            array (
                'id' => '09f7434f-62d2-498a-957a-d61a9547d1e2',
                'puskesmas_id' => '3a1c53b1-bc6e-4435-8cdb-ee5b010dda5f',
                'nama' => 'Mawar',
                'desa_id' => 7210030014,
                'deleted_at' => NULL,
                'created_at' => '2022-10-06 15:53:42',
                'updated_at' => '2022-10-06 15:53:42',
            ),
            10 => 
            array (
                'id' => '0b93a22e-2b2b-4b5c-b138-53860a6969d0',
                'puskesmas_id' => '263c41cd-e790-4d20-82ce-9206eb1147a9',
                'nama' => 'Singgani',
                'desa_id' => 7210070003,
                'deleted_at' => NULL,
                'created_at' => '2022-10-06 15:53:42',
                'updated_at' => '2022-10-06 15:53:42',
            ),
            11 => 
            array (
                'id' => '0ca44f8a-fc00-4f9e-a0bb-e79a371ed8d8',
                'puskesmas_id' => '60106a37-fb28-462c-9694-18e35e68d7f7',
                'nama' => 'Melati 1',
                'desa_id' => 7210050002,
                'deleted_at' => NULL,
                'created_at' => '2022-10-06 15:53:42',
                'updated_at' => '2022-10-06 15:53:42',
            ),
            12 => 
            array (
                'id' => '0dc13748-59c7-474b-86a4-eb046d384e2b',
                'puskesmas_id' => '1fc65f68-19bc-4924-9c3c-f6c772cf023f',
                'nama' => 'Anggrek 2',
                'desa_id' => 7210120012,
                'deleted_at' => NULL,
                'created_at' => '2022-10-06 15:53:41',
                'updated_at' => '2022-10-06 15:53:41',
            ),
            13 => 
            array (
                'id' => '1179f194-c305-4fbc-877d-cac3f2d2a433',
                'puskesmas_id' => '30cdc565-0bb9-4255-91d6-65443ddcdbc6',
                'nama' => 'Tulip',
                'desa_id' => 7210090005,
                'deleted_at' => NULL,
                'created_at' => '2022-10-06 15:53:42',
                'updated_at' => '2022-10-06 15:53:42',
            ),
            14 => 
            array (
                'id' => '1395a8a0-d175-42fa-8b9e-dffbee6ccc73',
                'puskesmas_id' => 'cf29a8c0-59c5-4822-81de-6d2e29779039',
                'nama' => 'Phobia',
                'desa_id' => 7210020007,
                'deleted_at' => NULL,
                'created_at' => '2022-10-06 15:53:42',
                'updated_at' => '2022-10-06 15:53:42',
            ),
            15 => 
            array (
                'id' => '153d8cf7-8124-45a0-b22c-ced664672579',
                'puskesmas_id' => '44ae2500-66d5-4609-b55a-765255454ba8',
                'nama' => 'Merpati 2',
                'desa_id' => 86623,
                'deleted_at' => NULL,
                'created_at' => '2022-10-06 15:53:42',
                'updated_at' => '2022-10-06 15:53:42',
            ),
            16 => 
            array (
                'id' => '182361d0-d0cb-426c-a920-96d9c4b919bb',
                'puskesmas_id' => '2cc7de06-3532-4571-85c9-1f27195ad4eb',
                'nama' => 'Kalaka',
                'desa_id' => 7210140011,
                'deleted_at' => NULL,
                'created_at' => '2022-10-06 15:53:42',
                'updated_at' => '2022-10-06 15:53:42',
            ),
            17 => 
            array (
                'id' => '18797c2c-5597-4cc8-bf5a-674747fc5009',
                'puskesmas_id' => 'cf29a8c0-59c5-4822-81de-6d2e29779039',
                'nama' => 'Rosmawar',
                'desa_id' => 7210020006,
                'deleted_at' => NULL,
                'created_at' => '2022-10-06 15:53:42',
                'updated_at' => '2022-10-06 15:53:42',
            ),
            18 => 
            array (
                'id' => '1b251adb-62d6-49e0-adcb-0513065c8b35',
                'puskesmas_id' => '3a1c53b1-bc6e-4435-8cdb-ee5b010dda5f',
                'nama' => 'Melati',
                'desa_id' => 7210030014,
                'deleted_at' => NULL,
                'created_at' => '2022-10-06 15:53:42',
                'updated_at' => '2022-10-06 15:53:42',
            ),
            19 => 
            array (
                'id' => '1c850ddd-028e-4d3e-94fb-f2154350044d',
                'puskesmas_id' => '4d5c2f57-8f42-491c-83d4-78c198788e93',
                'nama' => 'Sintuwu',
                'desa_id' => 7210110001,
                'deleted_at' => NULL,
                'created_at' => '2022-10-06 15:53:42',
                'updated_at' => '2022-10-06 15:53:42',
            ),
            20 => 
            array (
                'id' => '1e4b35b8-89c2-4def-b0c7-e133899ead65',
                'puskesmas_id' => '2cc7de06-3532-4571-85c9-1f27195ad4eb',
                'nama' => 'Depubete',
                'desa_id' => 7210140011,
                'deleted_at' => NULL,
                'created_at' => '2022-10-06 15:53:42',
                'updated_at' => '2022-10-06 15:53:42',
            ),
            21 => 
            array (
                'id' => '1f067624-7699-4683-8fc9-f0fc1cc9bf3f',
                'puskesmas_id' => '1af794fa-ed12-4c58-8e9e-838027b5dc26',
                'nama' => 'Tomi Pakuli',
                'desa_id' => 7210010017,
                'deleted_at' => NULL,
                'created_at' => '2022-10-06 15:53:42',
                'updated_at' => '2022-10-06 15:53:42',
            ),
            22 => 
            array (
                'id' => '1faaf31d-f130-4dd1-8015-c5a6167c14e5',
                'puskesmas_id' => '1fc65f68-19bc-4924-9c3c-f6c772cf023f',
                'nama' => 'Anatapura',
                'desa_id' => 7210120002,
                'deleted_at' => NULL,
                'created_at' => '2022-10-06 15:53:41',
                'updated_at' => '2022-10-06 15:53:41',
            ),
            23 => 
            array (
                'id' => '247ad623-e4e3-4f2a-82b3-fe73188c4f5c',
                'puskesmas_id' => '156f4500-77dd-4e52-a616-2cef699e25e3',
                'nama' => 'Flamboyan',
                'desa_id' => 7210150013,
                'deleted_at' => NULL,
                'created_at' => '2022-10-06 15:53:42',
                'updated_at' => '2022-10-06 15:53:42',
            ),
            24 => 
            array (
                'id' => '2564d6b7-e9a9-4e36-8b66-96e1addc71ba',
                'puskesmas_id' => '60106a37-fb28-462c-9694-18e35e68d7f7',
                'nama' => 'Mekar 1',
                'desa_id' => 7210050001,
                'deleted_at' => NULL,
                'created_at' => '2022-10-06 15:53:42',
                'updated_at' => '2022-10-06 15:53:42',
            ),
            25 => 
            array (
                'id' => '26975fde-b2fb-499d-b6bc-7ff58881568b',
                'puskesmas_id' => 'f3df3af5-38a5-432e-8daf-a69fe47e0234',
                'nama' => 'Teratai',
                'desa_id' => 7210130010,
                'deleted_at' => NULL,
                'created_at' => '2022-10-06 15:53:42',
                'updated_at' => '2022-10-06 15:53:42',
            ),
            26 => 
            array (
                'id' => '275a15fe-20d2-4166-bf7e-30a5e0cea080',
                'puskesmas_id' => '3a1c53b1-bc6e-4435-8cdb-ee5b010dda5f',
                'nama' => 'Sejahtera',
                'desa_id' => 7210030015,
                'deleted_at' => NULL,
                'created_at' => '2022-10-06 15:53:42',
                'updated_at' => '2022-10-06 15:53:42',
            ),
            27 => 
            array (
                'id' => '277ce43f-341e-49df-ac22-abd179e24844',
                'puskesmas_id' => '449dddd0-c208-41bb-b369-d9e08b63bd0f',
                'nama' => 'Kalbu',
                'desa_id' => 7210030002,
                'deleted_at' => NULL,
                'created_at' => '2022-10-06 15:53:42',
                'updated_at' => '2022-10-06 15:53:42',
            ),
            28 => 
            array (
                'id' => '29b4848a-cbc9-487c-b39f-982b295b0d1c',
                'puskesmas_id' => '1fc65f68-19bc-4924-9c3c-f6c772cf023f',
                'nama' => 'Proyek Kodim',
                'desa_id' => 7210120017,
                'deleted_at' => NULL,
                'created_at' => '2022-10-06 15:53:42',
                'updated_at' => '2022-10-06 15:53:42',
            ),
            29 => 
            array (
                'id' => '2a95bd7e-1c94-4cd7-a55a-edb8dfe75fbf',
                'puskesmas_id' => '1af794fa-ed12-4c58-8e9e-838027b5dc26',
                'nama' => 'Tunas Baru',
                'desa_id' => 7210010019,
                'deleted_at' => NULL,
                'created_at' => '2022-10-06 15:53:42',
                'updated_at' => '2022-10-06 15:53:42',
            ),
            30 => 
            array (
                'id' => '2ac64897-1ebc-47c1-a32d-f7011bf38d5c',
                'puskesmas_id' => '449dddd0-c208-41bb-b369-d9e08b63bd0f',
                'nama' => 'Orchid',
                'desa_id' => 7210030002,
                'deleted_at' => NULL,
                'created_at' => '2022-10-06 15:53:42',
                'updated_at' => '2022-10-06 15:53:42',
            ),
            31 => 
            array (
                'id' => '2c5adf23-e5fb-449c-bb4c-536e19d30e8a',
                'puskesmas_id' => 'cf29a8c0-59c5-4822-81de-6d2e29779039',
                'nama' => 'Flamboyan 1',
                'desa_id' => 7210020005,
                'deleted_at' => NULL,
                'created_at' => '2022-10-06 15:53:42',
                'updated_at' => '2022-10-06 15:53:42',
            ),
            32 => 
            array (
                'id' => '2d84784f-aab9-47a3-abeb-d039026523ba',
                'puskesmas_id' => '703821a6-0bc6-4d4a-b920-e808fc7b62f5',
                'nama' => 'Kalukulau',
                'desa_id' => 7210100005,
                'deleted_at' => NULL,
                'created_at' => '2022-10-06 15:53:42',
                'updated_at' => '2022-10-06 15:53:42',
            ),
            33 => 
            array (
                'id' => '307abbdc-ae2b-4349-b840-4c5624df4657',
                'puskesmas_id' => '3a1c53b1-bc6e-4435-8cdb-ee5b010dda5f',
                'nama' => 'Bukit Pinus',
                'desa_id' => 7210030008,
                'deleted_at' => NULL,
                'created_at' => '2022-10-06 15:53:42',
                'updated_at' => '2022-10-06 15:53:42',
            ),
            34 => 
            array (
                'id' => '30b50edc-2d04-47e2-9129-a5321ea16eb4',
                'puskesmas_id' => '30cdc565-0bb9-4255-91d6-65443ddcdbc6',
                'nama' => 'Anggrek',
                'desa_id' => 7210090003,
                'deleted_at' => NULL,
                'created_at' => '2022-10-06 15:53:42',
                'updated_at' => '2022-10-06 15:53:42',
            ),
            35 => 
            array (
                'id' => '316691f9-b562-428c-8003-3872d0faabba',
                'puskesmas_id' => '30cdc565-0bb9-4255-91d6-65443ddcdbc6',
                'nama' => 'Sakura',
                'desa_id' => 7210090012,
                'deleted_at' => NULL,
                'created_at' => '2022-10-06 15:53:42',
                'updated_at' => '2022-10-06 15:53:42',
            ),
            36 => 
            array (
                'id' => '317b9f47-89e1-43a0-8f38-e3b99c62f305',
                'puskesmas_id' => '449dddd0-c208-41bb-b369-d9e08b63bd0f',
                'nama' => 'Batu Mika',
                'desa_id' => 7210030004,
                'deleted_at' => NULL,
                'created_at' => '2022-10-06 15:53:42',
                'updated_at' => '2022-10-06 15:53:42',
            ),
            37 => 
            array (
                'id' => '3410c13b-bc35-49bb-8706-ce2968f354a4',
                'puskesmas_id' => '30cdc565-0bb9-4255-91d6-65443ddcdbc6',
                'nama' => 'Dahlia',
                'desa_id' => 7210090006,
                'deleted_at' => NULL,
                'created_at' => '2022-10-06 15:53:42',
                'updated_at' => '2022-10-06 15:53:42',
            ),
            38 => 
            array (
                'id' => '3466a418-24ce-4e8c-b802-8528717772e0',
                'puskesmas_id' => '44ae2500-66d5-4609-b55a-765255454ba8',
                'nama' => 'Ngiur Indah',
                'desa_id' => 7210080012,
                'deleted_at' => NULL,
                'created_at' => '2022-10-06 15:53:42',
                'updated_at' => '2022-10-06 15:53:42',
            ),
            39 => 
            array (
                'id' => '35556e82-e24a-4ce8-9621-447f92b84da4',
                'puskesmas_id' => '60106a37-fb28-462c-9694-18e35e68d7f7',
                'nama' => 'Mentari 1',
                'desa_id' => 7210050005,
                'deleted_at' => NULL,
                'created_at' => '2022-10-06 15:53:42',
                'updated_at' => '2022-10-06 15:53:42',
            ),
            40 => 
            array (
                'id' => '35dd6614-fead-406f-95df-f8dabec0657a',
                'puskesmas_id' => '44ae2500-66d5-4609-b55a-765255454ba8',
                'nama' => 'Sedap Malam Bora',
                'desa_id' => 7210080001,
                'deleted_at' => NULL,
                'created_at' => '2022-10-06 15:53:42',
                'updated_at' => '2022-10-06 15:53:42',
            ),
            41 => 
            array (
                'id' => '3614a84c-fe40-4874-9e71-1e18cb633fbd',
                'puskesmas_id' => '44ae2500-66d5-4609-b55a-765255454ba8',
                'nama' => 'Rambutan 2',
                'desa_id' => 7210080005,
                'deleted_at' => NULL,
                'created_at' => '2022-10-06 15:53:42',
                'updated_at' => '2022-10-06 15:53:42',
            ),
            42 => 
            array (
                'id' => '36fb5123-a2f6-48c4-b12a-9f3774451e64',
                'puskesmas_id' => '449dddd0-c208-41bb-b369-d9e08b63bd0f',
                'nama' => 'Biro',
                'desa_id' => 7210030001,
                'deleted_at' => NULL,
                'created_at' => '2022-10-06 15:53:42',
                'updated_at' => '2022-10-06 15:53:42',
            ),
            43 => 
            array (
                'id' => '394f4e6e-af16-482c-b4e4-05f59119a611',
                'puskesmas_id' => 'f3df3af5-38a5-432e-8daf-a69fe47e0234',
                'nama' => 'Flamboyan 2',
                'desa_id' => 7210130009,
                'deleted_at' => NULL,
                'created_at' => '2022-10-06 15:53:42',
                'updated_at' => '2022-10-06 15:53:42',
            ),
            44 => 
            array (
                'id' => '3b9b2819-cc05-46d1-9dbc-07ec1d521e29',
                'puskesmas_id' => '4d5c2f57-8f42-491c-83d4-78c198788e93',
                'nama' => 'Melati 4',
                'desa_id' => 7210110003,
                'deleted_at' => NULL,
                'created_at' => '2022-10-06 15:53:42',
                'updated_at' => '2022-10-06 15:53:42',
            ),
            45 => 
            array (
                'id' => '3c175c57-63dc-4583-8381-f4e445c004ba',
                'puskesmas_id' => 'cf29a8c0-59c5-4822-81de-6d2e29779039',
                'nama' => 'Wahi',
                'desa_id' => 7210020002,
                'deleted_at' => NULL,
                'created_at' => '2022-10-06 15:53:42',
                'updated_at' => '2022-10-06 15:53:42',
            ),
            46 => 
            array (
                'id' => '3c73c36b-caaf-4291-ab95-45f4d73507b5',
                'puskesmas_id' => '449dddd0-c208-41bb-b369-d9e08b63bd0f',
                'nama' => 'Flamboyan',
                'desa_id' => 7210030004,
                'deleted_at' => NULL,
                'created_at' => '2022-10-06 15:53:42',
                'updated_at' => '2022-10-06 15:53:42',
            ),
            47 => 
            array (
                'id' => '4039e142-ac88-44af-98c9-db6f7a65c761',
                'puskesmas_id' => '44ae2500-66d5-4609-b55a-765255454ba8',
                'nama' => 'Cahaya 2',
                'desa_id' => 7210080002,
                'deleted_at' => NULL,
                'created_at' => '2022-10-06 15:53:42',
                'updated_at' => '2022-10-06 15:53:42',
            ),
            48 => 
            array (
                'id' => '424afa49-e494-4c7c-9f9c-d8dfd47cb9fc',
                'puskesmas_id' => '1af794fa-ed12-4c58-8e9e-838027b5dc26',
                'nama' => 'Melati 1',
                'desa_id' => 7210010011,
                'deleted_at' => NULL,
                'created_at' => '2022-10-06 15:53:42',
                'updated_at' => '2022-10-06 15:53:42',
            ),
            49 => 
            array (
                'id' => '4358943d-ecbe-4e8c-a6af-555927382616',
                'puskesmas_id' => '449dddd0-c208-41bb-b369-d9e08b63bd0f',
                'nama' => 'Siwongi',
                'desa_id' => 7210030001,
                'deleted_at' => NULL,
                'created_at' => '2022-10-06 15:53:42',
                'updated_at' => '2022-10-06 15:53:42',
            ),
            50 => 
            array (
                'id' => '4605f663-3d71-447a-b50e-adb570cf8141',
                'puskesmas_id' => '1fc65f68-19bc-4924-9c3c-f6c772cf023f',
                'nama' => 'Sukamaju',
                'desa_id' => 7210120011,
                'deleted_at' => NULL,
                'created_at' => '2022-10-06 15:53:42',
                'updated_at' => '2022-10-06 15:53:42',
            ),
            51 => 
            array (
                'id' => '46373c2c-cd7e-4633-af93-f904aebcfbdf',
                'puskesmas_id' => '156f4500-77dd-4e52-a616-2cef699e25e3',
                'nama' => 'Edelweis',
                'desa_id' => 7210010004,
                'deleted_at' => NULL,
                'created_at' => '2022-10-06 15:53:42',
                'updated_at' => '2022-10-06 15:53:42',
            ),
            52 => 
            array (
                'id' => '4669ec4e-44c7-4b5a-887a-bc97f81a1d99',
                'puskesmas_id' => 'cf29a8c0-59c5-4822-81de-6d2e29779039',
                'nama' => 'Flamboyan 2',
                'desa_id' => 7210020005,
                'deleted_at' => NULL,
                'created_at' => '2022-10-06 15:53:42',
                'updated_at' => '2022-10-06 15:53:42',
            ),
            53 => 
            array (
                'id' => '474d8573-80af-45b0-aaec-70191ea1fff6',
                'puskesmas_id' => '2cc7de06-3532-4571-85c9-1f27195ad4eb',
                'nama' => 'Lontimbu',
                'desa_id' => 7210140005,
                'deleted_at' => NULL,
                'created_at' => '2022-10-06 15:53:42',
                'updated_at' => '2022-10-06 15:53:42',
            ),
            54 => 
            array (
                'id' => '479c1601-d795-40e3-8287-b51191c30cf2',
                'puskesmas_id' => '4d5c2f57-8f42-491c-83d4-78c198788e93',
                'nama' => 'Anutapura 1',
                'desa_id' => 7210110009,
                'deleted_at' => NULL,
                'created_at' => '2022-10-06 15:53:42',
                'updated_at' => '2022-10-06 15:53:42',
            ),
            55 => 
            array (
                'id' => '47d3fad3-c760-4d0e-bb2e-ff21ca1142cc',
                'puskesmas_id' => 'cf29a8c0-59c5-4822-81de-6d2e29779039',
                'nama' => 'Bola Tompi',
                'desa_id' => 7210020003,
                'deleted_at' => NULL,
                'created_at' => '2022-10-06 15:53:42',
                'updated_at' => '2022-10-06 15:53:42',
            ),
            56 => 
            array (
                'id' => '4835849e-a50c-4023-b46c-08c731441fb4',
                'puskesmas_id' => '30cdc565-0bb9-4255-91d6-65443ddcdbc6',
                'nama' => 'Pucuk Beringin',
                'desa_id' => 7210090002,
                'deleted_at' => NULL,
                'created_at' => '2022-10-06 15:53:42',
                'updated_at' => '2022-10-06 15:53:42',
            ),
            57 => 
            array (
                'id' => '48467053-6fd9-4189-8a65-96f8ffad91bd',
                'puskesmas_id' => 'cf29a8c0-59c5-4822-81de-6d2e29779039',
                'nama' => 'Bogenvil 2',
                'desa_id' => 7210020010,
                'deleted_at' => NULL,
                'created_at' => '2022-10-06 15:53:42',
                'updated_at' => '2022-10-06 15:53:42',
            ),
            58 => 
            array (
                'id' => '48a612f4-b037-4c17-8e82-fb54beb7254c',
                'puskesmas_id' => 'cf29a8c0-59c5-4822-81de-6d2e29779039',
                'nama' => 'Wua',
                'desa_id' => 7210020003,
                'deleted_at' => NULL,
                'created_at' => '2022-10-06 15:53:42',
                'updated_at' => '2022-10-06 15:53:42',
            ),
            59 => 
            array (
                'id' => '4ace22d6-4da6-4561-961a-f9b77b84627c',
                'puskesmas_id' => '1fc65f68-19bc-4924-9c3c-f6c772cf023f',
                'nama' => 'Teratai',
                'desa_id' => 7210120003,
                'deleted_at' => NULL,
                'created_at' => '2022-10-06 15:53:42',
                'updated_at' => '2022-10-06 15:53:42',
            ),
            60 => 
            array (
                'id' => '4c9247ca-bc45-484b-a9f8-d82926d0d8df',
                'puskesmas_id' => '2cc7de06-3532-4571-85c9-1f27195ad4eb',
                'nama' => 'Nggea',
                'desa_id' => 7210140010,
                'deleted_at' => NULL,
                'created_at' => '2022-10-06 15:53:42',
                'updated_at' => '2022-10-06 15:53:42',
            ),
            61 => 
            array (
                'id' => '4d7b9a76-3ae0-489d-a510-e232394cd40c',
                'puskesmas_id' => '3a1c53b1-bc6e-4435-8cdb-ee5b010dda5f',
                'nama' => 'Melati 1',
                'desa_id' => 7210030010,
                'deleted_at' => NULL,
                'created_at' => '2022-10-06 15:53:42',
                'updated_at' => '2022-10-06 15:53:42',
            ),
            62 => 
            array (
                'id' => '4e3b735a-c765-40af-b1ca-b5f9279c5cac',
                'puskesmas_id' => '1fc65f68-19bc-4924-9c3c-f6c772cf023f',
                'nama' => 'Masagena',
                'desa_id' => 7210120011,
                'deleted_at' => NULL,
                'created_at' => '2022-10-06 15:53:42',
                'updated_at' => '2022-10-06 15:53:42',
            ),
            63 => 
            array (
                'id' => '4f1eb223-c43c-4ecd-aed6-f4c3672d713c',
                'puskesmas_id' => '3a1c53b1-bc6e-4435-8cdb-ee5b010dda5f',
                'nama' => 'Ulu Uemiu',
                'desa_id' => 7210030005,
                'deleted_at' => NULL,
                'created_at' => '2022-10-06 15:53:42',
                'updated_at' => '2022-10-06 15:53:42',
            ),
            64 => 
            array (
                'id' => '4f694ec5-7487-4d55-9a39-0fd405ee2c80',
                'puskesmas_id' => 'f3df3af5-38a5-432e-8daf-a69fe47e0234',
                'nama' => 'Simpotowe I',
                'desa_id' => 7210130006,
                'deleted_at' => NULL,
                'created_at' => '2022-10-06 15:53:42',
                'updated_at' => '2022-10-06 15:53:42',
            ),
            65 => 
            array (
                'id' => '516ba8f3-ad56-45fe-8d61-409857aabf6a',
                'puskesmas_id' => '44ae2500-66d5-4609-b55a-765255454ba8',
                'nama' => 'Anggur 2',
                'desa_id' => 7210150015,
                'deleted_at' => NULL,
                'created_at' => '2022-10-06 15:53:42',
                'updated_at' => '2022-10-06 15:53:42',
            ),
            66 => 
            array (
                'id' => '51c04185-362f-44f6-aa73-c11b8796fdce',
                'puskesmas_id' => '2cc7de06-3532-4571-85c9-1f27195ad4eb',
                'nama' => 'Taipanggabe',
                'desa_id' => 7210140007,
                'deleted_at' => NULL,
                'created_at' => '2022-10-06 15:53:42',
                'updated_at' => '2022-10-06 15:53:42',
            ),
            67 => 
            array (
                'id' => '52fd55e2-1d86-4df1-be6a-95358e61f6a6',
                'puskesmas_id' => '263c41cd-e790-4d20-82ce-9206eb1147a9',
                'nama' => 'Melati',
                'desa_id' => 7210070006,
                'deleted_at' => NULL,
                'created_at' => '2022-10-06 15:53:42',
                'updated_at' => '2022-10-06 15:53:42',
            ),
            68 => 
            array (
                'id' => '5321d1e2-de4f-454f-ac72-3aca1261f749',
                'puskesmas_id' => '60106a37-fb28-462c-9694-18e35e68d7f7',
                'nama' => 'Asoka',
                'desa_id' => 7210050004,
                'deleted_at' => NULL,
                'created_at' => '2022-10-06 15:53:42',
                'updated_at' => '2022-10-06 15:53:42',
            ),
            69 => 
            array (
                'id' => '53eb7ae0-2475-49da-8055-3198302ae788',
                'puskesmas_id' => '1fc65f68-19bc-4924-9c3c-f6c772cf023f',
                'nama' => 'Melati 1',
                'desa_id' => 7210120012,
                'deleted_at' => NULL,
                'created_at' => '2022-10-06 15:53:42',
                'updated_at' => '2022-10-06 15:53:42',
            ),
            70 => 
            array (
                'id' => '54babcfa-dfc0-4318-bc6e-c4890252635d',
                'puskesmas_id' => '703821a6-0bc6-4d4a-b920-e808fc7b62f5',
                'nama' => 'Sipadecengi',
                'desa_id' => 7210100002,
                'deleted_at' => NULL,
                'created_at' => '2022-10-06 15:53:42',
                'updated_at' => '2022-10-06 15:53:42',
            ),
            71 => 
            array (
                'id' => '5566e27e-4ef3-485f-bb76-5b92ed646da6',
                'puskesmas_id' => '3a1c53b1-bc6e-4435-8cdb-ee5b010dda5f',
                'nama' => 'Mawar Boya',
                'desa_id' => 7210030011,
                'deleted_at' => NULL,
                'created_at' => '2022-10-06 15:53:42',
                'updated_at' => '2022-10-06 15:53:42',
            ),
            72 => 
            array (
                'id' => '55a5df21-6aea-4c0c-b921-564a9a98b7dd',
                'puskesmas_id' => '1fc65f68-19bc-4924-9c3c-f6c772cf023f',
            'nama' => 'Keladi (Dsn 1)',
                'desa_id' => 7210120013,
                'deleted_at' => NULL,
                'created_at' => '2022-10-06 15:53:42',
                'updated_at' => '2022-10-06 15:53:42',
            ),
            73 => 
            array (
                'id' => '55e1f98b-5758-4af1-ae37-d03a3d9c1ee1',
                'puskesmas_id' => '44ae2500-66d5-4609-b55a-765255454ba8',
                'nama' => 'Bahagia 2',
                'desa_id' => 7210080010,
                'deleted_at' => NULL,
                'created_at' => '2022-10-06 15:53:42',
                'updated_at' => '2022-10-06 15:53:42',
            ),
            74 => 
            array (
                'id' => '55e4c9b0-91f6-4e62-8488-4bbdd3dddafd',
                'puskesmas_id' => '3a1c53b1-bc6e-4435-8cdb-ee5b010dda5f',
                'nama' => 'Kayu Manis',
                'desa_id' => 7210030014,
                'deleted_at' => NULL,
                'created_at' => '2022-10-06 15:53:42',
                'updated_at' => '2022-10-06 15:53:42',
            ),
            75 => 
            array (
                'id' => '55e7693a-0a9e-417b-bb15-e3a8be15d502',
                'puskesmas_id' => '156f4500-77dd-4e52-a616-2cef699e25e3',
                'nama' => 'Bina Kasih',
                'desa_id' => 7210010001,
                'deleted_at' => NULL,
                'created_at' => '2022-10-06 15:53:42',
                'updated_at' => '2022-10-06 15:53:42',
            ),
            76 => 
            array (
                'id' => '563cc696-b761-4d24-815a-61a11ef2ae18',
                'puskesmas_id' => '1af794fa-ed12-4c58-8e9e-838027b5dc26',
                'nama' => 'Mawar',
                'desa_id' => 7210010005,
                'deleted_at' => NULL,
                'created_at' => '2022-10-06 15:53:42',
                'updated_at' => '2022-10-06 15:53:42',
            ),
            77 => 
            array (
                'id' => '569bd272-e65e-4168-9105-feec2e2c5075',
                'puskesmas_id' => '703821a6-0bc6-4d4a-b920-e808fc7b62f5',
                'nama' => 'Tora-Tora',
                'desa_id' => 7210100004,
                'deleted_at' => NULL,
                'created_at' => '2022-10-06 15:53:42',
                'updated_at' => '2022-10-06 15:53:42',
            ),
            78 => 
            array (
                'id' => '576e3063-81c0-4bc6-b7a7-ac46a237b2f8',
                'puskesmas_id' => '44ae2500-66d5-4609-b55a-765255454ba8',
                'nama' => 'Merpati 1',
                'desa_id' => 86623,
                'deleted_at' => NULL,
                'created_at' => '2022-10-06 15:53:42',
                'updated_at' => '2022-10-06 15:53:42',
            ),
            79 => 
            array (
                'id' => '57ed7492-3daa-45b7-86fb-d47dd92f8cd4',
                'puskesmas_id' => 'bcebe2cd-03bf-4ed8-8e32-7ce7adfca380',
                'nama' => 'Anyelir',
                'desa_id' => 7210040004,
                'deleted_at' => NULL,
                'created_at' => '2022-10-06 15:53:42',
                'updated_at' => '2022-10-06 15:53:42',
            ),
            80 => 
            array (
                'id' => '58abaa19-887e-4eec-b1f5-60fd515b15a9',
                'puskesmas_id' => '2cc7de06-3532-4571-85c9-1f27195ad4eb',
                'nama' => 'Wawujai',
                'desa_id' => 7210140012,
                'deleted_at' => NULL,
                'created_at' => '2022-10-06 15:53:42',
                'updated_at' => '2022-10-06 15:53:42',
            ),
            81 => 
            array (
                'id' => '5a4de32f-5600-4575-9c11-a49bea44c3ee',
                'puskesmas_id' => '44ae2500-66d5-4609-b55a-765255454ba8',
                'nama' => 'Cahaya 1',
                'desa_id' => 7210080002,
                'deleted_at' => NULL,
                'created_at' => '2022-10-06 15:53:42',
                'updated_at' => '2022-10-06 15:53:42',
            ),
            82 => 
            array (
                'id' => '5ad5e33a-b49c-44b3-b835-e2b8a2b81291',
                'puskesmas_id' => 'cf29a8c0-59c5-4822-81de-6d2e29779039',
                'nama' => 'Muria',
                'desa_id' => 7210020003,
                'deleted_at' => NULL,
                'created_at' => '2022-10-06 15:53:42',
                'updated_at' => '2022-10-06 15:53:42',
            ),
            83 => 
            array (
                'id' => '5b898bac-4363-4cd5-bde0-7ebddc2a14d1',
                'puskesmas_id' => 'cf29a8c0-59c5-4822-81de-6d2e29779039',
                'nama' => 'Seruni',
                'desa_id' => 7210020012,
                'deleted_at' => NULL,
                'created_at' => '2022-10-06 15:53:42',
                'updated_at' => '2022-10-06 15:53:42',
            ),
            84 => 
            array (
                'id' => '5cdd74ab-daa5-40f9-bdd7-324d79143af9',
                'puskesmas_id' => '44ae2500-66d5-4609-b55a-765255454ba8',
                'nama' => 'Bahagia 1',
                'desa_id' => 7210080010,
                'deleted_at' => NULL,
                'created_at' => '2022-10-06 15:53:42',
                'updated_at' => '2022-10-06 15:53:42',
            ),
            85 => 
            array (
                'id' => '5e14f238-e3f2-487b-bc62-327f8c204f97',
                'puskesmas_id' => '3a1c53b1-bc6e-4435-8cdb-ee5b010dda5f',
                'nama' => 'Anggrek 2',
                'desa_id' => 7210030009,
                'deleted_at' => NULL,
                'created_at' => '2022-10-06 15:53:42',
                'updated_at' => '2022-10-06 15:53:42',
            ),
            86 => 
            array (
                'id' => '614bddc5-5f7c-49f8-bbe3-99c961e8770f',
                'puskesmas_id' => '60106a37-fb28-462c-9694-18e35e68d7f7',
                'nama' => 'Melati 2',
                'desa_id' => 7210050002,
                'deleted_at' => NULL,
                'created_at' => '2022-10-06 15:53:42',
                'updated_at' => '2022-10-06 15:53:42',
            ),
            87 => 
            array (
                'id' => '63dae75e-aa9f-4b0f-b0db-3dc48891fb1c',
                'puskesmas_id' => '1fc65f68-19bc-4924-9c3c-f6c772cf023f',
                'nama' => 'Upgk',
                'desa_id' => 7210120010,
                'deleted_at' => NULL,
                'created_at' => '2022-10-06 15:53:42',
                'updated_at' => '2022-10-06 15:53:42',
            ),
            88 => 
            array (
                'id' => '648cf938-476b-4e0f-989c-03d4862a9a94',
                'puskesmas_id' => '1fc65f68-19bc-4924-9c3c-f6c772cf023f',
                'nama' => 'Nusa Indah',
                'desa_id' => 7210120004,
                'deleted_at' => NULL,
                'created_at' => '2022-10-06 15:53:42',
                'updated_at' => '2022-10-06 15:53:42',
            ),
            89 => 
            array (
                'id' => '65ac14fc-74b4-4abd-86b6-3d7ec8c7a9cb',
                'puskesmas_id' => 'bcebe2cd-03bf-4ed8-8e32-7ce7adfca380',
                'nama' => 'Kanawu Bawah',
                'desa_id' => 7210040005,
                'deleted_at' => NULL,
                'created_at' => '2022-10-06 15:53:42',
                'updated_at' => '2022-10-06 15:53:42',
            ),
            90 => 
            array (
                'id' => '662715e1-d085-4a86-950e-75b68c20f4e9',
                'puskesmas_id' => '1fc65f68-19bc-4924-9c3c-f6c772cf023f',
                'nama' => 'Anggrek',
                'desa_id' => 7210120015,
                'deleted_at' => NULL,
                'created_at' => '2022-10-06 15:53:41',
                'updated_at' => '2022-10-06 15:53:41',
            ),
            91 => 
            array (
                'id' => '667dd09a-9401-4b2c-b895-76c41578506e',
                'puskesmas_id' => '4d5c2f57-8f42-491c-83d4-78c198788e93',
                'nama' => 'Seroja 2',
                'desa_id' => 7210110008,
                'deleted_at' => NULL,
                'created_at' => '2022-10-06 15:53:42',
                'updated_at' => '2022-10-06 15:53:42',
            ),
            92 => 
            array (
                'id' => '66e9c00e-de32-46ed-b512-9c8b5c1a5bbc',
                'puskesmas_id' => '44ae2500-66d5-4609-b55a-765255454ba8',
                'nama' => 'Sedap Malam',
                'desa_id' => 7210080001,
                'deleted_at' => NULL,
                'created_at' => '2022-10-06 15:53:42',
                'updated_at' => '2022-10-06 15:53:42',
            ),
            93 => 
            array (
                'id' => '6704e06a-6e83-4455-b261-e5aa4e6b2ee4',
                'puskesmas_id' => '4d5c2f57-8f42-491c-83d4-78c198788e93',
                'nama' => 'Teratai 3',
                'desa_id' => 7210110004,
                'deleted_at' => NULL,
                'created_at' => '2022-10-06 15:53:42',
                'updated_at' => '2022-10-06 15:53:42',
            ),
            94 => 
            array (
                'id' => '6794a977-acdb-4926-93d9-d965701bf38d',
                'puskesmas_id' => 'bcebe2cd-03bf-4ed8-8e32-7ce7adfca380',
                'nama' => 'Kanawu Atas',
                'desa_id' => 7210040005,
                'deleted_at' => NULL,
                'created_at' => '2022-10-06 15:53:42',
                'updated_at' => '2022-10-06 15:53:42',
            ),
            95 => 
            array (
                'id' => '68511e0b-bca9-426d-8bd5-32810e57efa9',
                'puskesmas_id' => '1fc65f68-19bc-4924-9c3c-f6c772cf023f',
                'nama' => 'Mawar',
                'desa_id' => 876,
                'deleted_at' => NULL,
                'created_at' => '2022-10-06 15:53:42',
                'updated_at' => '2022-10-06 15:53:42',
            ),
            96 => 
            array (
                'id' => '69726c19-0f37-4561-b9a6-346899559eb1',
                'puskesmas_id' => '3a1c53b1-bc6e-4435-8cdb-ee5b010dda5f',
                'nama' => 'Melati 1',
                'desa_id' => 7210030009,
                'deleted_at' => NULL,
                'created_at' => '2022-10-06 15:53:42',
                'updated_at' => '2022-10-06 15:53:42',
            ),
            97 => 
            array (
                'id' => '6a6a8690-8718-43f9-b07c-d985bfc7f176',
                'puskesmas_id' => 'bcebe2cd-03bf-4ed8-8e32-7ce7adfca380',
                'nama' => 'Kasih Ibu',
                'desa_id' => 7210040003,
                'deleted_at' => NULL,
                'created_at' => '2022-10-06 15:53:42',
                'updated_at' => '2022-10-06 15:53:42',
            ),
            98 => 
            array (
                'id' => '6a73570d-ebb6-4987-a059-02504d8caea4',
                'puskesmas_id' => '3a1c53b1-bc6e-4435-8cdb-ee5b010dda5f',
                'nama' => 'Bahagia',
                'desa_id' => 7210030015,
                'deleted_at' => NULL,
                'created_at' => '2022-10-06 15:53:42',
                'updated_at' => '2022-10-06 15:53:42',
            ),
            99 => 
            array (
                'id' => '6a773cc1-9088-4ecd-87e3-2f5c83726ff9',
                'puskesmas_id' => '1fc65f68-19bc-4924-9c3c-f6c772cf023f',
                'nama' => 'Mawar',
                'desa_id' => 7210120010,
                'deleted_at' => NULL,
                'created_at' => '2022-10-06 15:53:42',
                'updated_at' => '2022-10-06 15:53:42',
            ),
            100 => 
            array (
                'id' => '6ab87818-fa95-4181-8dec-8c08e6da517c',
                'puskesmas_id' => '1fc65f68-19bc-4924-9c3c-f6c772cf023f',
                'nama' => 'Sp 2',
                'desa_id' => 7210120018,
                'deleted_at' => NULL,
                'created_at' => '2022-10-06 15:53:42',
                'updated_at' => '2022-10-06 15:53:42',
            ),
            101 => 
            array (
                'id' => '6d89ec1f-c19d-4702-bb1b-317c5970ab00',
                'puskesmas_id' => '3a1c53b1-bc6e-4435-8cdb-ee5b010dda5f',
                'nama' => 'Citra Ue Rehe',
                'desa_id' => 7210030007,
                'deleted_at' => NULL,
                'created_at' => '2022-10-06 15:53:42',
                'updated_at' => '2022-10-06 15:53:42',
            ),
            102 => 
            array (
                'id' => '6e636b5a-d3e7-4f5c-b950-3079bda8e0de',
                'puskesmas_id' => '2cc7de06-3532-4571-85c9-1f27195ad4eb',
                'nama' => 'Mantantimali',
                'desa_id' => 7210140009,
                'deleted_at' => NULL,
                'created_at' => '2022-10-06 15:53:42',
                'updated_at' => '2022-10-06 15:53:42',
            ),
            103 => 
            array (
                'id' => '6f5ec4d0-03b5-4cc8-af56-f494a1ffe9b5',
                'puskesmas_id' => 'f3df3af5-38a5-432e-8daf-a69fe47e0234',
                'nama' => 'Tadulako I',
                'desa_id' => 7210130004,
                'deleted_at' => NULL,
                'created_at' => '2022-10-06 15:53:42',
                'updated_at' => '2022-10-06 15:53:42',
            ),
            104 => 
            array (
                'id' => '7078a164-ac35-496a-b990-64983727cfd2',
                'puskesmas_id' => '1fc65f68-19bc-4924-9c3c-f6c772cf023f',
                'nama' => 'Furing',
                'desa_id' => 7210120012,
                'deleted_at' => NULL,
                'created_at' => '2022-10-06 15:53:41',
                'updated_at' => '2022-10-06 15:53:41',
            ),
            105 => 
            array (
                'id' => '741fae8f-500e-47cb-aafd-0e9a682598b8',
                'puskesmas_id' => 'f3df3af5-38a5-432e-8daf-a69fe47e0234',
                'nama' => 'Tunas Kasih',
                'desa_id' => 7210130001,
                'deleted_at' => NULL,
                'created_at' => '2022-10-06 15:53:42',
                'updated_at' => '2022-10-06 15:53:42',
            ),
            106 => 
            array (
                'id' => '744253eb-f9bf-45b0-b019-869fc07f1dc2',
                'puskesmas_id' => '4d5c2f57-8f42-491c-83d4-78c198788e93',
                'nama' => 'Anutapura 2',
                'desa_id' => 7210110009,
                'deleted_at' => NULL,
                'created_at' => '2022-10-06 15:53:42',
                'updated_at' => '2022-10-06 15:53:42',
            ),
            107 => 
            array (
                'id' => '765291ef-69eb-4266-a04f-b7f9ea319b9e',
                'puskesmas_id' => '1fc65f68-19bc-4924-9c3c-f6c772cf023f',
                'nama' => 'Tora Ranga',
                'desa_id' => 7210120006,
                'deleted_at' => NULL,
                'created_at' => '2022-10-06 15:53:42',
                'updated_at' => '2022-10-06 15:53:42',
            ),
            108 => 
            array (
                'id' => '76b14601-4afd-4e91-b43b-fc9a2509e080',
                'puskesmas_id' => '4d5c2f57-8f42-491c-83d4-78c198788e93',
                'nama' => 'Anggrek 2',
                'desa_id' => 7210110011,
                'deleted_at' => NULL,
                'created_at' => '2022-10-06 15:53:42',
                'updated_at' => '2022-10-06 15:53:42',
            ),
            109 => 
            array (
                'id' => '76c96940-aebc-42e8-9907-9b6d3a73e9e4',
                'puskesmas_id' => '4d5c2f57-8f42-491c-83d4-78c198788e93',
                'nama' => 'Melati 3',
                'desa_id' => 7210110003,
                'deleted_at' => NULL,
                'created_at' => '2022-10-06 15:53:42',
                'updated_at' => '2022-10-06 15:53:42',
            ),
            110 => 
            array (
                'id' => '76e23d2d-7cb2-4e19-8367-a381f1e9e109',
                'puskesmas_id' => '263c41cd-e790-4d20-82ce-9206eb1147a9',
                'nama' => 'Permata Bunda',
                'desa_id' => 7210070001,
                'deleted_at' => NULL,
                'created_at' => '2022-10-06 15:53:42',
                'updated_at' => '2022-10-06 15:53:42',
            ),
            111 => 
            array (
                'id' => '76f6ab9d-f37b-46f6-bc7a-2552202913ec',
                'puskesmas_id' => '2cc7de06-3532-4571-85c9-1f27195ad4eb',
                'nama' => 'Lemosiranindi',
                'desa_id' => 7210140011,
                'deleted_at' => NULL,
                'created_at' => '2022-10-06 15:53:42',
                'updated_at' => '2022-10-06 15:53:42',
            ),
            112 => 
            array (
                'id' => '7967d3ab-0f95-4eac-97e5-df06afbdd862',
                'puskesmas_id' => '263c41cd-e790-4d20-82ce-9206eb1147a9',
                'nama' => 'Dahlia',
                'desa_id' => 7210070004,
                'deleted_at' => NULL,
                'created_at' => '2022-10-06 15:53:42',
                'updated_at' => '2022-10-06 15:53:42',
            ),
            113 => 
            array (
                'id' => '7a8b8154-a40f-4622-a6b4-344fda287987',
                'puskesmas_id' => 'cf29a8c0-59c5-4822-81de-6d2e29779039',
                'nama' => 'Anggrek',
                'desa_id' => 7210020004,
                'deleted_at' => NULL,
                'created_at' => '2022-10-06 15:53:42',
                'updated_at' => '2022-10-06 15:53:42',
            ),
            114 => 
            array (
                'id' => '7c097812-d4ae-4968-8dbc-97666a4bab44',
                'puskesmas_id' => '263c41cd-e790-4d20-82ce-9206eb1147a9',
                'nama' => 'Dahlia',
                'desa_id' => 7210070001,
                'deleted_at' => NULL,
                'created_at' => '2022-10-06 15:53:42',
                'updated_at' => '2022-10-06 15:53:42',
            ),
            115 => 
            array (
                'id' => '7c84ba52-e0ee-4253-ada5-38eff1dfc435',
                'puskesmas_id' => '44ae2500-66d5-4609-b55a-765255454ba8',
                'nama' => 'Sedap Malam Padena',
                'desa_id' => 7210080001,
                'deleted_at' => NULL,
                'created_at' => '2022-10-06 15:53:42',
                'updated_at' => '2022-10-06 15:53:42',
            ),
            116 => 
            array (
                'id' => '7d155fe8-74c1-4482-b7b5-54bb5fed5456',
                'puskesmas_id' => 'cf29a8c0-59c5-4822-81de-6d2e29779039',
                'nama' => 'Aster',
                'desa_id' => 7210020009,
                'deleted_at' => NULL,
                'created_at' => '2022-10-06 15:53:42',
                'updated_at' => '2022-10-06 15:53:42',
            ),
            117 => 
            array (
                'id' => '7fbbf4a9-08c4-4c2f-be98-f06d2faa596d',
                'puskesmas_id' => '703821a6-0bc6-4d4a-b920-e808fc7b62f5',
                'nama' => 'Kamaimo',
                'desa_id' => 7210100003,
                'deleted_at' => NULL,
                'created_at' => '2022-10-06 15:53:42',
                'updated_at' => '2022-10-06 15:53:42',
            ),
            118 => 
            array (
                'id' => '85674b94-5e49-425a-901f-74e4d3f48d9c',
                'puskesmas_id' => '4d5c2f57-8f42-491c-83d4-78c198788e93',
                'nama' => 'Mawar 1',
                'desa_id' => 7210110005,
                'deleted_at' => NULL,
                'created_at' => '2022-10-06 15:53:42',
                'updated_at' => '2022-10-06 15:53:42',
            ),
            119 => 
            array (
                'id' => '87a78e23-a1d3-4314-ab6a-db0739b7a358',
                'puskesmas_id' => '263c41cd-e790-4d20-82ce-9206eb1147a9',
                'nama' => 'Mawar',
                'desa_id' => 7210070007,
                'deleted_at' => NULL,
                'created_at' => '2022-10-06 15:53:42',
                'updated_at' => '2022-10-06 15:53:42',
            ),
            120 => 
            array (
                'id' => '888fc1da-695e-4c14-ab78-684455d26231',
                'puskesmas_id' => '3a1c53b1-bc6e-4435-8cdb-ee5b010dda5f',
                'nama' => 'Kasih Ibu',
                'desa_id' => 7210150012,
                'deleted_at' => NULL,
                'created_at' => '2022-10-06 15:53:42',
                'updated_at' => '2022-10-06 15:53:42',
            ),
            121 => 
            array (
                'id' => '89ab40ec-7dae-4bd5-b402-3ca10fe66b95',
                'puskesmas_id' => '30cdc565-0bb9-4255-91d6-65443ddcdbc6',
                'nama' => 'Mekar',
                'desa_id' => 2,
                'deleted_at' => NULL,
                'created_at' => '2022-10-06 15:53:42',
                'updated_at' => '2022-10-06 15:53:42',
            ),
            122 => 
            array (
                'id' => '89fec73b-05fe-4bce-a3a9-335971d19bbd',
                'puskesmas_id' => 'bcebe2cd-03bf-4ed8-8e32-7ce7adfca380',
                'nama' => 'Teratai',
                'desa_id' => 7210040002,
                'deleted_at' => NULL,
                'created_at' => '2022-10-06 15:53:42',
                'updated_at' => '2022-10-06 15:53:42',
            ),
            123 => 
            array (
                'id' => '8ae066f6-4008-4981-a611-0bd011f63596',
                'puskesmas_id' => '4d5c2f57-8f42-491c-83d4-78c198788e93',
                'nama' => 'Teratai 1',
                'desa_id' => 7210110004,
                'deleted_at' => NULL,
                'created_at' => '2022-10-06 15:53:42',
                'updated_at' => '2022-10-06 15:53:42',
            ),
            124 => 
            array (
                'id' => '8daa17d7-05cc-43d3-99d5-cec52f12173f',
                'puskesmas_id' => '3a1c53b1-bc6e-4435-8cdb-ee5b010dda5f',
                'nama' => 'Seruni',
                'desa_id' => 7210030011,
                'deleted_at' => NULL,
                'created_at' => '2022-10-06 15:53:42',
                'updated_at' => '2022-10-06 15:53:42',
            ),
            125 => 
            array (
                'id' => '906dc1d4-1113-4adb-a295-ba01dac7c36d',
                'puskesmas_id' => '263c41cd-e790-4d20-82ce-9206eb1147a9',
                'nama' => 'Tumpuan Kasih',
                'desa_id' => 7210070005,
                'deleted_at' => NULL,
                'created_at' => '2022-10-06 15:53:42',
                'updated_at' => '2022-10-06 15:53:42',
            ),
            126 => 
            array (
                'id' => '9101d466-67ff-42b3-88e6-03f08dc4a689',
                'puskesmas_id' => '1af794fa-ed12-4c58-8e9e-838027b5dc26',
                'nama' => 'Tunas Harapan',
                'desa_id' => 7210010007,
                'deleted_at' => NULL,
                'created_at' => '2022-10-06 15:53:42',
                'updated_at' => '2022-10-06 15:53:42',
            ),
            127 => 
            array (
                'id' => '92f99168-ab8d-4bd0-900b-4b6c5f204946',
                'puskesmas_id' => '703821a6-0bc6-4d4a-b920-e808fc7b62f5',
                'nama' => 'Binobo',
                'desa_id' => 7210100005,
                'deleted_at' => NULL,
                'created_at' => '2022-10-06 15:53:42',
                'updated_at' => '2022-10-06 15:53:42',
            ),
            128 => 
            array (
                'id' => '936511fc-66ff-48d9-8d3b-8bde9b64a74c',
                'puskesmas_id' => '263c41cd-e790-4d20-82ce-9206eb1147a9',
                'nama' => 'Ojo Lali',
                'desa_id' => 7210070006,
                'deleted_at' => NULL,
                'created_at' => '2022-10-06 15:53:42',
                'updated_at' => '2022-10-06 15:53:42',
            ),
            129 => 
            array (
                'id' => '937b3749-77fa-4c2d-9b9e-834ad9c3dfba',
                'puskesmas_id' => '263c41cd-e790-4d20-82ce-9206eb1147a9',
                'nama' => 'Efrata',
                'desa_id' => 7210070005,
                'deleted_at' => NULL,
                'created_at' => '2022-10-06 15:53:42',
                'updated_at' => '2022-10-06 15:53:42',
            ),
            130 => 
            array (
                'id' => '93a1f85b-6de1-4b25-be71-131cdf95955f',
                'puskesmas_id' => '30cdc565-0bb9-4255-91d6-65443ddcdbc6',
                'nama' => 'Seroja',
                'desa_id' => 5,
                'deleted_at' => NULL,
                'created_at' => '2022-10-06 15:53:42',
                'updated_at' => '2022-10-06 15:53:42',
            ),
            131 => 
            array (
                'id' => '97828e30-5231-4373-9cd9-1e3f5d834817',
                'puskesmas_id' => '1fc65f68-19bc-4924-9c3c-f6c772cf023f',
                'nama' => 'Sp 1',
                'desa_id' => 7210120018,
                'deleted_at' => NULL,
                'created_at' => '2022-10-06 15:53:42',
                'updated_at' => '2022-10-06 15:53:42',
            ),
            132 => 
            array (
                'id' => '97b52b8b-2ced-4663-9d02-a10c95da5793',
                'puskesmas_id' => '1fc65f68-19bc-4924-9c3c-f6c772cf023f',
                'nama' => 'Anggrek',
                'desa_id' => 7210120003,
                'deleted_at' => NULL,
                'created_at' => '2022-10-06 15:53:41',
                'updated_at' => '2022-10-06 15:53:41',
            ),
            133 => 
            array (
                'id' => '97d2d0d0-20de-40ff-8717-c19a4af393f3',
                'puskesmas_id' => '703821a6-0bc6-4d4a-b920-e808fc7b62f5',
                'nama' => 'Ramba',
                'desa_id' => 7210100001,
                'deleted_at' => NULL,
                'created_at' => '2022-10-06 15:53:42',
                'updated_at' => '2022-10-06 15:53:42',
            ),
            134 => 
            array (
                'id' => '9832b688-0508-468f-b49c-be2c343cb53a',
                'puskesmas_id' => '44ae2500-66d5-4609-b55a-765255454ba8',
                'nama' => 'Anggur 1',
                'desa_id' => 7210150015,
                'deleted_at' => NULL,
                'created_at' => '2022-10-06 15:53:42',
                'updated_at' => '2022-10-06 15:53:42',
            ),
            135 => 
            array (
                'id' => '989e52c5-558b-4a9a-9f55-2cb9d4d9bf44',
                'puskesmas_id' => '1fc65f68-19bc-4924-9c3c-f6c772cf023f',
                'nama' => 'Anggrek',
                'desa_id' => 7210120010,
                'deleted_at' => NULL,
                'created_at' => '2022-10-06 15:53:41',
                'updated_at' => '2022-10-06 15:53:41',
            ),
            136 => 
            array (
                'id' => '9bb99c4a-5822-4458-a9a0-65ef7da969dc',
                'puskesmas_id' => '44ae2500-66d5-4609-b55a-765255454ba8',
                'nama' => 'Coklat Jaya',
                'desa_id' => 7210080007,
                'deleted_at' => NULL,
                'created_at' => '2022-10-06 15:53:42',
                'updated_at' => '2022-10-06 15:53:42',
            ),
            137 => 
            array (
                'id' => '9c50585d-8bd8-4938-8bfe-70e6e0c10303',
                'puskesmas_id' => '3a1c53b1-bc6e-4435-8cdb-ee5b010dda5f',
                'nama' => 'Dahlia',
                'desa_id' => 7210150012,
                'deleted_at' => NULL,
                'created_at' => '2022-10-06 15:53:42',
                'updated_at' => '2022-10-06 15:53:42',
            ),
            138 => 
            array (
                'id' => '9c7033e9-3b8e-4e71-b3e9-d2d0b66974f6',
                'puskesmas_id' => '30cdc565-0bb9-4255-91d6-65443ddcdbc6',
                'nama' => 'Melati',
                'desa_id' => 7210090004,
                'deleted_at' => NULL,
                'created_at' => '2022-10-06 15:53:42',
                'updated_at' => '2022-10-06 15:53:42',
            ),
            139 => 
            array (
                'id' => '9ee0c158-4d9f-4148-993b-929615858ca3',
                'puskesmas_id' => '2cc7de06-3532-4571-85c9-1f27195ad4eb',
                'nama' => 'Wanja',
                'desa_id' => 7210140004,
                'deleted_at' => NULL,
                'created_at' => '2022-10-06 15:53:42',
                'updated_at' => '2022-10-06 15:53:42',
            ),
            140 => 
            array (
                'id' => '9ee2f451-e8ae-4e8e-a555-aa721182b6fc',
                'puskesmas_id' => '2cc7de06-3532-4571-85c9-1f27195ad4eb',
                'nama' => 'Onjolosi',
                'desa_id' => 7210140004,
                'deleted_at' => NULL,
                'created_at' => '2022-10-06 15:53:42',
                'updated_at' => '2022-10-06 15:53:42',
            ),
            141 => 
            array (
                'id' => '9f2f6b92-deff-4a44-8613-d761dc4a7e0c',
                'puskesmas_id' => '44ae2500-66d5-4609-b55a-765255454ba8',
                'nama' => 'Cemara Balai Desa',
                'desa_id' => 7210080004,
                'deleted_at' => NULL,
                'created_at' => '2022-10-06 15:53:42',
                'updated_at' => '2022-10-06 15:53:42',
            ),
            142 => 
            array (
                'id' => '9f89314e-1c9c-4966-877b-0f410ea4e913',
                'puskesmas_id' => '1fc65f68-19bc-4924-9c3c-f6c772cf023f',
            'nama' => 'Mawar (Dsn 2)',
                'desa_id' => 7210120013,
                'deleted_at' => NULL,
                'created_at' => '2022-10-06 15:53:42',
                'updated_at' => '2022-10-06 15:53:42',
            ),
            143 => 
            array (
                'id' => '9fae3e92-6044-4be6-a78d-9da043f238df',
                'puskesmas_id' => '4d5c2f57-8f42-491c-83d4-78c198788e93',
                'nama' => 'Anggrek 1',
                'desa_id' => 7210110011,
                'deleted_at' => NULL,
                'created_at' => '2022-10-06 15:53:42',
                'updated_at' => '2022-10-06 15:53:42',
            ),
            144 => 
            array (
                'id' => 'a0238966-e494-491e-b383-76384285833a',
                'puskesmas_id' => '1fc65f68-19bc-4924-9c3c-f6c772cf023f',
                'nama' => 'Sejahtera',
                'desa_id' => 7210120011,
                'deleted_at' => NULL,
                'created_at' => '2022-10-06 15:53:42',
                'updated_at' => '2022-10-06 15:53:42',
            ),
            145 => 
            array (
                'id' => 'a0ab6c24-838c-46ef-9d32-c01793b5178e',
                'puskesmas_id' => '1fc65f68-19bc-4924-9c3c-f6c772cf023f',
                'nama' => 'Parovo',
                'desa_id' => 7210120014,
                'deleted_at' => NULL,
                'created_at' => '2022-10-06 15:53:42',
                'updated_at' => '2022-10-06 15:53:42',
            ),
            146 => 
            array (
                'id' => 'a1f8b179-32a6-4cb2-8617-817bb7c1174b',
                'puskesmas_id' => '1af794fa-ed12-4c58-8e9e-838027b5dc26',
                'nama' => 'Harapan Baru',
                'desa_id' => 7210010010,
                'deleted_at' => NULL,
                'created_at' => '2022-10-06 15:53:42',
                'updated_at' => '2022-10-06 15:53:42',
            ),
            147 => 
            array (
                'id' => 'a55b0b78-4f45-44c9-97cf-d58077dc32a3',
                'puskesmas_id' => '2cc7de06-3532-4571-85c9-1f27195ad4eb',
                'nama' => 'Dombu',
                'desa_id' => 7210140006,
                'deleted_at' => NULL,
                'created_at' => '2022-10-06 15:53:42',
                'updated_at' => '2022-10-06 15:53:42',
            ),
            148 => 
            array (
                'id' => 'a681d32c-5355-49c9-860f-688a4660fe3b',
                'puskesmas_id' => '44ae2500-66d5-4609-b55a-765255454ba8',
                'nama' => 'Cemara Boyamilo',
                'desa_id' => 7210080004,
                'deleted_at' => NULL,
                'created_at' => '2022-10-06 15:53:42',
                'updated_at' => '2022-10-06 15:53:42',
            ),
            149 => 
            array (
                'id' => 'a6ca3f5f-423c-4a61-a348-c39d886b3804',
                'puskesmas_id' => '3a1c53b1-bc6e-4435-8cdb-ee5b010dda5f',
                'nama' => 'Pomulia',
                'desa_id' => 7210030016,
                'deleted_at' => NULL,
                'created_at' => '2022-10-06 15:53:42',
                'updated_at' => '2022-10-06 15:53:42',
            ),
            150 => 
            array (
                'id' => 'a6fcb6b8-1fc8-49e0-af14-47366c55efb5',
                'puskesmas_id' => '44ae2500-66d5-4609-b55a-765255454ba8',
                'nama' => 'Wisolo Indah Balai Desa',
                'desa_id' => 7210080008,
                'deleted_at' => NULL,
                'created_at' => '2022-10-06 15:53:42',
                'updated_at' => '2022-10-06 15:53:42',
            ),
            151 => 
            array (
                'id' => 'a86683fb-8deb-49c1-8b8f-94af89ba925c',
                'puskesmas_id' => '263c41cd-e790-4d20-82ce-9206eb1147a9',
                'nama' => 'Lakuta',
                'desa_id' => 7210070004,
                'deleted_at' => NULL,
                'created_at' => '2022-10-06 15:53:42',
                'updated_at' => '2022-10-06 15:53:42',
            ),
            152 => 
            array (
                'id' => 'a91a0f13-b7d8-4307-a239-43e7eb5d640b',
                'puskesmas_id' => '1fc65f68-19bc-4924-9c3c-f6c772cf023f',
                'nama' => 'Anggrek 1',
                'desa_id' => 7210120012,
                'deleted_at' => NULL,
                'created_at' => '2022-10-06 15:53:41',
                'updated_at' => '2022-10-06 15:53:41',
            ),
            153 => 
            array (
                'id' => 'a939437d-d9d2-423f-91d0-b79a8ea67fce',
                'puskesmas_id' => '30cdc565-0bb9-4255-91d6-65443ddcdbc6',
                'nama' => 'Sejahtera',
                'desa_id' => 7210090009,
                'deleted_at' => NULL,
                'created_at' => '2022-10-06 15:53:42',
                'updated_at' => '2022-10-06 15:53:42',
            ),
            154 => 
            array (
                'id' => 'abb71251-afb8-4531-95db-36c0e7e7ac60',
                'puskesmas_id' => '703821a6-0bc6-4d4a-b920-e808fc7b62f5',
                'nama' => 'Naroa',
                'desa_id' => 7210100004,
                'deleted_at' => NULL,
                'created_at' => '2022-10-06 15:53:42',
                'updated_at' => '2022-10-06 15:53:42',
            ),
            155 => 
            array (
                'id' => 'acf58604-08ed-4e78-a453-d4362561a41f',
                'puskesmas_id' => '156f4500-77dd-4e52-a616-2cef699e25e3',
                'nama' => 'Bougenvil',
                'desa_id' => 7210010016,
                'deleted_at' => NULL,
                'created_at' => '2022-10-06 15:53:42',
                'updated_at' => '2022-10-06 15:53:42',
            ),
            156 => 
            array (
                'id' => 'ae272604-2a63-4d39-80a8-521d4c8a1e3a',
                'puskesmas_id' => '1fc65f68-19bc-4924-9c3c-f6c772cf023f',
                'nama' => 'Upgk',
                'desa_id' => 7210120009,
                'deleted_at' => NULL,
                'created_at' => '2022-10-06 15:53:42',
                'updated_at' => '2022-10-06 15:53:42',
            ),
            157 => 
            array (
                'id' => 'aef86d24-55b8-4b94-a37a-c92603de35e6',
                'puskesmas_id' => '60106a37-fb28-462c-9694-18e35e68d7f7',
                'nama' => 'Mentari 2',
                'desa_id' => 7210050005,
                'deleted_at' => NULL,
                'created_at' => '2022-10-06 15:53:42',
                'updated_at' => '2022-10-06 15:53:42',
            ),
            158 => 
            array (
                'id' => 'afb45bdd-5682-486c-8cc1-7c1b690c3757',
                'puskesmas_id' => 'cf29a8c0-59c5-4822-81de-6d2e29779039',
                'nama' => 'Bogenvil 1',
                'desa_id' => 7210020010,
                'deleted_at' => NULL,
                'created_at' => '2022-10-06 15:53:42',
                'updated_at' => '2022-10-06 15:53:42',
            ),
            159 => 
            array (
                'id' => 'b099e0a8-709e-4d84-977e-39537cfd0adf',
                'puskesmas_id' => '2cc7de06-3532-4571-85c9-1f27195ad4eb',
                'nama' => 'Dopi',
                'desa_id' => 7210140012,
                'deleted_at' => NULL,
                'created_at' => '2022-10-06 15:53:42',
                'updated_at' => '2022-10-06 15:53:42',
            ),
            160 => 
            array (
                'id' => 'b1dfe1c6-63b0-4bd0-9c43-d0e0b22ee76d',
                'puskesmas_id' => 'cf29a8c0-59c5-4822-81de-6d2e29779039',
                'nama' => 'Kamboja',
                'desa_id' => 7210020011,
                'deleted_at' => NULL,
                'created_at' => '2022-10-06 15:53:42',
                'updated_at' => '2022-10-06 15:53:42',
            ),
            161 => 
            array (
                'id' => 'b3132c8c-6d03-4550-85a9-9d343174b67a',
                'puskesmas_id' => 'f3df3af5-38a5-432e-8daf-a69fe47e0234',
                'nama' => 'Flamboyan 3',
                'desa_id' => 7210130009,
                'deleted_at' => NULL,
                'created_at' => '2022-10-06 15:53:42',
                'updated_at' => '2022-10-06 15:53:42',
            ),
            162 => 
            array (
                'id' => 'b6ea58c9-56a3-4e3d-aecc-7c3c795320cc',
                'puskesmas_id' => 'f3df3af5-38a5-432e-8daf-a69fe47e0234',
                'nama' => 'Kamaipura Ii',
                'desa_id' => 7210130003,
                'deleted_at' => NULL,
                'created_at' => '2022-10-06 15:53:42',
                'updated_at' => '2022-10-06 15:53:42',
            ),
            163 => 
            array (
                'id' => 'b7496319-7fce-4dfa-a98f-5b0ad07d49c2',
                'puskesmas_id' => '1fc65f68-19bc-4924-9c3c-f6c772cf023f',
                'nama' => 'Kinta',
                'desa_id' => 7210120014,
                'deleted_at' => NULL,
                'created_at' => '2022-10-06 15:53:42',
                'updated_at' => '2022-10-06 15:53:42',
            ),
            164 => 
            array (
                'id' => 'b78f03c0-d651-4dd8-bed1-21ac1eb4cd3b',
                'puskesmas_id' => '1fc65f68-19bc-4924-9c3c-f6c772cf023f',
                'nama' => 'Rantekala',
                'desa_id' => 7210120017,
                'deleted_at' => NULL,
                'created_at' => '2022-10-06 15:53:42',
                'updated_at' => '2022-10-06 15:53:42',
            ),
            165 => 
            array (
                'id' => 'b86786b4-7e26-49ad-aa49-91b7e2049ac6',
                'puskesmas_id' => '1fc65f68-19bc-4924-9c3c-f6c772cf023f',
                'nama' => 'Taman Budaya',
                'desa_id' => 7210120005,
                'deleted_at' => NULL,
                'created_at' => '2022-10-06 15:53:42',
                'updated_at' => '2022-10-06 15:53:42',
            ),
            166 => 
            array (
                'id' => 'b8ddbfa2-9b06-44ba-a495-910b93efa8ab',
                'puskesmas_id' => '1fc65f68-19bc-4924-9c3c-f6c772cf023f',
                'nama' => 'Melati 2',
                'desa_id' => 7210120012,
                'deleted_at' => NULL,
                'created_at' => '2022-10-06 15:53:42',
                'updated_at' => '2022-10-06 15:53:42',
            ),
            167 => 
            array (
                'id' => 'b8ecc8db-b03f-498d-ba88-a10d44f9298a',
                'puskesmas_id' => '60106a37-fb28-462c-9694-18e35e68d7f7',
                'nama' => 'Mekar 2',
                'desa_id' => 7210050001,
                'deleted_at' => NULL,
                'created_at' => '2022-10-06 15:53:42',
                'updated_at' => '2022-10-06 15:53:42',
            ),
            168 => 
            array (
                'id' => 'b9b1a443-c533-4e84-ae33-0faa7a7f6eea',
                'puskesmas_id' => '44ae2500-66d5-4609-b55a-765255454ba8',
                'nama' => 'Coklat Poi',
                'desa_id' => 7210080011,
                'deleted_at' => NULL,
                'created_at' => '2022-10-06 15:53:42',
                'updated_at' => '2022-10-06 15:53:42',
            ),
            169 => 
            array (
                'id' => 'bb18b8af-7791-4147-ab9c-60879527b0ad',
                'puskesmas_id' => '703821a6-0bc6-4d4a-b920-e808fc7b62f5',
                'nama' => 'Anatapura',
                'desa_id' => 7210100004,
                'deleted_at' => NULL,
                'created_at' => '2022-10-06 15:53:42',
                'updated_at' => '2022-10-06 15:53:42',
            ),
            170 => 
            array (
                'id' => 'bd9892d2-33b2-49aa-8ee3-62693f3a5de9',
                'puskesmas_id' => '1fc65f68-19bc-4924-9c3c-f6c772cf023f',
                'nama' => 'Dahlia',
                'desa_id' => 7210120015,
                'deleted_at' => NULL,
                'created_at' => '2022-10-06 15:53:41',
                'updated_at' => '2022-10-06 15:53:41',
            ),
            171 => 
            array (
                'id' => 'becc40c7-2592-4285-9824-c443a95beaae',
                'puskesmas_id' => '1fc65f68-19bc-4924-9c3c-f6c772cf023f',
                'nama' => 'Mawar 1',
                'desa_id' => 7210120012,
                'deleted_at' => NULL,
                'created_at' => '2022-10-06 15:53:42',
                'updated_at' => '2022-10-06 15:53:42',
            ),
            172 => 
            array (
                'id' => 'c00b02b9-53e9-422e-b66d-38b785c6230f',
                'puskesmas_id' => 'cf29a8c0-59c5-4822-81de-6d2e29779039',
                'nama' => 'Moa',
                'desa_id' => 7210020001,
                'deleted_at' => NULL,
                'created_at' => '2022-10-06 15:53:42',
                'updated_at' => '2022-10-06 15:53:42',
            ),
            173 => 
            array (
                'id' => 'c049fd9b-1c52-40ff-a51d-3b7ab0ae6c4c',
                'puskesmas_id' => '1fc65f68-19bc-4924-9c3c-f6c772cf023f',
                'nama' => 'Anggrek',
                'desa_id' => 7210120008,
                'deleted_at' => NULL,
                'created_at' => '2022-10-06 15:53:41',
                'updated_at' => '2022-10-06 15:53:41',
            ),
            174 => 
            array (
                'id' => 'c0aacf99-9434-4d0f-88d3-0af8b4b64ee5',
                'puskesmas_id' => '4d5c2f57-8f42-491c-83d4-78c198788e93',
                'nama' => 'Seroja 3',
                'desa_id' => 7210110008,
                'deleted_at' => NULL,
                'created_at' => '2022-10-06 15:53:42',
                'updated_at' => '2022-10-06 15:53:42',
            ),
            175 => 
            array (
                'id' => 'c0d6be95-620e-4ca4-bc9c-660d5caed0e5',
                'puskesmas_id' => '44ae2500-66d5-4609-b55a-765255454ba8',
                'nama' => 'Cemara Semanggi',
                'desa_id' => 7210080004,
                'deleted_at' => NULL,
                'created_at' => '2022-10-06 15:53:42',
                'updated_at' => '2022-10-06 15:53:42',
            ),
            176 => 
            array (
                'id' => 'c1bf16b5-f68b-4bd5-903e-f5f547a2eb85',
                'puskesmas_id' => '30cdc565-0bb9-4255-91d6-65443ddcdbc6',
                'nama' => 'Anutapura',
                'desa_id' => 7210090007,
                'deleted_at' => NULL,
                'created_at' => '2022-10-06 15:53:42',
                'updated_at' => '2022-10-06 15:53:42',
            ),
            177 => 
            array (
                'id' => 'c3c8809c-5c2b-4a32-9660-4b7e2256b4c3',
                'puskesmas_id' => '1fc65f68-19bc-4924-9c3c-f6c772cf023f',
                'nama' => 'Kamaipura',
                'desa_id' => 7210120002,
                'deleted_at' => NULL,
                'created_at' => '2022-10-06 15:53:41',
                'updated_at' => '2022-10-06 15:53:41',
            ),
            178 => 
            array (
                'id' => 'c5e5da31-5e6a-4b13-bc31-4d269ffb49a8',
                'puskesmas_id' => '1fc65f68-19bc-4924-9c3c-f6c772cf023f',
                'nama' => 'Tora-Tora',
                'desa_id' => 7210120002,
                'deleted_at' => NULL,
                'created_at' => '2022-10-06 15:53:42',
                'updated_at' => '2022-10-06 15:53:42',
            ),
            179 => 
            array (
                'id' => 'c606e11f-e0bb-49ae-9859-c56d3f6e3ac9',
                'puskesmas_id' => 'bcebe2cd-03bf-4ed8-8e32-7ce7adfca380',
                'nama' => 'Anggrek',
                'desa_id' => 7210040001,
                'deleted_at' => NULL,
                'created_at' => '2022-10-06 15:53:42',
                'updated_at' => '2022-10-06 15:53:42',
            ),
            180 => 
            array (
                'id' => 'c6d836de-a291-414d-a59b-336e0f45d198',
                'puskesmas_id' => '263c41cd-e790-4d20-82ce-9206eb1147a9',
                'nama' => 'Anggrek',
                'desa_id' => 7210070004,
                'deleted_at' => NULL,
                'created_at' => '2022-10-06 15:53:42',
                'updated_at' => '2022-10-06 15:53:42',
            ),
            181 => 
            array (
                'id' => 'c6df6e59-9835-4284-93c7-3cdefcdcdae6',
                'puskesmas_id' => '1fc65f68-19bc-4924-9c3c-f6c772cf023f',
                'nama' => 'Raflesya',
                'desa_id' => 7210120003,
                'deleted_at' => NULL,
                'created_at' => '2022-10-06 15:53:42',
                'updated_at' => '2022-10-06 15:53:42',
            ),
            182 => 
            array (
                'id' => 'c96450e8-dadb-45fa-8924-c1715f6c7062',
                'puskesmas_id' => '1af794fa-ed12-4c58-8e9e-838027b5dc26',
                'nama' => 'Adelweys',
                'desa_id' => 7210010009,
                'deleted_at' => NULL,
                'created_at' => '2022-10-06 15:53:42',
                'updated_at' => '2022-10-06 15:53:42',
            ),
            183 => 
            array (
                'id' => 'c9c8a32d-84e4-486f-91f2-270d96b0af90',
                'puskesmas_id' => 'f3df3af5-38a5-432e-8daf-a69fe47e0234',
                'nama' => 'Kamboja',
                'desa_id' => 7210130010,
                'deleted_at' => NULL,
                'created_at' => '2022-10-06 15:53:42',
                'updated_at' => '2022-10-06 15:53:42',
            ),
            184 => 
            array (
                'id' => 'ca0bd5a5-2560-488f-9998-e976897df558',
                'puskesmas_id' => '1fc65f68-19bc-4924-9c3c-f6c772cf023f',
                'nama' => 'Kasih',
                'desa_id' => 7210120009,
                'deleted_at' => NULL,
                'created_at' => '2022-10-06 15:53:41',
                'updated_at' => '2022-10-06 15:53:41',
            ),
            185 => 
            array (
                'id' => 'ca4984f6-8d07-4fe4-a19f-6b2603085811',
                'puskesmas_id' => '1fc65f68-19bc-4924-9c3c-f6c772cf023f',
                'nama' => 'Paguyuban',
                'desa_id' => 7210120011,
                'deleted_at' => NULL,
                'created_at' => '2022-10-06 15:53:42',
                'updated_at' => '2022-10-06 15:53:42',
            ),
            186 => 
            array (
                'id' => 'caa8ede4-fb7b-4270-9dbe-238d0f085c58',
                'puskesmas_id' => 'cf29a8c0-59c5-4822-81de-6d2e29779039',
                'nama' => 'Teratai',
                'desa_id' => 7210020008,
                'deleted_at' => NULL,
                'created_at' => '2022-10-06 15:53:42',
                'updated_at' => '2022-10-06 15:53:42',
            ),
            187 => 
            array (
                'id' => 'cb5d87f7-5098-4624-ba5e-cb27a4e015be',
                'puskesmas_id' => '44ae2500-66d5-4609-b55a-765255454ba8',
                'nama' => 'Wisolo Indah Atas',
                'desa_id' => 7210080008,
                'deleted_at' => NULL,
                'created_at' => '2022-10-06 15:53:42',
                'updated_at' => '2022-10-06 15:53:42',
            ),
            188 => 
            array (
                'id' => 'cb849697-9733-4657-a78b-d28730a52720',
                'puskesmas_id' => '1fc65f68-19bc-4924-9c3c-f6c772cf023f',
            'nama' => 'Nunu Njamboko (Beringin Kembar)',
                'desa_id' => 7210120011,
                'deleted_at' => NULL,
                'created_at' => '2022-10-06 15:53:42',
                'updated_at' => '2022-10-06 15:53:42',
            ),
            189 => 
            array (
                'id' => 'cc4a4a1d-6b50-468f-9d3a-c57759156989',
                'puskesmas_id' => '3a1c53b1-bc6e-4435-8cdb-ee5b010dda5f',
                'nama' => 'Pangana',
                'desa_id' => 7210030011,
                'deleted_at' => NULL,
                'created_at' => '2022-10-06 15:53:42',
                'updated_at' => '2022-10-06 15:53:42',
            ),
            190 => 
            array (
                'id' => 'cd24f8cf-11f4-438f-8627-b2d89e4bed8f',
                'puskesmas_id' => 'f3df3af5-38a5-432e-8daf-a69fe47e0234',
                'nama' => 'Mawar I',
                'desa_id' => 7210130005,
                'deleted_at' => NULL,
                'created_at' => '2022-10-06 15:53:42',
                'updated_at' => '2022-10-06 15:53:42',
            ),
            191 => 
            array (
                'id' => 'cdfe2327-e5d2-4a1a-ac2b-ae355023b424',
                'puskesmas_id' => '3a1c53b1-bc6e-4435-8cdb-ee5b010dda5f',
                'nama' => 'Puring',
                'desa_id' => 7210150012,
                'deleted_at' => NULL,
                'created_at' => '2022-10-06 15:53:42',
                'updated_at' => '2022-10-06 15:53:42',
            ),
            192 => 
            array (
                'id' => 'cec04b42-1b5c-4d0d-9e6d-236bc353e90d',
                'puskesmas_id' => '44ae2500-66d5-4609-b55a-765255454ba8',
                'nama' => 'Rambutan 3',
                'desa_id' => 7210080005,
                'deleted_at' => NULL,
                'created_at' => '2022-10-06 15:53:42',
                'updated_at' => '2022-10-06 15:53:42',
            ),
            193 => 
            array (
                'id' => 'cfebe64a-7915-4105-b333-e936c08d0ebc',
                'puskesmas_id' => '2cc7de06-3532-4571-85c9-1f27195ad4eb',
                'nama' => 'Tamoli',
                'desa_id' => 7210140010,
                'deleted_at' => NULL,
                'created_at' => '2022-10-06 15:53:42',
                'updated_at' => '2022-10-06 15:53:42',
            ),
            194 => 
            array (
                'id' => 'd1f4db9a-3ddc-42e5-9d8f-ae5fa49c6bd2',
                'puskesmas_id' => '4d5c2f57-8f42-491c-83d4-78c198788e93',
                'nama' => 'Teratai 2',
                'desa_id' => 7210110004,
                'deleted_at' => NULL,
                'created_at' => '2022-10-06 15:53:42',
                'updated_at' => '2022-10-06 15:53:42',
            ),
            195 => 
            array (
                'id' => 'd25f00dd-6f1a-4e30-8dcf-7685acb76308',
                'puskesmas_id' => '4d5c2f57-8f42-491c-83d4-78c198788e93',
                'nama' => 'Dahlia 1',
                'desa_id' => 7210110007,
                'deleted_at' => NULL,
                'created_at' => '2022-10-06 15:53:42',
                'updated_at' => '2022-10-06 15:53:42',
            ),
            196 => 
            array (
                'id' => 'd26bfe81-ee3c-41fa-8348-44fce6bfe32a',
                'puskesmas_id' => '1fc65f68-19bc-4924-9c3c-f6c772cf023f',
                'nama' => 'Anggrek',
                'desa_id' => 876,
                'deleted_at' => NULL,
                'created_at' => '2022-10-06 15:53:41',
                'updated_at' => '2022-10-06 15:53:41',
            ),
            197 => 
            array (
                'id' => 'd36c619f-e9b7-4cd5-9fa6-365bc96ddc64',
                'puskesmas_id' => '4d5c2f57-8f42-491c-83d4-78c198788e93',
                'nama' => 'Dahlia 2',
                'desa_id' => 7210110007,
                'deleted_at' => NULL,
                'created_at' => '2022-10-06 15:53:42',
                'updated_at' => '2022-10-06 15:53:42',
            ),
            198 => 
            array (
                'id' => 'd3744397-b85d-43ca-976c-32c7e1997d1b',
                'puskesmas_id' => 'bcebe2cd-03bf-4ed8-8e32-7ce7adfca380',
                'nama' => 'Sangali',
                'desa_id' => 7210040005,
                'deleted_at' => NULL,
                'created_at' => '2022-10-06 15:53:42',
                'updated_at' => '2022-10-06 15:53:42',
            ),
            199 => 
            array (
                'id' => 'd574ef9d-d597-4c9f-9868-667b28fcb9c8',
                'puskesmas_id' => '1fc65f68-19bc-4924-9c3c-f6c772cf023f',
                'nama' => 'Mawar 3',
                'desa_id' => 7210120012,
                'deleted_at' => NULL,
                'created_at' => '2022-10-06 15:53:42',
                'updated_at' => '2022-10-06 15:53:42',
            ),
            200 => 
            array (
                'id' => 'd775e855-0e12-4ddf-9eb2-4a065f2c46d0',
                'puskesmas_id' => '4d5c2f57-8f42-491c-83d4-78c198788e93',
                'nama' => 'Dahlia 3',
                'desa_id' => 7210110007,
                'deleted_at' => NULL,
                'created_at' => '2022-10-06 15:53:42',
                'updated_at' => '2022-10-06 15:53:42',
            ),
            201 => 
            array (
                'id' => 'd91a221f-6638-4cba-aa91-0b3b42790c1b',
                'puskesmas_id' => '263c41cd-e790-4d20-82ce-9206eb1147a9',
                'nama' => 'Kembang Jaya',
                'desa_id' => 7210070002,
                'deleted_at' => NULL,
                'created_at' => '2022-10-06 15:53:42',
                'updated_at' => '2022-10-06 15:53:42',
            ),
            202 => 
            array (
                'id' => 'd9664b36-5b5e-47e1-bbb7-fa7d505bab18',
                'puskesmas_id' => '703821a6-0bc6-4d4a-b920-e808fc7b62f5',
                'nama' => 'Nusa Indah',
                'desa_id' => 7210100001,
                'deleted_at' => NULL,
                'created_at' => '2022-10-06 15:53:42',
                'updated_at' => '2022-10-06 15:53:42',
            ),
            203 => 
            array (
                'id' => 'daf4c931-6ec3-4c65-bb6e-0554490fdb48',
                'puskesmas_id' => '1fc65f68-19bc-4924-9c3c-f6c772cf023f',
                'nama' => 'Mawar 2',
                'desa_id' => 7210120012,
                'deleted_at' => NULL,
                'created_at' => '2022-10-06 15:53:42',
                'updated_at' => '2022-10-06 15:53:42',
            ),
            204 => 
            array (
                'id' => 'db7d2d95-7cfe-48a4-adc2-57d89cdb149b',
                'puskesmas_id' => '30cdc565-0bb9-4255-91d6-65443ddcdbc6',
                'nama' => 'Lestari',
                'desa_id' => 7210060017,
                'deleted_at' => NULL,
                'created_at' => '2022-10-06 15:53:42',
                'updated_at' => '2022-10-06 15:53:42',
            ),
            205 => 
            array (
                'id' => 'dce7facf-6672-4424-b418-d10af8a1f5fa',
                'puskesmas_id' => '4d5c2f57-8f42-491c-83d4-78c198788e93',
                'nama' => 'Aster 2',
                'desa_id' => 7210110010,
                'deleted_at' => NULL,
                'created_at' => '2022-10-06 15:53:42',
                'updated_at' => '2022-10-06 15:53:42',
            ),
            206 => 
            array (
                'id' => 'dd4f0c4a-06f7-46b0-a558-00f7566a45bf',
                'puskesmas_id' => 'cf29a8c0-59c5-4822-81de-6d2e29779039',
                'nama' => 'Rejeki',
                'desa_id' => 7210020003,
                'deleted_at' => NULL,
                'created_at' => '2022-10-06 15:53:42',
                'updated_at' => '2022-10-06 15:53:42',
            ),
            207 => 
            array (
                'id' => 'de0b4571-64d6-4c65-a763-6944c36b27f7',
                'puskesmas_id' => '2cc7de06-3532-4571-85c9-1f27195ad4eb',
                'nama' => 'Wayu',
                'desa_id' => 7210140008,
                'deleted_at' => NULL,
                'created_at' => '2022-10-06 15:53:42',
                'updated_at' => '2022-10-06 15:53:42',
            ),
            208 => 
            array (
                'id' => 'dee2dde1-6ea8-46aa-8741-3aff6fc84c27',
                'puskesmas_id' => '44ae2500-66d5-4609-b55a-765255454ba8',
                'nama' => 'Nusa Indah',
                'desa_id' => 7210080009,
                'deleted_at' => NULL,
                'created_at' => '2022-10-06 15:53:42',
                'updated_at' => '2022-10-06 15:53:42',
            ),
            209 => 
            array (
                'id' => 'e01fce34-ba82-409e-86a6-75fc3ca32452',
                'puskesmas_id' => '4d5c2f57-8f42-491c-83d4-78c198788e93',
                'nama' => 'Aster 1',
                'desa_id' => 7210110010,
                'deleted_at' => NULL,
                'created_at' => '2022-10-06 15:53:42',
                'updated_at' => '2022-10-06 15:53:42',
            ),
            210 => 
            array (
                'id' => 'e0bcb39d-5d27-4032-9d3c-38c2ad650a72',
                'puskesmas_id' => 'cf29a8c0-59c5-4822-81de-6d2e29779039',
                'nama' => 'Dahlia',
                'desa_id' => 7210020002,
                'deleted_at' => NULL,
                'created_at' => '2022-10-06 15:53:42',
                'updated_at' => '2022-10-06 15:53:42',
            ),
            211 => 
            array (
                'id' => 'e1928bce-df5e-4732-9594-1446d1f90296',
                'puskesmas_id' => 'f3df3af5-38a5-432e-8daf-a69fe47e0234',
                'nama' => 'Bougenvil',
                'desa_id' => 7210130002,
                'deleted_at' => NULL,
                'created_at' => '2022-10-06 15:53:42',
                'updated_at' => '2022-10-06 15:53:42',
            ),
            212 => 
            array (
                'id' => 'e42da97e-8ac5-46d7-92c0-7d9089ad2503',
                'puskesmas_id' => '449dddd0-c208-41bb-b369-d9e08b63bd0f',
                'nama' => 'Candana',
                'desa_id' => 7210030003,
                'deleted_at' => NULL,
                'created_at' => '2022-10-06 15:53:42',
                'updated_at' => '2022-10-06 15:53:42',
            ),
            213 => 
            array (
                'id' => 'e5fb84f5-a501-4234-8e11-6bf2cbe6b2c2',
                'puskesmas_id' => '1af794fa-ed12-4c58-8e9e-838027b5dc26',
                'nama' => 'Mane Jaya',
                'desa_id' => 7210010018,
                'deleted_at' => NULL,
                'created_at' => '2022-10-06 15:53:42',
                'updated_at' => '2022-10-06 15:53:42',
            ),
            214 => 
            array (
                'id' => 'ea494a78-630d-42ad-bfad-34c36e41850d',
                'puskesmas_id' => '703821a6-0bc6-4d4a-b920-e808fc7b62f5',
                'nama' => 'Sayang Ibu',
                'desa_id' => 7210100003,
                'deleted_at' => NULL,
                'created_at' => '2022-10-06 15:53:42',
                'updated_at' => '2022-10-06 15:53:42',
            ),
            215 => 
            array (
                'id' => 'eab28147-eb5d-4fd2-97ba-98d53d80e843',
                'puskesmas_id' => '2cc7de06-3532-4571-85c9-1f27195ad4eb',
                'nama' => 'Wiapore',
                'desa_id' => 7210140002,
                'deleted_at' => NULL,
                'created_at' => '2022-10-06 15:53:42',
                'updated_at' => '2022-10-06 15:53:42',
            ),
            216 => 
            array (
                'id' => 'edefca69-60ef-4463-bee1-8182de80ef90',
                'puskesmas_id' => '156f4500-77dd-4e52-a616-2cef699e25e3',
                'nama' => 'Mawar',
                'desa_id' => 7210010014,
                'deleted_at' => NULL,
                'created_at' => '2022-10-06 15:53:42',
                'updated_at' => '2022-10-06 15:53:42',
            ),
            217 => 
            array (
                'id' => 'ee31e705-895b-4c6e-8920-1b4c404bc3a7',
                'puskesmas_id' => '3a1c53b1-bc6e-4435-8cdb-ee5b010dda5f',
                'nama' => 'Anggrek',
                'desa_id' => 7210030014,
                'deleted_at' => NULL,
                'created_at' => '2022-10-06 15:53:42',
                'updated_at' => '2022-10-06 15:53:42',
            ),
            218 => 
            array (
                'id' => 'ef958cfe-5fb6-4042-85f5-c8c1a1f452ce',
                'puskesmas_id' => '2cc7de06-3532-4571-85c9-1f27195ad4eb',
                'nama' => 'Wugaga',
                'desa_id' => 7210140005,
                'deleted_at' => NULL,
                'created_at' => '2022-10-06 15:53:42',
                'updated_at' => '2022-10-06 15:53:42',
            ),
            219 => 
            array (
                'id' => 'f0cb1548-55c8-4e84-bbfd-63cd18e91620',
                'puskesmas_id' => '4d5c2f57-8f42-491c-83d4-78c198788e93',
                'nama' => 'Tunas Harapan 2',
                'desa_id' => 7210110002,
                'deleted_at' => NULL,
                'created_at' => '2022-10-06 15:53:42',
                'updated_at' => '2022-10-06 15:53:42',
            ),
            220 => 
            array (
                'id' => 'f1ed1fd5-eba2-4308-aa42-f3147dd79aa7',
                'puskesmas_id' => '4d5c2f57-8f42-491c-83d4-78c198788e93',
                'nama' => 'Tunas Harapan 1',
                'desa_id' => 7210110002,
                'deleted_at' => NULL,
                'created_at' => '2022-10-06 15:53:42',
                'updated_at' => '2022-10-06 15:53:42',
            ),
            221 => 
            array (
                'id' => 'f233f14c-a316-4a7b-8812-9ccd052d2643',
                'puskesmas_id' => '60106a37-fb28-462c-9694-18e35e68d7f7',
                'nama' => 'Anggrek',
                'desa_id' => 7210050003,
                'deleted_at' => NULL,
                'created_at' => '2022-10-06 15:53:42',
                'updated_at' => '2022-10-06 15:53:42',
            ),
            222 => 
            array (
                'id' => 'f257723c-5e20-4b2e-8f97-afd126e3e3d9',
                'puskesmas_id' => '703821a6-0bc6-4d4a-b920-e808fc7b62f5',
                'nama' => 'Malakantu',
                'desa_id' => 7210100005,
                'deleted_at' => NULL,
                'created_at' => '2022-10-06 15:53:42',
                'updated_at' => '2022-10-06 15:53:42',
            ),
            223 => 
            array (
                'id' => 'f2bed983-c6dd-48a2-9feb-3a65c47a5ed3',
                'puskesmas_id' => '60106a37-fb28-462c-9694-18e35e68d7f7',
                'nama' => 'Mentari 3',
                'desa_id' => 7210050005,
                'deleted_at' => NULL,
                'created_at' => '2022-10-06 15:53:42',
                'updated_at' => '2022-10-06 15:53:42',
            ),
            224 => 
            array (
                'id' => 'f3310137-0894-4232-a8e2-92a1266534c9',
                'puskesmas_id' => '2cc7de06-3532-4571-85c9-1f27195ad4eb',
                'nama' => 'Ongulero',
                'desa_id' => 7210140003,
                'deleted_at' => NULL,
                'created_at' => '2022-10-06 15:53:42',
                'updated_at' => '2022-10-06 15:53:42',
            ),
            225 => 
            array (
                'id' => 'f3908aa7-a9a2-4011-a652-67983a62c332',
                'puskesmas_id' => '60106a37-fb28-462c-9694-18e35e68d7f7',
                'nama' => 'Mekar 3',
                'desa_id' => 7210050001,
                'deleted_at' => NULL,
                'created_at' => '2022-10-06 15:53:42',
                'updated_at' => '2022-10-06 15:53:42',
            ),
            226 => 
            array (
                'id' => 'f6a2c844-6a96-42b0-b2d1-9a76417853c0',
                'puskesmas_id' => '1fc65f68-19bc-4924-9c3c-f6c772cf023f',
                'nama' => 'Melati',
                'desa_id' => 7210120003,
                'deleted_at' => NULL,
                'created_at' => '2022-10-06 15:53:42',
                'updated_at' => '2022-10-06 15:53:42',
            ),
            227 => 
            array (
                'id' => 'f743b8d0-d24a-475c-b613-f80a224a2d16',
                'puskesmas_id' => '449dddd0-c208-41bb-b369-d9e08b63bd0f',
                'nama' => 'Tobelo',
                'desa_id' => 7210030003,
                'deleted_at' => NULL,
                'created_at' => '2022-10-06 15:53:42',
                'updated_at' => '2022-10-06 15:53:42',
            ),
            228 => 
            array (
                'id' => 'f7d7e658-6c75-4e7e-b7c5-f808f4c4e0ff',
                'puskesmas_id' => '60106a37-fb28-462c-9694-18e35e68d7f7',
                'nama' => 'Melati 3',
                'desa_id' => 7210050002,
                'deleted_at' => NULL,
                'created_at' => '2022-10-06 15:53:42',
                'updated_at' => '2022-10-06 15:53:42',
            ),
            229 => 
            array (
                'id' => 'f82fb796-a6f6-45c2-8474-d2be6cf979c9',
                'puskesmas_id' => '30cdc565-0bb9-4255-91d6-65443ddcdbc6',
                'nama' => 'Bahagia',
                'desa_id' => 7210090010,
                'deleted_at' => NULL,
                'created_at' => '2022-10-06 15:53:42',
                'updated_at' => '2022-10-06 15:53:42',
            ),
            230 => 
            array (
                'id' => 'f8385bd4-f102-4070-b664-785a53fe2b70',
                'puskesmas_id' => '3a1c53b1-bc6e-4435-8cdb-ee5b010dda5f',
                'nama' => 'Flamboyan',
                'desa_id' => 7210150012,
                'deleted_at' => NULL,
                'created_at' => '2022-10-06 15:53:42',
                'updated_at' => '2022-10-06 15:53:42',
            ),
            231 => 
            array (
                'id' => 'f9928a4a-0fc3-4dcd-8600-0a67db42168c',
                'puskesmas_id' => '156f4500-77dd-4e52-a616-2cef699e25e3',
                'nama' => 'Anggrek',
                'desa_id' => 7210010003,
                'deleted_at' => NULL,
                'created_at' => '2022-10-06 15:53:42',
                'updated_at' => '2022-10-06 15:53:42',
            ),
            232 => 
            array (
                'id' => 'fa1f7d50-e329-4a3a-b281-d149e2bd816f',
                'puskesmas_id' => 'f3df3af5-38a5-432e-8daf-a69fe47e0234',
                'nama' => 'Kamaipura I',
                'desa_id' => 7210130003,
                'deleted_at' => NULL,
                'created_at' => '2022-10-06 15:53:42',
                'updated_at' => '2022-10-06 15:53:42',
            ),
            233 => 
            array (
                'id' => 'fc064abb-4bdf-49ab-9b5d-d3ef89b26be1',
                'puskesmas_id' => '263c41cd-e790-4d20-82ce-9206eb1147a9',
                'nama' => 'Tora Tora',
                'desa_id' => 7210070005,
                'deleted_at' => NULL,
                'created_at' => '2022-10-06 15:53:42',
                'updated_at' => '2022-10-06 15:53:42',
            ),
            234 => 
            array (
                'id' => 'fd891b97-6863-4d7a-8cda-52f404d1187e',
                'puskesmas_id' => '1af794fa-ed12-4c58-8e9e-838027b5dc26',
                'nama' => 'Sejahtera',
                'desa_id' => 7210010013,
                'deleted_at' => NULL,
                'created_at' => '2022-10-06 15:53:42',
                'updated_at' => '2022-10-06 15:53:42',
            ),
            235 => 
            array (
                'id' => 'fe16b421-50c1-4a92-bfb8-d8a96aee2f32',
                'puskesmas_id' => 'bcebe2cd-03bf-4ed8-8e32-7ce7adfca380',
                'nama' => 'Bougenvil',
                'desa_id' => 7210040003,
                'deleted_at' => NULL,
                'created_at' => '2022-10-06 15:53:42',
                'updated_at' => '2022-10-06 15:53:42',
            ),
            236 => 
            array (
                'id' => 'fe777270-6680-40a2-b96f-49238475d132',
                'puskesmas_id' => '703821a6-0bc6-4d4a-b920-e808fc7b62f5',
                'nama' => 'Kabelota',
                'desa_id' => 7210100004,
                'deleted_at' => NULL,
                'created_at' => '2022-10-06 15:53:42',
                'updated_at' => '2022-10-06 15:53:42',
            ),
            237 => 
            array (
                'id' => 'fe9242d5-c44c-441c-8e16-e676dca5474a',
                'puskesmas_id' => '4d5c2f57-8f42-491c-83d4-78c198788e93',
                'nama' => 'Mulia 2',
                'desa_id' => 7210110006,
                'deleted_at' => NULL,
                'created_at' => '2022-10-06 15:53:42',
                'updated_at' => '2022-10-06 15:53:42',
            ),
            238 => 
            array (
                'id' => 'fede0b2a-67c1-4c8d-8e08-20f7b341ae8a',
                'puskesmas_id' => '1fc65f68-19bc-4924-9c3c-f6c772cf023f',
                'nama' => 'Mawar',
                'desa_id' => 7210120016,
                'deleted_at' => NULL,
                'created_at' => '2022-10-06 15:53:42',
                'updated_at' => '2022-10-06 15:53:42',
            ),
            239 => 
            array (
                'id' => 'ffaad690-ef76-424b-b236-1986d4ab258e',
                'puskesmas_id' => '703821a6-0bc6-4d4a-b920-e808fc7b62f5',
                'nama' => 'Anutapura',
                'desa_id' => 7210100001,
                'deleted_at' => NULL,
                'created_at' => '2022-10-06 15:53:42',
                'updated_at' => '2022-10-06 15:53:42',
            ),
        ));
        
        
    }
}