<?php
$conn = mysqli_connect("localhost", "root", "", "ql_ban_sua");
if (!$conn) {
    die("Kết nối thất bại: " . mysqli_connect_error());
}
mysqli_set_charset($conn, "utf8");

$makh = isset($_GET['makh']) ? mysqli_real_escape_string($conn, $_GET['makh']) : (isset($_POST['makh']) ? mysqli_real_escape_string($conn, $_POST['makh']) : '');

$thong_bao = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ten_kh = trim($_POST['ten_kh'] ?? '');
    $phai = trim($_POST['phai'] ?? 'Nam');
    $dia_chi = trim($_POST['dia_chi'] ?? '');
    $dien_thoai = trim($_POST['dien_thoai'] ?? '');
    $email = trim($_POST['email'] ?? '');

    if ($ten_kh !== '') {
        $sql_update = "UPDATE khach_hang SET 
                       Ten_khach_hang = '$ten_kh', 
                       Phai = '$phai', 
                       Dia_chi = '$dia_chi', 
                       Dien_thoai = '$dien_thoai', 
                       Email = '$email' 
                       WHERE Ma_khach_hang = '$makh'";

        if (mysqli_query($conn, $sql_update)) {
            $thong_bao = "Cập nhật thành công!";
        } else {
            $thong_bao = "Kiểm tra lại thông tin!";
        }
    } else {
        $thong_bao = "Tên khách hàng không được để trống!";
    }
}

$sql = "SELECT * FROM khach_hang WHERE Ma_khach_hang = '$makh'";
$result = mysqli_query($conn, $sql);
$row = ($result) ? mysqli_fetch_assoc($result) : null;
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Cập Nhật Thông Tin Khách Hàng</title>
    <link rel="stylesheet" href="./style12.css">
</head>
<body>

    <form action="cap_nhat_khach_hang.php" method="POST">
        <input type="hidden" name="makh" value="<?php echo htmlspecialchars($makh); ?>">
        <table class="form-table">
            <tr>
                <th colspan="2" class="form-title">CẬP NHẬT THÔNG TIN KHÁCH HÀNG</th>
            </tr>
            <?php if ($thong_bao !== ''): ?>
                <tr>
                    <td colspan="2" align="center" style="color: green; font-weight: bold;"><?php echo $thong_bao; ?></td>
                </tr>
            <?php endif; ?>
            <tr>
                <td class="form-label" align="right">Mã khách hàng:</td>
                <td class="form-input">
                    <b><?php echo htmlspecialchars($makh); ?></b>
                </td>
            </tr>
            <tr>
                <td class="form-label" align="right">Tên khách hàng:</td>
                <td class="form-input">
                    <input type="text" name="ten_kh" value="<?php echo htmlspecialchars($row['Ten_khach_hang'] ?? ''); ?>" required>
                </td>
            </tr>
            <tr>
                <td class="form-label" align="right">Phái:</td>
                <td class="form-input">
                    <?php 
                    $gioi_tinh = $row['Phai'] ?? '';
                    $checked_nam = ($gioi_tinh == 'Nam' || $gioi_tinh == 0) ? "checked" : "";
                    $checked_nu = ($gioi_tinh == 'Nữ' || $gioi_tinh == 1) ? "checked" : "";
                    ?>
                    <input type="radio" name="phai" value="Nam" <?php echo $checked_nam; ?>> Nam 
                    <input type="radio" name="phai" value="Nữ" <?php echo $checked_nu; ?>> Nữ
                </td>
            </tr>
            <tr>
                <td class="form-label" align="right">Địa chỉ:</td>
                <td class="form-input">
                    <input type="text" name="dia_chi" value="<?php echo htmlspecialchars($row['Dia_chi'] ?? ''); ?>">
                </td>
            </tr>
            <tr>
                <td class="form-label" align="right">Điện thoại:</td>
                <td class="form-input">
                    <input type="text" name="dien_thoai" value="<?php echo htmlspecialchars($row['Dien_thoai'] ?? ''); ?>">
                </td>
            </tr>
            <tr>
                <td class="form-label" align="right">Email:</td>
                <td class="form-input">
                    <input type="email" name="email" value="<?php echo htmlspecialchars($row['Email'] ?? ''); ?>">
                </td>
            </tr>
            <tr>
                <td colspan="2" align="center" class="form-submit">
                    <input type="submit" value="Cập nhật">
                </td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <a href="TT_khachhang.php">Quay về trang thông tin khách hàng</a>
                </td>
            </tr>
        </table>
    </form>

</body>
</html>
<?php mysqli_close($conn); ?>