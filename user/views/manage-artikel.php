<?php $halaman = "artikel" ?>
<?php require_once 'header-admin.php' ?>
<?php 
	
	require_once 'db.php';
	$db = new DB();
	$data = $db->shows("SELECT * FROM artikel");

 ?>
<div id="konten">
	<div class="container">
		<div class="konten">
			<div class="inkonten">	
				<div class="dashboard">
					<div class="manage">
						<h2>Manage Artikel</h2>
						<p>This is your dashboard, let’s start by adding an article</p>
						<table>
							<tr>
								<th>Judul Artikel</th>
								<th>Tanggal</th>
								<th>Kategori</th>
								<th>Jenis Artikel</th>
								<th style="width:140px;">Aksi</th>
							</tr>
							<?php foreach ($data as $datas): ?>
							<tr>
								<td><?php echo $datas['judul']; ?></td>
								<td><?php echo $datas['tanggal']; ?></td>
								<td><?php echo $datas['kategori']; ?></td>
								<td><?php echo $datas['jenis']; ?></td>
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
