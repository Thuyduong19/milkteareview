<!DOCTYPE html>
<html lang="vi">
<head>
<meta charset="UTF-8">
<title>Form Đánh Giá Trà Sữa</title>
<style>
  body {
    background-color: #f7f7f7; /* Màu nền nhạt */
    color: #333333; /* Màu chữ đậm */
    font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0;
  }

  form {
    max-width: 600px;
    width: 100%;
    margin: 20px auto;
    padding: 30px;
    background-color: #ffffff;
    border-radius: 15px;
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
    border: 1px solid #e1e1e1;
  }

  form h2 {
    color: #8d99af;
    text-align: center;
    margin-bottom: 20px;
  }

  .form-group {
    margin-bottom: 20px;
  }

  .form-group label {
    display: block;
    margin-bottom: 10px;
    color: #333333;
    font-weight: bold;
  }

  .form-group input[type="text"],
  .form-group textarea {
    width: 100%;
    padding: 12px 0px;
    margin-bottom: 10px;
    border: 1px solid #cccccc;
    border-radius: 8px;
    box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.05);
    font-size: 16px;
    background-color: #fafafa;
    transition: border-color 0.3s;
  }

  .form-group input[type="text"]:focus,
  .form-group textarea:focus {
    border-color: #8d99af;
  }

  .form-group textarea {
    height: 150px;
    resize: vertical;
  }

  .submit-btn {
    display: block;
    width: 100%;
    background-color: #8d99af; /* Nút màu chủ đạo */
    color: #ffffff; /* Chữ màu trắng */
    padding: 15px;
    border: none;
    border-radius: 8px;
    cursor: pointer;
    font-size: 18px;
    font-weight: bold;
    text-align: center;
    transition: background-color 0.3s, transform 0.3s;
  }

  .submit-btn:hover {
    background-color: #6b7280; /* Màu nút khi hover */
    transform: translateY(-2px);
  }

  .submit-btn:active {
    transform: translateY(0);
  }
</style>
</head>
<body>
  <?php

  session_start();
  // Kiểm tra nếu session 'user' tồn tại
  if(isset($_SESSION['user'])&& isset($_GET['id_danhgia'])) {
      // Lấy tên người dùng từ session
      $user = $_SESSION['user'];
      $id_danhgia=$_GET['id_danhgia'];
      // Hiển thị tên người dùng và nút đăng xuất
      echo ' <form id="ReplyreviewForm" action="reply.php" method="post">
      <h2>Trả Lời Review</h2>
      <input type="hidden" name="id_danhgia" value="' . $id_danhgia . '"> 
      <input type="hidden" name="id_nguoidung" value="' . $user['id_nguoidung'] . '"> 
      <div class="form-group">
        <label for="name">' . $user['hoten'] . '</label>
      </div>
      <div class="form-group">
        <label for="review">Nhận xét về review này</label>
        <textarea id="review" name="noidung" required></textarea>
      </div>
    
      <button type="submit" class="submit-btn" name="traloi">Trả lời</button>
    </form>';
  }
  // Chuyển sang trang đăng nhập
  else{
    echo '<div class="alert alert-danger">Bạn cần đăng nhập để trả lời review!</div>';
    header('Refresh: 2; URL = dangnhap.php');
    exit; // Dừng thực thi script
  }
?>
</body>
</html>
