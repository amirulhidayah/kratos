<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PemilikLokasiHewanTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('pemilik_lokasi_hewan')->delete();

        \DB::table('pemilik_lokasi_hewan')->insert(array(
            0 =>
            array(
                'id' => '0f61f652-65de-4d56-9ea3-365897248a9c',
                'lokasi_hewan_id' => '01b2f7f7-8743-4b93-b5af-08c79faff140',
                'penduduk_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b4d02',
                'deleted_at' => NULL,
                'created_at' => '2022-08-16 14:59:00',
                'updated_at' => '2022-08-16 14:59:00',
            ),
            1 =>
            array(
                'id' => '3136d431-704b-48f5-93ae-8ffa6f51d119',
                'lokasi_hewan_id' => '01b2f7f7-8743-4b93-b5af-08c79faff127',
                'penduduk_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b4d07',
                'deleted_at' => NULL,
                'created_at' => '2022-08-16 15:02:31',
                'updated_at' => '2022-08-16 15:02:31',
            ),
            2 =>
            array(
                'id' => '525705e4-bc1d-4fb7-bcc5-b7de14392f14',
                'lokasi_hewan_id' => '01b2f7f7-8743-4b93-b5af-08c79faff121',
                'penduduk_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b4d01',
                'deleted_at' => NULL,
                'created_at' => '2022-08-16 15:03:25',
                'updated_at' => '2022-08-16 15:03:25',
            ),
            3 =>
            array(
                'id' => '8c295b64-1303-4402-8d37-22f7a2a087e4',
                'lokasi_hewan_id' => '01b2f7f7-8743-4b93-b5af-08c79faff128',
                'penduduk_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b4d02',
                'deleted_at' => NULL,
                'created_at' => '2022-08-16 15:02:10',
                'updated_at' => '2022-08-16 15:02:10',
            ),
            4 =>
            array(
                'id' => '9901fbb7-44fc-4cb7-86ca-7e7c188886bc',
                'lokasi_hewan_id' => '01b2f7f7-8743-4b93-b5af-08c79faff139',
                'penduduk_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b4d03',
                'deleted_at' => NULL,
                'created_at' => '2022-08-16 14:59:41',
                'updated_at' => '2022-08-16 14:59:41',
            ),
            5 =>
            array(
                'id' => '9f2c5b47-ec06-44fa-a4db-99e74c6eb50b',
                'lokasi_hewan_id' => '01b2f7f7-8743-4b93-b5af-08c79faff133',
                'penduduk_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b4d10',
                'deleted_at' => NULL,
                'created_at' => '2022-08-16 15:01:55',
                'updated_at' => '2022-08-16 15:01:55',
            ),
            6 =>
            array(
                'id' => 'bf0c59b5-e7a5-4bf1-8c8e-8738dd45c4f7',
                'lokasi_hewan_id' => '01b2f7f7-8743-4b93-b5af-08c79faff134',
                'penduduk_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b4d01',
                'deleted_at' => NULL,
                'created_at' => '2022-08-16 15:01:32',
                'updated_at' => '2022-08-16 15:01:32',
            ),
            7 =>
            array(
                'id' => 'c42d9d33-0ad1-44f2-96b1-c1c419c1ae80',
                'lokasi_hewan_id' => '01b2f7f7-8743-4b93-b5af-08c79faff134',
                'penduduk_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b4d10',
                'deleted_at' => NULL,
                'created_at' => '2022-08-16 15:01:32',
                'updated_at' => '2022-08-16 15:01:32',
            ),
            8 =>
            array(
                'id' => 'd72308e1-ce14-40c1-ba59-ae1c58e1a533',
                'lokasi_hewan_id' => '01b2f7f7-8743-4b93-b5af-08c79faff122',
                'penduduk_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b4d10',
                'deleted_at' => NULL,
                'created_at' => '2022-08-16 15:02:58',
                'updated_at' => '2022-08-16 15:02:58',
            ),
        ));
    }
}
