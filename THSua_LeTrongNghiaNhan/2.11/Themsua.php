<?php
$conn = mysqli_connect("localhost", "root", "", "ql_ban_sua");

if (!$conn) {
    die("Kết nối thất bại: " . mysqli_connect_error());
}

mysqli_set_charset($conn, "utf8");

$hang_sua_result = mysqli_query($conn, "SELECT * FROM hang_sua");
$loai_sua_result = mysqli_query($conn, "SELECT * FROM loai_sua");

$thong_bao = "";
$row_moi = null;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ma_sua  = trim($_POST['ma_sua'] ?? '');
    $ten_sua = trim($_POST['ten_sua'] ?? '');
    $hang_sua = trim($_POST['hang_sua'] ?? '');
    $loai_sua = trim($_POST['loai_sua'] ?? '');
    $trong_luong = trim($_POST['trong_luong'] ?? '');
    $don_gia = trim($_POST['don_gia'] ?? '');
    $tp_dinh_duong = trim($_POST['tp_dinh_duong'] ?? '');
    $loi_ich = trim($_POST['loi_ich'] ?? '');

    $hinh_anh = "default.jpg";
    if (isset($_FILES['hinh_anh']) && $_FILES['hinh_anh']['error'] == 0) {
        $ten_file = basename($_FILES['hinh_anh']['name']);
        $duong_dan_upload = "../Image/" . $ten_file;

        if (move_uploaded_file($_FILES['hinh_anh']['tmp_name'], $duong_dan_upload)) {
            $hinh_anh = $ten_file;
        }
    }

    if ($ma_sua !== '' && $ten_sua !== '' && $trong_luong !== '' && $don_gia !== '') {
        $ma_sua_es = mysqli_real_escape_string($conn, $ma_sua);
        $ten_sua_es = mysqli_real_escape_string($conn, $ten_sua);
        $hang_sua_es = mysqli_real_escape_string($conn, $hang_sua);
        $loai_sua_es = mysqli_real_escape_string($conn, $loai_sua);
        $trong_luong_es = (float)$trong_luong;
        $don_gia_es = (float)$don_gia;
        $tp_es = mysqli_real_escape_string($conn, $tp_dinh_duong);
        $loi_ich_es = mysqli_real_escape_string($conn, $loi_ich);
        $hinh_es = mysqli_real_escape_string($conn, $hinh_anh);

        $sql_insert = "INSERT INTO sua (Ma_sua, Ten_sua, Ma_hang_sua, Ma_loai_sua, Trong_luong, Don_gia, TP_Dinh_duong, Loi_ich, Hinh) 
                       VALUES ('$ma_sua_es', '$ten_sua_es', '$hang_sua_es', '$loai_sua_es', $trong_luong_es, $don_gia_es, '$tp_es', '$loi_ich_es', '$hinh_es')";

        if (mysqli_query($conn, $sql_insert)) {
            $thong_bao = "Thêm sữa thành công!";

            $sql_get = "SELECT s.*, hs.Ten_hang_sua 
                        FROM sua s 
                        JOIN hang_sua hs ON s.Ma_hang_sua = hs.Ma_hang_sua 
                        WHERE s.Ma_sua = '$ma_sua_es'";
            $res_get = mysqli_query($conn, $sql_get);
            if ($res_get && mysqli_num_rows($res_get) > 0) {
                $row_moi = mysqli_fetch_assoc($res_get);
            }
        } else {
            $thong_bao = "Lỗi: Trùng mã sữa hoặc kiểm tra lại thông tin nhập vào!";
        }
    } else {
        $thong_bao = "Kiểm tra lại thông tin nhập vào!";
    }
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Thêm Sữa Mới</title>
    <link rel="stylesheet" href="./style11.css">
