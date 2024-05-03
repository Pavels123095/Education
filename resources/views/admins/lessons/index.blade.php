@extends('admins.app')
@section('title', 'Лекции')
@section('content')
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Список Лекций</h1>
        </div><!-- /.col -->
        <div class="col-3 ml-auto">
          <a class="btn btn-sm btn-primary" href="{{route('lessons.create')}}">Добавить</a>
          <a class="btn btn-sm btn-success" href="{{route('task.index')}}">Задания</a>
        </div>
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <div class="container card">
    @if(!empty($lessons) && isset($lessons))
      <table class="table table-striped projects">
          <thead>
              <tr>
                  <th style="width: 1%">#</th>
                  <th style="width: 20%">Название</th>
                  <th style="width: 20%">Преподаватель</th>
                  <th style="width: 5%" class="text-center">Статус</th>
                  <th style="width: 10%"></th>
              </tr>
          </thead>
          <tbody>
              @foreach($lessons as $lesson)
                <tr>
                  <td>{{$lesson->id}}</td>
                    <td>
                        {{$lesson->name}}
                        <br>
                        <small>{{date('d.m.Y',strtotime($lesson->created_at))}}</small>
                    </td>
                    <td class="project_progress">
                      @if($lesson->teacher_id)
                        {{$lesson->teacher_id}}
                      @else
                        {{'Лекция обобщенная'}}
                      @endif
                    </td>
                    <td class="project-state">
                        @if($lesson->status == 1)
                          <span class="badge badge-success">Опубликовано</span>
                        @elseif($lesson->status == 2)
                          <span class="badge badge-primary">Создано</span>
                        @else
                          <span class="badge badge-secondary">Черновик</span>
                        @endif
                    </td>
                    <td class="project-actions text-right">
                        <a class="btn btn-info btn-sm" href="{{route('lessons.edit', $lesson->id)}}">
                            <i class="fas fa-pencil-alt"></i>
                        </a>
                        <form class="d-inline" method="post" action="{{route('lessons.destroy', $lesson->id)}}">
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
    @else
      <div class="container alert alert-info">Лекции еще не созданы</div>
    @endif
  </div>
@endsection