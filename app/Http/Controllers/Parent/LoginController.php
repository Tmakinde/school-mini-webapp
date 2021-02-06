<?php

namespace App\Http\Controllers\Parent;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class LoginController extends Controller
{

    public function __construct(){
        return $this->middleware('auth:parents')->except('showLoginForm', 'login');
    }

    public function showLoginForm(){
        return view('Parent.login');
    }

    public function login(Request $request){
       // $credentials = //$request->only('admission_number'); 
        $credentials = $request->only('email');
        //dd($credentials);
        if (Auth::guard('parents')->attempt($credentials)){
            return redirect()->intended($this->downloadResult());

        }

        return view('Parent.Login')->withErrors(['Email or Admission Number is incorrect!']);
    }

    public function downloadResult(Request $request){
        $userTransformer = $this->userTransformer();
        $classInfo = $this->classInfo();
        return PDF::loadView('User.mypdfresult', ['userTransformer' => $userTransformer,'classInfo' => $classInfo])->setOrientation('landscape')->setPaper('a4')->inline('pdf_file.pdf');
        
    }

    public $array = [];

    public function userTransformer(){
        $user = auth()->user();
        return [
            "name" => $user->name,
            "class_name" => $user->classes->class,
            "subjects" => $this->subjectInfo(),
        ];
        
        
    }
    public function subjectInfo()
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

        $user = auth()->user();
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