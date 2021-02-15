@extends('Admin.layouts.master')

@section('title')
My School Admin Web App  | Students
@endsection

@section('content')

  <div class="container mt-5 pt-5" >
   <h4 class ="well mb-4">{{$currentClass->class}}</h4>
    @if($errors->any())
      @foreach($errors->all() as $error)
        <div class = "alert alert-danger" id = "alert">
          <h6>{{$error}}</h6>
        </div>
      @endforeach
    @endif
    @if($message = Session::get('message'))
    <div class = "alert alert-success" id = "alert">
      <h6>{{$message}}</h6>
    </div>
    @endif
    <a href="{{route('restore.view')}}" style="float:right" class="btn btn-success">Restore Deleted Students</a>
    <form id ="AddForm" method ="Post" action ="{{route('Add-Student', ['id' => $currentClass->id])}}">
    @csrf
      <label>Name</label><br>
      <input type = "text" name = "name" id="addName" placeholder ="Input Student Name here"><br>
      <label>Email</label><br>
      <input type = "email" name = "email" id ="addEmail" placeholder ="Input Student Email here"><br>
      <label>Password</label><br>
      <input type = "text" name = "password" id ="addPassword" placeholder ="Input Student Password here" ><br><br>
      <label>Admission Number</label><br>
      <input type = "text" name = "admission_number" id ="addPassword" placeholder ="Input Student Admission Number here" ><br><br>
      <input type ="submit" id = "AddSubmit" value ="Add">
    </form>
    <table class="table mt-5 table-bordered">
    <thead>
      <tr>
        <th scope="col" style = "text-align:center">Student Name</th>
      
        <th scope="col" style = "text-align:center">Action</th>
      </tr>
    </thead>
    <tbody>
    @foreach ($listStudents as $Students)
        <tr>
          <td id = "usernameColumn" style = "text-align:center"><h6>{{$Students->name}}</h6></td>
          <td class="{{$Students->name}}">
            <form class = "deleteForm" >
            @csrf
            <input type ="hidden" id ="hiddenValue" value = "{{$Students->id}}">
            <button type ="submit" class="btn btn-danger">Delete</button>
            </form>
          </td>
        </tr>
    @endforeach
    </tbody>
    </table>
    <form action="{{route('lock-portal', [$currentClass->id])}}" method="post">
    @csrf
    @if($currentClass->activations == null)
      <input class="btn btn-md btn-success" type="submit" value="Lock Portal" style="float:right">
    @endif
    @if($currentClass->activations != null)
      <input class="btn btn-md btn-success" type="submit" value="Unlock Portal" style="float:right">
    @endif
    </form>
    <a href="{{route('deadline.view', [$currentClass->id])}}" class="btn btn-success">Set Registration Deadline</a>
    <blockquote>Note:<i>Remember that when you lock portal,  students will not be able to perform action than to just view their portal homepage.</i></blockquote>
  </div>

@endsection
@section('scripts')
  <script>
    var currentClass = {{json_encode($currentClass->id)}};
    jQuery(document).ready(function(){
      
      function load_data(){
          $.ajax({
          url: '{{route("Student-Section")}}' + '?id=' + currentClass,
          method:'GET',
          success:function(data){
            $('#body').html(data)
            $('#alert').css('display', 'none');
            console.log(data);
          },
          error:function(jqXHR, textStatus, errorThrown){
         
          console.log(jqXHR);
            console.log(textStatus);
            console.log(errorThrown);
         }
        });
        }
      $('.deleteForm').on('submit',function(event){
          event.preventDefault();
          var id = $(this)[0].children[1].defaultValue;
          
          jQuery.ajax({
          url: "{{route('Delete-Student')}}" +'?id=' + id,
          type: "POST",
          data:{
            "_token":"{{ csrf_token() }}",
            
          },
          success:function(data){
            load_data();
            $('#alert').show();
            $('#result').text(data.Success);  
          },
          error:function(data){
            load_data();
            console.log(data);
            console.log(jqXHR);
            console.log(textStatus);
            console.log(errorThrown);
          }
          })
        });
      });  
  </script> 
  @parent
  @endsection
  