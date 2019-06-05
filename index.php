<!DOCTYPE html>
<html lang="vi">

<?php require_once 'include/head.php'; ?>

<body>
	<?php if (isset($_GET['error'])) {
		echo "Không tồn tại sản phẩm!";
		}
		$ma_trang = 1; 
	?>
	<!-- HEADER -->
	<?php require_once 'include/header.php'; ?>
	<!-- /HEADER -->
	
	<!-- NAVIGATION -->
	<?php require_once 'include/menu.php'; ?>
	<!-- /NAVIGATION -->
	
	<!-- CONTENT -->
	<?php
	if ($search !='') {
		require_once 'content/search.php';
	} 
	else if (!empty($_GET['ma_cau_lac_bo'])) {
		require_once 'content/league.php';
	}
	else {
		 require_once 'content/content.php' ;
	}
	 ?>
	<!-- /CONTENT -->
	
	<!-- FOOTER -->
	<?php require_once 'include/footer.php'; ?>
	<!-- /FOOTER -->
	
</body>

</html>
