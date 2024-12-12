<?php

namespace App\Http\Controllers;

use App\Events\LikeEvent;
use App\Http\Repositories\UserRepository;
use App\Http\Requests\PostRequest;
use App\Http\Services\PostService;
use App\Http\Services\UserService;
use App\Models\Post;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
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

    /**
     * ajouter un post / article
     * @param PostRequest $request
     * @return RedirectResponse
     */
    public function store(PostRequest $request): RedirectResponse
    {
        if ($this->postService->addingPost($request)) {
            session()->flash('success', 'Article ajouté avec succès...');
        } else {
            session()->flash('error', "Une erreur est survenue dans l'ajout de l'article...");
        }

        return redirect()->route('home');
    }

    /**
     * @param Post $post
     * @return View
     */
    public function show(Post $post): View
    {

        return view('posts.show', ['post' => $post]);
    }

    /**
     * @param Post $post
     * @param Request $request
     * @return RedirectResponse
     */
    public function likes(Post $post, Request $request): RedirectResponse
    {
        //recupération du user
        $userId = $request->user()->id;
        $user = (new UserService(new UserRepository()))->getUser($userId);
        if (!$user) {
            return redirect()->back()->with('error', 'utilisateur non trouvé');
        }

        $result = $post->likes()->toggle($userId);

        // on vérifie si on a liké ou unliked
        $action = empty($result['attached']) ? 'unliked' : 'liked';
        if ($action === 'liked') {

            event(new LikeEvent($post, $user));
        }
        return redirect()->back();
    }
}
