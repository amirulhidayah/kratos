<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class OpdTerkaitKeongTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('opd_terkait_keong')->delete();
        
        \DB::table('opd_terkait_keong')->insert(array (
            0 => 
            array (
                'id' => '49540240-c255-447e-8d13-0918eba4cf8d',
                'perencanaan_keong_id' => '76628878-af22-4ae8-be21-eaa420265986',
                'opd_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c95',
                'created_at' => '2022-08-26 21:58:18',
                'updated_at' => '2022-08-26 21:58:18',
            ),
            1 => 
            array (
                'id' => '8da5f9fa-14ab-4ba4-9256-569fc47a1fa1',
                'perencanaan_keong_id' => '5fa15403-b90f-4c7f-8c77-5076bc262028',
                'opd_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c98',
                'created_at' => '2022-09-06 11:21:05',
                'updated_at' => '2022-09-06 11:21:05',
            ),
            2 => 
            array (
                'id' => 'a544232c-755a-4715-94c8-d7b4b1947896',
                'perencanaan_keong_id' => '66417cb6-4595-439d-8e67-87f292255a3c',
                'opd_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c95',
                'created_at' => '2022-09-06 11:32:51',
                'updated_at' => '2022-09-06 11:32:51',
            ),
            3 => 
            array (
                'id' => 'aeb8246b-de74-41a8-8c1c-c2beb83f7a4e',
                'perencanaan_keong_id' => '66417cb6-4595-439d-8e67-87f292255a3c',
                'opd_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c97',
                'created_at' => '2022-09-06 11:32:51',
                'updated_at' => '2022-09-06 11:32:51',
            ),
            4 => 
            array (
                'id' => 'aed2799a-cce7-4ff9-bdc4-29bbdf1168af',
                'perencanaan_keong_id' => '5fa15403-b90f-4c7f-8c77-5076bc262028',
                'opd_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c97',
                'created_at' => '2022-09-06 11:21:05',
                'updated_at' => '2022-09-06 11:21:05',
            ),
        ));
        
        
    }
}