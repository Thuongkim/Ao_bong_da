<?php 
	$ma = $_GET['ma'];
	if (isset($ma)) {
		include '../connect_database.php';
		$query = "delete from san_pham where ma_san_pham = '$ma'";
		mysqli_query($connect,$query);
		mysqli_close($connect);
		$error = mysqli_error($connect);
		if (empty($error)) {
			$anh = $_GET['anh'];
    		unlink("anh/$anh");
    		header('location:view.php');
		} else {
			header('location:view.php?delete_error');
		}
	}
	 else {
		header('location:view.php?delete_error');
	}
	
 ?>