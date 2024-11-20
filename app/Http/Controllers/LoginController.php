<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ConnexionController extends Controller
{
    public function show(){
        return view("login");
    }
    
    public function login(Request $request){
        $credentials = $request->only('email', 'password');
    
        if (Auth::attempt($credentials)) {
            // Authentication passed...
            return redirect()->intended('dashboard');
        }
    
        return back()->withErrors([
            'email' => 'Adresse email invalide!',
        ])->withInput($request->only('email'));
    }
    
}