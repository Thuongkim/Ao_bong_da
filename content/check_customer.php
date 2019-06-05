<?php
session_start();
	if (empty($_SESSION['ma_khach_hang'])) {
		header("location:$file");	
	}
 ?>