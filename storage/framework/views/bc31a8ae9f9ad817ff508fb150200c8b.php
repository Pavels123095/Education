<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="<?php echo $__env->yieldContent('seo_description'); ?>">
	<meta name="keywords" content="<?php echo $__env->yieldContent('seo_keywords'); ?>">
	<meta name="author" content="Prizraks">
	<title><?php echo e(config('app.name')); ?> - <?php echo $__env->yieldContent('title'); ?></title>
	<link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <?php echo app('Illuminate\Foundation\Vite')('resources/sass/app.scss'); ?>
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" 
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" media="screen" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="<?php echo e(asset('/admin/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')); ?>">
    <!-- iCheck -->
    <link rel="stylesheet" href="<?php echo e(asset('/admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css')); ?>">
    <!-- JQVMap -->
    <link rel="stylesheet" href="<?php echo e(asset('/admin/plugins/jqvmap/jqvmap.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('/admin/plugins/jquery-ui/jquery-ui.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('/admin/plugins/daterangepicker/daterangepicker.css')); ?>">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo e(asset('/admin/dist/css/adminlte.min.css')); ?>">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="<?php echo e(asset('/admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')); ?>">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="<?php echo e(asset('/admin/plugins/daterangepicker/daterangepicker.css')); ?>">
    <!-- summernote -->
    <link rel="stylesheet" href="<?php echo e(asset('/admin/plugins/summernote/summernote-bs4.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('/admin/dist/css/alt/adminlte.plugins.min.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('/admin/dist/css/alt/adminlte.pages.min.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('/admin/dist/css/alt/adminlte.components.min.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('/admin/dist/css/colorbox.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('/admin/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css')); ?>" />
    <script src="<?php echo e(asset('/admin/plugins/jquery/jquery.min.js')); ?>"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<?php if (isset($component)) { $__componentOriginal97eb5b161211c0da08650c9299ba5f38 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal97eb5b161211c0da08650c9299ba5f38 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'laravel-ui-adminlte::components.adminlte-layout','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('laravel-ui-adminlte::adminlte-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
    <body class="hold-transition sidebar-mini layout-fixed">
        <div class="wrapper">
            <!-- Main Header -->
            <nav class="main-header navbar navbar-expand navbar-white navbar-light">
                <!-- Left navbar links -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a data-toggle="#sidebar" class="nav-link" data-widget="pushmenu" href="#" role="button">
                            <i class="fas fa-bars"></i>
                        </a>
                    </li>
                </ul>

                <div class="dropdown ml-auto user-menu">
                    <button class="btn btn-secondary dropdown-toggle" type="button" aria-expanded="true" id="dropdownMenuButton" data-toggle="dropdown">
                        <span class="d-none d-md-inline"><?php if(auth()->guard()->check()): ?> <?php echo e(auth()->user()->name); ?> <?php endif; ?></span>
                    </button>
                    <div class="dropdown-menu dropdown-menu-lg py-2 px-2" aria-labelledby="dropdownMenuButton">
                        <!-- User image -->
                        <div class="user-header bg-primary mb-1 col-12 text-center">
                            <p>
                                <?php if(auth()->guard()->check()): ?>
                                    <small>Дата регистрации <?php echo e(Auth::user()->created_at->format('M. Y')); ?></small>
                                <?php endif; ?>
                            </p>
                        </div>
                        <!-- Menu Footer-->
                        <?php if(auth()->guard()->check()): ?>
                            <div class="user-footer d-flex">
                                <a href="#" class="btn btn-default btn-sm mr-auto">Профиль</a>
                                <a href="#" class="btn btn-default btn-sm"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    Выйти
                                </a>
                                <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
                                    <?php echo csrf_field(); ?>
                                </form>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </nav>

            <!-- Left side column. contains the logo and sidebar -->
            <?php echo $__env->make('profile.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <section class="content">
                    <?php echo $__env->yieldContent('content'); ?>
                </section>
            </div>

            
        </div>
        <!-- jQuery -->
        <script src="<?php echo e(asset('/admin/dist/js/adminlte.js')); ?>"></script>
        <script src="https://cdn.tiny.cloud/1/z2thkm3hu10a32wfgdfpptsorpvoi7ae6389x0lni66xjeei/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>
        <script src="<?php echo e(asset('/admin/plugins/toastr/toastr.min.js')); ?>"></script>
        <script src="<?php echo e(asset('/admin/plugins/daterangepicker/daterangepicker.js')); ?>"></script>
        <script src="<?php echo e(asset('/admin/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js')); ?>"></script>
        <script src="<?php echo e(asset('/packages/barryvdh/elfinder/js/standalonepopup.js')); ?>"></script>
        <script src="<?php echo e(asset('/admin/dist/js/jquery.colorbox-min.js')); ?>"></script>
        <script src="<?php echo e(asset('/assets/js/jquery.inputmask.min.js')); ?>"></script>
        <script src="<?php echo e(asset('/assets/js/main.js')); ?>"></script>
    </body>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal97eb5b161211c0da08650c9299ba5f38)): ?>
<?php $attributes = $__attributesOriginal97eb5b161211c0da08650c9299ba5f38; ?>
<?php unset($__attributesOriginal97eb5b161211c0da08650c9299ba5f38); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal97eb5b161211c0da08650c9299ba5f38)): ?>
<?php $component = $__componentOriginal97eb5b161211c0da08650c9299ba5f38; ?>
<?php unset($__componentOriginal97eb5b161211c0da08650c9299ba5f38); ?>
<?php endif; ?>
</html><?php /**PATH /home/p/payusovs95/anton.prizraks.ru/resources/views/profile/app.blade.php ENDPATH**/ ?>