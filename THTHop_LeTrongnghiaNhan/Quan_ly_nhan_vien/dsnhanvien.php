<?php include "ketnoi.php"; ?>

<!Doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Danh sach nhan vien</title>
<link href="style.css" rel="stylesheet" type="text/css">
</head>
<body>
<div id="container">
  <?php include "include/banner.php"; ?>
  <h1>DANH SÁCH NHÂN VIÊN</h1>
  <form method="post" action="">
    <div class="center">
      Chọn phòng ban
      <select name="mapb">
        <option value="">Xem tất cả</option>
        <?php
        $rs = mysqli_query($conn, "select * from phongban");
        while ($row = mysqli_fetch_assoc($rs)) {
            if (isset($_POST['mapb']) && $_POST['mapb'] == $row['mapb'])
                echo "<option value='" . $row['mapb'] . "' selected>" . $row['tenpb'] . "</option>";
            else
                echo "<option value='" . $row['mapb'] . "'>" . $row['tenpb'] . "</option>";
        }
        ?>
      </select>
      &nbsp;&nbsp;
      <input type="submit" name="btTim" value="Tìm" class="btn-do">
    </div>
  </form>
  <br>
  <?php
  if (isset($_POST['btTim'])) {
      $mapb = $_POST['mapb'];
      if ($mapb == "")
          $sql = "select * from nhanvien, phongban where nhanvien.mapb = phongban.mapb";
      else
          $sql = "select * from nhanvien, phongban where nhanvien.mapb = phongban.mapb and nhanvien.mapb = '$mapb'";
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
  <?php include "include/footer.php"; ?>
</div>
</body>
</html>
