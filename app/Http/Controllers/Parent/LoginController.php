<?php

namespace App\Http\Controllers\Parent;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Position;
use PDF;

class LoginController extends Controller
{

    public function __construct(){
        return $this->middleware('auth:parents')->except('showLoginForm', 'login');
    }

    public function showLoginForm(){
        return view('Parent.login');
    }

    public function login(Request $request){

        $email = $request->input('email');
        $admission_number = $request->input('admission_number');
        $user = User::where('email', $email)->where('admission_number', $admission_number)->first();  

        if (auth()->guard('parents')->loginUsingId($user->id)){
            return redirect()->intended(route('parent.result'));
        }

        return view('Parent.Login')->withErrors(['Email or Admission Number is incorrect!']);
    }

    public function downloadResult(){
        $userTransformer = $this->userTransformer();
        $classInfo = $this->classInfo();
        return PDF::loadView('User.mypdfresult', ['userTransformer' => $userTransformer,'classInfo' => $classInfo])->setOrientation('landscape')->setPaper('a4')->download('pdf_file.pdf');
        
    }

    public $array = [];

    public function userTransformer(){
        $user = auth()->guard('parents')->user();
        return [
            "name" => $user->name,
            "class_name" => $user->classes->class,
            "subjects" => $this->subjectInfo(),
        ];
          
    }
    public function subjectInfo()
    {
        $user = User::with('subjects.results')->where('id', auth()->guard('parents')->user()->id)->get(); // user, subjects, result collection
        //dd($user);
        $user->each(function($userCol){ 
            $subjects = $userCol->subjects->each(function($subjectCol){
                $pos = 1;
                foreach ($subjectCol->results->sortByDesc('total') as $key) {
                    if ($key->user_id === auth()->guard('parents')->user()->id) {
                        array_push($this->array, [
                            "name" => $subjectCol->Subjectname,
                            "exam" => $key->exam,
                            "test" => $key->test,
                            "total" => $key->total,
                            "position" => $pos,
                        ]);
                        break;
                    }
                    $pos++;
                } 
            }); 
        });
        return $this->array;
    }

    public function classInfo(){

        $user = auth()->guard('parents')->user();
        $countSubjects = $user->count();
        $userClassId = $user->classes->id;
        $classPosCollection = Position::where('classes_id', $userClassId)->orderByDesc('total')->get();
        $total_students = $classPosCollection->count();
        $pos = 1;
        foreach ($classPosCollection as $key) {
            if ($key->user_id === $user->id) {
                return [
                    "position" => $pos,
                    "total_students" => $total_students,
                    "mark_obtained" => $key->total,
                    "mark_obtainable" => ($countSubjects*100) ,
                    "percentage" =>  number_format(($key->total)/($countSubjects), 2)
                ];
                break;
            }
            $pos++;
        }

    }

    public function logout(){
        Auth::guard('parents')->logout();
        return redirect('parent');
    }

}