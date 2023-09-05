<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Post;
use App\Models\User;

class Like extends Component
{
    public Post $post;
    public int $count;
    public User $user;

    public function mount(Post $post) {

        $this->post = $post;
        if(auth()->user()){
        $this->user = auth()->user();
        }
        if($post->likes_count !== null){
        $this->count = $post->likes_count;
        }else {
            $this->count = 0;
        }
    }

    public function render()
    {
        return view('livewire.like');
    }

    public function like()
    {
        if ($this->post->isLikedBy(auth()->user())) {
            $this->post->likedBy()->detach($this->user);
            $this->count--;
        } else {
            $this->post->likedBy()->attach($this->user);
            $this->count++;
        }
    }
    
}
