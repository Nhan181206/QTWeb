<?php
$conn = mysqli_connect("localhost", "root", "", "ql_ban_sua");

if (!$conn) {
    die("Kết nối thất bại: " . mysqli_connect_error());
}

mysqli_set_charset($conn, "utf8");

$loaisua_result = mysqli_query($conn, "SELECT * FROM loai_sua");
$hangsua_result = mysqli_query($conn, "SELECT * FROM hang_sua");

$ma_loai = isset($_GET['loai_sua']) ? trim($_GET['loai_sua']) : '';
$ma_hang = isset($_GET['hang_sua']) ? trim($_GET['hang_sua']) : '';
$ten_sua = isset($_GET['ten_sua']) ? trim($_GET['ten_sua']) : '';

$result = null;
$num_rows = 0;

$sql = "SELECT s.*, hs.Ten_hang_sua, ls.Ten_loai 
        FROM sua s 
        JOIN hang_sua hs ON s.Ma_hang_sua = hs.Ma_hang_sua 
        JOIN loai_sua ls ON s.Ma_loai_sua = ls.Ma_loai_sua 
        WHERE 1=1";

if ($ma_loai !== '') {
    $sql .= " AND s.Ma_loai_sua = '" . mysqli_real_escape_string($conn, $ma_loai) . "'";
}
if ($ma_hang !== '') {
    $sql .= " AND s.Ma_hang_sua = '" . mysqli_real_escape_string($conn, $ma_hang) . "'";
}
if ($ten_sua !== '') {
    $sql .= " AND s.Ten_sua LIKE '%" . mysqli_real_escape_string($conn, $ten_sua) . "%'";
}

$result = mysqli_query($conn, $sql);
if ($result) {
    $num_rows = mysqli_num_rows($result);
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Tìm Kiếm Nâng Cao Thông Tin Sữa</title>
    <link rel="stylesheet" href="./style10.css">
</head>
<body>

    <form action="" method="GET">
        <table class="search-form-table">
            <tr>
                <th colspan="2" class="form-title">TÌM KIẾM THÔNG TIN SỮA</th>
            </tr>
            <tr>
                <td class="form-label" align="right">Loại sữa:</td>
                <td class="form-input">
                    <select name="loai_sua">
                        <option value="">-- Tất cả loại sữa --</option>
                        <?php 
                        if ($loaisua_result) {
                            while ($l = mysqli_fetch_assoc($loaisua_result)) {
                                $selected = ($ma_loai == $l['Ma_loai_sua']) ? "selected" : "";
                                echo "<option value='" . $l['Ma_loai_sua'] . "' $selected>" . htmlspecialchars($l['Ten_loai']) . "</option>";
                            }
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td class="form-label" align="right">Hãng sữa:</td>
                <td class="form-input">
                    <select name="hang_sua">
                        <option value="">-- Tất cả hãng sữa --</option>
                        <?php 
                        if ($hangsua_result) {
                            while ($h = mysqli_fetch_assoc($hangsua_result)) {
                                $selected = ($ma_hang == $h['Ma_hang_sua']) ? "selected" : "";
                                echo "<option value='" . $h['Ma_hang_sua'] . "' $selected>" . htmlspecialchars($h['Ten_hang_sua']) . "</option>";
                            }
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td class="form-label" align="right">Tên sữa:</td>
                <td class="form-input">
                    <input type="text" name="ten_sua" value="<?php echo htmlspecialchars($ten_sua); ?>">
                    <input type="submit" value="Tìm kiếm">
                </td>
            </tr>
        </table>
    </form>

    <div class="search-result-count">
        Có <b><?php echo $num_rows; ?></b> sản phẩm được tìm thấy
    </div>

    <?php if ($num_rows > 0): ?>
        <table class="main-table">
            <?php
            while ($row = mysqli_fetch_assoc($result)) {
                $ten_sanpham = htmlspecialchars($row['Ten_sua']);
                $ten_hang = htmlspecialchars($row['Ten_hang_sua']);
                $tp_dinh_duong = htmlspecialchars($row['TP_Dinh_duong'] ?? $row['TP_Dinh_ dưỡng'] ?? 'Đang cập nhật');
                $loi_ich = htmlspecialchars($row['Loi_ich'] ?? 'Đang cập nhật');
                $trong_luong = htmlspecialchars($row['Trong_luong']) . " gr";
                $don_gia = number_format($row['Don_gia'], 0, ',', '.') . " VNĐ";
                $hinh = !empty($row['Hinh']) ? trim($row['Hinh']) : "default.jpg";

                echo "<tr>";
                echo "<td colspan='2' class='product-header'>" . $ten_sanpham . " - " . $ten_hang . "</td>";
                echo "</tr>";

                echo "<tr>";
                echo "<td class='img-column'>";
                echo "<img src='../Image/" . $hinh . "' alt='" . $ten_sanpham . "'>";
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

</body>
</html>

<?php
mysqli_close($conn);
?>