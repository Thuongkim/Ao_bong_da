<!DOCTYPE html>
<html>
<?php 
include_once '../header.php';
?>
<body>
	<br>
	<?php 
	$file_header_admin = "../login.php";
	require_once '../check_admin.php';
	require_once '../connect_database.php';
	if (isset($_GET['duyet'])) {
		echo "<script>alert('Đã duyệt thành công');</script>";
	} else if (isset($_GET['huy'])) {
		echo "<script>alert('Đã hủy thành công');</script>";
	}

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

	$query = "select * from  hoa_don 
	join khach_hang on hoa_don.ma_khach_hang = khach_hang.ma_khach_hang
	join hoa_don_chi_tiet on hoa_don.ma_hoa_don = hoa_don_chi_tiet.ma_hoa_don
	join san_pham on hoa_don_chi_tiet.ma_san_pham = san_pham.ma_san_pham
	where (hoa_don.ma_khach_hang like '%$search%' or hoa_don_chi_tiet.ma_san_pham like '%$search%') and tinh_trang =";
	if (isset($_GET['check'])) {
		$query.= "2 or tinh_trang = 3 order by thoi_gian_dat_hang  DESC limit $limit offset $offset";
	} else {
		$query.= "1 order by thoi_gian_dat_hang  DESC limit $limit offset $offset";
	}
	$result = mysqli_query($connect,$query);

	$query_count = "select count(*) from  hoa_don 
	join khach_hang on hoa_don.ma_khach_hang = khach_hang.ma_khach_hang
	join hoa_don_chi_tiet on hoa_don.ma_hoa_don = hoa_don_chi_tiet.ma_hoa_don
	join san_pham on hoa_don_chi_tiet.ma_san_pham = san_pham.ma_san_pham
	where (hoa_don.ma_khach_hang like '%$search%' or hoa_don_chi_tiet.ma_san_pham like '%$search%') and tinh_trang =";
	if (isset($_GET['check'])) {
		$query_count.= "2 or tinh_trang = 3 order by thoi_gian_dat_hang DESC";
	} else {
		$query_count.= "1 order by thoi_gian_dat_hang DESC";
	}
	$result_count = mysqli_query($connect,$query_count);
	$row_count = mysqli_fetch_array($result_count);
	$count = $row_count['count(*)'];

		//lấy số trang
	$total_page = ceil($count / $limit);
	mysqli_close($connect);
	$array = array();
	while ($row = mysqli_fetch_array($result)) {
		$ma_hoa_don = $row['ma_hoa_don'];
		$array[$ma_hoa_don]['ten_khach_hang'] = $row['ten_khach_hang'];
		$array[$ma_hoa_don]['thoi_gian_dat_hang'] = $row['thoi_gian_dat_hang'];
		$array[$ma_hoa_don]['sdt'] = $row['sdt'];
		$array[$ma_hoa_don]['dia_chi'] = $row['dia_chi'];
		$array[$ma_hoa_don]['tinh_trang'] = $row['tinh_trang'];

		$ma_san_pham = $row['ma_san_pham'];
		$array[$ma_hoa_don]['san_pham'][$ma_san_pham]['ten_san_pham'] = $row['ten_san_pham'];
		$array[$ma_hoa_don]['san_pham'][$ma_san_pham]['so_luong'] = $row['so_luong'];
		$array[$ma_hoa_don]['san_pham'][$ma_san_pham]['gia'] = $row['gia'];

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
				<div class="col-md-12">
					<div class="order-summary clearfix">
						<div class="section-title">
							<h3 class="title">Hóa Đơn Khách Hàng</h3>
						</div>
						<div class="form-group">
							<div class="col-sm-offset-4 col-md-9 col-sm-9 col-xs-9">
								<form>
									<div class="col-sm-4">
										<input class="form-control" type="text" name="search" value="<?php echo $search ?>">
									</div>
									<?php if (isset($_GET['check'])) { ?>
										<button class="btn" style="color: red;" name="check">Tìm kiếm</button>
									<?php } else { ?>
										<button class="btn" style="color: red;">Tìm kiếm</button>
										<?php
									}
									?>
								</form>
							</div>
						</div>
						<table class="shopping-cart-table table">
							<thead>
								<tr>
									<th>Ngày đặt hàng</th>
									<th>Thời gian đặt hàng</th>
									<th>Sản Phẩm</th>
									<th>Thông tin Khách Hàng</th>
									<th class="text-center">Tình Trạng</th>
								</tr>
							</thead>
							<?php 
							foreach ($array as $ma_hoa_don => $hoa_don) {
								$tong_tien = 0;
								?>
								<tr>
									<td>
										<?php 
										$thoi_gian_dat_hang = $hoa_don['thoi_gian_dat_hang'];
										$ngay = date("d-m-Y",strtotime($thoi_gian_dat_hang));
										echo $ngay;
										?>
									</td>
									<td>
										<?php
										$gio = date("H:i",strtotime($thoi_gian_dat_hang));
										echo $gio;
										?>
									</td>
									<td>
										<ul>
											<?php foreach ($hoa_don['san_pham'] as $san_pham) { ?>
												<li>
													<?php echo $san_pham['ten_san_pham'] ?>: <?php echo $san_pham['so_luong'] ?>
												</li>
												<?php $tong_tien+= $san_pham['so_luong'] * $san_pham['gia'];
											}
											?>
										</ul>
										<b>Tổng tiền là :<?php echo $tong_tien ?></b>
									</td>
									<td>
										<?php echo $hoa_don['ten_khach_hang'] ?><br>
										<?php echo $hoa_don['sdt'] ?><br>
										<?php echo $hoa_don['dia_chi'] ?>
									</td>
									<?php if (isset($_GET['check']) && $hoa_don['tinh_trang'] == 2) { ?>
										<td align="center" ><b>Đã duyệt</b></td>
									<?php } else if(isset($_GET['check']) && $hoa_don['tinh_trang'] == 3) { ?>
										<td align="center" ><b>Đã hủy</b></td>
									<?php } else { ?>
										<td><a href="bill_check.php?ma_hoa_don=<?php echo $ma_hoa_don?>&kieu=duyet">Duyệt</a></td>
										<td><a href="bill_check.php?ma_hoa_don=<?php echo $ma_hoa_don?>&kieu=huy">Hủy</a></td>
										<?php
									}
									?>
								</tr>
								<?php
							}
							?>
						</table>
						<div align='center'>
							<?php
							for ($i=1; $i<=$total_page; $i++) { 
								if (isset($_GET['check'])) {
									?> 
									<a class="main-btn icon-btn" href='bill_view.php?check&page=<?php echo $i ?>&search=<?php echo $search ?>'><?php echo $i ?></a> 
								<?php } else { ?>
									<a class="main-btn icon-btn" href='bill_view.php?page=<?php echo $i ?>&search=<?php echo $search ?>'><?php echo $i ?></a>
									<?php
								}
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