<?php
$file_header_admin = "../login.php";
require_once '../check_admin.php';
if (isset($_POST['submit'])) {
     $file          = $_FILES['anh'];
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
        $san = $_POST['san'];
        if ($san == 0) {
            $ten = $_POST['ten']." sân nhà";
        } else {
            $ten = $_POST['ten']." sân khách";
        }
        $kich_co = $_POST['kich_co'];
        $mo_ta = $_POST['mo_ta'];
        $ma_clb = $_POST['ma_clb'];
        $gia          = $_POST['gia'];
        $so_luong     = $_POST['so_luong'];
        $anh          = $file_name;
        include('../connect_database.php');
        $query = "insert into 
        san_pham(ten_san_pham,gia,so_luong_da_nhap,anh,kich_co,mo_ta,san_nha,ma_cau_lac_bo) 
        values ('$ten','$gia','$so_luong','$anh','$kich_co','$mo_ta','$san','$ma_clb')";
        mysqli_query($connect,$query);
        $error = mysqli_error($connect);
        mysqli_close($connect);
        if(empty($error)){
            header("location:view.php?success");
        }
        else {
            header("location:form_insert.php?error");
        }
    }
    else {
        header("location:form_insert.php?error");
    }
}
 else {
    header("location:form_insert.php?error");
}



