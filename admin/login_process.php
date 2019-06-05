<?php 
if (isset($_GET['submit'])) {
	$email = addslashes($_GET['email']);
	$mat_khau = addslashes($_GET['mat_khau']);
	require_once 'connect_database.php';
	$query = "select * from admin where email = '$email' and mat_khau = '$mat_khau'";
	$result = mysqli_query($connect,$query);
	$error = mysqli_error($connect);
	mysqli_close($connect);
	if (empty($error)) {
		$count = mysqli_num_rows($result);
		if ($count == 1) {
			$row = mysqli_fetch_array($result);
			session_start();
			$_SESSION['ma_admin'] = $row['ma_admin'];
			$_SESSION['ten_admin'] = $row['ten_admin'];
			$_SESSION['cap_do'] = $row['cap_do'];
			header('location:index.php');
		} else {
			header('location:login.php?error');
		}
		
	} else {
		header('location:login.php?error');
	}
	
} else {
	header('location:login.php?error');
}

 ?>