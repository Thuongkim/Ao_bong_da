<?php 
	$file_header_admin = "../login.php";
	require_once '../check_admin.php';
	require_once '../connect_database.php';
	if (isset($_POST['submit'])) {
		$ten = $_POST['ten'];
		$query = "insert into cau_lac_bo(ten_cau_lac_bo) values ('$ten') ";
		mysqli_query($connect,$query);
		$error = mysqli_error($connect);
		mysqli_close($connect);
		if (empty($error)) {
			header('location:view.php?success');
		}
		else {
			header('location:form_insert.php?error');
		}
	} 
	else {
		header('location:form_insert.php?error');
	}
 ?>