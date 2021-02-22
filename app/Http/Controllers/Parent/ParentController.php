<?php

namespace App\Http\Controllers\Parent;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use App\Parents;
use App\Admin;
use App\User;
use App\Admission;
use App\Notifications\Parent\AdmissionNotification;
use App\Notifications\Admin\AdminAdmissionNotification;
use App\Events\ParentAdmissionProcessed;
class ParentController extends Controller
{
    public function __construct(){
        $this->middleware('auth:admins')->only('getAllParent');
        $this->middleware('can:Admin-Gate')->only('getAllParent');
    }

    public function index(){
        return view('Parent.index');
    }

    public function admission(){
        return view('Parent.admission');
    }

    public function processAdmission(Request $request, Admin $admin){
        $validator = Validator::make($request->all(), [
            'full_name' => ['required', 'string'],
            'dob' => ['required', 'string'],
            'sex' => ['required', 'string'],
            'address' => ['required', 'string'],
            'city' => ['required', 'string'],
            'state' => ['required', 'string'],
            'parent_email' => ['required', 'email', 'unique:parents'],
            'email' => ['required', 'email', 'unique:users'],
            'parent_name' => ['required', 'string'],
            'occupation' => ['required', 'string'],
            'parent_address' => ['required', 'string'],
            'phone_number' => ['required', 'string'],
        ]);

        if($validator->passes()) {
            $studentDetails = $request->all();

            $parents = new Parents;
            $parents->parent_name = $request->parent_name;
            $parents->occupation = $request->occupation;
            $parents->street_address = $request->parent_address;
            $parents->phone_number = $request->phone_number;
            $parents->state = $request->state;
            $parents->parent_email = $request->parent_email;
            $parents->save();
            
            //save others to admission table
            $admission = new Admission;
            $admission->full_name = $request->full_name;
            $admission->dob = $request->dob;
            $admission->sex = $request->sex;
            $admission->city = $request->city;
            $admission->state = $request->state;
            $admission->email = $request->email;
            $admission->parent_id = $parents->id;
            $admission->save();

            $superAdmins = Admin::where('role_id', 1)->get();

            event(new ParentAdmissionProcessed($parents, $superAdmins, $admission));
            
            return redirect()->route('parent.processed-admission');
        }
        return redirect()->route('parent.admission')->withInput()->withErrors($validator);
    }

    
    public function getAllParent(Request $request){
        $parents  = Parents::paginate(10);
        return view('Parent.parent', compact('parents'));
    }

}
