<?php

namespace App\Http\Controllers\Post\Update;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Post\UpdateRequest;
use App\Models\Post;

class PutController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(UpdateRequest $request)
    {
        $post = Post::where('id', $request->getId())->firstOrFail();
        $post->content = $request->getPost();
        $post->user_id = $request->userId();
        $post->cafe_id = $request->getCafeId();
        $post->save();
        return redirect()->route('post.update.show', ['postId' => $post->id])->with('feedback.success', "Modified successfully!");
    }
}
