<?php
session_start();

if (!isset($_SESSION['user'])) {
    header("Location: dangnhap.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Quản Lý Dữ Liệu</title>
    <link rel="stylesheet" href="./style.css">
</head>
<body>

    <div class="header-banner">
        <a href="index.php">
            ỦY BAN NHÂN DÂN TỈNH ĐỒNG NAI<br>
            <span>TRƯỜNG CAO ĐẲNG KỸ THUẬT CỘNG NGHỆ ĐỒNG NAI</span><br>
            DONG NAI VOCATIONAL COLLEGE<br>
            <b>NHẤT NGHỆ TINH - NHẤT THÂN VINH</b>
        </a>
    </div>

    <h2 class="title">QUẢN LÝ DỮ LIỆU</h2>

    <div class="menu-box">
        <ol>
            <li><a href="them.php">Thêm nhân viên mới</a></li>
            <li><a href="chinhsua.php">Chỉnh sửa hồ sơ nhân viên</a></li>
            <li><a href="xoa.php">Xóa hồ sơ nhân viên</a></li>
            <li><a href="logout.php">Thoát</a></li>
        </ol>
    </div>

    <div class="footer-banner">
        SVTH: Nguyễn Đăng Khoa - Khoa Công Nghệ Thông Tin.<br>
        Trường Cao Đẳng Nghề Đồng Nai - Số 8, Nguyễn Văn Hoa, Thống Nhất, Biên Hòa.
    </div>

</body>
</html>