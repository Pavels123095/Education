@extends('admins.app')
@section('title', 'Задания')
@section('content')
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Список Заданий</h1>
        </div><!-- /.col -->
        <div class="col-3 ml-auto">
          <a class="btn btn-sm btn-primary" data-toggle="modal" data-target="#ModalTask" href="#">Добавить</a>
        </div>
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <div class="container card">
    @if(!empty($tasks) && isset($tasks))
      <table class="table table-striped projects">
          <thead>
              <tr>
                  <th style="width: 1%">#</th>
                  <th style="width: 20%">Название</th>
                  <th style="width: 20%">Лекция</th>
                  <th style="width: 20%">Описание</th>
                  <th style="width: 5%" class="text-center">Статус</th>
                  <th style="width: 10%"></th>
              </tr>
          </thead>
          <tbody>
              @foreach($tasks as $task)
                <tr>
                  <td>{{$task->id}}</td>
                    <td>
                        {{$task->name}}
                        <br>
                        <small>{{date('d.m.Y',strtotime($task->created_at))}}</small>
                    </td>
                    <td>
                      @if($task->lesson)
                        <a href="{{route('lessons.edit', $task->lesson->id)}}">
                          {{$task->lesson->name}}
                        </a>
                      @else
                          Не привязана к лекции
                      @endif
                    </td>
                    <td class="project_progress">
                      {{$task_content = \Illuminate\Support\Str::words($task->description, 2)}}
                    </td>
                    <td class="project-state">
                        @if($task->active == 1)
                          <span class="badge badge-success">Активное</span>
                        @else
                          <span class="badge badge-secondary">Неактивное</span>
                        @endif
                    </td>
                    <td class="project-actions text-right">
                        <a class="btn btn-info btn-sm" data-toggle="modal" data-target="#ModalTaskEdit_{{$task->id}}"  
                          href="{{route('task.edit', $task->id )}}">
                            <i class="fas fa-pencil-alt"></i>
                        </a>
                        @include('admins.task.edit')
                        <form class="d-inline" method="post" action="{{route('task.destroy', $task->id )}}">
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
      {{$tasks->links()}}
    @else
      <div class="container alert alert-info">Задания еще не созданы</div>
    @endif
  </div>
  @include('admins.task.create')
@endsection