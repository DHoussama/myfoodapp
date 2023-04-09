<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthApiManager extends Controller
{
   function login(Request $request) {
    if (empty($request->email) || empty($request->password)) {
        return array("status" => "failed", "message" => "All fields are required") ;
    }

    $user = User::where("email", $request->email)->first();
    if (!$user ) {
        return array("status" => "failed" , "message" => "The email address doesn't exist, Please verify it ") ;
    }   
    
    $credentials = $request->only("email","password");
    if (Auth::attempt($credentials)) {
        return array("status" => "success",
                "message" => "login successful",
                "name" => $user->name, "email" => $user->email) ;
    }

    return array("status" => "failed" , "message" => "Your password is wrong") ;

   }

   
   
   function Registration(Request $request) {
    if (empty($request->name) || empty($request->email) || empty($request->password)) {
        return array("status" => "failed", "message" => "All fields are required") ;
    }

    if  (!filter_var($request->email, FILTER_VALIDATE_EMAIL)) {
        return array("status" => "failed", "message" => "Please enter a valid email address");
    }

    $user = User::create([
        'type' => "customer",
        "name" => $request->name,
        "email" => $request->email,
        "password" => Hash::make($request->password)
    ]);

    if (!$user ) {
        return array("status" => "failed" , "message" => "Registration failed") ;
    }  

    
    return array("status" => "success" , "message" => "Registration successful") ;
    


   }
}
