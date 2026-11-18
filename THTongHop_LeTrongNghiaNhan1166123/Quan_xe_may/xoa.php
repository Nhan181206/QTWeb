<?php
include("include/ketnoi.php");
$thongbao = "";

// Khi nhấn liên kết Xóa thì xóa xe tương ứng (method GET với tham số là mã xe)
if (isset($_GET["maxe"])) {
    $maxe = $_GET["maxe"];
    $sql = "delete from xe where maxe='$maxe'";
    if (mysqli_query($conn, $sql)) {
        $thongbao = '<span class="thanhcong">Đã xóa xe có mã '.$maxe.'.</span>';
    } else {
        $thongbao = '<span class="loi">Lỗi: '.mysqli_error($conn).'</span>';
    }
}

$tieude = "Xóa xe";
include("include/header.php");
?>
<h2>XÓA XE</h2>
<div class="thongbao"><?php echo $thongbao; ?></div>
<table class="ds">
    <tr>
        <th>STT</th>
        <th>Mã xe</th>
        <th>Tên xe</th>
        <th>Hãng sản xuất</th>
        <th>Năm SX</th>
        <th>Xóa</th>
    </tr>
    <?php
    $sql = "select xe.*, hangxe.tenhang from xe inner join hangxe on xe.mahang = hangxe.mahang order by xe.maxe";
    $rs = mysqli_query($conn, $sql);
    $stt = 1;
    while ($row = mysqli_fetch_assoc($rs)) {
        echo '<tr>
                <td align="center">'.$stt.'</td>
                <td align="center">'.$row["maxe"].'</td>
                <td>'.$row["tenxe"].'</td>
                <td>'.$row["tenhang"].'</td>
                <td align="center">'.$row["namsx"].'</td>
                <td align="center"><a href="xoa.php?maxe='.$row["maxe"].'" onclick="return confirm(\'Bạn có chắc muốn xóa xe này?\');">Xóa</a></td>
              </tr>';
        $stt = $stt + 1;
    }
    mysqli_close($conn);
    ?>
</table>
<?php include("include/footer.php"); ?>
