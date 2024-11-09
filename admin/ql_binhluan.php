<!DOCTYPE html>
<html>
<head>
    <title>(Admin): Quản lý Bình luận</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/ad.css">
    <script src="../resources/ckeditor/ckeditor.js"></script>
</head>
<body>
    <?php
    session_start();
    include '../connect_db.php';
    include '../function.php';
    if (!empty($_SESSION['current_user'])) { // Kiểm tra xem đã đăng nhập chưa?
    ?>
        <div id="admin-heading-panel">
            <div class="container">
                <div class="left-panel">
                    Xin chào <span>Admin</span>
                </div>
                <div class="right-panel">
                    <a href="index.php">Trang chủ</a>
                    <a href="logout.php">Đăng xuất</a>
                </div>
            </div>
        </div>
        <div id="content-wrapper">
            <div class="container">
                <div class="left-menu">
                    <div class="menu-heading">QUẢN LÝ BÌNH LUẬN</div>
                </div>
            </div>
        </div>        
    <?php } ?>
    <div class="main-content">
        <?php
        $link = new mysqli('localhost','root','','review') or die ('Kết nối thất bại');
        ?>
        <h1>DANH SÁCH BÌNH LUẬN</h1>
        <table align="center">
            <tr>
                <th class="th1">ID Bình luận</th>
                <th class="th2">ID Đánh giá</th>
                <th class="th3">ID Người dùng</th>
                <th class="th4">Nội dung</th>
                <th class="th5">Ngày tạo</th>
                <th class="th7">Thao tác</th>
            </tr>
            <?php
            $query = "SELECT * FROM BinhLuan order by ngaytao desc ";
            $result = mysqli_query($link, $query);
            if(mysqli_num_rows($result) != 0) {
                while($r = mysqli_fetch_assoc($result)) {
                    $idbl = $r['id_binhluan'];
                    $iddg = $r['id_danhgia'];
                    $idnd = $r['id_nguoidung'];
                    $nd = $r['noidung'];
                    $nt = $r['ngaytao'];
                    echo "<tr>";
                    echo "<td align='center'>$idbl</td>";
                    echo "<td align='center'>$iddg</td>";
                    echo "<td align='center'>$idnd</td>";
                    echo "<td align='center'>$nd</td>";
                    echo "<td align='center'>$nt</td>";
                    echo "<td class='actions'>
                        <a class='delete-btn' href='xoabl.php?id_binhluan=$idbl'>xóa</a>
                    </td>";
                    echo "</tr>";
                }                
            }
            ?>
    </table>
        <br/><br/>
        <div align="center">
            <form action="ql_binhluan.php" method="get">
                Search: <input type="text" name="search" /> <br> <br>
                <input type="submit" name="OK" value="Tìm kiếm"/>
            </form>
        </div>
        <?php
        if (isset($_REQUEST['OK'])) {
            $search = addslashes($_GET['search']);
            if (empty($search)) {
                echo "<br><br><center> Yêu cầu nhập từ khóa vào ô trống</center>";
            } else {
                $query = "SELECT * FROM Binhluan WHERE noidung LIKE '%$search%'";
                $sql = mysqli_query($link, $query);
                $num = mysqli_num_rows($sql);
                if ($num > 0 && $search != "") {
                    echo "<br><br>";
                    echo "<p><center>$num KẾT QUẢ TÌM KIẾM <b> $search </b></center></p>";
                    echo "<br><br>";
                    echo '<table align= "center" border="1" cellspacing="0
                    " cellpadding="10" width="50%">';
                    echo '<tr><th class="th1">ID Bình luận</th> <th class="th12">ID Đánh giá</th><th class="th3">ID Người dùng</th><th class="th4">Nội dung</th>><th class="th5">Ngày tạo</th><th class="th6">Thao tác</th>';
                    while ($row = mysqli_fetch_assoc($sql)) {	
                        $idbl = $row['id_binhluan'];
                        $iddg = $row['id_danhgia'];
                        $idnd = $row['id_nguoidung'];
                        $nd = $row['noidung'];
                        $nt = $row['ngaytao'];
                        echo "<tr>";
                        echo "<td align='center'>$idbl</td>";
                        echo "<td align='center'>$iddg</td>";
                        echo "<td align='center'>$idnd</td>";
                        echo "<td align='center'>$nd</td>";
                        echo "<td align='center'>$nt</td>";
                        echo "<td class='actions'>
                        <a class='delete-btn' href='xoabl.php?id_binhluan=$idbl'>xóa</a>
                        </td>";
                        echo "</tr>";
                    }
                    echo '</table>';
                } else {
                    echo "<br><br><center>Không tìm thấy kết quả nào cho từ khóa <b>$search</b></center>";
                }
            }
        }
        ?>
    </div>
</body>
</html>
