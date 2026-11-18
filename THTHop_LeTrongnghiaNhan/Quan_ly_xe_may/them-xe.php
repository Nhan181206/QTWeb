<?php
include "include/ketnoi.php";
$trang = "them";
$title = "Thêm xe máy";
$tbao = "";

if (isset($_POST['btThem'])) {
    $tenxe = $_POST['tenxe'];
    $mahang = $_POST['mahang'];
    $namsx = $_POST['namsx'];
    $mota = $_POST['mota'];
    $hinh = $_FILES['hinh']['name'];
    move_uploaded_file($_FILES['hinh']['tmp_name'], "images/" . $hinh);
    $sql = "insert into xe(tenxe, mahang, namsx, mota, hinh) values('$tenxe', '$mahang', $namsx, '$mota', '$hinh')";
    if (mysqli_query($conn, $sql))
        $tbao = "Thêm xe thành công";
    else
        $tbao = "Thêm xe thất bại";
}
include "include/top.php";
?>
<h1>THÊM XE MÁY MỚI</h1>
<form method="post" action="" enctype="multipart/form-data">
  <table class="form">
    <tr><td width="140">Tên xe</td><td><input type="text" name="tenxe"></td></tr>
    <tr><td>Chọn hãng sản xuất</td><td>
      <select name="mahang">
        <?php
        $rs = mysqli_query($conn, "select * from hangxe");
        while ($row = mysqli_fetch_assoc($rs)) {
            echo "<option value='" . $row['mahang'] . "'>" . $row['tenhang'] . "</option>";
        }
        ?>
      </select></td></tr>
    <tr><td>Năm sản xuất</td><td><input type="number" name="namsx" min="<?php echo date("Y") - 5; ?>" max="<?php echo date("Y"); ?>" value="<?php echo date("Y"); ?>"></td></tr>
    <tr><td>Nhập mô tả trên nhiều dòng, bắt đầu bằng dấu -</td><td><textarea name="mota"></textarea></td></tr>
    <tr><td>Chọn file hình</td><td><input type="file" name="hinh"></td></tr>
    <tr><td></td><td><input type="submit" name="btThem" value="Thêm mới" class="btn-form"></td></tr>
  </table>
</form>
<p class="ok"><?php echo $tbao; ?></p>
<?php include "include/bottom.php"; ?>
