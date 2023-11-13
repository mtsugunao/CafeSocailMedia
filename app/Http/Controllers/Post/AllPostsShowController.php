<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\PostService;

class AllPostsShowController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, PostService $postService)
    {
        $posts = $postService->getPostsAll();
        return view('post.posts', compact('posts'));
    }
}
