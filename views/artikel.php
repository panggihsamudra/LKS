<?php 
	$db = new DB;
	$data = $db->show("SELECT * FROM artikel where id=?", [$data['id']]);

	if (isset($_POST['submit'])) {
		$nama = $_SESSION['user_session'];
		$komentar = $_POST['komentar'];
		$tanggal = $_POST['tanggal'];

		$db->add("INSERT INTO komentar (id_user, komentar, id_artikel, tanggal) VALUES (?,?,?,?)", [$nama, $komentar, $data['id'], $tanggal]);
	}

	# MENAMPILKAN KOMENTAR
	$komentar = $db->shows("SELECT * FROM komentar, user WHERE komentar.id_user = user.id AND komentar.id_artikel = ?", [$data['id']]);

	# MENAMPILKAN ARTIKEL RANDOM
	$random = $db->shows("SELECT * FROM artikel ORDER BY rand() limit 5");


?>
<div id="konten">
	<div class="container">
		<div class="konten">
			<div class="inkonten">	
				<div class="left">
					<div class="artikel">
						<div class="img-artikel" style="background-image:url(<?php echo TEMP_DIR; ?>/img/artikel/<?php echo $data['image']; ?>)"></div>
						<h2><?php echo $data['judul']; ?></h2>
						<div class="meta-artikel">
							<ul>
								<li>Komentar : 10</li>
								<li>Tanggal : <?php echo $data['tanggal']; ?></li>
							</ul>
						</div>
						<div class="text-post">
							<p><?php echo $data['isi']; ?></p>
						</div>
					</div>
					<div class="artikel">
						<h2>KOMENTAR</h2>
						<?php if (isset($_SESSION['user_session'])) { ?>
						<form method="POST">
						<input type="hidden" name="tanggal" value="<?php echo date("d/m/Y"); ?>">
							<textarea placeholder="Isi Komentar" name="komentar"></textarea>
							<input type="submit" name="submit" value="Kirim Komentar">
						</form>
						<?php } ?>
						<?php foreach ($komentar as $komentars):?>
						<ul class="komentar">
							<li class="komen1"><?php echo $komentars['username']; ?></li>
							<li class="komen2">Tanggal : <?php echo $komentars['tanggal']; ?></li>
							<li class="komen3"><?php echo $komentars['komentar']; ?></li>
						</ul>
						<?php endforeach; ?>
					</div>		
				</div>
				<div class="right">
					<div class="inright">
						<div class="widget">
							<h2>RANDOM POST</h2>
							<ul>
							<?php foreach ($random as $randoms): ?>
								<li><a href="<?php echo BASE_URL; ?>artikel/<?php echo $randoms['id']; ?>"><?php echo $randoms['judul'] ?></a></li>
							<?php endforeach; ?>
							</ul>
						</div>
					</div>
				</div>
			</div>		
		</div>
	</div>
