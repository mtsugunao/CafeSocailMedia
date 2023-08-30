<?php

namespace App\Http\Controllers\Cafe\Search;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cafe;

class ProvinceController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $caProvinces = $request->input('canada', []);
        $usProvinces = $request->input('us', []);
        $provinces = array_merge($caProvinces, $usProvinces);
        $searchResults = Cafe::whereIn('province', $provinces)->get();

        return view('cafe.result')->with('searchResults', $searchResults);

    }
}
