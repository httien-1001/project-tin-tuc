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
        //        member profile
        \DB::table('permissions')->insert([
            'full_name' => 'Member profile',
            'route_name' =>'customer.profile.index',
        ]);
        \DB::table('permissions')->insert([
            'full_name' => 'Member edit password',
            'route_name' =>'customer.profile.update',
        ]);
        \DB::table('permissions')->insert([
            'full_name' => 'Member edit avatar',
            'route_name' =>'customer.profile.store',
        ]);
//        member comment
        \DB::table('permissions')->insert([
            'full_name' => 'Member create comment',
            'route_name' =>'customer.comment.store',
        ]);
        \DB::table('permissions')->insert([
            'full_name' => 'Member delete comment',
            'route_name' =>'customer.comment.destroy',
        ]);
//        admin
        \DB::table('permissions')->insert([
            'full_name' => 'View dashboard admin',
            'route_name' =>'admin.index',
        ]);
//         category
        \DB::table('permissions')->insert([
            'full_name' => 'View dashboard category',
            'route_name' =>'admin.category.index',
        ]);
        \DB::table('permissions')->insert([
            'full_name' => 'View add category form',
            'route_name' =>'admin.category.create',
        ]);
        \DB::table('permissions')->insert([
            'full_name' => 'Create category',
            'route_name' =>'admin.category.store',
        ]);
        \DB::table('permissions')->insert([
            'full_name' => 'View edit category form',
            'route_name' =>'admin.category.update',
        ]);
        \DB::table('permissions')->insert([
            'full_name' => 'Update category',
            'route_name' =>'admin.category.update',
        ]);
        \DB::table('permissions')->insert([
            'full_name' => 'Delete category',
            'route_name' =>'admin.category.destroy',
        ]);
//        post
        \DB::table('permissions')->insert([
            'full_name' => 'View dashboard post',
            'route_name' =>'admin.post.index',
        ]);
        \DB::table('permissions')->insert([
            'full_name' => 'View add post form',
            'route_name' =>'admin.post.create',
        ]);
        \DB::table('permissions')->insert([
            'full_name' => 'Create post',
            'route_name' =>'admin.post.store',
        ]);
        \DB::table('permissions')->insert([
            'full_name' => 'View edit post form',
            'route_name' =>'admin.post.update',
        ]);
        \DB::table('permissions')->insert([
            'full_name' => 'Update post',
            'route_name' =>'admin.post.update',
        ]);
        \DB::table('permissions')->insert([
            'full_name' => 'Delete post',
            'route_name' =>'admin.post.destroy',
        ]);
//        user
        \DB::table('permissions')->insert([
            'full_name' => 'View dashboard user',
            'route_name' =>'admin.user.index',
        ]);
        \DB::table('permissions')->insert([
            'full_name' => 'View add user form',
            'route_name' =>'admin.user.create',
        ]);
        \DB::table('permissions')->insert([
            'full_name' => 'Create user',
            'route_name' =>'admin.user.store',
        ]);
        \DB::table('permissions')->insert([
            'full_name' => 'View edit user form',
            'route_name' =>'admin.user.update',
        ]);
        \DB::table('permissions')->insert([
            'full_name' => 'Update user',
            'route_name' =>'admin.user.update',
        ]);
//        role
        \DB::table('permissions')->insert([
            'full_name' => 'View dashboard role',
            'route_name' =>'admin.role.index',
        ]);
        \DB::table('permissions')->insert([
            'full_name' => 'View add role form',
            'route_name' =>'admin.role.create',
        ]);
        \DB::table('permissions')->insert([
            'full_name' => 'Create role',
            'route_name' =>'admin.role.store',
        ]);
        \DB::table('permissions')->insert([
            'full_name' => 'View edit role form',
            'route_name' =>'admin.role.update',
        ]);
        \DB::table('permissions')->insert([
            'full_name' => 'Update role',
            'route_name' =>'admin.role.update',
        ]);
        \DB::table('permissions')->insert([
            'full_name' => 'Delete role',
            'route_name' =>'admin.role.destroy',
        ]);
//        admin comment
        \DB::table('permissions')->insert([
            'full_name' => 'View dashboard comment',
            'route_name' =>'admin.comment.index',
        ]);

        \DB::table('permissions')->insert([
            'full_name' => 'Hide comment',
            'route_name' =>'admin.comment.show',
        ]);
        \DB::table('permissions')->insert([
            'full_name' => 'Restore comment',
            'route_name' =>'admin.comment.edit',
        ]);
        \DB::table('permissions')->insert([
            'full_name' => 'Delete comment',
            'route_name' =>'admin.comment.destroy',
        ]);

    }
}
