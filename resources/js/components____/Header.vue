<template>
	<!-- Fixed navbar -->
	<div class="navbar navbar-inverse">
		<div class="container">
			<div class="navbar-header">
				<!-- Button for smallest screens -->
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
				<a class="navbar-brand" href="index.html">
					<img :src="../storage/images/logo.png" alt="Techro HTML5 template"></a>
			</div>
			<div class="navbar-collapse collapse">
				<ul class="nav navbar-nav pull-right mainNav">
					<li class="active"><a href="index.html">Home</a></li>
					<li><a href="">About</a></li>
					<li><a href="">Courses</a></li>
					<li><a href="">Price</a></li>
					<li><a href="">Videos</a></li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">Pages <b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li><a href="sidebar-right.html">Right Sidebar</a></li>
							<li><a href="#">Dummy Link1</a></li>
							<li><a href="#">Dummy Link2</a></li>
							<li><a href="#">Dummy Link3</a></li>
						</ul>
					</li>
					<li><a href="">Contact</a></li>
				</ul>
			</div>
			<!--/.nav-collapse -->
		</div>
	</div>
	<!-- /.navbar -->

	<!-- Header -->
	<header id="head">
		<div class="container">
             <div class="heading-text">
                <h1 class="animated flipInY delay1">Start Online Education</h1>
                <p>Free Online education template for elearning and online education institute.</p>
            </div>
            <div class="fluid_container">
                <div class="camera_wrap camera_emboss pattern_1" id="camera_wrap_4">
                    <div data-thumb="../storage/images/slides/thumbs/img1.jpg" data-src="../storage/images/slides/img1.jpg">
                        <h2>We develop.</h2>
                    </div>
                    <div data-thumb="../storage/images/slides/thumbs/img2.jpg" data-src="../storage/images/slides/img2.jpg">
                    </div>
                    <div data-thumb="../storage/images/slides/thumbs/img3.jpg" data-src="../storage/images/slides/img3.jpg">
                    </div>
                </div><!-- #camera_wrap_3 -->
            </div><!-- .fluid_container -->
		</div>
	</header>
	<!-- /Header -->
</template>
<script>
    export default {
        mounted() {
            console.log('Component mounted header.')
        }
    }
</script>
