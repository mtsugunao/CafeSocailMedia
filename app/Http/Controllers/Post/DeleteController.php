<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

class DeleteController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $postId = (int) $request->route('postId');
        $post = Post::where('id', $postId)->firstOrFail();
        $post->delete();
        return redirect()->route('post.show')->with('feedback.success', "Posts was successfully deleted!");
    }
}
