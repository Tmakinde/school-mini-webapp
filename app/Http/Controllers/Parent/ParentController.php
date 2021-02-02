<?php

namespace App\Http\Controllers\Parent;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use App\Parents;
use App\Notifications\Parent\AdmissionNotification;
class ParentController extends Controller
{
    public function __construct(){
        return $this->middleware('auth:parents')->except('admission', 'processAdmission');
    }

    public function index(){
        return view('Parent.index');
    }

    public function admission(){
        return view('Parent.admission');
    }

    public function processAdmission(Request $request){
        $validator = Validator::make($request->all(), [
            'full_name' => ['required', 'string'],
            'dob' => ['required', 'string'],
            'sex' => ['required', 'string'],
            'address' => ['required', 'string'],
            'city' => ['required', 'string'],
            'state' => ['required', 'string'],
            'student_email' => ['required', 'email', 'unique:parents'],
            'parent_email' => ['required', 'email', 'unique:users'],
            'father_name' => ['required', 'string'],
            'mother_name' => ['required', 'string'],
            'occupation' => ['required', 'string'],
            'parent_address' => ['required', 'string'],
            'phone_number' => ['required', 'integer'],
        ]);

        if($validator->pasess()) {
            $studentDetails = $request->input('full_name', 'dob', 'sex', 'address', 'city', 'state', 'student_email');
            $parents = new Parents;
            $parents->father_name = $request->father_name;
            $parents->mother_name = $request->mother_name;
            $parents->occupation = $request->occupation;
            $parents->parent_address = $request->parent_address;
            $parents->phone_number = $request->phone_number;
            $parents->state = $request->state;
            $parents->email = $request->parent_email;
            $parents->save();
            $parents->notify(new AdmissionNotification($parents)); // notification
            $admin = Admin::where('id', 1)->firstOrFail();
            $admin->notify(new AdminAdmissionNotification($parents, $studentDetails));
            return redirect()->route('parent.processed-admission');
        }
        return redirect()->route('parent.process-admission')->withInput()->withErrors($validator);
    }

}
