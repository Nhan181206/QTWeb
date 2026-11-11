<?php
$conn = mysqli_connect("localhost", "root", "", "qlnhanvien");
if (!$conn) {
    die("Kết nối thất bại: " . mysqli_connect_error());
}
mysqli_set_charset($conn, "utf8");

$sql_pb = "SELECT * FROM phongban";
$result_pb = mysqli_query($conn, $sql_pb);

$mapb_chon = isset($_GET['mapb']) ? trim($_GET['mapb']) : '';

if ($mapb_chon !== '' && $mapb_chon !== 'all') {
    $mapb_es = mysqli_real_escape_string($conn, $mapb_chon);
    $sql_nv = "SELECT nv.*, pb.tenpb FROM nhanvien nv JOIN phongban pb ON nv.mapb = pb.mapb WHERE nv.mapb = '$mapb_es'";
} else {
    $sql_nv = "SELECT nv.*, pb.tenpb FROM nhanvien nv JOIN phongban pb ON nv.mapb = pb.mapb";
}
$result_nv = mysqli_query($conn, $sql_nv);
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Danh Sách Nhân Viên Theo Phòng Ban</title>
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

    <h2 class="title">DANH SÁCH NHÂN VIÊN</h2>

    <form action="" method="GET" class="form-search">
        Chọn phòng ban: 
        <select name="mapb">
            <option value="all">Xem tất cả</option>
            <?php 
            if ($result_pb) {
                while ($pb = mysqli_fetch_assoc($result_pb)) {
                    $sel = ($mapb_chon == $pb['mapb']) ? 'selected' : '';
                    echo "<option value='" . $pb['mapb'] . "' $sel>" . htmlspecialchars($pb['tenpb']) . "</option>";
                }
            }
            ?>
        </select>
        <input type="submit" value="Tìm" class="btn">
    </form>

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
        if ($result_nv && mysqli_num_rows($result_nv) > 0) {
            $stt = 1;
            while ($row = mysqli_fetch_assoc($result_nv)) {
                $hoten = htmlspecialchars($row['ho'] . ' ' . $row['ten']);
                $phai = ($row['phai'] == 1) ? 'Nam' : 'Nữ';
                echo "<tr>";
                echo "<td align='center'>" . $stt++ . "</td>";
                echo "<td align='center'>" . htmlspecialchars($row['manv']) . "</td>";
                echo "<td>" . $hoten . "</td>";
                echo "<td align='center'>" . $phai . "</td>";
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

    <div class="footer-banner">
        SVTH: Nguyễn Đăng Khoa - Khoa Công Nghệ Thông Tin.<br>
        Trường Cao Đẳng Nghề Đồng Nai - Số 8, Nguyễn Văn Hoa, Thống Nhất, Biên Hòa.
    </div>

</body>
</html>
<?php mysqli_close($conn); ?>