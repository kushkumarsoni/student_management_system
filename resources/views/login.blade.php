<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Login </title>

    <!-- Bootstrap -->
    <link href="{{ asset('public/admin_asset/vendors/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{ asset('public/admin_asset/vendors/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{ asset('public/admin_asset/vendors/nprogress/nprogress.css') }}" rel="stylesheet">
    <!-- bootstrap-wysiwyg -->
    <link href="{{ asset('public/admin_asset/vendors/google-code-prettify/bin/prettify.min.css') }}" rel="stylesheet">

    <!-- Custom styling plus plugins -->
    <link href="{{ asset('public/admin_asset/build/css/custom.min.css') }}" rel="stylesheet">
  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>
      
      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <h1 class="text-center">Login Form</h1>
            @if(session('error'))
              <h2 class="text-center text-danger">{{ session('error') }}</h2>
            @endif
            @if(session('success'))
              <h2 class="text-center text-success">{{ session('success') }}</h2>
            @endif
            <form action="{{ url('admin') }}" method="post">
              @csrf
              <div>
                <input type="text" class="form-control" placeholder="Username"  name="username" id="username"/>
                @error('username')
                  <span class="text-danger">{{ $message }}</span>
                @enderror
              </div>
              <div>
                <input type="password" class="form-control" placeholder="Password"  name="password" id="password" />
                @error('password')
                  <span class="text-danger">{{ $message }}</span>
                @enderror
              </div>
              <div>
                <button type="submit" class="btn btn-success to_register"> Log in </button>
                <a class="reset_pass" href="#">Lost your password?</a>
              </div>
              <div class="clearfix"></div>
            </form>
          </section>
        </div>
      </div>
    </div>
  </body>
</html>
