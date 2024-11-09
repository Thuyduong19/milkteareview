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

  .rating {
    flex-direction: row-reverse;
    display: flex;
    justify-content: center;
    margin-bottom: 20px;
  }

  .rating input {
    display: none;
  }

  .rating label {
    font-size: 40px;
    color: #dcdcdc; /* Màu sao khi chưa được chọn */
    cursor: pointer;
    transition: color 0.3s;
  }

  .rating label:hover,
  .rating label:hover ~ label,
  .rating input:checked ~ label {
    color: #f5dd08; /* Màu sao khi được chọn hoặc hover */
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
  require 'connect.php';
  // Kiểm tra nếu session 'user' tồn tại
  if (isset($_SESSION['user']) && isset($_GET['id_dichvu'])) {
      // Lấy tên người dùng từ session
      $user = $_SESSION['user'];
      $id_dichvu = $_GET['id_dichvu'];
      // Hiển thị tên người dùng và nút đăng xuất
      echo '<form id="reviewForm" action="viet-review.php" method="post" onsubmit="return validateReview()">
      <h2>Viết Review</h2>
      <input type="hidden" name="id_dichvu" value="' . $id_dichvu . '">
      <input type="hidden" name="id_nguoidung" value="' . $user['id_nguoidung'] . '"> 
      <div class="form-group rating">
        <input type="radio" id="star5" name="sosao" value="5"><label for="star5">★</label>
        <input type="radio" id="star4" name="sosao" value="4"><label for="star4">★</label>
        <input type="radio" id="star3" name="sosao" value="3"><label for="star3">★</label>
        <input type="radio" id="star2" name="sosao" value="2"><label for="star2">★</label>
        <input type="radio" id="star1" name="sosao" value="1"><label for="star1">★</label>
      </div>
      <input type="hidden" id="selectedRating" name="selectedRating" value="0">
      <div class="form-group">
        <label for="name">' . $user['hoten'] . '</label>
      </div>
      <div class="form-group">
        <label for="title">Tiêu đề</label>
        <input type="text" id="tieude" name="tieude" required>
      </div>
    
      <div class="form-group">
        <label for="review">Review chi tiết hãng trà sữa</label>
        <textarea id="noidung" name="noidung" required></textarea>
      </div>
    
      <button type="submit" class="submit-btn" name="btn-reg">Đăng Review</button>
    </form>';
  }
  // Chuyển sang trang đăng nhập
  else{
    echo '<div class="alert alert-danger">Bạn cần đăng nhập để viết review!</div>';
    header('Refresh: 0.2; URL = dangnhap.php');
    exit; // Dừng thực thi script
  }
?>
<script>
document.getElementById('ReplyreviewForm').addEventListener('submit', function(event) {
  event.preventDefault();
  // Xử lý dữ liệu form ở đây
  alert('Review đã được gửi!');
});
</script>

<script>
  const stars = document.querySelectorAll('.form-group.rating input[type="radio"]');

  stars.forEach(star => {
    star.addEventListener('click', () => {
      const rating = parseInt(star.value);
      console.log(`Selected rating: ${rating}`); // For debugging
      document.getElementById('selectedRating').value = rating;
    });
  });
</script>


<script>
function validateReview() {
  const selectedRating = document.getElementById('selectedRating');
  if (selectedRating.value === '0') {
    alert('Vui lòng chọn số sao để đánh giá dịch vụ!');
    return false; // Prevent form submission if no rating is selected
  }
  return true; // Allow form submission if a rating is selected
}
</script>


</body>
</html>
