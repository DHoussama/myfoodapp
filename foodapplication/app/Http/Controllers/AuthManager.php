<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use Error;

class AuthManager extends Controller
{
    function login() {
        return view("login");
    }

    function loginPost(Request $request) {
         $request->validate([
            'email'  => 'required|email',
            'password' => 'required'
         ]);

         $user = User::where('email', $request->email)->first();
    if (!$user) {
        return back()->withErrors(['email' => 'The provided email is wrong.']);
    }

         $credentials = $request->only("email","password");
         if (Auth::attempt($credentials)) {
             return redirect()->intended(route("dashboard"))->with("success","login success") ;
         }
         return back()->withErrors(['email' => 'Your credentials are wrong.']);
    }

    function logout() {
    session::flush();
    Auth::logout();
    return redirect(route("login")) ;
    }

    function goHome() {
        return view("home") ;
        }
}
