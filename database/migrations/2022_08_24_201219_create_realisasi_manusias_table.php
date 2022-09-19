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
        Schema::create('realisasi_manusia', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('perencanaan_manusia_id');
            $table->bigInteger('penggunaan_anggaran');
            $table->integer('tw');
            $table->float('progress');
            $table->integer('status'); // 0/1/2
            $table->date('tanggal_konfirmasi')->nullable();
            $table->text('alasan_ditolak')->nullable(); // 0/1/2
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
        Schema::dropIfExists('realisasi_manusia');
    }
};
