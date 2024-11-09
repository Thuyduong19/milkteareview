<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="UTF-8">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <title>Review Trà Sữa</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/templatemo-plot-listing.css">

<style>

/*
---------------------------------------------
Detail
---------------------------------------------
*/
.detail{
    padding: 150px 20px 20px 20px ;
    display: block;
}
.detail-content{
    display: flex;
    
}
.detail-content-left{
    margin-right: 30px;
}
.image img{
    width: 700px;
    height: 500px;
    padding-right: 20px;
}
.title{
    display: flex;
}
.rate {
    position: absolute;
    right: 60px;
    padding-top: 20px;
}
.rate li {
    display: inline-block;
}
.rate li:last-child {
    margin-left: 10px;
}
.detail-name{
    color:brown;
    font-family:'Times New Roman';
}
.detail-bottom{
    padding:25px;
}
h5{
    color:cornflowerblue;
    text-align:center;
}
button {
  background-color: #fecc17; 
  padding: 10px 20px; 
  text-align: center; 
  text-decoration: none; 
  display: inline-block; 
  border: none; 
  cursor: pointer; 
  transition: background-color 0.3s ease; 
}
button:hover { 
  background-color: #3e8e41; 
}
a {
  text-decoration: none;
  color: white;
}
/*
---------------------------------------------
Review - Comment
---------------------------------------------
*/
.review-comment{
  padding:0.2px 25px;
}

.review{
  display:flex;
  padding-left: 25px;
}
.review-left{
  width: 89.5%;
}

.comment {
  border: 1px solid #ccc;
  padding: 15px;
  margin-bottom: 15px;
  margin-top: 50px;
}

.comment-header {
  display: flex;
  align-items: center;
}

.comment-avatar {
  width: 40px;
  height: 40px;
  border-radius: 50%;
  margin-right: 10px;
}

.comment-author {
  font-weight: bold;
}

.comment-content {
  margin-top: 20px;
}
.comment-rating {
  padding-top: 30px;
  display:flex;
}

.comment-rating i {
  margin: 5px;
}
.reply{
  padding-top: 20px;
}
.reply i{
  padding-right: 10px;
}

.reply a{
  text-decoration: none;
  color:grey ;
}
.reply a:hover{
  color:black ;
}
.review-title{
  font-size: 1.2rem;  /* Increase font size */
  color: #007bff;     /* Change color to blue */
  font-weight: bold;   /* Make text bold */
}
.tb{
  padding: 25px;
  color: gray;
}
.star i{
  padding-right: 3px;

}
.comment-content {
    position: relative;
}

.comment-footer {
    display: flex;
    justify-content:flex-start;
    align-items: center;
    margin-top: 10px;
}

.comment-time {
    font-size: 15px;
    color: gray;
    padding-right:20px;
    line-height: 20px
}

.reply {
    display: flex;
}

</style>

  </head>

