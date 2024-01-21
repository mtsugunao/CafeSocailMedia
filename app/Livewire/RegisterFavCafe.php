<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Cafe;
use Livewire\WithPagination;

class RegisterFavCafe extends Component
{
    use WithPagination;
    public $keyword;
    private $cafe;
    public function render()
    {
        $this->cafe = auth()->user()->cafe_id;
        if(empty($this->keyword) && isset($this->cafe)){
            return view('livewire.register-fav-cafe', [
                'searchResults' => Cafe::paginate(5),
                'cafe' => Cafe::where('id', $this->cafe)->firstOrFail(),
            ]);
        }else{
            return view('livewire.register-fav-cafe', [
                'searchResults' => Cafe::paginate(5),
            ]);
        }
    }
    public function searchCafe()
    {
        if(auth()->user()->cafe_id){
            $this->cafe = auth()->user()->cafe_id;
            return view('livewire.register-fav-cafe', [
                'searchResults' => Cafe::search($this->keyword)->paginate(5),
                'cafe' => Cafe::where('id', $this->cafe)->firstOrFail()
            ]);
        }else{
            return view('livewire.register-fav-cafe', [
                'searchResults' => Cafe::search($this->keyword)->paginate(5),
                'cafe' => null,
            ]);
        }
    }
}
