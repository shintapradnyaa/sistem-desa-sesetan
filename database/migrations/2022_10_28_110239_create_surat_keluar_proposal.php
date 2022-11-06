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
        Schema::create('surat_keluar_proposal', function (Blueprint $table) {
            $table->id();
            $table->string('no_sk_proposal');
            $table->date('tgl_sk_keluar');
            $table->string('perihal_sk');
            $table->string('ditujukan_sk');
            $table->string('foto_sk_proposal');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('surat_keluar_proposal');
    }
};
