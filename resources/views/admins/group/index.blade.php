@extends('admins.app')
@section('title', 'Группы')
@section('content')
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Все группы</h1>
          </div><!-- /.col -->
          <div class="col-2 ml-auto">
            <a class="btn btn-sm btn-primary " data-toggle="modal" data-target="#ModalGroup" href="{{route('groups.create')}}">Добавить</a>
          </div>
        </div><!-- /.row -->
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
      </div><!-- /.container-fluid -->
    </div>
    <div class="container card">
      @if(!empty($groups) && isset($groups))
        <table class="table table-striped projects">
            <thead>
                <tr>
                    <th style="width: 1%">#</th>
                    <th style="width: 25%">Название</th>
                    <th style="width: 25%">Максимал. студентов</th>
                    <th style="width: 25%">Студентов в группе</th>
                    <th style="width: 25%"></th>
                </tr>
            </thead>
            <tbody>
                @foreach($groups as $group)
                  <tr>
                    <td>{{$group->id}}</td>
                      <td>
                          {{$group->name}}
                          <br>
                          <small>{{date('d.m.Y h:i',strtotime($group->created_at))}}</small>
                      </td>
                      <td>
                        {{$group->count_students_max}}
                      </td>
                      <td>
                        {{$real_students}}
                      </td>
                      <td class="project-actions text-right">
                          @include('admins.group.edit')
                          <a class="btn btn-info btn-sm" data-toggle="modal"
                            data-target="#ModalGroupUpdate" href="{{route('groups.edit', $group->id)}}">
                              <i class="fas fa-pencil-alt"></i>
                          </a>
                          <form class="d-inline" method="post" action="{{route('groups.destroy', $group->id)}}">
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
        <div class="container alert alert-info">Страницы еще не созданы</div>
      @endif
      @include('admins.group.create')
    </div>
@endsection