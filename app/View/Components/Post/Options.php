<?php

namespace App\View\Components\Post;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\Post;

class Options extends Component
{
    /**
     * Create a new component instance.
     * 
     */
    private int $postId;
    private int $userId;
    private Post $post;
    public function __construct(int $postId, int $userId, Post $post)
    {
        $this->postId = $postId;
        $this->userId = $userId;
        $this->post = $post;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.post.options')
            ->with('postId', $this->postId)
            ->with('myPost', \Illuminate\Support\Facades\Auth::id() === $this->userId)
            ->with('post', $this->post);
    }
}
