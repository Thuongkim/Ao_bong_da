<!DOCTYPE html>
<html lang="vi">

<?php require_once 'include/head.php'; ?>
<link rel="stylesheet" type="text/css" href="css/error.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

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
				<li class="active">Đăng Kí</li>
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
				<form action="process_logup.php" method="post" enctype="multipart/form-data" class="clearfix">
					<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
						<div class="billing-details">
							<div class="section-title">
								<h3 class="title">Đăng Kí</h3>
							</div>
							<?php 
								if (isset($_GET['error_logup'])) {
									echo "<h4 class='red'>Email hoặc SĐT đã đăng kí tài khoản</h4>";
								} 
								else if (isset($_GET['error_register'])) {
									echo "<h4 class='red'>Đăng kí thất bại</h4>";
								}
								else if (isset($_GET['error_session']))
								{
									echo "<h4 class='red'>Bạn chưa đăng nhập</h4>";
								}
								else if (isset($_GET['error']))
								{
									echo "<h4 class='red'>Sai thông tin đăng kí</h4>";
								}
							 ?>
							<div class="form-group">
								<label for="ho_ten">Họ Tên:</label>
								<input class="input" type="text" name="ho_ten" id="ho_ten" placeholder="Họ tên">
								<p id="loi_ho_ten" class="loi">Tên chỉ gồm chữ và nhiều hơn 4 kí tự !</p>
							</div>
							<div class="form-group">
								<label id="gt">Giới Tính</label>
								<label class="radio radio_gioi_tinh"> &emsp;&emsp;<input type="radio" name="gioi_tinh" class="gioi_tinh" value="1" checked>Nam</label>
								<label class="radio radio_gioi_tinh"> &emsp;&emsp;<input type="radio" name="gioi_tinh" class="gioi_tinh" value="0">Nữ</label>
								<p id="loi_gioi_tinh" class="loi">Bạn chưa chọn giới tính !</p>
							</div>
							<div class="form-group">
							<label for="date">Ngày Sinh</label>
							<select name="year" id="year" size="1" class="input2"></select>
							<select name="month" id="month" size="1" class="input2"></select>
							<select name="day" id="day" size="1" class="input2">
								<option disabled value="0" selected="selected"> Ngày </option>
							</select>
							<span id="loi_nam" class="loi">Bạn chưa chọn năm sinh.</span><span id="loi_thang" class="loi">Bạn chưa chọn tháng sinh.</span><span id="loi_ngay" class="loi">Bạn chưa chọn ngày sinh.</span>
							</div>
							<div class="form-group">
							<label for="email">Email</label>
							<input id="email" type="email" class="input" placeholder="Email" name="email">
							<p id="loi_email" class="loi">Email không hợp lệ !</p>
							</div>
							<div class="form-group">
							<label for="sdt" >SĐT</label>
							<input id="sdt" type="text" name="sdt" class="input" placeholder="SĐT" >
							<p id="loi_sdt" class="loi">SĐT không tồn tại !</p>
							</div>
							<div class="form-group">
								<label for="pass1" >Mật Khẩu</label>
								<input id="pass1" type="password" name="password" class="input" data-type="password"  placeholder="Mật Khẩu">
								<p id="loi_pass1" class="loi">Mật khẩu dài hơn 4 kí tự, không gồm kí tự đặc biệt!</p>
							</div>
							<div class="form-group">
								<label for="pass2" >Nhập Lại Mật Khẩu</label>
								<input id="pass2" type="password" class="input" data-type="password"  placeholder="Nhập Lại Mật Khẩu">
								<p id="loi_pass2" class="loi">Mật khẩu không trùng khớp !</p>
							</div>
							<div class="form-group">
								<label for="dia_chi">Địa Chỉ:</label>
								<input class="input" type="text" name="dia_chi" id="dia_chi" placeholder="Địa Chỉ">
								<p id="loi_dia_chi" class="loi">Sai địa chỉ !</p>
							</div>
							<div class="form-group">
								<label for="thanh_pho">Tỉnh/TP</label>
								<select class="input" name="thanh_pho" id="thanh_pho">
									<option disabled selected value="">Tỉnh/TP</option>
									<option value="TP.HCM">TP.HCM</option>
									<option value="Hải Phòng">Hải Phòng</option>
									<option value="Hà Nội">Hà Nội</option>
								</select>
								<!-- <p id="loi_thanh_pho" class="loi">Bạn chưa chọn Tỉnh/TP !</p> -->
								<br>
							</div>
							<div class="pull-left">
								<button name="button_submit" value="1" class="primary-btn" onclick="return kiem_tra()">Đăng Kí</button>
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

	<!-- script -->
	<script>
		function kiem_tra() {
			// regex_ho_ten 
			var dem_sai = 0;
			var ho_ten = document.getElementById('ho_ten').value;
			var regex_ho_ten = /^[a-zàáâãèéêếìíòóôõùúăđĩũơưăạảấầẩẫậắằẳẵặẹẻẽềềểễệỉịọỏốồổỗộớờởỡợụủứừửữựỳỵỷỹ\s]{5,50}$/i;
			var result_ho_ten = regex_ho_ten.test(ho_ten);
			if(result_ho_ten==false){
				document.getElementById('ho_ten').style.outline = 'none';
				document.getElementById('ho_ten').style.border = 'red 1px solid';
				document.getElementById('ho_ten').focus();
				document.getElementById('loi_ho_ten').style.display = 'block';
				dem_sai = 1;
			}
			else{
				document.getElementById('ho_ten').style.outline = 'none';
				document.getElementById('ho_ten').style.border = 'green 1px solid';
				document.getElementById('loi_ho_ten').style.display = 'none';
			}

			// regex_email
			var input_email = document.getElementById('email').value;
			var regex_email = /^[a-z][a-z0-9_\.]{6,30}@[a-z0-9]{2,}(\.[a-z0-9]{2,4}){1,2}$/gm;
			var result_email = regex_email.test(input_email);
			if(result_email==false){
				document.getElementById('email').style.outline = 'none';
				document.getElementById('email').style.border = 'red 1px solid';
				document.getElementById('email').focus();
				document.getElementById('loi_email').style.display = 'block';
				dem_sai = 1;
			}
			else{
				document.getElementById('email').style.outline = 'none';
				document.getElementById('email').style.border = 'green 1px solid';
				document.getElementById('loi_email').style.display = 'none';
			}

			// result_sdt
			var input_sdt = document.getElementById('sdt').value;
			var regex_sdt = /^(0(([1-9])[0-9]{8,9}))$|^(\+84(\s?([1-9])[0-9]{8,9}))$/;
			var result_sdt = regex_sdt.test(input_sdt);
			if(result_sdt==false){
				document.getElementById('sdt').style.outline = 'none';
				document.getElementById('sdt').style.border = 'red 1px solid';
				document.getElementById('sdt').focus();
				document.getElementById('loi_sdt').style.display = 'block';
				dem_sai = 1;
			}
			else{
				document.getElementById('sdt').style.outline = 'none';
				document.getElementById('sdt').style.border = 'green 1px solid';
				document.getElementById('loi_sdt').style.display = 'none';
			}

			// regex_mat_khau
			var mat_khau = document.getElementById('pass1').value;
			var mat_khau_2 = document.getElementById('pass2').value;
			var regex_mk =/^[a-z0-9]{4,15}$/i;
			var result_mk = regex_mk.test(mat_khau);
			if (result_mk == false) {
				document.getElementById('pass1').style.outline = 'none';
				document.getElementById('pass1').style.border = 'red 1px solid';
				document.getElementById('pass1').focus();
				document.getElementById('loi_pass1').style.display = 'block';
				dem_sai = 1;
			}
			else{
				document.getElementById('pass1').style.outline = 'none';
				document.getElementById('pass1').style.border = 'green 1px solid';
				document.getElementById('loi_pass1').style.display = 'none';
			}
			if (mat_khau !== mat_khau_2 || !mat_khau_2) {
				document.getElementById('pass2').style.outline = 'none';
				document.getElementById('pass2').style.border = 'red 1px solid';
				document.getElementById('pass2').focus();
				document.getElementById('loi_pass2').style.display = 'block';
				dem_sai = 1;
			}
			else{
				document.getElementById('pass2').style.outline = 'none';
				document.getElementById('pass2').style.border = 'green 1px solid';
				document.getElementById('loi_pass2').style.display = 'none';
			} 

			// regex_dia_chi
			var dia_chi = document.getElementById('dia_chi').value;
			var regex_dia_chi = /^[a-zàáâãèéêếìíòóôõùúăđĩũơưăạảấầẩẫậắằẳẵặẹẻẽềềểễệỉịọỏốồổỗộớờởỡợụủứừửữựỳỵỷỹ\s]{3,50}$/i;
			var result_dia_chi = regex_dia_chi.test(dia_chi);
			if(result_dia_chi==false){
				document.getElementById('dia_chi').style.outline = 'none';
				document.getElementById('dia_chi').style.border = 'red 1px solid';
				document.getElementById('dia_chi').focus();
				document.getElementById('loi_dia_chi').style.display = 'block';
				dem_sai = 1;
			}
			else{
				document.getElementById('dia_chi').style.outline = 'none';
				document.getElementById('dia_chi').style.border = 'green 1px solid';
				document.getElementById('loi_dia_chi').style.display = 'none';
			}

			// gioi_tinh
			var kiem_tra_gioi_tinh = 0;
			var array_gioi_tinh = document.getElementsByClassName('gioi_tinh');
			for(var i=0;i<array_gioi_tinh.length;i++){
				if(array_gioi_tinh[i].checked==true){
					kiem_tra_gioi_tinh = 1;
					break;
				}
			}
			if(kiem_tra_gioi_tinh==0){
				document.getElementById('loi_gioi_tinh').style.display = 'block';
				var array_radio_gioi_tinh = document.getElementsByClassName('radio_gioi_tinh');
				for(var j=0;j<array_radio_gioi_tinh.length;j++){
					array_radio_gioi_tinh[j].style.color = 'red';
					document.getElementById('gt').focus();
				}
				
				dem_sai = 1;
			}
			else{
				var array_radio_gioi_tinh = document.getElementsByClassName('radio_gioi_tinh');
				for(var j=0;j<array_radio_gioi_tinh.length;j++){
					array_radio_gioi_tinh[j].style.color = 'green';
				}
				document.getElementById('loi_gioi_tinh').style.display = 'none';
			}

			// thanh_pho
			// var thanh_pho = document.getElementById('thanh_pho').value;
			// if(thanh_pho==-1){
			// 	document.getElementById('loi_thanh_pho').style.display = 'block';
			// 	document.getElementById('thanh_pho').focus();
			// 	dem_sai = 1;
			// }
			// else{
			// 	document.getElementById('thanh_pho').style.outline = 'none';
			// 	document.getElementById('thanh_pho').style.border = 'green 1px solid';
			// 	document.getElementById('loi_thanh_pho').style.display = 'none';
			// }

			// ngay_thang_nam
			var nam = document.getElementById('year').value;
			if(nam==0){
				document.getElementById('loi_nam').style.display = 'inline-block';
				document.getElementById('year').focus();
				dem_sai = 1;
			}
			else{
				document.getElementById('year').style.outline = 'none';
				document.getElementById('year').style.border = 'green 1px solid';
				document.getElementById('loi_nam').style.display = 'none';
			}

			var thang = document.getElementById('month').value;
			if(thang==0){
				document.getElementById('loi_thang').style.display = 'inline-block';
				document.getElementById('month').focus();
				dem_sai = 1;
			}
			else{
				document.getElementById('month').style.outline = 'none';
				document.getElementById('month').style.border = 'green 1px solid';
				document.getElementById('loi_thang').style.display = 'none';
			}

			var ngay = document.getElementById('day').value;
			if(ngay==0){
				document.getElementById('loi_ngay').style.display = 'inline-block';
				document.getElementById('day').focus();
				dem_sai = 1;
			}
			else{
				document.getElementById('day').style.outline = 'none';
				document.getElementById('day').style.border = 'green 1px solid';
				document.getElementById('loi_ngay').style.display = 'none';
			}

			if(dem_sai==1)
			{
				return false;
			}
		}
		//ngày tháng năm
			$(function(){
			//Năm tự động điền vào select
			var seYear = $('#year');
			var date = new Date();
			var cur = date.getFullYear();

			seYear.append('<option disabled selected value="0"> Năm </option>');
			for (i = cur; i >= 1940; i--) {
				seYear.append('<option value="'+i+'">'+i+'</option>');
			};
			
			    //Tháng tự động điền vào select
			    var seMonth = $('#month');
			    var date = new Date();
			    
			    var month=new Array();
			    month = ["","Tháng 1","Tháng 2","Tháng 3","Tháng 4","Tháng 5","Tháng 6","Tháng 7","Tháng 8","Tháng 9","Tháng 10","Tháng 11","Tháng 12"]

			    seMonth.append('<option disabled selected value="0"> Tháng </option>');
			    for (i = 1; i < 13; i++) {
			    	seMonth.append('<option value="'+i+'">'+month[i]+'</option>');
			    };
			    
			    //Ngày tự động điền vào select
			    function dayList(month,year) {
			    	var day = new Date(year, month, 0);
			    	return day.getDate();
			    }    
			    
			    $('#year, #month').change(function(){
			    	var y = document.getElementById('year');
			    	var m = document.getElementById('month');
			    	var d = document.getElementById('day');
			    	
			    	var year = y.options[y.selectedIndex].value;
			    	var month = m.options[m.selectedIndex].value;
			    	var day = d.options[d.selectedIndex].value;
			    	if (day == 0) {
			    		var days = (year == ' ' || month == ' ')? 31 : dayList(month,year);
			    		d.options.length = 0;
			    		d.options[d.options.length] = new Option(' Ngày ',' ');
			    		for (var i = 1; i <= days; i++)
			    			d.options[d.options.length] = new Option(i,i);
			    	}
			    });
			});
	</script>
	<!-- /script -->

	<!-- FOOTER -->
	<?php require_once 'include/footer.php'; ?>
	<!-- /FOOTER -->

</body>

</html>
