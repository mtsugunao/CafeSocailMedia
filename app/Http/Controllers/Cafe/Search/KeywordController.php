<?php

namespace App\Http\Controllers\Cafe\Search;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cafe;
use Illuminate\Support\Facades\DB;

class KeywordController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $keywords = $request->input('keyword');

        if(isset($keywords)){
            $arrayKeywords = explode(" ", $keywords);
            $query = DB::table('cafes');
            foreach($arrayKeywords as $keyword){
                $query->where(function ($query) use ($keyword) {
                    $query->where('name', 'like', '%' . $keyword . '%')
                           ->orWhere('country', 'like', '%' . $keyword . '%')
                           ->orWhere('province', 'like', '%' . $keyword . '%')
                           ->orWhere('city', 'like', '%' . $keyword . '%')
                           ->orWhere('street_address', 'like', '%' . $keyword . '%')
                           ->orWhere('postalcode', 'like', '%' . $keyword . '%');
            });
        }
            $searchResults = $query->get();

        return view('cafe.result')->with('searchResults', $searchResults);
        }
        $searchResults = [];
        return view('cafe.result')->with('searchResults', $searchResults);
    }
}
