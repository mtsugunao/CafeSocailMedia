<?php

namespace App\Http\Controllers\Cafe\Detail;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cafe;

class ShowController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $cafeId = (int) $request->route('cafeId');
        $cafe = Cafe::where('id', $cafeId)->firstOrFail();
        return view('cafe.specific')->with('cafe', $cafe);
    }
}
