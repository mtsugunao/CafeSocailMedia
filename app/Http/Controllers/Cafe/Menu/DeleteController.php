<?php

namespace App\Http\Controllers\Cafe\Menu;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cafe;
use App\Models\Menu;

class DeleteController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $menuId = (int) $request->route('menuId');
        $menu = Menu::where('id', $menuId)->firstOrFail();
        $cafe = Cafe::where('id', $menu->cafe_id)->firstOrFail();
        $menu->delete();
        return redirect()->route('cafe.update.show', ['cafeId' => $cafe->id]);
    }
}
