<?php 

require_once '../core/config.php';

$load = new Load();
$db = new DB();

	$pages = isset($_GET["pages"]) ? $_GET["pages"] : "";

# Default title bar
	$data["title"] = "Home | Pariwisata Jawa Tengah";
	$main = "";
	$kode = "";

# Clean URL
	$split = explode("/", $pages);

	if(count($split) == 2){
		$pages = $split[0];
		$kode = $split[1];
	}


	# Switching
	switch($pages) {
		case "result":
			$data["title"] = "Result | Pariwisata Jawa Tengah";
			break;
		case "dashboard":
			$data["title"] = "dashboard | Pariwisata Jawa Tengah";
			$data["halaman"]= "dashboard";
			break;
		case "logout":
			$data["title"] = "dashboard | Pariwisata Jawa Tengah";
			break;
		case "about":
			$data["title"] = "About | Pariwisata Jawa Tengah";
			break;
		case "register":
			$data["title"] = "Register | Pariwisata Jawa Tengah";
			break;
		case "login":
			$data["title"] = "Login | Pariwisata Jawa Tengah";
			break;
		case "artikel":
			$data["title"] = "Artikel | Pariwisata Jawa Tengah";
			$main = ['id' => $kode];
			if ($kode=='') {
				header("location:index.php");
			}else{
			}
			break;
		case "galeri":
			$data["title"] = "Galeri | Pariwisata Jawa Tengah";
			break;
		case "kontak":
			$data["title"] = "Kontak | Pariwisata Jawa Tengah";
			break;
		default:
			$pages = "dashboard";
			break;
	}

	if ($pages=='register') {
		$load->view($pages, $main);
		exit();
	}

	if ($pages=='login') {
		$load->view($pages, $main);
		exit();
	}

	$data["pages"] = $pages;
	$load->view("header", $data);
	$load->view($pages, $main);
	$load->view("footer");


?>