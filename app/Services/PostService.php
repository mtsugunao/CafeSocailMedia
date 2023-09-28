<?php

namespace App\Services;

use App\Models\Post;
use App\Models\Image;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage; 

class PostService {
    public function getPosts() {
        return Post::with('images')->orderBy('created_at', 'DESC')->paginate(5);
    }
    public function getPostsAll() {
        return Post::with('images')->orderBy('created_at', 'DESC')->paginate(3);
    }

    public function getPostsById(int $cafeId) {
        return Post::where('cafe_id', $cafeId)->with('images')->orderBy('created_at', 'DESC')->get();
    }

    public function getPostsByUserId(int $userId) {
        return Post::where('user_id', $userId)->with('images')->orderBy('created_at', 'DESC')->get();
    }

    public function checkOwnPost(int $userId, int $postId): bool {
        $post = Post::where('id', $postId)->first();
        if(!$post){
            return false;
        }

        return $post->user_id === $userId;
    }

    public function savePost(int $userId, string $content, int $cafeId, array $images) {
        DB::transaction(function () use ($userId, $content, $cafeId, $images) {
            $post = new Post;
            $post->user_id = $userId;
            $post->content = $content;
            $post->cafe_id = $cafeId;
            $post->save();
            foreach ($images as $image) {
                $path = Storage::disk("public")->putFile('images', $image);
                $imageModel = new Image;
                $imageModel->name = $path;
                $imageModel->save();
                $post->images()->attach($imageModel->id);
            }
        });
    }

    public function deletePost(int $postId) {
        DB::transaction(function () use ($postId) {
            $post = Post::where('id', $postId)->firstOrFail();
            $post->images()->each(function ($image) use ($post) {
                $filePath =  $image->name;
                if(Storage::exists($filePath)){
                    Storage::delete($filePath);
                }
                $post->images()->detach($image->id);
                $image->delete();
            });
            $post->delete();
        });
    }
}