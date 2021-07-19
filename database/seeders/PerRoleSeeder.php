<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PerRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 5; $i++) {
            \DB::table('per_role')->insert([
                'role_id' =>1,
                'permission_id' => $i,
            ]);
        }
        for ($i = 6; $i <= 32; $i++) {
            \DB::table('per_role')->insert([
                'role_id' =>2,
                'permission_id' => $i,
            ]);
        }
    }
}
