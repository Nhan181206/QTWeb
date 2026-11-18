<?php
$conn = mysqli_connect("localhost", "root", "", "qlnhanvien");
if (!$conn) {
    die("Kết nối thất bại: " . mysqli_connect_error());
}
mysqli_set_charset($conn, "utf8");

$tukhoa = isset($_GET['tukhoa']) ? trim($_GET['tukhoa']) : '';
$result_tk = null;

if ($tukhoa !== '') {
    $tukhoa_es = mysqli_real_escape_string($conn, $tukhoa);
    $sql = "SELECT nv.*, pb.tenpb FROM nhanvien nv JOIN phongban pb ON nv.mapb = pb.mapb WHERE nv.ten LIKE '%$tukhoa_es%' OR nv.ho LIKE '%$tukhoa_es%'";
    $result_tk = mysqli_query($conn, $sql);
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Tìm Kiếm Thông Tin Nhân Viên</title>
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

    <h2 class="title">TÌM THÔNG TIN NHÂN VIÊN</h2>

    <form action="" method="GET" class="form-search">
        Nhập tên hoặc một phần họ tên cần tìm: 
        <input type="text" name="tukhoa" value="<?php echo htmlspecialchars($tukhoa); ?>" required>
        <input type="submit" value="Tìm" class="btn">
    </form>

    <?php if ($tukhoa !== ''): ?>
        <table class="nv-table">
            <tr>
                <th>STT</th>
                <th>MãNV</th>
                <th>Họ tên</th>
                <th>Phái</th>
                <th>Ngày sinh</th>
                <th>Địa chỉ</th>
                <th>Phòng ban</th>
            </tr>
            <?php
            if ($result_tk && mysqli_num_rows($result_tk) > 0) {
                $stt = 1;
                while ($row = mysqli_fetch_assoc($result_tk)) {
                    $hoten = htmlspecialchars($row['ho'] . ' ' . $row['ten']);
                    echo "<tr>";
                    echo "<td align='center'>" . $stt++ . "</td>";
                    echo "<td align='center'>" . htmlspecialchars($row['manv']) . "</td>";
                    echo "<td>" . $hoten . "</td>";
                    echo "<td align='center'>" . htmlspecialchars($row['phai']) . "</td>";
                    echo "<td align='center'>" . htmlspecialchars($row['ngaysinh']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['diachi']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['tenpb']) . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='7' align='center'>Không tìm thấy nhân viên phù hợp</td></tr>";
            }
            ?>
        </table>
    <?php endif; ?>

    <div class="footer-banner">
        SVTH: Nguyễn Đăng Khoa - Khoa Công Nghệ Thông Tin.<br>
        Trường Cao Đẳng kỹ Thuật Công Nghệ Đồng Nai - Số 8, Nguyễn Văn Hoa, Thống Nhất, Biên Hòa.
    </div>

</body>
</html>
<?php mysqli_close($conn); ?>