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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('level', 4);
            $table->string('password');
            $table->string('no_telfon');
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
            $table->string('foto_pengguna')->nullable();
            $table->enum('jenis_kelamin', ['Pria', 'Wanita']);
            $table->string('status')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};
