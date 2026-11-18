<?php
include "include/ketnoi.php";
$trang = "index";
$title = "Quản lý xe máy";
include "include/top.php";
?>
<h1 class="ql">QUẢN LÝ XE MÁY</h1>
<?php
$sql = "select * from xe, hangxe where xe.mahang = hangxe.mahang";
$rs = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_assoc($rs)) {
?>
<div class="xe">
  <div class="hinh"><img src="images/<?php echo $row['hinh']; ?>" alt="<?php echo $row['tenxe']; ?>" width="190"></div>
  <div class="tt">
    <h2><?php echo $row['tenxe']; ?></h2>
    <p class="mota"><?php echo nl2br($row['mota']); ?></p>
    <p>Hãng sản xuất: <?php echo $row['tenhang']; ?><br>
       Năm sản xuất: <?php echo $row['namsx']; ?></p>
  </div>
</div>
<?php } ?>
<?php include "include/bottom.php"; ?>
