<?php 
	require_once '../connect_database.php';
	if (isset($_POST['submit'])) {
		$ma = $_POST['ma'];
		$ten = $_POST['ten'];
		$gia = $_POST['gia'];
		$so_luong = $_POST['so_luong'];
		$kich_co = $_POST['kich_co'];
		$ma_clb = $_POST['ma_clb'];
		$file            = $_FILES['anh_moi'];
		if (file_exists($file['tmp_name'])) {
			$imageFileType = strtolower(pathinfo($file["name"],PATHINFO_EXTENSION));
		     $file_name     = time(). ".$imageFileType";
		     $target_dir    = "img/";
		     $target_file   = $target_dir . $file_name;

		     $uploadOk = 1;
		     if(isset($_POST["submit"])) {
		        $check = getimagesize($file["tmp_name"]);
		        if($check !== false) {
		            $uploadOk = 1;
		        } else {
		            $uploadOk = 0;
		        }
		    }
		    // Check if file already exists
		    if (file_exists($target_file)) {
		        $uploadOk = 0;
		    }
		    // Check file size
		    if ($file["size"] > 500000) {
		        $uploadOk = 0;
		    }
		    // Allow certain file formats
		    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
		        && $imageFileType != "gif" ) {
		        $uploadOk = 0;
		    }
		    // Check if $uploadOk is set to 0 by an error
		    if ($uploadOk == 1) {
		        if (move_uploaded_file($file["tmp_name"], $target_file)) {
		            $uploadOk = 1;
		        } else {
		            $uploadOk = 0;
		        }
		    }

		    if($uploadOk!=0){
		    	$anh = $file_name;
		    	$query = "update san_pham set ten_san_pham='$ten',gia='$gia',so_luong_da_nhap='$so_luong',
		    	kich_co='$kich_co',anh='$anh',ma_cau_lac_bo='$ma_clb' where ma_san_pham='$ma'";
		    }
		    else {
		    	header('location:form_edit.php?edit_error');
		    }
		} 
		else {
			$query = "update san_pham set ten_san_pham='$ten',gia='$gia',so_luong_da_nhap='$so_luong',
			kich_co='$kich_co',ma_cau_lac_bo='$ma_clb' where ma_san_pham='$ma'";
		}
		include '../connect_database.php';
		mysqli_query($connect,$query);
		$error = mysqli_error($connect);
		if (empty($error)) {
			if(file_exists($file['tmp_name'])){
			$anh_cu = $_POST['anh_cu'];
			$target_file = $target_dir . $anh_cu;
			unlink($target_file);
			}
			header('location:view.php?success');
		}
		else {
			header('location:form_edit.php?edit_error');
		}
		mysqli_close($connect);
	} 
	else {
		header('location:form_edit.php?edit_error');
	}
	
 ?>
