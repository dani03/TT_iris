<?php

namespace App\Http\Controllers;

use App\Http\Repositories\PostRepository;
use App\Http\Requests\CommentaireRequest;
use App\Http\Services\CommentaireService;
use App\Http\Services\PostService;
use Illuminate\Http\Request;

class CommentaireController extends Controller
{
    public function __construct(private readonly CommentaireService $commentaireService)
    {
    }

    public function store(CommentaireRequest $request)
    {
        $this->commentaireService->createComment($request);
        //recupération du post/article
        $post = (new PostService(new PostRepository()))->getPost($request->post_id);
        return redirect()->route('posts.show', ['post' => $post])->with('success', 'Commentaire ajouté avec succès...');

    }
}
