<?php

namespace App\Http\Controllers\Cafe\Update;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Cafe\UpdateRequest;
use App\Models\Cafe;
use Illuminate\Support\Facades\Storage;

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

        $cafe->save();
        return redirect()->route('cafe.update.show', ['cafeId' => $cafe->id])->with('feedback.success', "Cafe information was successfully modified!");
    }
}
