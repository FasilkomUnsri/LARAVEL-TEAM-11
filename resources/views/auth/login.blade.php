
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin | Log in</title>

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('style') }}/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{ asset('style') }}/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <link rel="stylesheet" href="{{ asset('style') }}/dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
        <div class="login-logo">
            <a href=""><b>FILM</b> Login</a>
          </div>

      <form action="{{ url('admin') }}" method="post">
        @csrf
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="username" placeholder="Username" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="password" placeholder="Password" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <a href="{{ url('register') }}">Belum Punya Akun ?</a>
          </div>
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Log In</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

<script src="{{ asset('style') }}/plugins/jquery/jquery.min.js"></script>
<script src="{{ asset('style') }}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('style') }}/plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- Toastr -->
<script src="{{ asset('style') }}/dist/js/adminlte.min.js"></script>

<script>
    function gagal(){
        var Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
        });
        
        Toast.fire({
            icon: 'error',
            title: ' &nbsp; Username dan Password Tidak Sesuai. Silahkan Coba lagi'
        });
    }

    function logout(){
        var Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
        });
        
        Toast.fire({
            icon: 'success',
            title: ' &nbsp; Anda Telah Logout'
        });
    }

    function register(){
        var Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
        });
        
        Toast.fire({
            icon: 'success',
            title: ' &nbsp; Registrasi Berhasil, Silahkan Login'
        });
    }
</script>

@if (session('gagal'))
    <script>
        gagal();
    </script>
@endif

@if (session('logout'))
    <script>
        logout();
    </script>
@endif

@if (session('success_register'))
    <script>
        register();
    </script>
@endif
</body>
</html>
