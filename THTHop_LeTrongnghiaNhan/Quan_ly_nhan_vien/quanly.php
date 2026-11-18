<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: dangnhap.php");
    exit;
}
?>

<!Doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Quan ly nhan su</title>
<link href="style.css" rel="stylesheet" type="text/css">
</head>
<body>
<div id="container">
  <?php include "banner.php"; ?>
  <h1>QUẢN LÝ DỮ LIỆU</h1>
  <div id="content">
    <ol class="menu" style="width:260px; line-height:30px">
      <li><a href="them.php">Thêm nhân viên mới</a></li>
      <li><a href="chinhsua.php">Chỉnh sửa hồ sơ nhân viên</a></li>
      <li><a href="xoa.php">Xóa hồ sơ nhân viên</a></li>
      <li><a href="thoat.php">Thoát</a></li>
    </ol>
  </div>
  <?php include "footer.php"; ?>
</div>
</body>
</html>
