<?php

namespace App\Http\Controllers\Parent;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{

    public function __construct(){
        return $this->middleware('guest:parents')->except('logout');
    }

    public function showLoginForm(){
        return view('Parent.login');
    }

    public function login(Request $request){
        $credentials = $request->only('username', 'password'); 
        if (Auth::guard('parents')->attempt($credentials)){
            return redirect()->intended(route('parent.dashboard'));

        }

        return view('Admin.Login')->withErrors(['username or password is incorrect!']);
    }

    public function logout(){
        Auth::guard('parents')->logout();
        return redirect('parent');
    }

}
