
<?php 

	$db = new DB();
	if (isset($_POST['kirim'])) {
		$tmp = $_FILES['image']['tmp_name'];
		$image = $_FILES['image']['name'];
		move_uploaded_file($tmp, "img/artikel/".$image);

		$judul = $_POST['judul'];
		$tanggal = $_POST['tanggal'];
		$kategori = $_POST['kategori'];
		$jenis = $_POST['jenis'];
		$isi = $_POST['isi'];
		$db->add("INSERT INTO artikel (judul, `tanggal, image, kategori, jenis, isi) VALUES (?,?,?,?,?,?)", [$judul, $tanggal, $image, $kategori, $jenis, $isi]);
	}


?>
<div id="konten">
	<div class="container">
		<div class="konten">
			<div class="inkonten">	
				<div class="left">
					<div class="artikel">
						<div class="dashboard">						
							<h2>Tambah Artikel</h2>
							<p>This is your dashboard, let’s start by adding an article</p>
							<form method="POST" enctype="multipart/form-data">
								<input type="text" name="judul" placeholder="Judul Artikel" minlength="6">
								<input type="hidden" name="tanggal" value="<?php echo date("d/m/Y"); ?>">
								<input type="file" name="image">
								<select name="kategori">
									<option value="">Kategori</option>
									<option value="Wisata Bahari">Wisata Bahari</option>
									<option value="Wisata Kuliner">Wisata Kuliner</option>
									<option value="Wisata Alam">Wisata Alam</option>
									<option value="Wisata Air">Wisata Air</option>
								</select>
								<select name="jenis">
									<option value="">Jenis Artikel</option>
									<option value="Header">Header</option>
									<option value="Konten">Konten</option>
								</select>
								<textarea placeholder="Isi Artikel" name="isi"></textarea>
								<input type="submit" name="kirim" value="KIRIM">
							</form>
						</div>		
					</div>
				</div>
				<div class="right">
					<div class="inright">
						<div class="widget">
							<h2 class="welcome">Selamat Datang Admin!</h2>
							<ul>
								<li><a href="#">Tambah Artikel</a></li>
								<li><a href="#">Statistik</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>		
		</div>
	</div>
