<?php

namespace App\Livewire\Comment;

use Livewire\Component;
use App\Models\Comment;

class Update extends Component
{

    public Comment $comment;
    public $listeners = ['render'];

    public function render()
    {
        return view('livewire.comment.update');
    }

}
