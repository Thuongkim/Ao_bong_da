<!DOCTYPE html>
<html lang="en">

<?php require_once 'include/head.php'; ?>

<body>
	<!-- HEADER -->
	<?php require_once 'include/header.php'; ?>
	<!-- /HEADER -->

	<!-- NAVIGATION -->
	<?php require_once 'include/menu.php'; ?>
	<!-- /NAVIGATION -->
	<?php require_once 'check_customer.php'; ?>
	<!-- BREADCRUMB -->
	<div id="breadcrumb">
		<div class="container">
			<ul class="breadcrumb">
				<li><a href="index.php">Trang chủ</a></li>
				<li class="active">Lịch sử mua hàng</li>
			</ul>
		</div>
	</div>

	<!-- /BREADCRUMB -->
	<?php 
	if (isset($_GET['error'])) {
		echo "<script>alert('Xoá hóa đơn thất bại');</script>";
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

		$ma_khach_hang = $_SESSION['ma_khach_hang'];
		$query = "select * from  hoa_don 
		join khach_hang on hoa_don.ma_khach_hang = khach_hang.ma_khach_hang
		join hoa_don_chi_tiet on hoa_don.ma_hoa_don = hoa_don_chi_tiet.ma_hoa_don
		join san_pham on hoa_don_chi_tiet.ma_san_pham = san_pham.ma_san_pham
		where khach_hang.ma_khach_hang = '$ma_khach_hang' order by thoi_gian_dat_hang limit $limit offset $offset";
		$result = mysqli_query($connect,$query);

		$query_count = "select count(*) from hoa_don 
		join khach_hang on hoa_don.ma_khach_hang = khach_hang.ma_khach_hang
		join hoa_don_chi_tiet on hoa_don.ma_hoa_don = hoa_don_chi_tiet.ma_hoa_don
		join san_pham on hoa_don_chi_tiet.ma_san_pham = san_pham.ma_san_pham
		where khach_hang.ma_khach_hang = '$ma_khach_hang' order by thoi_gian_dat_hang";
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
				<div class="col-md-12">
					<div class="order-summary clearfix">
						<div class="section-title">
							<h3 class="title">Lịch sử mua hàng</h3>
						</div>
						<table class="shopping-cart-table table">
							<thead>
								<tr>
									<th>Ngày đặt hàng</th>
									<th>Thời gian đặt hàng</th>
									<th>Sản Phẩm</th>
									<th>Thông tin Khách Hàng</th>
									<th class="text-right">Tình trạng</th>
								</tr>
							</thead>
							<tbody>
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
										<?php if ($hoa_don['tinh_trang'] == 2) { ?>
											<td align="center" colspan="2"><b>Đã duyệt</b></td>
										<?php } else if ($hoa_don['tinh_trang'] == 1) { ?>
											<td align="center"><b>Chưa duyệt</b></td>
											<td align="center"><a href="delete_bill.php?ma_hoa_don=<?php echo $ma_hoa_don ?>">Xóa</a></td>
										<?php } else { ?>
											<td align="center" colspan="2"><b>Đã hủy</b></td>
										<?php
										}
										?>
									</tr>
								<?php } ?>
							</tbody>
						</table>
						<div align='center'>
						<?php
							for ($i=1; $i<=$total_page; $i++) 
							{ 
						?> 
							<a class="main-btn icon-btn" href='lich_su_mua_hang.php?page=<?php echo $i ?>'><?php echo $i ?></a> 
						<?php
							}
						?>
						</div>
						<div class="pull-right" >
							<a href="index.php">
								<button class="primary-btn">Tiếp tục mua hàng</button>
							</a>
						</div>
					</div>
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
