<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

         $credentials = $request->only("email","password");
         if (Auth::attempt($credentials)) {
             return redirect()->intended(route("dashboard"))->with("success","login success") ;
         }
         return redirect()->intended(route("login"))->with("error","login success") ;
    }
}
