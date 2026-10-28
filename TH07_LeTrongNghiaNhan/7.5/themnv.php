<?php
$conn = mysqli_connect("localhost", "root", "", "qlnhanvien");
if (!$conn) {
    die("Kết nối thất bại: " . mysqli_connect_error());
}
mysqli_set_charset($conn, "utf8mb4");

$sql_pb = "SELECT * FROM phongban";
$result_pb = mysqli_query($conn, $sql_pb);

$thong_bao = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $manv = trim($_POST['manv'] ?? '');
    $ho = trim($_POST['ho'] ?? '');
    $ten = trim($_POST['ten'] ?? '');
    $phai = trim($_POST['phai'] ?? 'Nam');

    $ngay = $_POST['ngay'] ?? '1';
    $thang = $_POST['thang'] ?? '1';
    $nam = $_POST['nam'] ?? '2000';
    $ngaysinh = "$nam-$thang-$ngay";
    
    $diachi = trim($_POST['diachi'] ?? '');
    $mapb = trim($_POST['mapb'] ?? '');

    if ($manv !== '' && $ho !== '' && $ten !== '') {
        $manv_es = mysqli_real_escape_string($conn, $manv);
        $ho_es = mysqli_real_escape_string($conn, $ho);
        $ten_es = mysqli_real_escape_string($conn, $ten);
        $diachi_es = mysqli_real_escape_string($conn, $diachi);
        $mapb_es = mysqli_real_escape_string($conn, $mapb);

        $sql_insert = "INSERT INTO nhanvien (manv, ho, ten, phai, ngaysinh, diachi, mapb) 
                       VALUES ('$manv_es', '$ho_es', '$ten_es', '$phai', '$ngaysinh', '$diachi_es', '$mapb_es')";

        if (mysqli_query($conn, $sql_insert)) {
            $thong_bao = "Thêm nhân viên thành công!";
        } else {
            $thong_bao = "Lỗi: Trùng mã nhân viên hoặc dữ liệu không hợp lệ!";
        }
    } else {
        $thong_bao = "Vui lòng nhập đầy đủ thông tin bắt buộc!";
    }
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Thêm Nhân Viên Mới</title>
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
        <table class="form-table">
            <tr>
                <th colspan="2" class="form-title">THÊM NHÂN VIÊN MỚI</th>
            </tr>
            <?php if ($thong_bao !== ''): ?>
                <tr>
                    <td colspan="2" align="center" style="color: red; font-weight: bold;"><?php echo $thong_bao; ?></td>
                </tr>
            <?php endif; ?>
            <tr>
                <td class="form-label" align="right">Mã nhân viên:</td>
                <td class="form-input"><input type="text" name="manv" required></td>
            </tr>
            <tr>
                <td class="form-label" align="right">Họ và tên lót:</td>
                <td class="form-input"><input type="text" name="ho" required></td>
            </tr>
            <tr>
                <td class="form-label" align="right">Tên nhân viên:</td>
                <td class="form-input"><input type="text" name="ten" required></td>
            </tr>
            <tr>
                <td class="form-label" align="right">Giới tính:</td>
                <td class="form-input">
                    <select name="phai">
                        <option value="Nam">Nam</option>
                        <option value="Nữ">Nữ</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td class="form-label" align="right">Ngày sinh:</td>
                <td class="form-input">
                    <select name="ngay">
                        <?php for($i=1; $i<=31; $i++) echo "<option value='$i'>$i</option>"; ?>
                    </select> / 
                    <select name="thang">
                        <?php for($i=1; $i<=12; $i++) echo "<option value='$i'>$i</option>"; ?>
                    </select> / 
                    <select name="nam">
                        <?php for($i=1950; $i<=2005; $i++) echo "<option value='$i'>$i</option>"; ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td class="form-label" align="right">Địa chỉ:</td>
                <td class="form-input"><input type="text" name="diachi"></td>
            </tr>
            <tr>
                <td class="form-label" align="right">Phòng ban:</td>
                <td class="form-input">
                    <select name="mapb">
                        <?php 
                        if ($result_pb) {
                            while ($pb = mysqli_fetch_assoc($result_pb)) {
                                echo "<option value='" . $pb['mapb'] . "'>" . htmlspecialchars($pb['tenpb']) . "</option>";
                            }
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td colspan="2" align="center" class="form-buttons">
                    <input type="submit" value="Thêm mới">
                    <input type="reset" value="Quay về">
                    <input type="button" value="Thoát" onclick="window.location.href='#'">
                    <input type="button" value="Trang chủ" onclick="window.location.href='#'">
                </td>
            </tr>
        </table>
    </form>

    <div class="footer-banner">
        SVTH: Nguyễn Đăng Khoa - Khoa Công Nghệ Thông Tin<br>
        Trường Cao Đẳng Nghề Đồng Nai - Số 8, Nguyễn Văn Hoa, Thống Nhất, Biên Hòa.
    </div>

</body>
</html>
<?php mysqli_close($conn); ?>