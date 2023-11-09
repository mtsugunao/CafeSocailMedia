<?php

namespace App\Http\Controllers\Post\Update;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Post\UpdateRequest;
use App\Models\Post;
use App\Services\PostService;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class PutController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(UpdateRequest $request, PostService $postService)
    {
        if(!$postService->checkOwnPost($request->user()->id, $request->getId())){
            throw new AccessDeniedHttpException();
        }
        $post = Post::where('id', $request->getId())->firstOrFail();
        $post->content = $request->getPost();
        $post->user_id = $request->userId();
        $post->save();
        return redirect()->route('post.show')->with('feedback.success', "Modified successfully!");
    }
}
