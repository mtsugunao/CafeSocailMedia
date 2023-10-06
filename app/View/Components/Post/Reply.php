<?php

namespace App\View\Components\Post;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\Post;
use App\Models\Comment;

class Reply extends Component
{
    /**
     * Create a new component instance.
     */
    private Post $post;
    private Comment $comment;
    public function __construct(Post $post, Comment $comment)
    {
        $this->post = $post;
        $this->comment = $comment;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.post.reply')
        ->with('post', $this->post)
        ->with('comment', $this->comment);
    }
}
