<?php

namespace App\Http\Controllers;
use Illuminate\Validation\ValidationException;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function authenticate(Request $request)

    {
        
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        if (!Auth::attempt($credentials)) {  
            throw ValidationException::withMessages([
                'email' => ['Invalid email or password.'],
            ]);
              }
        
        return redirect()->route('user.dashboard',);
    }
}
