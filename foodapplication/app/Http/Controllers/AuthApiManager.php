<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthApiManager extends Controller
{
   function login(Request $request) {
    if (empty($request->email) && empty($request->password)) {
        return array("status" => "failed", "message" => "All fields are required") ;
    }

    $user = User::where("email", $request->email)->first();
    if (!$user ) {
        return array("status" => "failed" , "message" => "Retry with correct credentials") ;
    }   
    
    $credentials = $request->only("email","password");
    if (Auth::attempt($credentials)) {
        return array("status" => "success",
                "message" => "login successful",
                "name" => $user->name, "email" => $user->email) ;
    }

    return array("status" => "failed" , "message" => "Retry with correct credentials") ;

   }

   
   
   function Registraion(Request $request) {
    if (empty($request->name) && empty($request->email) && empty($request->password)) {
        return array("status" => "failed", "message" => "All fields are required") ;
    }

    $user = User::create([
        'type' => "customer",
        "name" => $request->name,
        "email" => $request->email,
        "password" => $request->password,
    ]);

    if (!$user ) {
        return array("status" => "failed" , "message" => "Registration failed") ;
    }  

    
    return array("status" => "success" , "message" => "Registration successful") ;
    


   }
}
