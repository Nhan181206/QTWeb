<?php
include("include/ketnoi.php");
$thongbao = "";

// Xóa các xe được chọn
if (isset($_POST["xoa"])) {
    if (isset($_POST["chon"])) {
        $dsma = "'" . implode("','", $_POST["chon"]) . "'";
        $sql = "delete from xe where maxe in ($dsma)";
        if (mysqli_query($conn, $sql)) {
            $thongbao = '<span class="thanhcong">Đã xóa '.count($_POST["chon"]).' xe.</span>';
        } else {
            $thongbao = '<span class="loi">Lỗi: '.mysqli_error($conn).'</span>';
        }
    } else {
        $thongbao = '<span class="loi">Vui lòng chọn ít nhất một xe để xóa.</span>';
    }
}

$tieude = "Xóa nhiều xe";
include("include/header.php");
?>
<script>
// Chọn / bỏ chọn tất cả các dòng
function chonTatCa(obj) {
    var ds = document.getElementsByName("chon[]");
    for (var i = 0; i < ds.length; i++) {
        ds[i].checked = obj.checked;
    }
}
</script>
<h2>XÓA NHIỀU XE CÙNG LÚC</h2>
<div class="thongbao"><?php echo $thongbao; ?></div>
<form method="post" action="xoa-multi.php" onsubmit="return confirm('Bạn có chắc muốn xóa các xe đã chọn?');">
<table class="ds">
    <tr>
        <th><input type="checkbox" onclick="chonTatCa(this)"></th>
        <th>STT</th>
        <th>Mã xe</th>
        <th>Tên xe</th>
        <th>Hãng sản xuất</th>
        <th>Năm SX</th>
    </tr>
    <?php
    $sql = "select xe.*, hangxe.tenhang from xe inner join hangxe on xe.mahang = hangxe.mahang order by xe.maxe";
    $rs = mysqli_query($conn, $sql);
    $stt = 1;
    while ($row = mysqli_fetch_assoc($rs)) {
        echo '<tr>
                <td align="center"><input type="checkbox" name="chon[]" value="'.$row["maxe"].'"></td>
                <td align="center">'.$stt.'</td>
                <td align="center">'.$row["maxe"].'</td>
                <td>'.$row["tenxe"].'</td>
                <td>'.$row["tenhang"].'</td>
                <td align="center">'.$row["namsx"].'</td>
              </tr>';
        $stt = $stt + 1;
    }
    mysqli_close($conn);
    ?>
</table>
<p align="center"><input type="submit" name="xoa" value="Xóa các xe đã chọn"></p>
</form>
<?php include("include/footer.php"); ?>
