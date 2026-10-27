<?php
$conn = mysqli_connect("localhost", "root", "", "ql_ban_sua");

if (!$conn) {
    die("Kết nối thất bại: " . mysqli_connect_error());
}

mysqli_set_charset($conn, "utf8");

$sql = "SELECT Ten_sua, Trong_luong, Don_gia, Hinh FROM sua";
$result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Thông Tin Các Sản Phẩm</title>
    <link rel="stylesheet" href="./style6.css">
</head>
<body>
    <table class="main-container">
        <tr>
            <th class="main-title">THÔNG TIN CÁC SẢN PHẨM</th>
        </tr>
        <tr>
            <td>
                <table class="grid-table">
                    <?php
                    if ($result && mysqli_num_rows($result) > 0) {
                        $cols = 5;
                        $count = 0;

                        while ($row = mysqli_fetch_assoc($result)) {
                            if ($count % $cols == 0) {
                                echo "<tr>";
                            }

                            $ten_sua = htmlspecialchars($row['Ten_sua']);
                            $trong_luong = htmlspecialchars($row['Trong_luong']) . " gr";
                            $don_gia = number_format($row['Don_gia'], 0, ',', '.') . " VNĐ";
                            $hinh = !empty($row['Hinh']) ? trim($row['Hinh']) : "default.jpg";

                            echo "<td class='product-cell'>";
                            echo "<table class='inner-table'>";
                            echo "<tr><td class='cell-name'>" . $ten_sua . "</td></tr>";
                            echo "<tr><td class='cell-weight'>" . $trong_luong . " - " . $don_gia . "</td></tr>";
                            echo "<tr><td class='cell-img'><img src='../Image/" . $hinh . "' alt='" . $ten_sua . "'></td></tr>";
                            echo "</table>";
                            echo "</td>";

                            $count++;

                            if ($count % $cols == 0) {
                                echo "</tr>";
                            }
                        }

                        while ($count % $cols != 0) {
                            echo "<td class='product-cell'></td>";
                            $count++;
                        }
                        if ($count % $cols == 0 && $count > 0) {
                            echo "</tr>";
                        }

                    } else {
                        echo "<tr><td colspan='5' align='center'>Không có dữ liệu sản phẩm</td></tr>";
                    }
                    ?>
                </table>
            </td>
        </tr>
    </table>

</body>
</html>

<?php
mysqli_close($conn);
?>