<?php 
	session_start();
	if (empty($_SESSION['ten_admin'])) {
		header("location:$file_header_admin?error");
	}
 ?>