<?php
$conn = mysqli_connect("localhost", "root", "", "qlnhanvien");
if (!$conn) {
    die("Kết nối thất bại: " . mysqli_connect_error());
}
mysqli_set_charset($conn, "utf8mb4");

$manv = isset($_GET['manv']) ? mysqli_real_escape_string($conn, $_GET['manv']) : (isset($_POST['manv']) ? mysqli_real_escape_string($conn, $_POST['manv']) : '');

$thong_bao = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ho = trim($_POST['ho'] ?? '');
    $ten = trim($_POST['ten'] ?? '');
    $phai = trim($_POST['phai'] ?? 'Nam');
    
    $ngay = $_POST['ngay'] ?? '1';
    $thang = $_POST['thang'] ?? '1';
    $nam = $_POST['nam'] ?? '2000';
    $ngaysinh = "$nam-$thang-$ngay";

    $diachi = trim($_POST['diachi'] ?? '');
    $mapb = trim($_POST['mapb'] ?? '');

    if ($ho !== '' && $ten !== '') {
        $sql_update = "UPDATE nhanvien SET 
                       ho = '$ho', 
                       ten = '$ten', 
                       phai = '$phai', 
                       ngaysinh = '$ngaysinh', 
                       diachi = '$diachi', 
                       mapb = '$mapb' 
                       WHERE manv = '$manv'";

        if (mysqli_query($conn, $sql_update)) {
            $thong_bao = "Cập nhật nhân viên thành công!";
        } else {
            $thong_bao = "Lỗi cập nhật dữ liệu!";
        }
    } else {
        $thong_bao = "Họ và tên không được để trống!";
    }
}

$sql = "SELECT * FROM nhanvien WHERE manv = '$manv'";
$result = mysqli_query($conn, $sql);
$row = ($result) ? mysqli_fetch_assoc($result) : null;

$sql_pb = "SELECT * FROM phongban";
$result_pb = mysqli_query($conn, $sql_pb);
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Cập Nhật Thông Tin Nhân Viên</title>
    <link rel="stylesheet" href="./style5.css">
</head>
<body>

    <div class="header-banner">
        ỦY BAN NHÂN DÂN TỈNH ĐỒNG NAI<br>
        <span>TRƯỜNG CAO ĐẲNG NGHỀ ĐỒNG NAI</span><br>
        DONG NAI VOCATIONAL COLLEGE<br>
        <b>NHẤT NGHỆ TINH - NHẤT THÂN VINH</b>
    </div>

    <form action="" method="POST">
        <input type="hidden" name="manv" value="<?php echo htmlspecialchars($manv); ?>">
        <table class="form-table">
            <tr>
                <th colspan="2" class="form-title">CẬP NHẬT THÔNG TIN NHÂN VIÊN</th>
            </tr>
            <?php if ($thong_bao !== ''): ?>
                <tr>
                    <td colspan="2" align="center" style="color: green; font-weight: bold;"><?php echo $thong_bao; ?></td>
                </tr>
            <?php endif; ?>
            <tr>
                <td class="form-label" align="right">Mã nhân viên:</td>
                <td class="form-input"><b><?php echo htmlspecialchars($manv); ?></b></td>
            </tr>
            <tr>
                <td class="form-label" align="right">Họ và tên lót:</td>
                <td class="form-input"><input type="text" name="ho" value="<?php echo htmlspecialchars($row['ho'] ?? ''); ?>" required></td>
            </tr>
            <tr>
                <td class="form-label" align="right">Tên nhân viên:</td>
                <td class="form-input"><input type="text" name="ten" value="<?php echo htmlspecialchars($row['ten'] ?? ''); ?>" required></td>
            </tr>
            <tr>
                <td class="form-label" align="right">Giới tính:</td>
                <td class="form-input">
                    <select name="phai">
                        <option value="Nam" <?php if(($row['phai'] ?? '') == 'Nam') echo 'selected'; ?>>Nam</option>
                        <option value="Nữ" <?php if(($row['phai'] ?? '') == 'Nữ') echo 'selected'; ?>>Nữ</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td class="form-label" align="right">Ngày sinh:</td>
                <td class="form-input">
                    <?php 
                    $ns = $row['ngaysinh'] ?? '2000-01-01';
                    $arr_ns = explode('-', $ns);
                    $n_nam = $arr_ns[0] ?? '2000';
                    $n_thang = $arr_ns[1] ?? '1';
                    $n_ngay = $arr_ns[2] ?? '1';
                    ?>
                    <select name="ngay">
                        <?php for($i=1; $i<=31; $i++) {
                            $sel = ($i == (int)$n_ngay) ? 'selected' : '';
                            echo "<option value='$i' $sel>$i</option>";
                        } ?>
                    </select> / 
                    <select name="thang">
                        <?php for($i=1; $i<=12; $i++) {
                            $sel = ($i == (int)$n_thang) ? 'selected' : '';
                            echo "<option value='$i' $sel>$i</option>";
                        } ?>
                    </select> / 
                    <select name="nam">
                        <?php for($i=1950; $i<=2005; $i++) {
                            $sel = ($i == (int)$n_nam) ? 'selected' : '';
                            echo "<option value='$i' $sel>$i</option>";
                        } ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td class="form-label" align="right">Địa chỉ:</td>
                <td class="form-input"><input type="text" name="diachi" value="<?php echo htmlspecialchars($row['diachi'] ?? ''); ?>"></td>
            </tr>
            <tr>
                <td class="form-label" align="right">Phòng ban:</td>
                <td class="form-input">
                    <select name="mapb">
                        <?php 
                        if ($result_pb) {
                            while ($pb = mysqli_fetch_assoc($result_pb)) {
                                $sel = (($row['mapb'] ?? '') == $pb['mapb']) ? 'selected' : '';
                                echo "<option value='" . $pb['mapb'] . "' $sel>" . htmlspecialchars($pb['tenpb']) . "</option>";
                            }
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td colspan="2" align="center" class="form-buttons">
                    <input type="submit" value="Cập nhật">
                    <input type="button" value="Quay về" onclick="window.location.href='sua-ttnv.php'">
                    <input type="button" value="Thoát" onclick="window.location.href='#'">
                    <input type="button" value="Trang chủ" onclick="window.location.href='#'">
                </td>
            </tr>
        </table>
    </form>

    <div class="footer-banner" style="margin-top: 30px;">
        SVTH: Nguyễn Đăng Khoa - Khoa Công Nghệ Thông Tin<br>
        Trường Cao Đẳng Nghề Đồng Nai - Số 8, Nguyễn Văn Hoa, Thống Nhất, Biên Hòa.
    </div>

</body>
</html>
<?php mysqli_close($conn); ?>