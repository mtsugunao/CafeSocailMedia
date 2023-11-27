<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShowFollowingController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $followings = $request->user()->follows()->get();
        return view('followings')->with('followings', $followings);
    }
}
