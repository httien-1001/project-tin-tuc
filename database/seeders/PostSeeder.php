<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
<<<<<<< Updated upstream
        \DB::table('posts')->insert([
            'user_id' => 1,
            'category_id' =>1,
            'status' =>1,
            'title' =>'Demo title for post 1',
            'description' =>'Demo description for post 1',
            'content' =>'Demo content for post 1',
            'cover_image' =>'demo.png',
        ]);
=======
        
>>>>>>> Stashed changes
    }
}
