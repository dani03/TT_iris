<?php

namespace App\Http\Services;

use App\Http\Repositories\PostRepository;
use App\Http\Requests\PostRequest;
use Illuminate\Support\Collection;

class PostService
{
    public function __construct(private PostRepository $postRepository) {}

    public function getAllPosts(): \Illuminate\Contracts\Pagination\LengthAwarePaginator
    {
        return $this->postRepository->getPosts();
    }

    public function addingPost(PostRequest $request)
    {
        $data = ['text' => $request->text, 'title' => $request->title];

        return $this->postRepository->AddPost($data);
    }

    public function getPost(int $postId)
    {

        // récupération du post
        return $this->postRepository->findPost($postId);
    }
}
