<div class="modal" tabindex="-1" role="dialog" id="AddUser">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Добавить пользователя</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" id="AddUserForm" method="POST" action="{{route('users.store')}}">
          @csrf
          <div class="form-group mb-0">
            <label for="role" class="col-sm-12 col-form-label text-center">Роль пользователя</label>
            <div class="col-sm-12">
              <select name="role" class="form-select form-control form-control-sm">
                <option value="teacher">Преподаватель</option>
                <option selected value="student">Студент</option>
              </select>
            </div>
          </div>
          <div class="form-group mb-0">
            <label for="group" class="col-sm-12 col-form-label text-center">Выбрать группу</label>
            <div class="col-sm-12">
              <select name="group" class="form-select form-control form-control-sm">
                <option value="not" selected>Без группы</option>
                @foreach ($groups as $group)
                  <option value="{{$group->id}}">{{$group->name}}</option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="form-group mb-0">
            <label for="inputName" class="col-sm-12 text-center col-form-label">ФИО</label>
            <div class="col-sm-12">
              <input type="text"
                class="form-control" id="inputName" name="name" placeholder="ФИО">
            </div>
          </div>
          <div class="form-group mb-0">
            <label for="phone" class="col-sm-12 text-center col-form-label">Телефон</label>
            <div class="col-sm-12">
              <input type="tel" name="phone"
                class="form-control" id="phone" placeholder="+7(___) ___-__-__">
            </div>
          </div>
          <div class="form-group mb-0">
            <label for="phone" class="col-sm-12 text-center col-form-label">Почта</label>
            <div class="col-sm-12">
              <input type="email" name="email"
                class="form-control" id="email" placeholder="E-mail">
            </div>
          </div>
          <div class="form-group mb-0">
            <label for="inputName2" class="col-sm-12 text-center col-form-label">Пароль</label>
            <div class="col-sm-12">
              <input type="password" name="password" class="form-control" id="passwordFirst" placeholder="Пароль">
            </div>
          </div>
          <div class="form-group mb-0">
            <label for="inputExperience" class="col-sm-12 text-center col-form-label">Повторите пароль</label>
            <div class="col-sm-12">
              <input type="password" class="form-control" id="password_verify" placeholder="Повторите пароль" name="password_verify">
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" onclick="$('#AddUserForm').submit(); return true;" class="btn btn-primary">Сохранить</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Отменить</button>
      </div>
    </div>
  </div>
</div>