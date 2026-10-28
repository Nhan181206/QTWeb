<?php
$conn = mysqli_connect("localhost", "root", "", "qlnhanvien");
if (!$conn) {
    die("Kết nối thất bại: " . mysqli_connect_error());
}
mysqli_set_charset($conn, "utf8mb4");

if (isset($_GET['del'])) {
    $manv_del = mysqli_real_escape_string($conn, $_GET['del']);
    $sql_delete = "DELETE FROM nhanvien WHERE manv = '$manv_del'";
    
    if (mysqli_query($conn, $sql_delete)) {
        echo "<script>alert('Xóa nhân viên thành công!'); window.location.href='xoa-ttnv.php';</script>";
        exit();
    } else {
        echo "<script>alert('Lỗi: Không thể xóa nhân viên này (có thể vướng khóa ngoại hoặc ràng buộc dữ liệu)!'); window.location.href='xoa-ttnv.php';</script>";
        exit();
    }
}

$sql = "SELECT nv.manv, nv.ho, nv.ten, nv.phai, nv.ngaysinh, nv.diachi, pb.tenpb 
        FROM nhanvien nv 
        JOIN phongban pb ON nv.mapb = pb.mapb";
$result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Xóa Thông Tin Nhân Viên</title>
    <link rel="stylesheet" href="./style5.css">
</head>
<body>ss

    <div class="header-banner">
        ỦY BAN NHÂN DÂN TỈNH ĐỒNG NAI<br>
        <span>TRƯỜNG CAO ĐẲNG NGHỀ ĐỒNG NAI</span><br>
        DONG NAI VOCATIONAL COLLEGE<br>
        <b>NHẤT NGHỆ TINH - NHẤT THÂN VINH</b>
    </div>

    <h2 class="title">XÓA THÔNG TIN NHÂN VIÊN</h2>

    <table>
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
                echo "<td align='center'><a href='xoa-ttnv.php?del={$manv}' onclick=\"return confirm('Bạn có chắc chắn muốn xóa nhân viên này không?');\">Xóa</a></td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='8' align='center'>Không có dữ liệu nhân viên</td></tr>";
        }
        ?>
    </table>

    <div class="footer-banner" style="margin-top: 30px;">
        SVTH: Nguyễn Đăng Khoa - Khoa Công Nghệ Thông Tin<br>
        Trường Cao Đẳng Nghề Đồng Nai - Số 8, Nguyễn Văn Hoa, Thống Nhất, Biên Hòa.
    </div>

</body>
</html>
<?php mysqli_close($conn); ?>