<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Post\CreateRequest;
use App\Models\Post;
use App\Services\PostService;

class CreateController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(CreateRequest $request, PostService $postService)
    {
        $postService->savePost(
            $request->userId(),
            $request->getPost(),
            $request->getCafeId(),
            $request->images()
        );
        return redirect()->route('post.new')->with('feedback.success', "Posted successfully!");
    }
}
