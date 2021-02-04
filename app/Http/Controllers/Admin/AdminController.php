<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use App\Admin;
use App\User;
use App\Role;
use App\Parents;
use Hash;
use Gate;
use Validator;
use Illuminate\Http\Request;
use GuzzleHttp\Exception\RequestException;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth:admins');
        $this->middleware('can:Admin-Gate')->except('masterBlade','index');
    }

    protected function validator(array $data)
    {
        $this->validate($request, [
            'username' => ['required', 'string'],
            'password' => ['required', 'string'],
           
        ]);
            
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function masterBlade()
    {
        $countUnapproveForm = Parents::where('approval', null)->count();
        $admin = auth()->user();
        $role = Role::where('role', 'super_admin')->first();
        return view('Admin.layouts.master', compact('countUnapproveForm'));
    }
    
    public function index()
    {
        $currentAdmin = Auth::user();
        return view('Admin.Dashboard');
    }

    public function Admin()
    {
        $currentAdmin = Auth::user();
        $role = Role::where('role', 'admin')->first();
        $admins = $role->admins;
        return view('Admin.Admin', compact('admins'));
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
    */

    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required|unique:admins',
            'password' => 'required',
        ]);
        
        if($validator->passes()){
            // create new admin using the institution id of the current admin
            $newAdmin = new Admin;
            $newAdmin->username = $request->username;
            $newAdmin->password = Hash::make($request->password);
            $roleId = collect(Role::where('role', 'admin')->get())->pluck('id');
            //dd($roleId);
            $newAdmin->role_id = $roleId[0];
            $newAdmin->save();
            return redirect()->to('/admin/AdminSection');
        }
        return redirect()->back()->withErrors($validator);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function report($id)
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
     //   $admin = Admin::where('id', $request->id)->first();
     //   $admin->username = $request->username;
     //   $admin->password = $request->password;
     //   $admin->save();
        dd($request->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $admins = Admin::where('id', $request->id)->first();
        $admins->delete();
        return redirect()->to('/admin/AdminSection');
      }
  

}



