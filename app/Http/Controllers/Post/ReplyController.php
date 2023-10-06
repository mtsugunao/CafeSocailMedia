<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\ReplyRequest;
use App\Services\PostService;

class ReplyController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(ReplyRequest $request, PostService $postService)
    {
        $postService->postReply(
            $request->getCommentId(),
            $request->getReply(),
            $request->userId(),
            $request->getPostId()
        );
        return redirect()->route('post.comment.show', ['postId' => $request->getPostId()])->with('feedback.success', "Reply has been posted successfully!");
    }
}
