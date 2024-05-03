<div class="modal" tabindex="-1" role="dialog" id="ModalMenuEdit<?php echo e($item->id); ?>">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Обновление Пункта меню</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="MenuAddForm<?php echo e($item->id); ?>" name="MenuAddForm<?php echo e($item->id); ?>" action="<?php echo e(route('menu.update',$item->id)); ?>" method="POST">
          <?php echo csrf_field(); ?>
          <?php echo method_field('PUT'); ?>
          <div class="form-group">
            <input type="text" value="<?php echo e($item->title); ?>" class="form-control" id="MenuName" name="title" placeholder="Заголовок">
          </div>
          <div class="form-group">
            <input type="text" name="link" value="<?php echo e($item->link); ?>" class="form-control" placeholder="Ссылка меню" />
          </div>
          <div class="form-group">
            <input type="number" value="<?php echo e($item->level); ?>" class="form-control" name="level" placeholder="Уровень меню">
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" onclick="$('#MenuAddForm<?php echo e($item->id); ?>').submit();return true;" class="btn btn-form-action btn-primary">Добавить</button>
        <button type="button" id="closeModalTaskCreate" class="btn btn-secondary" data-dismiss="modal">Отменить</button>
      </div>
    </div>
  </div>
</div><?php /**PATH /home/p/payusovs95/anton.prizraks.ru/resources/views/admins/option/menu/edit.blade.php ENDPATH**/ ?>