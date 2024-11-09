<?php
require 'connect.php';

if (isset($_POST['btn-reg'])) {
  $tieude = $_POST['tieude'];
  $noidung = $_POST['noidung'];
  $rating = $_POST['selectedRating'];
  $id_dichvu = $_POST['id_dichvu']; 
  $user = $_POST['id_nguoidung']; 

  $sql = "INSERT INTO `danhgia` (`id_nguoidung`, `id_dichvu`, `tieude`, `noidung`, `sosao`, `trangthai`) VALUES ('$user','$id_dichvu','$tieude','$noidung','$rating', 'pending')"; 

  if ($conn->query($sql) === TRUE) {
    echo "<script> alert('Bài viết của bạn sẽ xuất hiện khi được phê duyệt.');
    window.location.href = 'detail.php?id_dichvu=" . $id_dichvu . "';</script>";
   
  } else {
    echo "Lỗi: " . $conn->error;
  }
}

$conn->close(); 
?>