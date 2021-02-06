@extends('Admin.layouts.master')

@section('title')
My School Admin Web App  | Students
@endsection

@section('content')
   <div class="container mt-5 pt-5" >
      <div class = "alert alert-success" id = "alert" style ="display:none">
        <h6 id ="result"></h6>
      </div>
    
   <h4 class ="well mb-4">{{$currentClass->class}}</h4>
    <form id ="AddForm" method ="Post" action ="{{route('Add-Student', ['id' => $currentClass->id])}}">
    @csrf
      <label>Name</label><br>
      <input type = "text" name = "name" id="addName" placeholder ="Input Student Name here"><br>
      <label>Email</label><br>
      <input type = "email" name = "email" id ="addEmail" placeholder ="Input Student Email here"><br>
      <label>Password</label><br>
      <input type = "text" name = "password" id ="addPassword" placeholder ="Input Student Password here" ><br><br>
      <label>Password</label><br>
      <input type = "text" name = "admission_number" id ="addPassword" placeholder ="Input Student Admission Number here" ><br><br>
      <input type ="ADD" id = "AddSubmit" value ="Add">
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
          <td>
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
          var action = $(this).attr('action');
          console.log($('#hiddenValue').val());
          jQuery.ajax({
          url: "{{route('Delete-Student')}}" +'?id=' + $('#hiddenValue').val(),
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
  