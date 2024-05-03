<div class="modal bd-example-modal-lg" tabindex="-1" role="dialog" id="ModalTaskEdit_<?php echo e($task->id); ?>">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Добавление задания</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="ModalTaskEditForm_<?php echo e($task->id); ?>" name="taskUpdateForm" action="<?php echo e(route('task.update', $task->id)); ?>" method="POST">
          <?php echo csrf_field(); ?>
          <?php echo method_field('PUT'); ?>
          <div class="form-group">
            <input type="text" class="form-control" value="<?php echo e($task->name); ?>" id="taskName_<?php echo e($task->id); ?>" name="name" placeholder="Название задания">
          </div>
          <div class="form-group">
            <textarea name="description" id="taskDescription_<?php echo e($task->id); ?>" class="editor form-control" rows="3" placeholder="Описание задания"><?php echo e($task->description); ?>

            </textarea>
          </div>
          <div class="form-group">
            <select id="taskActive_<?php echo e($task->id); ?>" name="active" class="form-control form-select">
              <option value="1" class="bg-success" <?php if($task->active == 1): ?> selected <?php endif; ?>>Активно</option>
              <option value="0" class="bg-secondary" <?php if($task->active == 0): ?> selected <?php endif; ?>>Неактивно</option>
            </select>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" onclick="formSubmitUpdate_<?php echo e($task->id); ?>(document.getElementById('ModalTaskEditForm_<?php echo e($task->id); ?>'),this);return true;" class="btn btn-form-action btn-primary">Добавить</button>
        <button type="button" id="ModalTaskEditClose_<?php echo e($task->id); ?>" class="btn btn-secondary" data-dismiss="modal">Отменить</button>
      </div>
    </div>
  </div>
</div>
<script>
   $('.toast button[data-dismiss="toast"]').on('click',function () {
        $(this).parents('.toast').removeClass('fade show');
        $(this).parents('#toastsContainerTopRight').remove();
    });
    function formSubmitUpdate_<?php echo e($task->id); ?>(form,el) {
      if (form != null) {
        $.ajax({
          url: '<?php echo e(route("task.update",$task->id)); ?>',
          data: {
            _token: $('input[name="_token"]').val(),
            id: <?php echo e($task->id); ?>,
            name: $('#taskName_<?php echo e($task->id); ?>').val(),
            description: tinymce.activeEditor.getContent(),
            type: 'text',
            active: $('#taskActive_<?php echo e($task->id); ?>').val(),
          },
          type: 'POST',
          method: 'PUT',
          success: function (data) {
            $('body').append(data);
            document.getElementById('ModalTaskEditClose_<?php echo e($task->id); ?>').click();
              setTimeout(() => {
                let toast = $('.toast.fade.show');
                setTimeout(() => {
                  $(toast).removeClass('fade show');
                  $(toast).remove();
                },1500);
              },500);
            return true;
          }
        });
      } else {
        form = $(el).parents('#ModalTaskEditForm_<?php echo e($task->id); ?>');
        $.ajax({
          url: '<?php echo e(route("task.update",$task->id)); ?>',
          type: 'POST',
          method: 'PUT',
          data: {
            _token: $('input[name="_token"]').val(),
            id: <?php echo e($task->id); ?>,
            name: $('#taskName_<?php echo e($task->id); ?>').val(),
            description: tinymce.activeEditor.getContent(),
            type: 'text',
            active: $('#taskActive_<?php echo e($task->id); ?>').val(),
          },
          success: function (data) {
            $('body').append(data);
            document.getElementById('ModalTaskEditClose_<?php echo e($task->id); ?>').click();
            setTimeout(() => {
              let toast = $('.toast.fade.show');
              setTimeout(() => {
                $(toast).removeClass('fade show');
                $(toast).remove();
              },1500);
            },500);
          }
        });
        return true;
      }
    }
</script><?php /**PATH /home/p/payusovs95/anton.prizraks.ru/resources/views/admins/task/edit.blade.php ENDPATH**/ ?>