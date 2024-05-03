<?php $__env->startSection('title', 'Главные настройки'); ?>
<?php $__env->startSection('content'); ?>
  <div class="content-header">
    <div class="container">
      <div class="row mb-2">
        <h1>Главные настройки</h1>
      </div>
      <?php if(session('success')): ?>
        <div id="toastsContainerTopRight" class="toasts-top-right fixed">
          <div class="toast bg-success show" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header"><small class="mr-auto">закрыть</small>
              <button data-dismiss="toast" type="button" class="ml-2 mb-1 close" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="toast-body"><?php echo e(session('success')); ?></div>
          </div>
        </div>
      <?php endif; ?>
    </div>
  </div>
  <div class="container">
    <!--banners-->
    <div class="card card-primary collapsed-card">
      <div class="card-header">
        <h3 class="card-title">Баннеры на главной</h3>
        <div class="card-tools">
          <button type="button" class="btn btn-tool" 
            data-card-widget="collapse"><i class="fas fa-plus"></i></button>
        </div>
      </div>
      <div class="card-body" style="display: none;">
        <table class="table banners table-striped projects">
          <thead>
              <tr>
                  <th style="width: 1%">#</th>
                  <th style="width: 20%">Название</th>
                  <th style="width: 20%">Описание</th>
                  <th style="width: 10%">Статус</th>
                  <th style="width: 25%">Изображение</th>
                  <th style="width: 15%"></th>
              </tr>
          </thead>
          <tbody>
            <?php $__currentLoopData = $banners; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $banner): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <tr>
                <td><?php echo e($banner->id); ?></td>
                <td><?php echo e($banner->name); ?></td>
                <td><?php echo e($banner->text); ?></td>
                <td>
                  <?php if($banner->active): ?>
                    <span class="alert alert-primary text-center">
                      Активен
                    </span>
                  <?php else: ?>
                    <span class="alert alert-secondary text-center">
                      Неактивен
                    </span>
                  <?php endif; ?>
                </td>
                <td>
                  <img src="<?php echo e(url('/').'/'.$banner->img); ?>" alt="" width="100" height="100" />
                </td>
                <td class="project-actions text-right">
                    <a class="btn btn-info btn-sm" data-toggle="modal" data-target="#ModalBannerEdit<?php echo e($banner->id); ?>" href="<?php echo e(route('banner.edit', $banner->id)); ?>">
                      <i class="fas fa-pencil-alt"></i>
                    </a>
                    <form class="d-inline" method="post" action="<?php echo e(route('banner.destroy', $banner->id)); ?>">
                      <?php echo csrf_field(); ?>
                      <?php echo method_field('DELETE'); ?>
                      <button class="btn-delete btn btn-danger btn-sm" type="submit">
                        <i class="fas fa-trash"></i>
                      </button>
                    </form>
                </td>
              </tr>
              <?php echo $__env->make('admins.option.banner.edit', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </tbody>
        </table>
        <div class="paginate col-3 mx-auto mt-1 mb-1">
          <?php echo e($banners->links()); ?>

        </div>
        <div class="col-3 mx-auto mt-2 mb-2">
          <button type="button" data-toggle="modal" data-target="#ModalBanner" 
            class="btn btn-outline-primary">Добавить баннер</button>
        </div>
      </div>
      <?php echo $__env->make('admins.option.banner.create', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
    <!--main menu-->
    <div class="card card-outline card-primary collapsed-card">
      <div class="card-header">
        <h3 class="card-title">Главное Меню</h3>
        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse">
            <i class="fas fa-plus"></i>
          </button>
        </div>
      </div>
      <div class="card-body" style="display: none;">
        <table class="table table-striped projects">
          <thead>
            <tr>
              <th style="width: 1%">#</th>
              <th style="width: 30%">Заголовок</th>
              <th style="width: 30%">Ссылка</th>
              <th style="width: 10%">Уровень</th>
              <th style="width: 20%"></th>
            </tr>
          </thead>
          <tbody>
            <?php $__currentLoopData = $menu; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <tr>
                <td><?php echo e($item->id); ?></td>
                <td><?php echo e($item->title); ?></td>
                <td> 
                  <a href="<?php echo e($item->link); ?>"><?php echo e($item->link); ?></a>
                </td>
                <td><?php echo e($item->level); ?></td>
                <td class="project-actions text-right">
                    <a class="btn btn-info btn-sm" data-toggle="modal" data-target="#ModalMenuEdit<?php echo e($item->id); ?>" href="<?php echo e(route('options.edit', $item->id)); ?>">
                      <i class="fas fa-pencil-alt"></i>
                    </a>
                    <form class="d-inline" method="post" action="<?php echo e(route('menu.destroy', $item->id)); ?>">
                      <?php echo csrf_field(); ?>
                      <?php echo method_field('DELETE'); ?>
                      <button class="btn-delete btn btn-danger btn-sm" type="submit">
                        <i class="fas fa-trash"></i>
                      </button>
                    </form>
                </td>
              </tr>
              <?php echo $__env->make('admins.option.menu.edit', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </tbody>
        </table>
        <div class="col-3 mx-auto mt-2 mb-2">
          <button type="button" data-toggle="modal" data-target="#ModalMenu" 
            class="btn btn-outline btn-primary">Добавить пункт</button>
        </div>
      </div>
      <?php echo $__env->make('admins.option.menu.create', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
  </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admins.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/p/payusovs95/anton.prizraks.ru/resources/views/admins/options.blade.php ENDPATH**/ ?>