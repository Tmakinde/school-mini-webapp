@extends('Admin.layouts.master')

@section('title')
My School Web Page | Admin
@endsection

@section('content')
<div class="container mt-5 pt-5">
@if($userSubjects->isEmpty())

<div class="flex-center full-height">
        <div class="message code">
                Hey
        </div>

        <div class="message code" style="padding: 10px;">
                This User Is Yet To Register Any Course!!!
        </div>
</div>
@endif
@if(!$userSubjects->isEmpty())
<form method="post" action="{{route('submit-result')}}" style="margin-top:50px">
        @csrf
        @php
        $i = 1
        @endphp
        
        @foreach($userSubjects as $userSubject)
        @php
        $subjectIdArray = [];
        array_push($subjectIdArray, $userSubject->id);
        @endphp
        
        <div class="row form-row">
                <div class="col-md-3">
                        <label>{{$userSubject->Subjectname}}</label>
                </div>
                <div class="col-md-3">
                        <input type="number" name="score[{{$i}}][]" class="form-control" placeholder="Test Score">
                </div>
                <div class="col-md-3">
                        <input type="number" name="score[{{$i}}][]" class="form-control" placeholder="Exam Score">
                </div>
                <div class="col-md-3" style="display:none">
                        <input type="number" name="subjectIdArray[{{$i}}]" value = "{{$subjectIdArray[0]}}" class="form-control" placeholder="Exam Score">
                </div>

        </div>
        <span style="display:none">{{$i++}}</span>
        @endforeach
        <input type="submit" class="btn btn-success btn-md" style="float:right">
</form>
@endif
        
</div>
@endsection
@section('scripts')

    <script type="text/javascript" src="{{asset('js/sign-in-page/js/jquery-3.5.1.min.js')}}"></script>
    
    <script type="text/javascript" src="{{asset('js/sign-in-page/js//bootstrap.min.js')}}"></script>
@parent
@endsection
