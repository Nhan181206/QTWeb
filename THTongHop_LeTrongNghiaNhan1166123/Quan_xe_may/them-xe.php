<?php
include("include/ketnoi.php");
include("include/upload.php");

$namhientai = date("Y");
$thongbao = "";
$maxe = "";
$tenxe = "";
$mahang = "";
$namsx = $namhientai;   // Giá trị mặc định là năm hiện tại
$mota = "";

if (isset($_POST["them"])) {
    $maxe = trim($_POST["maxe"]);
    $tenxe = trim($_POST["tenxe"]);
    $mahang = $_POST["mahang"];
    $namsx = trim($_POST["namsx"]);
    $mota = trim($_POST["mota"]);

    if ($maxe == "" || $tenxe == "") {
        $thongbao = '<span class="loi">Vui lòng nhập đầy đủ mã xe và tên xe.</span>';
    }
    // Miền giá trị của năm sản xuất: trong vòng 5 năm kể từ năm hiện tại
    else if (!is_numeric($namsx) || $namsx < $namhientai || $namsx > $namhientai + 5) {
        $thongbao = '<span class="loi">Năm sản xuất phải từ '.$namhientai.' đến '.($namhientai + 5).'.</span>';
    }
    else {
        $check = mysqli_query($conn, "select maxe from xe where maxe = '$maxe'");
        if (mysqli_num_rows($check) > 0) {
            $thongbao = '<span class="loi">Mã xe đã tồn tại.</span>';
        } else {
            $tenfile = "";
            $loi = "";
            if ($_FILES["hinh"]["name"] != "") {
                $loi = uploadHinh("hinh", $tenfile);
            }
            if ($loi != "") {
                $thongbao = '<span class="loi">'.$loi.'</span>';
            } else {
                $sql = "insert into xe(maxe, tenxe, mahang, namsx, mota, hinh) values('$maxe', '$tenxe', '$mahang', $namsx, '$mota', '$tenfile')";
                if (mysqli_query($conn, $sql)) {
                    $thongbao = '<span class="thanhcong">Thêm xe thành công.</span>';
                    $maxe = $tenxe = $mota = "";
                    $namsx = $namhientai;
                } else {
                    $thongbao = '<span class="loi">Lỗi: '.mysqli_error($conn).'</span>';
                }
            }
        }
    }
}

$tieude = "Thêm xe mới";
include("include/header.php");
?>
<h2>THÊM XE MỚI</h2>
<div class="thongbao"><?php echo $thongbao; ?></div>
<form method="post" enctype="multipart/form-data" action="them-xe.php">
<table class="form-xe">
    <tr>
        <td>Mã xe</td>
        <td><input type="text" name="maxe" maxlength="10" value="<?php echo $maxe; ?>"></td>
    </tr>
    <tr>
        <td>Tên xe</td>
        <td><input type="text" name="tenxe" value="<?php echo $tenxe; ?>"></td>
    </tr>
    <tr>
        <td>Hãng sản xuất</td>
        <td>
            <select name="mahang">
            <?php
            $rs = mysqli_query($conn, "select * from hangxe order by tenhang");
            while ($row = mysqli_fetch_assoc($rs)) {
                $chon = ($row["mahang"] == $mahang) ? " selected" : "";
                echo '<option value="'.$row["mahang"].'"'.$chon.'>'.$row["tenhang"].'</option>';
            }
            ?>
            </select>
        </td>
    </tr>
    <tr>
        <td>Năm sản xuất</td>
        <td><input type="text" name="namsx" maxlength="4" value="<?php echo $namsx; ?>"></td>
    </tr>
    <tr>
        <td>Mô tả</td>
        <td><textarea name="mota" rows="4"><?php echo $mota; ?></textarea></td>
    </tr>
    <tr>
        <td>Hình</td>
        <td><input type="file" name="hinh"></td>
    </tr>
    <tr>
        <td>&nbsp;</td>
        <td><input type="submit" name="them" value="Thêm mới"></td>
    </tr>
</table>
</form>
<?php
mysqli_close($conn);
include("include/footer.php");
?>
