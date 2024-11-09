<?php
require 'connect.php';
$tên=$_POST['tên'];
$email=$_POST['email'];
$mậtkhẩu=$_POST['mậtkhẩu'];
if(!empty($tên)&&!empty($email)&&!empty($mậtkhẩu)){
    $sql="INSERT INTO `nguoidung`(`hoten`,`email`,`matkhau`) VALUES ('$tên', '$email',md5('$mậtkhẩu'))";
    if($conn->query($sql)===TRUE){
        echo "<script> 
        alert('Tạo tài khoản thành công');
        window.location.href = 'dangnhap.php'; </script>";
        
    }else{
        echo "Lỗi {$sql}".$conn->error;
    }
}else{
    echo "<script> 
        alert('Vui lòng nhập đủ thông tin');
        window.location.href = 'dangnhap.php'; </script>";
}
?>
