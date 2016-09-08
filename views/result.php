<?php 
	$db = new DB();

 	$row=str_replace("-", " ", $data['filter']);

	$data = $db->shows("SELECT * FROM artikel WHERE kategori LIKE ? OR judul LIKE ? OR isi LIKE ?", ["%$row%", "%$row%", "%$row%"]);

?>
<div id="result"><h1>Kategori : <?php echo $row; ?></h1></div>
<div id="konten">
	<div class="container">
		<div class="konten">
			<div class="inkonten">
			<div class="left">
				<?php foreach ($data as $datas): ?>
				<div class="post">
					<div class="img-post" style="background-image:url(img/artikel/<?php echo $datas['image']; ?>)"></div>
					<div class="inpost">
						<h2><a href="artikel.php?id=<?php echo $datas['id']; ?>"><?php echo $datas['judul']; ?></a></h2>
						<p><?php echo substr($datas['isi'], 0,170); ?></p>
						<div class="metapost">
							<ul>
								<li>Komentar : 10</li>
								<li>Tanggal : <?php echo $datas['tanggal']; ?></li>
							</ul>
						</div>
					</div>
				</div>
				<?php endforeach; ?>
				<div class="pagination">
					<center>
						<ul>
						</ul>
					</center>
				</div>
			</div>
			<div class="right">
				<div class="inright">
					<div class="widget">
						<h2>RANDOM WISATA</h2>
						<ul>
							<li><a href="#">Bukit Tranggulasih</a></li>
							<li><a href="#">Candi Meriak</a></li>
							<li><a href="#">Owabong</a></li>
							<li><a href="#">Batik Store</a></li>
						</ul>
					</div>
				</div>
			</div>
			</div>
		</div>
