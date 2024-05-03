<?php
  if (empty($menu)) {
    $menu = App\Models\Main_menu::all();
  }
?>
<!DOCTYPE html>
<html lang="ru">
<head>
  <style>#head img {width: 100%; height: 100%; object-fit: cover;} </style>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="<?php echo $__env->yieldContent('seo-description'); ?>">
	<meta name="keywords" content="<?php echo $__env->yieldContent('seo-keywords'); ?>">
	<meta name="author" content="">
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
    <?php echo app('Illuminate\Foundation\Vite')('resources/css/app.css'); ?>
	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	<script src="<?php echo e(asset('/assets/js/html5shiv.js')); ?>"></script>
	<script src="<?php echo e(asset('/assets/js/respond.min.js')); ?>"></script>
	<![endif]-->
    <?php if($_SERVER['REQUEST_URI'] != '/'): ?>
      <style>body {background-color: rgba(240,240,240,0.7);}</style>
    <?php endif; ?>
</head>
<body>

    <!-- Fixed navbar -->
	<div class="navbar navbar-inverse">
		<div class="nav-edulang container">
			<div class="navbar-header">
				<!-- Button for smallest screens -->
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
				<a class="navbar-brand" href="<?php echo e(route('home')); ?>">
					<img src="/assets/images/logo.png" alt="Techro HTML5 template"></a>
			</div>
			<div class="navbar-collapse collapse">
				<ul class="nav navbar-nav pull-right mainNav">
          <?php $__currentLoopData = $menu; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					  <li <?php echo e(Request::is($item->link) ? 'class="active"' : ''); ?>>
              <a href="<?php echo e($item->link); ?>"><?php echo e($item->title); ?></a>
            </li>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          <li class="dropdown ml-auto">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Профиль <b class="caret"></b></a>
						<ul class="dropdown-menu">
            <?php if(auth()->guard()->check()): ?>
              <?php if(auth()->user()->hasRole('admin')): ?>
							  <li><a href="<?php echo e(route('adminpanel')); ?>">Админ-панель</a></li>
							  <li><a onclick="event.preventDefault(); document.getElementById('logout-form').submit();" href="">Выйти</a></li>
                <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
                  <?php echo csrf_field(); ?>
                </form>
              <?php else: ?>
              	<li><a href="<?php echo e(route('profiles')); ?>">Личный кабинет</a></li>
							  <li><a onclick="event.preventDefault(); document.getElementById('logout-form').submit();" href="">Выйти</a></li>
                <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
                  <?php echo csrf_field(); ?>
                </form>
              <?php endif; ?>
            <?php else: ?>
                <li><a href="<?php echo e(route('login')); ?>">Авторизация</a></li>
							  <li><a href="<?php echo e(route('register')); ?>">Регистрация</a></li>
            <?php endif; ?>
						</ul>
          </li>
				</ul>
			</div>
			<!--/.nav-collapse -->
		</div>
	</div>
	<!-- /.navbar -->

  <?php if(route('home') && $_SERVER['REQUEST_URI'] == '/'): ?>
	<!-- Header -->
	<header id="head">
        <div class="container">
            <div class="heading-text-first heading-text">							
                <h1 class="animated flipInY delay1">Начни изучать английский онлайн</h1>
                <p>Онлайн обучение помогает учиться в независимости вашей локации</p>
            </div>
            <div class="fluid_container">                    
                <div class="camera_wrap camera_emboss pattern_1" id="camera_wrap_4">
                    <?php $__currentLoopData = $banners; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $banner): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <div data-thumb="<?php echo e($banner->img); ?>" data-src="<?php echo e($banner->img); ?>" style="z-index:1;">
                        <div class="heading-text" style="z-index: 1000;color: #fff;opacity:1;">
                          <h2><?php echo e($banner->name); ?></h2>
                          <p><?php echo $banner->text; ?></p>
                        </div>
                      </div> 
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    
                </div><!-- #camera_wrap_3 -->
            </div><!-- .fluid_container -->
        </div>
	</header>
	<!-- /Header -->
  <?php endif; ?>
    <main class="content">
      <?php echo $__env->yieldContent('content'); ?>
    </main>
    <footer id="footer">
      
      <div class="footer2">
        <div class="container">
          <div class="row">

            <div class="col-md-6 panel">
              <div class="panel-body">
                <p class="simplenav">
                  <?php $__currentLoopData = $menu; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <a href="<?php echo e($item->link); ?>"><?php echo e($item->title); ?></a> |
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </p>
              </div>
            </div>

            <div class="col-md-6 panel">
              <div class="panel-body">
                <p class="text-right">
                  Все права защищены &copy; <?php echo e(date('Y')); ?>.
                </p>
              </div>
            </div>

          </div>
          <!-- /row of panels -->
        </div>
      </div>
    </footer>

	<!-- JavaScript libs are placed at the end of the document so the pages load faster -->
	<script src="<?php echo e(asset('/assets/js/modernizr-latest.js')); ?>"></script> 
	<script type='text/javascript' src='<?php echo e(asset('/assets/js/jquery.min.js')); ?>'></script>
  <script type='text/javascript' src='<?php echo e(asset('/assets/js/fancybox/jquery.fancybox.pack.js')); ?>'></script>
  <script type='text/javascript' src='<?php echo e(asset('/assets/js/jquery.mobile.customized.min.js')); ?>'></script>
  <script type='text/javascript' src='<?php echo e(asset('/assets/js/jquery.easing.1.3.js')); ?>'></script> 
  <script type='text/javascript' src='<?php echo e(asset('/assets/js/camera.min.js')); ?>'></script> 
  <script src="<?php echo e(asset('/assets/js/bootstrap.min.js')); ?>"></script> 
	<script src="<?php echo e(asset('/assets/js/custom.js')); ?>"></script>
    <script>
      jQuery(function(){
        
        jQuery('#camera_wrap_4').camera({
          transPeriod: 500,
          time: 3000,
          height: '600',
          loader: 'false',
          pagination: true,
          thumbnails: false,
          hover: false,
          playPause: false,
          navigation: false,
          opacityOnGrid: false,
          imagePath: 'assets/images'
        });

        setTimeout(() => {
          jQuery('.heading-text-first').fadeOut();
        },1000);

      });
	</script>
</body>
</html><?php /**PATH /home/p/payusovs95/anton.prizraks.ru/resources/views/layouts/app.blade.php ENDPATH**/ ?>