<div class="modal" tabindex="-1" role="dialog" id="ModalGroupUpdate">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Редактирование группы: <?php echo e($group->name); ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="groupUpdateForm" name="groupUpdateForm" action="<?php echo e(route('groups.update',$group->id)); ?>" method="POST">
          <?php echo csrf_field(); ?>
          <?php echo method_field('PUT'); ?>
          <div class="form-group">
            <input type="text" value="<?php echo e($group->name); ?>" id="groupName" class="form-control" name="name" placeholder="Название группы">
          </div>
          <div class="form-group">
            <input type="number" id="count_students" value="<?php echo e($group->count_students_max); ?>"
              class="form-control" name="count_students" placeholder="Количество возможных студентов">
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" onclick="$('#groupUpdateForm').submit();return true;" class="btn btn-form-action btn-primary">Добавить</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Отменить</button>
      </div>
    </div>
  </div>
</div><?php /**PATH /home/p/payusovs95/anton.prizraks.ru/resources/views/admins/group/edit.blade.php ENDPATH**/ ?>