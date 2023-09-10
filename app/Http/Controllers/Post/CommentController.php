<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comment;
use App\Http\Requests\Post\CommentRequest;

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
        return redirect()->route('post.comment.show', ['postId' => $postId])->with('feedback.success', "Commented!");
    }
}
