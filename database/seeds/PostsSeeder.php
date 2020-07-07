<?php

use Illuminate\Database\Seeder;

class PostsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 1; $i <= 50; $i++) {

            // insert data
            DB::table('posts')->insert([
                'title' => 'Post 1 the beach menganti',
                'body' => 'the beach beautyfull',
                'cover_image' => 'noimage.jpg',
                'user_id' => '1'
            ]);
        }
        
    }
}
