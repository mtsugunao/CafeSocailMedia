<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comment;
use App\Http\Requests\Post\CommentRequest;
use App\Models\User;
use App\Models\Post;
use App\Notifications\CommentNotification;

class CommentController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(CommentRequest $request)
    {
        $postId = $request->postId();
        $comment = new Comment;
        $comment->post_id = $request->postId();
        $comment->user_id = $request->userId();
        $comment->comment = $request->getComment();
        $comment->save();
        //notify the user who commented
        $post = Post::find($request->postId());
        $user = User::find($post->user_id);
        $user->notify(
            new CommentNotification($comment)
        );
        return redirect()->route('post.comment.show', ['postId' => $postId])->with('feedback.success', "Commented!");
    }
}
