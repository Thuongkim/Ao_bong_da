<!DOCTYPE html>
<html>
<head>
	<title>Form đăng nhập</title>
	<meta charset="utf-8">
	<link type="text/css" rel="stylesheet" href="../css/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<style type="text/css">
		body {
			padding-top: 40px;
			padding-bottom: 40px;
			background-color: #eee;
		}

		.form-signin {
			max-width: 330px;
			padding: 15px;
			margin: 0 auto;
		}
		.form-signin .form-signin-heading,
		.form-signin .checkbox {
			margin-bottom: 10px;
		}
		.form-signin .checkbox {
			font-weight: normal;
		}
		.form-signin .form-control {
			position: relative;
			height: auto;
			-webkit-box-sizing: border-box;
			-moz-box-sizing: border-box;
			box-sizing: border-box;
			padding: 10px;
			font-size: 16px;
		}
		.form-signin .form-control:focus {
			z-index: 2;
		}
		.form-signin input[type="email"] {
			margin-bottom: -1px;
			border-bottom-right-radius: 0;
			border-bottom-left-radius: 0;
		}
		.form-signin input[type="password"] {
			margin-bottom: 10px;
			border-top-left-radius: 0;
			border-top-right-radius: 0;
		}
	</style>
</head>
<body>
	<?php 
	if (isset($_GET['error'])) {
		echo "<script>alert('Sai email hoặc mật khẩu');</script>";
	}
	else if (isset($_GET['logout'])) {
		echo "<script>alert('Đăng xuất thành công');</script>";
	}
	?>

	<div class="container">

		<form class="form-signin" action="login_process.php" >
			<h2 class="form-signin-heading">Đăng nhập</h2>
			<label for="inputEmail" class="sr-only">Email</label>
			<input type="email" id="inputEmail" class="form-control" placeholder="Email address" required="" autofocus="" name="email">
			<label for="inputPassword" class="sr-only">Mật khẩu</label>
			<input type="password" id="inputPassword" class="form-control" placeholder="Password" required="" name="mat_khau">
			<div class="checkbox">
				<label>
					<input type="checkbox" value="remember-me"> Remember me
				</label>
			</div>
			<button class="btn btn-lg btn-primary btn-block" type="submit" name="submit" value="1">Đăng nhập</button>
		</form>

	</div> <!-- /container -->
</body>
</html>