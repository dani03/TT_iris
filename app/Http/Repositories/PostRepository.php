<?php

namespace App\Http\Repositories;

use App\Http\Requests\PostRequest;
use App\Models\Post;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class PostRepository
{


    /**
     * @return Mixed
     */
    public function getPosts(): Mixed
    {
        return Post::with('commentaires')->paginate(10);
    }

    /**
     * @param array{text: string, title: string, user_id: int} $data The data required to create a commentaire.
    * @return Post
     */
    public function AddPost(array $data): Post
    {
        return Post::create($data);
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
