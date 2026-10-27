<?php
$conn = mysqli_connect("localhost", "root", "", "ql_ban_sua");

if (!$conn) {
    die("Kết nối thất bại: " . mysqli_connect_error());
}

mysqli_set_charset($conn, "utf8");

$rows_per_page = 5;

$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
if ($page < 1) $page = 1;

$offset = ($page - 1) * $rows_per_page;

$sql_total = "SELECT COUNT(*) as total FROM sua";
$result_total = mysqli_query($conn, $sql_total);
$row_total = mysqli_fetch_assoc($result_total);
$total_rows = $row_total['total'];
$total_pages = ceil($total_rows / $rows_per_page);

$sql = "SELECT sua.Ten_sua, hang_sua.Ten_hang_sua, loai_sua.Ten_loai, sua.Trong_luong, sua.Don_gia 
        FROM sua 
        JOIN hang_sua ON sua.Ma_hang_sua = hang_sua.Ma_hang_sua 
        JOIN loai_sua ON sua.Ma_loai_sua = loai_sua.Ma_loai_sua 
        LIMIT $offset, $rows_per_page";

$result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Thông Tin Sữa - Phân Trang</title>
    <link rel="stylesheet" href="./style4.css">
</head>
<body>

    <h2>THÔNG TIN SỮA</h2>

    <table>
        <tr>
            <th>Số TT</th>
            <th>Tên sữa</th>
            <th>Hãng sữa</th>
            <th>Loại sữa</th>
            <th>Trọng lượng</th>
            <th>Đơn giá</th>
        </tr>

        <?php
        if ($result && mysqli_num_rows($result) > 0) {
            $stt = $offset + 1;
            while ($row = mysqli_fetch_assoc($result)) {
                $row_class = ($stt % 2 == 0) ? "row-even" : "row-odd";

                $don_gia = number_format($row['Don_gia'], 0, ',', '.') . " VNĐ";
                $trong_luong = $row['Trong_luong'] . " gram";

                echo "<tr class='$row_class'>";
                echo "<td align='center'>" . $stt . "</td>";
                echo "<td>" . htmlspecialchars($row['Ten_sua']) . "</td>";
                echo "<td>" . htmlspecialchars($row['Ten_hang_sua']) . "</td>";
                echo "<td>" . htmlspecialchars($row['Ten_loai']) . "</td>";
                echo "<td align='center'>" . htmlspecialchars($trong_luong) . "</td>";
                echo "<td align='right'>" . htmlspecialchars($don_gia) . "</td>";
                echo "</tr>";

                $stt++;
            }
        } else {
            echo "<tr><td colspan='6' align='center'>Không có dữ liệu sữa</td></tr>";
        }
        ?>
    </table>

    <div class="pagination">
        <?php
        if ($page > 1) {
            echo "<a href='?page=" . ($page - 1) . "'>&lt;&lt;</a> ";
        } else {
            echo "<span>&lt;&lt;</span> ";
        }

        for ($i = 1; $i <= $total_pages; $i++) {
            if ($i == $page) {
                echo "<span>$i</span> ";
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