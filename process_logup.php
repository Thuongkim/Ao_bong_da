<?php 
if (isset($_POST['button_submit']) && !empty($_POST['ho_ten']) && !empty($_POST['gioi_tinh']) && !empty($_POST['email']) && !empty($_POST['sdt']) && !empty($_POST['password']) && !empty($_POST['dia_chi']) && !empty($_POST['year']) && !empty($_POST['month']) && !empty($_POST['day'])) {
	$ten = $_POST['ho_ten'];
	$gioi_tinh = $_POST['gioi_tinh'];
	$email = $_POST['email'];
	$array_ngay_sinh =array($_POST['year'],$_POST['month'],$_POST['day']);
	$ngay_sinh = implode("-", $array_ngay_sinh);
	$sdt = $_POST['sdt'];
	$password = $_POST['password'];
	$array_dia_chi = array($_POST['dia_chi'],$_POST['thanh_pho']);
	$dia_chi = implode("-", $array_dia_chi);
	$dem = 0;
	if (!preg_match("/^[a-zàáâãèéêếìíòóôõùúăđĩũơưăạảấầẩẫậắằẳẵặẹẻẽềềểễệỉịọỏốồổỗộớờởỡợụủứừửữựỳỵỷỹ\s]{5,50}$/i", 
		$ten)) {
		$dem = 1;
	}

	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    	$dem = 1; 
    }

    if (!preg_match("/^(0(([1-9])[0-9]{8,9}))$|^(\+84(\s?([1-9])[0-9]{8,9}))$/",$sdt)) {
		$dem = 1;
	}

	if (!preg_match("/^[a-z0-9]{4,15}$/i",$password)) {
		$dem = 1;
	}

	if (!preg_match("/^[a-zàáâãèéêếìíòóôõùúăđĩũơưăạảấầẩẫậắằẳẵặẹẻẽềềểễệỉịọỏốồổỗộớờởỡợụủứừửữựỳỵỷỹ\s\-]{3,50}$/i",$dia_chi)) {
		$dem = 1;
	}

	if (!preg_match('/^[0-9]{4}-[0-9]{1,2}-[0-9]{1,2}$/',$ngay_sinh)) {
		$dem = 1;
	}

	if ($dem == 1) {
		// header('location: login.php?error');
	}
	else {
	require_once 'include/connect_database.php';
	$query = "select * from khach_hang where email='$email' or sdt='sdt'";
	$result = mysqli_query($connect,$query);
	$count = mysqli_num_rows($result);
	
	if ( $count == 0) {
		$query_insert = "insert into khach_hang(ten_khach_hang,ngay_sinh,gioi_tinh,email,sdt,dia_chi,mat_khau) values('$ten','$ngay_sinh','$gioi_tinh','$email','$sdt','$dia_chi','$password')";
		mysqli_query($connect,$query_insert);
		$query = "select * from khach_hang where email='$email'";
		$result = mysqli_query($connect,$query);
		$error = mysqli_error($connect);
		mysqli_close($connect);
		if (empty($error)) {
			session_start();
			$row = mysqli_fetch_array($result);
			$_SESSION['ma_khach_hang'] = $row['ma_khach_hang'];
			$_SESSION['ten'] = $row['ten_khach_hang'];
			$_SESSION['email'] = $row['email'];
			$_SESSION['sdt'] = $row['sdt'];
			$_SESSION['ngay_sinh'] = $row['ngay_sinh'];
			$_SESSION['dia_chi'] = $row['dia_chi'];
			$_SESSION['gioi_tinh'] = $row['gioi_tinh'];
			header('location:profile.php?success');
		}
		else {
			header('location: login.php?error_register');
		}
	}
	else {
		header('location: login.php?error_logup');
	}
  }
} 
else {
	header('location: login.php?error_register');
}

?>