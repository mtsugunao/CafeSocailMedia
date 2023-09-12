<?php

namespace App\Livewire\Comment;

use Livewire\Component;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;

class Reply extends Component
{
    public $showModal = false;
    public Comment $comment;
    public string $reply;
    public int $postId;
    public int $commentId;
    public Post $post;
    protected $rules = [
        'reply' => 'required',
        'commentId' => 'required'
    ];

    public function mount(Comment $comment, Post $post) {
        $this->comment = $comment;
        $this->postId = $comment->post->id;
        $this->post = $post;
    }

    public function openModal() {
        $this->showModal = true;
    }

    public function closeModal() {
        $this->showModal = false;
    }

    public function render()
    {
        return view('livewire.comment.reply');
    }

    public function reloadReply(){
        $this->dispatch('render');
    }

    public function save($commentId) {
        $this->commentId = $commentId;
        $this->validate();
        $comment = Comment::create([
            'user_id' => Auth::user()->id,
            'post_id' => $this->postId,
            'comment' => $this->reply,
            'parent_comment_id' => $commentId
        ]);
        
    
        session()->flash('error_' . $this->comment->id, 'Reply has been successful.');
        $this->closeModal();
        return redirect()->to('/post/comment/' . $this->postId);
        //非同期でリプライされた内容を更新できるようにする
        //$this->reloadReply();
    }
}
