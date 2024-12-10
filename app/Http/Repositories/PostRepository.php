<?php

namespace App\Http\Repositories;

use App\Http\Requests\PostRequest;
use App\Models\Post;

class PostRepository
{


    public function getPosts()
    {
        return Post::with('commentaires')->paginate(10);
    }

    /**
     * @param array $data
     * @return mixed
     */
    public function AddPost(array $data)
    {
        return Post::create([
            'text' => $data['text'],
            'title' => $data['title'],

        ]);
    }

    /**
     * @param int $postId
     * @return Post|null
     */
    public function findPost(int $postId): Post|null
    {
        return Post::find($postId);
    }
}
