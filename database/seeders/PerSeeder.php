<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('permissions')->insert([
            'full_name' => 'View dashboard admin',
            'route_name' =>'admin.index.',
        ]);
        \DB::table('permissions')->insert([
            'full_name' => 'View dashboard category ',
            'route_name' =>'admin.index.category',
        ]);
        \DB::table('permissions')->insert([
            'full_name' => 'View dashboard post ',
            'route_name' =>'admin.index.post',
        ]);
        \DB::table('permissions')->insert([
            'full_name' => 'View dashboard user ',
            'route_name' =>'admin.index.user',
        ]);
        \DB::table('permissions')->insert([
            'full_name' => 'View dashboard role ',
            'route_name' =>'admin.index.role',
        ]);

    }
}
