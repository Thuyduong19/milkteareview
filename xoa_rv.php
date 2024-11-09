<?php
// Kết nối đến cơ sở dữ liệu
require 'connect.php';

// Kiểm tra nếu có id_danhgia được truyền qua GET
if (isset($_GET['id_danhgia'])) {
    $id_danhgia = $_GET['id_danhgia'];

    // Xóa tất cả các phản hồi liên quan đến đánh giá
    $sql_delete_replies = "DELETE FROM binhluan WHERE id_danhgia = $id_danhgia";
    if (mysqli_query($conn, $sql_delete_replies)) {
        // Sau khi xóa các phản hồi, tiếp tục xóa đánh giá
        $sql_delete_review = "DELETE FROM danhgia WHERE id_danhgia = $id_danhgia";
        if (mysqli_query($conn, $sql_delete_review)) {
            // Xóa thành công, chuyển hướng về trang trước
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        } else {
            echo "Lỗi: " . mysqli_error($conn);
        }
    } else {
        echo "Lỗi: " . mysqli_error($conn);
    }
} else {
    echo "Không tìm thấy id_danhgia.";
}

// Đóng kết nối
mysqli_close($conn);
?>
