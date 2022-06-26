<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title><?php bloginfo('name'); wp_title();?></title>
		<meta name="viewport" content="width=device-width,initial-scale=1">
		<link href='//fonts.googleapis.com/css?family=Carrois+Gothic+SC' rel='stylesheet' type='text/css'>
	  <?php wp_head(); ?>
	</head>
	<body>
		<!-- Start-wrap -->
        <!-- Start-Header-->
			<div class="header">
				<div class="wrap">
				<!-- Start-logo-->
				<div class="logo">
					<a href="<?php echo home_url(); ?>"><img src="<?php bloginfo("template_url")?>/images/logo.png" title="logo" /></a>
				</div>
                <!-- End-Logo-->
                <!-- Start-Header-nav-->
				<div class="clear"> </div>
                <!-- End-Header-nav-->
			</div>
			</div>
			<div class="header-nav1">
			<div class="wrap">
			  <?php wp_nav_menu(['theme_location' => 'menu', 'container'=> false]) ?>
<!--					<ul>-->
<!--						<li class="current"><a href="index.html">Главная</a></li>-->
<!--						<li><a href="#">О нас</a></li>-->
<!--						<li><a href="contact.html">Контакты</a></li>-->
<!--					</ul>-->
				<div class="search-bar">
					  <form class="search-main" action="<?php echo home_url('/')?>">
							<ul class="search__form--my">
								<li><input type="text" name="s" id="s"></li>
								<li><input type="submit"  value=""></li>
							</ul>
					  </form>
				</div>
				</div>
			  <!-- End-Header-->
			<div class="clear"> </div>
			</div>
