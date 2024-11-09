<!DOCTYPE html>
<html>
<head>
    <title>Đổi thông tin thành viên</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .box-content {
            margin: 0 auto;
            width: 400px;
            border: 1px solid #ccc;
            text-align: center;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
        }
        h1 {
            color: black;
            margin-bottom: 20px;
        }
        form {
            width: 250px;
            margin: 0 auto;
        }
        input[type="password"] {
            width: 100%;
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
        a {
            color: #8d99af;
            text-decoration: none;
            margin-top: 10px;
            display: inline-block;
            background-color: #fff;
            padding: 10px 20px;
            border: 1px solid #8d99af;
            border-radius: 5px;
            transition: background-color 0.3s, color 0.3s;
        }
        a:hover {
            background-color: #8d99af;
            color: white;
        }
        .error-message {
            color: black;
            margin-top: 10px;
        }
        .return-link {
            background-color: #8d99af;
            color: white;
            padding: 5px 10px;
            border-radius: 5px;
            text-decoration: none;
            display: inline-block;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <?php
    include '../connect_db.php';
    $error = false;
    if (isset($_GET['action']) && $_GET['action'] == 'edit') {
        if (isset($_POST['id_ad']) && !empty($_POST['id_ad']) && isset($_POST['old_password']) && !empty($_POST['old_password']) && isset($_POST['new_password']) && !empty($_POST['new_password'])) {
            $userResult = mysqli_query($con, "Select * from `admin` WHERE (`id_ad` = " . $_POST['id_ad'] . " AND `matkhau` = '" . md5($_POST['old_password']) . "')");
            if ($userResult->num_rows > 0) {
                $result = mysqli_query($con, "UPDATE `admin` SET `matkhau` = MD5('" . $_POST['new_password'] . "'), `ngaycapnhat`=" . time() . " WHERE (`id_ad` = " . $_POST['id_ad'] . " AND `matkhau` = '" . md5($_POST['old_password']) . "')");
                if (!$result) {
                    $error = "Không thể cập nhật tài khoản";
                }
            } else {
                $error = "Mật khẩu cũ không đúng.";
            }
            mysqli_close($con);
            if ($error !== false) {
                ?>
                <div class="box-content">
                    <h1>Thông báo</h1>
                    <h4><?= $error ?></h4>
                    <a href="./edit_admin.php" class="return-link">Quay lại</a>
                </div>
            <?php } else { ?>
                <div class="box-content">
                    <h1><?= ($error !== false) ? $error : "Sửa tài khoản thành công" ?></h1>
                    <a href="./index.php" class="return-link">Quay lại</a>
                </div>
            <?php } ?>
        <?php } else { ?>
            <div class="box-content">
                <h1 class="error-message">Vui lòng nhập đủ thông tin để sửa tài khoản</h1>
                <a href="./edit_admin.php" class="return-link">Quay lại</a>
            </div>
            <?php
        }
    } else {
        session_start();
        $user = $_SESSION['current_user'];
        if (!empty($user)) {
            ?>
            <div class="box-content">
                <h1>Xin chào "<?= $user['hoten'] ?>". Bạn đang thay đổi mật khẩu</h1>
                <form action="./edit_admin.php?action=edit" method="Post" autocomplete="off">
                    <input type="hidden" name="id_ad" value="<?= $user['id_ad'] ?>">
                    <label>Password cũ</label>
                    <input type="password" name="old_password" value="" /><br>
                    <label>Password mới</label>
                    <input type="password" name="new_password" value="" /><br><br>
                    <input type="submit" value="Edit" />
                </form>
            </div>
            <?php
        }
    }
    ?>
</body>
</html>
