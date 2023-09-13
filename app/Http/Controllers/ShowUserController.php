<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class ShowUserController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $userId = (int) $request->route('userId');
        $user = User::where('id', $userId)->firstOrFail();
        return view('cafeseeker', compact('user'));
    }
}
