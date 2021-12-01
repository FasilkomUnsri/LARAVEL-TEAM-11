

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Film | @yield('title')</title>
  <link href="https://fonts.googleapis.com/css2?family=Comfortaa&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('style') }}/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="{{ asset('style') }}/dist/css/adminlte.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <link rel="stylesheet" href="{{ asset('style') }}/css/style-user.css">
  </head>
<body class="mb-0">
<div class="" style="background-color: #F7F5F5;">
    <nav class="main-header navbar navbar-expand navbar-white navbar-light ml-0" >
        <ul class="navbar-nav">
        <li class="nav-item d-sm-inline-block text-black">
            <a href="{{ url('/film') }}" class="text-decoration-none text-black" style="font-size: 30px">
                <img src="{{ asset('style/pict/film.png') }}" alt="" srcset="" width="50px">
            </a>
        </li>
        </ul>
    </nav>

    <aside id="sidebar" class="main-sidebar sidebar-white-primary elevation-4">
        <!-- Sidebar -->
        <div class="sidebar">
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column mt-5" data-widget="treeview" role="menu" data-accordion="false">
                    <li class="nav-item">
                        <a href="{{ url('/') }}" class="nav-link h4 pb-3 text-white">
                            <i class="nav-icon fas fa-chevron-right"></i><p>Home</p>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </aside>

    <div class="content col-md-12 mx-auto p-0">
        <section class="content mt-0 mb-5">
            @yield('content')
        </section>
    </div>

    <footer class="main-footer ml-0 mb-0 p-0">
        <div class="p-3 pl-4 text-center">
            <div class="float-right d-none d-sm-block">
            {{-- <b>Version</b> 1.0.0 --}}
            </div>
            <strong>Copyright &copy; 2021 FILM REVIEWER</strong>
        </div>
    </footer>
</div>


<script src="{{ asset('style') }}/plugins/jquery/jquery.min.js"></script>
<script src="{{ asset('style') }}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('style') }}/dist/js/adminlte.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css">

</body>
</html>