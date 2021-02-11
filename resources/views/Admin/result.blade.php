@extends('Admin.layouts.master')

@section('title')
My School Web Page | Admin
@endsection

@section('content')
  <div class="container mt-5 pt-5" style="margin-top:50px">
    <div class="mt-5">
      <div class="">
        <span class="text-info" style="text-align:center"><h3>All Classes In School</h3></span>
      </div>
    </div>
    <ul class="mt-5">
      @if(!$classes->isEmpty())

        @foreach($classes as $class)

          <li class="card-header"><a href="result/students/{{$class->id}}"><h2 style="color:red">{{$class->class}}</h2></a></li>

        @endforeach

      @endif
      @if($classes->isEmpty())

          <span ><h2 style="margin-top:200px;text-align:center">No class yet!!!</h2></span>

      @endif
    </ul> 
  </div>
@endsection
@section('scripts')

    <script type="text/javascript" src="{{asset('js/sign-in-page/js/jquery-3.5.1.min.js')}}"></script>
    
    <script type="text/javascript" src="{{asset('js/bootstrap.min.js')}}"></script>
@parent
@endsection
