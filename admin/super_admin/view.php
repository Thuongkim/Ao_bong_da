<!DOCTYPE html>
<html>
<?php 
include_once '../header.php';
?>
<body>
	<?php
	if (isset($_GET['error'])) {
		echo "<script>alert('Sửa thất bại');</script>";
	} else if(isset($_GET['success'])) {
		echo "<script>alert('Sửa thành công');</script>";
	}
	$file_header_admin = "../index.php";
	require_once '../check_admin.php';
	require_once 'check_super_admin.php';
	require_once '../connect_database.php';
		//mặc định lúc đầu không có giá trị tìm kiếm
	$search = "";

		//nếu có thì truyền vào biến
	if(isset($_GET['search'])){
		$search = $_GET['search'];
	}

		//giới hạn bản ghi trên 1 trang, ví dụ ở đây là limit: 1
	$limit = 10;

		//lúc đầu ở trang 1, không đc sửa
	$page = 1;

		//nếu chưa sang trang nào thì mặc định là 1, nếu không thì lấy về
	if (isset($_GET["page"])) { 
		$page  = $_GET["page"]; 
	}
	$offset = ($page-1) * $limit; 

		//câu lệnh lấy bản ghi
	$query_select = "select * from admin 
	where cap_do = 0 and ten_admin like '%$search%'
	limit $limit offset $offset";
	$result_select = mysqli_query($connect,$query_select);

		//lấy số bản ghi dựa theo tìm kiếm
	$query_count = "select count(*) from admin
	where cap_do = 0 and ten_admin like '%$search%'";
	$result_count = mysqli_query($connect,$query_count);
	$row_count = mysqli_fetch_array($result_count);
	$count = $row_count['count(*)'];

		//lấy số trang
	$total_page = ceil($count / $limit); 
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
							<h3 class="title"><?php echo "Có $count nhân viên" ?></h3>
						</div>
						<div class="form-group">
							<div class="col-sm-offset-4 col-md-9 col-sm-9 col-xs-9">
								<form style="margin-bottom: 20px;">
									<div class="col-sm-4">
										<input class="form-control" type="text" name="search" value="<?php echo $search ?>">
									</div>
									<button class="btn" style="color: red;">Tìm Kiếm</button>
								</form>
							</div>
						</div>

						<table class="shopping-cart-table table">
							<tr class="text-center">
								<th>Mã</th>
								<th>Tên nhân viên</th>
								<th>SĐT</th>
								<th>Email</th>
								<th>Địa Chỉ</th>
								<th>Mật khẩu</th>
								<th>Giới tính</th>
								<th>Sửa</th>
							</tr>
							<?php
							$dem = 0;
							while($row = mysqli_fetch_array($result_select)){
								$dem++;
								?>
								<tr>
									<td><?php echo $dem ?></td>
									<td><?php echo $row['ten_admin'] ?></td>
									<td><?php echo $row['sdt'] ?></td>
									<td><?php echo $row['email'] ?></td>
									<td><?php echo $row['dia_chi'] ?></td>
									<td><?php echo $row['mat_khau'] ?></td>
									<td><?php if ($row['gioi_tinh'] == 1) {
										echo "Nam";
									} else {
										echo "Nữ";
									}
									?></td>

									<td><a href="edit_form.php?ma_admin=<?php echo $row['ma_admin'] ?>">Sửa</a></td>
									<tr>
										<?php
									}
									?>
								</table>
								<div align='center'>
									<?php
									for ($i=1; $i<=$total_page; $i++) 
									{ 
										?> 
										<a class="main-btn icon-btn" href='view.php?page=<?php echo $i ?>&search=<?php echo $search ?>'><?php echo $i ?></a> 
										<?php
									}
									?>
								</div><br>
								<button class="btn"><a style="color: red;" href="insert_form.php">Thêm nhân viên</a></button>
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