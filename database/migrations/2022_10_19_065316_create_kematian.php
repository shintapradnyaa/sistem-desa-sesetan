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
            $table->unsignedBigInteger('user_id');
            $table->string('nama');
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
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
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
