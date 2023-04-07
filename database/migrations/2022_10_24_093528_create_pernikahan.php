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
        Schema::create('pernikahan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('no_suket')->nullable()->unique();
            $table->date('tgl_pernikahan');
            $table->string('nama_pria');
            $table->enum('status_pria', ['Purusa', 'Pradana']);
            $table->string('tmpt_lahir_pria');
            $table->date('tgl_lahir_pria');
            $table->string('pekerjaan_pria');
            $table->string('alamat_pria');
            $table->string('nama_wanita');
            $table->enum('status_wanita', ['Purusa', 'Pradana']);
            $table->date('tgl_lahir_wanita');
            $table->string('tmpt_lahir_wanita');
            $table->string('pekerjaan_wanita');
            $table->string('alamat_wanita');
            $table->string('rohaniawan');
            $table->string('saksi1');
            $table->string('saksi2');
            $table->enum('status_surat', ['Proses', 'Selesai']);
            $table->timestamp('created_at');

            $table->foreign('user_id', 'jenis_kelamin')->references('id')->on('users');
            // $table->foreign('jenis_kelamin')->references('id')->on('users');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pernikahan');
    }
};
