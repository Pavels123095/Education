
@section('title', 'Регистрация')
<!DOCTYPE html>
<html lang="en">
<head>
    <style>#head img {width: 100%; height: 100%; object-fit: cover;} </style>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="@yield('seo-description')">
	<meta name="keywords" content="@yield('seo-keywords')">
	<meta name="author" content="Prizraks">
	<title>{{ config('app.name') }} - @yield('title')</title>
  <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
  <link rel="manifest" href="/site.webmanifest">
	<link rel="stylesheet" media="screen" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700">
	<!--<link rel="stylesheet" href="{{asset('/assets/css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{asset('/assets/css/font-awesome.min.css')}}"> 
	<link rel="stylesheet" href="{{asset('/assets/css/bootstrap-theme.css')}}" media="screen"> 
	<link rel="stylesheet" href="{{asset('/assets/css/style.css')}}">
  <link rel='stylesheet' id='camera-css'  href='{{asset('/assets/css/style.css')}}' type='text/css' media='all'> -->
    @vite('resources/sass/app.scss')
    @vite('resources/js/app.js')
	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	<script src="{{asset('/assets/js/html5shiv.js')}}"></script>
	<script src="{{asset('/assets/js/respond.min.js')}}"></script>
	<![endif]-->
</head>
<x-laravel-ui-adminlte::adminlte-layout>
    <body class="hold-transition register-page">
        <div class="register-box">
            <div class="register-logo">
                <a href="{{ url('/home') }}"><b>{{ config('app.name') }}</b></a>
            </div>

            <div class="card">
                <div class="card-body register-card-body">
                    <p class="login-box-msg">Регистрация на платформе</p>

                    <form method="post" action="{{ route('register') }}">
                        @csrf
                        <div class="input-group mb-3 d-flex flex-column">
                            <label class="label-select label col-12" for="role">Выберите роль пользователя:</label>
                            <select name="role" class="form-select form-select-sm form-control @error('role') is-invalid @enderror">
                                <option value="teacher">Преподаватель</option>
                                <option selected value="student">Студент</option>
                            </select>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="input-group mb-3">
                            <input type="text" name="name"
                                class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}"
                                placeholder="Ваше ФИО">
                            <div class="input-group-append">
                                <div class="input-group-text"><span class="fas fa-user"></span></div>
                            </div>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="input-group mb-3">
                            <input type="email" name="email" value="{{ old('email') }}"
                                class="form-control @error('email') is-invalid @enderror" placeholder="Email">
                            <div class="input-group-append">
                                <div class="input-group-text"><span class="fas fa-envelope"></span></div>
                            </div>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="input-group mb-3">
                            <input type="password" name="password"
                                class="form-control @error('password') is-invalid @enderror" placeholder="Password">
                            <div class="input-group-append">
                                <div class="input-group-text"><span class="fas fa-lock"></span></div>
                            </div>
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="input-group mb-3">
                            <input type="password" name="password_confirmation" class="form-control"
                                placeholder="Retype password">
                            <div class="input-group-append">
                                <div class="input-group-text"><span class="fas fa-lock"></span></div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="icheck-primary d-flex align-items-center justify-content-spacebetween">
                                    <input type="checkbox" id="agreeTerms" name="terms" value="agree">
                                    <label for="agreeTerms" class="col-11">Я согласен с <a href="#">политикой обработки персональных данных</a></label>
                                </div>
                            </div>
                            <!-- /.col -->
                            <div class="col-8 mx-auto">
                                <button type="submit" class="btn btn-primary btn-block">Зарегистрироваться</button>
                            </div>
                            <!-- /.col -->
                        </div>
                    </form>

                    <a href="{{ route('login') }}" class="mt-2 col-12 d-block text-box text-center">Уже есть аккаунт на платформе</a>
                </div>
                <!-- /.form-box -->
            </div><!-- /.card -->

            <!-- /.form-box -->
        </div>
        <!-- /.register-box -->
    </body>
</x-laravel-ui-adminlte::adminlte-layout>