<?php

namespace App\Http\Controllers\Cafe\Detail;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cafe;
use App\Models\Post;
use App\Services\PostService;

class ShowController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, PostService $postService)
    {
        $cafeId = (int) $request->route('cafeId');
        $cafe = Cafe::where('id', $cafeId)->firstOrFail();
        $posts = $postService->getPostsById($cafeId);
        $address = $cafe->street_address . ' ' . $cafe->city . ' ' . $cafe->province . ' ' . $cafe->country;
        return view('cafe.specific')->with('cafe', $cafe)->with('posts', $posts)->with('address', $address);
    }
}
