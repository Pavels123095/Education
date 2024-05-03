<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="@yield('seo_description')">
	<meta name="keywords" content="@yield('seo_keywords')">
	<meta name="author" content="Prizraks">
	<title>{{ config('app.name') }} - @yield('title')</title>
	<link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    @vite('resources/sass/app.scss')
    {{-- @vite('resources/js/app.js') --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" 
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" media="screen" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="{{asset('/admin/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{asset('/admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{asset('/admin/plugins/jqvmap/jqvmap.min.css')}}">
    <link rel="stylesheet" href="{{asset('/admin/plugins/jquery-ui/jquery-ui.min.css')}}">
    <link rel="stylesheet" href="{{asset('/admin/plugins/daterangepicker/daterangepicker.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('/admin/dist/css/adminlte.min.css')}}">
    <link rel="stylesheet" href="{{asset('/admin/dist/css/custom.css')}}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{asset('/admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{asset('/admin/plugins/daterangepicker/daterangepicker.css')}}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{asset('/admin/plugins/summernote/summernote-bs4.min.css')}}">
    <link rel="stylesheet" href="{{asset('/admin/dist/css/alt/adminlte.plugins.min.css')}}" />
    <link rel="stylesheet" href="{{asset('/admin/dist/css/alt/adminlte.pages.min.css')}}" />
    <link rel="stylesheet" href="{{asset('/admin/dist/css/alt/adminlte.components.min.css')}}" />
    <link rel="stylesheet" href="{{asset('/admin/dist/css/colorbox.css')}}" />
    <link rel="stylesheet" href="{{asset('/admin/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css')}}" />
    <script src="{{asset('/admin/plugins/jquery/jquery.min.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<x-laravel-ui-adminlte::adminlte-layout>
    <body class="hold-transition sidebar-mini layout-fixed">
        <div class="wrapper">
            <!-- Main Header -->
            <nav class="main-header navbar navbar-expand navbar-white navbar-light">
                <!-- Left navbar links -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a data-toggle="#sidebar" class="nav-link" data-widget="pushmenu" href="#" role="button">
                            <i class="fas fa-bars"></i>
                        </a>
                    </li>
                </ul>

                <div class="dropdown ml-auto user-menu">
                    <button class="btn btn-secondary dropdown-toggle" type="button" aria-expanded="true" id="dropdownMenuButton" data-toggle="dropdown">
                        <span class="d-none d-md-inline">@auth {{auth()->user()->name }} @endauth</span>
                    </button>
                    <div class="dropdown-menu dropdown-menu-lg py-2 px-2" aria-labelledby="dropdownMenuButton">
                        <!-- User image -->
                        <div class="user-header bg-primary mb-1 col-12 text-center">
                            <p>
                                @auth
                                    <small>Дата регистрации {{ Auth::user()->created_at->format('M. Y') }}</small>
                                @endauth
                            </p>
                        </div>
                        <!-- Menu Footer-->
                        @auth
                            <div class="user-footer d-flex">
                                <a href="{{route('profiles')}}" class="btn btn-default btn-sm mr-auto">Профиль</a>
                                <a href="#" class="btn btn-default btn-sm"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    Выйти
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        @endauth
                    </div>
                </div>
            </nav>

            <!-- Left side column. contains the logo and sidebar -->
            @include('admins.sidebar')

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <section class="content">
                    @yield('content')
                </section>
            </div>

            {{-- <!-- Main Footer -->
            <footer class="main-footer">
                <strong>Copyright &copy; 2014-{{date('Y')}} <a href="https://prizraks.ru">prizraks.ru</a>.</strong> All rights
                reserved.
            </footer> --}}
        </div>
        <!-- jQuery -->
        <script src="{{asset('/admin/dist/js/adminlte.js')}}"></script>
        <script src="https://cdn.tiny.cloud/1/z2thkm3hu10a32wfgdfpptsorpvoi7ae6389x0lni66xjeei/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>
        <script src="{{asset('/admin/plugins/toastr/toastr.min.js')}}"></script>
        <script src="{{asset('/admin/plugins/daterangepicker/daterangepicker.js')}}"></script>
        <script src="{{asset('/admin/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js')}}"></script>
        <script src="{{asset('/packages/barryvdh/elfinder/js/standalonepopup.js')}}"></script>
        <script src="{{asset('/admin/dist/js/jquery.colorbox-min.js')}}"></script>
        <script src="{{asset('/assets/js/jquery.inputmask.min.js')}}"></script>
        <script src="{{asset('/assets/js/main.js')}}"></script>
    </body>
</x-laravel-ui-adminlte::adminlte-layout>
</html>