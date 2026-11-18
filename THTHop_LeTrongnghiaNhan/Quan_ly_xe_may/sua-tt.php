<?php
include "include/ketnoi.php";
$trang = "sua";
$title = "Thông tin xe cần chỉnh sửa";
$tbao = "";

if (isset($_POST['btCapnhat'])) {
    $maxe = $_POST['maxe'];
    $tenxe = $_POST['tenxe'];
    $mahang = $_POST['mahang'];
    $namsx = $_POST['namsx'];
    $mota = $_POST['mota'];
    $hinh = $_FILES['hinh']['name'];
    if ($hinh != "") {
        move_uploaded_file($_FILES['hinh']['tmp_name'], "images/" . $hinh);
        $sql = "update xe set tenxe = '$tenxe', mahang = '$mahang', namsx = $namsx, mota = '$mota', hinh = '$hinh' where maxe = $maxe";
    } else {
        $sql = "update xe set tenxe = '$tenxe', mahang = '$mahang', namsx = $namsx, mota = '$mota' where maxe = $maxe";
    }
    if (mysqli_query($conn, $sql))
        $tbao = "Cập nhật thông tin xe thành công";
    else
        $tbao = "Cập nhật thất bại";
} else {
    $maxe = $_GET['maxe'];
}

$rs = mysqli_query($conn, "select * from xe where maxe = $maxe");
$xe = mysqli_fetch_assoc($rs);
include "include/top.php";
?>
<h1>THÔNG TIN XE CẦN CHỈNH SỬA</h1>
<form method="post" action="" enctype="multipart/form-data">
  <input type="hidden" name="maxe" value="<?php echo $xe['maxe']; ?>">
  <table class="form">
    <tr><td width="140">Tên xe</td><td><input type="text" name="tenxe" value="<?php echo $xe['tenxe']; ?>"></td></tr>
    <tr><td>Chọn hãng sản xuất</td><td>
      <select name="mahang">
        <?php
        $rs = mysqli_query($conn, "select * from hangxe");
        while ($row = mysqli_fetch_assoc($rs)) {
            if ($row['mahang'] == $xe['mahang'])
                echo "<option value='" . $row['mahang'] . "' selected>" . $row['tenhang'] . "</option>";
            else
                echo "<option value='" . $row['mahang'] . "'>" . $row['tenhang'] . "</option>";
        }
        ?>
      </select></td></tr>
    <tr><td>Năm sản xuất</td><td><input type="number" name="namsx" value="<?php echo $xe['namsx']; ?>"></td></tr>
    <tr><td>Nhập mô tả trên nhiều dòng, bắt đầu bằng dấu -</td><td><textarea name="mota"><?php echo $xe['mota']; ?></textarea></td></tr>
    <tr><td>Chọn file hình</td><td><input type="file" name="hinh"></td></tr>
    <tr><td></td><td><input type="submit" name="btCapnhat" value="Cập nhật" class="btn-form"></td></tr>
  </table>
</form>
<p class="ok"><?php echo $tbao; ?></p>
<?php include "include/bottom.php"; ?>
