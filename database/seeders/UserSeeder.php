<?php

namespace Database\Seeders;

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
        \DB::table('users')->insert([
            'name' => 'admin',
            'email' =>'admin@gmail.com',
            'password' => bcrypt('123123123'),
        ]);
        \DB::table('users')->insert([
            'name' => 'member',
            'email' =>'member@gmail.com',
            'password' => bcrypt('123123123'),
        ]);
    }
}
