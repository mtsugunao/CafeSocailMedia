<?php

namespace App\View\Components\Post;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Options extends Component
{
    /**
     * Create a new component instance.
     * 
     */
    private int $postId;
    private int $userId;
    public function __construct(int $postId, int $userId)
    {
        $this->postId = $postId;
        $this->userId = $userId;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.post.options')
            ->with('postId', $this->postId)
            ->with('myPost', \Illuminate\Support\Facades\Auth::id() === $this->userId);
    }
}
