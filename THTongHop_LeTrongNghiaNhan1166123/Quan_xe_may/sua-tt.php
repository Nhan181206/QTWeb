<?php
include("include/ketnoi.php");
include("include/upload.php");

$namhientai = date("Y");
$thongbao = "";

// Lấy mã xe cần sửa (GET khi mở trang, POST khi cập nhật)
$maxe = isset($_POST["maxe"]) ? $_POST["maxe"] : (isset($_GET["maxe"]) ? $_GET["maxe"] : "");

if (isset($_POST["capnhat"])) {
    $tenxe = trim($_POST["tenxe"]);
    $mahang = $_POST["mahang"];
    $namsx = trim($_POST["namsx"]);
    $mota = trim($_POST["mota"]);

    if ($tenxe == "") {
        $thongbao = '<span class="loi">Vui lòng nhập tên xe.</span>';
    }
    else if (!is_numeric($namsx) || $namsx < $namhientai || $namsx > $namhientai + 5) {
        $thongbao = '<span class="loi">Năm sản xuất phải từ '.$namhientai.' đến '.($namhientai + 5).'.</span>';
    }
    else {
        $tenfile = "";
        $loi = "";
        if ($_FILES["hinh"]["name"] != "") {
            $loi = uploadHinh("hinh", $tenfile);
        }
        if ($loi != "") {
            $thongbao = '<span class="loi">'.$loi.'</span>';
        } else {
            $sql = "update xe set tenxe='$tenxe', mahang='$mahang', namsx=$namsx, mota='$mota'";
            if ($tenfile != "") {
                $sql .= ", hinh='$tenfile'";
            }
            $sql .= " where maxe='$maxe'";
            if (mysqli_query($conn, $sql)) {
                $thongbao = '<span class="thanhcong">Cập nhật thông tin xe thành công.</span>';
            } else {
                $thongbao = '<span class="loi">Lỗi: '.mysqli_error($conn).'</span>';
            }
        }
    }
}

// Load thông tin của xe được chọn
$rs = mysqli_query($conn, "select * from xe where maxe='$maxe'");
$xe = mysqli_fetch_assoc($rs);

$tieude = "Chỉnh sửa thông tin xe";
include("include/header.php");

if (!$xe) {
    echo '<div class="thongbao"><span class="loi">Không tìm thấy xe.</span></div>';
    echo '<p align="center"><a href="sua-xe.php">Quay về danh sách</a></p>';
} else {
?>
<h2>CHỈNH SỬA THÔNG TIN XE</h2>
<div class="thongbao"><?php echo $thongbao; ?></div>
<form method="post" enctype="multipart/form-data" action="sua-tt.php">
<table class="form-xe">
    <tr>
        <td>Mã xe</td>
        <td>
            <input type="text" value="<?php echo $xe["maxe"]; ?>" disabled>
            <input type="hidden" name="maxe" value="<?php echo $xe["maxe"]; ?>">
        </td>
    </tr>
    <tr>
        <td>Tên xe</td>
        <td><input type="text" name="tenxe" value="<?php echo $xe["tenxe"]; ?>"></td>
    </tr>
    <tr>
        <td>Hãng sản xuất</td>
        <td>
            <select name="mahang">
            <?php
            $rs = mysqli_query($conn, "select * from hangxe order by tenhang");
            while ($row = mysqli_fetch_assoc($rs)) {
                $chon = ($row["mahang"] == $xe["mahang"]) ? " selected" : "";
                echo '<option value="'.$row["mahang"].'"'.$chon.'>'.$row["tenhang"].'</option>';
            }
            ?>
            </select>
        </td>
    </tr>
    <tr>
        <td>Năm sản xuất</td>
        <td><input type="text" name="namsx" maxlength="4" value="<?php echo $xe["namsx"]; ?>"></td>
    </tr>
    <tr>
        <td>Mô tả</td>
        <td><textarea name="mota" rows="4"><?php echo $xe["mota"]; ?></textarea></td>
    </tr>
    <tr>
        <td>Hình hiện tại</td>
        <td><img src="images/<?php echo $xe["hinh"]; ?>" width="120" alt=""></td>
    </tr>
    <tr>
        <td>Đổi hình</td>
        <td><input type="file" name="hinh"></td>
    </tr>
    <tr>
        <td>&nbsp;</td>
        <td>
            <input type="submit" name="capnhat" value="Cập nhật">
            <a href="sua-xe.php">Quay về</a>
        </td>
    </tr>
</table>
</form>
<?php
}
mysqli_close($conn);
include("include/footer.php");
?>
