<?php

namespace App\View\Components;

use App\Models\Post;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class LikeButtonComponent extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public Post $post,
        public string $color,
    )
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.like-button-component');
    }
}