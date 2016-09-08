<?php 
require_once 'db.php';
require_once 'dbuser.php';

$db = new DB();
$user = new User($db);

$data = $db->shows("SELECT * FROM user");

if (isset($_POST['register'])) {
	$username = $_POST['username'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$level = "admin";
	if ($user->register($username, $email, $password, $level)) {
		$messages = '<div style="color:green;">Registrasi Berhasil, Silahkan Login!</div>';	
	}else{ 
		$messages = '<div style="color:red;">Registrasi Gagal, Silahkan Ulangi Lagi!</div>';
	}
}
 ?>
<?php $halaman="user" ?>
<?php require_once 'header-admin.php' ?>
<div id="konten">
	<div class="container">
		<div class="konten">
			<div class="inkonten">	
				<div class="dashboard">
					<div class="manage">
						<div class="manage-admin">
						<form method="POST">
							<h2>Kategori</h2>
							<input type="text" name="username" placeholder="Username">
							<input type="email" name="email" placeholder="Email">
							<input type="password" name="password" placeholder="Password">
							<input type="submit" name="register" value="Tambah Admin">
						</form>
						</div>
						<h2>Manage User</h2>
						<p>This is your dashboard, let’s start by adding an article</p>
						<table>
							<tr>
								<th>Username</th>
								<th>Email</th>
								<th>Password</th>
								<th>Level</th>
								<th style="width:140px;">Aksi</th>
							</tr>
							<?php foreach ($data as $datas): ?>
							<tr>
								<td><?php echo $datas['username']; ?></td>
								<td><?php echo $datas['email']; ?></td>
								<td><?php echo $datas['password']; ?></td>
								<td><?php echo $datas['level']; ?></td>
								<td>
									<li><a href="#" class="delete">Delete</a></li>
									<li><a href="#" class="update1">Update</a></li>
								</td>
							</tr>
							<?php endforeach; ?>
						</table>
					</div>
				</div>		
			</div>		
		</div>
	</div>
<?php require_once 'footer.php' ?>
