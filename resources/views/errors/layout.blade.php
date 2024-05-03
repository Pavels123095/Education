@extends('layouts.app')
@section('title', 'Ошибка')
@section('content')
<div class="container">
    <h1>Ошибка - @yield('code')</h1>
    <div class="row">
        <div class="col mx-auto">
            <div class="container-fluid">
                @yield('message')
            </div>
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="nav-item col-3">
                        <a class="nav-link" href="{{route('home')}}">Главная</a>
                    </li>
                    <li class="nav-item col-3">
                        <a class="nav-link" href="{{route('login')}}">Авторизация</a>
                    </li>
                    <li class="nav-item col-3">
                        <a class="nav-link" href="{{route('register')}}">Регистрация</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
</div>
@endsection