<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Route;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $routes_admin = [];
        foreach (Route::getRoutes() as $route){
            $name = $route ->getName();
            $check_include_admin = strpos($name,'admin');
            $check_include_customer = strpos($name,'customer');
            if($check_include_admin !== false || $check_include_customer !== false){
                array_push($routes_admin, $route->getName());
            }
        }
        $routes=json_encode($routes_admin);
        $routes_reader = [];
        foreach (Route::getRoutes() as $route){
            $name = $route ->getName();
            $check_include_customer = strpos($name,'customer');
            if( $check_include_customer !== false){
                array_push($routes_reader, $route->getName());
            }
        }
        $routes_reader=json_encode($routes_reader);
        \DB::table('roles')->insert([
            'name' => 'Admin',
            'permissions' => $routes,
        ]);
        \DB::table('roles')->insert([
            'name' => 'Member',
            'permissions' => $routes_reader,
        ]);
    }
}
