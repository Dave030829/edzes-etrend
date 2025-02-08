<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegistrationController extends Controller
{
    // A regisztrációs űrlap megjelenítése
    public function create()
    {
        return view('register');
    }

    // A regisztrációs adatok feldolgozása
    public function store(Request $request)
    {
        // Validáció
        $request->validate([
            'username' => 'required|string|max:255|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);
        

        // Új felhasználó létrehozása
        $user = User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        

        // Automatikus bejelentkezés
        auth()->login($user);

        // Átirányítás
        return redirect()->route('welcome')->with('username', $user->username);
    }
}
