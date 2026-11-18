<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: dangnhap.php");
    exit();
}

$conn = mysqli_connect("localhost", "root", "", "qlnhanvien");
if (!$conn) {
    die("Kết nối thất bại: " . mysqli_connect_error());
}
mysqli_set_charset($conn, "utf8");

$sql_pb = "SELECT * FROM phongban";
$result_pb = mysqli_query($conn, $sql_pb);

$thongbao = "";
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['themmoi'])) {
    $manv = trim($_POST['manv'] ?? '');
    $ho = trim($_POST['ho'] ?? '');
    $ten = trim($_POST['ten'] ?? '');

    $phai_input = trim($_POST['phai'] ?? 'Nam');
    $phai = ($phai_input === 'Nam') ? 1 : 0;

    $ngaysinh = $_POST['nam'] . '-' . $_POST['thang'] . '-' . $_POST['ngay'];
    $diachi = trim($_POST['diachi'] ?? '');
    $mapb = trim($_POST['mapb'] ?? '');

    if ($manv !== '') {
        $sql_insert = "INSERT INTO nhanvien (manv, ho, ten, phai, ngaysinh, diachi, mapb) 
                       VALUES ('$manv', '$ho', '$ten', $phai, '$ngaysinh', '$diachi', '$mapb')";
        if (mysqli_query($conn, $sql_insert)) {
            $thongbao = "Thêm nhân viên thành công!";
        } else {
            $thongbao = "Lỗi: Trùng mã nhân viên hoặc dữ liệu không hợp lệ!";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Thêm Nhân Viên Mới</title>
    <link rel="stylesheet" href="./style.css">
</head>
<body>

    <div class="header-banner">
        <a href="index.php">
            ỦY BAN NHÂN DÂN TỈNH ĐỒNG NAI<br>
            <span>TRƯỜNG CAO ĐẲNG KỸ THUẬT CÔNG NGHỆ ĐỒNG NAI</span><br>
            DONG NAI VOCATIONAL COLLEGE<br>
            <b>NHẤT NGHỆ TINH - NHẤT THÂN VINH</b>
        </a>
    </div>

    <h2 class="title">THÊM NHÂN VIÊN MỚI</h2>

    <?php if ($thongbao !== ''): ?>
        <div style="text-align: center; color: green; font-weight: bold; margin-bottom: 10px;"><?php echo $thongbao; ?></div>
    <?php endif; ?>

    <form action="" method="POST">
        <table class="form-table">
            <tr>
                <td align="right" style="width: 35%; font-weight: bold;">Mã nhân viên</td>
                <td><input type="text" name="manv" required style="width: 90%;"></td>
            </tr>
            <tr>
                <td align="right" style="font-weight: bold;">Họ và tên lót</td>
                <td><input type="text" name="ho" required style="width: 90%;"></td>
            </tr>
            <tr>
                <td align="right" style="font-weight: bold;">Tên nhân viên</td>
                <td><input type="text" name="ten" required style="width: 90%;"></td>
            </tr>
            <tr>
                <td align="right" style="font-weight: bold;">Giới tính</td>
                <td>
                    <select name="phai" style="width: 93%;">
                        <option value="Nam">Nam</option>
                        <option value="Nữ">Nữ</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td align="right" style="font-weight: bold;">Ngày sinh</td>
                <td>
                    <select name="ngay" style="width: 28%;">
                        <?php for($i=1; $i<=31; $i++) echo "<option value='$i'>$i</option>"; ?>
                    </select> /
                    <select name="thang" style="width: 28%;">
                        <?php for($i=1; $i<=12; $i++) echo "<option value='$i'>$i</option>"; ?>
                    </select> /
                    <select name="nam" style="width: 33%;">
                        <?php for($i=1970; $i<=2005; $i++) echo "<option value='$i'>$i</option>"; ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td align="right" style="font-weight: bold;">Địa chỉ</td>
                <td><input type="text" name="diachi" style="width: 90%;"></td>
            </tr>
            <tr>
                <td align="right" style="font-weight: bold;">Phòng ban</td>
                <td>
                    <select name="mapb" style="width: 93%;">
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
        </table>

        <div class="action-buttons">
            <input type="submit" name="themmoi" value="Thêm mới">
            <a href="quanly.php">Quay về</a>
            <a href="logout.php">Thoát</a>
            <a href="index.php">Trang chủ</a>
        </div>
    </form>

    <div class="footer-banner">
        SVTH: Nguyễn Đăng Khoa - Khoa Công Nghệ Thông Tin.<br>
        Trường Cao Đẳng Kỹ Thuật Công Nghệ Đồng Nai - Số 8, Nguyễn Văn Hoa, Thống Nhất, Biên Hòa.
    </div>

</body>
</html>
<?php mysqli_close($conn); ?>