<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Cafe;
use App\Models\Post;
use App\Services\PostService;
use Livewire\WithFileUploads;
use App\Models\Image;
use Illuminate\Support\Facades\Auth;

class Modal extends Component
{
    use WithFileUploads;
    public $showModal = false;
    public $closeError = false;
    public $cafes = [];
    public $content;
    public $cafe_id;
    public $images = [];
    public $cafe;
    public $posts;

    public function mount($cafe, $posts)
    {
        $this->cafe = $cafe;
        $this->posts = $posts;
    }

    public function render()
    {
        return view('livewire.modal');
    }
 
    public function openModal()
    {
        $this->showModal = true;
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

    public function save($cafeId){
        $this->cafe_id = $cafeId;
        $this->validate([
            'content' => 'required|max:140',
            'cafe_id' => 'required|exists:cafes,id',
            'images' => 'array|max:4',
            'images.*' => 'mimes:jpeg,png,jpg,gif|max:2048' 
        ]);
        $post = Post::create([
            'user_id' => Auth::user()->id,
            'cafe_id' => $this->cafe_id,
            'content' =>$this->content
        ]);

        foreach ($this->images as $image) {
            $path = $image->store('public/images');
            $imageModel = Image::create([
                'name' => $path
            ]);
            $post->images()->attach($imageModel->id);
        }
    
        session()->flash('success', 'Images has been successfully Uploaded.');
        $this->reset(['content', 'cafe_id', 'images']);
        $this->closeModal();

    }

}
