<?php

use Illuminate\Database\Seeder;
use App\Post;
class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = file_get_contents('posts.json');
        $posts = json_decode($json,true);

        foreach ($posts as $post){

            Post::firstOrCreate([

                'user_id'=>$post['userId'],
                'title'=>$post['title'],
                'body'=>$post['body']

            ]);

        }
    }
}
