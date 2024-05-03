@extends('admins.app')
@section('title', 'Файлы')
@section('content')
  <div id="elfinder" class="container content">
    <iframe style="height: 100vh;width: 100%;padding:0;" src="/elfinder" width="100%" height="500" class="d-block container-fluid col-12 px-0 py-0">
    </iframe>
  </div>
@endsection