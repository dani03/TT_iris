<?php

namespace App\Http\Repositories;

use App\Models\Commentaire;

class CommentaireRepository
{

    /**
     * ajout d'un commentaire à un article/post
     * @param array{comment: string, post_id: int} $data The data required to create a commentaire.
     * @return Commentaire
     */
    public function addCommentaire(array $data): Commentaire
    {
        return Commentaire::create([
            'comment' => $data['comment'],
            'post_id' => $data['post_id']
        ]);
    }

    /**
     * récupération de tous les commentaires d'un post
     * @param int $postId
     * @return mixed
     */
    public function getCommentaires(int $postId)
    {
        //pour des questions de performance on utilise paginate
        return Commentaire::where('post_id', $postId)->paginate(10);

    }

}
