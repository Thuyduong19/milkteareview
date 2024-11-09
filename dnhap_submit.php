<?php
include 'connect.php';
session_start();
if(isset($_POST["submit"]) && $_POST["email"]!='' && $_POST["pass"]!=''){
        $email=$_POST["email"];
        $pass=$_POST["pass"];
        $pass=md5($pass);
    $sql=" SELECT id_nguoidung, hoten from nguoidung where email='$email' and matkhau='$pass'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);

        // Lưu trữ cả ID và tên người dùng trong session
        $_SESSION['user'] = $user
        ;

        header("location:index.php");
    } else {
        echo "<script> alert('Bạn nhập sai Email hoặc password');
        window.location.href = 'dangnhap.php';</script>";
    }
} else {
    header("location:dangnhap.php");
}

?>


