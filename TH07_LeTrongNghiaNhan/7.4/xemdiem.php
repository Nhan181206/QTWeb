<?php
$conn = mysqli_connect("localhost", "root", "", "qlsinhvien");
if (!$conn) {
    die("Kết nối thất bại: " . mysqli_connect_error());
}
mysqli_set_charset($conn, "utf8");

$masv = isset($_GET['masv']) ? trim($_GET['masv']) : '';
$result_diem = null;

if ($masv !== '') {
    $masv_es = mysqli_real_escape_string($conn, $masv);
    $sql = "SELECT mh.TenMon, kq.Diem 
            FROM ketqua kq 
            JOIN monhoc mh ON kq.MaMon = mh.MaMon 
            WHERE kq.MaSV = '$masv_es'";
    $result_diem = mysqli_query($conn, $sql);
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Xem Điểm Từng Sinh Viên</title>
    <link rel="stylesheet" href="./style4.css">
</head>
<body>

    <div class="container-box">
        <h2 class="title">XEM ĐIỂM TỪNG SINH VIÊN</h2>

        <form action="" method="GET">
            <div class="form-group">
                <label>Nhập mã sinh viên:</label>
                <input type="text" name="masv" value="<?php echo htmlspecialchars($masv); ?>" required>
            </div>
            <div class="form-group" style="text-align: center;">
                <input type="submit" value="Xem điểm" class="btn">
            </div>
        </form>

        <?php if ($masv !== ''): ?>
            <table class="sv-table" style="margin-top: 20px;">
                <tr>
                    <th>STT</th>
                    <th>Tên môn học</th>
                    <th>Điểm</th>
                </tr>
                <?php
                if ($result_diem && mysqli_num_rows($result_diem) > 0) {
                    $stt = 1;
                    while ($row = mysqli_fetch_assoc($result_diem)) {
                        echo "<tr>";
                        echo "<td align='center'>" . $stt++ . "</td>";
                        echo "<td>" . htmlspecialchars($row['TenMon']) . "</td>";
                        echo "<td align='center'>" . htmlspecialchars($row['Diem']) . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='3' align='center'>Không tìm thấy bảng điểm cho mã sinh viên này</td></tr>";
                }
                ?>
            </table>
        <?php endif; ?>
    </div>

</body>
</html>
<?php mysqli_close($conn); ?>