@extends('profile.app')
@section('title', 'Личный кабинет')
@section('content')
    <div class="container-fluid my-2">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{'3'}}</h3>
                <p>Количество заданий</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="{{route('tasks')}}" class="small-box-footer">Подробнее <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>{{'4'}}</h3>
                <p>Количество лекций</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="{{route('lessons')}}" class="small-box-footer">Подробнее <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
        <div class="row">
          <div class="col-md-3">
            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center profile-img" style="background-image:url({{(!empty($user->avatar) && $user->avatar != null) ? $user->avatar : '/images/not-user-avatar.png'}})">
                    <img class="img-responsive profile-user-img img-circle" 
                      src="{{(!empty($user->avatar) && $user->avatar != null) ? $user->avatar : '/images/not-user-avatar.png'}}" alt="User profile picture">
                </div>
                <h3 class="profile-username text-center">{{$user->name}}</h3>
                <button class="popup-selector btn btn-primary d-block mx-auto">Изменить аватар</button>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
            <div class="card card-solid">
              <div class="card bg-light d-flex flex-fill">
                <div class="card-header text-muted border-bottom-0">
                  Ваш преподаватель
                </div>
                <div class="card-body pt-0">
                  <div class="row">
                    <div class="col-7">
                      <h2 class="lead"><b>Nicole Pearson</b></h2>
                      <ul class="ml-4 mb-0 fa-ul text-muted">
                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> E-mail:  teacher@mail.ru</li>
                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> Phone: 8 900 800-75-75</li>
                      </ul>
                    </div>
                    <div class="col-5 text-center">
                      <img src="/admin/dist/img/user1-128x128.jpg" alt="user-avatar" class="img-circle img-fluid">
                    </div>
                  </div>
                </div>
                <div class="card-footer">
                  <div class="text-right">
                    <a href="#" class="btn btn-sm bg-teal">
                      <i class="fas fa-comments"></i>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#settings" data-toggle="tab">Ваши данные</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="tab-pane active" id="settings">
                    <form class="form-horizontal" method="post" action="{{route('profile.update',$user->id)}}">
                      @csrf
                      @method('PUT')
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Имя</label>
                        <div class="col-sm-10">
                          <input type="text" value="{{$user->name}}" 
                            class="form-control" id="inputName" name="name" placeholder="Имя">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="phone" class="col-sm-2 col-form-label">Телефон</label>
                        <div class="col-sm-10">
                        @if(empty($user->phone))
                          <input type="tel" name="phone" value="{{$user->phone}}"
                            class="form-control" id="phone" placeholder="+7(___) ___-__-__" />
                        @else
                          <input type="text" readonly name="phone" value="{{$user->phone}}" />
                        @endif
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="email" class="col-sm-2 col-form-label">E-mail</label>
                        <div class="col-sm-10">
                          <input type="email" name="email" value="{{$user->email}}"
                            class="form-control" id="email" placeholder="___@__">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName2" class="col-sm-2 col-form-label">Пароль</label>
                        <div class="col-sm-10">
                          <input type="password" name="password" class="form-control" id="passwordFirst" placeholder="Пароль">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputExperience" class="col-sm-2 col-form-label">Повторите пароль</label>
                        <div class="col-sm-10">
                          <input type="password" class="form-control" id="password_verify" placeholder="Повторите пароль" name="password_verify">
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <div class="checkbox">
                            <label>
                              <input type="checkbox"> Соглашение о <a href="#">политике конфинденциальности</a>
                            </label>
                          </div>
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <button type="submit" class="btn btn-success">Сохранить</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
    </div>
    <div class="clearfix"></div>
@endsection