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
            $table->string('no_suket');
            $table->date('tgl_pernikahan');
            $table->enum('banjar', [
                'Banjar Kaja',
                'Banjar Pembungan',
                'Banjar Tengah',
                'Banjar Gaduh',
                'Banjar Puri Agung',
                'Banjar Lantang Bejuh',
                'Banjar Dukuh Sari',
                'Banjar Pegok',
                'Banjar Suwung Batan Kendal'
            ]);
            $table->string('nama_pria');
            $table->enum('status_pria', ['Purusa', 'Pradana']);
            $table->date('tgl_lahir_pria');
            $table->string('alamat_pria');
            $table->string('nama_wanita');
            $table->enum('status_wanita', ['Purusa', 'Pradana']);
            $table->date('tgl_lahir_wanita');
            $table->string('alamat_wanita');
            $table->enum('status_surat', ['Proses', 'Selesai']);
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
