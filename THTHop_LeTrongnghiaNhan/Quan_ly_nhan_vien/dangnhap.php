<?php

session_start();
$tbao = "";
if (isset($_POST['btTrangchu'])) {
    header("Location: index.php");
    exit;
}
if (isset($_POST['btDangnhap'])) {
    $user = $_POST['username'];
    $pass = $_POST['password'];
    if ($user != "admin") {
        $tbao = "Tên đăng nhập không đúng";
    } else if ($pass != "123") {
        $tbao = "Mật khẩu không đúng";
    } else {
        $_SESSION['username'] = $user;
        header("Location: quanly.php");
        exit;
    }
}

?>
<!Doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Dang nhap</title>
<link href="style.css" rel="stylesheet" type="text/css">
</head>
<body>
<div id="container">
  <?php include "include/banner.php"; ?>
  <h1>ĐĂNG NHẬP</h1>
  <form method="post" action="">
    <table class="form">
      <tr><td>Tên đăng nhập</td><td><input type="text" name="username"></td></tr>
      <tr><td>Mật khẩu</td><td><input type="password" name="password"></td></tr>
      <tr><td colspan="2" align="center">
        <input type="submit" name="btDangnhap" value="Đăng nhập" style="color:#000">
        <input type="submit" name="btTrangchu" value="Trang chủ" style="color:#000">
      </td></tr>
    </table>
  </form>
  <p class="loi"><?php echo $tbao; ?></p>
  <?php include "footer.php"; ?>
</div>
</body>
</html>
