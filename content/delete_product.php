<?php 
 $ma = $_GET['ma'];
 session_start();
 if (count($_SESSION['cart'])==1) {
 	 unset($_SESSION['cart']);
 } 
 else {
 	 unset($_SESSION['cart'][$ma]);
 }
header('location: ../checkout.php');
 ?>