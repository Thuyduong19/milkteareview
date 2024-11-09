<?php
$localhost="localhost";
$username="root";
$password="";
$dbname="review";

$conn= new mysqli($localhost,$username,$password,$dbname);
if($conn->connect_error){
    die("kết nối lỗi:".$conn->connect_error);
}

// Hàm để lấy thông tin người dùng từ cơ sở dữ liệu
function getUserInfo($conn, $email, $pass) {
    $email = $conn->real_escape_string($email);
    $pass = $conn->real_escape_string($pass);
    
    $sql = "SELECT * FROM nguoidung WHERE email='$email' AND matkhau='$pass'";
    $result = $conn->query($sql);
    
    if ($result && $result->num_rows > 0) {
        return $result->fetch_assoc();//mảng liên kết
    } else {
        return null;
    }
}
?>
