
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="UTF-8">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <title>Review Trà Sữa</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/templatemo-plot-listing.css">

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
              <li><div class="main-white-button">
              <?php
              session_start();
              require 'connect.php';
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
              ?>
              </div></li> 
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

  <div class="main-banner">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="top-text header-text">
            <h6>Những quán trà sữa chất lượng</h6>
            <h2>Giúp bạn có lựa chọn phù hợp nhất</h2>
          </div>
        </div>
        <div class="col-lg-12">
          <form id="search-form" name="gs" method="submit" role="search" action="#">
            <div class="row">

              <div class="col-lg-3 align-self-center">
                  <fieldset>
                    <input type="search" class="searchText" placeholder="Nhập tên quán..." autocomplete="on" required value="<?=isset($_GET['name']) ? $_GET['name'] : ""?>" name="name" />
                  </fieldset>
              </div>
              <div class="col-lg-3">                        
                  <fieldset>
                      <button class="main-button" onclick="document.getElementById('product-search').submit(); return false;"><i class="fa fa-search"></i> Tìm kiếm ngay</button>
                  </fieldset>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <?php
    
    $search = isset($_GET['name']) ? $_GET['name'] : "";
    include './connect_db.php';
    
    if ($search) {
        // Liên kết đến trang listing.php với từ khóa tìm kiếm
        $search_url = urlencode($search);
        header("Location: listing.php?name=$search_url");
        exit();
        
        // Truy vấn SQL sẽ được thực hiện trong trang listing.php
    } else {
        $dichvu = mysqli_query($con, "SELECT * FROM `dichvu` ORDER BY `id_dichvu` DESC LIMIT 3");
        $totalRecords = mysqli_query($con, "SELECT * FROM `dichvu`");
    }
  ?>
  <div class="recent-listing">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="section-heading">
            <h2>Quán mới nhất</h2>
            <h6>Khám Phá Ngay</h6>
          </div>
        </div>
        <div class="col-lg-12">
          <div class="item">
            <div class="row">
              <div class="col-lg-12">
                <?php while ($row = mysqli_fetch_array($dichvu)) { ?>
                <div class="listing-item">
                  <div class="left-image">
                    <a href="detail.php?id_dichvu=<?= $row['id_dichvu'] ?>"><img src="./<?= $row['anh'] ?>" title="<?= $row['ten_dv'] ?>" alt=""></a>
                  </div>
                  <div class="right-content align-self-center">
                    <a href="detail.php?id_dichvu=<?= $row['id_dichvu'] ?>"><h4><?= $row['ten_dv'] ?></h4></a>
                    <h6>Cửa hàng</h6>

<?php 
    $sql_review_current = "SELECT SUM(sosao) AS tong_sao, COUNT(*) AS tong_danhgia 
    FROM danhgia 
    WHERE id_dichvu = {$row['id_dichvu']} and trangthai='approved'" ;
    $result_review_current = mysqli_query($conn, $sql_review_current);

// Khởi tạo biến số sao trung bình
    $soSaoTrungBinh = 0;
    $tongSoDanhGia = 0;

    if (mysqli_num_rows($result_review_current) > 0) {
        $row_review_current = mysqli_fetch_assoc($result_review_current);
        $tong_sao = $row_review_current['tong_sao'];
    $tongSoDanhGia = $row_review_current['tong_danhgia'];

// Tính toán số sao trung bình (nếu có bài đánh giá)
    if ($tongSoDanhGia > 0) {
        $soSaoTrungBinh = $tong_sao / $tongSoDanhGia;
    }
    }
?>

<ul class="rate">
                <li class="star">
                  <?php
                    // Số sao nguyên (phần nguyên của số sao trung bình)
                    $soSaoNguyen = floor($soSaoTrungBinh);
    
                    // Hiển thị số sao nguyên
                    for ($i = 0; $i < $soSaoNguyen; $i++) {
                      echo '<i class="fa fa-star" style = "padding-right: 3px;"></i>';
                    }                
                    // Kiểm tra nếu phần thập phân của số sao trung bình lớn hơn hoặc bằng 0.5 thì hiển thị thêm nửa sao
                    if ($soSaoTrungBinh - $soSaoNguyen >= 0.5) {
                      echo '<i class="fa fa-star-half-o" style = "padding-right: 3px;"></i>';
                    }
                    $soSaoThieu = 5 - $soSaoNguyen - ($soSaoTrungBinh - $soSaoNguyen >= 0.5 ? 1 : 0);
                    for ($i = 0; $i < $soSaoThieu; $i++) {
                        echo '<i class="fa fa-star-o" style = "padding-right: 3px;"></i>';
                    }
                  ?>
                </li>
                <li>(<?= $tongSoDanhGia ?>) Reviews</li>
              </ul>
                    <span class="price"><div class="icon"><img src="assets/images/listing-icon-01.png" alt=""></div> Giá trung bình: <?= number_format($row['gia_tb'], 0, ",", ".") ?>đ</span>
                    <span class="details">Giới thiệu: <em><?= $row['mota'] ?></em></span>
                    <div class="main-white-button">
                      <a href="detail.php?id_dichvu=<?= $row['id_dichvu'] ?>"><i class="fa fa-eye"></i> Xem chi tiết</a>
                    </div>
                  </div>
                </div>
                <?php } ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- SEE MORE -->
  <div class="see-more">
    <a href="listing.php" class="see-more-btn">Xem Thêm</a>
  </div>

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
