<?php
	# Load
	class Load {
		// View conten like home, about & others. $name stand by the name of the file
		// $load->view($pages, $main);
		//$page => $name
		//$main => $data
		public function view($name, $data=[]){
			require_once "views/$name.php";
		}
	}
	