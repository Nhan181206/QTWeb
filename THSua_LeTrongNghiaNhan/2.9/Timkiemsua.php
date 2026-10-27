<?php
$conn = mysqli_connect("localhost", "root", "", "ql_ban_sua");

if (!$conn) {
    die("Kết nối thất bại: " . mysqli_connect_error());
}

mysqli_set_charset($conn, "utf8");

$tukhoa = isset($_GET['txt_search']) ? trim($_GET['txt_search']) : '';

$result = null;
$num_rows = 0;

if ($tukhoa !== '') {
    $tukhoa_es = mysqli_real_escape_string($conn, $tukhoa);

    $sql = "SELECT s.*, hs.Ten_hang_sua 
            FROM sua s 
            JOIN hang_sua hs ON s.Ma_hang_sua = hs.Ma_hang_sua 
            WHERE s.Ten_sua LIKE '%$tukhoa_es%'";
            
    $result = mysqli_query($conn, $sql);
    if ($result) {
        $num_rows = mysqli_num_rows($result);
    }
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Tìm Kiếm Thông Tin Sữa</title>
    <link rel="stylesheet" href="./style9.css">
</head>
<body>

    <form action="" method="GET">
        <table class="search-form-table">
            <tr>
                <th colspan="2" class="form-title">TÌM KIẾM THÔNG TIN SỮA</th>
            </tr>
            <tr>
                <td class="form-label" align="right">Tên sữa:</td>
                <td class="form-input">
                    <input type="text" name="txt_search" value="<?php echo htmlspecialchars($tukhoa); ?>" required>
                    <input type="submit" value="Tìm kiếm">
                </td>
            </tr>
        </table>
    </form>

    <?php if ($tukhoa !== ''): ?>
        <div class="search-result-count">
            Có <b><?php echo $num_rows; ?></b> sản phẩm được tìm thấy
        </div>

        <?php if ($num_rows > 0): ?>
            <table class="main-table">
                <?php
                while ($row = mysqli_fetch_assoc($result)) {
                    $ten_sua = htmlspecialchars($row['Ten_sua']);
                    $ten_hang = htmlspecialchars($row['Ten_hang_sua']);
                    $tp_dinh_duong = htmlspecialchars($row['TP_Dinh_duong'] ?? $row['TP_Dinh_ dưỡng'] ?? 'Đang cập nhật');
                    $loi_ich = htmlspecialchars($row['Loi_ich'] ?? 'Đang cập nhật');
                    $trong_luong = htmlspecialchars($row['Trong_luong']) . " gr";
                    $don_gia = number_format($row['Don_gia'], 0, ',', '.') . " VNĐ";
                    $hinh = !empty($row['Hinh']) ? trim($row['Hinh']) : "default.jpg";

                    echo "<tr>";
                    echo "<td colspan='2' class='product-header'>" . $ten_sua . " - " . $ten_hang . "</td>";
                    echo "</tr>";

                    echo "<tr>";
                    echo "<td class='img-column'>";
                    echo "<img src='../Image/" . $hinh . "' alt='" . $ten_sua . "'>";
                    echo "</td>";

                    echo "<td class='info-column'>";
                    echo "<div class='section-title'>Thành phần dinh dưỡng:</div>";
                    echo "<div class='section-content'>" . $tp_dinh_duong . "</div>";
                    
                    echo "<div class='section-title' style='margin-top: 8px;'>Lợi ích:</div>";
                    echo "<div class='section-content'>" . $loi_ich . "</div>";
                    
                    echo "<div class='price-weight'>Trọng lượng: <b>" . $trong_luong . "</b> - Đơn giá: <b>" . $don_gia . "</b></div>";
                    echo "</td>";
                    echo "</tr>";
                }
                ?>
            </table>
        <?php else: ?>
            <div style="text-align: center; color: red; font-weight: bold; margin-top: 20px;">
                Không tìm thấy sản phẩm này!
            </div>
        <?php endif; ?>
    <?php endif; ?>

</body>
</html>

<?php
mysqli_close($conn);
?>