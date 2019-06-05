<!DOCTYPE html>
<html lang="vi">

<?php require_once 'include/head.php'; ?>

<body>
	
	<!-- HEADER -->
	<?php include 'include/header.php'; ?>
	<!-- /HEADER -->
	<?php require_once 'check_customer.php'; ?>
	<?php
	if (isset($_GET['success'])) {
		echo "<script>alert('Đăng kí thành công');</script>";
	}
	if(isset($_COOKIE['ma_khach_hang'])){
		$ma = $_COOKIE['ma_khach_hang'];
		require_once 'include/connect_database.php';
		$query = "select * from khach_hang where ma_khach_hang = '$ma'";
		$result = mysqli_query($connect,$query);
		$count = mysqli_num_rows($result);
		mysqli_close($connect);
		if($count==0){
			header('location:form_login.php?error_cookie');
		}
		else{
			$row = mysqli_fetch_array($result);
			$ma           = $row['ma_khach_hang'];
			$ten          = $row['ten_khach_hang'];
			$email = $row['email'];
			$sdt = $row['sdt'];
			$ngay_sinh = $row['ngay_sinh'];
			$dia_chi = $row['dia_chi'];
			$gioi_tinh = $row['gioi_tinh'];
				// session_start(); (đã mở phiên trên header.php)
			$_SESSION['ten']          = $ten;
			$_SESSION['email'] = $email;
			$_SESSION['sdt'] = $sdt;
			$_SESSION['ngay_sinh'] = $ngay_sinh;
			$_SESSION['dia_chi'] = $dia_chi;
			$_SESSION['gioi_tinh'] = $gioi_tinh;
		}
	}
	else{
			// session_start(); (đã mở phiên trên header.php)
			// if(empty($_SESSION['ma_khach_hang'])){
			// 	echo "<script>window.history.back()</script>";
			// }
		$ten          = $_SESSION['ten'];
		$email = $_SESSION['email'];
		$sdt = $_SESSION['sdt'];
		$ngay_sinh = $_SESSION['ngay_sinh'];
		$dia_chi = $_SESSION['dia_chi'];
		$gioi_tinh = $_SESSION['gioi_tinh'];

	}

	?>

	<!-- NAVIGATION -->
	<?php require_once 'include/menu.php'; ?>
	<!-- /NAVIGATION -->

	<!-- BREADCRUMB -->
	<div id="breadcrumb">
		<div class="container">
			<ul class="breadcrumb">
				<li><a href="#">Trang chủ</a></li>
				<li class="active">Tài Khoản</li>
			</ul>
		</div>
	</div>
	<!-- /BREADCRUMB -->

	<!-- section -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<div class="col-md-6 col-sm-12 col-xs-12">
					<div class="section-title">
						<h3 class="title">Thông Tin Cá Nhân</h3>
					</div>
					<?php 
						if (isset($_GET['error'])) {
							echo "<h2>Cập nhật thất bại</h2>";
						} else if(isset($_GET['success'])) {
							echo "<h2>Cập nhật thành công</h2>";
						}
						
					 ?>
					<form action="edit_profile.php">
						<div class="form-group">
							<label for="ho_ten">Họ Tên:</label>
							<input class="input" type="text" name="ten_khach_hang" 
							value="<?php echo $ten ?>" id="ho_ten">
						</div>

						<div class="form-group">
							<label for="ngay_sinh">Ngày Sinh:</label>
							<input class="input" type="date" name="ngay_sinh" 
							value="<?php echo $ngay_sinh?>" id="ngay_sinh">
						</div>

						<div class="form-group">
							<label id="gt">Giới Tính</label>
							<?php if ($gioi_tinh == 1) { ?>
								<label class="radio radio_gioi_tinh"> &emsp;&emsp;<input type="radio" name="gioi_tinh" class="gioi_tinh" value="1" <?php echo "checked"; ?>>Nam</label>
								<label class="radio radio_gioi_tinh"> &emsp;&emsp;<input type="radio" name="gioi_tinh" class="gioi_tinh" value="0">Nữ</label>
							<?php } else { ?>
								<label class="radio radio_gioi_tinh"> &emsp;&emsp;<input type="radio" name="gioi_tinh" class="gioi_tinh" value="1">Nam</label>
								<label class="radio radio_gioi_tinh"> &emsp;&emsp;<input type="radio" name="gioi_tinh" class="gioi_tinh" value="0" <?php echo "checked"; ?>>Nữ</label>
							<?php } ?>
						</div>
						
						<div class="form-group">
							<label for="email" >Email:</label>
							<input id="email" type="email" name="email" value="<?php echo $email ?>" class="input">
						</div>

						<div class="form-group">
							<label for="sdt" >SĐT:</label>
							<input id="sdt" type="text" name="sdt" value="<?php echo $sdt ?>" class="input">
						</div>

						<div class="form-group">
							<label for="dia_chi">Địa Chỉ:</label>
							<input class="input" type="text" name="dia_chi" value="<?php echo $dia_chi ?>" id="dia_chi">
						</div>
						<div class="pull-right">
							<button class="primary-btn" type="submit" name="submit" value="1">Chỉnh sửa</button>
						</div>
					</form>
				</div>
				<div class="col-md-6 col-sm-12 col-xs-12">
					<div class="section-title">
						<h3 class="title">Thay đổi mật khẩu</h3>
					</div>
					<?php 
						if (isset($_GET['pass_error1'])) {
							echo "<h2>Cập nhật thất bại</h2>";
						} 
						else if(isset($_GET['pass_error2'])) {
							echo "<h2>Mật khẩu mới không trùng khớp</h2>";
						}
						else if(isset($_GET['pass_success'])) {
							echo "<h2>Cập nhật thành công</h2>";
						}
						
					 ?>
					<form action="edit_password.php">
						<div class="form-group">
							<label for="mat_khau_cu">Mật khẩu cũ:</label>
							<input class="input" type="password" name="mat_khau_cu" id="mat_khau_cu">
						</div>
						<div class="form-group">
							<label for="mat_khau_moi">Mật khẩu mới:</label>
							<input class="input" type="password" name="mat_khau_moi" id="mat_khau_moi">
						</div>
						<div class="form-group">
							<label for="re_mat_khau_moi">Nhập lại mật khẩu mới:</label>
							<input class="input" type="password" name="re_mat_khau_moi"" id="re_mat_khau_moi">
						</div>
						<div class="pull-right">
							<button class="primary-btn" type="submit" name="submit" value="1">Cập nhật mật khẩu</button>
						</div>
					</form>
				</div>
				<div class="col-md-12 col-sm-12 col-xs-12" style="margin-top: 10px">
					<button class="btn"><a style="color: red;" href="logout.php">Đăng xuất</a>
					</button>
				</div>
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /section -->

	<!-- FOOTER -->
	<?php require_once 'include/footer.php'; ?>
	<!-- /FOOTER -->
</body>

</html>
