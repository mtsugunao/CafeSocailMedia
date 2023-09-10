<?php

namespace App\Livewire\Comment;

use Livewire\Component;
use App\Models\Comment;

class Remove extends Component
{
    public int $removableId;
    public $modalOn = false;

    public function mount(int $removableId){
        $this->removableId = $removableId;
    }

    public function render()
    {
        return view('livewire.comment.remove');
    }

    public function showModal(){
        $this->modalOn = true;
    }

    public function closeModal(){
        $this->modalOn = false;
    }

    public function deleteComment(){
        $comment = Comment::where('id', $this->removableId)->firstOrFail();
        $postId = $comment->post->id;
        $comment->delete();
        session()->flash('delete.success', 'Comment has been removed.');
        $this->closeModal();
        return redirect()->to('/post/comment/' . $postId);
    }
    
}
