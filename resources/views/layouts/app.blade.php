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
	<meta name="description" content="@yield('seo-description')">
	<meta name="keywords" content="@yield('seo-keywords')">
	<meta name="author" content="">
	<title>{{ config('app.name') }} - @yield('title')</title>
  <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
  <link rel="manifest" href="/site.webmanifest">
	<link rel="stylesheet" media="screen" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700">
	<!--<link rel="stylesheet" href="{{asset('/assets/css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{asset('/assets/css/font-awesome.min.css')}}"> 
	<link rel="stylesheet" href="{{asset('/assets/css/bootstrap-theme.css')}}" media="screen"> 
	<link rel="stylesheet" href="{{asset('/assets/css/style.css')}}">
  <link rel='stylesheet' id='camera-css'  href='{{asset('/assets/css/style.css')}}' type='text/css' media='all'> -->
    @vite('resources/css/app.css')
	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	<script src="{{asset('/assets/js/html5shiv.js')}}"></script>
	<script src="{{asset('/assets/js/respond.min.js')}}"></script>
	<![endif]-->
    @if($_SERVER['REQUEST_URI'] != '/')
      <style>body {background-color: rgba(240,240,240,0.7);}</style>
    @endif
</head>
<body>

    <!-- Fixed navbar -->
	<div class="navbar navbar-inverse">
		<div class="nav-edulang container">
			<div class="navbar-header">
				<!-- Button for smallest screens -->
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
				<a class="navbar-brand" href="{{route('home')}}">
					<img src="/assets/images/logo.png" alt="Techro HTML5 template"></a>
			</div>
			<div class="navbar-collapse collapse">
				<ul class="nav navbar-nav pull-right mainNav">
          @foreach($menu as $item)
					  <li {{Request::is($item->link) ? 'class="active"' : ''}}>
              <a href="{{$item->link}}">{{$item->title}}</a>
            </li>
          @endforeach
          <li class="dropdown ml-auto">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Профиль <b class="caret"></b></a>
						<ul class="dropdown-menu">
            @auth
              @if(auth()->user()->hasRole('admin'))
							  <li><a href="{{route('adminpanel')}}">Админ-панель</a></li>
							  <li><a onclick="event.preventDefault(); document.getElementById('logout-form').submit();" href="">Выйти</a></li>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                  @csrf
                </form>
              @else
              	<li><a href="{{route('profiles')}}">Личный кабинет</a></li>
							  <li><a onclick="event.preventDefault(); document.getElementById('logout-form').submit();" href="">Выйти</a></li>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                  @csrf
                </form>
              @endif
            @else
                <li><a href="{{route('login')}}">Авторизация</a></li>
							  <li><a href="{{route('register')}}">Регистрация</a></li>
            @endauth
						</ul>
          </li>
				</ul>
			</div>
			<!--/.nav-collapse -->
		</div>
	</div>
	<!-- /.navbar -->

  @if(route('home') && $_SERVER['REQUEST_URI'] == '/')
	<!-- Header -->
	<header id="head">
        <div class="container">
            <div class="heading-text-first heading-text">							
                <h1 class="animated flipInY delay1">Начни изучать английский онлайн</h1>
                <p>Онлайн обучение помогает учиться в независимости вашей локации</p>
            </div>
            <div class="fluid_container">                    
                <div class="camera_wrap camera_emboss pattern_1" id="camera_wrap_4">
                    @foreach($banners as $banner)
                      <div data-thumb="{{$banner->img}}" data-src="{{$banner->img}}" style="z-index:1;">
                        <div class="heading-text" style="z-index: 1000;color: #fff;opacity:1;">
                          <h2>{{$banner->name}}</h2>
                          <p>{!!$banner->text !!}</p>
                        </div>
                      </div> 
                    @endforeach
                    {{-- <div data-thumb="{{asset('/assets/images/slides/thumbs/img2.jpg')}}" data-src="{{asset('/assets/images/slides/img2.jpg')}}">
                    </div>
                    <div data-thumb="{{asset('/assets/images/slides/thumbs/img3.jpg')}}" data-src="{{asset('/assets/images/slides/img3.jpg')}}">
                    </div>  --}}
                </div><!-- #camera_wrap_3 -->
            </div><!-- .fluid_container -->
        </div>
	</header>
	<!-- /Header -->
  @endif
    <main class="content">
      @yield('content')
    </main>
    <footer id="footer">
      {{-- <div class="container">
        <div class="row">
          <div class="footerbottom">
            <div class="col-md-3 col-sm-6">
              <div class="footerwidget">
                <h4>
                  Course Categories
                </h4>
                <div class="menu-course">
                  <ul class="menu">
                    <li><a href="#">
                        List of Technology 
                      </a>
                    </li>
                    <li><a href="#">
                        List of Business
                      </a>
                    </li>
                    <li><a href="#">
                        List of Photography
                      </a>
                    </li>
                    <li><a href="#">
                      List of Language
                      </a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="col-md-3 col-sm-6">
              <div class="footerwidget">
                <h4>
                  Products Categories
                </h4>
                <div class="menu-course">
                  <ul class="menu">
                    <li> <a href="#">
                        Individual Plans  </a>
                    </li>
                    <li><a href="#">
                        Business Plans
                      </a>
                    </li>
                    <li><a href="#">
                        Free Trial
                      </a>
                    </li>
                    <li><a href="#">
                        Academic
                      </a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="col-md-3 col-sm-6">
              <div class="footerwidget">
                <h4>
                  Browse by Categories
                </h4>
                <div class="menu-course">
                  <ul class="menu">
                    <li><a href="#">
                        All Courses
                      </a>
                    </li>
                    <li> <a href="#">
                        All Instructors
                      </a>
                    </li>
                    <li><a href="#">
                        All Members
                      </a>
                    </li>
                    <li>
                      <a href="#">
                        All Groups
                      </a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="col-md-3 col-sm-6"> 
              <div class="footerwidget"> 
                <h4>Контакты</h4> 
                <p>Здесь наши контактные данные</p>
                <div class="contact-info"> 
                  <i class="fa fa-map-marker"></i> Kerniles 416  - United Kingdom<br>
                  <i class="fa fa-phone"></i>+00 123 156 711 <br>
                  <i class="fa fa-envelope-o"></i> youremail@email.com
                </div> 
              </div>
            </div>
          </div>
        </div>
        <div class="social text-center">
          <a href="#"><i class="fa fa-twitter"></i></a>
          <a href="#"><i class="fa fa-facebook"></i></a>
          <a href="#"><i class="fa fa-dribbble"></i></a>
          <a href="#"><i class="fa fa-flickr"></i></a>
          <a href="#"><i class="fa fa-github"></i></a>
        </div>
        <div class="clear"></div>
      </div> --}}
      <div class="footer2">
        <div class="container">
          <div class="row">

            <div class="col-md-6 panel">
              <div class="panel-body">
                <p class="simplenav">
                  @foreach($menu as $item)
                    <a href="{{$item->link}}">{{$item->title}}</a> |
                  @endforeach
                </p>
              </div>
            </div>

            <div class="col-md-6 panel">
              <div class="panel-body">
                <p class="text-right">
                  Все права защищены &copy; {{date('Y')}}.
                </p>
              </div>
            </div>

          </div>
          <!-- /row of panels -->
        </div>
      </div>
    </footer>

	<!-- JavaScript libs are placed at the end of the document so the pages load faster -->
	<script src="{{asset('/assets/js/modernizr-latest.js')}}"></script> 
	<script type='text/javascript' src='{{asset('/assets/js/jquery.min.js')}}'></script>
  <script type='text/javascript' src='{{asset('/assets/js/fancybox/jquery.fancybox.pack.js')}}'></script>
  <script type='text/javascript' src='{{asset('/assets/js/jquery.mobile.customized.min.js')}}'></script>
  <script type='text/javascript' src='{{asset('/assets/js/jquery.easing.1.3.js')}}'></script> 
  <script type='text/javascript' src='{{asset('/assets/js/camera.min.js')}}'></script> 
  <script src="{{asset('/assets/js/bootstrap.min.js')}}"></script> 
	<script src="{{asset('/assets/js/custom.js')}}"></script>
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
</html>