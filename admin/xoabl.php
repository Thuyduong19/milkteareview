<?php
// Kết nối đến cơ sở dữ liệu
include '../connect_db.php';

// Kiểm tra nếu có id_binhluan được truyền qua GET
if (isset($_GET['id_binhluan'])) {
    $id_binhluan = $_GET['id_binhluan'];

    // Xóa phản hồi từ cơ sở dữ liệu
    $sql_delete = "DELETE FROM binhluan WHERE id_binhluan = $id_binhluan";
    if (mysqli_query($con, $sql_delete)) {
        // Xóa thành công, chuyển hướng về trang trước
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    } else {
        echo "Lỗi: " . mysqli_error($con);
    }
} else {
    echo "Không tìm thấy id_binhluan.";
}

// Đóng kết nối
mysqli_close($con);
?>