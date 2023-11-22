<?php

namespace App\Http\Controllers\Cafe\Update;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Cafe\UpdateRequest;
use App\Models\Cafe;
use Illuminate\Support\Facades\Storage;
use App\Models\Menu;
use App\Services\CafeService;
use App\Modules\ImageUpload\ImageManagerInterface;

class PutController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __construct(private ImageManagerInterface $imageManager)
    {}
    public function __invoke(UpdateRequest $request, CafeService $cafeService)
    {
        $cafe = Cafe::where('id', $request->id())->firstOrFail();
        $cafe->name = $request->cafeName();
        $cafe->country = $request->country();
        $cafe->province = $request->province();
        $cafe->city = $request->city();
        $cafe->street_address = $request->streetAddress();
        $cafe->postalcode = $request->postalCode();
        $cafe->user_id = $request->userId();

        if($request->filled('description')){
            $cafe->description = $request->description();
        }

        if($request->filled('parking')){
            $cafe->parking = $request->parking();
        }

        if ($request->hasFile('image')) {
            // Delete the existing image file
            if ($cafe->image !== null) {
                $this->imageManager->deleteCafe($cafe->image);
            }
    
            // Upload the new image file
            $path = $this->imageManager->saveCafe($request->file('image'));
            $cafe->image = $path;
        }
        //delete menus
        $cafeService->deleteMenu($cafe, $request->menuIds());
        //update or save menus
        foreach($request->menu() as $index => $menuName){
            $menuPrice = $request->price()[$index];

            if (array_key_exists($index, $request->menuIds())) {
                $menuId = $request->menuIds()[$index];
            } else {
                $menuId = false;
            }

                if($menuName && $menuPrice && $menuId){
                    $cafeService->updateMenu($menuId, $menuName, $menuPrice);
                } else {
                    $cafeService->saveMenu($menuName, $menuPrice, $cafe->id);
                }
        }

        $cafe->save();
        return redirect()->route('cafe.detail.show', ['cafeId' => $cafe->id])->with('feedback.success', "Cafe information was successfully modified!")->withInput();
    }
}
