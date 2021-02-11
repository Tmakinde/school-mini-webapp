@extends('Admin.layouts.master')

@section('title')
My School Web Page | Admin
@endsection

@section('content')
<div class="container mt-5 pt-5" style="margin-top:50px">
        <div class="mt-5">
                <div class="">
                        <span class="text-info" style="text-align:center"><h3>Name of Student in {{$currentClass->class}}</h3></span>
                </div>
        </div>
        <ul class="card mt-5">    
                @foreach($usersInClass as $userInClass)
                <li class="mt-3">
                        <a  href ="{{route('add-result', [$userInClass->id])}}"><h3 class="text-info">{{Ucwords($userInClass->name)}}</h3></a> 
                </li>
                @endforeach
                @if($usersInClass->isEmpty())

                        <span><h2 style="margin-top:200px;text-align:center">No Student in this class yet!!!</h2></span>

                @endif
        </ul>
</div>
@endsection
@section('scripts')
@parent
@endsection
