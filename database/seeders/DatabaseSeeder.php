<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(PerSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(PerRoleSeeder::class);
        $this->call(UserRoleSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(PostSeeder::class);

    }
}
