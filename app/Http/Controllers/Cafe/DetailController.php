<?php

namespace App\Http\Controllers\Cafe;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cafe;
class DetailController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $cafes = Cafe::get();
        return view('cafe.detail')->with('cafes', $cafes);
    }
}
