<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KematianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kematian')->insert([
            'nama'      => 'Komang',
            'banjar'    => 'Banjar Kaja',
            'jenis_kelamin' => 'Pria',
            'tgl_lahir'     => '2000-01-01',
            'agama'         => 'Hindu',
            'alamat'        => 'Jalan Raya Sesetan',
            'tgl_kematian'  => '2009-01-03',
            'tgl_ngaben'    => '2009-01-07',
            'sebab_kematian' => 'sakit',
            'ahli_waris'    => 'putu balik',
            'foto_ktp'      => 'foto',
        ]);
    }
}
