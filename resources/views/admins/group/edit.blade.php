<div class="modal" tabindex="-1" role="dialog" id="ModalGroupUpdate">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Редактирование группы: {{$group->name}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="groupUpdateForm" name="groupUpdateForm" action="{{route('groups.update',$group->id)}}" method="POST">
          @csrf
          @method('PUT')
          <div class="form-group">
            <input type="text" value="{{$group->name}}" id="groupName" class="form-control" name="name" placeholder="Название группы">
          </div>
          <div class="form-group">
            <input type="number" id="count_students" value="{{$group->count_students_max}}"
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
</div>