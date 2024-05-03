@extends('layouts.app')
@section('title', $article->name)
@section('content')
<header id="head" class="head-article secondary" style="background-image:url('../{{$article->img}}');">
  <div class="container-fluid">
    <h1>{{$article->name}}</h1>
  </div>
</header>
<div class="container">
  <h2>{{$article->name}}</h2>
  <strong class="date-create text-left">{{$article->created_at->format('D, M, Y')}}</strong>
  <div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12">
      {!! $article->detail_text !!}
    </div>
  </div>
  <div class="clearfix"></div>
  <div class="articles-footer container">
    <div class="col-3">
      <a class="btn btn-outline-primary" href="{{route('articles')}}">Назад к статьям</a>
    </div>
  </div>
</div>
@endsection