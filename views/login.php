<?php 


$db = new DB();
$user = new User($db);
	
if (isset($_POST['login'])) {
	$username = $_POST['username'];
	$password = $_POST['password'];
	if ($user->login($username, $password)) {
		switch ($_SESSION['level']) {
			case 'admin':
				header("location:user/index.php");
				break;
			
			default:
				header("location:index.php");				
				break;
		}
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Login Web Pariwisata</title>
	<link rel="stylesheet" type="text/css" href="<?php echo TEMP_DIR; ?>/css/style.css">
</head>
<body>
<div class="alert"></div>
<div id="register">
	<a href="<?php echo BASE_URL; ?>home"><img src="<?php echo TEMP_DIR; ?>/img/logo.png"></a>
	<h2>Login</h2>
	<form method="POST">
		<input type="text" name="username" placeholder="Username">
		<input type="password" name="password" placeholder="Password">
		<input type="submit" name="login" value="Login">
	</form>
	<div class="redir">Belum Punya Akun? <a href="<?php echo BASE_URL ?>register">Daftar</a></div>
</div>
</body>
</html>				