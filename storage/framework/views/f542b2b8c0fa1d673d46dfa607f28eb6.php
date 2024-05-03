<?php $__env->startSection('title', 'Ошибка'); ?>
<?php $__env->startSection('content'); ?>
<div class="container">
    <h1>Ошибка - <?php echo $__env->yieldContent('code'); ?></h1>
    <div class="row">
        <div class="col mx-auto">
            <div class="container-fluid">
                <?php echo $__env->yieldContent('message'); ?>
            </div>
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="nav-item col-3">
                        <a class="nav-link" href="<?php echo e(route('home')); ?>">Главная</a>
                    </li>
                    <li class="nav-item col-3">
                        <a class="nav-link" href="<?php echo e(route('login')); ?>">Авторизация</a>
                    </li>
                    <li class="nav-item col-3">
                        <a class="nav-link" href="<?php echo e(route('register')); ?>">Регистрация</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/p/payusovs95/anton.prizraks.ru/resources/views/errors/layout.blade.php ENDPATH**/ ?>