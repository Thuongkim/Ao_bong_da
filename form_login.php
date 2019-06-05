<!DOCTYPE html>
<html lang="vi">

<?php require_once 'include/head.php'; ?>
<link rel="stylesheet" type="text/css" href="css/error.css">

<body>
	<!-- HEADER -->
	<?php require_once 'include/header.php'; ?>
	<!-- /HEADER -->

	<!-- NAVIGATION -->
	<?php require_once 'include/menu.php';  ?>
	<!-- /NAVIGATION -->

	<!-- BREADCRUMB -->
	<div id="breadcrumb">
		<div class="container">
			<ul class="breadcrumb">
				<li><a href="#">Trang Chủ</a></li>
				<li class="active">Đăng Nhập</li>
			</ul>
		</div>
	</div>
	<!-- /BREADCRUMB -->

	<!-- section -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<form method="post" action="process_login.php"  class="clearfix">
					<div class="col-md-6">
						<div class="billing-details">
							<div class="section-title">
								<h3 class="title">Đăng Nhập</h3>
							</div>
							<?php 
								if (isset($_GET['error_login'])) {
									echo "<h4 class='red'>Sai tên đăng nhập hoặc mật khẩu!</h4>";
								} 
								else if (isset($_GET['success'])) {
									echo "<h4 class='red'>Đăng xuất thành công</h4>";
								}
								else if (isset($_GET['error_session']))
								{
									echo "<h4 class='red'>Bạn chưa đăng nhập</h4>";
								}
							 ?>
							<div class="form-group">
							<label for="email">Email</label>
							<input id="email" type="email" class="input" placeholder="Email" name="email">
							</div>
							
							<div class="form-group">
								<label for="password" >Mật Khẩu</label>
								<input id="password" type="password" name="password" class="input" data-type="password"  placeholder="Mật Khẩu">
							</div>
							<input type="checkbox" name="cookie"> Ghi nhớ đăng nhập
							<br>
							<div class="pull-left">
								<button class="primary-btn" onclick="return kiem_tra()" name="submit" value="1">Đăng Nhập</button>
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="shiping-methods">
							<div style="font-size: 15px;padding-left: 30px;font-family: Arial;margin-top: -40px;">
								<br><br><br>
								Bạn chưa là thành viên<br><br>
								Đăng ký là thành viên để hưởng nhiều lợi ích và đặt mua hàng dễ dàng hơn.<br><br>
								<a href="login.php" class="red">Đăng ký tài khoản</a> 
							</div>
						</div>
					</div>
				</form>
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /section -->
	<br>
	<br>
	<br>
	<br>
	<br>
	<!-- FOOTER -->
	<?php require_once 'include/footer.php'; ?>
	<!-- /FOOTER -->

</body>

</html>
