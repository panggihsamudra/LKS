<?php
	# Configuration file
	@session_start();

	define("APP_NAME", "TemplateProvinsi/");
	define("TEMP_NAME", "default");
	define("BASE_URL", "http://localhost/" . APP_NAME);
	define("BASE_PATH", $_SERVER["DOCUMENT_ROOT"] . APP_NAME);
	define("ROOT_PATH", __DIR__);
	define("TEMP_DIR", BASE_URL."template/".TEMP_NAME);

	require_once ROOT_PATH."/load.php";
	require_once ROOT_PATH."/core.php";
	require_once ROOT_PATH."/../models/db.php";
	require_once ROOT_PATH."/../models/dbuser.php";

	function res($uri){
		echo TEMP_DIR.$uri;
	}

 ?>