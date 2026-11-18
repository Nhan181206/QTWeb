<?php session_start(); ?>

<!Doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Quản lý nhân sự</title>
<link href="style.css" rel="stylesheet" type="text/css">
</head>
<body>
<div id="container">
  <?php include "banner.php"; ?>
  <h1>QUẢN LÝ NHÂN SỰ</h1>
  <div id="content">
    <ol class="menu">
      <li><a href="dsnhanvien.php">Xem danh sách nhân viên</a></li>
      <li><a href="timkiem.php">Tìm kiếm nhân viên</a></li>
      <li><a href="dangnhap.php">Quản lý dữ liệu</a></li>
    </ol>
  </div>
  <?php include "footer.php"; ?>
</div>
</body>
</html>
