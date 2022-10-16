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
        Schema::create('penduduk_realisasi', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('realisasi_id');
            $table->string('sasaran_intervensi');
            $table->uuid('orang_tua_id');
            $table->uuid('anak_id')->nullable();
            $table->integer('status')->default(0); // 0/1/2
            $table->integer('nomor'); // 0/1/2
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
        Schema::dropIfExists('penduduk_realisasi');
    }
};