</head>
<body>

    <form action="" method="POST" enctype="multipart/form-data">
        <table class="form-table">
            <tr>
                <th colspan="2" class="form-title">THÊM SỮA MỚI</th>
            </tr>
            <tr>
                <td class="form-label" align="right">Mã sữa:</td>
                <td class="form-input"><input type="text" name="ma_sua" required></td>
            </tr>
            <tr>
                <td class="form-label" align="right">Tên sữa:</td>
                <td class="form-input"><input type="text" name="ten_sua" required></td>
            </tr>
            <tr>
                <td class="form-label" align="right">Hãng sữa:</td>
                <td class="form-input">
                    <select name="hang_sua">
                        <?php 
                        if ($hang_sua_result) {
                            mysqli_data_seek($hang_sua_result, 0);
                            while ($hs = mysqli_fetch_assoc($hang_sua_result)) {
                                echo "<option value='" . $hs['Ma_hang_sua'] . "'>" . htmlspecialchars($hs['Ten_hang_sua']) . "</option>";
                            }
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td class="form-label" align="right">Loại sữa:</td>
                <td class="form-input">
                    <select name="loai_sua">
                        <?php 
                        if ($loai_sua_result) {
                            mysqli_data_seek($loai_sua_result, 0);
                            while ($ls = mysqli_fetch_assoc($loai_sua_result)) {
                                echo "<option value='" . $ls['Ma_loai_sua'] . "'>" . htmlspecialchars($ls['Ten_loai']) . "</option>";
                            }
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td class="form-label" align="right">Trọng lượng:</td>
                <td class="form-input"><input type="text" name="trong_luong" required> (gr hoặc ml)</td>
            </tr>
            <tr>
                <td class="form-label" align="right">Đơn giá:</td>
                <td class="form-input"><input type="text" name="don_gia" required> (VNĐ)</td>
            </tr>
            <tr>
                <td class="form-label" align="right">Thành phần dinh dưỡng:</td>
                <td class="form-input"><textarea name="tp_dinh_duong" rows="3"></textarea></td>
            </tr>
            <tr>
                <td class="form-label" align="right">Lợi ích:</td>
                <td class="form-input"><textarea name="loi_ich" rows="3"></textarea></td>
            </tr>
            <tr>
                <td class="form-label" align="right">Hình ảnh:</td>
                <td class="form-input"><input type="file" name="hinh_anh"></td>
            </tr>
            <tr>
                <td colspan="2" align="center" class="form-submit">
                    <input type="submit" value="Thêm mới">
                </td>
            </tr>
        </table>
    </form>

    <?php if ($thong_bao !== ''): ?>
        <div class="notification" style="color: <?php echo ($row_moi) ? 'green' : 'red'; ?>;">
            <?php echo $thong_bao; ?>
        </div>
    <?php endif; ?>

    <?php if ($row_moi): ?>
        <table class="main-table">
            <tr>
                <td colspan="2" class="product-header">
                    <?php echo htmlspecialchars($row_moi['Ten_sua']) . " - " . htmlspecialchars($row_moi['Ten_hang_sua']); ?>
                </td>
            </tr>
            <tr>
                <td class="img-column">
                    <img src="../Image/<?php echo htmlspecialchars($row_moi['Hinh']); ?>" alt="Hình sữa">
                </td>
                <td class="info-column">
                    <div class="section-title">Thành phần dinh dưỡng:</div>
                    <div class="section-content"><?php echo nl2br(htmlspecialchars($row_moi['TP_Dinh_duong'] ?? $row_moi['TP_Dinh_ dưỡng'] ?? '')); ?></div>
                    
                    <div class="section-title" style="margin-top: 8px;">Lợi ích:</div>
                    <div class="section-content"><?php echo nl2br(htmlspecialchars($row_moi['Loi_ich'] ?? '')); ?></div>
                    
                    <div class="price-weight">
                        Trọng lượng: <b><?php echo htmlspecialchars($row_moi['Trong_luong']); ?> gr</b> - Đơn giá: <b><?php echo number_format($row_moi['Don_gia'], 0, ',', '.'); ?> VNĐ</b>
                    </div>
                </td>
            </tr>
        </table>
    <?php endif; ?>

</body>
</html>

<?php
mysqli_close($conn);
?>