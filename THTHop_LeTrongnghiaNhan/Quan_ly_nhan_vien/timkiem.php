<?php include "ketnoi.php"; ?>

<!Doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Tim thong tin nhan vien</title>
<link href="style.css" rel="stylesheet" type="text/css">
</head>
<body>
<div id="container">
  <?php include "banner.php"; ?>
  <h1>TÌM THÔNG TIN NHÂN VIÊN</h1>
  <form method="post" action="">
    <div class="center">
      Nhập tên hoặc một phần họ tên cần tìm
      <input type="text" name="tukhoa" style="width:260px">
      <input type="submit" name="btTim" value="Tìm" class="btn-do">
    </div>
  </form>
  <br>
  <?php
  if (isset($_POST['btTim'])) {
      $tukhoa = $_POST['tukhoa'];
      $sql = "select * from nhanvien, phongban where nhanvien.mapb = phongban.mapb and concat(ho, ' ', ten) like '%$tukhoa%'";
      $rs = mysqli_query($conn, $sql);
  ?>
  <table class="ds">
    <tr><th>STT</th><th>MãNV</th><th>Họ tên</th><th>Phái</th><th>Ngày sinh</th><th>Địa chỉ</th><th>Phòng ban</th></tr>
    <?php
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
        echo "<td>" . $row['tenpb'] . "</td>";
        echo "</tr>";
        $stt++;
    }
    ?>
  </table>
  <?php } ?>
  <?php include "footer.php"; ?>
</div>
</body>
</html>
