<?php 
	$ma = $_GET['ma'];
	session_start();
	if (isset($_GET['action'])=="plus") {
		if ($_SESSION['cart'][$ma]['so_luong']>100) {
			header('location: ../checkout.php?error');
		} else {
			$_SESSION['cart'][$ma]['so_luong']++;
			header('location: ../checkout.php');
		}
	}
	else {
		if (count($_SESSION['cart'])==1 && $_SESSION['cart'][$ma]['so_luong']==1) {
			unset($_SESSION['cart']);
			header('location: ../checkout.php');
		} 
		else if ($_SESSION['cart'][$ma]['so_luong']==1) {
			unset($_SESSION['cart'][$ma]);
			header('location: ../checkout.php');
		}
		else {
			$_SESSION['cart'][$ma]['so_luong']--;
			header('location: ../checkout.php');
		}
		
	}
	
 ?>