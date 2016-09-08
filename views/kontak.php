<?php $halaman = "kontak" ?>

<?php 
	
	$db = new DB();
	if (isset($_POST['kirim'])) {
		$nama = $_POST['nama'];
		$email = $_POST['email'];
		$isi = $_POST['isi'];
		$db->add("INSERT INTO book (nama, email, isi) VALUES (?,?,?)", [$nama, $email, $isi]);
	}

?>
<div id="kontak">
	<div class="container">
		<div class="about">
			<div class="kontak-left">
				<form method="post">
					<h2>Guest Book</h2>
					<input type="text" name="nama" placeholder="Nama Lengkap">
					<input type="text" name="email" placeholder="Email">
					<textarea placeholder="Isi Kritik atau Saran" name="isi"></textarea>
					<input type="submit" name="kirim" value="Kirim Guest" class="btn-admin">
				</form>
			</div>
			<div class="kontak-right">
				<h3>Kontak Kami</h3>
				<ul>
					<li>Email : panggihsamudra@jawatengah.com</li>
					<li>Fax : 01241241141</li>
					<li>Tempat : Jl. DI Pandjaitan no 128</li>
				</ul>
				<br>
				<br>
				<h3>Social Media</h3>
				<ul>
					<li><a href="#">Facebook</a></li>
					<li><a href="#">Twitter</a></li>
					<li><a href="#">Rss</a></li>
					<li><a href="#">Instagram</a></li>
				</ul>
			</div>
		</div>		
	</div>	
</div>
