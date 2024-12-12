<?php

namespace App\Providers;

use App\Events\LikeEvent;
use App\Listeners\LikeListener;
use App\Models\Post;
use App\Observers\PostObserver;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //on enregistre notre observateur pour les posts
        Post::observe(PostObserver::class);

        Event::listen(
            LikeEvent::class,
            LikeListener::class,
        );
    }
}
