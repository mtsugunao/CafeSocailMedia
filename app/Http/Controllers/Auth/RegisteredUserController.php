<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use App\Mail\NewUserIntroduction;
use Illuminate\Contracts\Mail\Mailer;;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request, Mailer $mailer): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'picture' => ['image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
        ]);

        $path = null;
        if ($request->hasFile('picture')) {
            $path = $request->file('picture')->store('profile-icons', 'public');
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'profile_image' => $path,
        ]);

        event(new Registered($user));

        Auth::login($user);

        //sending an email to the registered user
        $mailer->to($user->email)->send(new NewUserIntroduction($user));

        return redirect(RouteServiceProvider::HOME);
    }
}
