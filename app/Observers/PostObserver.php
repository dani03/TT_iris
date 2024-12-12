<?php

namespace App\Observers;

use App\Mail\PostCreatedMail;
use App\Models\Post;
use Illuminate\Support\Facades\Mail;

class PostObserver
{
    /**
     * Handle the Post "created" event.
     */
    public function created(Post $post): void
    {
        // on envoie un mail lorsque le post est crée
        //lorsqu'on lance les seeders un mail envoyer et pour eviter ça on met un mail fictif
        Mail::to(auth()->user()->email ?? "email@fictif.fr", $post)->send(new PostCreatedMail(['title' => $post->title]));

    }

    /**
     * Handle the Post "updated" event.
     */
    public function updated(Post $post): void
    {
        //
    }

    /**
     * Handle the Post "deleted" event.
     */
    public function deleted(Post $post): void
    {
        //
    }

    /**
     * Handle the Post "restored" event.
     */
    public function restored(Post $post): void
    {
        //
    }

    /**
     * Handle the Post "force deleted" event.
     */
    public function forceDeleted(Post $post): void
    {
        //
    }
}
