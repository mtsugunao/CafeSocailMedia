<?php

namespace App\Http\Controllers\Cafe\Search;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cafe;

class KeywordController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $keyword = $request->input('keyword');

        if(isset($keyword)){
        $searchResults = Cafe::where('name', 'like', '%' . $keyword . '%')
        ->orWhere('country', 'like', '%' . $keyword . '%')
        ->orWhere('province', 'like', '%' . $keyword . '%')
        ->orWhere('city', 'like', '%' . $keyword . '%')
        ->orWhere('street_address', 'like', '%' . $keyword . '%')
        ->orWhere('postalcode', 'like', '%' . $keyword . '%')
        ->get();

        return view('cafe.result')->with('searchResults', $searchResults);
        }
        $searchResults = [];
        return view('cafe.result')->with('searchResults', $searchResults);
    }
}
