<?php
include("include/ketnoi.php");
$tieude = "Trang chủ - Quản lý xe máy";
include("include/header.php");
?>
<h2>DANH SÁCH XE MÁY</h2>
<table class="ds">
    <tr>
        <th>STT</th>
        <th>Mã xe</th>
        <th>Hình</th>
        <th>Tên xe</th>
        <th>Hãng sản xuất</th>
        <th>Năm SX</th>
        <th>Mô tả</th>
    </tr>
    <?php
    $sql = "select xe.*, hangxe.tenhang from xe inner join hangxe on xe.mahang = hangxe.mahang order by xe.maxe";
    $rs = mysqli_query($conn, $sql);
    $stt = 1;
    while ($row = mysqli_fetch_assoc($rs)) {
        echo '<tr>
                <td align="center">'.$stt.'</td>
                <td align="center">'.$row["maxe"].'</td>
                <td align="center"><img src="images/'.$row["hinh"].'" alt=""></td>
                <td>'.$row["tenxe"].'</td>
                <td>'.$row["tenhang"].'</td>
                <td align="center">'.$row["namsx"].'</td>
                <td>'.$row["mota"].'</td>
              </tr>';
        $stt = $stt + 1;
    }
    mysqli_close($conn);
    ?>
</table>
<?php include("include/footer.php"); ?>
