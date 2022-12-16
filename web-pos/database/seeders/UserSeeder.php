<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Admin',
            'username' => 'AxyTomy9',
            'phonenumber' => '085669920357',
            'email' => 'axtomy9@gmail.com',
            'perusahaan_id' => 1,
            'satker_id' => 1,
            // 'satker' => 'IT',
            'level_id' => 1,
            'password' => md5('./19312250Tm'),
        ]);
        User::create([
            'name' => 'Kasir',
            'username' => 'kasir2',
            'phonenumber' => '085669920357',
            'email' => 'kasir@example.com',
            'perusahaan_id' => 1,
            'satker_id' => 1,
            // 'satker' => 'IT',
            'level_id' => 2,
            'password' => md5('123'),
        ]);
        User::create([
            'name' => 'User',
            'username' => 'user3',
            'phonenumber' => '085669920357',
            'email' => 'user@example.com',
            'perusahaan_id' => 1,
            'satker_id' => 1,
            // 'satker' => 'IT',
            'level_id' => 3,
            'password' => md5('123'),
        ]);
        User::create([
            'name' => 'Tamu',
            'username' => 'guest',
            'phonenumber' => '085669920357',
            'email' => 'guest@example.com',
            'perusahaan_id' => 2,
            'satker_id' => 2,
            'level_id' => 3,
            'password' => md5('123'),
        ]);
    }
}
