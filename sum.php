<?php

require './connect.php';
// Get the id_dichvu from the URL parameter
$id_dichvu = $_GET['id_dichvu'];

// Query for reviews
$sql_reviews = "SELECT dg.tieude, dg.noidung, dg.sosao, nd.hoten 
                FROM danhgia dg 
                INNER JOIN nguoidung nd ON dg.id_nguoidung = nd.id_nguoidung 
                WHERE dg.id_dichvu = $id_dichvu and
                trangthai='approved'
                ORDER BY dg.ngaytao DESC";
$result_reviews = mysqli_query($conn, $sql_reviews);

// Initialize variables
$tongSoSao = 0;
$tongSoDanhGia = 0;

// Calculate total stars and review count
if (mysqli_num_rows($result_reviews) > 0) {
    while ($review = mysqli_fetch_assoc($result_reviews)) {
        $tongSoSao += $review['sosao'];
        $tongSoDanhGia++;
    }

    // Calculate average rating (avoid division by zero)
    if ($tongSoDanhGia > 0) {
        $soSaoTrungBinh = $tongSoSao / $tongSoDanhGia;
    } else {
        $soSaoTrungBinh = 0;
    }
}

// Make variables accessible to detail.php
global $tongSoDanhGia, $soSaoTrungBinh;

?>