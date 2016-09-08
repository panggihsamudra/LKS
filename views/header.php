
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title><?php echo $data["title"]; ?></title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="Storage, Cloud, Computing, Free" />
	<meta name="description" content="Flashcloud is cloud services" />
	<meta name="author" content="Afnizar Hilmi Nur Ghifari" />
	<link rel="stylesheet" type="text/css" href="<?php echo TEMP_DIR; ?>/css/style.css">
	<link rel="stylesheet" type="text/css" href="<?php echo TEMP_DIR; ?>/css/tabs.css">
	<script type="text/javascript" src="<?php echo TEMP_DIR; ?>/js/jquery-2.0.1.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			/*
			$(".tautan").click(function(){
				$('.widget h2.bb').css({
					'background-color':'#55c768'					
				});
				$('.widget h2.bb').find('a').attr('style','color:#fff');
				$('.widget h2.aa').css({
					'background-color':'#fff'					
				});
				$('.widget h2.aa').find('a').attr('style','color:#55c768 !important');
				$(".layanan1").hide();
				$(".tautan1").show();
			});
			$(".layanan").click(function(){
				$('.widget h2.aa').css({
					'background-color':'#55c768'					
				});
				$('.widget h2.aa').find('a').attr('style','color:#fff');
				$('.widget h2.bb').css({
					'background-color':'#fff'					
				});
				$('.widget h2.bb').find('a').attr('style','color:#55c768 !important');
				
				$(".layanan1").show();
				$(".tautan1").hide();

			});*/
			$(document).on('click','ul.tabs li',function(){
				var tab_id = $(this).attr('data-tab');
				$('ul.tabs li').removeClass('current');
				$('.tab-content').removeClass('current');
				$(this).addClass('current');
				$("#"+tab_id).addClass('current');
			});

		});
	</script>
</head>
<body>
<div id="header">
	<div class="container">
		<img src="<?php echo TEMP_DIR; ?>/img/logo.png" class="logo">
		<ul>
			<li><a href="#"><img src="<?php echo TEMP_DIR; ?>/img/facebook.png"></a></li>
			<li><a href="#"><img src="<?php echo TEMP_DIR; ?>/img/instagram.png"></a></li>
			<li><a href="#"><img src="<?php echo TEMP_DIR; ?>/img/rss.png"></a></li>
			<li>
				<form method="POST" action="<?php echo BASE_URL ?>result">
					<input type="search" name="pages" placeholder="pencarian">
				</form>
			</li>
		</ul>
	</div>
</div>

<div id="navigasi">
	<div class="container">
		<ul class="menu">
			<li <?php if(@$halaman == 'home') echo 'class="active"'; ?>><a href="<?php echo BASE_URL ?>home">Home</a></li>
			<li <?php if(@$halaman == 'about') echo 'class="active"'; ?>><a href="<?php echo BASE_URL ?>about">About</a></li>
			<li <?php if(@$halaman == 'galeri') echo 'class="active"'; ?>><a href="<?php echo  BASE_URL ?>galeri">Galeri</a></li>
			<li><a href="#">Umum</a></li>
			<li <?php if(@$halaman == 'kontak') echo 'class="active"'; ?>><a href="<?php echo BASE_URL ?>kontak">Kontak</a></li>
		</ul>
		<ul class="menu1">
			<?php if (isset($_SESSION['user_session'])) { ?>
				<li><a href="<?php echo BASE_URL; ?>logout" class="login">Logout</a></li>

			<?php } else{ ?>
			<li class="register"><a href="<?php echo BASE_URL ?>register">Register</a></li>
			<li><a href="<?php echo BASE_URL ?>login" class="login">Login</a></li>
			<?php } ?>
		</ul>
	</div>
</div>