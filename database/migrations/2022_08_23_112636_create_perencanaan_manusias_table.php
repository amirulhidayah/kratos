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
        Schema::create('perencanaan_manusia', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('opd_id');
            $table->string('sub_indikator');
            $table->bigInteger('nilai_pembiayaan');
            $table->string('sumber_dana');
            $table->integer('status')->default(0); // 0/1/2
            $table->date('tanggal_konfirmasi')->nullable();
            $table->text('alasan_ditolak')->nullable();
            $table->text('alasan_tidak_terselesaikan')->nullable();
            $table->integer('status_baca')->nullable();
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
        Schema::dropIfExists('perencanaan_manusia');
    }
};
