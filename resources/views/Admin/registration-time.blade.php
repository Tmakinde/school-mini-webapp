@extends('Admin.layouts.master')

@section('title')
My School Admin Web Page | Dashboard
@endsection

@section('content')

<div class ="container">
    <div class ="jumbotron" style ="margin-top:180px;margin-left:240px;float:center;position:absolute;">
    @if($message = Session::get('message'))
        <div style = "text-align:center" class ="alert-success">{{$message}}</div>
    
    @endif
    <h4 style ="margin-bottom:20px;color:red;text-align:center">Set Time For Course Registration</h4>
        <form style ="margin-top:70px;float:center;margin-left:100px;" method ="POST" action ="{{route('deadline.post')}}">
            @csrf
            <label style ="margin-right:10px;">Year:</label><input type ="number" min = "2021" max="2030" name ="year"><br> 
            <label style ="margin-right:10px;">Month:</label><input type ="number" min="1" max="12" name = "month"><br>
            <label style ="margin-right:10px;">Day:</label><input type ="number" min="1" max="31" name ="day"><br>
            <label style ="margin-right:10px;">Hrs:</label><input type ="number" min='0' max = "23" name ="hour"><br> 
            <label style ="margin-right:10px;">Min:</label><input type ="number" min="0" max="59" name = "minutes"><br>
            <label style ="margin-right:10px;">Sec:</label><input type ="number" min="0" max="59" name ="seconds"><br>
            <input type ="submit" class ="btn btn-success" style ="margin-left:20px;float:right">
        </form>
    </div>
</div>
@endsection

@section('scripts')
@parent
@endsection