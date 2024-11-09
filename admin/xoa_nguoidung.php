<?php
session_start();
include '../connect_db.php';
include '../function.php';

if (!empty($_SESSION['current_user']) && isset($_GET['id_nguoidung']) && !empty($_GET['id_nguoidung'])) {
    $makh = $_GET['id_nguoidung'];

    if (isset($_GET['confirm']) && $_GET['confirm'] === 'true') {
        // Bắt đầu giao dịch
        mysqli_begin_transaction($con);

        try {
            $deleteReviews = mysqli_query($con, "DELETE FROM Binhluan WHERE id_nguoidung = '$makh'");
            if (!$deleteReviews) {
                throw new Exception("Không thể xóa các Bình luận của người dùng.");
            }

            // Xóa các đánh giá liên quan đến người dùng
            $deleteReviews = mysqli_query($con, "DELETE FROM DanhGia WHERE id_nguoidung = '$makh'");
            if (!$deleteReviews) {
                throw new Exception("Không thể xóa các đánh giá của người dùng.");
            }
            

            // Xóa người dùng
            $deleteUser = mysqli_query($con, "DELETE FROM NguoiDung WHERE id_nguoidung = '$makh'");
            if (!$deleteUser) {
                throw new Exception("Không thể xóa người dùng.");
            }

            // Commit giao dịch
            mysqli_commit($con);
            $success = true;
        } catch (Exception $e) {
            // Rollback giao dịch nếu có lỗi xảy ra
            mysqli_rollback($con);
            $error = $e->getMessage();
            $success = false;
        }

        mysqli_close($con);

        if (!$success) {
            echo "<div id='error-notify' class='box-content'>";
            echo "<h2>Thông báo</h2>";
            echo "<h4>$error</h4>";
            echo "<a href='ql_ngdung.php'>Quay lại danh sách người dùng</a>";
            echo "</div>";
        } else {
            echo "<div id='success-notify' class='box-content'>";
            echo "<h2>Xóa người dùng thành công</h2>";
            echo "<script>alert('Đã xóa người dùng.'); window.location.href = 'ql_ngdung.php';</script>";
            echo "</div>";
        }
    } else {
        // Hiển thị xác nhận trước khi xóa
        echo "<script>
                var confirmDelete = confirm('Bạn có chắc chắn muốn xóa người dùng này không?');
                if (confirmDelete) {
                    window.location.href = 'xoa_nguoidung.php?id_nguoidung=$makh&confirm=true';
                } else {
                    window.location.href = 'ql_ngdung.php';
                }
            </script>";
    }
} else {
    echo "<script>window.location.href = 'ql_ngdung.php';</script>";
}
?>
