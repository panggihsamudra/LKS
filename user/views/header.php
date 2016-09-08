<?php @session_start() ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Pariwisata Jawa Tengah</title>
	<link rel="stylesheet" type="text/css" href="<?php echo TEMP_DIR ?>/css/style.css">
	<script type="text/javascript" src="js/jquery-2.0.1.js"></script>
</head>
<body>
<div id="header">
	<div class="container">
		<img src="<?php res('/img/logo.png');?>" class="logo">
		<ul>
			<li><a href="#"><img src="<?php echo TEMP_DIR; ?>/img/facebook.png"></a></li>
			<li><a href="#"><img src="<?php echo TEMP_DIR; ?>/img/instagram.png"></a></li>
			<li><a href="#"><img src="<?php echo TEMP_DIR; ?>/img/rss.png"></a></li>
			<li><input type="search" name="" placeholder="pencarian"></li>
		</ul>
	</div>
</div>
<div id="navigasi">
	<div class="container">
		<ul class="menu">
			<li <?php if($data["pages"] == 'dashboard') echo 'class="active"'; ?>><a href="dashboard.php">Dashboard</a></li>
			<li <?php if($data["pages"] == 'user') echo 'class="active"'; ?>><a href="user.php">Manage User</a></li>
			<li <?php if($data["pages"] == 'artikel') echo 'class="active"'; ?>><a href="manage-artikel.php">Manage Artikel</a></li>
			<li <?php if($data["pages"] == 'kategori') echo 'class="active"'; ?>><a href="kategori.php">Manage Kategori</a></li>
			<li <?php if($data["pages"] == 'book') echo 'class="active"'; ?>><a href="guestbook.php">Guest Book</a></li>
		</ul>
		<ul class="menu1">
			<?php if (isset($_SESSION['user_session'])) { ?>
				<li class="register"><a href="logout.php">Lihat Web</a></li>
				<li><a href="logout.php" class="login">Logout</a></li>
			<?php } else{ ?>
			<li class="register"><a href="register.php">Register</a></li>
			<li><a href="login.php" class="login">Login</a></li>
			<?php } ?>
		</ul>
	</div>
</div>