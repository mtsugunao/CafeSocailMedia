<?php

namespace App\Http\Controllers\Post\Update;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Cafe;
use App\Services\PostService;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class ShowController extends Controller
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
        $post = Post::where('id', $postId)->firstOrFail();
        $cafes = Cafe::all();
        return view('post.update')->with('post', $post)->with('cafes', $cafes);
    }
}
