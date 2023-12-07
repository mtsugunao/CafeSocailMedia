<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\Notification;
use Illuminate\Support\Facades\Auth;

class Follow extends Component
{
    public User $user;
    public $isFollowing = false;
    public string $isFollowed = "";
    public function mount(User $user){
        $this->user = $user;
        $this->isFollowing = Auth::user()->isFollowing($user);
        $this->isFollowing ? $this->isFollowed = "Following" : $this->isFollowed = "Follow";
    }
    public function render()
    {
        return view('livewire.follow');
    }

    public function toggleFollow() {
        if($this->isFollowing){
            Auth::user()->follows()->detach($this->user);
            $this->isFollowing = false;
            $this->isFollowed = "Follow";
        }else{
            Auth::user()->follows()->attach($this->user);
            $this->isFollowing = true;
            $this->isFollowed = "Following";
        }
    }
}
