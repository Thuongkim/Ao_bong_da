<!DOCTYPE html>
<html lang="en">

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
				<li><a href="#">Home</a></li>
				<li class="active">Giỏ Hàng Của Bạn</li>
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
				<!-- Cart -->
				<?php
				if (isset($_GET['error'])) {
					echo "<h2>Không có sản phẩm trong giỏ hàng.Hoặc bạn đặt mua quá 100 sản phẩm<br>
					Nếu vậy hãy liên hệ với shop để nhận được hỗ trợ</h2>";
				}
				else if (isset($_GET['error_quantity']) && isset($_GET['ten'])) {
					echo "<h3>Sản phẩm ".$_GET['ten']." không đủ số lượng.Hãy liên hệ với shop để nhận được hỗ trợ</h3>";
				}
				else if (isset($_GET['success'])) {
					echo "<h2>Bạn đã đặt hàng thành công!</h2>";
				}
				 include_once 'content/cart.php'; 
				 ?>
				<!-- /Cart -->
				
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
