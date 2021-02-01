<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\support\Facades\Auth;
use App\Admin;
use DB;

class LoginController extends Controller
{

    public function __construct(){
        $this->middleware('guest:admins')->except('logout');
    }

    public function showLoginForm(){
        
        return view('Admin.Login');
    }

    public function authenticate(Request $request){

        $credentials = $request->only('username', 'password'); 
        if (Auth::guard('admins')->attempt($credentials)){
            return redirect()->intended(route('dashboard'));

        }

        return view('Admin.Login')->withErrors(['username or password is incorrect!']);
    }

    public function logout(){
        Auth::guard('admins')->logout();
        return redirect('admin/login');
    }

    public function username(){
        return 'username';
    }
    
}

