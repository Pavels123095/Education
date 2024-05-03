@extends('admins.app')
@section('title', 'Редактирование лекции')
@section('content')
  <section class="content">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Лекция {{$lesson->name}}</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
        @if(session('success'))
          <div id="toastsContainerTopRight" class="toasts-top-right fixed">
            <div class="toast bg-success fade show" role="alert" aria-live="assertive" aria-atomic="true">
              <div class="toast-header"><small class="mr-auto">закрыть</small>
                <button data-dismiss="toast" type="button" class="ml-2 mb-1 close" aria-label="Close"><span aria-hidden="true">×</span></button>
              </div>
              <div class="toast-body">{{session('success')}}</div>
            </div>
          </div>
        @endif
      </div><!-- /.container-fluid -->
    </div>
    <div class="container">
      <div class="card card-primary">
        <!-- form start -->
        <form action='{{route('lessons.update', $lesson->id)}}' method="post">
          @csrf
          @method('PUT')
          <div class="card-body">
            <div class="form-group">
              <input name="name" value="{{$lesson->name}}" type="text" class="form-control" id="namelessons" placeholder="Название Лекции" required>
            </div>
            <div class="form-group">
              <textarea rows="4" name="description" class="editor form-control col-lg-12" placeholder="Введите описание">{{$lesson->description}}
              </textarea>
            </div>
            <div class="form-group">
              @if(empty($tasks))
                <span data-toggle="modal" data-target="#ModalTask" class="btn btn-sm btn-primary">Добавить задание</span>
              @else
                <label>Выберите задания</label>
                <select rows="4" name="task_ids" class="form-control form-select" multiple>
                  @foreach ($tasks as $task)
                    <option value="{{$task->id}}">{{$task->name}}</option>
                  @endforeach
                </select>
              @endif
            </div>
            <div class="form-group">
              <label for="exampleInputFile">Добавить изображение</label>
              <div class="input-group d-flex">
                <input type="text" name="images" value="{{$lesson->images}}" class="form-control col-10" id="exampleInputFile" readonly> 
                <a href="#" class="popup_selector btn btn-primary col-2" data-inputid="exampleInputFile">Загрузить</a>
              </div>
            </div>
            <div class="form-group">
              <label for="videoFile">Добавить видео</label>
              <div class="input-group d-flex">
                <input type="text" name="videos" value="{{$lesson->videos}}" class="form-control col-10" id="videoFile" readonly> 
                <a href="#" class="popup_selector btn btn-primary col-2" data-inputid="videoFile">Загрузить</a>
              </div>
            </div>
          </div>
          <!-- /.card-body -->
          <div class="card-footer">
            <button type="submit" class="btn btn-primary">Сохранить</button>
          </div>
        </form>
      </div>
    </div>
  </section>
  @include('admins.task.create')
@endsection