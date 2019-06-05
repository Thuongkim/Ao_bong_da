<?php 
session_start();
 require_once 'include/connect_database.php';
 require_once 'check_customer.php';
 if (isset($_GET['ma_hoa_don'])) {
 	$ma_hoa_don = $_GET['ma_hoa_don'];
 	$query = "delete from hoa_don_chi_tiet where ma_hoa_don='$ma_hoa_don'";
 	mysqli_query($connect,$query);

	$query_hd = "delete from hoa_don where ma_hoa_don='$ma_hoa_don'";
 	mysqli_query($connect,$query_hd);
 	$error = mysqli_error($connect);
 	mysqli_close($connect);
 	if (empty($error)) {
 		header('location:lich_su_mua_hang.php');
 	} else {
 		header('location:lich_su_mua_hang.php?error');
 	}
 	
 } else {
 	header('location:lich_su_mua_hang.php?error');
 }
 					
 ?>