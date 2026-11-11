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

if (isset($_GET['del'])) {
    $manv_del = mysqli_real_escape_string($conn, $_GET['del']);
    $sql_del = "DELETE FROM nhanvien WHERE manv = '$manv_del'";
    mysqli_query($conn, $sql_del);
    header("Location: xoa.php");
    exit();
}

$sql = "SELECT nv.*, pb.tenpb FROM nhanvien nv JOIN phongban pb ON nv.mapb = pb.mapb";
$result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Xóa Thông Tin Nhân Viên</title>
    <link rel="stylesheet" href="./style.css">
</head>
<body>

    <div class="header-banner">
        <a href="index.php">
            ỦY BAN NHÂN DÂN TỈNH ĐỒNG NAI<br>
            <span>TRƯỜNG CAO ĐẲNG KỸ THUẬT CỘNG NGHỆ ĐỒNG NAI</span><br>
            DONG NAI VOCATIONAL COLLEGE<br>
            <b>NHẤT NGHỆ TINH - NHẤT THÂN VINH</b>
        </a>
    </div>

    <h2 class="title">XÓA THÔNG TIN NHÂN VIÊN</h2>

    <table class="nv-table">
        <tr>
            <th>STT</th>
            <th>MãNV</th>
            <th>Họ tên</th>
            <th>Phái</th>
            <th>Ngày sinh</th>
            <th>Địa chỉ</th>
            <th>Phòng ban</th>
            <th>link</th>
        </tr>
        <?php
        if ($result && mysqli_num_rows($result) > 0) {
            $stt = 1;
            while ($row = mysqli_fetch_assoc($result)) {
                $hoten = htmlspecialchars($row['ho'] . ' ' . $row['ten']);
                $manv = urlencode($row['manv']);
                echo "<tr>";
                echo "<td align='center'>" . $stt++ . "</td>";
                echo "<td align='center'>" . htmlspecialchars($row['manv']) . "</td>";
                echo "<td>" . $hoten . "</td>";
                echo "<td align='center'>" . htmlspecialchars($row['phai']) . "</td>";
                echo "<td align='center'>" . htmlspecialchars($row['ngaysinh']) . "</td>";
                echo "<td>" . htmlspecialchars($row['diachi']) . "</td>";
                echo "<td>" . htmlspecialchars($row['tenpb']) . "</td>";
                echo "<td align='center'><a href='xoa.php?del={$manv}' onclick=\"return confirm('Bạn có chắc chắn muốn xóa nhân viên này không?');\">Xóa</a></td>";
                echo "</tr>";
            }
        }
        ?>
    </table>

    <div class="bottom-nav">
        <a href="quanly.php">Quay về</a>
        <a href="logout.php">Thoát</a>
        <a href="index.php">Trang chủ</a>
    </div>

    <div class="footer-banner">
        SVTH: Nguyễn Đăng Khoa - Khoa Công Nghệ Thông Tin.<br>
        Trường Cao Đẳng kỹ Thuật Công Nghệ Đồng Nai - Số 8, Nguyễn Văn Hoa, Thống Nhất, Biên Hòa.
    </div>

</body>
</html>
<?php mysqli_close($conn); ?>