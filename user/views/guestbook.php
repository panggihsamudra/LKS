<?php $halaman = "book" ?>
<?php require_once 'header-admin.php' ?>
<?php 
	
	require_once 'db.php';
	$db = new DB();

	$data = $db->shows("SELECT * FROM book");
?>
<div id="konten">
	<div class="container">
		<div class="konten">
			<div class="inkonten">	
				<div class="dashboard">
					<div class="manage">
						<h2>Manage Guest Book</h2>
						<p>This is your dashboard, let’s start by adding an article</p>
						<table>
							<tr>
								<th>Nama</th>
								<th>Email</th>
								<th>Isi</th>
								<th style="width:140px;">Aksi</th>
							</tr>
							<?php foreach ($data as $datas): ?>
							<tr>
								<td><?php echo $datas['nama']; ?></td>
								<td><?php echo $datas['email']; ?></td>
								<td><?php echo $datas['isi']; ?></td>
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
