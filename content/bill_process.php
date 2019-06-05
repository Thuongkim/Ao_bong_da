<?php
$file = "../index.php";
require_once 'check_customer.php';
$dem = 0;
foreach ($_SESSION['cart'] as $id => $product) {
	$dem= $dem + $product['so_luong'];
}
if (!empty($_SESSION['cart']) && $dem <= 100) {
	if (isset($_GET['submit']) && !empty($_GET['ten_nguoi_nhan']) && !empty($_GET['sdt']) && !empty($_GET['dia_chi'])) {
		require_once '../include/connect_database.php';
			// kiểm tra số lượng sản phẩm còn trong kho
		foreach ($_SESSION['cart'] as $id => $product) {
			$ma_san_pham = $id;
			$query_sp = "select sum(so_luong),so_luong_da_nhap,ten_san_pham from hoa_don_chi_tiet
			join hoa_don on hoa_don_chi_tiet.ma_hoa_don = hoa_don.ma_hoa_don
			join san_pham on san_pham.ma_san_pham = hoa_don_chi_tiet.ma_san_pham
			where san_pham.ma_san_pham = '$ma_san_pham' and tinh_trang != 3";
			$result_sp = mysqli_query($connect,$query_sp);
			$row_sp = mysqli_fetch_array($result_sp);
			$so_luong_da_mua = $row_sp['sum(so_luong)'];
			$so_luong_da_nhap = $row_sp['so_luong_da_nhap'];
			$so_con_lai = $so_luong_da_nhap - $so_luong_da_mua;
			if ($so_con_lai < $product['so_luong']) {
				// lấy tên sản phẩm hiển thị trên đường link trả về.
				$ten_san_pham = $row_sp['ten_san_pham'];
				$check = false;
				break;
			} else {
				$check = true;
			}
		}

		if ($check == true) {
			$ten_nguoi_nhan = $_GET['ten_nguoi_nhan'];
			$sdt = $_GET['sdt'];
			$dia_chi = $_GET['dia_chi'];

			$query = "select max(ma_hoa_don) from hoa_don";
			$result = mysqli_query($connect,$query);
			$row = mysqli_fetch_array($result);

			if (isset($row['max(ma_hoa_don)'])) {
				$ma_hoa_don = $row['max(ma_hoa_don)'] + 1;
			}
			else {
				$ma_hoa_don = 1;
			}
			
			$ma_khach_hang = $_SESSION['ma_khach_hang'];

			$tong_tien = 0;
			foreach ($_SESSION['cart'] as $id => $product) {
				$tong_tien= $tong_tien + ($product['so_luong'] * $product['gia']);
			}

			// while (true) {
			$query = "insert into hoa_don
			(ma_hoa_don,ma_khach_hang,thanh_tien,tinh_trang,nguoi_nhan,sdt_nguoi_nhan,dia_chi)
			values('$ma_hoa_don','$ma_khach_hang','$tong_tien',1,'$ten_nguoi_nhan','$sdt','$dia_chi')";
			mysqli_query($connect,$query);
			$error = mysqli_error($connect);
			// if(empty($error)){
			// 	break;
			// }
			// else{
			// 	$ma_hoa_don++;
			// 	}
			// }


			foreach ($_SESSION['cart'] as $id => $product) {
				$so_luong = $product['so_luong'];
				$query = "insert into hoa_don_chi_tiet (ma_hoa_don,ma_san_pham,so_luong) 
				values ('$ma_hoa_don','$id','$so_luong')";
				mysqli_query($connect,$query);
			}

			// kiểm tra còn hàng ko khi 2 khách hàng mua cùng lúc 1 sp
			foreach ($_SESSION['cart'] as $id => $product) {
				$ma_san_pham = $id;
				$query_sp = "select sum(so_luong),so_luong_da_nhap,ten_san_pham from hoa_don_chi_tiet
				join hoa_don on hoa_don_chi_tiet.ma_hoa_don = hoa_don.ma_hoa_don
				join san_pham on san_pham.ma_san_pham = hoa_don_chi_tiet.ma_san_pham
				where san_pham.ma_san_pham = '$ma_san_pham' and tinh_trang != 3";
				$result_sp = mysqli_query($connect,$query_sp);
				$row_sp = mysqli_fetch_array($result_sp);
				$so_luong_da_mua = $row_sp['sum(so_luong)'];
				$so_luong_da_nhap = $row_sp['so_luong_da_nhap'];
				if ($so_luong_da_nhap < $so_luong_da_mua) {
					$kiem_tra = false;
					$query_dl1 = "delete * from hoa_don_chi_tiet where ma_hoa_don='$ma_hoa_don'";
					mysqli_query($connect,$query_dl1);

					$query_dl2 = "delete * from hoa_don where ma_hoa_don='$ma_hoa_don'";
					mysqli_query($connect,$query_dl2);
					break;
				} else {
					$kiem_tra = true;
				}
			}
			if ($kiem_tra == true) {
				mysqli_close($connect);
				unset($_SESSION['cart']);
				header('location:../checkout.php?success');
			} else {
				header('location:../checkout.php?error_quantity&ten='.$ten_san_pham);
			}
			
		} else {
				header('location:../checkout.php?error_quantity&ten='.$ten_san_pham);
		}
	} else {
			header('location:../checkout.php?error');
	}

} else {
		header('location:../checkout.php?error');
}

?>			