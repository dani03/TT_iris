<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Post extends Model
{
    /** @use HasFactory<\Database\Factories\PostFactory> */
    use HasFactory;

    protected $fillable = [
        'text',
        'title',
        'user_id'
    ];


    // un post peut avoir 1 ou plusieurs commentaires donc une relation one to many
    public function commentaires(): HasMany
    {
        return $this->hasMany(Commentaire::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }


    public function likes(): BelongsToMany
    {
        return $this->BelongsToMany(User::class);
    }
}
