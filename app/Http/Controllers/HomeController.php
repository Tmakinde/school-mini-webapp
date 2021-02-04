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
//use SnappyPDF;
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
        
        //$pdf = PDF::loadView('User.mypdfresult');
        //$pdf->set_base_path("/public/css/sign-in-page");
        return PDF::loadView('User.mypdfresult')->setOrientation('landscape')->setPaper('a4')->setOption('margin-bottom', 0)->inline('pdf_file.pdf');
        
    }

    public $array = [];

    public function userTransformer(){
        $user = auth()->user();
        $result = [
            "name" => $user->name,
            "class" => $user->classes->class,
            "class_pos" => null,
            "subjects" => $this->resultpos(),

        ];
        dd(json_encode($result));
    }
    public function subjectPos()
    {
        $user = User::with('subjects.results')->where('id', auth()->user()->id)->get(); // user, subjects, result collection
        //dd($user);
        $user->each(function($userCol){ 
            $subjects = $userCol->subjects->each(function($subjectCol){
                $pos = 1;
                foreach ($subjectCol->results->sortByDesc('total') as $key) {
                    if ($key->user_id === auth()->user()->id) {
                        array_push($this->array, [
                            "name" => $subjectCol->Subjectname,
                            "exam_score" => $key->exam,
                            "test" => $key->test,
                            "total" => $key->total,
                            "position" => $pos
                        ]);
                        break;
                    }
                    $pos++;
                } 
            }); 
        });
        return $this->array;
    }

    public function classPos(){

    }
    
}
