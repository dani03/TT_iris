<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Commentaire extends Model
{
    /** @use HasFactory<\Database\Factories\CommentaireFactory> */
    use HasFactory;

    protected $fillable = [
        'comment',
        'post_id',
        'user_id'
    ];


    // un commentaire n'appartient qu'à 1 seul post donc une relation one to one
    public function post(): BelongsTo
    {
        return $this->belongsTo(Post::class);
    }

    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }
}
