<?php
if(isset($_GET['delete_all'])) {
	unset($_SESSION['cart']);
}
?> 

<div class="col-md-12">
	<div class="order-summary clearfix">
		<div class="section-title">
			<h3 class="title">Thông Tin Giỏ Hàng</h3>
		</div>
		<div class="pull-right" style="margin-right: 15px;margin-bottom: 10px;">
			<a href="../Ao_bong_da/checkout.php?delete_all">
				<button class="primary-btn" name="delete_all">XÓA GIỎ HÀNG</button>
			</a>
		</div>
		<table class="shopping-cart-table table">
			<thead>
				<tr>
					<th>Sản Phẩm</th>
					<th>Miêu tả</th>
					<th class="text-center">Giá</th>
					<th class="text-center">Số Lượng</th>
					<th class="text-center">Tổng Cộng</th>
					<th class="text-right"></th>
				</tr>
			</thead>
			<tbody>
				<?php 
				$ma_khach_hang = $_SESSION['ma_khach_hang'];
				$query_custom = "select * from khach_hang where ma_khach_hang ='$ma_khach_hang'";
				$result_custom = mysqli_query($connect,$query_custom);
				$row_custom = mysqli_fetch_array($result_custom);
				if (!empty($_SESSION['cart'])) {
					$query = "select * from san_pham where ma_san_pham in (";
					foreach ($_SESSION['cart'] as $id => $value) {
						$query =$query.$id.",";
					}
					$query = substr($query,0,-1).") order by ten_san_pham asc";
					$result = mysqli_query($connect,$query);
					$tong_tien = 0;
					while ($row = mysqli_fetch_array($result)) {
						$tong_gia = $_SESSION['cart'][$row['ma_san_pham']]['so_luong'] * $row['gia'];
						$tong_tien+= $tong_gia;

						?>
						<tr>
							<td class="thumb"><img src="./admin/product/img/<?php echo $row['anh'] ?>" alt=""></td>
							<td class="details">
								<a href="#"><?php echo $row['ten_san_pham'] ?></a>
								<ul>
									<li><span>Size: <?php echo $row['kich_co'] ?></span></li>
									<li><span>Loại: <?php echo $row['mo_ta'] ?></span></li>
								</ul>
							</td>
							<td class="price text-center"><strong><?php echo $row['gia'] ?>đ</strong><br><del class="font-weak"><small></small></del></td>
							<td class="qty text-center">
								<a class="main-btn icon-btn" href="./content/quantity.php?ma=<?php echo $row['ma_san_pham'] ?>"><i class="fa fa-minus"></i></a>
								<?php echo $_SESSION['cart'][$row['ma_san_pham']]['so_luong'] ?>
								<a class="main-btn icon-btn" href="./content/quantity.php?ma=<?php echo $row['ma_san_pham'] ?>&action=plus"><i class="fa fa-plus"></i></a>
							</td>
							<td class="total text-center"><strong class="primary-color"><?php echo $tong_gia; ?>đ</strong></td>
							<td class="text-right">
								<a class="main-btn icon-btn" href="./content/delete_product.php?ma=<?php echo $row['ma_san_pham'] ?>"><i class="fa fa-trash"></i></a>
							</tr>
							<?php
						}
					}
					else{
						$tong_gia = 0;
						$tong_tien = 0;
					}
					?>
				</tbody>
				<tfoot>
					<tr>
						<th class="empty" colspan="3"></th>
						<th>TỔNG TIỀN</th>
						<th colspan="2" class="sub-total"><?php echo $tong_tien ?>đ</th>
					</tr>
					<tr>
						<th class="empty" colspan="3"></th>
						<th>PHÍ SHIP</th>
						<td colspan="2">Miễn Phí</td>
					</tr>
					<tr>
						<th class="empty" colspan="3"></th>
						<th>THÀNH TIỀN</th>
						<th colspan="2" class="total"><?php echo $tong_tien ?>đ</th>
					</tr>
				</tfoot>
			</table>
			<div class="pull-right" >
				<a href="index.php">
					<button class="primary-btn">CHỌN THÊM SẢN PHẨM</button>
				</a>
			</div>
	</div>
</div>

<form action="content/bill_process.php">
	<div class="col-md-6">
	</div>
	<div class="col-md-6">
		<div class="right">
			<div class="section-title">
				<h3 class="title">Thông Tin Khách Hàng</h3>
			</div>
			<div class="form-group">
				<label for="ho_ten">Họ Tên Người Nhận:</label>
				<input class="input" type="text" name="ten_nguoi_nhan" 
				value="<?php echo $row_custom['ten_khach_hang'] ?>" id="ho_ten" placeholder="Họ tên">
			</div>
			
			<div class="form-group">
				<label for="sdt" >SĐT Người Nhận:</label>
				<input id="sdt" type="text" name="sdt" value="<?php echo $row_custom['sdt'] ?>" class="input" placeholder="SĐT" >
			</div>

			<div class="form-group">
				<label for="dia_chi">Địa Chỉ Người Nhận:</label>
				<input class="input" type="text" name="dia_chi" value="<?php echo $row_custom['dia_chi'] ?>" id="dia_chi" placeholder="Địa Chỉ">
			</div>
			<p>Bạn chưa có tài khoản ? <a href="login.php">Đăng Kí</a></p>
			<div class="pull-right">
				<button class="primary-btn" type="submit" name="submit" value="1">ĐẶT HÀNG</button>
			</div>
		</div>
	</div>
</form>

	<!-- <div class="col-md-6">
		<div class="shiping-methods">
			<div class="section-title">
				<h4 class="title">PHƯƠNG THỨC VẬN CHUYỂN</h4>
			</div>
			<div class="input-checkbox">
				<input type="radio" name="shipping" id="shipping-1" checked>
				<label for="shipping-1">Tiêu chuẩn -  Miễn Phí Ship</label>
				<div class="caption">
					<p><p>
					</div>
				</div>
				<div class="input-checkbox">
					<input type="radio" name="shipping" id="shipping-2">
					<label for="shipping-2">Siêu Tốc - Tính Phí Theo Đơn Hàng</label>
					<div class="caption">
						<p><p>
						</div>
					</div>
				</div>

				<div class="payments-methods">
					<div class="section-title">
						<h4 class="title">HÌNH THỨC THANH TOÁN</h4>
					</div>
					<div class="input-checkbox">
						<input type="radio" name="payments" id="payments-1" checked>
						<label for="payments-1">Thanh toán tiền mặt khi nhận hàng</label>
						<div class="caption">
							<p><p>
							</div>
						</div>
						<div class="input-checkbox">
							<input type="radio" name="payments" id="payments-2">
							<label for="payments-2">Thanh toán qua chuyển khoản</label>
							<div class="caption">
								<p><p>
								</div>
							</div>
							<div class="input-checkbox">
								<input type="radio" name="payments" id="payments-3">
								<label for="payments-3">
									Thanh toán qua Ngân Lượng (ATM nội địa, Visa, Master)
								</label>
								<div class="caption">
									<p><p>
									</div>
								</div>
							</div>
						</div> -->
