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

$rowsPerPage = 2; 
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
if ($page < 1) $page = 1;
$offset = ($page - 1) * $rowsPerPage;

$sqlTotal = "SELECT COUNT(*) AS total FROM sua";
$resultTotal = $conn->query($sqlTotal);
$rowTotal = $resultTotal->fetch_assoc();
$numRows = $rowTotal['total'];
$maxPage = ceil($numRows / $rowsPerPage);

$sql = "SELECT s.Ten_sua, hs.Ten_hang_sua, ls.Ten_loai, s.Trong_luong, s.Don_gia 
        FROM sua s
        JOIN hang_sua hs ON s.Ma_hang_sua = hs.Ma_hang_sua
        JOIN loai_sua ls ON s.Ma_loai_sua = ls.Ma_loai_sua
        LIMIT $offset, $rowsPerPage";

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Thông Tin Sữa - Phân Trang</title>
    <link rel="stylesheet" href="style4.css">
</head>
<body>

    <div class="title">THÔNG TIN SỮA</div>

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
        if ($result && $result->num_rows > 0) {
            $stt = $offset + 1;
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td class='text-center'>" . $stt++ . "</td>";
                echo "<td>" . htmlspecialchars($row["Ten_sua"]) . "</td>";
                echo "<td>" . htmlspecialchars($row["Ten_hang_sua"]) . "</td>";
                echo "<td>" . htmlspecialchars($row["Ten_loai"]) . "</td>";
                echo "<td class='text-center'>" . htmlspecialchars($row["Trong_luong"]) . " gram</td>";

                echo "<td class='text-right'>" . number_format($row["Don_gia"], 0, ',', '.') . " VNĐ</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='6' class='text-center'>Không có dữ liệu sữa</td></tr>";
        }
        ?>
    </table>

    <div class="pagination">
        <?php
        if ($page > 1) {
            echo "<a href='luoi_phan_trang.php?page=1'>&lt;&lt;</a> ";
        }

        for ($i = 1; $i <= $maxPage; $i++) {
            if ($i == $page) {
                echo "<span>$i</span>";
            } else {
                echo "<a href='luoi_phan_trang.php?page=$i'>$i</a>";
            }
        }

        if ($page < $maxPage) {
            echo " <a href='luoi_phan_trang.php?page=$maxPage'>&gt;&gt;</a>";
        }
        ?>
    </div>

</body>
</html>

<?php
$conn->close();
?>