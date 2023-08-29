<?php

namespace App\Http\Controllers\Cafe\Update;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Cafe\UpdateRequest;
use App\Models\Cafe;
use Illuminate\Support\Facades\Storage;
use App\Models\Menu;

class PutController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(UpdateRequest $request)
    {
        $cafe = Cafe::where('id', $request->id())->firstOrFail();
        $cafe->name = $request->cafeName();
        $cafe->country = $request->country();
        $cafe->province = $request->province();
        $cafe->city = $request->city();
        $cafe->street_address = $request->streetAddress();
        $cafe->postalcode = $request->postalCode();

        $menus = $cafe->menus; // retrive the record related to cafe
        $menuIds = $menus->pluck('id')->toArray(); // Change menu id to array
        $menuNames = $request->menu();
        $menuPrices = $request->price();

        if($request->filled('description')){
            $cafe->description = $request->description();
        }

        if($request->filled('parking')){
            $cafe->parking = $request->parking();
        }

        if ($request->hasFile('image')) {
            // Delete the existing image file
            if ($cafe->image !== null) {
                $path = str_replace('public/', '', $cafe->image);
                Storage::disk('public')->delete($path);
            }
    
            // Upload the new image file
            $image = $request->file('image');
            $path = $image->store('public/' . 'cafe');
            $cafe->image = $path;
        }

        // 新しいメニューを追加する処理
        foreach ($menuNames as $index => $menuName) {
            if(!empty($menuName)){
                // 新しいメニューを追加
                $menu = new Menu();
                $menu->name = $menuName;
                $menu->price = $menuPrices[$index];
                $menu->cafe_id = $cafe->id;
                $menu->save();
            }
        }


        $cafe->save();
        return redirect()->route('cafe.update.show', ['cafeId' => $cafe->id])->with('feedback.success', "Cafe information was successfully modified!");
    }
}
