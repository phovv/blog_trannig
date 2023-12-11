<!DOCTYPE html>
<html lang="en">
<head>
  @include('admin.partials.head')
</head>
<body class="login-page">
  <div class="row">
    <div class="col-6 ">
    <div class="login-box">
        <!-- /.login-logo -->
        <div class="card card-outline card-primary">
          <div class="card-body">
            @include('admin.partials.alert')
            <form action="{{route('admin.store')}}" method="post" id="form-login">
            @csrf
              <div class="input-group mb-3">
              </div>
                <div class="form-group">
                  <label for="exampleInputEmail1" >Email</label>
                  <input type="text" name="email" id="Email" class="form-control" placeholder="Email" value="{{old('email')}}" data-label="Email" >
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1"  >Password</label>
                  <input type="password" name="password" id="Password" class="form-control" placeholder="Password" value="{{old('password')}}" data-label="Password">
                </div>
              <div class="row">
                <!-- /.col -->
                <div class="col-6">
                  <x-Button class=" btn btn-primary btn-block" content="Login" id="login"/>
                </div>
                <!-- /.col -->
              </div>
            </form>
            <!-- /.social-auth-links -->
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
    </div>
  </div>
<script src="  {{asset('/js/admin/login/login.js')}}"></script>
<!-- /.login-box -->
@include('admin.partials.footer')

</body>
</html>
