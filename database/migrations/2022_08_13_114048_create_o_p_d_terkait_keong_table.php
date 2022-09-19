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
        Schema::create('opd_terkait_keong', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('perencanaan_keong_id'); // keong / hewan / manusia
            $table->uuid('opd_id');
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
        Schema::dropIfExists('opd_terkait_keong');
    }
};
