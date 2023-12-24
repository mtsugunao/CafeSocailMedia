<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Scout\Searchable;

class Cafe extends Model
{
    use HasFactory;
    use SoftDeletes;
    use Searchable;
    protected $fillable = ['name', 'country', 'province', 'city', 'street_address', 'postalcode', 'description', 'parking', 'user_id'];
    public function posts() {
        return $this->hasMany(Post::class);
    }
    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function menus() {
        return $this->hasMany(Menu::class);
    }

}
