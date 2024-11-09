<?php
include 'header.php';
if (!empty($_SESSION['current_user'])) {
    ?>
    <div class="main-content">
        <h1><?= !empty($_GET['id_dichvu']) ? ((!empty($_GET['task']) && $_GET['task'] == "copy") ? "COPY BÀI VIẾT" : "SỬA BÀI VIẾT") : "THÊM BÀI VIẾT" ?></h1>
        <div id="content-box">
            <?php
            if (isset($_GET['action']) && ($_GET['action'] == 'add' || $_GET['action'] == 'edit')) {
                if (isset($_POST['ten_dv']) && !empty($_POST['ten_dv']) && isset($_POST['gia_tb']) && !empty($_POST['gia_tb'])) {
                    if (empty($_POST['ten_dv'])) {
                        $error = "Bạn phải nhập tên";
                    } elseif (empty($_POST['gia_tb'])) {
                        $error = "Bạn phải nhập giá";
                    } elseif (!empty($_POST['gia_tb']) && is_numeric(str_replace('.', '', $_POST['gia_tb'])) == false) {
                        $error = "Giá nhập không hợp lệ";
                    }
                    if (isset($_FILES['anh']) && !empty($_FILES['anh']['name'][0])) {
                        $uploadedFiles = $_FILES['anh'];
                        $result = uploadFiles($uploadedFiles);
                        if (!empty($result['errors'])) {
                            $error = $result['errors'];
                        } else {
                            $anh = $result['path'];
                        }
                    }
                    if (!isset($anh) && !empty($_POST['anh'])) {
                        $anh = $_POST['anh'];
                    }

                    if (!isset($error)) {
                        if ($_GET['action'] == 'edit' && !empty($_GET['id_dichvu'])) { //Cập nhật lại sản phẩm
                            $result = mysqli_query($con, "UPDATE `dichvu` SET `ten_dv` = '" . $_POST['ten_dv'] . "', `mota` = '" . $_POST['mota'] . "', `anh` =  '" . $anh . "', `gia_tb` = " . str_replace('.', '', $_POST['gia_tb']) . ", `noidung` = '" . $_POST['noidung'] . "', `ngaycapnhat` = " . time() . " WHERE `dichvu`.`id_dichvu` = " . $_GET['id_dichvu']);
                        } else { //Thêm sản phẩm
                            $result = mysqli_query($con, "INSERT INTO `dichvu` (`id_dichvu`, `ten_dv`, `mota`, `anh`, `gia_tb`, `noidung`, `ngaytao`, `ngaycapnhat`) VALUES (NULL, '" . $_POST['ten_dv'] . "', '" . $_POST['mota'] . "','" . $anh . "', " . str_replace('.', '', $_POST['gia_tb']) . ", '" . $_POST['noidung'] . "', " . time() . ", " . time() . ");");
                        }
                        
                        if (!$result) { //Nếu có lỗi xảy ra
                            $error = "Có lỗi xảy ra trong quá trình thực hiện.";
                        }
                    }
                } else {
                    $error = "Bạn chưa nhập đủ thông tin.";
                }
                ?>
                <div class="container">
                    <div class="error"><?= isset($error) ? $error : "Cập nhật thành công" ?></div>
                    <a href="product_listing.php">Quay lại danh sách bài viết</a>
                </div>
                <?php
            } else {
                if (!empty($_GET['id_dichvu'])) {
                    $result = mysqli_query($con, "SELECT * FROM `dichvu` WHERE `id_dichvu` = " . $_GET['id_dichvu']);
                    $dichvu = $result->fetch_assoc();
                }
                ?>
                <form id="product-form" method="POST" action="<?= (!empty($dichvu) && !isset($_GET['task'])) ? "?action=edit&id_dichvu=" . $_GET['id_dichvu'] : "?action=add" ?>" enctype="multipart/form-data">
                    <input type="submit" title="Lưu" value="Lưu" />
                    <div class="clear-both"></div>
                    <div class="wrap-field">
                        <label>Tên quán: </label>
                        <input type="text" name="ten_dv" value="<?= (!empty($dichvu) ? $dichvu['ten_dv'] : "") ?>" />
                        <div class="clear-both"></div>
                    </div>
                    <div class="wrap-field">
                        <label>Giá trung bình: </label>
                        <input type="text" name="gia_tb" value="<?= (!empty($dichvu) ? number_format($dichvu['gia_tb'], 0, ",", ".") : "") ?>" />
                        <div class="clear-both"></div>
                    </div>
                    <div class="wrap-field">
                        <label>Mô tả: </label>
                        <input type="text" name="mota" value="<?= (!empty($dichvu) ? $dichvu['mota'] : "") ?>" />
                        <div class="clear-both"></div>
                    </div>
                    <div class="wrap-field">
                        <label>Nội dung: </label>
                        <textarea name="noidung" ><?= (!empty($dichvu) ? $dichvu['noidung'] : "") ?></textarea>
                        <div class="clear-both"></div>
                    </div>
                   
                    <div class="wrap-field">
                        <label>Ảnh đại diện: </label>
                        <div class="right-wrap-field">
        <?php if (!empty($dichvu['anh'])) { ?>
                                <img src="../<?= $dichvu['anh'] ?>" /><br/>
                                <input type="hidden" name="anh" value="<?= $dichvu['anh'] ?>" />
        <?php } ?>
                            <input type="file" name="anh" />
                        </div>
                        <div class="clear-both"></div>
                    </div>
                    
                </form>
                <div class="clear-both"></div>
                <script>
                    CKEDITOR.replace('product-content');
                </script>
    <?php } ?>
        </div>
    </div>

    <?php
}
?>
