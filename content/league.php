
<!-- HOME -->
<div id="home">
	<!-- container -->
	<div class="container">
		<!-- home wrap -->
		<div class="home-wrap">
			<!-- home slick -->
			<div id="home-slick">
				<!-- banner -->
				<div class="banner banner-1">
					<img src="./img/slide1.jpg" alt="" >
					<div class="banner-caption text-right">
						<h1 class="primary-color">Siêu Giảm Giá</h1>
						<h3 class="white-color font-weak">Lên Tới 50% </h3>
						<button class="primary-btn">Mua Ngay</button>
					</div>
				</div>
				<!-- /banner -->

				<!-- banner -->
				<div class="banner banner-1">
					<img src="./img/slide2.jpg" alt="">
				</div>
				<!-- /banner -->
			</div>
			<!-- /home slick -->
		</div>
		<!-- /home wrap -->
	</div>
	<!-- /container -->
</div>
<!-- /HOME -->

<!-- section -->
<div class="section">
	<!-- container -->
	<div class="container">
		<?php 
		if (empty($_GET['ma_cau_lac_bo'])) {
			header('location:../index.php');
		} else {
			$ma_cau_lac_bo = $_GET['ma_cau_lac_bo'];
			$query_clb = "select * from san_pham
			join cau_lac_bo on san_pham.ma_cau_lac_bo = cau_lac_bo.ma_cau_lac_bo
			where cau_lac_bo.ma_cau_lac_bo='$ma_cau_lac_bo'";
			$result_clb = mysqli_query($connect,$query_clb);
			?>

			<!-- row -->
			<div class="row">
				<!-- section-title -->
				<div class="col-md-12">
					<div class="section-title">
						<?php 
							$query = "select * from cau_lac_bo 
							where ma_cau_lac_bo='$ma_cau_lac_bo'";
							$result =  mysqli_query($connect,$query);
						 ?>
						<h2 class="title"><a href="#"><?php echo mysqli_fetch_array($result)['ten_cau_lac_bo'] ?></a></h2>
						<div class="pull-right">
							<div class="product-slick-dots-1 custom-dots"></div>
						</div>
					</div>
				</div>
				<!-- /section-title -->

				<!-- Product Single -->
				<?php
				while ($row = mysqli_fetch_array($result_clb)) {
					?>
					<div class="col-md-3 col-sm-6 col-xs-6">
						<div class=" product product-single">
							<div class="product-thumb">
								<div class="product-label">
									<span class="sale">New</span>
									<!-- <span class="sale">-20%</span> -->
								</div>
									<!-- <ul class="product-countdown">
										<li><span>00 H</span></li>
										<li><span>00 M</span></li>
										<li><span>00 S</span></li>
									</ul> -->
									<a href="../Ao_bong_da/product-page.php?ma_san_pham=<?php echo $row['ma_san_pham'] ?>&ma_cau_lac_bo=<?php echo $ma_cau_lac_bo ?>">
										<button class="main-btn quick-view"><i class="fa fa-search-plus"></i> Xem </button>
									</a>
									<img src="./admin/product/img/<?php echo $row['anh']; ?>" alt="">
								</div>
								<div class="product-body">
									<h3 class="product-price"><?php echo $row['gia']; ?>đ<!-- <del class="product-old-price">$45.00</del> --></h3>
									<div class="product-rating">
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
									</div>
									<h2 class="product-name"><a href="#"><?php echo $row['ten_san_pham']; ?></a></h2>
									<div class="product-btns">
										<!-- <button class="main-btn icon-btn"><i class="fa fa-heart"></i></button>
											<button class="main-btn icon-btn"><i class="fa fa-exchange"></i></button> -->
											<a href="content/process_content.php?action&id=<?php echo $row['ma_san_pham']; ?>"><button class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm Vào Giỏ</button></a>
										</div>
									</div>
								</div>
							</div>
							<?php
						}
						?>
					</div>
					<!-- /row -->
					<?php
				}
				mysqli_close($connect);
				?>

			</div>
			<!-- /container -->
		</div>
		<!-- /section -->