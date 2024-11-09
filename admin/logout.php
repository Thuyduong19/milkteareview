<!DOCTYPE html>
<html>
<head>
    <title>Đăng xuất tài khoản</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        .box-content {
            margin: 0 auto;
            width: 500px;
            height:135px;
            border: 1px solid #ccc;
            text-align: center;
            padding: 20px;
            border-radius:15px;
        }
        #user_logout form {
            width: 200px;
            margin: 40px auto;
        }
        #user_logout form input {
            margin: 5px 0;
        }
        a {
            background-color: #8d99af;
            color: white;
            text-decoration: none; /* loại bỏ gạch chân mặc định của thẻ a */
            padding: 15px 30px;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s, transform 0.3s;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        h1 {
            margin-bottom: 20px; /* Khoảng cách với dòng dưới */
        }
        .inline {
            display: inline-block; /* Hiển thị trên cùng một dòng */
            margin-top:15px;
        }
    </style>
</head>
<body>
    <?php
    session_start();
    unset($_SESSION['current_user']);
    ?>
    <div id="user_logout" class="box-content">
        <h1>Đăng xuất tài khoản thành công</h1>
        <div class="inline">
            <a href="./index.php">Đăng nhập lại</a>
        </div>
    </div>
</body>
</html>
