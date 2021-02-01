<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Response;
use App\Http\Controllers\Controller;
use App\Admin;
use App\User;
use App\Classes;
use App\Subject;
use SnappyPDF;
use PDF;
use Illuminate\support\Facades\Storage;
class HomeController extends Controller
{
    //
    function __construct(){
        $this->middleware('auth:web');
    }

    public function masterBlade(){
        $currentUser = Auth::user();
        $userClass = Classes::where('id', $currentUser ->classes_id)->first();
        $userClassSubjects = $userClass->subjects;
        return view('User.layouts.master');
    }

    public function index(){
        $currentUser = Auth::user();
        $userClass = Classes::where('id', $currentUser ->classes_id)->first();
        $userClassSubjects = $userClass->subjects;
        return view('User.welcome', compact('currentUser','userClassSubjects','userClass'));
    }

    public function createUserSubject(Request $resquest){
      
        $currentUser = User::where('id', Auth::user()->id)->first();
        $subjectClicked = $resquest->get('subject');
        $currentUser->subjects()->detach();
        if(!empty($subjectClicked)){
            foreach ($subjectClicked  as $key => $value) { 
                    $userClassSubjects = Subject::where('Subjectname', $value)->first();
                    $currentUser->subjects()->attach($userClassSubjects->id);
                }
            }
            return redirect()->back();
    }

    public function displayUserSubjects(Request $resquest){
        $currentUser = User::where('id', Auth::user()->id)->first();
        $userSubjects = $currentUser->subjects;
        return view('User.subject', compact('userSubjects'));
    }

    public function viewResult(Request $request){
        return view('User.myresult');
    }

    public function downloadResult(Request $request){
        
        $pdf = PDF::loadView('User.mypdfresult');
        //$pdf->set_base_path("/public/css/sign-in-page");
        return $pdf->download('pdf_file.pdf');
        
    }

}
