<?php

namespace App\Http\Services;

use App\Http\Repositories\CommentaireRepository;
use App\Http\Requests\CommentaireRequest;
use App\Models\Commentaire;

class CommentaireService
{

  public function __construct(private readonly CommentaireRepository $commentaireRepository) {}


  /**
   * @param CommentaireRequest $request
   * @return Mixed
   */
  public function createComment(CommentaireRequest $request): Mixed
  {

   
    $data = [
      'comment' => (string) $request->input('comment'),
      'post_id' => (int) $request->input('post_id'),
      'user_id' => auth()->user()->id,

    ];
    return  $this->commentaireRepository->addCommentaire($data);
  }
}
