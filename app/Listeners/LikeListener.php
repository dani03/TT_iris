<?php

namespace App\Listeners;

use App\Events\LikeEvent;
use App\Mail\LikePostMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class LikeListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }


    /**
     * @param LikeEvent $event
     * @return void
     */
    public function handle(LikeEvent $event):void
    {

        Mail::to($event->post->user->email)->send(new LikePostMail($event->post->title));

    }
}
