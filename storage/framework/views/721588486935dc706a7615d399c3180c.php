<div class="modal bd-example-modal-lg" tabindex="-1" role="dialog" id="ModalBanner">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Добавление Баннера</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="BannerAddForm" name="BannerAddForm" action="<?php echo e(route('banner.store')); ?>" method="POST">
          <?php echo csrf_field(); ?>
          <div class="form-group">
            <input type="text" class="form-control" id="BannerName" name="name" placeholder="Название Баннера">
          </div>
          <div class="form-group">
            <textarea name="text" id="BannerDescription" class="form-control" rows="3" placeholder="Описание задания"></textarea>
          </div>
          <div class="form-group">
            <select id="bannerActive" name="active" class="form-control form-select">
              <option value="1" class="bg-success" selected>Активный</option>
              <option value="0" class="bg-secondary">Неактивный</option>
            </select>
          </div>
          <div class="form-group">
            <label for="exampleInputFile">Добавить картинку</label>
            <div class="input-group d-flex">
              <input type="text" name="img" value="" class="form-control col-10" id="exampleInputFile" readonly> 
              <a href="#" class="popup_selector btn btn-primary col-2" data-inputid="exampleInputFile">Загрузить</a>
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" onclick="$('#BannerAddForm').submit();return true;" class="btn btn-form-action btn-primary">Добавить</button>
        <button type="button" id="closeModalTaskCreate" class="btn btn-secondary" data-dismiss="modal">Отменить</button>
      </div>
    </div>
  </div>
</div><?php /**PATH /home/p/payusovs95/anton.prizraks.ru/resources/views/admins/option/banner/create.blade.php ENDPATH**/ ?>