<body>
  <!-- ***** Header Area Start ***** -->
  <header class="header-area header-sticky wow slideInDown" data-wow-duration="0.75s" data-wow-delay="0s">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <nav class="main-nav">
            <!-- ***** Logo Start ***** -->
            <a href="index.php" class="logo" >
            </a>
            <!-- ***** Logo End ***** -->
            <!-- ***** Menu Start ***** -->
            <ul class="nav">
              <li><a href="index.php" class="active">Trang Chủ</a></li>             
              <li><a href="listing.php">Bài viết</a></li>
              <li><div class="main-white-button"><?php
              session_start();
              // Kiểm tra nếu session 'user' tồn tại
              if(isset($_SESSION['user'])) {
                  // Lấy tên người dùng từ session
                  $user = $_SESSION['user'];
                  // Hiển thị tên người dùng và nút đăng xuất

                  echo '<span class="user-icon"><a href="dangxuat.php" class="logout-btn" 
                  <i class="fa fa-user"></i>' . $user['hoten'] . '| Đăng xuất</a>
                  </span>';
              } else {
                  // Nếu không có session 'user', hiển thị nút đăng nhập/đăng ký
                  echo '<a href="dangnhap.php" class="user-icon"><i class="fa fa-user"></i> Đăng nhập/Đăng ký</a>';
              }
              ?></div></li> 
            </ul>        
            <a class='menu-trigger'>
                <span>Menu</span>
            </a>
            <!-- ***** Menu End ***** -->
          </nav>
        </div>
      </div>
    </div>
  </header>
  <!-- ***** Header Area End ***** -->

  <div class="banner">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="top-text header-text">
            <h6></h6>
            <h2></h2>
          </div>
        </div>
        <div class="col-lg-12">
        </div>
      </div>
    </div>
  </div>
  <?php
  include './connect_db.php';
  $result = mysqli_query($con, "SELECT * FROM `dichvu` WHERE id_dichvu = ".$_GET['id_dichvu']);
  $dichvuct = mysqli_fetch_assoc($result);
  ?>

<?php
$id_dichvu = $_GET['id_dichvu']; 
require 'sum.php';
?>

  <!-- DETAIL -->
  <section class="detail">
    <div class="detail-content">
        <div class="detail-content-left">
            <div class="image" >
                <img  src="./<?= $dichvuct['anh'] ?>">
            </div>
        </div>
        <div class="detail-content-right">
          <div class="title">
            <div><h1 class="detail-name"><?= $dichvuct['ten_dv'] ?></h1><br></div>
            <div>
              <ul class="rate">
                <li style = "padding-right: 5px;"><?= number_format($soSaoTrungBinh, 1) ?> / 5</li>
                <li class="star">
                  <?php
                    // Số sao nguyên (phần nguyên của số sao trung bình)
                    $soSaoNguyen = floor($soSaoTrungBinh);
    
                    // Hiển thị số sao nguyên
                    for ($i = 0; $i < $soSaoNguyen; $i++) {
                      echo '<i class="fa fa-star"></i>';
                    }                
                    // Kiểm tra nếu phần thập phân của số sao trung bình lớn hơn hoặc bằng 0.5 thì hiển thị thêm nửa sao
                    if ($soSaoTrungBinh - $soSaoNguyen >= 0.5) {
                      echo '<i class="fa fa-star-half-o"></i>';
                    }
                    $soSaoThieu = 5 - $soSaoNguyen - ($soSaoTrungBinh - $soSaoNguyen >= 0.5 ? 1 : 0);
                    for ($i = 0; $i < $soSaoThieu; $i++) {
                        echo '<i class="fa fa-star-o"></i>';
                    }
              
                  ?>
                </li>
                <li>(<?= $tongSoDanhGia ?>) Reviews</li>
              </ul>
            </div>
            
          </div>
            <p><b>Giới thiệu: </b><?= $dichvuct['mota'] ?></p>
            <br>
            <p><b>Giá trung bình: </b><?= number_format($dichvuct['gia_tb'], 0, ",", ".") ?>đ</p>
        </div>
    </div>
    <br>
    <hr>
    <div class="detail-bottom">
      <h5>Thông tin chi tiết</h5><br>
      <p>
        <b>Nội dung: </b> <?= $dichvuct['noidung'] ?>
      </p>
    </div>

    
    <!-- REVIEW - COMMENT-->
    <div class="review">
        <div class="review-left">
          <p><b>Reviews</b></p>
        </div>
        <div class="review-right">
          <button type="button"><a href="formreview.php?id_dichvu=<?php echo $dichvuct['id_dichvu']; ?>" onclick="return confirm('Bạn có muốn viết review không?')">Viết Review</a></button>
        </div>
    </div>

    <?php
// Thêm phần kết nối đến cơ sở dữ liệu


