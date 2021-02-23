<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport"
    content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Alakada | Login</title>
  <link rel="stylesheet" href="{{ url('css/sign-in-page/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ url('css/sign-in-page/css/css/all.css') }}">
  
</head>

<style>
.form-signin{
  max-width:400px;
 border: 1px solid grey;
border-radius: 20px;
background-color:whitesmoke;
}
</style>

<body style="background-image:url({{asset('/img/img3.jpg')}});background-repeat: no-repeat">
  <div>
    <div class="row" style="width:100%">
      <div class="offset-md-3"></div>
      <div class="col-md-6 col-sm-8">
        <div class="pt-5">
          <form method = 'post' action = "{{route('admin-login')}}" style="100%">
            @csrf
            @if ($errors->any())
            
            @foreach ($errors->all() as $error)
              <h6 class = 'text-danger' style = "float:center;margin-left:35px;margin-bottom:10px">{{$error}}</h6>
            @endforeach
          
          @endif
          @if($message = Session::get('Success'))
            <div class ="alert alert-success">
              {{$message}}
            </div>
          @endif
          @if($message = Session::get('Error'))
            <div class ="alert alert-success">
              {{$message}}
            </div>
          @endif
            <div class="card-header">
              <h1 class="h3 mb-3 font-weight-normal">ALAKADA Login Page</h1>
            </div>
            <div class="card-body">
              <label for="inputEmail" class="sr-only">Username</label>
              <input type="text" id="inputEmail" class="form-control" value = "<?= old('username'); ?>" name ='username' placeholder="Username">
            </div>
            <div class="card-body">
              <label for="inputPassword" class="sr-only">Password</label>
              <input type="password" id="inputPassword" class="form-control" value = "<?= old('password'); ?>" placeholder="Password" name ='password'>
            </div>
            <div class="card-body">
              <div class="checkbox mb-3">
                <label>
                  <input type="checkbox" value="remember-me"> Remember me
                </label>
              </div>
            </div>
            <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
            <div class="form-group row mb-0">
              <div class="col-md-8 offset-md-4">
                  @if (Route::has('password.request'))
                      <a class="btn btn-link" href="{{ route('password.request') }}">
                          {{ __('Forgot Your Password?') }}
                      </a>
                  @endif
              </div>
          </div>
            <p class="mt-5 mb-3" style="color:black">&copy; 2020</p>
          </form>
        </div>
      </div>
    </div>
  </div>
  <script type="text/javascript" src="{{asset('js/sign-in-page/js/jquery-3.5.1.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('js/bootstrap.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('js/sign-in-page/js/script.js')}}"></script>
  
</body>
</html>