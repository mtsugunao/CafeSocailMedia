<?php

namespace App\Http\Controllers\Cafe;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Cafe\CreateRequest;
use App\Models\Cafe;
use App\Models\Menu;

class CreateController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(CreateRequest $request)
    {
        $cafe = new Cafe;
        $cafe->name = $request->cafeName();
        $cafe->country = $request->country();
        $cafe->province = $request->province();
        $cafe->city = $request->city();
        $cafe->street_address = $request->streetAddress();
        $cafe->postalcode = $request->postalCode();

        $menuNames = $request->menu();
        $menuPrices = $request->price();

        if($request->filled('description')){
            $cafe->description = $request->description();
        }

        if($request->filled('parking')){
            $cafe->parking = $request->parking();
        }

        if($request->hasFile('image')){
            $image = $request->file('image');
            $path = $image->store('public/' . 'cafe');
            $cafe->image = $path;
        }

        $cafe->save();

        foreach ($menuNames as $index => $menuName) {
            if (!empty($menuName)) {
                $menu = new Menu();
                $menu->name = $menuName;
                $menu->price = $menuPrices[$index];
                $menu->cafe_id = $cafe->id;  // set a cafe_id here
                $menu->save();
            }
        }

        return redirect()->route('cafe.new')->with('feedback.success', "Cafe infomation submitted successfully!");
    }
}
