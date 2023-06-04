<?php

namespace App\Http\Controllers\Auth;

use App\Events\Frontend\UserRegistered;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Laracasts\Flash\Flash;
use Illuminate\Support\Str;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'nomor_induk_keluarga' => ['required', 'string', 'max: 50'],
            'nim_kampus_asal' => ['required', 'string', 'max: 50'],
            'pt_asal' => ['required', 'string', 'max: 50'],
            'full_name' => ['required', 'string', 'max:191'],
            'email' => ['required', 'string', 'email', 'max:191', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'nomor_induk_keluarga' => $request->nomor_induk_keluarga,
            'nim_kampus_asal' => $request->nim_kampus_asal,
            'pt_asal' => $request->pt_asal,
            'name'       => $request->full_name,
            'email'      => $request->email,
            'password'   => Hash::make($request->password),
        ]);

        // username
        $username = config('app.initial_username') + $user->id;
        $user->username = $username;
        $user->save();

        event(new Registered($user));
        event(new UserRegistered($user));

        Flash::success("<i class='fas fa-check'></i> Akun berhasil dibuat")->important();

        return redirect("/login");
    }
}
