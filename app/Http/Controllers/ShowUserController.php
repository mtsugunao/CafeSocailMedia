<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Services\PostService;

class ShowUserController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, PostService $postService)
    {
        $userId = (int) $request->route('userId');
        $posts = $postService->getPostsByUserId($userId);
        $user = User::where('id', $userId)->firstOrFail();
        return view('cafeseeker', compact('user', 'posts'));
    }
}
