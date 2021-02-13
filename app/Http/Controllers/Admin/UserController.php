<?php

namespace App\Http\Controllers\Admin;

use Auth;
use Illuminate\Http\Request;
use Response;
use App\Http\Controllers\Controller;
use App\Admin;
use App\User;
use App\Classes;
use App\Subject;
use App\Result;
use App\Position;
use App\Activation;
use App\Registration;
use DB;
use Hash;
use Validator;
use Illuminate\support\Facades\Storage;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct(){
        $this->middleware('auth:admins');
    }

    protected function validator(array $data ){
        return Validator::make($data, [

            'class'=> ['required'], 

        ]);
    }

    protected function register(array $data ){
        return Classes::create([
           'class' => $data['class'],

           'institution_id' => Auth::user()->institution_id,
        ]);
    }
    //note that user are refer to as the student

    public function Users(Request $request){
        $currentClass = Classes::where('id',$request->id)->first();
        $listStudents = $currentClass->users;
        
        return view('Admin.User')->with([
            'currentClass'=>$currentClass,
            'listStudents'=>$listStudents,
        ]);

    }

    public function createUser(Request $request) // create user for each class by the admin of the current institution
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            "email" => 'required|email|unique:users',
            "password"=> 'required',
            "admission_number"=> 'required|unique:users',
        ]);
        if($request->name !== null && $validator->passes()){
            $newUser = User::firstOrCreate([
                'email' =>  $request->email,
                'name' =>   $request->name,
                'password' =>   Hash::make($request->password),
                'admission_number' => $request->admission_number,
                'classes_id' => $request->id,
            ]);
            
            return redirect()->back()->with([
                'message' => 'Student Successfully Added'
            ]);
        }
       
        return redirect()->back()->withErrors($validator);
    }

    public function restoreStudentsView(){
        $deletedStudents = User::onlyTrashed()->get();
        return view('Admin.restore', compact('deletedStudents'));
    }

    public function restoreStudents($id){
        $deletedStudents = User::onlyTrashed()->whereId($id)->restore();
        return redirect()->back()->with([
            'message' => 'Student Successfully Restored!'
        ]);
    }

    public function forceDelete($id){
        $deletedStudents = User::onlyTrashed()->whereId($id)->forceDelete();
        return redirect()->back()->with([
            'message' => 'Student Successfully Deleted!'
        ]);
    }

    public function lockportal(Request $request, $id)
    {

        $Classes = Classes::findOrFail($id);
        $activation = Activation::where('class_id',$id)->first();
        if ($activation != null) {
            $activation->delete();
            return redirect()->back();
        }else {
            $activation = new Activation;
            $activation->class_id = $id;
            $activation->save();
            return redirect()->back();
        }
        
    }
        
    public function listUser(Request $request)
    {
        $currentClass = Classes::where('id',$request->id)->first();
        $listStudents = $currentClass->users;
        return response()->json([
            'listStudents' => $listStudents,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id)
    {
          
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //
        $user = User::where('id', $request->id)->first();
        $user->delete();
        return redirect()->back();
    }

    public function Class()
    {
        $classes = Classes::all();
        return view('Admin.Class')->with([
            'classes'=>$classes,
        ]);
    }

    public function addClass(Request $request)
    {
        // allow admin to create a new clas that will be register with admin 
        $validator =$this->validator($request->all());
        if($validator->passes()){
            $this->register($request->all());
        }      
        return redirect()->to('/admin/ClassSection')->withErrors($validator);
    }

    public function deleteClass(Request $request)
    {
        // allow admin to delete student
        $class = Classes::where('id', $request->id)->first();
        $class->delete();
        return redirect()->to('/admin/ClassSection');

    }

    public function Subjects(Request $request)
    {
        $currentClass = Classes::where('id', $request->id)->first();
        $subjects = $currentClass->subjects;
        return view('Admin.Subject')->with([
            'subjects'=>$subjects,
            'currentClass'=>$currentClass,
        ]);
    }

    public function createSubject(Request $request)
    {
        $subject = new Subject;
        $subject->Subjectname = $request->subjectName;
        $subject->classes_id = $request->id;
        $subject->save();
        return redirect()->back();
    }

    public function deleteSubject(Request $request)
    {
        // allow admin to delete subject
        $subject = Subject::where('id', $request->id)->first();
        $subject->delete();
        return redirect()->back();
    }

    public function resultView(Request $request)
    {
        
        $classes =  Classes::all();
        return view('Admin.result', compact('classes'));
    }

    public function resultStudent(Request $request, $id)
    {
        $currentClass = Classes::where('id', $id)->first();
        $usersInClass = $currentClass->users;
        //dd($usersInClass);
        return view('Admin.resultStudents', compact('usersInClass', 'currentClass'));
    }

    public function addResultView(Request $request, $id)
    {
        $userSelected = User::where('id', $id)->first();
        $addIdToSession = session()->put('user_id', $id);
        $addUserClassIdToSession = session()->put('class_id', $userSelected->classes->id);
        $userSubjects = $userSelected->subjects;
        return view('Admin.addresult', compact('userSubjects'));
    }

    public function submitResult(Request $request)
    {
        $totalArray = [];
        $overAllScore = 0;
        foreach ($request->score as $key => $value) {
            $total = $value[0] + $value[1];
            $totalArray[$key] = $total;
            $overAllScore += $total;
        }
        
        foreach ($request->score as $key => $value) {
            $result = Result::firstOrNew([
                'user_id'   =>  session()->get('user_id'),
                'test'      =>  $value[0],
                'exam'      =>  $value[1],
                'subject_id' => $request->subjectIdArray[$key],
                'total' =>  $totalArray[$key],
            ]);
            $result->save();
        }
        // save overall score to position table
        $position = Position::firstOrNew([
            'user_id'   =>  session()->get('user_id'),
            'total'     =>  $overAllScore,
            'classes_id' => session()->get('class_id'),
        ]);
        $position->save();
        return response()->json([
            "success" => "score sucessfully added",
        ]);
    }

    public function courseRegistrationView($id){
        session()->put('class_id', $id);
        return view('Admin.registration-time');
    }

    public function courseRegistration(Request $request){
        $class = Classes::findOrFail(session()->get('class_id'));
        $registration = Registration::firstOrNew([
            'class_id'=> session()->get('class_id'),
            'minutes' => $request->minutes,
            'seconds' => $request->seconds,
            'year' => $request->year,
            'day' => $request->day,
            'month' => $request->month - 1,
            'hour' => $request->hour,
        ]);
        $registration->save();

        return redirect()->to('/admin/StudentSection?id='.session()->get('class_id'))->with([
            'message' => 'Registration deadline successfully set!!!'
        ]);
    }

}

   
