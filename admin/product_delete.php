<?php
include 'header.php';
if (!empty($_SESSION['current_user'])) {
    ?>
    <div class="main-content">
        <h1>Xóa dịch vụ</h1>
        <div id="content-box">
            <?php
            $error = false;
            if (isset($_GET['id_dichvu']) && !empty($_GET['id_dichvu'])) {
                include '../connect_db.php';
                $result = mysqli_query($con, "DELETE FROM `dichvu` WHERE `id_dichvu` = " . $_GET['id_dichvu']);
                if (!$result) {
                    $error = "Không thể xóa dịch vụ.";
                }
                mysqli_close($con);
                if ($error !== false) {
                    ?>
                    <div id="error-notify" class="box-content">
                        <h2>Thông báo</h2>
                        <h4><?= $error ?></h4>
                        <a href="./product_listing.php">Danh sách dịch vụ</a>
                    </div>
        <?php } else { ?>
                    <div id="success-notify" class="box-content">
                        <h2>Xóa dịch vụ thành công</h2>
                        <a href="./product_listing.php">Danh sách dịch vụ</a>
                    </div>
                <?php } ?>
    <?php } ?>
        </div>
    </div>
    <?php
}
?>