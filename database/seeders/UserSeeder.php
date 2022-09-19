<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            // admin
            [
                'id' => '28f36223-ad80-495b-b461-deb4075fe511',
                'nama' => 'Admin',
                'username' => 'admin',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                'opd_id' => '',
                'status' => 1,
                'role' => 'Admin'
            ],
            [
                'id' => '28f36223-ad80-495b-b461-deb4075fe530',
                'nama' => 'Pimpinan',
                'username' => 'pimpinan',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                'opd_id' => '',
                'status' => 1,
                'role' => 'Pimpinan'
            ],
            [
                'id' => '28f36223-ad80-495b-b461-deb4075fe512',
                'nama' => 'Dinas Kesehatan',
                'username' => 'opd1',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                'opd_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c95',
                'status' => 1,
                'role' => 'OPD'
            ],
            [
                'id' => '28f36223-ad80-495b-b461-deb4075fe513',
                'nama' => 'Dinas Kebersihan',
                'username' => 'opd2',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                'opd_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c97',
                'status' => 1,
                'role' => 'OPD'
            ],
            [
                'id' => '28f36223-ad80-495b-b461-deb4075fe514',
                'nama' => 'Dinas Sosial',
                'username' => 'opd3',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                'opd_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c96',
                'status' => 1,
                'role' => 'OPD'
            ],
            [
                'id' => '28f36223-ad80-495b-b461-deb4075fe515',
                'nama' => 'Dinas Kebersihan',
                'username' => 'opd4',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                'opd_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c97',
                'status' => 1,
                'role' => 'OPD'
            ],
            [
                'id' => '28f36223-ad80-495b-b461-deb4075fe516',
                'nama' => 'Dinas Kesehatan',
                'username' => 'opd5',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                'opd_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c95',
                'status' => 1,
                'role' => 'OPD'
            ],
            [
                'id' => '28f36223-ad80-495b-b461-deb4075fe517',
                'nama' => 'Dinas Pendidikan',
                'username' => 'opd6',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                'opd_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c11',
                'status' => 1,
                'role' => 'OPD'
            ],
            [
                'id' => '28f36223-ad80-495b-b461-deb4075fe518',
                'nama' => 'Dinas Perhubungan',
                'username' => 'opd7',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                'opd_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c10',
                'status' => 1,
                'role' => 'OPD'
            ],


        ];

        DB::table('users')->insert($data);
    }
}
