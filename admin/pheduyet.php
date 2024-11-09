<?php
include '../connect_db.php';// File kết nối cơ sở dữ liệu

if (isset($_GET['id_danhgia'])) {
    $id = $_GET['id_danhgia'];
    $sql = "UPDATE danhgia SET trangthai = 'approved' WHERE id_danhgia = $id";

    if ($con->query($sql) === TRUE) {
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    } else {
        echo "Error: " . $con->error;
    }
} else {
    echo "Không tồn tại bài viết.";
}
?>
<a href='index.php'>Go back</a>