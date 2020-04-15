<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Gentelella Alela! | </title>

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
              @if ($errors->any())
              <div class="alert alert-danger">
                  <ul>
                      @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                  </ul>
              </div>
          @endif
                <form method="POST" action="{{ route('register') }}">
                  {{ csrf_field() }}
                  <h1>Create Account</h1>
                  <div>
                    <input type="text" class="form-control" placeholder="Nama Lengkap" required="" name="nama" value="{{ old('nama') }}"/>
                  </div>
                  <div>
                    <input type="text" class="form-control" placeholder="Username" required="" name="username" value="{{ old('username') }}"/>
                  </div>
                  <div>
                    <input type="email" class="form-control" placeholder="Email" required="" name="email" value="{{ old('enamil') }}"/>
                  </div>
                  <div>
                    <input type="password" class="form-control" placeholder="Password" required="" name="password"/>
                  </div>
                  <div>
                    <input type="password" class="form-control" placeholder="Confirm Password" required="" name="password_confirmation"/>
                  </div>
                  <div>
                  <button type="submit" class="btn btn-primary">Submit
                  </div>
            
                  <div class="clearfix"></div>
            
                  <div class="separator">
                    <p class="change_link">Already a member ?
                    <a href="{{route('login')}}" class="to_register"> Log in </a>
                    </p>
            
                    <div>
                      <h1><i class="fa fa-paw"></i> Gentelella Alela!</h1>
                      <p>©2016 All Rights Reserved. Gentelella Alela! is a Bootstrap 3 template. Privacy and Terms</p>
                    </div>
                  </div>
                </form>
          </section>
        </div>
      </div>
    </div>
  </body>
</html>