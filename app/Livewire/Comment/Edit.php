<?php

namespace App\Livewire\Comment;

use Livewire\Component;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;

class Edit extends Component
{
    public $showModal = false;
    public $closeError = false;
    public Comment $edit;
    public $commentId;
    public $postId;
    public string $comment;
    public Post $post;

    protected $rules = [
        'comment' => 'required'
    ];

    public function mount(Comment $edit, Post $post, int $postId) {
        $this->edit = $edit;
        $this->postId = $post;
        $this->postId = $postId;
    }

    public function render()
    {
        return view('livewire.comment.edit');
    }

    public function openModal($id)
    {
        $this->showModal = true;
        $this->comment = Comment::where('id', $id)->firstOrFail()->comment;
    }
 
    public function closeModal()
    {
        $this->showModal = false;  
    }


    public function closeWindow() {
        $this->closeError = false;
    }

    
    public function openError() {
        $this->closeError = true;
    }

    public function updateShareComment() {
        $this->dispatch('render');
    }


    public function save($commentId) {
        $this->commentId = $commentId;
        $this->validate();
        $edit = Comment::where('id', $this->commentId)->update([
            'user_id' => Auth::user()->id,
            'post_id' => $this->postId,
            'comment' => $this->comment
        ]);
        
    
        session()->flash('error_' . $this->edit->id, 'Comment has been modified.');
        $this->closeModal();
        $this->updateShareComment();
    }

}
