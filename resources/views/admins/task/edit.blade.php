<div class="modal bd-example-modal-lg" tabindex="-1" role="dialog" id="ModalTaskEdit_{{$task->id}}">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Добавление задания</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="ModalTaskEditForm_{{$task->id}}" name="taskUpdateForm" action="{{route('task.update', $task->id)}}" method="POST">
          @csrf
          @method('PUT')
          <div class="form-group">
            <input type="text" class="form-control" value="{{$task->name}}" id="taskName_{{$task->id}}" name="name" placeholder="Название задания">
          </div>
          <div class="form-group">
            <textarea name="description" id="taskDescription_{{$task->id}}" class="editor form-control" rows="3" placeholder="Описание задания">{{$task->description}}
            </textarea>
          </div>
          <div class="form-group">
            <select id="taskActive_{{$task->id}}" name="active" class="form-control form-select">
              <option value="1" class="bg-success" @if($task->active == 1) selected @endif>Активно</option>
              <option value="0" class="bg-secondary" @if($task->active == 0) selected @endif>Неактивно</option>
            </select>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" onclick="formSubmitUpdate_{{$task->id}}(document.getElementById('ModalTaskEditForm_{{$task->id}}'),this);return true;" class="btn btn-form-action btn-primary">Добавить</button>
        <button type="button" id="ModalTaskEditClose_{{$task->id}}" class="btn btn-secondary" data-dismiss="modal">Отменить</button>
      </div>
    </div>
  </div>
</div>
<script>
   $('.toast button[data-dismiss="toast"]').on('click',function () {
        $(this).parents('.toast').removeClass('fade show');
        $(this).parents('#toastsContainerTopRight').remove();
    });
    function formSubmitUpdate_{{$task->id}}(form,el) {
      if (form != null) {
        $.ajax({
          url: '{{route("task.update",$task->id)}}',
          data: {
            _token: $('input[name="_token"]').val(),
            id: {{$task->id}},
            name: $('#taskName_{{$task->id}}').val(),
            description: tinymce.activeEditor.getContent(),
            type: 'text',
            active: $('#taskActive_{{$task->id}}').val(),
          },
          type: 'POST',
          method: 'PUT',
          success: function (data) {
            $('body').append(data);
            document.getElementById('ModalTaskEditClose_{{$task->id}}').click();
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
        form = $(el).parents('#ModalTaskEditForm_{{$task->id}}');
        $.ajax({
          url: '{{route("task.update",$task->id)}}',
          type: 'POST',
          method: 'PUT',
          data: {
            _token: $('input[name="_token"]').val(),
            id: {{$task->id}},
            name: $('#taskName_{{$task->id}}').val(),
            description: tinymce.activeEditor.getContent(),
            type: 'text',
            active: $('#taskActive_{{$task->id}}').val(),
          },
          success: function (data) {
            $('body').append(data);
            document.getElementById('ModalTaskEditClose_{{$task->id}}').click();
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
</script>