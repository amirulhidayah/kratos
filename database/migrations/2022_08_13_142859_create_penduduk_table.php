<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penduduk', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('nama');
            $table->string('nik');
            $table->string('jenis_kelamin');
            $table->string('tempat_lahir');
            $table->date("tanggal_lahir");
            $table->string('agama');
            $table->string('status_pendidikan')->nullable();
            $table->string('pekerjaan');
            $table->string('golongan_darah');
            $table->string('status_perkawinan');
            $table->date('tanggal_perkawinan')->nullable();
            $table->string('kewarganegaraan');
            $table->string('no_paspor')->nullable();
            $table->string('no_kitap')->nullable();
            $table->longText('alamat');
            $table->uuid('desa_id');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('penduduk');
    }
};
