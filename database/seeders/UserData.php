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
                'username' => 'bendesa',
                'password' => bcrypt('bendesa'),
                'level' => 1,
                'email' => 'bendesa@gmail.com'
            ],
            [
                'name' => 'Sekretariat Adat',
                'username' => 'sekretariat',
                'password' => bcrypt('sekretariat'),
                'level' => 2,
                'email' => 'sekretariat@gmail.com'
            ],
            [
                'name' => 'Kelihan Adat Banjar',
                'username' => 'kelihan',
                'password' => bcrypt('kelihan'),
                'level' => 3,
                'email' => 'kelihan@gmail.com'
            ],
            [
                'name' => 'Warga Adat',
                'username' => 'warga',
                'password' => bcrypt('warga'),
                'level' => 4,
                'email' => 'warga@gmail.com'
            ],
        ];

        foreach($user as $key =>$value)
        User::create($value);
    }
}
