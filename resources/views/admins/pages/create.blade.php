@extends('admins.app')
@section('title', 'Добавление страницы')
@section('content')
  <section class="content">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Добавление страницы</h1>
          </div><!-- /.col -->
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
    <div class="container">
      <div class="card card-primary">
        <!-- form start -->
        <form action="{{route('pages.store')}}" method="post">
          @csrf
          <div class="card-body">
            <div class="form-group">
              <label>Статус публикации</label>
              <select class="form-select form-control" name="status" >
                <option value="1">Опубликовано</option>
                <option value="2">Создано</option>
                <option value="0" selected>Черновик</option>
              </select>
            </div>
            <div class="form-group">
              <input name="name" type="text" class="form-control" id="namePages" placeholder="Название страницы" required>
            </div>
            <div class="form-group">
              <input name="alias" type="text" class="form-control" id="aliaspage" placeholder="url страницы" required>
            </div>
            <div class="form-group">
              <textarea rows="4" id="summernote" name="content" class="editor form-control col-lg-12" placeholder="Введите контент">
              </textarea>
            </div>
            <div class="form-group">
                <label for="exampleInputFile">Добавить картинку</label>
                <div class="d-block border-circle bg-secondary col-3 px-2 py-2">
                  <img src="/" alt="" class="file_img d-block col-12 mx-auto" />
                </div>
                <div class="input-group d-flex">
                  <input type="text" name="img" value="" class="form-control col-10" id="exampleInputFile" readonly> 
                  <a href="#" class="popup_selector btn btn-primary col-2" data-inputid="exampleInputFile">Загрузить</a>
                </div>
            </div>
            <div class="form-group">
              <label>Сео description</label>
              <textarea name="seo_description" rows="2" class="form-control" placeholder="СЕО description">
              </textarea>
            </div>
            <div class="form-group">
              <label>Сео keywords</label>
              <textarea name="seo_keywords" rows="2" class="form-control" placeholder="СЕО keywords">
              </textarea>
            </div>
          </div>
          <!-- /.card-body -->
          <div class="card-footer">
            <button type="submit" class="btn btn-primary">Добавить</button>
          </div>
        </form>
      </div>
    </div>
  </section>
@endsection