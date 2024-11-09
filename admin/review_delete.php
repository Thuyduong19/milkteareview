<?php
include 'header.php';
if (!empty($_SESSION['current_user'])) {
    ?>
    <div class="main-content">
        <h1>Xóa review</h1>
        <div id="content-box">
            <?php
            $error = false;
            if (isset($_GET['id_danhgia']) && !empty($_GET['id_danhgia'])) {
                include '../connect_db.php';
                $result = mysqli_query($con, "DELETE FROM `binhluan` WHERE `id_danhgia` = " . $_GET['id_danhgia']);
                $result = mysqli_query($con, "DELETE FROM `danhgia` WHERE `id_danhgia` = " . $_GET['id_danhgia']);
                if (!$result) {
                    $error = "Không thể xóa bài review.";
                }
                mysqli_close($con);
                if ($error !== false) {
                    ?>
                    <div id="error-notify" class="box-content">
                        <h2>Thông báo</h2>
                        <h4><?= $error ?></h4>
                        <a href="./ql_review.php"></a>
                    </div>
        <?php } else { ?>
                    <div id="success-notify" class="box-content">
                        <h2>Xóa review thành công</h2>
                        <a href="./ql_review.php">DANH SÁCH REVIEW</a>
                    </div>
                <?php } ?>
    <?php } ?>
        </div>
    </div>
    <?php
}
?>