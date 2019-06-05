<!DOCTYPE html>
<html lang="vi">

<head>
	<title></title>
		<link type="text/css" rel="stylesheet" href="../../css/bootstrap.min.css" />
		<link rel="stylesheet" type="text/css" href="../../css/style.css">
</head>

<body>
	<?php
	$file_header_admin = "../index.php";
	require_once '../check_admin.php';
	require_once '../connect_database.php';
	$ma_admin = $_SESSION['ma_admin'];
	$query = "select * from admin where ma_admin = '$ma_admin'";
	$result = mysqli_query($connect,$query);
	$row = mysqli_fetch_array($result);
	?>
	
	<!-- section -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<div class="col-md-12 col-sm-12 col-xs-12" style="margin-top: 10px">
					<button class="btn"><a style="color: red;" href="../index.php">Trang chủ</a>
					</button>
				</div>
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
							<input class="input" type="text" name="ten_admin" 
							value="<?php echo $row['ten_admin'] ?>" id="ho_ten">
						</div>

						<div class="form-group">
							<label id="gt">Giới Tính</label>
							<?php if ($row['gioi_tinh'] == 1) { ?>
								<label class="radio radio_gioi_tinh"> &emsp;&emsp;<input type="radio" name="gioi_tinh" class="gioi_tinh" value="1" <?php echo "checked"; ?>>Nam</label>
								<label class="radio radio_gioi_tinh"> &emsp;&emsp;<input type="radio" name="gioi_tinh" class="gioi_tinh" value="0">Nữ</label>
							<?php } else { ?>
								<label class="radio radio_gioi_tinh"> &emsp;&emsp;<input type="radio" name="gioi_tinh" class="gioi_tinh" value="1">Nam</label>
								<label class="radio radio_gioi_tinh"> &emsp;&emsp;<input type="radio" name="gioi_tinh" class="gioi_tinh" value="0" <?php echo "checked"; ?>>Nữ</label>
							<?php } ?>
						</div>
						
						<div class="form-group">
							<label for="email" >Email:</label>
							<input id="email" type="email" name="email" value="<?php echo $row['email'] ?>" class="input">
						</div>

						<div class="form-group">
							<label for="sdt" >SĐT:</label>
							<input id="sdt" type="text" name="sdt" value="<?php echo $row['sdt'] ?>" class="input">
						</div>

						<div class="form-group">
							<label for="dia_chi">Địa Chỉ:</label>
							<input class="input" type="text" name="dia_chi" value="<?php echo $row['dia_chi'] ?>" id="dia_chi">
						</div>
						<div class="form-group">
							<label for="cap_do">Cấp độ:</label>
							<input class="input" type="text" readonly value="<?php if ($row['cap_do'] == 1) {
								echo "superadmin";
							} else { echo "admin";} ?>" id="cap_do">
						</div>
						<div class="pull-left">
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
						<div class="pull-left">
							<button class="primary-btn" type="submit" name="submit" value="1">Cập nhật mật khẩu</button>
						</div>
					</form>
				</div>
				
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /section -->
</body>

</html>
