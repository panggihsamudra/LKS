<?php  
	class DB{
		var $DB;

		function __construct(){
			$this->DB = new PDO("mysql:host=localhost; dbname=jawatengah", "root", "");
		}

		function add($query, $param = []){
			$rs = $this->DB->prepare($query);
			$rs->execute($param);
		}

		function show($query, $param = []){
			$rs = $this->DB->prepare($query);
			$rs->execute($param);
			return $rs->fetch();
		}

		function shows($query, $param = []){
			$rs = $this->DB->prepare($query);
			$rs->execute($param);
			return $rs->fetchAll();
		}
	}
?>