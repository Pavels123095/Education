<?php $__env->startSection('title', "<?php echo e('Ошибка - '.getStatusCode()); ?>"); ?>
<?php $__env->startSection('content'); ?>
  <div class="container">
    <?php if(getStatusCode() == 403): ?>
      <h1>Доступ запрещен</h1>
    <?php elseif(getStatusCode() == 404): ?>
      <h1>Страница не найдена</h1>
    <?php else: ?>
      <h1>Произошла ошибка</h1>
    <?php endif; ?>
    <div class="row">
      <div class="col-lg-3 col-sm-6 col-xs-12">
        <ul class="nav navbar">
          <li>
            <a class="nav-link" href="<?php echo e(route('home')); ?>">Главная</a>
          </li>
          <li>
            <a class="nav-link" href="<?php echo e(route('login')); ?>">Авторизация</a>
          </li>
          <li>
            <a class="nav-link" href="<?php echo e(route('register')); ?>">Регистрация</a>
          </li>
        </ul>
      </div>
    </div>
    <div class="clearfix"></div>
  </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/p/payusovs95/anton.prizraks.ru/resources/views/error.blade.php ENDPATH**/ ?>