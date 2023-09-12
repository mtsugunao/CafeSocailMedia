<?php

namespace App\Livewire\Comment;

use Livewire\Component;
use App\Models\Comment;
use App\Models\Post;
class ShowReply extends Component
{

    public Comment $comment;
    public Post $post;
    public $listeners = ['render'];

    public function mount($comment, $post){
        $this->comment = $comment;
        $this->post = $post;
    }
    public function render()
    {
        return view('livewire.comment.show-reply');
    }
}
