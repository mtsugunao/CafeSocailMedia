<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Services\PostService;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class DeleteController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, PostService $postService)
    {
        $postId = (int) $request->route('postId');
        if(!$postService->checkOwnPost($request->user()->id, $postId)){
            throw new AccessDeniedHttpException();
        }
  
        $postService->deletePost($postId);
        return redirect()->route('post.show')->with('feedback.success', "Posts was successfully deleted!");
    }
}
