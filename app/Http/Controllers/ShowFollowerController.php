<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Auth;

class ShowFollowerController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $followers = $request->user()->followers()->get();
        return view('followers')->with('followers', $followers);
    }
}
