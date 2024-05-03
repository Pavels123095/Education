@extends('admins.app')
@section('title', 'Статьи')
@section('content')
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Все статьи</h1>
        </div><!-- /.col -->
        <div class="col-2 ml-auto">
          <a class="btn btn-sm btn-primary" href="{{route('articles.create')}}">Добавить</a>
        </div>
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <div class="container card">
    @if(!empty($articles) && isset($articles))
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
              @foreach($articles as $article)
                <tr>
                  <td>{{$article->id}}</td>
                    <td>
                        {{$article->name}}
                        <br>
                        <small>{{$article->created_at}}</small>
                    </td>
                    <td>
                      {{$article->alias}}
                    </td>
                    <td class="project_progress">
                      {{\Illuminate\Support\Str::words($article->detail_text, 2)}}
                    </td>
                    <td class="project-state">
                        @if($article->status == 1)
                          <span class="badge badge-success">Опубликовано</span>
                        @elseif($article->status == 2)
                          <span class="badge badge-primary">Создано</span>
                        @else
                          <span class="badge badge-secondary">Черновик</span>
                        @endif
                    </td>
                    <td class="project-actions text-right">
                        <a class="btn btn-info btn-sm" href="{{route('articles.edit', $article->id)}}">
                            <i class="fas fa-pencil-alt"></i>
                        </a>
                        <form class="d-inline" method="post" action="{{route('articles.destroy', $article->id)}}">
                          @csrf
                          @method('DELETE')
                          <button class="btn btn-danger btn-sm" type="submit">
                              <i class="fas fa-trash"></i>
                          </button>
                        </form>
                    </td>
                </tr>
              @endforeach
          </tbody>
      </table>
      {{$articles->links()}}
    @else
      <div class="container alert alert-info">Статьи еще не созданы</div>
    @endif
  </div>
@endsection