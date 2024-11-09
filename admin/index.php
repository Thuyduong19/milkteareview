<!DOCTYPE html>
<html>
<head>
    <title>Admin: quản lý sản phẩm</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 400px; /* Giảm chiều rộng container */
            margin: 40px auto;
            padding: 20px;
            background-color: #fff; /* Đặt màu nền cho container */
            border-radius: 10px; /* Bo tròn các góc của container */
        }
        h1 {
            text-align: center;
            color: #8d99af; 
            margin-bottom: 20px; /* Tăng khoảng cách với nội dung bên dưới */
        }
        form {
            width: 250px; /* Điều chỉnh chiều rộng của form */
            margin: 0 auto; /* Canh giữa form */
            text-align: center; /* Căn giữa các thành phần trong form */
        }
        label {
            display: block; /* Đặt label thành block element */
            margin-bottom: 5px;
            text-align: left; /* Căn lề trái cho label */
        }
        input[type="text"],
        input[type="password"] {
            width: 100%; /* Điều chỉnh chiều rộng của input */
            padding: 12px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 15px;
            box-sizing: border-box;
            font-size: 16px;
        }
        input[type="submit"] {
            background-color: #8d99af; /* Đặt màu chủ đạo */
            color: white;
            cursor: pointer;
            width: 50%;
            height: 40px;
            border-radius: 5px;
            border: none; /* Loại bỏ viền */
        }
        .error-message {
            color: #8d99af; 
            text-align: center; /* Căn giữa dòng thông báo */
            margin-bottom: 5px; /* Khoảng cách với dòng dưới */
        }
        .quaylai-container {
            text-align: right; /* Căn nội dung sang bên phải */
        }
        .quaylai {
            display: inline-block; /* Hiển thị như một phần tử block để có thể đặt chiều rộng */
            padding: 10px 20px; /* Kích thước padding */
            background-color: #8d99af; 
            border-radius: 5px; /* Bo tròn góc */
            color: white; /* Màu chữ */
            text-decoration: none; /* Loại bỏ đường gạch chân */
            transition: background-color 0.3s; /* Hiệu ứng chuyển đổi màu nền */
        }
        .container1 {
            text-align: center;
        }
        .link-box {
            display: inline-block;
            padding: 10px 20px;
            background-color: #8d99af;
            color: white; 
            border-radius: 10px;
            transition: background-color 0.3s, transform 0.3s;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            text-decoration: none;
            margin-bottom: 10px;
        }
        .link-box:hover{
            background-color: #ffffff;
            color: #8d99af;
            transform: scale(1.05);
        }
        .container1 h2 {
        text-align: center;
        color: black; 
        margin-bottom: 20px; /* Tăng khoảng cách với nội dung bên dưới */
        font-size: 28px; /* Thay đổi kích thước chữ */
        font-weight: bold; /* In đậm chữ */
}

    
    </style>
</head>
<body>
    <div class="container">
        <?php
        session_start();
        include '../connect_db.php';
        $error = false;
        if (isset($_POST['hoten']) && !empty($_POST['hoten']) && isset($_POST['matkhau']) && !empty($_POST['matkhau'])) {
            $result = mysqli_query($con, "SELECT `id_ad`, `hoten` FROM `admin` WHERE (`hoten` ='" . $_POST['hoten'] . "' AND `matkhau` = md5('" . $_POST['matkhau'] . "'))");
            if (!$result) {
                $error = mysqli_error($con);
            } else {
                $user = mysqli_fetch_assoc($result);
                $_SESSION['current_user'] = $user;
            }
            mysqli_close($con);
            if ($error !== false || $result->num_rows == 0) {
                ?>
                <div class="error-message">
                    <h1 style="color:black;">Thông báo</h1>
                    <h4><?= !empty($error) ? $error : "Thông tin đăng nhập không chính xác" ?></h4>
                    <div class="quaylai-container">
                        <a href="./index.php" class="quaylai">Quay lại</a>
                    </div>
                </div>
                <?php
                exit;
            }
            ?>
        <?php } ?>
        <?php if (empty($_SESSION['current_user'])) { ?>
            <div class="container">
                <h1>Đăng nhập tài khoản</h1> <!-- Thêm class cho tiêu đề -->
                <form action="./index.php" method="POST" autocomplete="off">
                    <label for="hoten">Username</label>
                    <input type="text" id="hoten" name="hoten" required><br>
                    <label for="matkhau">Password</label>
                    <input type="password" id="matkhau" name="matkhau" required><br><br>
                    <input type="submit" value="Đăng nhập">
                </form>
            </div>
            <?php
        } else {
            $currentUser = $_SESSION['current_user'];
            ?>
            <div class="container1">
                <h2 style="font-size:strong;">Xin chào <?= $currentUser['hoten'] ?><br></h2>
                <a href="./product_listing.php" class="link-box">Quản lý bài viết</a>
                <br>
                <a href="./ql_ngdung.php" class="link-box">Quản lý người dùng</a>
                <br>
                <a href="./ql_review.php" class="link-box">Quản lý Review</a>
                <br>
                <a href="./ql_binhluan.php" class="link-box">Quản lý Bình luận</a>
                <br>
                <a href="./edit_admin.php" class="link-box">Đổi mật khẩu</a>
                <br>
                <a href="./logout.php" class="link-box">Đăng xuất</a>
            </div>
        <?php } ?>
    </div>

</body>
</html>
