<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Modules\ImageUpload\ImageManagerInterface;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function __construct(private ImageManagerInterface $imageManager)
    {}
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());
        $request->user()->fill($request->safe()->only(['name', 'email']));
        $request->user()->cafe_id = $request->getCafeId();
        $request->user()->favDrink = $request->getFavDrink();
        $request->user()->aboutYou = $request->getAboutYou();

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $path = null;
        if ($request->hasFile('picture')) {
            if ($request->user()->profile_image !== null) {
                $this->imageManager->deleteProfile($request->user()->profile_image);
            }
            $path = $this->imageManager->saveProfile($request->file('picture'));
            $request->user()->profile_image = $path;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
