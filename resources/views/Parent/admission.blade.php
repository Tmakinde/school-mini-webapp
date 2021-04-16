<!doctype html>
<html lang="en">
        <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
                <meta name ="_token" content="{{ csrf_token() }}">
                <meta http-equiv="X-UA-Compatible" content="ie=edge">
                <title>My School App</title>
                <!-- jquery link -->
                <script src = "https://code.jquery.com/jquery-3.5.1.min.js"></script>
                <link rel="stylesheet" href="{{ url('css/sign-in-page/css/bootstrap.min.css') }}">
                <link rel="stylesheet" href="{{ url('css/sign-in-page/css/css/all.css') }}">

                <!-- include libraries(jQuery, bootstrap) -->
                <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
                <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
                <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
                
                

                <!-- include summernote css/js -->
                <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
                <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
                <style>
                        .jumbotron{
                        margin-top:180px;clear:top;
                        }
                        .pagination-nav{
                        margin-left:250px;
                        }
                        html,
                                body {
                                        background-color: #fff;
                                        color: #636b6f;
                                        font-family: 'Nunito', sans-serif;
                                        font-weight: 100;
                                        height: 100vh;
                                        margin: 0;
                                }

                                .full-height {
                                        height: 100vh;
                                }

                                .flex-center {
                                        align-items: center;
                                        display: flex;
                                        justify-content: center;
                                }

                                .position-ref {
                                        position: relative;
                                }

                                .code {
                                        border-right: 2px solid;
                                        font-size: 26px;
                                        padding: 0 15px 0 15px;
                                        text-align: center;
                                }

                                .message {
                                        font-size: 18px;
                                        text-align: center;
                                }
                </style>
        </head>

        <body id ="body" >
                <nav class="navbar navbar-expand-lg fixed-top bg-dark navbar-dark text-right">
                
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#myNavbar">
                        <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="myNavbar">
                        Parent Admission Form
                        </div>
                </nav>
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
                                                <input type="text" class="form-control" id="validationDefault01" name="full_name" placeholder="FULL NAME OF CHILD" value="{{ old('full_name') }}" required>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                                <label for="validationDefault02">DATE OF BIRTH</label>
                                                <input type="date" class="form-control" id="validationDefault02" name="dob" placeholder="dd-mm-yy" value="{{ old('dob') }}" required>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                                <label for="validationDefaultUsername">SEX</label>
                                                <div class="input-group">
                                                        <input type="text" class="form-control" id="validationDefaultUsername" name="sex" placeholder="SEX" aria-describedby="inputGroupPrepend2" value="{{ old('sex') }}" required>
                                                </div>
                                        </div>
                                </div>
                                <div class="form-row">
                                        <div class="col-md-4 mb-3">
                                                <label for="validationDefault01">STREET ADDRESS</label>
                                                <input type="text" class="form-control" id="validationDefault01" name="address" placeholder="STREET ADDRESS" value="{{ old('address') }}" required>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                                <label for="validationDefault02">CITY</label>
                                                <input type="text" class="form-control" id="validationDefault02" name="city"  placeholder="CITY" value="{{ old('city') }}" required>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                                <label for="validationDefault04"> STUDENT'S EMAIL ADDRESS</label>
                                                <input type="email" class="form-control" id="validationDefault04" name="email" placeholder="EMAIL ADDRESS" value="{{ old('email') }}"  required>
                                        </div>
                                </div>
                                <h2><span class="mb-3">Parent's Information</span></h2>
                                <div class="form-row">
                                        <div class="col-md-3 mb-3">
                                                <label for="validationDefault01">NAME</label>
                                                <input type="text" class="form-control" id="validationDefault01" name="parent_name" placeholder="PARENT'S NAME" value="{{ old('parent_name') }}"  required>
                                        </div>
                                        <div class="col-md-3 mb-3">
                                                <label for="validationDefaultUsername">OCCUPATION</label>
                                                <div class="input-group">
                                                        <input type="text" class="form-control" id="validationDefaultUsername" name="occupation" placeholder="OCCUPATION" aria-describedby="inputGroupPrepend2" value="{{ old('occupation') }}" required>
                                                </div>
                                        </div>
                                        <div class="col-md-3 mb-3">
                                                <label for="validationDefaultUsername">STATE</label>
                                                <div class="input-group">
                                                        <input type="text" class="form-control" id="validationDefaultUsername" name="state" placeholder="STATE" aria-describedby="inputGroupPrepend2" value="{{ old('state') }}"  required>
                                                </div>
                                        </div>
                                        <div class="col-md-3 mb-3">
                                                <label for="validationDefault04"> PARENT'S EMAIL ADDRESS</label>
                                                <input type="email" class="form-control" id="validationDefault04" name="parent_email" placeholder="EMAIL ADDRESS" value="{{ old('parent_email') }}"  required>
                                        </div>
                                </div>
                                <div class="form-row">
                                        <div class="col-md-6 mb-3">
                                                <label for="validationDefault03">STREET ADDRESS</label>
                                                <input type="text" class="form-control" id="validationDefault03" name="parent_address" placeholder="STREET ADDRESS" value="{{ old('parent_address') }}"  required>
                                        </div>
                                        <div class="col-md-3 mb-3">
                                                <label for="validationDefault04">PHONE NUMBER</label>
                                                <input type="text" class="form-control" id="validationDefault04" name="phone_number" placeholder="PHONE NUMBER" value="{{ old('phone_number') }}" required>
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
        <script type="text/javascript" src="{{asset('js/sign-in-page/js/jquery-3.5.1.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('js/sign-in-page/js//bootstrap.min.js')}}"></script> 
    </body>
</html>