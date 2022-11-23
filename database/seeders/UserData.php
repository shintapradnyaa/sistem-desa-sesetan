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
                'username' => 'bendesa',
                'password' => bcrypt('bendesa'),
                'banjar' => 'Banjar Pegok',
                'no_telfon' => '82133745676',
                'foto_pengguna' => 'foto'
            ],
            [
                'name' => 'Sekretariat Adat',
                'level' => 2,
                'email' => 'sekretariat@gmail.com',
                'username' => 'sekretariat',
                'password' => bcrypt('sekretariat'),
                'banjar' => 'Banjar Tengah',
                'no_telfon' => '81234567890',
                'foto_pengguna' => 'foto'
            ],
            [
                'name' => 'Kelihan Adat Banjar',
                'email' => 'kelihan@gmail.com',
                'level' => 3,
                'username' => 'kelihan',
                'password' => bcrypt('kelihan'),
                'banjar'  => 'Banjar Kaja',
                'no_telfon' => '81234567890',
                'foto_pengguna' => 'foto'
            ],
        ];

        foreach ($user as $key => $value)
            User::create($value);
    }
}
