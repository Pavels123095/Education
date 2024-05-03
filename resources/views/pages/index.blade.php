@extends('layouts.app')
@section('title', $page->name)
@section('seo_description', $page->seo_description)
@section('seo_keywords', $page->seo_keywords)
@section('content')
<header id="head" class="head-page secondary" style="background-image:url('/storage/chernyj_fon_krasnyj_tsvet_9844_1920x1080.jpg')">
  <div class="container-fluid">
    <h1>{{$page->name}}</h1>
    <div class="breadcrumbs d-flex clearfix">
      <div data-item="1" class="item-breadcrumbs col-1">
        <a href="/">Главная</a>
      </div>
      <div class="separator col-1">/</div>
      <div data-item="2" class="item-breadcrumbs col-1">
        <span>{{$page->name}}</span>
      </div>
    </div>
  </div>
</header>
<div class="page-content container">
  {!! $page->content !!}
</div>
@endsection