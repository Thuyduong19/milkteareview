<?php
include './header.php';
if (!empty($_SESSION['current_user'])) {
    $item_per_page = (!empty($_GET['per_page'])) ? $_GET['per_page'] : 5;
    $current_page = (!empty($_GET['page'])) ? $_GET['page'] : 1;
    $offset = ($current_page - 1) * $item_per_page;
    $totalRecords = mysqli_query($con, "SELECT * FROM `dichvu`");
    $totalRecords = $totalRecords->num_rows;
    $totalPages = ceil($totalRecords / $item_per_page);
    $products = mysqli_query($con, "SELECT * FROM `dichvu` ORDER BY `id_dichvu` DESC LIMIT " . $item_per_page . " OFFSET " . $offset);
    mysqli_close($con);
    ?>
    <div class="main-content">
        <h1>DANH SÁCH BÀI VIẾT</h1>
        <div class="product-items">
            <div class="buttons">
                <a href="./product_editing.php">Thêm Bài Viết</a>
            </div>
            <ul>
                <li class="product-item-heading">
                    <div class="product-prop product-img">Ảnh</div>
                    <div class="product-prop product-name">Tên quán</div>
                    <div class="product-prop product-button">
                        Xóa
                    </div>
                    <div class="product-prop product-button">
                        Sửa
                    </div>
                    <div class="product-prop product-button">
                        Copy
                    </div>
                    <div class="product-prop product-time">Ngày tạo</div>
                    <div class="product-prop product-time">Ngày cập nhật</div>
                    <div class="clear-both"></div>
                </li>
                <?php
                while ($row = mysqli_fetch_array($products)) {
                    ?>
                    <li>
                        <div class="product-prop product-img"><img src="../<?= $row['anh'] ?>" alt="<?= $row['ten_dv'] ?>" title="<?= $row['ten_dv'] ?>" /></div>
                        <div class="product-prop product-name"><?= $row['ten_dv'] ?></div>
                        <div class="product-prop product-button">
                            <a href="./product_delete.php?id_dichvu=<?= $row['id_dichvu'] ?>">Xóa</a>
                        </div>
                        <div class="product-prop product-button">
                            <a href="./product_editing.php?id_dichvu=<?= $row['id_dichvu'] ?>">Sửa</a>
                        </div>
                        <div class="product-prop product-button">
                            <a href="./product_editing.php?id_dichvu=<?= $row['id_dichvu'] ?>&task=copy">Copy</a>
                        </div>
                        <div class="product-prop product-time"><?= date('d/m/Y H:i', $row['ngaytao']) ?></div>
                        <div class="product-prop product-time"><?= date('d/m/Y H:i', $row['ngaycapnhat']) ?></div>
                        <div class="clear-both"></div>
                    </li>
                <?php } ?>
            </ul>
            <?php
            include './pagination.php';
            ?>
            <div class="clear-both"></div>
        </div>
    </div>
    <?php
}

?>