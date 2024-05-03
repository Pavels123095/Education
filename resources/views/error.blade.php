@extends('layouts.app')
@section('title', "{{ 'Ошибка - '.getStatusCode()}}")
@section('content')
  <div class="container">
    @if(getStatusCode() == 403)
      <h1>Доступ запрещен</h1>
    @elseif (getStatusCode() == 404)
      <h1>Страница не найдена</h1>
    @else
      <h1>Произошла ошибка</h1>
    @endif
    <div class="row">
      <div class="col-lg-3 col-sm-6 col-xs-12">
        <ul class="nav navbar">
          <li>
            <a class="nav-link" href="{{route('home')}}">Главная</a>
          </li>
          <li>
            <a class="nav-link" href="{{route('login')}}">Авторизация</a>
          </li>
          <li>
            <a class="nav-link" href="{{route('register')}}">Регистрация</a>
          </li>
        </ul>
      </div>
    </div>
    <div class="clearfix"></div>
  </div>
@endsection