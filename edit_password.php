<?php 
session_start();
require_once('check_customer.php');
if(!empty($_GET['submit']) && !empty($_GET['mat_khau_cu']) && !empty($_GET['mat_khau_moi']) && !empty($_GET['re_mat_khau_moi'])){
	require_once('include/connect_database.php');
	$mat_khau_cu = $_GET['mat_khau_cu'];

	$ma_khach_hang = $_SESSION['ma_khach_hang'];
	$query = "select mat_khau from khach_hang where ma_khach_hang = '$ma_khach_hang'";
	$result = mysqli_query($connect,$query);
	$row = mysqli_fetch_array($result);
	$mat_khau_cu_cu = $row['mat_khau'];

	if($mat_khau_cu==$mat_khau_cu_cu){
		$mat_khau_moi    = $_GET['mat_khau_moi'];
		$re_mat_khau_moi = $_GET['re_mat_khau_moi'];
		if($mat_khau_moi==$re_mat_khau_moi){
			$query = "update khach_hang set mat_khau = '$mat_khau_moi' where ma_khach_hang = '$ma_khach_hang'";
			mysqli_query($connect,$query);
			mysqli_close($connect);
			header('location:profile.php?pass_success');
		}
		else{
			mysqli_close($connect);
			header('location:profile.php?pass_error2');
		}
	}
	else{
		mysqli_close($connect);
			header('location:profile.php?pass_error1');
	}
}
else{
			header('location:profile.php?pass_error1');
}