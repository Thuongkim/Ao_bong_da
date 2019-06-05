<!-- NAVIGATION -->
	<div id="navigation">
		<!-- container -->
		<div class="container">
			<div id="responsive-nav">
				<!-- category nav -->
				<?php if (!empty($ma_trang)) { ?>
				<div class="category-nav">
				<?php
				} else {
				?>
				<div class="category-nav  show-on-click">
				<?php
				}
				?>
					<span class="category-header">Danh Mục Sản Phẩm <i class="fa fa-list"></i></span>
					<ul class="category-list">
						<?php 
								require 'connect_database.php';
								$query = "select * from cau_lac_bo order by ma_cau_lac_bo";
								$result = mysqli_query($connect,$query);
								while ($row = mysqli_fetch_array($result)) { ?>
						<li >
							<a href="../Ao_bong_da/index.php?ma_cau_lac_bo=<?php echo $row['ma_cau_lac_bo'] ?>"><?php echo $row['ten_cau_lac_bo'] ?></a>
							
							<!-- <div class="custom-menu"> -->
								<!-- <div class="row">
									<div class="col-md-4">
										<ul class="list-links">
											<li><a href="#">Áo Manchester United 2019</a></li>
											<li><a href="#">Áo Manchester City 2019</a></li>
											<li><a href="#">Áo Chelsea 2019</a></li>
										</ul>
										<hr class="hidden-md hidden-lg">
									</div>
									<div class="col-md-4">
										<ul class="list-links">
											<li><a href="#">Áo Arsenal 2019</a></li>
											<li><a href="#">Áo Liverpool 2019</a></li>
											<li><a href="#">Áo Tottenham Hotspur 2019</a></li>
										</ul>
										<hr class="hidden-md hidden-lg">
									</div>
									<div class="col-md-4">
										<ul class="list-links">
											<li><a href="#">Áo Newcatle United 2019</a></li>
											<li><a href="#">Áo Leicester City 2019</a></li>
										</ul>
										<hr class="hidden-md hidden-lg">
									</div>
								</div>
								<div class="row hidden-sm hidden-xs">
									<div class="col-md-12">
										<hr>
										<a class="banner banner-1" href="#">
											<img src="./img/PremierLeague.png" alt="">
										</a>
									</div>
								</div>
							</div> -->
						</li>
						<?php
								}
							 ?>
						<!-- <li class="dropdown side-dropdown">
							<a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">Áo Clb Tây Ban Nha (Laliga) <i class="fa fa-angle-right"></i></a>
							<div class="custom-menu">
								<div class="row">
									<div class="col-md-6">
										<ul class="list-links">
											<li><a href="#">Áo Barcelona 2019</a></li>
											<li><a href="#">Áo Atlentico Madrid 2019</a></li>
											<li><a href="#">Áo Real Madrid 2019</a></li>
										</ul><br><br><br><br><br>
										<hr>
									</div>
									<div class="col-md-6 hidden-sm hidden-xs">
										<a class="banner banner-2" href="#">
											<img src="./img/laliga.png" alt="" >
										</a>
									</div>
								</div>
							</div>
						</li>
						<li class="dropdown side-dropdown">
							<a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">Áo Clb Ý (Serie A) <i class="fa fa-angle-right"></i></a>
							<div class="custom-menu">
								<div class="row">
									<div class="col-md-6">
										<ul class="list-links">
											<li><a href="#">Áo Juventus 2019</a></li>
											<li><a href="#">Áo AC Milan 2019</a></li>
											<li><a href="#">Áo Inter Milan 2019</a></li>
											<li><a href="#">Áo AS Roma 2019</a></li>
											<li><a href="#">Áo Napoli 2019</a></li>
										</ul><br><br><br>
										<hr>
									</div>
									<div class="col-md-6 hidden-sm hidden-xs">
										<a class="banner banner-2" href="#">
											<img src="./img/serie a.jpg" alt="" >
											<div class="banner-caption">
												<h3 class="white-color">SERIE A</h3>
											</div>
										</a>
									</div>
								</div>
							</div>
						</li>
						<li class="dropdown side-dropdown">
							<a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">Áo Clb Đức (Bundesliga) <i class="fa fa-angle-right"></i></a>
							<div class="custom-menu">
								<div class="row">
									<div class="col-md-6">
										<ul class="list-links">
											<li><a href="#">Áo Bayern 2019</a></li>
											<li><a href="#">Áo Dortmund 2019</a></li>
											<li><a href="#">Áo Wolfburg 2019</a></li>
										</ul><br><br><br><br><br><br>
										<hr>
									</div>
									<div class="col-md-6 hidden-sm hidden-xs">
										<a class="banner banner-2" href="#">
											<img src="./img/Bundesliga.jpg" alt="" >
											
										</a>
									</div>
								</div>
							</div>
						</li>
						<li class="dropdown side-dropdown">
							<a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">Áo Clb Pháp (League 1) <i class="fa fa-angle-right"></i></a>
							<div class="custom-menu">
								<div class="row">
									<div class="col-md-6">
										<ul class="list-links">
											<li><a href="#">Áo PSG 2019</a></li>
											<li><a href="#">Áo Olympic Lyon 2019</a></li>
											<li><a href="#">Áo AS Monaco 2019</a></li>
										</ul><br><br><br><br><br>
										<hr>
									</div>
									<div class="col-md-6 hidden-sm hidden-xs">
										<a class="banner banner-2" href="#">
											<img src="./img/l1.png" alt="" >
										</a>
									</div>
								</div>
							</div>
						</li>
						<li><a href="#">Áo Clb Khác</a></li> -->
					</ul>
				</div>
				<!-- /category nav -->

				<!-- menu nav -->
				<div class="menu-nav">
					<span class="menu-header">Menu <i class="fa fa-bars"></i></span>
					<ul class="menu-list">
						<li class="col-md-2 hotline"><a href="tel:0978008392"><i class="fa fa-mobile" aria-hidden="true"></i>ĐIỆN THOẠI<br><span class="hl">0123.456.789</span></a></li>
						
						<li class="col-md-2 "><a rel="nofollow"><i class="fa fa-truck" aria-hidden="true"></i>GIAO HÀNG<br>TOÀN QUỐC</a></li>
						
						<li class="col-md-2 "><a rel="nofollow"><i class="fa fa-home" aria-hidden="true"></i>THANH TOÁN<br>TẠI NHÀ</a></li>
						
						<li class="col-md-2 "><a rel="nofollow"><i class="fa fa-undo" aria-hidden="true"></i>ĐỔI TRẢ<br>
						TRONG 7 NGÀY</a></li>
						
					</ul>
				</div>
				<!-- menu nav -->
			</div>
		</div>
		<!-- /container -->
	</div>
	<!--  /NAVIGATION -->