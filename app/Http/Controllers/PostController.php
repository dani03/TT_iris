<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Http\Services\PostService;
use App\Models\Post;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __construct(private readonly PostService $postService) {}

    /**
     * @return View
     */
    public function index(): View
    {
        //dd( $this->postService->getAllPosts());
        return view('posts.index', ['posts' => $this->postService->getAllPosts()]);
    }

    public function store(PostRequest $request)
    {
        if ($this->postService->addingPost($request)) {
            session()->flash('success', 'Article ajouté avec succès...');
        } else {
            session()->flash('error', "Une erreur est survenue dans l'ajout de l'article...");
        }

        return redirect()->route('home');
    }

    public function show(Post $post)
    {

        return view('posts.show', ['post' => $post]);
    }
}
