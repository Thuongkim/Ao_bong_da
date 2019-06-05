<!DOCTYPE html>
<html>
<head>
	<title>Trang admin</title>
	<link type="text/css" rel="stylesheet" href="../css/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<meta charset="utf-8">
</head>
<body>
	<?php
	$file_header_admin = "login.php";
	require_once 'check_admin.php';
	require_once 'connect_database.php';
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
	$query_select = "select * from khach_hang 
	where ten_khach_hang like '%$search%'
	limit $limit offset $offset";
	$result_select = mysqli_query($connect,$query_select);

		//lấy số bản ghi dựa theo tìm kiếm
	$query_count = "select count(*) from khach_hang
	where ten_khach_hang like '%$search%'";
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
					<button class="btn"><a style="color: red;" href="index.php">Trang chủ</a>
					</button>
				</div>
				<div class="col-md-12">
					<div class="order-summary clearfix">
						<div class="section-title">
							<h3 class="title"><?php echo "Có $count khách hàng" ?></h3>
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

						<table class="shopping-cart-table table" >
							<tr>
								<th>Mã</th>
								<th>Tên</th>
								<th>Ngày sinh</th>
								<th>SĐT</th>
								<th>Email</th>
								<th>Địa Chỉ</th>
							</tr>
							<?php
							while($row = mysqli_fetch_array($result_select)){
								?>
								<tr>
									<td><?php echo $row['ma_khach_hang'] ?></td>
									<td><?php echo $row['ten_khach_hang'] ?></td>
									<td><?php echo $row['ngay_sinh'] ?></td>
									<td><?php echo $row['sdt'] ?></td>
									<td><?php echo $row['email'] ?></td>
									<td><?php echo $row['dia_chi'] ?></td>
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
										<a class="main-btn icon-btn" href='customer.php?page=<?php echo $i ?>&search=<?php echo $search ?>'><?php echo $i ?></a> 
										<?php
									}
									?>
								</div>
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