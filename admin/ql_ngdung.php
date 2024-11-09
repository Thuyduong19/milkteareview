<!DOCTYPE html>
<html>
<head>
    <title>(Admin): Quản lý người dùng</title>
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
    if (!empty($_SESSION['current_user'])) { //Kiểm tra xem đã đăng nhập chưa?
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
                    <div class="menu-heading">QUẢN LÝ NGƯỜI DÙNG</div>
                </div>
            </div>
        </div>        
    <?php } ?>
    <div class="main-content">
        <?php
        $link = new mysqli('localhost','root','','review') or die ('Ket noi that bai');
        ?>
        <h1>DANH SÁCH NGƯỜI DÙNG</h1>
        <table align="center">
            <tr>
                <th class="th1">ID người dùng</th>
                <th class="th2">Tên người dùng</th>
                <th class="th3">Email</th>
                <th class="th4">Mật khẩu</th>
                <th class="th5">Xoá</th>
            </tr>
            <?php
            $query = "SELECT * FROM NguoiDung";
            $result = mysqli_query($link, $query);
            if(mysqli_num_rows($result) <> 0) {
                while($r = mysqli_fetch_assoc($result)) {
                    $makh = $r['id_nguoidung'];
                    $tenkh = $r['hoten'];
                    $email = $r['email'];
                    $pass = $r['matkhau'];
                    echo "<tr>";
                    echo "<td align='center'>$makh</td>";
                    echo "<td align='center'>$tenkh</td>";
                    echo "<td align='center'>$email</td>";
                    echo "<td align='center'>$pass</td>";
                    echo "<td align='center'><a href='xoa_nguoidung.php?id_nguoidung=$makh' class='delete-btn' onclick='return confirmDelete($makh)'>Xóa</a></td>"; // Sửa đoạn này
                    echo "</tr>";
                }                
            }
            ?>
        </table>
        <br/> <br/>
        <div align="center">
            <form action="ql_ngdung.php" method="get">
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
                //Connect sql
                $link = new mysqli('localhost','root','','review') or die ('Kết nối không thành công');
                //Tim du lieu
                $query = "SELECT * FROM NguoiDung WHERE hoten LIKE '%$search%'";
                //Truyvan
                $sql = mysqli_query($link, $query);
                //Demso dong truy van
                $num = mysqli_num_rows($sql);
                if ($num > 0 && $search!="") {
                    echo "<br><br>";
                    echo "<p><center>$num KẾT QUẢ TÌM KIẾM <b> $search </b></center></p>";
                    echo "<br><br>";
                    //Lay du lieu trong table va truy van du lieu
                    echo '<table align="center" border="1" cellspacing="0" cellpadding="10">';
                    echo '<tr>';
                    echo '<th class="th1">ID người dùng</th>';
                    echo '<th class="th2">Tên người dùng</th>';
                    echo '<th class="th3">Email</th>';
                    echo '<th class="th4">Mật khẩu</th>';
                    echo '<th class="th5">Xoá</th>';
                    echo '</tr>';
                    while ($row = mysqli_fetch_assoc($sql)) {
                        echo '<tr>';
                        echo "<td align='center'>{$row['id_nguoidung']}</td>";
                        echo "<td align='center'>{$row['hoten']}</td>";
                        echo "<td align='center'>{$row['email']}</td>";
                        echo "<td align='center'>{$row['matkhau']}</td>";
                        echo "<td align='center'><a href='xoa_nguoidung.php?id_nguoidung={$row['id_nguoidung']}' class='delete-btn' onclick='return confirmDelete({$row['id_nguoidung']})'>Xóa</a></td>";
                        echo '</tr>';
                    }
                    echo '</table>';
                } else {
                    echo "<br><br><center> Không tìm thấy người dùng!</center>";
                }
            }
        }
        ?>
    </div>
</body>
</html>
