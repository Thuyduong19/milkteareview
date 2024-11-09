<?php
require 'connect.php';
if(isset($_POST['traloi'])){
    $id_danhgia=$_POST['id_danhgia'];
    $user = $_POST['id_nguoidung'];
    $noidung = $_POST['noidung'];
    $sql = "INSERT INTO `binhluan` (`id_danhgia`,`id_nguoidung`,`noidung`) VALUES ('$id_danhgia','$user','$noidung')";
    $sql_dichvu = "SELECT id_dichvu FROM danhgia WHERE id_danhgia = '$id_danhgia'";
    $result= mysqli_query($conn, $sql_dichvu);
    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $id_dichvu = $row['id_dichvu'];
        if($conn->query($sql) === TRUE){
            echo '<div class="alert alert-success">Bạn đã trả lời review thành công!</div>';
            header('Location: detail.php?id_dichvu=' . $id_dichvu);
            exit; // Dừng script tại đây để đảm bảo header hoạt động đúng
        } else {
            echo "Lỗi: {$sql} - " . $conn->error;
        }
    } else {
        echo "Lỗi khi truy vấn id_dichvu: " . $conn->error;
    }
}
?>


