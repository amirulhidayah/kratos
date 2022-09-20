<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class IndikatorTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('indikator')->delete();
        
        \DB::table('indikator')->insert(array (
            0 => 
            array (
                'id' => '0d37ea22-3415-4539-b58e-ea23a326ae13',
                'nama' => 'Cakupan layanan ibu Nivas',
                'deleted_at' => NULL,
                'created_at' => '2022-06-30 04:13:53',
                'updated_at' => '2022-06-30 04:13:53',
            ),
            1 => 
            array (
                'id' => '25fffcb8-df91-4a10-9fd5-6128f679f01e',
                'nama' => 'Cakupan Balita Diare yang memperoleh Sumlenetasi Zinc',
                'deleted_at' => NULL,
                'created_at' => '2022-06-30 04:13:18',
                'updated_at' => '2022-06-30 04:13:18',
            ),
            2 => 
            array (
                'id' => '2ba0802b-fcf5-43b0-b73a-e1012a14c2c8',
                'nama' => 'Cakupan Bayi 0-11 bulan yang mendapat Imunisasi dasar lengkap',
                'deleted_at' => NULL,
                'created_at' => '2022-06-30 04:12:11',
                'updated_at' => '2022-06-30 04:12:11',
            ),
            3 => 
            array (
                'id' => '2dc725bd-080b-4eff-9896-131b95f9d54b',
                'nama' => 'Cakupan orang tua yang mengikuti kelas Parenting',
                'deleted_at' => NULL,
                'created_at' => '2022-06-30 04:15:06',
                'updated_at' => '2022-06-30 04:15:06',
            ),
            4 => 
            array (
                'id' => '32421c7e-73d6-4d3f-9313-0c768a651462',
                'nama' => 'Cakupan keluarga 1000 HPK Kelompok miskin sebagai penerima BPNT',
                'deleted_at' => NULL,
                'created_at' => '2022-06-30 04:15:51',
                'updated_at' => '2022-06-30 04:15:51',
            ),
            5 => 
            array (
                'id' => '358ebd9d-fbe0-485d-8a21-bf255dce7db9',
                'nama' => 'Cakupan KPM PKH yang mendapatkan FDS Gizi dan Kesehatan',
                'deleted_at' => NULL,
                'created_at' => '2022-06-30 04:15:40',
                'updated_at' => '2022-06-30 04:15:40',
            ),
            6 => 
            array (
                'id' => '46526fea-2d72-40ce-8245-d514d0e91c50',
            'nama' => 'Cakupan anak usia 2-6 tahun terdaftar (Peserta didik) di PAUD',
                'deleted_at' => NULL,
                'created_at' => '2022-06-30 04:15:16',
                'updated_at' => '2022-06-30 04:15:16',
            ),
            7 => 
            array (
                'id' => '4d028914-259b-46ab-ac32-b3a4e97bf770',
                'nama' => 'Cakupan rumah tangga peserta JKN/Jamkesda',
                'deleted_at' => NULL,
                'created_at' => '2022-06-30 04:15:28',
                'updated_at' => '2022-06-30 04:15:28',
            ),
            8 => 
            array (
                'id' => '4f78975a-b868-41f9-9d88-bc8cf0601760',
                'nama' => 'Cakupan keluarga yang mengikuti bina keluarga balita',
                'deleted_at' => NULL,
                'created_at' => '2022-06-30 04:14:31',
                'updated_at' => '2022-06-30 04:14:31',
            ),
            9 => 
            array (
                'id' => '50957899-4fe5-456e-9e62-a5573d85f59b',
            'nama' => 'Cakupan kehadiran di Posyandu (Rasio yang datang terhadap total sasaran)',
                'deleted_at' => NULL,
                'created_at' => '2022-05-19 13:57:18',
                'updated_at' => '2022-06-30 04:11:42',
            ),
            10 => 
            array (
                'id' => '5ad88039-728b-4ea9-b3c9-b724d3dcbdb8',
            'nama' => 'Cakupan Bumil mendapat IFA (TTD) minimal 90 Tablet selama kehamilan',
                'deleted_at' => NULL,
                'created_at' => '2022-05-19 13:58:09',
                'updated_at' => '2022-06-30 04:11:13',
            ),
            11 => 
            array (
                'id' => '7378f16e-04b1-45f0-bb94-eae944c67c87',
                'nama' => 'Cakupan rumah tangga yang menggunakan sumber air minum layak',
                'deleted_at' => NULL,
                'created_at' => '2022-06-30 04:14:43',
                'updated_at' => '2022-06-30 04:14:43',
            ),
            12 => 
            array (
                'id' => '7c4a7e63-52ec-4e7e-add0-abd0917d06d6',
                'nama' => 'Cakupan Desa menerapkan KRPL',
                'deleted_at' => NULL,
                'created_at' => '2022-06-30 04:16:01',
                'updated_at' => '2022-06-30 04:16:01',
            ),
            13 => 
            array (
                'id' => '8c4ecc70-f6fa-4af5-94b2-420084ee55ab',
            'nama' => 'Cakupan Ibu Hamil (Bumil) kurang energi kronik yang mendapat PMT Pemulihan',
                'deleted_at' => NULL,
                'created_at' => '2022-06-21 06:38:08',
                'updated_at' => '2022-06-30 04:11:01',
            ),
            14 => 
            array (
                'id' => 'a8b0edf8-2437-427f-9075-97d8a9fb6ce5',
                'nama' => 'Cakupan Balita Kurus yang mendapat PMT',
                'deleted_at' => NULL,
                'created_at' => '2022-05-19 13:57:39',
                'updated_at' => '2022-06-30 04:11:26',
            ),
            15 => 
            array (
                'id' => 'beda2a47-a8be-4b3a-9438-b62857f261cd',
                'nama' => 'Cakupan rumah tangga yang menggunakan Sanitasi layak',
                'deleted_at' => NULL,
                'created_at' => '2022-06-30 04:14:54',
                'updated_at' => '2022-06-30 04:14:54',
            ),
            16 => 
            array (
                'id' => 'c72b5a8e-a05c-4aa4-919d-8a28d908e287',
                'nama' => 'Cakupan anak 6-59 bulan yang mendapat Vitamin A',
                'deleted_at' => NULL,
                'created_at' => '2022-05-19 13:56:14',
                'updated_at' => '2022-06-30 04:12:03',
            ),
            17 => 
            array (
                'id' => 'e63a5159-f89b-4664-b777-54dbd542fa34',
                'nama' => 'Cakupan Remaja putri mendapatkan TTD',
                'deleted_at' => NULL,
                'created_at' => '2022-06-30 04:13:34',
                'updated_at' => '2022-06-30 04:13:34',
            ),
            18 => 
            array (
                'id' => 'e9709a42-3581-457f-8ac2-fceda0a69239',
            'nama' => 'Cakupan kelas ibu hamil (Ibu mengikuti konseling Gizi dan Kesehatan)',
                'deleted_at' => NULL,
                'created_at' => '2022-06-30 04:14:16',
                'updated_at' => '2022-06-30 04:14:16',
            ),
            19 => 
            array (
                'id' => 'ef25a5b2-43ee-4689-bc3a-f2c830da197c',
                'nama' => 'Cakupan Ibu Hamil K4',
                'deleted_at' => NULL,
                'created_at' => '2022-05-19 13:56:29',
                'updated_at' => '2022-06-30 04:11:54',
            ),
        ));
        
        
    }
}