<div class="modal bd-example-modal-lg" tabindex="-1" role="dialog" id="ModalBannerEdit{{$banner->id}}">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Добавление Баннера</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="BannerEditForm{{$banner->id}}" name="BannerEditForm{{$banner->id}}" 
          action="{{route('banner.update',$banner->id)}}" method="POST">
          @csrf
          @method('PUT')
          <div class="form-group">
            <input type="text" class="form-control" value="{{$banner->name}}"id="BannerName{{$banner->id}}" name="name" placeholder="Название Баннера">
          </div>
          <div class="form-group">
            <textarea name="text" id="BannerDescriptions{{$banner->id}}" class="form-control" rows="3" placeholder="Описание">{{$banner->text}}</textarea>
          </div>
          <div class="form-group">
            <select id="bannerActives" name="active" class="form-control form-select">
              <option value="1" @if($banner->active) selected @endif class="bg-success" selected>Активный</option>
              <option value="0" @if(!$banner->active) selected @endif class="bg-secondary">Неактивный</option>
            </select>
          </div>
          <div class="form-group">
            <label for="exampleInputFile">Добавить картинку</label>
            <div class="input-group d-flex">
              <input type="text" name="img" value="{{$banner->img}}" class="form-control col-10" id="exampleInputFile{{$banner->id}}" readonly> 
              <a href="#" class="popup_selector btn btn-primary col-2" data-inputid="exampleInputFile{{$banner->id}}">Загрузить</a>
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" onclick="$('#BannerEditForm{{$banner->id}}').submit();return true;" class="btn btn-form-action btn-primary">Сохранить</button>
        <button type="button" id="closeModalTaskCreate" class="btn btn-secondary" data-dismiss="modal">Отменить</button>
      </div>
    </div>
  </div>
</div>