<?php

namespace App\Http\Controllers\Cafe;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Cafe\CreateRequest;
use App\Models\Cafe;
use App\Models\Menu;
use App\Modules\ImageUpload\ImageManagerInterface;

class CreateController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __construct(private ImageManagerInterface $imageManager)
    {}
    public function __invoke(CreateRequest $request)
    {
        $cafe = new Cafe;
        $cafe->name = $request->cafeName();
        $cafe->country = $request->country();
        $cafe->province = $request->province();
        $cafe->city = $request->city();
        $cafe->street_address = $request->streetAddress();
        $cafe->postalcode = $request->postalCode();
        $cafe->user_id = $request->userId();

        $menuNames = $request->menu();
        $menuPrices = $request->price();

        if($request->filled('description')){
            $cafe->description = $request->description();
        }

        if($request->filled('parking')){
            $cafe->parking = $request->parking();
        }

        if ($request->hasFile('image')) {
            $path = $this->imageManager->saveCafe($request->file('image'));
            $cafe->image = $path;
        }

        $cafe->save();
        if($menuNames != null && $menuPrices != null){
            foreach ($menuNames as $index => $menuName) {
                if (!empty($menuName)) {
                    $menu = new Menu();
                    $menu->name = $menuName;
                    $menu->price = $menuPrices[$index];
                    $menu->cafe_id = $cafe->id;  // set a cafe_id here
                    $menu->save();
                }
            
            }
        }

        return redirect()->route('cafe.detail.show', ['cafeId' => $cafe->id])->with('feedback.success', "The new cafe has been created on the database! Enjoy sharing your experiences!");
    }
}
