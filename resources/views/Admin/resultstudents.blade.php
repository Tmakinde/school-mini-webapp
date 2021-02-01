@extends('Admin.layouts.master')

@section('title')
My School Web Page | Admin
@endsection

@section('content')
<div class="container mt-5 pt-5" style="margin-top:50px">
        <ul>    
                @foreach($usersInClass as $userInClass)
                <li>
                        <a href ="http://127.0.0.1:8001/admin/addresult/{{$userInClass->id}}">{{$userInClass->name}}</a> 
                </li>
                @endforeach
        </ul>
</div>
@endsection
@section('scripts')

    <script type="text/javascript" src="{{asset('js/sign-in-page/js/jquery-3.5.1.min.js')}}"></script>
    
    <script type="text/javascript" src="{{asset('js/sign-in-page/js//bootstrap.min.js')}}"></script>
@parent
@endsection
