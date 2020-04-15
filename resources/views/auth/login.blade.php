<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Admin Panel | Login</title>

    <!-- Bootstrap -->
    <link href="{{url('assets/vendors/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{url('assets/vendors/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{url('assets/vendors/nprogress/nprogress.css')}}" rel="stylesheet">
    <!-- Animate.css -->
    <link href="{{url('assets/vendors/animate.css/animate.min.css')}}" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="{{url('assets/build/css/custom.min.css')}}" rel="stylesheet">
  </head>

  <body class="login">
    <div>
      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
              @if(\Session::has('alert'))
              <div class="alert alert-danger">
                  <div>{{Session::get('alert')}}</div>
              </div>
          @endif
          @if(Session::has('alert-success'))
              <div class="alert alert-success">
                  <div>{{Session::get('alert-success')}}</div>
              </div>
          @endif
            <form method="POST" action="{{ route('login') }}">
              {{ csrf_field() }}
              <h1>Login Form</h1>
              <div>
                <input type="text" class="form-control" placeholder="Username" required="" name="username" value="{{ old('username') }}"/>
              </div>
              <div>
                <input type="password" class="form-control" placeholder="Password" required="" name="password" />
              </div>
              <div>
                <button class="btn btn-primary submit">Log in</button>
                {{-- <a class="reset_pass" href="#">Lost your password?</a> --}}
              </div>
              <div class="separator">
                <p class="change_link">New to site?
                <a href="{{route('register')}}" class="to_register"> Create Account </a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-user"></i> Admin Panel</h1>
                  <p>©2019 All Rights Reserved.</p>
                </div>
              </div>
            </form>
          </section>
        </div>
      </div>
    </div>
  </body>
</html>