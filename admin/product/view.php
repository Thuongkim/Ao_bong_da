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
	if (isset($_GET['delete_error'])) {
		echo "<h2>Xoá sản phẩm thất bại</h2>";
	}
	if (isset($_GET['edit_error'])) {
		echo "<h2>Sửa sản phẩm thất bại</h2>";
	}
	$search = "";
	if (isset($_GET['search'])) {
		$search = $_GET['search'];
	}
	$limit = 7;
	$page = 1;
	if (isset($_GET['page'])) {
		$page = $_GET['page'];
	}
	$offset = ($page - 1) * $limit;
	$query = "select * from san_pham
	join cau_lac_bo
	on san_pham.ma_cau_lac_bo = cau_lac_bo.ma_cau_lac_bo
	where ten_san_pham like'%$search%' order by ma_san_pham limit $limit offset $offset";
	$result = mysqli_query($connect,$query);

	$query_count = "select count(*) from san_pham where ten_san_pham like'%$search%'";
	$result_count = mysqli_query($connect,$query_count);
	$row_count = mysqli_fetch_array($result_count);
	$count = $row_count['count(*)'];
	$total_page = ceil($count/$limit);
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
				<div class="col-md-12">
					<div class="order-summary clearfix">
						<div class="section-title">
							<h3 class="title">Xem Sản Phẩm</h3>
						</div>
						<div class="form-group">
							<div class="col-sm-offset-4 col-md-9 col-sm-9 col-xs-9">
								<form style="margin-top: 20px;">
									<div class="col-sm-4">
										<input class="form-control" type="text" name="search" value="<?php echo $search ?>">
									</div>
									<button class="btn" style="color: red;">Tìm Kiếm</button>
								</form>
							</div>
						</div>
						<table class="shopping-cart-table table">
							<thead>
								<tr class="text-center">
									<th>Mã</th>
									<th>Tên sản phẩm</th>
									<th>Ảnh</th>
									<th>Kích cỡ</th>
									<th>Giá</th>
									<th>Mô tả</th>
									<th>Thời gian nhập</th>
									<th>Số lượng nhập</tth>
										<th>Sân</th>
										<th>Mã clb</th>
										<th>Sửa</th>
										<th>Xóa</th>
									</tr>
								</thead>
								<?php 
								while ($row = mysqli_fetch_array($result)) {
									$ma_san_pham = $row['ma_san_pham'];
									?>
									<tr>
										<td><?php echo $row['ma_san_pham']  ?></td>
										<td><?php echo $row['ten_san_pham']  ?></td>
										<td ><img src="img/<?php echo $row['anh']  ?>" width="50px" height="50px"></td>
										<td><?php echo $row['kich_co']  ?></td>
										<td><?php echo $row['gia']  ?></td>
										<td><?php echo $row['mo_ta']  ?></td>
										<td><?php echo date("d-m-Y H:i",strtotime($row['thoi_gian_nhap_hang'])) ?></td>
										<td><?php echo $row['so_luong_da_nhap']  ?></td>
										<td><?php if ($row['san_nha'] == 0) {
											echo "sân nhà";
										} else {
											echo "sân khách";
										}
										?></td>
										<td><?php echo $row['ten_cau_lac_bo']  ?></td>
										<?php
										$query_sp = "select * from hoa_don_chi_tiet 
										where ma_san_pham = '$ma_san_pham'";
										$result_sp = mysqli_query($connect,$query_sp);
										$count_sp = mysqli_num_rows($result_sp);
										if ($count_sp == 0) { ?>
											<td><a href="form_edit.php?ma=<?php echo $row['ma_san_pham'] ?>">Sửa</a></td>
											<td><a href="delete.php?ma=<?php echo $row['ma_san_pham'] ?>&anh=<?php echo $row['anh'] ?>">Xóa</a></td>
										<?php } else { ?>
											<td colspan="2"></td>
											<?php
										}
										?>
									</tr>
									<?php
								}
								?>
							</table>
							<div align="center">
								<?php 
								for ($i=1; $i <= $total_page ; $i++) { 
									?>
									<a class="main-btn icon-btn" href="view.php?page=<?php echo $i ?>&search=<?php echo $search ?>"><?php echo $i ?></a>
									<?php			
								}
								mysqli_close($connect);	
								?>

							</div>
							<button class="btn"><a style="color: red;" href="form_insert.php">Thêm</a></button>
						</div>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /section -->
	</body>
	</html>