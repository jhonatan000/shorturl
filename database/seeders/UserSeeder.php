<?php

namespace Database\Seeders;

use App\Models\User;
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
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt(1)
        ]);


        User::create([
            'name' => 'user',
            'email' => 'Diskominfo@gmail.com',
            'password' => bcrypt(1)
        ]);
    }


}
