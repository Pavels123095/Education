@extends('admins.app')
@section('title', 'Страницы')
@section('content')
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Все страницы</h1>
          </div><!-- /.col -->
          <div class="col-2 ml-auto">
            <a class="btn btn-sm btn-primary" href="{{route('pages.create')}}">Добавить</a>
          </div>
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <div class="container card">
      @if(!empty($pages) && isset($pages))
        <table class="table table-striped projects">
            <thead>
                <tr>
                    <th style="width: 1%">#</th>
                    <th style="width: 20%">Название</th>
                    <th style="width: 20%">Alias</th>
                    <th style="width: 23%">Контент</th>
                    <th style="width: 5%" class="text-center">Статус</th>
                    <th style="width: 25%"></th>
                </tr>
            </thead>
            <tbody>
                @foreach($pages as $page)
                  <tr>
                    <td>{{$page->id}}</td>
                      <td>
                          {{$page->name}}
                          <br>
                          <small>{{date('d.m.Y h:i',strtotime($page->created_at))}}</small>
                      </td>
                      <td>
                        {{$page->alias}}
                      </td>
                      <td class="project_progress">
                        {{ \Illuminate\Support\Str::words($page->content, 2)}}
                      </td>
                      <td class="project-state">
                          @if($page->status == 1)
                            <span class="badge badge-success">Опубликовано</span>
                          @elseif($page->status == 2)
                            <span class="badge badge-primary">Создано</span>
                          @else
                            <span class="badge badge-secondary">Черновик</span>
                          @endif
                      </td>
                      <td class="project-actions text-right">
                          <a class="btn btn-info btn-sm" href="{{route('pages.edit', $page->id)}}">
                              <i class="fas fa-pencil-alt"></i>
                          </a>
                          <form class="d-inline" method="post" action="{{route('pages.destroy', $page->id)}}">
                            @csrf
                            @method('DELETE')
                            <button class="btn-delete btn btn-danger btn-sm" type="submit">
                                <i class="fas fa-trash"></i>
                            </button>
                          </form>
                      </td>
                  </tr>
                @endforeach
            </tbody>
        </table>
        {{$pages->links()}}
      @else
        <div class="container alert alert-info">Страницы еще не созданы</div>
      @endif
    </div>
@endsection