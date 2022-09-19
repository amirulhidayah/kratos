<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class OpdTerkaitHewanTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('opd_terkait_hewan')->delete();
        
        \DB::table('opd_terkait_hewan')->insert(array (
            0 => 
            array (
                'id' => '4638d501-11c3-4ebb-a6da-c1a0c4b8211e',
                'perencanaan_hewan_id' => 'c913a980-7786-4008-ae5b-62f581a35945',
                'opd_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c10',
                'created_at' => '2022-09-06 13:29:41',
                'updated_at' => '2022-09-06 13:29:41',
            ),
            1 => 
            array (
                'id' => '8507a835-eead-42aa-9045-a39c05a59580',
                'perencanaan_hewan_id' => '5aabc047-e5bb-4d9c-bf0a-12ee1e88eb68',
                'opd_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c97',
                'created_at' => '2022-08-27 12:42:00',
                'updated_at' => '2022-08-27 12:42:00',
            ),
            2 => 
            array (
                'id' => 'b5e7ccab-e729-406b-9d3a-b614e58d7e0f',
                'perencanaan_hewan_id' => '3e6d54e2-995c-44ab-9530-47ab2b628773',
                'opd_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c97',
                'created_at' => '2022-09-06 13:30:23',
                'updated_at' => '2022-09-06 13:30:23',
            ),
            3 => 
            array (
                'id' => 'b9489db1-cfe3-49af-9e4f-80981fb9de64',
                'perencanaan_hewan_id' => '6aa72a31-194d-4363-a282-084f5e6362d3',
                'opd_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c95',
                'created_at' => '2022-09-06 13:30:35',
                'updated_at' => '2022-09-06 13:30:35',
            ),
            4 => 
            array (
                'id' => 'dc37137c-9759-4cb9-85c1-b68f163578bf',
                'perencanaan_hewan_id' => '47c49fdb-370e-426c-99e9-ebe0bfe14787',
                'opd_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c97',
                'created_at' => '2022-08-27 13:09:57',
                'updated_at' => '2022-08-27 13:09:57',
            ),
        ));
        
        
    }
}