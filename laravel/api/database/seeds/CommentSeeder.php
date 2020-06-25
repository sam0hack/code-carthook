<?php

use Illuminate\Database\Seeder;
use App\Comment;
class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = file_get_contents('comments.json');
        $comments = json_decode($json,true);

        foreach ($comments as $comment){

            Comment::firstOrCreate([

                'post_id'=>$comment['postId'],
                'name'=>$comment['name'],
                'email'=>$comment['email'],
                'body'=>$comment['body']

            ]);

        }
    }
}
