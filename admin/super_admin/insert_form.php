<!DOCTYPE html>
<html>
<?php 
include_once '../header.php';
?>
<body>
	<?php 
	$file_header_admin = "../login.php";
	require_once '../check_admin.php';
	require_once 'check_super_admin.php';
	if (isset($_GET['error'])) {
		echo "<h2>Thêm nhân viên thất bại</h2>";
	}
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
				<div class="col-md-12 col-sm-12 col-xs-12">
					<div class="section-title">
						<h3 class="title">Thêm nhân viên</h3>
					</div>
					<form action="process_insert.php" method="post" enctype="multipart/form-data">
						<table class="shopping-cart-table table">
							<tr>
								<td>Tên nhân viên</td>
								<td><input type="text" name="ten"></td>
							</tr>
							<tr>
								<td>Giới tính</td>
								<td>
									<input type="radio" name="gioi_tinh" value="1" checked>Nam<br>
									<input type="radio" name="gioi_tinh" value="0">Nữ
								</td>
							</tr>
							<tr>
								<td>SĐT</td>
								<td><input type="text" name="sdt"></td>
							</tr>
							<tr>
								<td>email</td>
								<td><input type="email" name="email"></td>
							</tr>
							<tr>
								<td>Mật khẩu</td>
								<td><input type="password" name="password"></td>
							</tr>
							<tr>
								<td>Địa chỉ</td>
								<td><textarea rows="4" cols="50" name="dia_chi"></textarea></td>
							</tr>
							<tr>
								<td>Cấp độ</td>
								<td><select name="cap_do">
									<option value="1">Super admin</option>
									<option value="0" selected>admin</option>
								</select></td>
							</tr>
							<tr>
								<td colspan="2"><button class="btn btn-danger" name="submit" value="1">Thêm nhân viên</button></td>
							</tr>
						</table>
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