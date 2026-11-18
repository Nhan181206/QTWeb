<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title><?php echo $tieude; ?></title>
<link href="css/style.css" type="text/css" rel="stylesheet">
<script src="js/banner.js"></script>
</head>
<body onload="chayBanner()">
<div class="wrapper">
<header>
    <!-- Logo có liên kết về trang index.php -->
    <a href="index.php"><img id="logo" src="images/logo.svg" alt="Logo" title="Về trang chủ"></a>
    <!-- Banner là hình động dùng javascript -->
    <img id="banner" src="images/banner1.svg" alt="Banner">
</header>
<nav>
    <a href="index.php">Trang chủ</a>
    <a href="them-xe.php">Thêm xe</a>
    <a href="sua-xe.php">Sửa xe</a>
    <a href="xoa.php">Xóa xe</a>
    <a href="xoa-multi.php">Xóa nhiều xe</a>
</nav>
<div class="content">
