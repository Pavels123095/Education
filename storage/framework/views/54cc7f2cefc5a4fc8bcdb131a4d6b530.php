<div class="modal" tabindex="-1" role="dialog" id="EditUser<?php echo e($teacher->id); ?>">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Редактировать данные</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" id="EditUserForm<?php echo e($teacher->id); ?>" method="POST" 
          action="<?php echo e(route('teachers.update',$teacher->id)); ?>">
          <?php echo csrf_field(); ?>
          <?php echo method_field('PUT'); ?>
          <div class="form-group mb-0">
            <label for="role" class="col-sm-12 col-form-label text-center">Роль пользователя</label>
            <div class="col-sm-12">
              <select name="role" class="form-select form-control form-control-sm">
                <option value="student">Студент</option>
                <option selected value="teacher">Преподаватель</option>
              </select>
            </div>
          </div>
          <div class="form-group mb-0">
            <label for="inputName" class="col-sm-12 text-center col-form-label">ФИО</label>
            <div class="col-sm-12">
              <input type="text" value="<?php echo e($teacher->name); ?>"
                class="form-control" id="inputName" name="name" placeholder="ФИО">
            </div>
          </div>
          <div class="form-group mb-0">
            <label for="phone" class="col-sm-12 text-center col-form-label">Телефон</label>
            <div class="col-sm-12">
              <input type="tel" name="phone" value="<?php echo e($teacher->phone); ?>"
                class="form-control" id="phone" placeholder="+7(___) ___-__-__">
            </div>
          </div>
          <div class="form-group mb-0">
            <label for="phone" class="col-sm-12 text-center col-form-label">Почта</label>
            <div class="col-sm-12">
              <input type="email" name="email" value="<?php echo e($teacher->email); ?>"
                class="form-control" id="email" placeholder="E-mail">
            </div>
          </div>
          <div class="form-group mb-0">
            <label for="inputName2" class="col-sm-12 text-center col-form-label">Пароль</label>
            <div class="col-sm-12">
              <input type="password" name="password" class="form-control" id="password<?php echo e($teacher->id); ?>" placeholder="Пароль">
            </div>
          </div>
          <div class="form-group mb-0">
            <label for="inputExperience" class="col-sm-12 text-center col-form-label">Повторите пароль</label>
            <div class="col-sm-12">
              <input type="password" class="form-control" id="password_verify<?php echo e($teacher->id); ?>" placeholder="Повторите пароль" name="password_verify">
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" onclick="$('#EditUserForm<?php echo e($teacher->id); ?>').submit(); return true;" class="btn btn-primary">Сохранить</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Отменить</button>
      </div>
    </div>
  </div>
</div><?php /**PATH /home/p/payusovs95/anton.prizraks.ru/resources/views/admins/teachers/edit.blade.php ENDPATH**/ ?>