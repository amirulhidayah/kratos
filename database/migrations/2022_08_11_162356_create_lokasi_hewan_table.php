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
        Schema::create('lokasi_hewan', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('desa_id');
            $table->string('nama');
            $table->string('latitude');
            $table->string('longitude');
            $table->text('deskripsi')->nullable();
            $table->integer('status'); // 0/1 = aktif/tidak_aktif
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hewan');
    }
};
