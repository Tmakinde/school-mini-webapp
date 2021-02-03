<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Parents;
use App\Admission;
use Gate;
use App\Notifications\Parent\ApprovalNotification;
use DB;

class Admissioncontroller extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admins');
        $this->middleware('can:Admin-Gate');
    }

    public function getAdmissionProcess(){
        $unapproveParents = Parents::where('approval', null)->get();
        return view('Admin.unapproved', compact('unapproveParents'));
    }

    public function viewAdmission(Request $request, $id){
        try {
            $unapproveParents = Parents::whereId($id)->firstOrFail();
            return view('Admin.ViewAdmission', compact('unapproveParents'));
        } catch (Exception $e) {
            return abort(404);
        }
        

    }

    public function approveAdmission(Request $request, $id){
        $unapproveParents = Parents::whereId($id)->first();
        $unapproveParents->update(['approval' => now()]);
        $unapproveParents->notify(new ApprovalNotification($unapproveParents));
        return redirect()->back()->with([
            "message" => "Parent Successfully Approved!!!"
        ]);
    }

    public function rejectAdmission(Request $request, $id){
        $unapproveParents = Parents::whereId($id)->with('admissions')->first();
        $unapproveParents->delete();
        return redirect()->back()->with([
            "message" => "Parent Successfully Rejected!!!"
        ]);
    }

}
