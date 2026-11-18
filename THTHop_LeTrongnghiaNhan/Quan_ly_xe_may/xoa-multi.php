<?php
include "include/ketnoi.php";
$trang = "multi";
$title = "Xóa nhiều xe máy";

if (isset($_POST['btXoa']) && isset($_POST['chon'])) {
    foreach ($_POST['chon'] as $maxe) {
        mysqli_query($conn, "delete from xe where maxe = $maxe");
    }
}
include "include/top.php";
?>
<h1>XÓA NHIỀU XE MÁY</h1>
<form method="post" action="">
  <input type="submit" name="btXoa" value="Xóa các xe được chọn" class="cam">
  <table class="ds">
    <tr><th width="40"></th><th width="55">Mã xe</th><th>Tên xe</th><th>Hãng sản xuất</th><th>Năm sản xuất</th><th>Mô tả</th></tr>
    <?php
    $rs = mysqli_query($conn, "select * from xe, hangxe where xe.mahang = hangxe.mahang");
    while ($row = mysqli_fetch_assoc($rs)) {
        echo "<tr>";
        echo "<td class='c'><input type='checkbox' name='chon[]' value='" . $row['maxe'] . "'></td>";
        echo "<td class='c'>" . $row['maxe'] . "</td>";
        echo "<td>" . $row['tenxe'] . "</td>";
        echo "<td>" . $row['tenhang'] . "</td>";
        echo "<td class='c'>" . $row['namsx'] . "</td>";
        echo "<td>" . nl2br($row['mota']) . "</td>";
        echo "</tr>";
    }
    ?>
  </table>
  <input type="submit" name="btXoa" value="Xóa các xe được chọn" class="cam">
</form>
<?php include "include/bottom.php"; ?>
