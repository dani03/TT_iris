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
    $data = $request->all();
    return  $this->commentaireRepository->addCommentaire($data);
  }
}
