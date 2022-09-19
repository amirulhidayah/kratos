<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SekolahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'id' => '0075b51c-49c0-4e81-a3b3-a6b4e21b3x01',
                'nama' => 'SD 1 Anca',
                'jenjang' => 'SD',
                'jenis' => 'Negeri',
                'desa_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c20',
                'created_at' => '2022-04-10 21:16:59'
            ],
            [
                'id' => '0075b51c-49c0-4e81-a3b3-a6b4e21b3x02',
                'nama' => 'SD 2 Anca',
                'jenjang' => 'SD',
                'jenis' => 'Swasta',
                'desa_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c20',
                'created_at' => '2022-04-10 21:16:58'
            ],
            [
                'id' => '0075b51c-49c0-4e81-a3b3-a6b4e21b3x03',
                'nama' => 'SD 3 Anca',
                'jenjang' => 'SD',
                'jenis' => 'Negeri',
                'desa_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c20',
                'created_at' => '2022-04-10 21:16:57'
            ],
            [
                'id' => '0075b51c-49c0-4e81-a3b3-a6b4e21b3x04',
                'nama' => 'SMP 1 Anca',
                'jenjang' => 'SMP',
                'jenis' => 'Negeri',
                'desa_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c20',
                'created_at' => '2022-04-10 21:16:56'
            ],
            [
                'id' => '0075b51c-49c0-4e81-a3b3-a6b4e21b3x05',
                'nama' => 'SMP 2 Anca',
                'jenjang' => 'SMP',
                'jenis' => 'Negeri',
                'desa_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c20',
                'created_at' => '2022-04-10 21:16:55'
            ],
            [
                'id' => '0075b51c-49c0-4e81-a3b3-a6b4e21b3x06',
                'nama' => 'SMP 3 Anca',
                'jenjang' => 'SMP',
                'jenis' => 'Swasta',
                'desa_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c20',
                'created_at' => '2022-04-10 21:16:54'
            ],
            [
                'id' => '0075b51c-49c0-4e81-a3b3-a6b4e21b3x07',
                'nama' => 'SMA 1 Anca',
                'jenjang' => 'SMA / SMK',
                'jenis' => 'Swasta',
                'desa_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c20',
                'created_at' => '2022-04-10 21:16:53'
            ],
            [
                'id' => '0075b51c-49c0-4e81-a3b3-a6b4e21b3x08',
                'nama' => 'SMA 2 Anca',
                'jenjang' => 'SMA / SMK',
                'jenis' => 'Negeri',
                'desa_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c20',
                'created_at' => '2022-04-10 21:16:52'
            ],
            [
                'id' => '0075b51c-49c0-4e81-a3b3-a6b4e21b3x09',
                'nama' => 'SMA 3 Anca',
                'jenjang' => 'SMA / SMK',
                'jenis' => 'Negeri',
                'desa_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c20',
                'created_at' => '2022-04-10 21:16:51'
            ],
            [
                'id' => '0075b51c-49c0-4e81-a3b3-a6b4e21b3x10',
                'nama' => 'SDN 1 Langko',
                'jenjang' => 'SDN',
                'jenis' => 'Negeri',
                'desa_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c21',
                'created_at' => '2022-04-10 21:16:50'
            ],
            [
                'id' => '0075b51c-49c0-4e81-a3b3-a6b4e21b3x11',
                'nama' => 'SD 2 Langko',
                'jenjang' => 'SDN',
                'jenis' => 'Swasta',
                'desa_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c21',
                'created_at' => '2022-04-10 21:15:49'
            ],
            [
                'id' => '0075b51c-49c0-4e81-a3b3-a6b4e21b3x12',
                'nama' => 'SMPN 1 Langko',
                'jenjang' => 'SMPN',
                'jenis' => 'Swasta',
                'desa_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c21',
                'created_at' => '2022-04-10 21:15:48'
            ],
            [
                'id' => '0075b51c-49c0-4e81-a3b3-a6b4e21b3x13',
                'nama' => 'SMPN 2 Langko',
                'jenjang' => 'SMPN',
                'jenis' => 'Negeri',
                'desa_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c21',
                'created_at' => '2022-04-10 21:15:47'
            ],
            [
                'id' => '0075b51c-49c0-4e81-a3b3-a6b4e21b3x14',
                'nama' => 'MAN 1 Langko',
                'jenjang' => 'SMA / SMK',
                'jenis' => 'Swasta',
                'desa_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c21',
                'created_at' => '2022-04-10 21:15:46'
            ],
            [
                'id' => '0075b51c-49c0-4e81-a3b3-a6b4e21b3x15',
                'nama' => 'SMAN 2 Langko',
                'jenjang' => 'SMA / SMK',
                'jenis' => 'Negeri',
                'desa_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c21',
                'created_at' => '2022-04-10 21:15:45'
            ],
            [
                'id' => '0075b51c-49c0-4e81-a3b3-a6b4e21b3x16',
                'nama' => 'SD 1 OLU',
                'jenjang' => 'SD',
                'jenis' => 'Negeri',
                'desa_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c22',
                'created_at' => '2022-04-10 21:15:44'
            ],
            [
                'id' => '0075b51c-49c0-4e81-a3b3-a6b4e21b3x17',
                'nama' => 'SMP 1 OLU',
                'jenjang' => 'SMP',
                'jenis' => 'Negeri',
                'desa_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c22',
                'created_at' => '2022-04-10 21:15:43'
            ],
            [
                'id' => '0075b51c-49c0-4e81-a3b3-a6b4e21b3x18',
                'nama' => 'SMA 1 OLU',
                'jenjang' => 'SMA / SMK',
                'jenis' => 'Negeri',
                'desa_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c22',
                'created_at' => '2022-04-10 21:15:42'
            ],
            [
                'id' => '0075b51c-49c0-4e81-a3b3-a6b4e21b3x19',
                'nama' => 'SD 1 PURO\'O',
                'jenjang' => 'SD',
                'jenis' => 'Negeri',
                'desa_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c23',
                'created_at' => '2022-04-10 21:15:41'
            ],
            [
                'id' => '0075b51c-49c0-4e81-a3b3-a6b4e21b3x20',
                'nama' => 'SD 2 PURO\'O',
                'jenjang' => 'SD',
                'jenis' => 'Negeri',
                'desa_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c23',
                'created_at' => '2022-04-10 21:15:40'
            ],
            [
                'id' => '0075b51c-49c0-4e81-a3b3-a6b4e21b3x21',
                'nama' => 'SMP 1 PURO\'O',
                'jenjang' => 'SMP',
                'jenis' => 'Negeri',
                'desa_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c23',
                'created_at' => '2022-04-10 21:14:39'
            ],
            [
                'id' => '0075b51c-49c0-4e81-a3b3-a6b4e21b3x22',
                'nama' => 'SMP 2 PURO\'O',
                'jenjang' => 'SMP',
                'jenis' => 'Negeri',
                'desa_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c23',
                'created_at' => '2022-04-10 21:14:38'
            ],
            [
                'id' => '0075b51c-49c0-4e81-a3b3-a6b4e21b3x23',
                'nama' => 'SMA 1 PURO\'O',
                'jenjang' => 'SMA / SMK',
                'jenis' => 'Negeri',
                'desa_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c23',
                'created_at' => '2022-04-10 21:14:37'
            ],
            [
                'id' => '0075b51c-49c0-4e81-a3b3-a6b4e21b3x24',
                'nama' => 'SMA 2 PURO\'O',
                'jenjang' => 'SMA / SMK',
                'jenis' => 'Negeri',
                'desa_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c23',
                'created_at' => '2022-04-10 21:14:36'
            ],
            [
                'id' => '0075b51c-49c0-4e81-a3b3-a6b4e21b3x25',
                'nama' => 'SD 1 PURO\'O',
                'jenjang' => 'SD',
                'jenis' => 'Swasta',
                'desa_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c24',
                'created_at' => '2022-04-10 21:14:35'
            ],
            [
                'id' => '0075b51c-49c0-4e81-a3b3-a6b4e21b3x26',
                'nama' => 'SD 2 PURO\'O',
                'jenjang' => 'SD',
                'jenis' => 'Swasta',
                'desa_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c24',
                'created_at' => '2022-04-10 21:14:34'
            ],
            [
                'id' => '0075b51c-49c0-4e81-a3b3-a6b4e21b3x27',
                'nama' => 'SD 3 PURO\'O',
                'jenjang' => 'SD',
                'jenis' => 'Swasta',
                'desa_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c24',
                'created_at' => '2022-04-10 21:14:33'
            ],
            [
                'id' => '0075b51c-49c0-4e81-a3b3-a6b4e21b3x28',
                'nama' => 'SMP 1 PURO\'O',
                'jenjang' => 'SMP',
                'jenis' => 'Swasta',
                'desa_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c24',
                'created_at' => '2022-04-10 21:14:32'
            ],
            [
                'id' => '0075b51c-49c0-4e81-a3b3-a6b4e21b3x29',
                'nama' => 'SMP 2 PURO\'O',
                'jenjang' => 'SMP',
                'jenis' => 'Swasta',
                'desa_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c24',
                'created_at' => '2022-04-10 21:14:31'
            ],
            [
                'id' => '0075b51c-49c0-4e81-a3b3-a6b4e21b3x30',
                'nama' => 'SMP 3 PURO\'O',
                'jenjang' => 'SMP',
                'jenis' => 'Swasta',
                'desa_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c24',
                'created_at' => '2022-04-10 21:14:30'
            ],
            [
                'id' => '0075b51c-49c0-4e81-a3b3-a6b4e21b3x31',
                'nama' => 'SMA 1 PURO\'O',
                'jenjang' => 'SMA / SMK',
                'jenis' => 'Swasta',
                'desa_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c24',
                'created_at' => '2022-04-10 21:14:29'
            ],
            [
                'id' => '0075b51c-49c0-4e81-a3b3-a6b4e21b3x32',
                'nama' => 'SMA 2 PURO\'O',
                'jenjang' => 'SMA / SMK',
                'jenis' => 'Swasta',
                'desa_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c24',
                'created_at' => '2022-04-10 21:14:28'
            ],
            [
                'id' => '0075b51c-49c0-4e81-a3b3-a6b4e21b3x33',
                'nama' => 'SMA 3 PURO\'O',
                'jenjang' => 'SMA / SMK',
                'jenis' => 'Swasta',
                'desa_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c24',
                'created_at' => '2022-04-10 21:14:27'
            ],
        ];

        DB::table('sekolah')->insert($data);
    }
}
