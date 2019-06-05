<nav>
	<ul>
		<li><a href="#">Xin chào: <span style="text-transform: capitalize;"><?php echo $_SESSION['ten_admin'] ?></span></a></li>
		<li><a href="#">Quản lý sản phẩm</a>
			<ul class="menu">
				<li><a href="product/view.php">Xem sản phẩm</a></li>
				<li><a href="product/form_insert.php">Thêm sản phẩm</a></li>
			</ul>
		</li>
		<li><a href="#">Quản lý hóa đơn</a>
			<ul class="menu">
				<li><a href="bill/bill_view.php">Xem hóa đơn chưa duyệt</a></li>
				<li><a href="bill/bill_view.php?check">Xem hóa đơn đã duyệt</a></li>
			</ul>
		</li>
		<?php if($_SESSION['cap_do']==1){ ?>
		<li><a href="#">Quản lý nhân viên</a>
			<ul class="menu">
				<li><a href="super_admin/view.php">Xem nhân viên</a></li>
				<li><a href="super_admin/insert_form.php">Thêm nhân viên</a></li>
			</ul>
		</li>
		<?php } ?>
		<li><a href="club/view.php">Quản lí câu lạc bộ</a></li>
		<li><a href="customer.php">Quản lí khách hàng</a></li>
		<li><a href="profile/profile.php">Thay đổi thông tin cá nhân</a></li>
		<li><a href="logout.php">Đăng xuất</a></li>
	</ul>
</nav>