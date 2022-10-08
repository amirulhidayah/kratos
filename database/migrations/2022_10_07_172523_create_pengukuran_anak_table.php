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
        Schema::create('pengukuran_anak', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('anak_id');
            $table->string('berat');
            $table->string('tinggi');
            $table->string('lila');
            $table->date('tanggal_pengukuran');
            $table->string('usia_saat_ukur');
            $table->uuid('puskesmas_id');
            $table->uuid('posyandu_id')->nullable();
            $table->string('bb_u');
            $table->string('tb_u');
            $table->string('bb_tb');
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
        Schema::dropIfExists('pengukuran_anak');
    }
};
