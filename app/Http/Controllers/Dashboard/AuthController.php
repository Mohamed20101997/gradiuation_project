<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class AuthController extends Controller
{

    public function getLogin()
    {
        return view('dashboard.auth.login');
    }

    public function login(Request $request)
    {
        $remember_token = $request->has('remember_token') ? true : false ;

        if(auth()->guard('admin')->attempt(['email'=> $request->input("email") ,'password' =>  $request->input("password")  ] , $remember_token))
        {
            return redirect()->route('welcome');
        }
        return redirect()->back()->with(['error'=>'email or password is not correct']);
    }

    public function logout()
    {
        $guard  = $this->getGaurd();
        $guard->logout();
        return redirect()->route('login');
    }

    private function getGaurd(){
        return auth('admin');
    }



}
