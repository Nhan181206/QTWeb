<?php
include "include/ketnoi.php";
$trang = "xoa";
$title = "Xóa thông tin xe máy";
if (isset($_GET['maxe'])) {
    $maxe = $_GET['maxe'];
    mysqli_query($conn, "delete from xe where maxe = $maxe");
}
include "include/top.php";
?>
<h1>XÓA THÔNG TIN XE MÁY</h1>
<table class="ds">
  <tr><th width="55">Mã xe</th><th>Tên xe</th><th>Hãng sản xuất</th><th>Năm sản xuất</th><th>Mô tả</th><th width="75">Liên kết</th></tr>
  <?php
  $rs = mysqli_query($conn, "select * from xe, hangxe where xe.mahang = hangxe.mahang");
  while ($row = mysqli_fetch_assoc($rs)) {
      echo "<tr>";
      echo "<td class='c'>" . $row['maxe'] . "</td>";
      echo "<td>" . $row['tenxe'] . "</td>";
      echo "<td>" . $row['tenhang'] . "</td>";
      echo "<td class='c'>" . $row['namsx'] . "</td>";
      echo "<td>" . nl2br($row['mota']) . "</td>";
      echo "<td class='c'><a href='xoa.php?maxe=" . $row['maxe'] . "'>Xóa</a></td>";
      echo "</tr>";
  }
  ?>
</table>
<?php include "include/bottom.php"; ?>
