<!DOCTYPE html>
<html lang="en">

<?php require_once 'include/head.php'; ?>

<body>
	<!-- HEADER -->
	<?php require_once 'include/header.php'; ?>
	<!-- /HEADER -->

	<!-- NAVIGATION -->
	<?php require_once 'include/menu.php';  ?>
	<!-- /NAVIGATION -->
	
	<?php 
		if (isset($_GET['ma_san_pham']) && isset($_GET['ma_cau_lac_bo'])) {
			$ma_san_pham = $_GET['ma_san_pham'];
			$ma_cau_lac_bo = $_GET['ma_cau_lac_bo'];
			$query_sp = "select * from san_pham where ma_san_pham='$ma_san_pham'";
			$result_sp = mysqli_query($connect,$query_sp);
			$row_sp = mysqli_fetch_array($result_sp);
	?>
	
	<!-- BREADCRUMB -->
	<div id="breadcrumb">
		<div class="container">
			<ul class="breadcrumb">
				<li><a href="index.php">Trang chủ</a></li>
				<li class="active"><?php echo $row_sp['ten_san_pham'] ?></li>
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
				<!--  Product Details -->
				<div class="product product-details clearfix">
					<div class="col-md-6">
						<div id="product-main-view">
							<div class="product-view">
								<img src="admin/product/img/<?php echo $row_sp['anh'] ?>" alt="">
							</div>
						</div>
						<!-- <div id="product-view">
							<div class="product-view">
								<img src="./img/thumb-product01.jpg" alt="">
							</div>
						</div> -->
					</div>
					<div class="col-md-6">
						<div class="product-body">
							<div class="product-label">
								<span class="sale">New</span>
								<!-- <span class="sale">-20%</span> -->
							</div>
							<h2 class="product-name"><?php echo $row_sp['ten_san_pham'] ?></h2>
							<h3 class="product-price"><?php echo $row_sp['gia'] ?>đ<!-- <del class="product-old-price">$45.00</del> --></h3>
							<div>
								<div class="product-rating">
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
								</div>
								<!-- <a href="#">3 Review(s) / Add Review</a> -->
							</div>
							<p><strong>Mô tả:</strong> <?php echo $row_sp['mo_ta'] ?></p>
							
							<!-- <p><strong>Size:</strong></p> -->
							<p> Chúng tôi mang đến nhiều mẫu áo câu lạc bộ, áo khoác gió thể thao, áo dài tay thể thao, quần áo khoác thể thao, bộ quần áo bóng đá, áo không logo và có logo đủ phong cách với các chất liệu và đa dạng màu sắc cực kỳ đa dạng cho khách hàng thoải mái lựa chọn.</p>
							<div class="product-options">
								<ul class="size-option">
									<li><span class="text-uppercase">Size:</span></li>
									<li class="active"><a href="#"><?php echo $row_sp['kich_co'] ?></a></li>
									<!-- <li><a href="#">XL</a></li>
									<li><a href="#">SL</a></li> -->
								</ul>
								<!-- <ul class="color-option">
									<li><span class="text-uppercase">Color:</span></li>
									<li class="active"><a href="#" style="background-color:#475984;"></a></li>
									<li><a href="#" style="background-color:#8A2454;"></a></li>
									<li><a href="#" style="background-color:#BF6989;"></a></li>
									<li><a href="#" style="background-color:#9A54D8;"></a></li>
								</ul> -->
							</div>

							<form action="content/process_content.php">
								<div class="product-btns">
								<div class="qty-input">
									<span>Số Lượng: </span>
									<input class="input" type="text" name="quantity" pattern="[1-9]{1}[0-9]{0,2}" title="Số lượng không đúng hoặc quá 3 chữ số " value="1">
									<input type="hidden" name="id" value="<?php echo $ma_san_pham?>">
								</div>
								<button class="primary-btn add-to-cart" name="action" type="submit"><i class="fa fa-shopping-cart"></i> Thêm Vào Giỏ</button>
							</form>
								<!-- <div class="pull-right">
									<button class="main-btn icon-btn"><i class="fa fa-heart"></i></button>
									<button class="main-btn icon-btn"><i class="fa fa-exchange"></i></button>
									<button class="main-btn icon-btn"><i class="fa fa-share-alt"></i></button>
								</div> -->
							</div>
						</div>
					</div>
					<!-- <div class="col-md-12">
						<div class="product-tab">
							<ul class="tab-nav">
								<li class="active"><a data-toggle="tab" href="#tab1">Description</a></li>
								<li><a data-toggle="tab" href="#tab1">Details</a></li>
								<li><a data-toggle="tab" href="#tab2">Reviews (3)</a></li>
							</ul>
							<div class="tab-content">
								<div id="tab1" class="tab-pane fade in active">
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute
										irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
								</div>
								<div id="tab2" class="tab-pane fade in">

									<div class="row">
										<div class="col-md-6">
											<div class="product-reviews">
												<div class="single-review">
													<div class="review-heading">
														<div><a href="#"><i class="fa fa-user-o"></i> John</a></div>
														<div><a href="#"><i class="fa fa-clock-o"></i> 27 DEC 2017 / 8:0 PM</a></div>
														<div class="review-rating pull-right">
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star-o empty"></i>
														</div>
													</div>
													<div class="review-body">
														<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Duis aute
															irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
													</div>
												</div>

												<div class="single-review">
													<div class="review-heading">
														<div><a href="#"><i class="fa fa-user-o"></i> John</a></div>
														<div><a href="#"><i class="fa fa-clock-o"></i> 27 DEC 2017 / 8:0 PM</a></div>
														<div class="review-rating pull-right">
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star-o empty"></i>
														</div>
													</div>
													<div class="review-body">
														<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Duis aute
															irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
													</div>
												</div>

												<div class="single-review">
													<div class="review-heading">
														<div><a href="#"><i class="fa fa-user-o"></i> John</a></div>
														<div><a href="#"><i class="fa fa-clock-o"></i> 27 DEC 2017 / 8:0 PM</a></div>
														<div class="review-rating pull-right">
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star-o empty"></i>
														</div>
													</div>
													<div class="review-body">
														<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Duis aute
															irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
													</div>
												</div>

												<ul class="reviews-pages">
													<li class="active">1</li>
													<li><a href="#">2</a></li>
													<li><a href="#">3</a></li>
													<li><a href="#"><i class="fa fa-caret-right"></i></a></li>
												</ul>
											</div>
										</div>
										<div class="col-md-6">
											<h4 class="text-uppercase">Write Your Review</h4>
											<p>Your email address will not be published.</p>
											<form class="review-form">
												<div class="form-group">
													<input class="input" type="text" placeholder="Your Name" />
												</div>
												<div class="form-group">
													<input class="input" type="email" placeholder="Email Address" />
												</div>
												<div class="form-group">
													<textarea class="input" placeholder="Your review"></textarea>
												</div>
												<div class="form-group">
													<div class="input-rating">
														<strong class="text-uppercase">Your Rating: </strong>
														<div class="stars">
															<input type="radio" id="star5" name="rating" value="5" /><label for="star5"></label>
															<input type="radio" id="star4" name="rating" value="4" /><label for="star4"></label>
															<input type="radio" id="star3" name="rating" value="3" /><label for="star3"></label>
															<input type="radio" id="star2" name="rating" value="2" /><label for="star2"></label>
															<input type="radio" id="star1" name="rating" value="1" /><label for="star1"></label>
														</div>
													</div>
												</div>
												<button class="primary-btn">Submit</button>
											</form>
										</div>
									</div>



								</div>
							</div>
						</div>
					</div> -->

				</div>
				<!-- /Product Details -->
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /section -->
	<?php
		} else {
			echo "<script>window.history.back()</script>";
		}
		
	 ?>

	<!-- section -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
		<div class="row">
			<!-- section-title -->
			<div class="col-md-12">
				<div class="section-title">
					<h2 class="title"><a href="#">Sản phẩm liên quan</a></h2>
					<div class="pull-right">
						<div class="product-slick-dots-1 custom-dots"></div>
					</div>
				</div>
			</div>
			<!-- /section-title -->



			<!-- Product Slick -->
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="row">
					<div class="product-slick-1 product-slick">
						<!-- Product Single -->
						<?php 
							
							$query = "select * from san_pham where ma_cau_lac_bo = '$ma_cau_lac_bo' order by ten_san_pham ASC";
							$result = mysqli_query($connect,$query);
							while ($row = mysqli_fetch_array($result)) {
						?>
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
									<a href="product-page.php?ma_san_pham=<?php echo $row['ma_san_pham'] ?>&ma_cau_lac_bo=<?php echo $ma_cau_lac_bo ?>">
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
						<?php
							}
						 ?>
							
						<!-- /Product Single -->

					</div>
				</div>
			</div>
			<!-- /Product Slick -->
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
