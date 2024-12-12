<?php

namespace App\Http\Services;

use App\Http\Repositories\PostRepository;
use App\Http\Requests\PostRequest;
use App\Models\Post;
use Illuminate\Support\Collection;

class PostService
{
    public function __construct(private PostRepository $postRepository) {}

    /**
     * @return mixed
     */
    public function getAllPosts(): mixed
    {
        return $this->postRepository->getPosts();
    }

    /**
     * @param PostRequest $request
     * @return Post
     */
    public function addingPost(PostRequest $request): Post
    {
        $data = ['text' => $request->text, 'title' => $request->title, 'user_id' => (int) $request->user()->id];

        return $this->postRepository->AddPost($data);
    }

    /**
     * @param int $postId
     * @return Post|null
     */
    public function getPost(int $postId): Post | null
    {

        // récupération du post
        return $this->postRepository->findPost($postId);
    }
}
