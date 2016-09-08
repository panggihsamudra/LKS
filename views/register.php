<?php 
require_once 'dbuser.php';

$db = new DB();
$user = new User($db);
if (isset($_POST['register'])) {
	$username = $_POST['username'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$level = "user";
	if ($user->register($username, $email, $password, $level)) {
		$messages = '<div style="color:green;">Registrasi Berhasil, Silahkan Login!</div>';	
	}else{ 
		$messages = '<div style="color:red;">Registrasi Gagal, Silahkan Ulangi Lagi!</div>';
	}
}
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Register Web Pariwisata</title>
	<link rel="stylesheet" type="text/css" href="<?php echo TEMP_DIR; ?>/css/style.css">
</head>
<body>
<div class="alert">
	<?php 
	if (isset($messages)) {
		echo $messages;
	}

	 ?>
</div>
<div id="register">
	<a href="<?php echo BASE_URL ?>home"><img src="<?php echo TEMP_DIR; ?>/img/logo.png"></a>
	<h2>Register</h2>
	<form method="POST">
		<input type="text" name="username" placeholder="Username">
		<input type="email" name="email" placeholder="Email">
		<input type="password" name="password" placeholder="Password">
		<input type="submit" name="register" value="Register">
	</form>
	<div class="redir">Sudah Punya Akun? <a href="<?php echo BASE_URL ?>login">Login</a></div>
</div>
</body>
</html>				