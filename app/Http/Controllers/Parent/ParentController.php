<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ParentController extends Controller
{
    public function __construct(){
        return $this->middleware('auth:parents')->except('admission');
    }

    public function index(){
        return view('Parent.index');
    }

    public function admission(){
        return view('Parent.admission');
    }

    
}
