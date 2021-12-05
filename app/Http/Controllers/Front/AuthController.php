<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{

    public function getLogin()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $remember_token = $request->has('remember_token') ? true : false ;

        if(auth()->guard('student')->attempt(['email'=> $request->input("email") ,'password' =>  $request->input("password")  ] , $remember_token))
        {
            return redirect()->route('front.home');
        }


        return redirect()->back()->with(['error'=>'email or password is not correct']);
    }

    public function logout()
    {
        auth('student')->logout();
        return redirect()->route('front.login');
    }


}


