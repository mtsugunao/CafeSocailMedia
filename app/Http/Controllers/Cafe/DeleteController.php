<?php

namespace App\Http\Controllers\Cafe;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cafe;
use Illuminate\Support\Facades\Storage;
class DeleteController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $cafeId = (int) $request->route('cafeId');
        $cafe = Cafe::where('id', $cafeId)->firstOrFail();
        $path = str_replace('public/', '', $cafe->image);
        Storage::disk('public')->delete($path);
        $cafe->delete();
        return redirect()->route('cafe.detail')->with('feedback.success', "Cafe information was successfully deleted");
    }
}
