<?php 
	$file_header_admin = "../login.php";
	require_once '../check_admin.php';
	require_once '../connect_database.php';
	$ma_hoa_don = $_GET['ma_hoa_don'];
	$kieu = $_GET['kieu'];
	if ($kieu == "duyet") {
		$tinh_trang = 2;
	}
	else {
		$tinh_trang = 3;
	}
	$query = "update hoa_don set tinh_trang = '$tinh_trang' where ma_hoa_don = '$ma_hoa_don' and tinh_trang = 1";
	mysqli_query($connect,$query);
	mysqli_close($connect);
	// $kieu = "duyet"?'duyet' :'huy';
	if ($kieu == "duyet") {
		header("location:bill_view.php?".$kieu);
	}
	else {
		header("location:bill_view.php?".$kieu);
	}
 ?>