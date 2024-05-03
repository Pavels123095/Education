@extends('admins.app')
@section('title', 'Главные настройки')
@section('content')
  <div class="content-header">
    <div class="container">
      <div class="row mb-2">
        <h1>Главные настройки</h1>
      </div>
      @if(session('success'))
        <div id="toastsContainerTopRight" class="toasts-top-right fixed">
          <div class="toast bg-success show" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header"><small class="mr-auto">закрыть</small>
              <button data-dismiss="toast" type="button" class="ml-2 mb-1 close" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="toast-body">{{session('success')}}</div>
          </div>
        </div>
      @endif
    </div>
  </div>
  <div class="container">
    <!--banners-->
    <div class="card card-primary collapsed-card">
      <div class="card-header">
        <h3 class="card-title">Баннеры на главной</h3>
        <div class="card-tools">
          <button type="button" class="btn btn-tool" 
            data-card-widget="collapse"><i class="fas fa-plus"></i></button>
        </div>
      </div>
      <div class="card-body" style="display: none;">
        <table class="table banners table-striped projects">
          <thead>
              <tr>
                  <th style="width: 1%">#</th>
                  <th style="width: 20%">Название</th>
                  <th style="width: 20%">Описание</th>
                  <th style="width: 10%">Статус</th>
                  <th style="width: 25%">Изображение</th>
                  <th style="width: 15%"></th>
              </tr>
          </thead>
          <tbody>
            @foreach($banners as $banner)
              <tr>
                <td>{{$banner->id}}</td>
                <td>{{$banner->name}}</td>
                <td>{{$banner->text}}</td>
                <td>
                  @if($banner->active)
                    <span class="alert alert-primary text-center">
                      Активен
                    </span>
                  @else
                    <span class="alert alert-secondary text-center">
                      Неактивен
                    </span>
                  @endif
                </td>
                <td>
                  <img src="{{url('/').'/'.$banner->img}}" alt="" width="100" height="100" />
                </td>
                <td class="project-actions text-right">
                    <a class="btn btn-info btn-sm" data-toggle="modal" data-target="#ModalBannerEdit{{$banner->id}}" href="{{route('banner.edit', $banner->id)}}">
                      <i class="fas fa-pencil-alt"></i>
                    </a>
                    <form class="d-inline" method="post" action="{{route('banner.destroy', $banner->id)}}">
                      @csrf
                      @method('DELETE')
                      <button class="btn-delete btn btn-danger btn-sm" type="submit">
                        <i class="fas fa-trash"></i>
                      </button>
                    </form>
                </td>
              </tr>
              @include('admins.option.banner.edit')
            @endforeach
          </tbody>
        </table>
        <div class="paginate col-3 mx-auto mt-1 mb-1">
          {{$banners->links()}}
        </div>
        <div class="col-3 mx-auto mt-2 mb-2">
          <button type="button" data-toggle="modal" data-target="#ModalBanner" 
            class="btn btn-outline-primary">Добавить баннер</button>
        </div>
      </div>
      @include('admins.option.banner.create')
    </div>
    <!--main menu-->
    <div class="card card-outline card-primary collapsed-card">
      <div class="card-header">
        <h3 class="card-title">Главное Меню</h3>
        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse">
            <i class="fas fa-plus"></i>
          </button>
        </div>
      </div>
      <div class="card-body" style="display: none;">
        <table class="table table-striped projects">
          <thead>
            <tr>
              <th style="width: 1%">#</th>
              <th style="width: 30%">Заголовок</th>
              <th style="width: 30%">Ссылка</th>
              <th style="width: 10%">Уровень</th>
              <th style="width: 20%"></th>
            </tr>
          </thead>
          <tbody>
            @foreach($menu as $item)
              <tr>
                <td>{{$item->id}}</td>
                <td>{{$item->title}}</td>
                <td> 
                  <a href="{{$item->link}}">{{$item->link}}</a>
                </td>
                <td>{{$item->level}}</td>
                <td class="project-actions text-right">
                    <a class="btn btn-info btn-sm" data-toggle="modal" data-target="#ModalMenuEdit{{$item->id}}" href="{{route('options.edit', $item->id)}}">
                      <i class="fas fa-pencil-alt"></i>
                    </a>
                    <form class="d-inline" method="post" action="{{route('menu.destroy', $item->id)}}">
                      @csrf
                      @method('DELETE')
                      <button class="btn-delete btn btn-danger btn-sm" type="submit">
                        <i class="fas fa-trash"></i>
                      </button>
                    </form>
                </td>
              </tr>
              @include('admins.option.menu.edit')
            @endforeach
          </tbody>
        </table>
        <div class="col-3 mx-auto mt-2 mb-2">
          <button type="button" data-toggle="modal" data-target="#ModalMenu" 
            class="btn btn-outline btn-primary">Добавить пункт</button>
        </div>
      </div>
      @include('admins.option.menu.create')
    </div>
  </div>
@endsection