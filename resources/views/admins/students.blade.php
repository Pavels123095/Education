@extends('admins.app')
@section('title', 'Студенты')
@section('content')
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Список студентов</h1>
          </div><!-- /.col -->
          <div class="col-2 ml-auto">
            <a class="btn btn-sm btn-primary" data-toggle="modal" 
              data-target="#AddUser" href="{{route('users.create')}}">Добавить</a>
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
      <div class="container px-2 py-2 card-header sortblock">
        <div class="col-2">
          <form class="form-inline text-center w100" method="GET" action="" id="GroupForm">
            <div class="form-group form-row">
              <label class="d-inline text-center mr-1" for="group">Выбрать по группам</label>
              <select name="group" class="w100 form-control form-control-sm" id="orderGroup">
                <option value="all" {{!$request->query('group') ? 'selected' : '' }}>Все</option>
                <option {{$request->query('group') == 'not_group' ? 'selected' : ''}} 
                  value="not_group">Без группы</option>
                  @if(!empty($groups))
                    @foreach ($groups as $group)
                      <option {{$request->query('group') == $group->id ? 'selected' : ''}}  
                        value="{{$group->id}}">{{$group->name}}</option>
                    @endforeach
                  @endif
              </select>
            </div>
          </form>
        </div>
      </div>
      <div class="card-body">
        @if(!empty($students) && isset($students))
          <table class="table table-striped projects mt-1 mb-1">
              <thead>
                  <tr>
                      <th style="width: 1%">#</th>
                      <th style="width: 20%">ФИО</th>
                      <th style="width: 15%">E-mail</th>
                      <th style="width: 20%">Телефон</th>
                      <th style="width: 18%">Дата регистрации</th>
                      <th style="width: 15%">Группа</th>
                      <th style="width: 15%"></th>
                  </tr>
              </thead>
              <tbody>
                  @foreach($students as $student)
                    <tr>
                      <td>{{$student->id}}</td>
                      <td>{{$student->name}}</td>
                      <td><a href="mailTo:{{$student->email}}">{{$student->email}}</a></td>
                      <td>
                        @if($student->phone) 
                          <a href="tel:{{$student->phone}}">{{$student->phone}}</a> 
                        @else 
                          Не указан
                        @endif
                      </td>
                      <td>{{$student->created_at->format('d.m.Y H:i')}}</td>
                      <td>{{($student->group_id ? $student->group['name'] : 'Индивидуальное обучение')}}</td>
                      <td class="project-actions text-right">
                            <a class="btn btn-info btn-sm" data-toggle="modal" data-target="#EditUser{{$student->id}}"
                              href="{{route('users.edit', $student->id)}}">
                                <i class="fas fa-pencil-alt"></i>
                            </a>
                            <form class="d-inline" method="post" action="{{route('users.destroy', $student->id)}}">
                              @csrf
                              @method('DELETE')
                              <button class="btn-delete btn btn-danger btn-sm" type="submit">
                                  <i class="fas fa-trash"></i>
                              </button>
                            </form>
                      </td>
                      @include('admins.users.edit')
                    </tr>
                  @endforeach
              </tbody>
          </table>
        @else
          <div class="container alert alert-info">Страницы еще не созданы</div>
        @endif

        <div class="col-12 pagination">{{$students->links()}}</div>
      </div>
    </div>
    @include('admins.users.create')
@endsection