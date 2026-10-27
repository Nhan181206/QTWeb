<?php
$conn = mysqli_connect("localhost", "root", "", "ql_ban_sua");

if (!$conn) {
    die("Kết nối thất bại: " . mysqli_connect_error());
}

mysqli_set_charset($conn, "utf8");

$ma_sua = isset($_GET['ma_sua']) ? mysqli_real_escape_string($conn, $_GET['ma_sua']) : '';

$sql = "SELECT s.*, hs.Ten_hang_sua 
        FROM sua s 
        JOIN hang_sua hs ON s.Ma_hang_sua = hs.Ma_hang_sua 
        WHERE s.Ma_sua = '$ma_sua'";

$result = mysqli_query($conn, $sql);
$row = ($result) ? mysqli_fetch_assoc($result) : null;
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Chi Tiết Sản Phẩm</title>
    <link rel="stylesheet" href="./style7.css">
</head>
<body>

    <?php if ($row): ?>
    <table class="detail-container">
        <tr>
            <th class="detail-title"><?php echo htmlspecialchars($row['Ten_sua']) . " - " . htmlspecialchars($row['Ten_hang_sua']); ?></th>
        </tr>
        <tr>
            <td>
                <table class="detail-content-table">
                    <tr>
                        <td class="detail-img-col">
                            <?php 
                            $hinh = !empty($row['Hinh']) ? trim($row['Hinh']) : "default.jpg";
                            ?>
                            <img src="../Image/<?php echo htmlspecialchars($hinh); ?>" alt="<?php echo htmlspecialchars($row['Ten_sua']); ?>">
                            <div class="back-link">
                                <a href="TT_sanpham.php">Quay về</a>
                            </div>
                        </td>
                        <td class="detail-info-col">
                            <div class="section-title">Thành phần dinh dưỡng:</div>
                            <div class="section-text"><?php echo nl2br(htmlspecialchars($row['TP_Dinh_ dưỡng'] ?? $row['TP_Dinh_duong'] ?? 'Đang cập nhật')); ?></div>
                            
                            <div class="section-title" style="margin-top: 10px;">Lợi ích:</div>
                            <div class="section-text"><?php echo nl2br(htmlspecialchars($row['Loi_ich'] ?? 'Đang cập nhật')); ?></div>
                            
                            <div class="price-weight">
                                Trọng lượng: <b><?php echo htmlspecialchars($row['Trong_luong']); ?> gr</b> - 
                                Đơn giá: <b><?php echo number_format($row['Don_gia'], 0, ',', '.'); ?> VNĐ</b>
                            </div>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
    <?php else: ?>
        <p style="text-align:center; color:red; font-weight:bold;">Không tìm thấy thông tin sản phẩm!</p>
        <p style="text-align:center;"><a href="list_dang_cot_co_link.php">Quay về danh sách</a></p>
    <?php endif; ?>

</body>
</html>

<?php
mysqli_close($conn);
?>