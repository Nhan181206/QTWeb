<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: dangnhap.php");
    exit;
}
include "ketnoi.php";

if (isset($_POST['btQuayve'])) {
    header("Location: chinhsua.php");
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

$tbao = "";
if (isset($_POST['btCapnhat'])) {
    $manv = $_POST['manv'];
    $ho = $_POST['ho'];
    $ten = $_POST['ten'];
    $phai = $_POST['phai'];
    $ngaysinh = $_POST['nam'] . "-" . $_POST['thang'] . "-" . $_POST['ngay'];
    $diachi = $_POST['diachi'];
    $mapb = $_POST['mapb'];
    $sql = "update nhanvien set ho = '$ho', ten = '$ten', phai = $phai, ngaysinh = '$ngaysinh', diachi = '$diachi', mapb = '$mapb' where manv = '$manv'";
    if (mysqli_query($conn, $sql))
        $tbao = "Cập nhật thành công";
    else
        $tbao = "Cập nhật thất bại";
} else {
    $manv = $_GET['manv'];
}

$rs = mysqli_query($conn, "select * from nhanvien where manv = '$manv'");
$nv = mysqli_fetch_assoc($rs);
$ngay = date("j", strtotime($nv['ngaysinh']));
$thang = date("n", strtotime($nv['ngaysinh']));
$nam = date("Y", strtotime($nv['ngaysinh']));
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
  <h1>SỬA THÔNG TIN NHÂN VIÊN</h1>
  <form method="post" action="">
    <table class="form">
      <tr><td>Mã nhân viên</td><td><input type="text" name="manv" value="<?php echo $nv['manv']; ?>" readonly></td></tr>
      <tr><td>Họ và tên lót</td><td><input type="text" name="ho" value="<?php echo $nv['ho']; ?>"></td></tr>
      <tr><td>Tên nhân viên</td><td><input type="text" name="ten" value="<?php echo $nv['ten']; ?>"></td></tr>
      <tr><td>Giới tính</td><td>
        <select name="phai" style="width:186px">
          <option value="1" <?php if ($nv['phai'] == 1) echo "selected"; ?>>Nam</option>
          <option value="0" <?php if ($nv['phai'] == 0) echo "selected"; ?>>Nữ</option>
        </select></td></tr>
      <tr><td>Ngày sinh</td><td>
        <select name="ngay">
          <?php
          for ($i = 1; $i <= 31; $i++) {
              if ($i == $ngay)
                  echo "<option value='$i' selected>$i</option>";
              else
                  echo "<option value='$i'>$i</option>";
          }
          ?>
        </select> /
        <select name="thang">
          <?php
          for ($i = 1; $i <= 12; $i++) {
              if ($i == $thang)
                  echo "<option value='$i' selected>$i</option>";
              else
                  echo "<option value='$i'>$i</option>";
          }
          ?>
        </select> /
        <select name="nam">
          <?php
          for ($i = 2017; $i >= 1950; $i--) {
              if ($i == $nam)
                  echo "<option value='$i' selected>$i</option>";
              else
                  echo "<option value='$i'>$i</option>";
          }
          ?>
        </select></td></tr>
      <tr><td>Địa chỉ</td><td><input type="text" name="diachi" value="<?php echo $nv['diachi']; ?>"></td></tr>
      <tr><td>Phòng ban</td><td>
        <select name="mapb" style="width:186px">
          <?php
          $rs = mysqli_query($conn, "select * from phongban");
          while ($row = mysqli_fetch_assoc($rs)) {
              if ($row['mapb'] == $nv['mapb'])
                  echo "<option value='" . $row['mapb'] . "' selected>" . $row['tenpb'] . "</option>";
              else
                  echo "<option value='" . $row['mapb'] . "'>" . $row['tenpb'] . "</option>";
          }
          ?>
        </select></td></tr>
    </table>
    <div class="nut">
      <input type="submit" name="btCapnhat" value="Cập nhật">
      <input type="submit" name="btQuayve" value="Quay về">
      <input type="submit" name="btThoat" value="Thoát">
      <input type="submit" name="btTrangchu" value="Trang chủ">
    </div>
  </form>
  <p class="ok"><?php echo $tbao; ?></p>
  <?php include "footer.php"; ?>
</div>
</body>
</html>
