<?php $__env->startSection('title', 'Авторизация'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="<?php echo $__env->yieldContent('seo-description'); ?>">
	<meta name="keywords" content="<?php echo $__env->yieldContent('seo-keywords'); ?>">
	<meta name="author" content="Prizraks">
	<title><?php echo e(config('app.name')); ?> - <?php echo $__env->yieldContent('title'); ?></title>
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
	<link rel="stylesheet" media="screen" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700">
	<!--<link rel="stylesheet" href="<?php echo e(asset('/assets/css/bootstrap.min.css')); ?>">
	<link rel="stylesheet" href="<?php echo e(asset('/assets/css/font-awesome.min.css')); ?>"> 
	<link rel="stylesheet" href="<?php echo e(asset('/assets/css/bootstrap-theme.css')); ?>" media="screen"> 
	<link rel="stylesheet" href="<?php echo e(asset('/assets/css/style.css')); ?>">
    <link rel='stylesheet' id='camera-css'  href='<?php echo e(asset('/assets/css/style.css')); ?>' type='text/css' media='all'> -->
    <?php echo app('Illuminate\Foundation\Vite')('resources/sass/app.scss'); ?>
	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	<script src="<?php echo e(asset('/assets/js/html5shiv.js')); ?>"></script>
	<script src="<?php echo e(asset('/assets/js/respond.min.js')); ?>"></script>
	<![endif]-->
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
    <body class="hold-transition login-page">
        <div class="login-box">
            <div class="login-logo">
                <a href="<?php echo e(url('/')); ?>"><b><?php echo e(config('app.name')); ?></b></a>
            </div>
            <!-- /.login-logo -->

            <!-- /.login-box-body -->
            <div class="card">
                <div class="card-body login-card-body">
                    <p class="login-box-msg">Авторизуйтесь для начала исплоьзования платформы</p>
                    <form method="post" action="<?php echo e(url('/login')); ?>">
                        <?php echo csrf_field(); ?>
                        <div class="input-group mb-3">
                            <input type="email" name="email" value="<?php echo e(old('email')); ?>" placeholder="Email"
                                class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                            <div class="input-group-append">
                                <div class="input-group-text"><span class="fas fa-envelope"></span></div>
                            </div>
                            <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="error invalid-feedback"><?php echo e($message); ?></span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <div class="input-group mb-3">
                            <input type="password" name="password" placeholder="Password"
                                class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                            <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="error invalid-feedback"><?php echo e($message); ?></span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                        </div>

                        <div class="row">
                            <div class="col-8">
                                <div class="icheck-primary">
                                    <input type="checkbox" id="remember">
                                    <label for="remember">Запомнить меня</label>
                                </div>
                            </div>

                            <div class="col-4">
                                <button type="submit" class="btn btn-primary btn-block">Войти</button>
                            </div>

                        </div>
                    </form>

                    <p class="mb-1">
                        <a href="<?php echo e(route('password.request')); ?>">Забыли пароль?</a>
                    </p>
                    <p class="mb-0">
                        <a href="<?php echo e(route('register')); ?>" class="text-center">Впервые на платформе?</a>
                    </p>
                </div>
                <!-- /.login-card-body -->
            </div>

        </div>
        <!-- /.login-box -->
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
<?php endif; ?><?php /**PATH /home/p/payusovs95/anton.prizraks.ru/resources/views/auth/login.blade.php ENDPATH**/ ?>