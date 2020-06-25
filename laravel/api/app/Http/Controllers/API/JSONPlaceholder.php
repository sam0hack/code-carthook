<?php

    namespace App\Http\Controllers\API;

    use App\Comment;
    use App\Http\Controllers\Controller;
    use App\Post;
    use App\User;


    /**
     * Class JSONPlaceholder
     * @package App\Http\Controllers\API
     */
    class JSONPlaceholder extends Controller
    {
        /**
         * @param string $user
         * @return array
         */
        public function getUsers($user = '')
        {


            if (!empty($user)) {

                return User::getUser($user);
            }


            //Return all users
            $user_data = User::paginate(40);
            return $user_data;
        }

        /**
         * @param string $user
         * @return array
         */
        public function getPosts($user = '')
        {

            if (!empty($user)) {
                $posts = User::getUser($user);
                if (isset($posts->posts)) {
                    return $posts->posts;
                }
                return array('error'=>'Post not found');



            }

            $posts = Post::paginate();
            return $posts;
        }

        /**
         * @param string $post_id
         * @return mixed
         */
        public function getPostComments($post_id = '')
        {

            if (!empty($post_id)) {
                $post = Post::find($post_id)->comments;

                return $post;
            }

            return Comment::paginate(40);

        }

        /**
         * @param $title
         * @return mixed
         */
        public function searchPost($title)
        {

            return Post::where('title', 'LIKE', "%$title%")->get();


        }


    }
