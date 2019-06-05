<?php 
	$file_header_admin = "../login.php";
	require_once '../check_admin.php';
	require_once 'check_super_admin.php';
	require_once '../connect_database.php';
	if (isset($_POST['submit'])) {
		$ten = $_POST['ten'];
		$email = $_POST['email'];
		$sdt = $_POST['sdt'];
		$gioi_tinh = $_POST['gioi_tinh'];
		$dia_chi = $_POST['dia_chi'];
		$password = $_POST['password'];
		$cap_do = $_POST['cap_do'];
		$query = "insert into admin(ten_admin,sdt,email,gioi_tinh,mat_khau,dia_chi,cap_do) 
		values ('$ten','$sdt','$email','$gioi_tinh','$password','$dia_chi','$cap_do')";
		mysqli_query($connect,$query);
		$error = mysqli_error($connect);
		mysqli_close($connect);
		if (empty($error)) {
			header('location:view.php');
		}
		else {
			header('location:form_insert.php?error');
		}
	} 
	else {
		header('location:form_insert.php?error');
	}
 ?>