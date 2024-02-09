<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Specialite;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        $specialite = Specialite::all();
        return view('auth.register', compact('specialite'));
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'cin' => 'required|string|max:255|unique:users',
            'Genre' => 'required|string|max:255',
            'role' => 'required|string|max:255',
            'phone' => 'required|string|max:255|unique:users',
            'specialite_id' => 'required_if:role,medecin'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'cin' => $request->cin,
            'Genre' => $request->Genre,
            'role' => $request->role,
            'phone' => $request->phone,
            'specialite_id' => $request->specialite_id
        ]);
        // dd($request->all());

        // event(new Registered($user));

        // Auth::login($user ,$request->filled('remember'));

        return redirect(RouteServiceProvider::HOME);
    }
}
