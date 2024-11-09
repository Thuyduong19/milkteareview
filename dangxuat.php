<?php
    session_start();
    unset($_SESSION['user']);
    ?>
<script> alert('Đăng xuất tài khoản thành công');
    window.location.href = 'index.php';
</script>
    