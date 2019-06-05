<?php 
	if (!empty($_POST['submit'])) {
		$email = addslashes($_POST['email']);
		$password = addslashes($_POST['password']);
		require_once 'include/connect_database.php';
		$query = "select * from khach_hang where email='$email' and mat_khau = '$password'";
		$result = mysqli_query($connect,$query);
		$count = mysqli_num_rows($result);
		$error = mysqli_error($connect);
		mysqli_close($connect);
		if (!empty($error)) {
			header('location: form_login.php?error_login');
		} else {
			if ( $count == 0) {
				header('location: form_login.php?error_login');
			} else {
				$row = mysqli_fetch_array($result);
				$ma           = $row['ma_khach_hang'];
				$ten          = $row['ten_khach_hang'];
				$email = $row['email'];
				$sdt = $row['sdt'];
				$ngay_sinh = $row['ngay_sinh'];
				$dia_chi = $row['dia_chi'];
				$gioi_tinh = $row['gioi_tinh'];
				if(isset($_GET['cookie'])){
					setcookie('ma_khach_hang',$ma,time()+86400*60);
				}
				session_start();
				$_SESSION['ma_khach_hang']          = $ma;
				$_SESSION['ten']          = $ten;
				$_SESSION['email'] = $email;
				$_SESSION['sdt'] = $sdt;
				$_SESSION['ngay_sinh'] = $ngay_sinh;
				$_SESSION['dia_chi'] = $dia_chi;
				$_SESSION['gioi_tinh'] = $gioi_tinh;
				header('location:index.php');
			}
		}
	} else {
		header('location:form_login.php?error_login');
	}
	
	
 ?>