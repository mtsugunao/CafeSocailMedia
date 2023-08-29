<?php

namespace App\Http\Controllers\Cafe\Update;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cafe;
use App\Models\Menu;

class ShowController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $cafeId = (int) $request->route('cafeId');
        $cafe = Cafe::where('id', $cafeId)->firstOrFail();
        $menus = Menu::where('cafe_id', $cafeId)->get();
        return view('cafe.update')->with('cafe', $cafe)->with('menus', $menus);

    }
}
