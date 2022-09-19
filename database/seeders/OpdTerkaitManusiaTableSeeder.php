<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class OpdTerkaitManusiaTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('opd_terkait_manusia')->delete();
        
        \DB::table('opd_terkait_manusia')->insert(array (
            0 => 
            array (
                'id' => '04da3e6e-ba49-43d7-99dc-80deb9b09b2a',
                'perencanaan_manusia_id' => '9c559147-af9e-4ce2-a414-17d2cfdd15f5',
                'opd_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c99',
                'created_at' => '2022-08-24 23:35:20',
                'updated_at' => '2022-08-24 23:35:20',
            ),
            1 => 
            array (
                'id' => '77343ab9-f3a7-480e-9f32-db8c2310fa7b',
                'perencanaan_manusia_id' => '9c559147-af9e-4ce2-a414-17d2cfdd15f5',
                'opd_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c10',
                'created_at' => '2022-08-24 23:35:20',
                'updated_at' => '2022-08-24 23:35:20',
            ),
            2 => 
            array (
                'id' => '92c858ce-aaaa-4e01-8e77-861d2a59273b',
                'perencanaan_manusia_id' => 'fc3995c2-d9bc-4a98-800b-1298f5ae1165',
                'opd_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c98',
                'created_at' => '2022-08-26 12:00:43',
                'updated_at' => '2022-08-26 12:00:43',
            ),
            3 => 
            array (
                'id' => 'acde66c2-1983-48a2-8964-039d35b31dfb',
                'perencanaan_manusia_id' => 'bac1eb88-fb66-4a73-b51d-2d6834470217',
                'opd_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c98',
                'created_at' => '2022-08-24 23:26:52',
                'updated_at' => '2022-08-24 23:26:52',
            ),
            4 => 
            array (
                'id' => 'cb55e8e6-8db9-4a7e-ad5a-d866d36a3979',
                'perencanaan_manusia_id' => 'bac1eb88-fb66-4a73-b51d-2d6834470217',
                'opd_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c97',
                'created_at' => '2022-08-24 23:26:52',
                'updated_at' => '2022-08-24 23:26:52',
            ),
            5 => 
            array (
                'id' => 'e0d25bc6-953a-4340-b4ec-94f695a10e77',
                'perencanaan_manusia_id' => 'e24a52eb-b522-4a5c-a03f-3e9d89f2eab0',
                'opd_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c98',
                'created_at' => '2022-08-24 23:32:10',
                'updated_at' => '2022-08-24 23:32:10',
            ),
            6 => 
            array (
                'id' => 'f2292649-4170-4e5f-8a94-01f455e02dc8',
                'perencanaan_manusia_id' => 'aaa668fe-dfae-47df-9732-0d7dd22f9297',
                'opd_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c95',
                'created_at' => '2022-09-06 12:25:24',
                'updated_at' => '2022-09-06 12:25:24',
            ),
            7 => 
            array (
                'id' => 'fd317304-f08b-416a-9b39-71273be1bdea',
                'perencanaan_manusia_id' => 'fc3995c2-d9bc-4a98-800b-1298f5ae1165',
                'opd_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c95',
                'created_at' => '2022-08-26 12:00:43',
                'updated_at' => '2022-08-26 12:00:43',
            ),
        ));
        
        
    }
}