<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

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
                'name' => 'Bendesa Adat',
                'email' => 'bendesa@gmail.com',
                'level' => 1,
                'password' => bcrypt('bendesa'),
                'banjar' => 'Banjar Pegok',
                'no_telfon' => '82133745676',
                'foto_pengguna' => ''
            ],
            [
                'name' => 'Sekretariat Adat',
                'level' => 2,
                'email' => 'sekretariat@gmail.com',
                'password' => bcrypt('sekretariat'),
                'banjar' => 'Banjar Tengah',
                'no_telfon' => '81234567890',
                'foto_pengguna' => ''
            ],
            [
                'name' => 'Kelihan Adat Banjar',
                'email' => 'kelihan@gmail.com',
                'level' => 3,
                'password' => bcrypt('kelihan'),
                'banjar'  => 'Banjar Kaja',
                'no_telfon' => '81234567890',
                'foto_pengguna' => ''
            ],
            [
                'name' => 'Warga Adat',
                'email' => 'warga@gmail.com',
                'level' => 4,
                'password' => bcrypt('warga'),
                'banjar'  => 'Banjar Kaja',
                'no_telfon' => '81765439876',
                'foto_pengguna' => ''
            ],
        ];

        foreach ($user as $key => $value)
            User::create($value);
    }
}
