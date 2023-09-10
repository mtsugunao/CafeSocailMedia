<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', // 他の fillable プロパティも必要に応じてここに追加
        'cafe_id',
        'content',
    ];

    protected $withCount = [
        'likes',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function cafe() {
        return $this->belongsTo(Cafe::class);
    }

    public function images() {
        return $this->belongsToMany(Image::class, 'post_images')->using(PostImage::class);
    }

    public function likedBy() {
        return $this->belongsToMany(User::class, 'post_likes');
    }

    public function likes() {
        return $this->hasMany(PostLike::class);
    }

    public function isLikedBy(User $user)
    {
        return $this->likes()->where('user_id', $user->id)->exists();
    }

    public function comments() {
        return $this->hasMany(Comment::class);
    }

    }
