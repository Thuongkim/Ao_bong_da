<?php 
	$file_header_admin = "../login.php";
	require_once '../check_admin.php';
	require_once '../connect_database.php';
	if (isset($_POST['submit'])) {
		$ma = $_POST['ma'];
		$ten = $_POST['ten'];
		$query = "update cau_lac_bo set ten_cau_lac_bo='$ten' where ma_cau_lac_bo='$ma'";
		mysqli_query($connect,$query);
		$error = mysqli_error($connect);
		mysqli_close($connect);
		if (empty($error)) {
			header('location:view.php?success');
		}
		else {
			header('location:view.php?edit_error');
		}
	} 
	else {
		header('location:view.php?edit_error');
	}
 ?>