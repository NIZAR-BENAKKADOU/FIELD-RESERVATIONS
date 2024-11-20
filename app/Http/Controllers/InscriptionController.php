<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class InscriptionController extends Controller
{
    public function show(){
        return view ("register");
        }
    public function register(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'email' =>
                'required|string|email|max:255|unique:users',
            'password' =>
                'required|string|min:8|confirmed',
        ]);
        $user = User::create([
            'nom' => $request->nom,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        auth()->login($user);
        return redirect()->route('home');
    }
}