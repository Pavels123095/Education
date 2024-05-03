<div class="modal bd-example-modal-lg" tabindex="-1" role="dialog" id="ModalTask">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Добавление задания</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="taskAddForm" name="taskAddForm" action="<?php echo e(route('task.store')); ?>" method="POST">
          <?php echo csrf_field(); ?>
          <div class="form-group">
            <input type="text" class="form-control" id="taskName" name="name" placeholder="Название задания">
          </div>
          <div class="form-group">
            <textarea name="description" id="taskDescription" class="editor form-control" rows="3" placeholder="Описание задания">
            </textarea>
          </div>
          <div class="form-group">
            <select id="taskActive" name="active" class="form-control form-select">
              <option value="1" class="bg-success" selected>Активно</option>
              <option value="0" class="bg-secondary">Неактивно</option>
            </select>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" onclick="formSubmit(document.getElementById('taskAddForm'),this);" class="btn btn-form-action btn-primary">Добавить</button>
        <button type="button" id="closeModalTaskCreate" class="btn btn-secondary" data-dismiss="modal">Отменить</button>
      </div>
    </div>
  </div>
</div>
<script>
    function formSubmit(form,el) {
      if (form != null) {
        $.ajax({
          url: '<?php echo e(route("task.store")); ?>',
          data: {
            _token: $('input[name="_token"]').val(),
            name: $('#taskName').val(),
            description: tinymce.activeEditor.getContent(),
            active: $('#taskActive').val(),
            type: 'text',
          },
          type: 'POST',
          success: function (data) {
            $('body').append(data);
            document.getElementById('closeModalTaskCreate').click();
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
        form = $(el).parents('#taskAddForm');
        $.ajax({
          url: '<?php echo e(route("task.store")); ?>',
          type: 'POST',
          data: {
            _token: $('input[name="_token"]').val(),
            name: $('#taskName').val(),
            description: tinymce.activeEditor.getContent(),
            active: $('#taskActive').val(),
            type: 'text',
          },
          success: function (data) {
            $('body').append(data);
            document.getElementById('closeModalTaskCreate').click();
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
</script><?php /**PATH /home/p/payusovs95/anton.prizraks.ru/resources/views/admins/task/create.blade.php ENDPATH**/ ?>