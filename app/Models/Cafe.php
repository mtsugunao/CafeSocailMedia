<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cafe extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function posts() {
        return $this->hasMany(Post::class);
    }

    public function menus() {
        return $this->hasMany(Menu::class);
    }
}
