<?php
	# Core is an basic function
	class Core {
		# Redirect
		public function redir($goto) {
			// $core->redir("user/");
			header("Location: $goto");
			exit();
		}

		# Error
		public function error($value){
			$error = "<div class='error'>".$value."</div>";
		}
		# Alternate error 
		public function alert($alert){
			echo "<script>alert('$alert')</script>";
		}

		# Pagination
		public function paging($paging, $limit, $dir){
			// $core->paging($models->count, 5, user/dir);
			$sum = ceil($paging / $limit);

			echo "<ul class='pagination'>";
			for($i=1; $i <= $sum; $i++){
				echo "<li><a href='".BASE_URL.$dir.$i."'>$i</a></li>";
			}
			echo "</ul>"; 
		}
	}