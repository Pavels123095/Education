<div class="modal" tabindex="-1" role="dialog" id="ModalGroup">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Добавление группы</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="groupAddForm" name="groupAddForm" action="<?php echo e(route('groups.store')); ?>" method="POST">
          <?php echo csrf_field(); ?>
          <div class="form-group">
            <input type="text" id="groupName" class="form-control" name="name" placeholder="Название группы">
          </div>
          <div class="form-group">
            <input type="number" id="count_students" class="form-control" name="count_students" placeholder="Количество возможных студентов">
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" onclick="$('#groupAddForm').submit(); return true;" class="btn btn-form-action btn-primary">Добавить</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Отменить</button>
      </div>
    </div>
  </div>
</div><?php /**PATH /home/p/payusovs95/anton.prizraks.ru/resources/views/admins/group/create.blade.php ENDPATH**/ ?>