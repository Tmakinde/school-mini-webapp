@extends('Admin.layouts.master')

@section('title')
My School Admin Web Page | Dashboard
@endsection

@section('content')

<div class="container">
    
        <div class="card" style="margin-top:100px;margin-bottom:20px">
                <div class="card-header" style=""><h2>Student's Details</h2></div>
        </div>
                <div class="row">
                        <div class="col-md-4 mb-3">
                                <span>FULL NAME OF CHILD</span>
                                <span name="full_name" class="form-control" placeholder="FULL NAME OF CHILD">{{$unapproveParents->admission->full_name}}</span>
                        </div>
                        <div class="col-md-4 mb-3">
                                <span>DATE OF BIRTH</span>
                                <span type="date" class="form-control" id="validationDefault02" name="dob" placeholder="dd-mm-yy">{{$unapproveParents->admission->dob}}</span>
                        </div>
                        <div class="col-md-4 mb-3">
                                <span>SEX</span>
                                <div class="span-group">
                                        <span name="sex" class="form-control" placeholder="SEX">{{$unapproveParents->admission->sex}}</span>
                                </div>
                        </div>
                </div>
                <div class="row">
                        <div class="col-md-4 mb-3">
                                <span>STREET ADDRESS</span>
                                <span name="address" class="form-control" placeholder="STREET ADDRESS">{{$unapproveParents->street_address}}</span>
                        </div>
                        <div class="col-md-4 mb-3">
                                <span>CITY</span>
                                <span type="text" class="form-control" id="validationDefault02" name="city" placeholder="CITY">{{$unapproveParents->admission->city}}</span>
                        </div>
                        <div class="col-md-4 mb-3">
                                <span> STUDENT'S EMAIL ADDRESS</span>
                                <span type="email" class="form-control" id="validationDefault04" name="email" placeholder="EMAIL ADDRESS">{{$unapproveParents->admission->email}}</span>
                        </div>
                </div>
                <div class="card" style="margin-top:10px;margin-bottom:20px">
                        <div class="card-header" style=""><h2>Parent's Details</h2></div>
                </div>
                <div class="row">
                        <div class="col-md-4 mb-3">
                                <span>PARENT'S NAME</span>
                                <span class="form-control">{{$unapproveParents->parent_name}}</span>
                        </div>
                        <div class="col-md-4 mb-3">
                                <span>OCCUPATION</span>
                                <div class="span-group">
                                        <span name="occupation" class="form-control" placeholder="OCCUPATION">{{$unapproveParents->occupation}}</span>
                                </div>
                        </div>
                        <div class="col-md-4 mb-3">
                                <span>STATE</span>
                                <div class="span-group">
                                        <span name="state" class="form-control" placeholder="STATE">{{$unapproveParents->admission->state}}</span>
                                </div>
                        </div>
                </div>
                <div class="row">
                        <div class="col-md-4 mb-3">
                                <span>STREET ADDRESS</span>
                                <span name="parent_address" class="form-control" placeholder="STREET ADDRESS">{{$unapproveParents->street_address}}</span>
                        </div>
                        <div class="col-md-4 mb-3">
                                <span>PHONE NUMBER</span>
                                <span name="phone_number" class="form-control" placeholder="PHONE NUMBER">{{$unapproveParents->phone_number}}</span>
                        </div>
                        <div class="col-md-4 mb-3">
                                <span> PARENT'S EMAIL ADDRESS</span>
                                <span name="parent_email" class="form-control" placeholder="EMAIL ADDRESS">{{$unapproveParents->parent_email}}</span>
                        </div>
                </div>
        </div>
</div>

@endsection

@section('scripts')
@parent
@endsection