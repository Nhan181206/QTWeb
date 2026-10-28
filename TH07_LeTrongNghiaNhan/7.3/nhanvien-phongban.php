<?php
$conn = mysqli_connect("localhost", "root", "", "qlnhanvien");

if (!$conn) {
    die("Kết nối thất bại: " . mysqli_connect_error());
}

mysqli_set_charset($conn, "utf8mb4");

$sql_pb = "SELECT * FROM phongban";
$result_pb = mysqli_query($conn, $sql_pb);

$mapb_chon = isset($_GET['mapb']) ? trim($_GET['mapb']) : '';

$sql_nv = "SELECT nv.manv, CONCAT(nv.ho, ' ', nv.ten) as hoten, nv.phai, nv.ngaysinh, nv.diachi, pb.tenpb 
           FROM nhanvien nv 
           JOIN phongban pb ON nv.mapb = pb.mapb";

if ($mapb_chon !== '' && $mapb_chon !== 'all') {
    $mapb_es = mysqli_real_escape_string($conn, $mapb_chon);
    $sql_nv .= " WHERE nv.mapb = '$mapb_es'";
}

$result_nv = mysqli_query($conn, $sql_nv);
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Danh Sách Nhân Viên Theo Phòng Ban</title>
    <link rel="stylesheet" href="./style3.css">
</head>
<body>

    <div class="header-banner">
        ỦY BAN NHÂN DÂN TỈNH ĐỒNG NAI<br>
        <span>TRƯỜNG CAO ĐẲNG NGHỀ ĐỒNG NAI</span><br>
        DONG NAI VOCATIONAL COLLEGE<br>
        <b>NHẤT NGHỆ TINH - NHẤT THÂN VINH</b>
    </div>

    <h2>DANH SÁCH NHÂN VIÊN</h2>

    <form action="" method="GET">
        <div class="search-box">
            Chọn phòng ban: 
            <select name="mapb">
                <option value="all">Xem tất cả</option>
                <?php
                if ($result_pb) {
                    mysqli_data_seek($result_pb, 0);
                    while ($pb = mysqli_fetch_assoc($result_pb)) {
                        $selected = ($mapb_chon == $pb['mapb']) ? "selected" : "";
                        echo "<option value='" . $pb['mapb'] . "' $selected>" . htmlspecialchars($pb['tenpb']) . "</option>";
                    }
                }
                ?>
            </select>
            <input type="submit" value="Tìm">
        </div>
    </form>

    <table>
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
                $phai_text = ($row["phai"] == 0 || strtolower($row["phai"]) == 'nam') ? "Nam" : "Nữ";

                echo "<tr>";
                echo "<td align='center'>" . $stt++ . "</td>";
                echo "<td align='center'>" . htmlspecialchars($row["manv"]) . "</td>";
                echo "<td>" . htmlspecialchars($row["hoten"]) . "</td>";
                echo "<td align='center'>" . htmlspecialchars($phai_text) . "</td>";
                echo "<td align='center'>" . htmlspecialchars($row["ngaysinh"]) . "</td>";
                echo "<td>" . htmlspecialchars($row["diachi"]) . "</td>";
                echo "<td>" . htmlspecialchars($row["tenpb"]) . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='7' align='center'>Không có dữ liệu nhân viên trong phòng ban này</td></tr>";
        }
        ?>
    </table>

    <div class="footer-banner">
        SVTH: Nguyễn Đăng Khoa - Khoa Công Nghệ Thông Tin<br>
        Trường Cao Đẳng Nghề Đồng Nai - Số 8, Nguyễn Văn Hoa, Thống Nhất, Biên Hòa.
    </div>

</body>
</html>

<?php
mysqli_close($conn);
?>