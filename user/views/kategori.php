<?php $halaman = "kategori" ?>
<?php require_once 'header-admin.php' ?>
<?php 
	
	require_once 'db.php';
	$db = new DB();
	if (isset($_POST['submit'])) {
		$kategori = $_POST['kategori'];
		$db->add("INSERT INTO kategori (judul) VALUES (?)", [$kategori]);
	}

	$data = $db->shows("SELECT * FROM kategori");
?>
<div id="konten">
	<div class="container">
		<div class="konten">
			<div class="inkonten">	
				<div class="dashboard">
					<div class="manage">
						<div class="manage-admin">
						<form method="POST">
							<h2>Tambah Kategori</h2>
							<input type="text" name="kategori" placeholder="Kategori">
							<input type="submit" name="submit" value="Tambah Kategori">
						</form>
						</div>
						<h2>Manage Kategori</h2>
						<p>This is your dashboard, let’s start by adding an article</p>
						<table>
							<tr>
								<th>Kategori</th>
								<th style="width:140px;">Aksi</th>
							</tr>
							<?php foreach ($data as $datas): ?>
							<tr>
								<td><?php echo $datas['judul']; ?></td>
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