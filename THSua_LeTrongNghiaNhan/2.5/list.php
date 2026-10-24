<?php
$servername = "localhost";
$username = "root";       
$password = "";           
$dbname = "ql_ban_sua";   

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

$conn->set_charset("utf8mb4");

$sql = "SELECT s.Hinh, s.Ten_sua, hs.Ten_hang_sua, ls.Ten_loai, s.Trong_luong, s.Don_gia 
        FROM sua s
        JOIN hang_sua hs ON s.Ma_hang_sua = hs.Ma_hang_sua
        JOIN loai_sua ls ON s.Ma_loai_sua = ls.Ma_loai_sua";

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Thông Tin Các Sản Phẩm</title>
    <link rel="stylesheet" href="./style5.css">
</head>
<body>

    <div class="title">THÔNG TIN CÁC SẢN PHẨM</div>

    <table class="product-table">
        <?php
        if ($result && $result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                
                echo "<td class='col-img'>";
                $hinh = !empty($row["Hinh"]) ? $row["Hinh"] : "default.jpg";
                echo "<img src='Images/" . htmlspecialchars($hinh) . "' alt='" . htmlspecialchars($row["Ten_sua"]) . "'>";
                echo "</td>";

                echo "<td class='col-info'>";
                echo "<div class='product-name'>" . htmlspecialchars($row["Ten_sua"]) . "</div>";
                echo "<div class='product-detail'>";
                echo "Nhà sản xuất: " . htmlspecialchars($row["Ten_hang_sua"]) . "<br>";
                echo htmlspecialchars($row["Ten_loai"]) . " - " . htmlspecialchars($row["Trong_luong"]) . " gr - " . number_format($row["Don_gia"], 0, ',', '.') . " VNĐ";
                echo "</div>";
                echo "</td>";
                
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='2' style='text-align: center;'>Không có dữ liệu sản phẩm sữa</td></tr>";
        }
        ?>
    </table>

</body>
</html>

<?php
$conn->close();
?>