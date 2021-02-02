@extends('Parent.layouts.master')

@section('title')
My School Web App | Portal
@endsection

@section('content')
<div class="container mt-5 pt-5" >
        @if($errors->any())
                <ul>
                @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                @endforeach
                </ul>
        @endif
        <form method="post" action ="{{route('parent.process-admission')}}">
                @csrf
                <h2><span class="mb-3">Student's Information</span></h2>
                <div class="form-row">
                        <div class="col-md-4 mb-3">
                                <label for="validationDefault01">FULL NAME OF CHILD</label>
                                <input type="text" class="form-control" id="validationDefault01" name="full_name" placeholder="FULL NAME OF CHILD" required>
                        </div>
                        <div class="col-md-4 mb-3">
                                <label for="validationDefault02">DATE OF BIRTH</label>
                                <input type="date" class="form-control" id="validationDefault02" name="dob" placeholder="dd-mm-yy" required>
                        </div>
                        <div class="col-md-4 mb-3">
                                <label for="validationDefaultUsername">SEX</label>
                                <div class="input-group">
                                        <input type="text" class="form-control" id="validationDefaultUsername" name="sex" placeholder="SEX" aria-describedby="inputGroupPrepend2" required>
                                </div>
                        </div>
                </div>
                <div class="form-row">
                        <div class="col-md-4 mb-3">
                                <label for="validationDefault01">STREET ADDRESS</label>
                                <input type="text" class="form-control" id="validationDefault01" name="address" placeholder="STREET ADDRESS" required>
                        </div>
                        <div class="col-md-4 mb-3">
                                <label for="validationDefault02">CITY</label>
                                <input type="text" class="form-control" id="validationDefault02" name="city" placeholder="CITY" required>
                        </div>
                        <div class="col-md-4 mb-3">
                                <label for="validationDefault04"> STUDENT'S EMAIL ADDRESS</label>
                                <input type="email" class="form-control" id="validationDefault04" name="student_email" placeholder="EMAIL ADDRESS" required>
                        </div>
                </div>
                <h2><span class="mb-3">Parent's Information</span></h2>
                <div class="form-row">
                        <div class="col-md-3 mb-3">
                                <label for="validationDefault01">FATHER'S NAME</label>
                                <input type="text" class="form-control" id="validationDefault01" name="father_name" placeholder="FATHER'S NAME" required>
                        </div>
                        <div class="col-md-3 mb-3">
                                <label for="validationDefault02">MOTHER'S NAME</label>
                                <input type="text" class="form-control" id="validationDefault02" name="mother_name" placeholder="MOTHER'S NAME" required>
                        </div>
                        <div class="col-md-3 mb-3">
                                <label for="validationDefaultUsername">OCCUPATION</label>
                                <div class="input-group">
                                        <input type="text" class="form-control" id="validationDefaultUsername" name="occupation" placeholder="OCCUPATION" aria-describedby="inputGroupPrepend2" required>
                                </div>
                        </div>
                        <div class="col-md-3 mb-3">
                                <label for="validationDefaultUsername">STATE</label>
                                <div class="input-group">
                                        <input type="text" class="form-control" id="validationDefaultUsername" name="state" placeholder="STATE" aria-describedby="inputGroupPrepend2" required>
                                </div>
                        </div>
                </div>
                <div class="form-row">
                        <div class="col-md-6 mb-3">
                                <label for="validationDefault03">STREET ADDRESS</label>
                                <input type="text" class="form-control" id="validationDefault03" name="parent_address" placeholder="STREET ADDRESS" required>
                        </div>
                        <div class="col-md-3 mb-3">
                                <label for="validationDefault04">PHONE NUMBER</label>
                                <input type="text" class="form-control" id="validationDefault04" name="phone_number" placeholder="PHONE NUMBER" required>
                        </div>
                        <div class="col-md-4 mb-3">
                                <label for="validationDefault04"> PARENT'S EMAIL ADDRESS</label>
                                <input type="email" class="form-control" id="validationDefault04" name="parent_email" placeholder="EMAIL ADDRESS" required>
                        </div>
                </div>
                <div class="form-group">
                        <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="invalidCheck2" required>
                                <label class="form-check-label" for="invalidCheck2">
                                        <span style="padding-left:30px">Agree to terms and conditions</span>
                                </label>
                        </div>  
                </div>
                <button class="btn btn-primary" type="submit">Submit form</button>
        </form>
</div>
@endsection
@section('scripts')
  <script>
    $('#body').css('background-color','purple')
  </script>
@parent
@endsection