<?php

namespace App\Http\Controllers\Post\Update;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\Update\ReplyRequest;
use App\Services\PostService;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use App\Models\Comment;

class ReplyController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(ReplyRequest $request, PostService $postService)
    {
        if(!$postService->checkOwnComment($request->user()->id, $request->getCommentId())){
            throw new AccessDeniedHttpException();
        }
        $comment = Comment::where('id', $request->getCommentId())->firstOrFail();
        $comment->comment = $request->getComment();
        $comment->user_id = $request->userId();
        $comment->post_id = $request->getPostId();
        $comment->save();
        return redirect()->route('post.comment.show', ['postId' => $request->getPostId()])->with('feedback.success', "Modified successfully!");
    }
}
