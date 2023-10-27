<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet"
          href="{{asset('admin-assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{asset('admin-assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{asset('admin-assets/plugins/jqvmap/jqvmap.min.css')}}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{asset('admin-assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{asset('admin-assets/plugins/daterangepicker/daterangepicker.css')}}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{asset('admin-assets/plugins/summernote/summernote-bs4.min.css')}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('admin-assets/plugins/fontawesome-free/css/all.css')}}">
    <!-- Theme Style -->
    <link rel="stylesheet" href="{{asset('admin-assets/dist/css/adminlte.css')}}">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body class="hold-transition sidebar-mini layout-fixed">

<!-- jQuery -->
<script src="{{asset('admin-assets/plugins/jquery/jquery.js')}}"></script>
<!-- AdminLTE App-->
<script src="{{asset('admin-assets/dist/js/adminlte.js')}}"></script>
<!-- jQuery -->
<script src="{{asset('admin-assets/plugins/jquery/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('admin-assets/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{asset('admin-assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- ChartJS -->
<script src="{{asset('admin-assets/plugins/chart.js/Chart.min.js')}}"></script>
<!-- Sparkline -->
<script src="{{asset('admin-assets/plugins/sparklines/sparkline.js')}}"></script>
<!-- JQVMap -->
<script src="{{asset('admin-assets/plugins/jqvmap/jquery.vmap.min.js')}}"></script>
<script src="{{asset('admin-assets/plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
<!-- jQuery Knob Chart -->
<script src="{{asset('admin-assets/plugins/jquery-knob/jquery.knob.min.js')}}"></script>
<!-- daterangepicker -->
<script src="{{asset('admin-assets/plugins/moment/moment.min.js')}}"></script>
<script src="{{asset('admin-assets/plugins/daterangepicker/daterangepicker.js')}}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{asset('admin-assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<!-- Summernote -->
<script src="{{asset('admin-assets/plugins/summernote/summernote-bs4.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{asset('admin-assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('admin-assets/dist/js/adminlte.js')}}"></script>

<div class="wrapper">
    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
        <img class="animation__shake" src="{{asset('admin-assets/dist/img/AdminLTELogo.png')}}" alt="AdminLTELogo"
             height="60" width="60">
    </div>

    <div id="app">
        <nav
            class="navbar navbar-expand-md navbar-light bg-white shadow-sm main-header navbar navbar-expand navbar-white navbar-light">
            <div class="container">
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="navbar-brand m-2" href="{{ url('#') }}">
                                {{ config('app.name', 'Laravel') }}
                            </a>
                        </li>
                        @if (Auth::check())
                            <li class="nav-item d-none d-sm-inline-block">
                                <a href="{{ route('companies.index') }}" class="nav-link">{{__("Companies")}}</a>
                            </li>
                            <li class="nav-item d-none d-sm-inline-block">
                                <a href="{{ route('employees.index') }}" class="nav-link">{{__("Employees")}}</a>
                            </li>
                        @endif
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex pb-5">
                    <!-- Authentication Links -->
                    <ul class="nav nav-pills nav-sidebar flex-column">
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                                <li class="nav-item">
                                    <a class="m-1" href="{{ url('/en/login') }}">
                                        <strong>EN</strong>
                                    </a>
                                    <a class="m-1" href="{{ url('/ru/login') }}">
                                        <strong>RU</strong>
                                    </a>
                                </li>
                        @else
                            <ul class="nav nav-pills nav-sidebar flex-column">
                                <li class="nav-item">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#"
                                       role="button"
                                       data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        {{ Auth::user()->name }}
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-end"
                                         aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item link-secondary" href="{{ url('/logout') }}"
                                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ url('/logout') }}" method="POST"
                                              class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            </ul>
                            @if (Auth::check())
                                <li class="nav-item">
                                    <a class="m-1" href="{{ url('/en/companies') }}">
                                        <strong>EN</strong>
                                    </a>
                                    <a class="m-1" href="{{ url('/ru/companies') }}">
                                        <strong>RU</strong>
                                    </a>
                                </li>
                            @endif
                    </ul>
                    @endguest
                </div>
                @if (Auth::check())
                    <!-- Sidebar Menu -->
                    <nav class="mt-2">
                        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                            data-accordion="false">
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon fas fa-building"></i>
                                    <p>
                                        {{ __("Companies") }}
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ route('companies.index') }}" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>{{__("List")}}</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('companies.create') }}" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>{{ __("Create") }}</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon fas fa-user-friends"></i>
                                    <p>
                                        {{ __("Employees") }}
                                        <i class="fas fa-angle-left right"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ route('employees.index') }}" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>{{ __("List") }}</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('employees.create') }}" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>{{ __("Create") }}</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                @endif
            </div>
        </aside>

        <div class="content-wrapper">
            <div class="container-fluid">
                <section class="content">
                    <div class="container-fluid">
                        <main class="py-4">
                            @yield('content')
                        </main>
                    </div>
                </section>
            </div>
        </div>
    </div>
</div>
@stack('scripts')
</body>
</html>
