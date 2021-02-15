@extends('Admin.layouts.master')

@section('title')
My School Admin Web App  | Students
@endsection

@section('content')

  <div class="container mt-5 pt-5" >
   <h4 class ="well mb-4"></h4>
    @if($message = Session::get('message'))
    <div class = "alert alert-success" id = "alert">
      <h6>{{$message}}</h6>
    </div>
    @endif
    <table class="table mt-5 table-bordered">
    <thead>
      <tr>
        <th scope="col" style = "text-align:center">Student Name</th>
      
        <th scope="col" style = "text-align:center">Restore</th>
        <th scope="col" style = "text-align:center">Force Delete</th>
      </tr>
    </thead>
    <tbody>
    @forelse ($deletedStudents as $deletedStudent)
        <tr>
          <td id = "usernameColumn" style = "text-align:center"><h6>{{$deletedStudent->name}}</h6></td>
          <td>
            <form method="post" action="{{route('restore.student', [$deletedStudent->id])}}" class = "restoreForm">
                @csrf
                <button type ="submit" class="btn btn-success">Restore</button>
            </form>
          </td>
          <td>
            <form method="post" action="{{route('forcedelete.student', [$deletedStudent->id])}}" class = "deleteForm">
                @csrf
                <button type ="submit" class="btn btn-danger">Force Delete</button>
            </form>
          </td>
        </tr>
    @empty

        <tr>
            <td colspan="3">
               <h4>No deleted students for now!!!</h4>
            </td>
        </tr>
    @endforelse
    </tbody>
    </table>
  </div>

@endsection
@section('scripts') 
@parent
@endsection
  