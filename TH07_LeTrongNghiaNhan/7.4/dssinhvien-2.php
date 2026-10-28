<?php
$conn = mysqli_connect("localhost", "root", "", "qlsinhvien");
if (!$conn) {
    die("Kết nối thất bại: " . mysqli_connect_error());
}
mysqli_set_charset($conn, "utf8");

$sql_khoa = "SELECT * FROM khoa";
$result_khoa = mysqli_query($conn, $sql_khoa);

$makhoa_chon = isset($_GET['makhoa']) ? trim($_GET['makhoa']) : '';
$malop_chon = isset($_GET['malop']) ? trim($_GET['malop']) : '';

$result_lop = null;
if ($makhoa_chon !== '') {
    $makhoa_es = mysqli_real_escape_string($conn, $makhoa_chon);
    $sql_lop = "SELECT * FROM lop WHERE MaKhoa = '$makhoa_es'";
    $result_lop = mysqli_query($conn, $sql_lop);
} else {
    $sql_lop = "SELECT * FROM lop";
    $result_lop = mysqli_query($conn, $sql_lop);
}

$result_sv = null;
if ($malop_chon !== '') {
    $malop_es = mysqli_real_escape_string($conn, $malop_chon);
    $sql_sv = "SELECT * FROM sinhvien WHERE MaLop = '$malop_es'";
    $result_sv = mysqli_query($conn, $sql_sv);
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Xem Danh Sách Sinh Viên Theo Khoa, Lớp</title>
    <link rel="stylesheet" href="./style4.css">
    <script>
        function changeKhoa() {
            document.querySelector('select[name="malop"]').value = "";
            document.getElementById('formFilter').submit();
        }
    </script>
</head>
<body>

    <div class="container-box">
        <h2 class="title" style="color: green;">XEM DANH SÁCH SINH VIÊN THEO KHOA, LỚP</h2>

        <form action="" method="GET" id="formFilter">
            <div class="form-group" style="text-align: center;">
                Chọn khoa: 
                <select name="makhoa" onchange="changeKhoa()">
                    <option value="">-- Chọn khoa --</option>
                    <?php 
                    if ($result_khoa) {
                        while ($khoa = mysqli_fetch_assoc($result_khoa)) {
                            $sel = ($makhoa_chon == $khoa['MaKhoa']) ? 'selected' : '';
                            echo "<option value='" . $khoa['MaKhoa'] . "' $sel>" . htmlspecialchars($khoa['TenKhoa']) . "</option>";
                        }
                    }
                    ?>
                </select>

                Chọn lớp: 
                <select name="malop">
                    <option value="">-- Chọn lớp --</option>
                    <?php 
                    if ($result_lop) {
                        while ($lop = mysqli_fetch_assoc($result_lop)) {
                            $sel = ($malop_chon == $lop['MaLop']) ? 'selected' : '';
                            $ten_lop_hien_thi = $lop['MaLop'] . (!empty($lop['TenLop']) ? ' - ' . $lop['TenLop'] : '');
                            echo "<option value='" . $lop['MaLop'] . "' $sel>" . htmlspecialchars($ten_lop_hien_thi) . "</option>";
                        }
                    }
                    ?>
                </select>

                <input type="submit" value="Xem danh sách" class="btn">
            </div>
        </form>

        <?php if ($malop_chon !== '' && $result_sv): ?>
            <table class="sv-table" style="margin-top: 20px;">
                <tr>
                    <th>STT</th>
                    <th>Họ tên</th>
                    <th>Giới tính</th>
                    <th>Ngày sinh</th>
                    <th>Điện thoại</th>
                </tr>
                <?php
                if (mysqli_num_rows($result_sv) > 0) {
                    $stt = 1;
                    while ($row = mysqli_fetch_assoc($result_sv)) {
                        $gioi_tinh = isset($row['GioiTinh']) ? $row['GioiTinh'] : 0;
                        $phai = ($gioi_tinh == 0) ? 'Nữ' : 'Nam';
                        
                        $ho_ten = isset($row['HoTen']) ? $row['HoTen'] : ($row['Ho'] . ' ' . $row['Ten']);

                        echo "<tr>";
                        echo "<td align='center'>" . $stt++ . "</td>";
                        echo "<td>" . htmlspecialchars($ho_ten) . "</td>";
                        echo "<td align='center'>" . $phai . "</td>";
                        echo "<td align='center'>" . htmlspecialchars($row['NgaySinh']) . "</td>";
                        echo "<td align='center'>" . htmlspecialchars($row['DienThoai'] ?? '') . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='5' align='center'>Không có sinh viên nào trong lớp này</td></tr>";
                }
                ?>
            </table>
        <?php endif; ?>
    </div>

</body>
</html>
<?php mysqli_close($conn); ?>