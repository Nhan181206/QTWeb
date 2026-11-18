<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: dangnhap.php");
    exit;
}
include "ketnoi.php";

if (isset($_POST['btTrangchu'])) {
    header("Location: index.php");
    exit;
}
if (isset($_POST['btXoa']) && isset($_POST['chon'])) {
    foreach ($_POST['chon'] as $manv) {
        mysqli_query($conn, "delete from nhanvien where manv = '$manv'");
    }
}
?>

<!Doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Xoa nhieu nhan vien</title>
<link href="style.css" rel="stylesheet" type="text/css">
</head>
<body>
<div id="container">
  <h1>XÓA NHIỀU NHÂN VIÊN</h1>
  <form method="post" action="">
    <table class="ds">
      <tr><th></th><th>Mã NV</th><th>Họ Tên</th><th>Phái</th><th>Ngày Sinh</th><th>Địa Chỉ</th><th>Phòng ban</th></tr>
      <?php
      $rs = mysqli_query($conn, "select * from nhanvien");
      while ($row = mysqli_fetch_assoc($rs)) {
          echo "<tr>";
          echo "<td><input type='checkbox' name='chon[]' value='" . $row['manv'] . "'></td>";
          echo "<td>" . $row['manv'] . "</td>";
          echo "<td>" . $row['ho'] . " " . $row['ten'] . "</td>";
          if ($row['phai'] == 1)
              echo "<td>Nam</td>";
          else
              echo "<td>Nữ</td>";
          echo "<td>" . date("d-m-Y", strtotime($row['ngaysinh'])) . "</td>";
          echo "<td>" . $row['diachi'] . "</td>";
          echo "<td>" . $row['mapb'] . "</td>";
          echo "</tr>";
      }
      ?>
    </table>
    <div class="nut">
      <input type="submit" name="btXoa" value="Xóa">
      <input type="submit" name="btTrangchu" value="Trang chủ">
    </div>
  </form>
</div>
</body>
</html>
