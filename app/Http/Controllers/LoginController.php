<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;

class LoginController extends Controller
{
     public function show(){

        return view('auth.login');
    }

    public function login (LoginRequest $request){

        $credentials = $request -> getCredentials();

        if (!Auth::validate($credentials)) {
            return redirect()->to('/login')->withErrors('auth.failed');
        }
        $user = Auth::getProvider()->retrieveByCredentials($credentials);
        Auth::login($user);

        return $this->authenticate($request,$user);
    }
    public function authenticated(Request $request,$user){
        return redirect('/home');
    }
}
