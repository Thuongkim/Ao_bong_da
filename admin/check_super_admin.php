<?php 
	session_start();
	if ($_SESSION['cap_do'] != 1) {
		header('location:../index.php');
	}
 ?>