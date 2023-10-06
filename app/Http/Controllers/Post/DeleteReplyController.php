<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use App\Services\PostService;
use App\Models\Comment;

class DeleteReplyController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, PostService $postService)
    {
        $commentId = (int) $request->route('commentId');
        if(!$postService->checkOwnComment($request->user()->id, $commentId)){
            throw new AccessDeniedHttpException();
        }
        $comment = Comment::where('id', $commentId)->firstOrFail();
        $postId = $comment->post->id;
        $comment->delete();
        return redirect()->route('post.comment.show', ['postId' => $postId])->with('feedback.success', "Reply has been posted successfully!");
    }
}
