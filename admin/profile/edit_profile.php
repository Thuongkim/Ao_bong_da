<?php 
require_once('../check_admin.php');
if(!empty($_GET['submit']) && !empty($_GET['ten_admin']) && !empty($_GET['sdt']) && !empty($_GET['dia_chi']) && !empty($_GET['email'])){
	$ten_admin = $_GET['ten_admin'];
	$sdt            = $_GET['sdt'];
	$dia_chi        = $_GET['dia_chi'];
	$email          = $_GET['email'];
	$gioi_tinh          = $_GET['gioi_tinh'];

	$ma_admin = $_SESSION['ma_admin'];

	require_once('../connect_database.php');
	$query = "update admin set ten_admin = '$ten_admin', sdt = '$sdt', dia_chi = '$dia_chi', email = '$email' , gioi_tinh = '$gioi_tinh' where ma_admin = '$ma_admin'";
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