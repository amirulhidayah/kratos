<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LokasiKeongTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('lokasi_keong')->delete();

        \DB::table('lokasi_keong')->insert(array(
            0 =>
            array(
                'id' => '0352420a-8bb8-41c1-af72-9728d2b8c140',
                'desa_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c24',
                'nama' => 'L.Tomado.07',
                'latitude' => '-1.34207',
                'longitude' => '120.04134',
                'deskripsi' => NULL,
                'status' => 1,
                'created_at' => '2022-08-11 16:47:07',
                'updated_at' => '2022-08-11 16:47:07',
                'deleted_at' => NULL,
            ),
            1 =>
            array(
                'id' => '0eaff97e-3100-4d1c-957c-04a3f10b22dc',
                'desa_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c24',
                'nama' => 'L.Tomado.14',
                'latitude' => '-1.27814',
                'longitude' => '120.11271',
                'deskripsi' => NULL,
                'status' => 1,
                'created_at' => '2022-08-11 16:47:07',
                'updated_at' => '2022-08-11 16:47:07',
                'deleted_at' => NULL,
            ),
            2 =>
            array(
                'id' => '136ac647-012f-4af7-86b5-4cf209e22c2c',
                'desa_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c20',
                'nama' => 'L.Anca.04',
                'latitude' => '-1.28709',
                'longitude' => '120.06413',
                'deskripsi' => NULL,
                'status' => 1,
                'created_at' => '2022-08-11 16:47:07',
                'updated_at' => '2022-08-11 16:47:07',
                'deleted_at' => NULL,
            ),
            3 =>
            array(
                'id' => '13dd96ef-c203-4f96-9a1a-34aecf9d3267',
                'desa_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c24',
                'nama' => 'L.Tomado.11',
                'latitude' => '-1.3435',
                'longitude' => '120.03794',
                'deskripsi' => NULL,
                'status' => 1,
                'created_at' => '2022-08-11 16:47:07',
                'updated_at' => '2022-08-11 16:47:07',
                'deleted_at' => NULL,
            ),
            4 =>
            array(
                'id' => '1aa50c9f-1883-4775-b851-e7a07d78fc59',
                'desa_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c20',
                'nama' => 'L.Anca.08',
                'latitude' => '-1.28423',
                'longitude' => '120.07527',
                'deskripsi' => NULL,
                'status' => 1,
                'created_at' => '2022-08-11 16:47:07',
                'updated_at' => '2022-08-11 16:47:07',
                'deleted_at' => NULL,
            ),
            5 =>
            array(
                'id' => '1d803d15-672a-4bae-8e47-fab6c2a93e4f',
                'desa_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c24',
                'nama' => 'L.Tomado.15',
                'latitude' => '-1.32953',
                'longitude' => '120.05077',
                'deskripsi' => NULL,
                'status' => 1,
                'created_at' => '2022-08-11 16:47:07',
                'updated_at' => '2022-08-11 16:47:07',
                'deleted_at' => NULL,
            ),
            6 =>
            array(
                'id' => '1dafdf99-cb60-4f16-858b-6af966f43084',
                'desa_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c24',
                'nama' => 'L.Tomado.09',
                'latitude' => '-1.34363',
                'longitude' => '120.04268',
                'deskripsi' => NULL,
                'status' => 1,
                'created_at' => '2022-08-11 16:47:07',
                'updated_at' => '2022-08-11 16:47:07',
                'deleted_at' => NULL,
            ),
            7 =>
            array(
                'id' => '21469d9c-5458-4dde-b453-06ec25532af5',
                'desa_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c20',
                'nama' => 'L.Anca.10',
                'latitude' => '-1.27382',
                'longitude' => '120.10712',
                'deskripsi' => NULL,
                'status' => 1,
                'created_at' => '2022-08-11 16:47:07',
                'updated_at' => '2022-08-11 16:47:07',
                'deleted_at' => NULL,
            ),
            8 =>
            array(
                'id' => '251a674d-3ff8-4dfa-94ca-baad11480f75',
                'desa_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c21',
                'nama' => 'L.Langko.02',
                'latitude' => '-1.32953',
                'longitude' => '120.05077',
                'deskripsi' => NULL,
                'status' => 1,
                'created_at' => '2022-08-11 16:47:07',
                'updated_at' => '2022-08-11 16:47:07',
                'deleted_at' => NULL,
            ),
            9 =>
            array(
                'id' => '27a501de-59e6-4019-9a16-c3593520a5c1',
                'desa_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c20',
                'nama' => 'L.Anca.11',
                'latitude' => '-1.27376',
                'longitude' => '120.10546',
                'deskripsi' => NULL,
                'status' => 1,
                'created_at' => '2022-08-11 16:47:07',
                'updated_at' => '2022-08-11 16:47:07',
                'deleted_at' => NULL,
            ),
            10 =>
            array(
                'id' => '30c5a0f7-3063-40df-ab06-2854b758c9c4',
                'desa_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c20',
                'nama' => 'L.Anca.01',
                'latitude' => '-1.29404',
                'longitude' => '120.06090',
                'deskripsi' => NULL,
                'status' => 1,
                'created_at' => '2022-08-11 16:47:07',
                'updated_at' => '2022-08-11 16:47:07',
                'deleted_at' => NULL,
            ),
            11 =>
            array(
                'id' => '40b9add6-a118-49d4-9e63-82c9539cb7bf',
                'desa_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c23',
                'nama' => 'L.Puroo.02',
                'latitude' => '-1.35686',
                'longitude' => '120.05844',
                'deskripsi' => NULL,
                'status' => 1,
                'created_at' => '2022-08-11 16:47:07',
                'updated_at' => '2022-08-11 16:47:07',
                'deleted_at' => NULL,
            ),
            12 =>
            array(
                'id' => '61089d02-2504-4ce2-8f75-62da30a5125d',
                'desa_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c20',
                'nama' => 'L.Anca.07',
                'latitude' => '-1.28291',
                'longitude' => '120.07323',
                'deskripsi' => NULL,
                'status' => 1,
                'created_at' => '2022-08-11 16:47:07',
                'updated_at' => '2022-08-11 16:47:07',
                'deleted_at' => NULL,
            ),
            13 =>
            array(
                'id' => '65454a3b-8bc6-4ec9-9c5c-c23aa2553e3e',
                'desa_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c24',
                'nama' => 'L.Tomado.03',
                'latitude' => '-1.33837',
                'longitude' => '120.04564',
                'deskripsi' => NULL,
                'status' => 1,
                'created_at' => '2022-08-11 16:47:07',
                'updated_at' => '2022-08-11 16:47:07',
                'deleted_at' => NULL,
            ),
            14 =>
            array(
                'id' => '6c8bc624-6552-4112-aa54-b85293575969',
                'desa_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c24',
                'nama' => 'L.Tomado.01',
                'latitude' => '-1.3322895',
                'longitude' => '120.048970',
                'deskripsi' => NULL,
                'status' => 1,
                'created_at' => '2022-08-11 16:47:07',
                'updated_at' => '2022-08-11 16:47:07',
                'deleted_at' => NULL,
            ),
            15 =>
            array(
                'id' => '857118ba-5d3c-430d-bd1a-5046d69338e1',
                'desa_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c20',
                'nama' => 'L.Anca.05',
                'latitude' => '-1.28286',
                'longitude' => '120.06445',
                'deskripsi' => NULL,
                'status' => 1,
                'created_at' => '2022-08-11 16:47:07',
                'updated_at' => '2022-08-11 16:47:07',
                'deleted_at' => NULL,
            ),
            16 =>
            array(
                'id' => '9b31ab4a-a620-4116-98da-b2aab892bdf5',
                'desa_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c24',
                'nama' => 'L.Tomado.05',
                'latitude' => '-1.34099',
                'longitude' => '120.04298',
                'deskripsi' => NULL,
                'status' => 1,
                'created_at' => '2022-08-11 16:47:07',
                'updated_at' => '2022-08-11 16:47:07',
                'deleted_at' => NULL,
            ),
            17 =>
            array(
                'id' => '9ce72d2c-2a53-4368-ae9f-7abbf77230e3',
                'desa_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c24',
                'nama' => 'L.Tomado.04',
                'latitude' => '-1.34119',
                'longitude' => '120.04224',
                'deskripsi' => NULL,
                'status' => 1,
                'created_at' => '2022-08-11 16:47:07',
                'updated_at' => '2022-08-11 16:47:07',
                'deleted_at' => NULL,
            ),
            18 =>
            array(
                'id' => 'b93e6fd5-d1c6-4d76-89b8-78d924fbcdd4',
                'desa_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c20',
                'nama' => 'L.Anca.06',
                'latitude' => '-1.28269',
                'longitude' => '120.06886',
                'deskripsi' => NULL,
                'status' => 1,
                'created_at' => '2022-08-11 16:47:07',
                'updated_at' => '2022-08-11 16:47:07',
                'deleted_at' => NULL,
            ),
            19 =>
            array(
                'id' => 'c7f3bc85-717e-4daa-b71d-fcbcc5ff7463',
                'desa_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c24',
                'nama' => 'L.Tomado.08',
                'latitude' => '-1.34322',
                'longitude' => '120.040445',
                'deskripsi' => NULL,
                'status' => 1,
                'created_at' => '2022-08-11 16:47:07',
                'updated_at' => '2022-08-11 16:47:07',
                'deleted_at' => NULL,
            ),
            20 =>
            array(
                'id' => 'c80914ee-e075-4dbf-9b7b-4af0ecb6402b',
                'desa_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c24',
                'nama' => 'L.Tomado.10',
                'latitude' => '-1.34537',
                'longitude' => '120.04006',
                'deskripsi' => NULL,
                'status' => 1,
                'created_at' => '2022-08-11 16:47:07',
                'updated_at' => '2022-08-11 16:47:07',
                'deleted_at' => NULL,
            ),
            21 =>
            array(
                'id' => 'cd6321e9-f35d-4a35-b6e6-fd5a2b7ebf86',
                'desa_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c24',
                'nama' => 'L.Tomado.06',
                'latitude' => '-1.3413',
                'longitude' => '120.04264',
                'deskripsi' => NULL,
                'status' => 1,
                'created_at' => '2022-08-11 16:47:07',
                'updated_at' => '2022-08-11 16:47:07',
                'deleted_at' => NULL,
            ),
            22 =>
            array(
                'id' => 'd066eb89-04de-4028-a9c2-a1377daf1440',
                'desa_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c20',
                'nama' => 'L.Anca.12',
                'latitude' => '-1.27376',
                'longitude' => '120.10546',
                'deskripsi' => NULL,
                'status' => 1,
                'created_at' => '2022-08-11 16:47:07',
                'updated_at' => '2022-08-11 16:47:07',
                'deleted_at' => NULL,
            ),
            23 =>
            array(
                'id' => 'd2e9f22c-dca5-42da-8abf-762aa597eb20',
                'desa_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c24',
                'nama' => 'L.Tomado.12',
                'latitude' => '-1.27857',
                'longitude' => '120.11351',
                'deskripsi' => NULL,
                'status' => 1,
                'created_at' => '2022-08-11 16:47:07',
                'updated_at' => '2022-08-11 16:47:07',
                'deleted_at' => NULL,
            ),
            24 =>
            array(
                'id' => 'd438f811-629f-4b46-bac2-6b1cae027b30',
                'desa_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c24',
                'nama' => 'L.Tomado.13',
                'latitude' => '-1.27864',
                'longitude' => '120.11362',
                'deskripsi' => NULL,
                'status' => 1,
                'created_at' => '2022-08-11 16:47:07',
                'updated_at' => '2022-08-11 16:47:07',
                'deleted_at' => NULL,
            ),
            25 =>
            array(
                'id' => 'd566c184-4383-4400-b0cc-22df4d5c6995',
                'desa_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c20',
                'nama' => 'L.Anca.03',
                'latitude' => '-1.28861',
                'longitude' => '120.06313',
                'deskripsi' => NULL,
                'status' => 1,
                'created_at' => '2022-08-11 16:47:07',
                'updated_at' => '2022-08-11 16:47:07',
                'deleted_at' => NULL,
            ),
            26 =>
            array(
                'id' => 'd788232e-d308-4949-8da6-2e3242040334',
                'desa_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c23',
                'nama' => 'L.Puroo.03',
                'latitude' => '-1.36289',
                'longitude' => '120.05657',
                'deskripsi' => NULL,
                'status' => 1,
                'created_at' => '2022-08-11 16:47:07',
                'updated_at' => '2022-08-11 16:47:07',
                'deleted_at' => NULL,
            ),
            27 =>
            array(
                'id' => 'd79a69d1-817e-4854-8b84-3277edcc6824',
                'desa_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c23',
                'nama' => 'L.Puroo.01',
                'latitude' => '-1.35979',
                'longitude' => '120.058393',
                'deskripsi' => NULL,
                'status' => 1,
                'created_at' => '2022-08-11 16:47:07',
                'updated_at' => '2022-08-11 16:47:07',
                'deleted_at' => NULL,
            ),
            28 =>
            array(
                'id' => 'db000a30-4d80-4d9b-bf79-09169284f620',
                'desa_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c20',
                'nama' => 'L.Anca.09',
                'latitude' => '-1.27370',
                'longitude' => '120.10743',
                'deskripsi' => NULL,
                'status' => 1,
                'created_at' => '2022-08-11 16:47:07',
                'updated_at' => '2022-08-11 16:47:07',
                'deleted_at' => NULL,
            ),
            29 =>
            array(
                'id' => 'e6457d30-71c3-4cd7-84ba-957c6f9694d0',
                'desa_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c20',
                'nama' => 'L.Anca.02',
                'latitude' => '-1.29026',
                'longitude' => '120.06208',
                'deskripsi' => NULL,
                'status' => 1,
                'created_at' => '2022-08-11 16:47:07',
                'updated_at' => '2022-08-11 16:47:07',
                'deleted_at' => NULL,
            ),
            30 =>
            array(
                'id' => 'ff928f88-e7bf-4849-ac41-a090e340d28b',
                'desa_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c24',
                'nama' => 'L.Tomado.02',
                'latitude' => '-1.33098',
                'longitude' => '120.04671',
                'deskripsi' => NULL,
                'status' => 1,
                'created_at' => '2022-08-11 16:47:07',
                'updated_at' => '2022-08-11 16:47:07',
                'deleted_at' => NULL,
            ),
        ));
    }
}
