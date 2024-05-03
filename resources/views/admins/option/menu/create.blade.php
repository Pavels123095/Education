<div class="modal" tabindex="-1" role="dialog" id="ModalMenu">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Добавление Пункта меню</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="MenuAddForm" name="MenuAddForm" action="{{route('menu.store')}}" method="POST">
          @csrf
          <div class="form-group">
            <input type="text" class="form-control" id="MenuName" name="title" placeholder="Заголовок">
          </div>
          <div class="form-group">
            <input type="text" name="link" class="form-control" placeholder="Ссылка меню" />
          </div>
          <div class="form-group">
            <input type="number" class="form-control" name="level" placeholder="Уровень меню">
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" onclick="$('#MenuAddForm').submit();return true;" class="btn btn-form-action btn-primary">Добавить</button>
        <button type="button" id="closeModalTaskCreate" class="btn btn-secondary" data-dismiss="modal">Отменить</button>
      </div>
    </div>
  </div>
</div>