@extends('Admin.layouts.master')

@section('title')
My School Admin Web Page | Dashboard
@endsection

@section('content')

<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-md-8">
            <div class="card" style="margin-top:100px">
                <div class="card-header">Parent Admission Form Details</div>
                <div class="row">
                        <div class="col-md-4 mb-3">
                                <span>FULL NAME OF CHILD</span>
                                <span name="full_name" placeholder="FULL NAME OF CHILD">{{$$unapproveParents->full_name}}</span>
                        </div>
                        <div class="col-md-4 mb-3">
                                <span >DATE OF BIRTH</span>
                                <span type="date" class="form-control" id="validationDefault02" name="dob" placeholder="dd-mm-yy">{{$$unapproveParents->dob}}</span>
                        </div>
                        <div class="col-md-4 mb-3">
                                <span>SEX</span>
                                <div class="span-group">
                                        <span name="sex" placeholder="SEX">{{$$unapproveParents->sex}}</span>
                                </div>
                        </div>
                </div>
                <div class="row">
                        <div class="col-md-4 mb-3">
                                <span>STREET ADDRESS</span>
                                <span name="address" placeholder="STREET ADDRESS">{{$$unapproveParents->address}}</span>
                        </div>
                        <div class="col-md-4 mb-3">
                                <span>CITY</span>
                                <span type="text" class="form-control" id="validationDefault02" name="city" placeholder="CITY">{{$$unapproveParents->city}}</span>
                        </div>
                        <div class="col-md-4 mb-3">
                                <span> STUDENT'S EMAIL ADDRESS</span>
                                <span type="email" class="form-control" id="validationDefault04" name="email" placeholder="EMAIL ADDRESS">{{$$unapproveParents->email}}</span>
                        </div>
                </div>
                <h2>Parent's Information</h2>
                <div class="row">
                        <div class="col-md-3 mb-3">
                                <span>FATHER'S NAME</span>
                                <span name="father_name" placeholder="FATHER'S NAME">{{$$unapproveParents->father_name}}</span>
                        </div>
                        <div class="col-md-3 mb-3">
                                <span >MOTHER'S NAME</span>
                                <span  name="mother_name" placeholder="MOTHER'S NAME">{{$$unapproveParents->mother_name}}</span>
                        </div>
                        <div class="col-md-3 mb-3">
                                <span>OCCUPATION</span>
                                <div class="span-group">
                                        <span name="occupation" placeholder="OCCUPATION">{{$$unapproveParents->occupation}}</span>
                                </div>
                        </div>
                        <div class="col-md-3 mb-3">
                                <span>STATE</span>
                                <div class="span-group">
                                        <span name="state" placeholder="STATE">{{$$unapproveParents->state}}</span>
                                </div>
                        </div>
                </div>
                <div class="row">
                        <div class="col-md-6 mb-3">
                                <span>STREET ADDRESS</span>
                                <span name="parent_address" placeholder="STREET ADDRESS">{{$$unapproveParents->parent_address}}</span>
                        </div>
                        <div class="col-md-3 mb-3">
                                <span>PHONE NUMBER</span>
                                <span name="phone_number" placeholder="PHONE NUMBER">{{$$unapproveParents->phone_number}}</span>
                        </div>
                        <div class="col-md-4 mb-3">
                                <span> PARENT'S EMAIL ADDRESS</span>
                                <span name="parent_email" placeholder="EMAIL ADDRESS">{{$$unapproveParents->parent_email}}</span>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
@parent
@endsection