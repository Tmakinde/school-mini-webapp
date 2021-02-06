@extends('User.layouts.master')

@section('title')
My School Web App | Portal
@endsection

@section('content')
<div class="container mt-5 pt-5" >
    <div class = "row" style="margin-top:50px">
        <div class ="col-md-3 col-xl-3 col-sm-3">
            <h6 style="color:red">Name: <span class ="text-success">{{$currentUser->name}}</span></h6>
        </div>
        <div class ="col-md-3 col-xl-3 col-sm-3">
            <h6 style="float:center;color:red">Class: <span class ="text-success">{{$userClass->class}}</span></h6>
        </div>
        <div class ="col-md-6 col-xl-6 col-sm-6">        
            <h6 style="color:red">Email: <span class ="text-success">{{$currentUser->email}}</span></h6>
        </div>
    </div>
    <div id = "courses"> 
        <div class = "row">
            <div class ="col-md-6 col-xl-6 col-sm-3">
                <h4 style="float:center;margin-top:50px;color:red" ><b>Register My Courses</b></h4>
                <form method = 'post' action = "{{route('User-Subject')}}">
                    @csrf
                    @foreach($userClassSubjects as $Subjects)
                    <input type="checkbox" name = "subject[]" value = "{{$Subjects->Subjectname}}"style="height:20px;width:20px;"><span class ="pl-3" style="color:white"><b>{{$Subjects->Subjectname}}</b><br>
                    @endforeach
                    <input type ="submit" style="color:white;background-color:green" value ="Add">
                </form>
            </div>
            <div class ="col-md-6 col-xl-6 col-sm-3">
                <h4 style="float:center;margin-top:50px;color:red"><b>Registered Course</h4>
                @foreach($currentUser->subjects as $subject)
                <input type="checkbox" checked ><span class ="pl-3" style="color:white"><b>{{$subject->Subjectname}}</b><br>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
  <script>
    $('#body').css('background-color','purple')
  </script>
@parent
@endsection