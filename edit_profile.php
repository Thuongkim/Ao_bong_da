<?php 
session_start();
require_once('check_customer.php');
if(!empty($_GET['submit']) && !empty($_GET['ten_khach_hang']) && !empty($_GET['sdt']) && !empty($_GET['dia_chi']) && !empty($_GET['email'])){
	$ten_khach_hang = $_GET['ten_khach_hang'];
	$sdt            = $_GET['sdt'];
	$dia_chi        = $_GET['dia_chi'];
	$email          = $_GET['email'];
	$gioi_tinh          = $_GET['gioi_tinh'];

	$ma_khach_hang = $_SESSION['ma_khach_hang'];

	require_once('include/connect_database.php');
	$query = "update khach_hang set ten_khach_hang = '$ten_khach_hang', sdt = '$sdt', dia_chi = '$dia_chi', email = '$email', gioi_tinh = '$gioi_tinh' where ma_khach_hang = '$ma_khach_hang'";
	mysqli_query($connect,$query);
	$error = mysqli_error($connect);
	mysqli_close($connect);
	if(empty($error)){
		header("location:profile.php?success");
	}
	else{
		header("location:profile.php?error"); 
	}
}
else{
	header("location:profile.php?error");
}