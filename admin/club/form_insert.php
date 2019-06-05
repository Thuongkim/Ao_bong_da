<!DOCTYPE html>
<html>
<?php 
include_once '../header.php';
?>
<body>
	<?php 
	$file_header_admin = "../login.php";
	require_once '../check_admin.php';
	if (isset($_GET['error'])) {
		echo "<h2>Thêm câu lạc bộ thất bại</h2>";
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
				<div class="col-md-12 col-sm-12 col-xs-12">
					<div class="section-title">
						<h3 class="title">Thêm câu lạc bộ</h3>
					</div>
					<form class="form-horizontal" role="form" action="process_insert.php" method="post" enctype="multipart/form-data">
						<div class="form-group">
							<label for="ten" class="col-sm-2 control-label"> Tên câu lạc bộ</label>
							<div class="col-md-10 col-sm-10 col-xs-10">
								<input class="input" type="text" id="ten" name="ten">
							</div>
						</div>

						<div class="form-group">
							<div class="col-sm-offset-2 col-sm-10">
								<button class="btn btn-danger" name="submit" value="1">Thêm câu lạc bộ</button>
							</div>
						</div>
					</form>
				</div>
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /section -->
</body>
</html>