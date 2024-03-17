<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(){
        return view('pages.auth.login');
    }

    public function loginStore(LoginRequest $request){
       
        if(Auth::attempt($request->validated())){
            
            return to_route('dashboard');
        }
        
        return back()->with('error', 'password atau email salah');
    }

    public function logout()
    {
        Auth::logout();

        return to_route('login');
    }
}
