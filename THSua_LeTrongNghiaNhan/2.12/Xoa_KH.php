<?php
$conn = mysqli_connect("localhost", "root", "", "ql_ban_sua");
if (!$conn) {
    die("Kết nối thất bại: " . mysqli_connect_error());
}
mysqli_set_charset($conn, "utf8");

$makh = isset($_GET['makh']) ? mysqli_real_escape_string($conn, $_GET['makh']) : (isset($_POST['makh']) ? mysqli_real_escape_string($conn, $_POST['makh']) : '');

$thong_bao = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $sql_check = "SELECT * FROM hoa_don WHERE Ma_khach_hang = '$makh'";
    $res_check = mysqli_query($conn, $sql_check);

    if (mysqli_num_rows($res_check) > 0) {
        $thong_bao = "Khách hàng này đã mua hàng nên không thể xóa được!";
    } else {
        $sql_delete = "DELETE FROM khach_hang WHERE Ma_khach_hang = '$makh'";
        if (mysqli_query($conn, $sql_delete)) {
            echo "<script>alert('Xóa khách hàng thành công!'); window.location.href='TT_khachhang.php';</script>";
            exit();
        } else {
            $thong_bao = "Lỗi khi xóa khách hàng!";
        }
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
    <title>Xóa Khách Hàng</title>
    <link rel="stylesheet" href="./style12.css">
</head>
<body>

    <form action="xoa_khach_hang.php" method="POST">
        <input type="hidden" name="makh" value="<?php echo htmlspecialchars($makh); ?>">
        <table class="form-table">
            <tr>
                <th colspan="2" class="form-title">THÔNG TIN KHÁCH HÀNG</th>
            </tr>
            <?php if ($thong_bao !== ''): ?>
                <tr>
                    <td colspan="2" align="center" style="color: red; font-weight: bold;"><?php echo $thong_bao; ?></td>
                </tr>
            <?php endif; ?>
            <tr>
                <td class="form-label" align="right">Mã khách hàng:</td>
                <td class="form-input"><b><?php echo htmlspecialchars($makh); ?></b></td>
            </tr>
            <tr>
                <td class="form-label" align="right">Tên khách hàng:</td>
                <td class="form-input"><?php echo htmlspecialchars($row['Ten_khach_hang'] ?? ''); ?></td>
            </tr>
            <tr>
                <td class="form-label" align="right">Phái:</td>
                <td class="form-input">
                    <?php 
                    $gioi_tinh = $row['Phai'] ?? '';
                    $checked_nam = ($gioi_tinh == 'Nam' || $gioi_tinh == 0) ? "checked" : "";
                    $checked_nu = ($gioi_tinh == 'Nữ' || $gioi_tinh == 1) ? "checked" : "";
                    ?>
                    <input type="radio" disabled <?php echo $checked_nam; ?>> Nam 
                    <input type="radio" disabled <?php echo $checked_nu; ?>> Nữ
                </td>
            </tr>
            <tr>
                <td class="form-label" align="right">Địa chỉ:</td>
                <td class="form-input"><?php echo htmlspecialchars($row['Dia_chi'] ?? ''); ?></td>
            </tr>
            <tr>
                <td class="form-label" align="right">Điện thoại:</td>
                <td class="form-input"><?php echo htmlspecialchars($row['Dien_thoai'] ?? ''); ?></td>
            </tr>
            <tr>
                <td class="form-label" align="right">Email:</td>
                <td class="form-input"><?php echo htmlspecialchars($row['Email'] ?? ''); ?></td>
            </tr>
            <tr>
                <td colspan="2" align="center" class="form-submit">
                    <input type="submit" value="Xóa" onclick="return confirm('Bạn có chắc chắn muốn xóa khách hàng này không?');">
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