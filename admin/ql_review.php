<!DOCTYPE html>
<html>
<head>
    <title>(Admin): Quản lý Review</title>
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
                    <div class="menu-heading">QUẢN LÝ REVIEW</div>
                </div>
            </div>
        </div>        
    <?php } ?>
    <div class="main-content">
        <?php
        $link = new mysqli('localhost','root','','review') or die ('Kết nối thất bại');
        ?>
        <h1>DANH SÁCH REVIEW</h1>
        <table align="center">
            <tr>
                <th class="th1">ID Đánh giá</th>
                <th class="th2">ID Người dùng</th>
                <th class="th3">ID Dịch vụ</th>
                <th class="th4">Số sao</th>
                <th class="th5">Tiêu đề</th>
                <th class="th6">Nội dung</th>
                <th class="th7">Ngày tạo</th>
                <th class="th8">Ngày cập nhật</th>
                <th class="th9">Trạng thái</th>
                <th class="th10">Thao tác</th>
            </tr>
            <?php
            $query = "SELECT * FROM DanhGia order by ngaytao desc";
            $result = mysqli_query($link, $query);
            if(mysqli_num_rows($result) != 0) {
                while($r = mysqli_fetch_assoc($result)) {
                    $iddg = $r['id_danhgia'];
                    $idnd = $r['id_nguoidung'];
                    $iddv = $r['id_dichvu'];
                    $ss = $r['sosao'];
                    $td = $r['tieude'];
                    $nd = $r['noidung'];
                    $nt = $r['ngaytao'];
                    $ncn = $r['ngaycapnhat'];
                    $tt = $r['trangthai'];
                    echo "<tr>";
                    echo "<td align='center'>$iddg</td>";
                    echo "<td align='center'>$idnd</td>";
                    echo "<td align='center'>$iddv</td>";
                    echo "<td align='center'>$ss</td>";
                    echo "<td align='center'>$td</td>";
                    echo "<td align='center'>$nd</td>";
                    echo "<td align='center'>$nt</td>";
                    echo "<td align='center'>$ncn</td>";
                    echo "<td align='center'>$tt</td>";
                    echo "<td class='actions'>
                        <a class='approve-btn' href='pheduyet.php?id_danhgia=$iddg'>Phê duyệt</a>
                        <a class='delete-btn' href='review_delete.php?id_danhgia=$iddg'>Từ chối</a>
                    </td>";
                    echo "</tr>";
                }                
            }
            ?>
        </table>
        <br/><br/>
        <div align="center">
            <form action="ql_review.php" method="get">
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
                $query = "SELECT * FROM DanhGia WHERE trangthai LIKE '%$search%' or sosao LIKE '%$search%'";
                $sql = mysqli_query($link, $query);
                $num = mysqli_num_rows($sql);
                if ($num > 0 && $search != "") {
                    echo "<br><br>";
                    echo "<p><center>$num KẾT QUẢ TÌM KIẾM <b> $search </b></center></p>";
                    echo "<br><br>";
                    echo '<table align= "center" border="1" cellspacing="0
                    " cellpadding="10" width="50%">';
                    echo '<tr><th class="th1">ID Đánh giá</th><th class="th2">ID Người dùng</th><th class="th3">ID Dịch vụ</th><th class="th4">Số sao</th><th class="th4">Tiêu đề</th><th class="th4">Nội dung</th><th class="th4">Ngày tạo</th><th class="th4">Ngày cập nhật</th><th class="th4">Trạng thái</th><th class="th5">Thao tác</th></tr>';
                    while ($row = mysqli_fetch_assoc($sql)) {
                        $iddg = $row['id_danhgia'];
                        $idnd = $row['id_nguoidung'];
                        $iddv = $row['id_dichvu'];
                        $ss = $row['sosao'];
                        $td = $row['tieude'];
                        $nd = $row['noidung'];
                        $nt = $row['ngaytao'];
                        $ncn = $row['ngaycapnhat'];
                        $tt = $row['trangthai'];
                        echo "<tr>";
                        echo "<td align='center'>$iddg</td>";
                        echo "<td align='center'>$idnd</td>";
                        echo "<td align='center'>$iddv</td>";
                        echo "<td align='center'>$ss</td>";
                        echo "<td align='center'>$td</td>";
                        echo "<td align='center'>$nd</td>";
                        echo "<td align='center'>$nt</td>";
                        echo "<td align='center'>$ncn</td>";
                        echo "<td align='center'>$tt</td>";
                        echo "<td class='actions'>
                        <a class='approve-btn' href='pheduyet.php?id_danhgia=$iddg'>Phê duyệt</a>
                        <a class='delete-btn' href='review_delete.php?id_danhgia=$iddg'>Từ chối</a>
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
