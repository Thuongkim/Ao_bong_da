<?php 
require_once('../check_admin.php');
if(!empty($_GET['submit']) && !empty($_GET['mat_khau_cu']) && !empty($_GET['mat_khau_moi']) && !empty($_GET['re_mat_khau_moi'])){
	require_once('../connect_database.php');
	$mat_khau_cu = $_GET['mat_khau_cu'];

	$ma_admin = $_SESSION['ma_admin'];
	$query = "select mat_khau from admin where ma_admin = '$ma_admin'";
	$result = mysqli_query($connect,$query);
	$row = mysqli_fetch_array($result);
	$mat_khau_cu_cu = $row['mat_khau'];

	if($mat_khau_cu==$mat_khau_cu_cu){
		$mat_khau_moi    = $_GET['mat_khau_moi'];
		$re_mat_khau_moi = $_GET['re_mat_khau_moi'];
		if($mat_khau_moi==$re_mat_khau_moi){
			$query = "update admin set mat_khau = '$mat_khau_moi' where ma_admin = '$ma_admin'";
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