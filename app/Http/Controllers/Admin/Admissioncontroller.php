<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Parents;
use DB;

class Admissioncontroller extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admins');
    }

    public function getAdmissionProcess(){
        $unapproveParents = Parents::where('unapproved', null)->get();
        return view('Admin.unapproved', compact('unapproveParent'));
    }

    public function viewAdmission(Request $request, $id){
        $unapproveParents = DB::table('parent_admission')->where('id', $id)->first();
        return view('Admin.ViewAdmission', compact('unapproveParents'));
    }

}
