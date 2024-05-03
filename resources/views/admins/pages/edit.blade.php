@extends('admins.app')
@section('title', 'Редактирование страницы')
@section('content')
  <section class="content">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">{{$page->name}}</h1>
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
        <form action="{{route('pages.update', $page->id)}}" method="POST">
          @csrf
          @method('PUT')
          <div class="card-body">
             <div class="form-group">
              <label>Статус публикации</label>
              <select class="form-select form-control" name="status" >
                <option value="1" @if($page->status == 1) selected @endif>Опубликовано</option>
                <option value="2" @if($page->status == 2) selected @endif>Создано</option>
                <option value="0" @if($page->status == 0) selected @endif >Черновик</option>
              </select>
            </div>
            <div class="form-group">
              <input name="name" type="text" value="{{$page->name}}" class="form-control" id="namePages" placeholder="Название страницы" required>
            </div>
            <div class="form-group">
              <input name="alias" type="text" value="{{$page->alias}}" class="form-control" id="aliaspage" placeholder="url страницы" required>
            </div>
            <div class="form-group">
              <textarea rows="4" id="summernote" name="content" class="editor form-control col-lg-12" placeholder="Введите контент">{{$page->content}}</textarea>
            </div>
            <div class="form-group">
                <label for="exampleInputFile">Добавить картинку</label>
                <div class="d-block border-circle bg-secondary col-3 px-2 py-2">
                  <img src="/{{$page->img}}" alt="" class="file_img d-block col-12 mx-auto" />
                </div>
                <div class="input-group d-flex">
                  <input type="text" name="img" value="{{$page->img}}" class="form-control col-10" id="exampleInputFile" readonly> 
                  <a href="#" class="popup_selector btn btn-sm btn-primary col-2" data-inputid="exampleInputFile">Загрузить</a>
                </div>
            </div>
            <div class="form-group">
              <label>Сео description</label>
              <textarea name="seo_description" rows="2" class="form-control" placeholder="СЕО description">{{$page->seo_description}}</textarea>
            </div>
            <div class="form-group">
              <label>Сео keywords</label>
              <textarea name="seo_keywords" rows="2" class="form-control" placeholder="СЕО keywords">{{$page->seo_keywords}}</textarea>
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
@endsection