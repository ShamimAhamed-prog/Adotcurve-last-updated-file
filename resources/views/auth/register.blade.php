<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Registration Page </title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('assets/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{asset('assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('assets/dist/css/adminlte.min.css')}}">
</head>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="card card-outline card-primary">
  @if ($errors->any())
              <div class="alert alert-danger">
                <ul>
                  @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                  @endforeach
                </ul>
              </div>
              @endif
             @if(Session::has('error-msg'))
             <p class="text-danger">{{Session::get('error-msg')}}
             </p>
             @endif
    <div class="card-header text-center">
      <a href="../../index2.html" class="h1"><b>Member</b>Register</a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Register a new membership</p>

      <form action="{{route('register')}}" method="POST">
      <div class="form-group">
                <label for="">Name:</label>
                  <input type="text"  class="form-control form-control-lg" name="name" />
                </div>
                <div class="form-group">
                <label for="">Email:</label>
                  <input type="email"  class="form-control form-control-lg" name="email" />
                </div>
                <div class="form-group">
                <label for="">Phone:</label>
                  <input type="number"  class="form-control form-control-lg" name="phone" />
                </div>
                <div class="form-group">
                <label for="">Password:</label>
                  <input type="password"  class="form-control form-control-lg" name="password" />
                </div>
                <div class="form-group">
                <label for="">Designation:</label>
                  <input type="text"  class="form-control form-control-lg" name="designation" />
                </div>
                <div class="form-group">
                    <label class="form-label">Role:</label>
                    <select name="role_as" class="form-control">
                        <option selected disabled>Please Choose Your Role</option>
                        <option value="startup">Startup</option>
                        <option value="investor">Investor</option>
                    </select>
                </div>
                <div class="form-group">
                <label for="">Company Name:</label>
                  <input type="text"  class="form-control form-control-lg" name="company_name" />
                </div>

                <div class="form-group">
                <label for="">Address:</label>
                  <input type="text"  class="form-control form-control-lg" name="address" />
                </div>
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block">Register</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <div class="social-auth-links text-center">
        <a href="#" class="btn btn-block btn-primary">
          <i class="fab fa-facebook mr-2"></i>
          Sign up using Facebook
        </a>
        <a href="#" class="btn btn-block btn-danger">
          <i class="fab fa-google-plus mr-2"></i>
          Sign up using Google+
        </a>
      </div>

      <a href="/login/startup" class="text-center">I already have a membership</a>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->

<!-- jQuery -->
<script src="{{asset('assets/plugins/jquery/jquery.min.js')}}"></script>
<script src="{{asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('assets/dist/js/adminlte.min.js')}}"></script>
</body>
</html>
