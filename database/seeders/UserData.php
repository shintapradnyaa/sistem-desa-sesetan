<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserData extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
                'name' => 'Drs. I Made Widra, M.M',
                'email' => 'widra@gmail.com',
                'level' => 1,
                'password' => bcrypt('password'),
                'banjar' => 'Banjar Pegok',
                'no_telfon' => '082133745676',
                'foto_pengguna' => ''
            ],
            [
                'name' => 'Dudi Mahendra, SS',
                'level' => 2,
                'email' => 'dudik@gmail.com',
                'password' => bcrypt('password'),
                'banjar' => 'Banjar Tengah',
                'no_telfon' => '081234567890',
                'foto_pengguna' => ''
            ],
            [
                'name' => 'I Ketut Kertayasa, S.sos',
                'email' => 'kertayasa@gmail.com',
                'level' => 3,
                'password' => bcrypt('password'),
                'banjar'  => 'Banjar Tengah',
                'no_telfon' => '081234567890',
                'foto_pengguna' => ''
            ],
            [
                'name' => 'I Kadek Sudama',
                'email' => 'sudama1@gmail.com',
                'level' => 3,
                'password' => bcrypt('password'),
                'banjar'  => 'Banjar Kaja',
                'no_telfon' => '082134567888',
                'foto_pengguna' => ''
            ],
            [
                'name' => 'I Made Murja',
                'email' => 'murja08@gmail.com',
                'level' => 3,
                'password' => bcrypt('password'),
                'banjar'  => 'Banjar Pembungan',
                'no_telfon' => '082134567888',
                'foto_pengguna' => ''
            ],
            [
                'name' => 'I Ketut Sony Sasana',
                'email' => 'sony@gmail.com',
                'level' => 3,
                'password' => bcrypt('password'),
                'banjar'  => 'Banjar Gaduh',
                'no_telfon' => '081246789876',
                'foto_pengguna' => ''
            ],
            [
                'name' => 'I Gusti Arya Putra',
                'email' => 'gustiarya@gmail.com',
                'level' => 3,
                'password' => bcrypt('password'),
                'banjar'  => 'Banjar Puri Agung',
                'no_telfon' => '081234567888',
                'foto_pengguna' => ''
            ],
            [
                'name' => 'I Made Bawa',
                'email' => 'bawa@gmail.com',
                'level' => 3,
                'password' => bcrypt('password'),
                'banjar'  => 'Banjar Dukuh Sari',
                'no_telfon' => '081338345678',
                'foto_pengguna' => ''
            ],
            [
                'name' => 'I Wayan Sumastra',
                'email' => 'sumastra@gmail.com',
                'level' => 3,
                'password' => bcrypt('password'),
                'banjar'  => 'Banjar Lantang Bejuh',
                'no_telfon' => '081239876598',
                'foto_pengguna' => ''
            ], [
                'name' => 'I Nyoman Susun',
                'email' => 'susun70@gmail.com',
                'level' => 3,
                'password' => bcrypt('password'),
                'banjar'  => 'Banjar Pegok',
                'no_telfon' => '081246789890',
                'foto_pengguna' => ''
            ], [
                'name' => 'I Wayan Suwirta',
                'email' => 'suwitra@gmail.com',
                'level' => 3,
                'password' => bcrypt('password'),
                'banjar'  => 'Banjar Suwung Batan Kendal',
                'no_telfon' => '081338765789',
                'foto_pengguna' => ''
            ],
            [
                'name' => 'Nyoman Suka',
                'email' => 'mansuka1@gmail.com',
                'level' => 4,
                'password' => bcrypt('password'),
                'banjar'  => 'Banjar Kaja',
                'no_telfon' => '81765439876',
                'foto_pengguna' => ''
            ],
            [
                'name' => 'Puti Arya Wira',
                'email' => 'wira@gmail.com',
                'level' => 4,
                'password' => bcrypt('password'),
                'banjar'  => 'Banjar Lantang Bejuh',
                'no_telfon' => '81765439876',
                'foto_pengguna' => ''
            ],
            [
                'name' => 'I Putu Prima Santosa',
                'email' => 'primasan@gmail.com',
                'level' => 4,
                'password' => bcrypt('password'),
                'banjar'  => 'Banjar Tengah',
                'no_telfon' => '81765439876',
                'foto_pengguna' => ''
            ],
            [
                'name' => 'Putu Juliantara',
                'email' => 'juli123@gmail.com',
                'level' => 4,
                'password' => bcrypt('password'),
                'banjar'  => 'Banjar Pembungan',
                'no_telfon' => '81765439876',
                'foto_pengguna' => ''
            ],
            [
                'name' => 'Gede Eka',
                'email' => 'eka080@gmail.com',
                'level' => 4,
                'password' => bcrypt('password'),
                'banjar'  => 'Banjar Kaja',
                'no_telfon' => '81765439876',
                'foto_pengguna' => ''
            ],
        ];

        foreach ($user as $key => $value)
            User::create($value);
    }
}
