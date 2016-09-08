<?php 

require_once 'core/config.php';

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
	//isset berisi true or false
	if (isset($_POST['pages'])) {
		$kode = $_POST['pages'];
		$pages = "result";
	}

	# Switching
	switch($pages) {
		case "result":
			$data["title"] = "Result | Pariwisata Jawa Tengah";
			$main = ['filter' => $kode];
			break;
		case "dashboard":
			$data["title"] = "dashboard | Pariwisata Jawa Tengah";
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
			$datacounts = $db->show("SELECT counter from artikel WHERE id=?", [$kode]);
			$datacount = $datacounts['counter'] + 1;
			$db->add("UPDATE artikel SET counter = $datacount WHERE id=?", [$kode]);
			break;
		case "galeri":
			$data["title"] = "Galeri | Pariwisata Jawa Tengah";
			break;
		case "kontak":
			$data["title"] = "Kontak | Pariwisata Jawa Tengah";
			break;
		default:
			$pages = "home";
			$main = ['paging' => $kode];
			break;
	}

	if ($pages=='register' || $pages=='login') {
		$load->view($pages, $main);
		exit();
	}

/*	if ($pages=='login') {
		$load->view($pages, $main);
		exit();
	}*/
	$data["pages"] = $pages;

	$load->view("header", $data);
	$load->view($pages, $main);
	$load->view("footer");


?>