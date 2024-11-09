<?php
// Kết nối đến cơ sở dữ liệu
require 'connect.php';

// Kiểm tra nếu có id_binhluan được truyền qua GET
if (isset($_GET['id_binhluan'])) {
    $id_binhluan = $_GET['id_binhluan'];

    // Xóa phản hồi từ cơ sở dữ liệu
    $sql_delete = "DELETE FROM binhluan WHERE id_binhluan = $id_binhluan";
    if (mysqli_query($conn, $sql_delete)) {
        // Xóa thành công, chuyển hướng về trang trước
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    } else {
        echo "Lỗi: " . mysqli_error($conn);
    }
} else {
    echo "Không tìm thấy id_binhluan.";
}

// Đóng kết nối
mysqli_close($conn);
?>