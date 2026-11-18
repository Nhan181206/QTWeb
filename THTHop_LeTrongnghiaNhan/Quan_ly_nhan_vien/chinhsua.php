<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: dangnhap.php");
    exit;
}
include "ketnoi.php";

if (isset($_POST['btQuayve'])) {
    header("Location: quanly.php");
    exit;
}
if (isset($_POST['btThoat'])) {
    header("Location: thoat.php");
    exit;
}
if (isset($_POST['btTrangchu'])) {
    header("Location: index.php");
    exit;
}

?>
<!octype html>
<html>
<head>
<meta charset="utf-8">
<title>Quan ly nhan su</title>
<link href="style.css" rel="stylesheet" type="text/css">
</head>
<body>
<div id="container">
  <?php include "banner.php"; ?>
  <h1>CẬP NHẬT THÔNG TIN NHÂN VIÊN</h1>
  <table class="ds">
    <tr><th>STT</th><th>MãNV</th><th>Họ tên</th><th>Phái</th><th>Ngày sinh</th><th>Địa chỉ</th><th>Phòng ban</th><th>link</th></tr>
    <?php
    $rs = mysqli_query($conn, "select * from nhanvien");
    $stt = 1;
    while ($row = mysqli_fetch_assoc($rs)) {
        echo "<tr>";
        echo "<td>$stt</td>";
        echo "<td>" . $row['manv'] . "</td>";
        echo "<td>" . $row['ho'] . " " . $row['ten'] . "</td>";
        if ($row['phai'] == 1)
            echo "<td>Nam</td>";
        else
            echo "<td>Nữ</td>";
        echo "<td>" . date("d-m-Y", strtotime($row['ngaysinh'])) . "</td>";
        echo "<td>" . $row['diachi'] . "</td>";
        echo "<td>" . $row['mapb'] . "</td>";
        echo "<td><a href='sua.php?manv=" . $row['manv'] . "'>Sửa</a></td>";
        echo "</tr>";
        $stt++;
    }
    ?>
  </table>
  <form method="post" action="">
    <div class="nut">
      <input type="submit" name="btQuayve" value="Quay về">
      <input type="submit" name="btThoat" value="Thoát">
      <input type="submit" name="btTrangchu" value="Trang chủ">
    </div>
  </form>
  <?php include "include/footer.php"; ?>
</div>
</body>
</html>
