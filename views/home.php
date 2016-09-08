<?php $halaman = "home" ?>
<?php 
	$db = new DB;

	$banyakData = $db->show("SELECT count(id) FROM artikel")[0];
	/*@$page = ((int)$_GET['page']) > 0 ? $_GET['page'] : 1;*/
	$page = ((int)$data['paging']) > 0 ? $data['paging'] : 1;
	$limit = 4;
	$mulai_dari = $limit * ($page - 1);
	$artikel = $db->shows("SELECT * FROM artikel ORDER BY id DESC LIMIT $mulai_dari, $limit");

	$update = $db->shows("SELECT * FROM artikel LIMIT 3");

	#RANDOM POST
	$random = $db->shows("SELECT * FROM artikel order by rand() LIMIT 4");

	#TAMBAH POLLING
	if (isset($_POST['voting'])) {
		$polling = $_POST['polling'];
		$db->add("INSERT INTO polling (polling) VALUES (?)", [$polling]);
	}

	$datapolling = $db->shows("SELECT polling, count(id) jml FROM polling group by polling");
	foreach ($datapolling as $datapollings) {
		switch ($datapollings['polling']) {
			case 'Sangat Bagus':
				$sangat = $datapollings['jml'];
				break;
			case 'Bagus':
				$bagus = $datapollings['jml'];
				break;
			
			default:
				$kurang = $datapollings['jml'];
				break;
		}
	}

	#KATEGORI
	$kategori = $db->shows("SELECT * FROM kategori");

	# VISITOR
	// Ambil Informasi Yang diperlukan dari Pengunjung
	$ipaddress = $_SERVER['REMOTE_ADDR']."";
	$tanggal = date('Y-m-d');
	$kunjungan = 1;
	// Daftarkan KedalamD Session Lalu Simpan Ke Database

	if (isset($_SESSION['visitor'])){
		$_SESSION['visitor'] = $ipaddress;
		$db->add("INSERT INTO visitor (tanggal,counter,ip_adress) VALUES (?,?,?)", [$tanggal,$kunjungan,$ipaddress]);
	}
	// Hitung Jumlah Visitor
	$hari_ini  = $db->show('SELECT sum(counter) AS hari_ini FROM visitor WHERE tanggal="'.date("Y-m-d").'"');


	# POPULAR POST
	$populars = $db->shows("SELECT * FROM artikel order by counter DESC LIMIT 3");

 ?>
<div id="banner">
	<div class="container">
		<div class="wrapper-banner">
			<div class="inbanner">
				<h1>Tempat Pariwisata Terindah Di Jawa Tengah</h1>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
				quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
				consequat. Duis aute irure dolor in</p>
				<a href="artikel.php" class="btn">Read More</a>

			</div>
		</div>
	</div>
</div>
<div id="update">
	<div class="container update">
		<h3>BERITA TERUPDATE</h3>
		<p style="width:800px;">
				<marquee>
				berjalan>		
				</marquee>
		</p>
	</div>
</div>
<div id="konten">
	<div class="container">
		<div class="konten">
			<div class="left">
				<?php foreach ($artikel as $artikels): ?>
				<div class="post">
					<div class="img-post" style="background-image:url(<?php echo TEMP_DIR; ?>/img/artikel/<?php echo $artikels['image']; ?>)"></div>
					<div class="inpost">
						<h2><a href="<?php echo BASE_URL ?>artikel/<?php echo $artikels['id']; ?>"><?php echo $artikels['judul']; ?></a></h2>
						<p><?php echo substr($artikels['isi'], 0,170); ?></p>
						<div class="metapost">
							<ul>
								<li>Komentar : 10</li>
								<li>Tanggal : <?php echo $artikels['tanggal']; ?></li>
							</ul>
						</div>
					</div>
				</div>
				<?php endforeach; ?>
				<div class="pagination">
					<center>
						<ul>
							<?php 
								@$banyakHalaman = ceil($banyakData/$limit);
								for ($i=1; $i <= $banyakHalaman; $i++) { 
									if ($page != $i) {
										echo '<li><a href="'.BASE_URL.'page/'.$i.'">'.$i.'</a></li>';
									}else{
										echo '<li><a>'.$i.'</a></li>';	
									}
								}
							?>
						</ul>
					</center>
				</div>
			</div>
			<div class="right">
				<div class="inright">
					<div id="link" class="widget">
						<!--
						<ul class="tab">
							<li ><h2 class="bb"><a href="#update" class="tautan">TAUTAN</a></h2></li>
							<li ><h2 class="aa"><a href="#update" class="layanan">LAYANAN</a></h2></li>
						</ul>
						<div class="isi">
							<div class="tautan1">
								<ul>
									<li><a href="#">M-Edukasi (Mobila Edukasi)</a></li>
									<li><a href="#">Rumah Belajar</a></li>
									<li><a href="#">Televisi Edukasi</a></li>
								</ul>
							</div>
							<div class="layanan1">
								<ul>
									<li><a href="#">Dinas Pendidikan</a></li>
									<li><a href="#">Pendidikan Gratis</a></li>
									<li><a href="#">Beasiswa Luar Negeri</a></li>
								</ul>
							</div>
						</div>-->
						<?php include 'include/tabs.php';?>
					</div>
					<div class="widget">
						<h2>WISATA POPULER</h2>
						<ul>
							<?php foreach ($populars as $popular): ?>
								<li><a href="<?php echo BASE_URL ?>artikel/<?php echo $artikels['id']; ?>"><?php echo $popular['judul']; ?></a></li>
							<?php endforeach; ?>
						</ul>
					</div>
					<div class="widget">
						<h2>Total Kunjungan Hari ini : </h2>
						<p class="visitor">
							<?php 
								echo $hari_ini['hari_ini'];
							 ?>
						</p>
					</div>
					<div class="widget">
						<h2>Bagaimana Website ini menurut anda?</h2>
						<form method="POST">
							<table>
								<tr>
									<td><input type="radio" name="polling" value="Sangat Bagus"></td>
									<td>Sangat Bagus</td>
									<td>: <?php echo $sangat; ?></td>
								</tr>
								<tr>
									<td><input type="radio" name="polling" value="Bagus"></td>
									<td>Bagus</td>
									<td>: <?php echo $bagus; ?></td>
								</tr>
								<tr>
									<td><input type="radio" name="polling" value="Kurang Bagus"></td>
									<td>Kurang Bagus</td>
									<td>: <?php echo $kurang; ?></td>
								</tr>
							</table>
							<input type="submit" name="voting" class="voting" value="Kirim">
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="kategori">
			<h2>KATEGORI</h2>
			<ul>
				<?php foreach ($kategori as $kategoris):?>
					<?php $row=str_replace(" ", "-", $kategoris['judul']) ?>
					<li class="flex-kategori"><a href="<?php echo BASE_URL; ?>result/<?php echo $row; ?>"><?php echo $kategoris['judul']; ?></a></li>
				<?php endforeach; ?>
			</ul>
		</div>
	</div>
