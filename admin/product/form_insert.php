<!DOCTYPE html>
<html>
	<?php 
	include_once '../header.php';
	?>
<body>

	<?php 
	$file_header_admin = "../login.php";
	require_once '../check_admin.php';
	require_once '../connect_database.php';
	$query = "select * from cau_lac_bo order by ma_cau_lac_bo";
	$result = mysqli_query($connect,$query);
	if (isset($_GET['error'])) {
		echo "<h2>Thêm sản phẩm thất bại</h2>";
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
						<h3 class="title">Thêm sản phẩm</h3>
					</div>
					<table class="shopping-cart-table table">
						<form action="process_insert.php" method="post" enctype="multipart/form-data">
							<tr>
								<td>Tên sản phẩm:</td>
								<td><input type="text" name="ten"></td>
							</tr> 
							<tr>
								<td>Ảnh:</td>
								<td><input type="file" name="anh" accept="img/*"></td>
							</tr>
							<tr>
								<td>Kích cỡ:</td>
								<td><input type="text" name="kich_co"></td>
							</tr>
							<tr>
								<td>Giá:</td>
								<td><input type="number" name="gia"></td>
							</tr>
							<tr>
								<td>Mô tả:</td>
								<td><textarea rows="4" cols="50" type="text" name="mo_ta"></textarea></td>
							</tr>
							<tr>
								<td>Số lượng nhập:</td>
								<td><input type="number" name="so_luong"></td>
							</tr>
							<tr>
								<td>Chọn sân:</td>
								<td><select name="san">
									<option value="0">Sân nhà</option>
									<option value="1">Sân khách</option>
								</select></td>
							</tr>
							<tr>
								<td>Câu lạc bộ:</td>
								<td><select name="ma_clb">
									<?php while ($row = mysqli_fetch_array($result)) { ?>
										<option value=" <?php echo $row['ma_cau_lac_bo'] ?>">
											<?php echo $row['ten_cau_lac_bo'] ?>
										</option>
										<?php
									}
									?>

								</select></td>
							</tr>
							<tr>
								<td colspan="2"><button class="btn btn-danger" name="submit" value="1">Thêm sản phẩm</button></td>
							</tr>
						</form>
					</table>
				</div>
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /section -->
</body>
</html>