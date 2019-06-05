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
	$limit = 6;
	$page = 1;
	if (isset($_GET['page'])) {
		$page = $_GET['page'];
	}
	$offset = ($page - 1) * $limit;
	$query = "select * from cau_lac_bo
	where ten_cau_lac_bo like'%$search%' order by ma_cau_lac_bo limit $limit offset $offset ";
	$result = mysqli_query($connect,$query);

	$query_count = "select count(*) from cau_lac_bo where ten_cau_lac_bo like'%$search%'";
	$result_count = mysqli_query($connect,$query_count);
	$row_count = mysqli_fetch_array($result_count);
	$count = $row_count['count(*)'];
	$total_page = ceil($count/$limit);
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
				<div class="col-md-12">
					<div class="order-summary clearfix">
						<div class="section-title">
							<h3 class="title">Xem Câu Lạc Bộ</h3>
						</div>

						<div class="form-group">
							<div class="col-sm-offset-4 col-md-9 col-sm-9 col-xs-9">
								<form class="form-horizontal" role="form" style="margin-bottom: 20px;">
									<div class="col-sm-4">
										<input class="form-control" type="text" name="search" value="<?php echo $search ?>">
									</div>
									<button class="btn" style="color: red;">Tìm Kiếm</button>
								</form>
							</div>
						</div>

						<table class="shopping-cart-table table" >
							
							<tr class="text-center">
								<td>Mã clb</td>
								<td>Tên câu lạc bộ</td>
								<td>Sửa</td>
							</tr>
							<?php 
							while ($row = mysqli_fetch_array($result)) {
								?>
								<tr class="text-center">
									<td><?php echo $row['ma_cau_lac_bo']  ?></td>
									<td><?php echo $row['ten_cau_lac_bo']  ?></td>
									<td><a href="form_edit.php?ma=<?php echo $row['ma_cau_lac_bo'] ?>">Sửa</a></td>
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