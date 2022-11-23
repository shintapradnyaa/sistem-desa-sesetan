<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PernikahanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pernikahan')->insert([
            'no_suket'          => '27/BDS/-SST/SKK/IV/2022',
            'tgl_pernikahan'    => '2022-02-03',
            'banjar'            => 'Banjar Tengah',
            'nama_pria'         => 'Made Balik',
            'status_pria'       => 'Purusa',
            'tgl_lahir_pria'    => '2000-01-01',
            'alamat_pria'       => 'Jalan Raya Sesetan',
            'nama_wanita'       => 'Komang Suci',
            'status_wanita'     => 'Pradana',
            'tgl_lahir_wanita'  => '2009-01-07',
            'alamat_wanita'     => 'Jalan Raya Sesetan',
        ]);
    }
}
