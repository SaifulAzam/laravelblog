<?php
define('BASE_URL', 'http://localhost:8888')
?>
<!DOCTYPE html>
<!--[if IE 9]><html class="lt-ie10" lang="en" > <![endif]-->
<html class="no-js" lang="en" >
<head>
	<meta charset="utf-8">
	<!-- If you delete this meta tag World War Z will become a reality -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Home</title>
	<!-- load mian css file -->
	<style type="text/css">
	@import url("<?php echo BASE_URL;?>/css/main.css");
	</style>
	<script src="<?php echo BASE_URL;?>/js/vendor/modernizr.js"></script>

	@if(strcmp(Route::getCurrentRoute()->getName(), 'viewBlog') == 0)
	<script src="//cdn.ckeditor.com/4.4.6/basic/ckeditor.js"></script>
	@else
	<script src="//cdn.ckeditor.com/4.4.6/full/ckeditor.js"></script>
	@endif
</head>
<body>
	<div class="wrapper">
		<div class="header-wrapper">
			<header>
				<a href='index.html' style='display: block'>
					<img alt='Sora Article' height='104px; ' id='Header1_headerimg' src="<?php echo BASE_URL;?>/img/logo.png"/>
				</a>
				<div class="small-menu">
					<button href="#" data-dropdown="drop1" aria-controls="drop1" aria-expanded="false" class="button dropdown">Menu</button>
					<ul id="drop1" data-dropdown-content class="f-dropdown" aria-hidden="true" tabindex="-1">
						<li class='menu-item menu-item-type-post_type'><a href='index.html'>Home</a></li>
						<li class='menu-item menu-item-type-post_type'><a href='#'>Works</a></li>
						<li class='menu-item menu-item-type-post_type'><a href='#'>Life</a></li>
						<li class='menu-item menu-item-type-post_type'><a href='#'>Authors</a></li>
						<li class='menu-item menu-item-type-post_type'><a href='#'>Contact</a></li>
					</ul>
				</div>
			</header>
			<!-- navigation -->
			<nav>
				<ul>
					<li><a href='index.html'>Home</a></li>
					<li><a href='#'>Works</a></li>
					<li><a href='#'>Life</a></li>
					<li><a href='#'>Authors</a></li>
					<li><a href='#'>Contact</a></li>
				</ul>
			</nav>
		</div>
		<div class="slider">
			<div>
				<img alt='' src='<?php echo BASE_URL;?>/img/test2.jpg' title=''/>
			</div>
			<div>
				<img alt='' src='<?php echo BASE_URL;?>/img/test3.jpg' title=''/>
			</div>
			<div>
				<img alt='' src='<?php echo BASE_URL;?>/img/test.jpg' title=''/>
			</div>
		</div>
		<div class="row">
			<div class="large-8 medium-6 small-12 columns posts-container">
				@yield('content')
			</div>
			<div class="large-4 medium-6 small-12 columns right-siders">
				@yield('sidebar')
				<div class='widget HTML' id='HTML1'>
					<h2 class='title'>About me</h2>
					<div class='widget-content'>
						<p><img src="#" alt="" /></p>
						<p><strong>My name is John Snow.</strong> I&#8217;m a blogger...</p>
					</div>
					<a class='quickedit' href="#">
						<img alt='' height='18' src='#' width='18'/>
					</a>
				</div>
				<div class='widget HTML' id='HTML2'>
					<h2 class='title'>Social</h2>
					<div class='widget-content'>
						<a class="social-shortcode"  href="#">
							<img border="0" src="#" />
						</a>
						<a class="social-shortcode"  href="#" >
							<img border="0" src="#" />
						</a>
						<a class="social-shortcode"  href="#">
							<img border="0" src="#" />
						</a>
						<a class="social-shortcode"  href="#">
							<img border="0" src="#" />
						</a>
					</div>
					<a class='quickedit' href="#">
						<img alt='' height='18' src="#" width='18'/>
					</a>
				</div>
				<div class='widget HTML' id='HTML5'>
					<h2 class='title'>Facebook</h2>
					<div class='widget-content'>
					</div>
					<a class='quickedit' href="#">
						<img alt='' height='18' src="#" width='18'/>
					</a>
				</div>
				<div class='widget HTML' id='HTML3'>
					<h2 class='title'>Gallery</h2>
					<div class='widget-content'>
						<div class="gdlr-instagram-item-head gdlr-nav-container" >
							<i class="icon-angle-left gdlr-flex-prev"></i>
							<a href="http://instagram.com/" target="_blank">
								<i class="icon-instagram"></i>
							</a>
							<i class="icon-angle-right gdlr-flex-next"></i>
						</div>
						<div class="flexslider" data-type="carousel" data-nav-container="gdlr-instagram-item-wrapper" >
							<ul class="slides" >
							</ul>
						</div>
					</div>
					<a class='quickedit' href="#">
						<img alt='' height='18' src="#" width='18'/>
					</a>
				</div>
			</div>
		</div>

		<footer class="footer-wrapper">
			<div class="footer-container container">

				<div class="clear"></div>
			</div>
			<div class="copyright-wrapper">
				<div class="copyright-container container">
					<div class="copyright-left">
						Copyright © 2014 <a href="http://sora-article-soratemplates.blogspot.in/"> XXXXX </a>
					</div>
					<div class="copyright-right">
						<span id="mycontent" style="visibility: visible;">Designed By <a href="http://www.soratemplates.com/" rel="dofollow" target="_blank" title="Blogger Templates"> </a><a href="http://mybloggerthemes.com/" rel="dofollow" target="_blank" title="Free Blogger Templates">XXXXX</a></span>
					</div>
					<div class="clear"></div>
				</div>
			</div>
		</footer>
	</div>
	<script src="<?php echo BASE_URL;?>/js/vendor/jquery.js"></script>
	<script src="<?php echo BASE_URL;?>/js/foundation.min.js"></script>
	<script type="text/javascript" src="<?php echo BASE_URL;?>/js/slick.js"></script>
	<script>
	$(document).foundation();
	$(document).ready(function(){
		$('.slider').slick({
			infinite: true,
			speed: 500,
			fade: true,
			slide: 'div',
			cssEase: 'linear',
			autoplay: true
		});
	});
	</script>
</body>
</html>