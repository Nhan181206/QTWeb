<?php
$conn = mysqli_connect("localhost", "root", "", "qlsinhvien");
if (!$conn) {
    die("Kết nối thất bại: " . mysqli_connect_error());
}
mysqli_set_charset($conn, "utf8");

$sql_lop = "SELECT * FROM lop";
$result_lop = mysqli_query($conn, $sql_lop);

$sql_mon = "SELECT * FROM monhoc";
$result_mon = mysqli_query($conn, $sql_mon);

$malop = isset($_REQUEST['malop']) ? trim($_REQUEST['malop']) : '';
$mamon = isset($_REQUEST['mamon']) ? trim($_REQUEST['mamon']) : '';
$loaidiem = isset($_REQUEST['loaidiem']) ? trim($_REQUEST['loaidiem']) : 'KT1';

$thong_bao = "";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['action']) && $_POST['action'] == 'update') {
    $ds_diem = $_POST['diem'] ?? [];
    
    foreach ($ds_diem as $masv => $diem_val) {
        $masv_es = mysqli_real_escape_string($conn, $masv);
        $diem_val = trim($diem_val);
        
        if ($diem_val !== '') {
            $diem_num = (float)$diem_val;

            $sql_check = "SELECT * FROM ketqua WHERE MaSV = '$masv_es' AND MaMon = '$mamon'";
            $res_check = mysqli_query($conn, $sql_check);
            
            if ($res_check && mysqli_num_rows($res_check) > 0) {
                $sql_save = "UPDATE ketqua SET Diem = $diem_num WHERE MaSV = '$masv_es' AND MaMon = '$mamon'";
            } else {
                $sql_save = "INSERT INTO ketqua (MaSV, MaMon, Diem) VALUES ('$masv_es', '$mamon', $diem_num)";
            }
            mysqli_query($conn, $sql_save);
        }
    }
    $thong_bao = "Cập nhật điểm thành công!";
}

$result_sv = null;
if ($malop !== '') {
    $malop_es = mysqli_real_escape_string($conn, $malop);
    $sql_sv = "SELECT * FROM sinhvien WHERE MaLop = '$malop_es'";
    $result_sv = mysqli_query($conn, $sql_sv);
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Cập Nhật Điểm Theo Lớp</title>
    <link rel="stylesheet" href="./style4.css">
</head>
<body>

    <div class="container-box">
        <h2 class="title" style="color: green;">CẬP NHẬT ĐIỂM THEO LỚP</h2>

        <form action="" method="GET">
            <div class="form-group" style="text-align: center;">
                <label>Chọn lớp:</label>
                <select name="malop">
                    <?php 
                    if ($result_lop) {
                        mysqli_data_seek($result_lop, 0);
                        while ($lop = mysqli_fetch_assoc($result_lop)) {
                            $sel = ($malop == $lop['MaLop']) ? 'selected' : '';
                            echo "<option value='" . $lop['MaLop'] . "' $sel>" . htmlspecialchars($lop['MaLop']) . "</option>";
                        }
                    }
                    ?>
                </select>
                <br><br>

                <label>Chọn môn học:</label>
                <select name="mamon">
                    <?php 
                    if ($result_mon) {
                        mysqli_data_seek($result_mon, 0);
                        while ($mon = mysqli_fetch_assoc($result_mon)) {
                            $sel = ($mamon == $mon['MaMon']) ? 'selected' : '';
                            echo "<option value='" . $mon['MaMon'] . "' $sel>" . htmlspecialchars($mon['TenMon']) . "</option>";
                        }
                    }
                    ?>
                </select>
                <br><br>

                <label>Chọn loại điểm:</label>
                <select name="loaidiem">
                    <option value="KT1" <?php if($loaidiem=='KT1') echo 'selected'; ?>>KT1</option>
                    <option value="KT2" <?php if($loaidiem=='KT2') echo 'selected'; ?>>KT2</option>
                    <option value="Thi" <?php if($loaidiem=='Thi') echo 'selected'; ?>>Thi</option>
                </select>

                <input type="submit" value="Xem danh sách" class="btn" style="margin-left: 10px;">
            </div>
        </form>

        <?php if ($thong_bao !== ''): ?>
            <div style="text-align: center; color: green; font-weight: bold; margin: 15px 0;"><?php echo $thong_bao; ?></div>
        <?php endif; ?>

        <?php if ($malop !== '' && $result_sv): ?>
            <form action="" method="POST">
                <input type="hidden" name="action" value="update">
                <input type="hidden" name="malop" value="<?php echo htmlspecialchars($malop); ?>">
                <input type="hidden" name="mamon" value="<?php echo htmlspecialchars($mamon); ?>">
                <input type="hidden" name="loaidiem" value="<?php echo htmlspecialchars($loaidiem); ?>">

                <table class="sv-table" style="margin-top: 20px;">
                    <tr>
                        <th>STT</th>
                        <th>Mã SV</th>
                        <th>Họ tên</th>
                        <th>Điểm</th>
                    </tr>
                    <?php
                    if (mysqli_num_rows($result_sv) > 0) {
                        $stt = 1;
                        while ($sv = mysqli_fetch_assoc($result_sv)) {
                            $masv = $sv['MaSV'];
                            $hoten = htmlspecialchars($sv['HoTen'] ?? ($sv['Ho'] . ' ' . $sv['Ten']));

                            $sql_d = "SELECT Diem FROM ketqua WHERE MaSV = '$masv' AND MaMon = '$mamon'";
                            $res_d = mysqli_query($conn, $sql_d);
                            $diem_hien_tai = "";
                            if ($res_d && mysqli_num_rows($res_d) > 0) {
                                $row_d = mysqli_fetch_assoc($res_d);
                                $diem_hien_tai = $row_d['Diem'];
                            }

                            echo "<tr>";
                            echo "<td align='center'>" . $stt++ . "</td>";
                            echo "<td align='center'>" . htmlspecialchars($masv) . "</td>";
                            echo "<td>" . $hoten . "</td>";
                            echo "<td align='center'>";
                            echo "<input type='text' name='diem[" . htmlspecialchars($masv) . "]' value='" . htmlspecialchars($diem_hien_tai) . "' style='width: 100px; padding: 4px; text-align: center;'>";
                            echo "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='4' align='center'>Không có sinh viên nào trong lớp này</td></tr>";
                    }
                    ?>
                </table>

                <div style="text-align: center; margin-top: 20px;">
                    <input type="submit" value="Cập nhật điểm" class="btn" style="padding: 8px 20px; font-weight: bold;">
                </div>
            </form>
        <?php endif; ?>
    </div>

</body>
</html>
<?php mysqli_close($conn); ?>