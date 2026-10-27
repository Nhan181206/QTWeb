<?php
$conn = mysqli_connect("localhost", "root", "", "ql_ban_sua");

if (!$conn) {
    die("Kết nối thất bại: " . mysqli_connect_error());
}

mysqli_set_charset($conn, "utf8");

$rows_per_page = 3;

$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
if ($page < 1) $page = 1;

$offset = ($page - 1) * $rows_per_page;

$sql_total = "SELECT COUNT(*) as total FROM sua";
$result_total = mysqli_query($conn, $sql_total);
$row_total = mysqli_fetch_assoc($result_total);
$total_rows = $row_total['total'];
$total_pages = ceil($total_rows / $rows_per_page);

$sql = "SELECT s.*, hs.Ten_hang_sua 
        FROM sua s 
        JOIN hang_sua hs ON s.Ma_hang_sua = hs.Ma_hang_sua 
        LIMIT $offset, $rows_per_page";

$result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Thông Tin Chi Tiết Các Loại Sữa</title>
    <link rel="stylesheet" href="./style8.css">
</head>
<body>

    <table class="main-table">
        <?php
        if ($result && mysqli_num_rows($result) > 0) {
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
        } else {
            echo "<tr><td colspan='2' align='center'>Không có dữ liệu sản phẩm</td></tr>";
        }
        ?>
    </table>

    <div class="pager">
        <?php
        if ($page > 1) {
            echo "<a href='?page=" . ($page - 1) . "'>&lt;&lt;</a> ";
        } else {
            echo "<span>&lt;&lt;</span> ";
        }

        for ($i = 1; $i <= $total_pages; $i++) {
            if ($i == $page) {
                echo "<span class='active-page'>$i</span> ";
            } else {
                echo "<a href='?page=$i'>$i</a> ";
            }
        }

        if ($page < $total_pages) {
            echo "<a href='?page=" . ($page + 1) . "'>&gt;&gt;</a>";
        } else {
            echo "<span>&gt;&gt;</span>";
        }
        ?>
    </div>

</body>
</html>

<?php
mysqli_close($conn);
?>