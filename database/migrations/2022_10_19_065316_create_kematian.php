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
        Schema::create('kematian', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
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
            $table->enum('jenis_kelamin', ['Pria', 'Wanita']);
            $table->date('tgl_lahir');
            $table->string('umur');
            $table->enum('agama', ['Hindu', 'Islam', 'Budha', 'Kristen Protestan', 'Kristen Katolik', 'Konghucu']);
            $table->string('alamat');
            $table->date('tgl_kematian');
            $table->date('tgl_ngaben')->nullable();
            $table->string('sebab_kematian');
            $table->string('ahli_waris');
            $table->string('foto_ktp');
            $table->timestamp('created_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kematian');
    }
};
