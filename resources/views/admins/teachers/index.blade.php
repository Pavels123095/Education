@extends('admins.app')
@section('title', 'Преподаватели')
@section('content')
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Список преподавателей</h1>
          </div><!-- /.col -->
          <div class="col-2 ml-auto">
            <a class="btn btn-sm btn-primary" data-toggle="modal" 
              data-target="#AddUser" href="{{route('teachers.create')}}">Добавить</a>
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
      <div class="card-body">
        @if(!empty($teachers) && isset($teachers))
          <table class="table table-striped projects mt-1 mb-1">
              <thead>
                  <tr>
                      <th style="width: 1%">#</th>
                      <th style="width: 23%">ФИО</th>
                      <th style="width: 15%">E-mail</th>
                      <th style="width: 20%">Телефон</th>
                      <th style="width: 17%">Дата регистрации</th>
                      <th style="width: 15%"></th>
                  </tr>
              </thead>
              <tbody>
                  @foreach($teachers as $teacher)
                    <tr>
                      <td>{{$teacher->id}}</td>
                      <td>{{$teacher->name}}</td>
                      <td><a href="mailTo:{{$teacher->email}}">{{$teacher->email}}</a></td>
                      <td>
                        @if($teacher->phone) 
                          <a href="tel:{{$teacher->phone}}">{{$teacher->phone}}</a> 
                        @else 
                          Не указан
                        @endif
                      </td>
                      <td>{{$teacher->created_at->format('d.m.Y H:i')}}</td>
                      <td class="project-actions text-right">
                            <a class="btn btn-info btn-sm" data-toggle="modal" data-target="#EditUser{{$teacher->id}}"
                              href="{{route('users.edit', $teacher->id)}}">
                                <i class="fas fa-pencil-alt"></i>
                            </a>
                            <form class="d-inline" method="post" action="{{route('users.destroy', $teacher->id)}}">
                              @csrf
                              @method('DELETE')
                              <button class="btn-delete btn btn-danger btn-sm" type="submit">
                                  <i class="fas fa-trash"></i>
                              </button>
                            </form>
                      </td>
                      @include('admins.teachers.edit')
                    </tr>
                  @endforeach
              </tbody>
          </table>
        @else
          <div class="container alert alert-info">Страницы еще не созданы</div>
        @endif

        <div class="col-12 pagination">{{$teachers->links()}}</div>
      </div>
    </div>
    @include('admins.teachers.create')
@endsection