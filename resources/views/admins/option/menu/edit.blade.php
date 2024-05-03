<div class="modal" tabindex="-1" role="dialog" id="ModalMenuEdit{{$item->id}}">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Обновление Пункта меню</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="MenuAddForm{{$item->id}}" name="MenuAddForm{{$item->id}}" action="{{route('menu.update',$item->id)}}" method="POST">
          @csrf
          @method('PUT')
          <div class="form-group">
            <input type="text" value="{{$item->title}}" class="form-control" id="MenuName" name="title" placeholder="Заголовок">
          </div>
          <div class="form-group">
            <input type="text" name="link" value="{{$item->link}}" class="form-control" placeholder="Ссылка меню" />
          </div>
          <div class="form-group">
            <input type="number" value="{{$item->level}}" class="form-control" name="level" placeholder="Уровень меню">
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" onclick="$('#MenuAddForm{{$item->id}}').submit();return true;" class="btn btn-form-action btn-primary">Добавить</button>
        <button type="button" id="closeModalTaskCreate" class="btn btn-secondary" data-dismiss="modal">Отменить</button>
      </div>
    </div>
  </div>
</div>