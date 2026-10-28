<?php
$conn = mysqli_connect("localhost", "root", "", "qlxemay");

if (!$conn) {
    die("Kết nối thất bại: " . mysqli_connect_error());
}

mysqli_set_charset($conn, "utf8");

$sql = "SELECT MaXe, TenXe, MaLoai, Gia, HienThi, Hinh FROM xe";
$result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Danh Mục Xe Máy</title>
    <link rel="stylesheet" href="./style_xemay.css">
</head>
<body>

    <table class="main-container">
        <tr>
            <th class="main-title">DANH MỤC XE MÁY</th>
        </tr>
        <tr>
            <td>
                <table class="list-table">
                    <?php
                    if ($result && mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            if ($row['HienThi'] == 1) {
                                $ten_xe = htmlspecialchars($row['TenXe']);
                                $gia = number_format($row['Gia'], 0, ',', '.') . " VNĐ";
                                $hinh = !empty($row['Hinh']) ? trim($row['Hinh']) : "default.jpg";

                                echo "<tr>";

                                echo "<td class='img-column'>";
                                echo "<img src='Image/" . $hinh . "' alt='" . $ten_xe . "'>";
                                echo "</td>";

                                echo "<td class='info-column'>";
                                echo "<div class='xe-name'>" . $ten_xe . "</div>";
                                echo "<div class='xe-gia'>Giá bán: " . $gia . "</div>";
                                echo "</td>";

                                echo "</tr>";
                            }
                        }
                    } else {
                        echo "<tr><td colspan='2' align='center'>Không có dữ liệu xe máy</td></tr>";
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