// Kiểm tra nếu có thông tin người dùng và id_dichvu được truyền qua GET
if (isset($_GET['id_dichvu'])) {
    $id_dichvu = $_GET['id_dichvu'];

    // Lấy tất cả các đánh giá cho dịch vụ này từ cơ sở dữ liệu
    $sql_reviews = "SELECT id_danhgia,dg.tieude, dg.id_nguoidung, dg.noidung, dg.sosao, nd.hoten,TIMESTAMPDIFF(second, dg.ngaytao, NOW()) as phutbl
                    FROM danhgia dg 
                    INNER JOIN nguoidung nd ON dg.id_nguoidung = nd.id_nguoidung 
                    WHERE dg.id_dichvu = $id_dichvu and
                    trangthai='approved'
                    ORDER BY dg.ngaytao DESC";
    $result_reviews = mysqli_query($conn, $sql_reviews);

    // Kiểm tra nếu có ít nhất một đánh giá
    if (mysqli_num_rows($result_reviews) > 0) {
        while ($review = mysqli_fetch_assoc($result_reviews)) {
            $review_id_nguoidung = $review['id_nguoidung'];
            $id_danhgia = $review['id_danhgia'];
            $tieude = $review['tieude'];
            $noidung = $review['noidung'];
            $sosao = $review['sosao'];
            $hoten = $review['hoten'];
            $giaybl = $review['phutbl'];

            // Hiển thị thông tin của mỗi đánh giá
?>
            <div class="review-comment">
                <div class="comment">
                    <div class="comment-header">
                        <span class="comment-author"><?php echo $hoten; ?></span>
                    </div>
                    <div class="comment-rating">
                        <?php
                        // Hiển thị số sao dưới dạng biểu tượng sao
                        for ($i = 1; $i <= $sosao; $i++) {
                            echo '<i class="fa fa-star"></i>';
                        }
                        for ($i = $sosao + 1; $i <= 5; $i++) {
                            echo '<i class="fa fa-star-o" style="color: black;"></i>';
                        }
?>
            </div>
                <div class="comment-content">
                        <h3 class="review-title"><?php echo $tieude; ?></h3>
                        <br>
                        <?php echo $noidung; ?>
                    </div>
                    <div class="reply">
                    <?php
                              $minute = floor($giaybl / 60);
                              $hours=floor($minute / 60);
                              if ($giaybl < 60) {
                                echo '<p class="comment-time">' . $giaybl . ' giây trước</p>';
                            } elseif ($minute < 60) {
                                echo '<p class="comment-time">' . $minute . ' phút trước</p>';
                            } else {
                                echo '<p class="comment-time">' . $hours . ' giờ trước</p>';
                            }
                            ?>
                            <a href="replyform.php?id_danhgia=<?php echo  $id_danhgia; ?>"><i class="fa-solid fa-reply"></i>Trả lời</a>
                            <?php
                              if (isset($_SESSION['user']) && isset($_SESSION['user']['id_nguoidung']) && $_SESSION['user']['id_nguoidung'] == $review_id_nguoidung) { // Kiểm tra nếu người dùng hiện tại là chủ sở hữu của phản hồi
                                ?>
                                <a href="xoa_rv.php?id_danhgia=<?php echo $id_danhgia; ?>"><i class="fa-solid fa-trash" style="padding-left:10px;"></i> Xóa</a>
                                <?php
                              } ?>
                  </div>
                    
                    <!-- Hiển thị các phản hồi cho đánh giá này -->
                    <div class="phanhoi">
                        <?php
                        // Lấy các phản hồi cho đánh giá này từ cơ sở dữ liệu
                        $sql_phanhoi = "SELECT bl.id_binhluan,bl.id_nguoidung,bl.noidung, nd.hoten, TIMESTAMPDIFF(second, bl.ngaytao, NOW()) as phutbl
                                        FROM binhluan bl
                                        INNER JOIN nguoidung nd ON bl.id_nguoidung = nd.id_nguoidung 
                                        WHERE bl.id_danhgia = $id_danhgia
                                        ORDER BY ngaytao ASC";
                        $result_phanhoi = mysqli_query($conn, $sql_phanhoi);

                        // Kiểm tra nếu có phản hồi nào
                        if (mysqli_num_rows($result_phanhoi) > 0) {
                            while ($reply = mysqli_fetch_assoc($result_phanhoi)) {
                                $reply_content = $reply['noidung'];
                                $reply_author = $reply['hoten'];
                                $reply_id_nguoidung = $reply['id_nguoidung'];
                                $reply_id = $reply['id_binhluan'];
                                $giaybl = $reply['phutbl'];
                        ?>
<div class="reply-comment">
  <div class="comment">
    <div class="comment-header">
    <span class="phanhoitu">
      <?php echo 'Phản hồi từ: ';echo $reply_author; ?>
    </span><br>
    </div>
  <div class="comment-content">
    <?php echo $reply_content; ?>
  </div>
  <div class="comment-footer">   
    <div class="reply">
              <?php
              $minute = floor($giaybl / 60);
              $hour = floor($minute / 60);
              if ($giaybl < 60) {
              echo '<p class="comment-time">' . $giaybl. ' giây trước</p>';
              } elseif($minute<60){
                echo '<p class="comment-time">' . $minute . ' phút trước</p>';
              }else {
              echo '<p class="comment-time">' . $hour . ' giờ trước</p>';
              }
              ?>
          <a href="replyform.php?id_danhgia=<?php echo $id_danhgia; ?>">
              <i class="fa-solid fa-reply"></i> Trả lời
          </a>
          <?php if (isset($_SESSION['user']) && isset($_SESSION['user']['id_nguoidung']) && $_SESSION['user']['id_nguoidung'] == $reply_id_nguoidung) { ?>
              <a href="Xoaph.php?id_binhluan=<?php echo $reply_id; ?>">
                  <i class="fa-solid fa-trash" style="padding-left:10px;"></i> Xóa
              </a>
          <?php } ?>
    </div>
  </div>
</div>
</div>
<?php
                            }
                        } else {
                            echo '<div class="tb">Chưa có phản hồi nào cho đánh giá này.</div>';
                        }
                        ?>
                    </div>
                </div>
            </div>
<?php
        }
    } else {
        // Nếu không có đánh giá nào, hiển thị thông báo phù hợp
        echo '<div class="tb">Chưa có đánh giá nào cho dịch vụ này.</div>';
    }
}
?>


  <!-- FOOTER -->
  <footer>
    <div class="container">
      <div class="row">
        <div class="col-lg-4">
          <div class="about">
            <div class="logo">
              <img src="assets/images/logo.jpg" alt="Plot Listing">
            </div>
            <p>Milkteaview là trang web chuyên review các dịch vụ
               trà sữa, cung cấp cho bạn những đánh giá chi tiết và khách quan 
               về các quán trà sữa nổi tiếng.</p>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="helpful-links">
            <h4>Liên kết</h4>
            <div class="row">
              <div class="col-lg-6 col-sm-6">
                <ul>
                  <li><a href="index.php">Trang chủ</a></li>
                  <li><a href="listing.php">Bài viết</a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="contact-us">
            <h4>Liên hệ</h4>
            <p>Liên hệ công việc qua email hoặc số điện thoại</p>
            <div class="row">
              <div class="col-lg-6">
                <a href="#">milkteaview@gmail.com</a>
              </div>
              <div class="col-lg-6">
                <a href="#">090-080-0760</a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-12">
          <div class="sub-footer">
            <p>Sản phẩm thuộc về nhóm 4 ©</p>
            <br>
          </div>
        </div>
      </div>
    </div>
  </footer>


  <!-- Scripts -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="assets/js/animation.js"></script>
  <script src="assets/js/custom.js"></script>

</body>

</html>