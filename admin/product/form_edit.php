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
	
	$ma = $_GET['ma'];
	$query_clb = "select * from cau_lac_bo";
	$result_clb = mysqli_query($connect,$query_clb);

	$query = "select * from san_pham where ma_san_pham ='$ma'";
	$result = mysqli_query($connect,$query);
	$row = mysqli_fetch_array($result);
	mysqli_close($connect);
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
						<form action="process_edit.php" method="post" enctype="multipart/form-data">
							<input type="hidden" readonly name="ma" value="<?php echo $row['ma_san_pham'] ?>">
							<tr>
								<td>Tên Sản Phẩm</td>
								<td><input type="text" name="ten" value="<?php echo $row['ten_san_pham'] ?>"></td>
							</tr>
							<tr>
								<td>Số Lượng</td>
								<td><input type="number" name="so_luong" value="<?php echo $row['so_luong_da_nhap']?>"></td>
							</tr>
							<tr>
								<td>Giá</td>
								<td>
								<input type="number" name="gia" value="<?php echo $row['gia']?>">	
								</td>
							</tr>
							<tr>
								<td>Kích cỡ</td>
								<td><input type="text" name="kich_co" value="<?php echo $row['kich_co'] ?>"></td>
							</tr>
							<tr>
								<td>Ảnh cũ</td>
								<td><img src="img/<?php echo $row['anh'] ?>">
									<input type="hidden" name="anh_cu" value="<?php echo $row['anh'] ?>">
								</td>
							</tr>
							<tr>
								<td>Chọn ảnh mới</td>
								<td><input type="file" name="anh_moi" accept="img/*"></td>
							</tr>
							<tr>
								<td>Câu lạc bộ</td>
								<td><select name="ma_clb">
								<?php while ($row_clb = mysqli_fetch_array($result_clb)) { ?>
									<option value="<?php echo $row_clb['ma_cau_lac_bo'] ?>" 
										<?php  
										if ($row_clb['ma_cau_lac_bo'] == $row['ma_cau_lac_bo']) {
											echo "selected";
										}
										?> >
										<?php echo $row_clb['ten_cau_lac_bo']; ?>
									</option>
									<?php	
								} 
								?>
								</select>
							</td>
							</tr>
							<tr>
								<td colspan="2"><button class="btn btn-danger" name="submit" value="1">Sửa sản phẩm</button></td>
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