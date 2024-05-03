<aside id="sidebar" class="main-sidebar sidebar-light-primary elevation-4">
    <a href="<?php echo e(route('home')); ?>" class="brand-link">
        <img src="<?php echo e(asset('/assets/images/logo.png')); ?>"
             alt="AdminLTE Logo"
             class="brand-image img">
        <span class="brand-text font-weight-light"><?php echo e(config('app.name')); ?></span>
    </a>

    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <?php echo $__env->make('profile.menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </ul>
        </nav>
    </div>

</aside>
<?php /**PATH /home/p/payusovs95/anton.prizraks.ru/resources/views/profile/sidebar.blade.php ENDPATH**/ ?>