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
        Schema::create('surat_masuk_undangan', function (Blueprint $table) {
            $table->id();
            $table->string('no_sm_undangan');
            $table->date('tgl_sm_masuk');
            $table->string('perihal_sm');
            $table->string('asal_sm');
            $table->string('ditujukan_sm');
            $table->string('foto_sm_undangan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('surat_masuk_undangan');
    }
};