<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class OpdTerkaitTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('opd_terkait')->delete();
        
        \DB::table('opd_terkait')->insert(array (
            0 => 
            array (
                'id' => '122566c3-11a2-40b1-a280-8f90f5fc80b8',
                'perencanaan_id' => 'd41ed3a7-8ce0-4309-8068-aa7839a132e1',
                'opd_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c95',
                'created_at' => '2022-09-22 22:52:53',
                'updated_at' => '2022-09-22 22:52:53',
            ),
            1 => 
            array (
                'id' => '31355426-5e83-4c8a-b2d0-15836f169bd7',
                'perencanaan_id' => '4daef7d5-86d9-4d28-8a5c-1823b8fae6d9',
                'opd_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c97',
                'created_at' => '2022-09-22 00:51:56',
                'updated_at' => '2022-09-22 00:51:56',
            ),
            2 => 
            array (
                'id' => '58e96d00-bbd7-4c2d-8f24-127bad580f4c',
                'perencanaan_id' => 'd41ed3a7-8ce0-4309-8068-aa7839a132e1',
                'opd_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c98',
                'created_at' => '2022-09-22 22:52:53',
                'updated_at' => '2022-09-22 22:52:53',
            ),
            3 => 
            array (
                'id' => '5bfb663e-12b8-4e60-9356-bf60f2607ace',
                'perencanaan_id' => '05a722bc-3504-4ef4-a5a7-08629ea1952c',
                'opd_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c98',
                'created_at' => '2022-09-22 00:47:22',
                'updated_at' => '2022-09-22 00:47:22',
            ),
            4 => 
            array (
                'id' => '5bfef0ce-a8ea-4309-89e1-8d14b20b4e77',
                'perencanaan_id' => 'b8b2d7a0-047e-431d-950b-04c13814c5bc',
                'opd_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c95',
                'created_at' => '2022-09-22 00:33:43',
                'updated_at' => '2022-09-22 00:33:43',
            ),
            5 => 
            array (
                'id' => '8b8415a9-55bf-4b87-b681-24b7616e9eef',
                'perencanaan_id' => '8674fd2c-041d-49ac-8dd8-adbacb7476ed',
                'opd_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c10',
                'created_at' => '2022-09-21 15:16:04',
                'updated_at' => '2022-09-21 15:16:04',
            ),
            6 => 
            array (
                'id' => 'aa838948-21d7-4721-a45d-03560a16988a',
                'perencanaan_id' => 'aa3c387f-90a5-4148-9ccd-680c6d1f41a0',
                'opd_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c97',
                'created_at' => '2022-09-22 00:45:35',
                'updated_at' => '2022-09-22 00:45:35',
            ),
            7 => 
            array (
                'id' => 'c0393259-fd20-4065-b3c2-17eeab2ae4c8',
                'perencanaan_id' => '28f813fc-f9d9-4a7d-b161-508ad436001e',
                'opd_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c98',
                'created_at' => '2022-09-21 15:14:14',
                'updated_at' => '2022-09-21 15:14:14',
            ),
            8 => 
            array (
                'id' => 'c8476221-a1d6-4ca0-811e-7505ca1f78da',
                'perencanaan_id' => '05a722bc-3504-4ef4-a5a7-08629ea1952c',
                'opd_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c10',
                'created_at' => '2022-09-22 00:47:22',
                'updated_at' => '2022-09-22 00:47:22',
            ),
            9 => 
            array (
                'id' => 'd3827f5f-b26f-4769-a77d-6711f19dc0b2',
                'perencanaan_id' => 'd782e166-f1ac-4e68-866a-84917e214c76',
                'opd_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c97',
                'created_at' => '2022-09-22 00:49:00',
                'updated_at' => '2022-09-22 00:49:00',
            ),
            10 => 
            array (
                'id' => 'fe29a2ac-da57-4f0f-b6ad-6ea3ac88b5b4',
                'perencanaan_id' => 'f884c0d6-ec2c-4038-8440-2eab2a2a4431',
                'opd_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c95',
                'created_at' => '2022-09-22 00:35:41',
                'updated_at' => '2022-09-22 00:35:41',
            ),
        ));
        
        
    }
}