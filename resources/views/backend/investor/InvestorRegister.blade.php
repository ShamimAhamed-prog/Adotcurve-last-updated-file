<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title> Investor Registration Page </title>

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
    <div class="card-header text-center">
      <a href="#" class="h1"><b>Investor</b>Register Form</a>
    </div>
    <div class="card-body">
      <form action="{{route('investor_register')}}" method="POST" enctype="multipart/form-data">
        @csrf
      <div class="form-group">
                <label for="">Name:</label>
                  <input type="text"  class="form-control" name="name" />
                  @error('name')
                  <span class="text-danger">{{$message}}</span>
                  @enderror
                </div>
                <div class="form-group">
                <label for="">Email:</label>
                  <input type="email"  class="form-control" name="email" />
                    @error('email')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group">
                <label for="">Phone:</label>
                  <input type="number"  class="form-control " name="phone" />
                    @error('phone')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group">
                <label for="">Designation:</label>
                  <input type="text"  class="form-control" name="designation" />
                    @error('designation')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group">
                <label for="">Password:</label>
                  <input type="password"  class="form-control" name="password" />
                    @error('password')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group">
                <label for="">Company Name:</label>
                  <input type="text"  class="form-control" name="company_name" />
                    @error('company_name')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group">
                <label for="">Company Website:</label>
                  <input type="text"  class="form-control" name="company_website" />
                    @error('company_website')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group">
                <label for="">Company Portfolio:</label>
                <p>N.B: ( Before upload, please rename your documents with your company name)</p>
                  <input type="file"  class="form-control" name="company_portfolio" />
                    @error('company_portfolio')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group">
                <label for="">Address:</label>
                  <input type="text"  class="form-control" name="company_address" />
                    @error('company_address')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group">
                <label for="">Photo:</label>
                  <input type="file"  class="form-control" name="photo" />
                    @error('photo')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block">Register</button>
          </div>
          <!-- /.col -->
          </form>
        </div>

      <a href="/login/investor" class=" btn btn-block btn-danger">I already have a membership</a>
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
