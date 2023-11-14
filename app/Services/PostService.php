<?php

namespace App\Services;

use App\Models\Post;
use App\Models\Image;
use App\Models\Comment;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage; 
use App\Modules\ImageUpload\ImageManagerInterface;

class PostService {
    public function __construct(private ImageManagerInterface $imageManager)
    {}
    public function getPosts() {
        return Post::with('images')->orderBy('created_at', 'DESC')->paginate(5);
    }
    public function getPostsAll() {
        return Post::with('images')->orderBy('created_at', 'DESC')->paginate(15);
    }

    public function getPostsById(int $cafeId) {
        return Post::where('cafe_id', $cafeId)->with('images')->orderBy('created_at', 'DESC')->paginate(3);
    }

    public function getPostsByUserId(int $userId) {
        return Post::where('user_id', $userId)->with('images')->orderBy('created_at', 'DESC')->paginate(15);
    }

    public function checkOwnPost(int $userId, int $postId): bool {
        $post = Post::where('id', $postId)->first();
        if(!$post){
            return false;
        }

        return $post->user_id === $userId;
    }

    public function checkOwnComment(int $userId, int $commentId): bool {
        $comment = Comment::where('id', $commentId)->first();
        if(!$comment){
            return true;
        }
        return $comment->user_id === $userId;
    }

    public function savePost(int $userId, string $content, int $cafeId, array $images) {
        DB::transaction(function () use ($userId, $content, $cafeId, $images) {
            $post = new Post;
            $post->user_id = $userId;
            $post->content = $content;
            $post->cafe_id = $cafeId;
            $post->save();
            foreach ($images as $image) {
                $name = $this->imageManager->save($image);
                $imageModel = new Image;
                $imageModel->name = $name;
                $imageModel->save();
                $post->images()->attach($imageModel->id);
            }
        });
    }

    public function deletePost(int $postId) {
        DB::transaction(function () use ($postId) {
            $post = Post::where('id', $postId)->firstOrFail();
            $post->images()->each(function ($image) use ($post) {
                $this->imageManager->delete($image->name);
                $post->images()->detach($image->id);
                $image->delete();
            });
            $post->delete();
        });
    }

    public function postReply(int $commentId, string $reply, int $userId, int $postId){
        DB::transaction(function () use ($commentId, $reply, $userId, $postId) {
            $comment = new Comment;
            $comment->user_id = $userId;
            $comment->post_id = $postId;
            $comment->comment = $reply;
            $comment->parent_comment_id = $commentId;
            $comment->save();
        });
    }
    
}