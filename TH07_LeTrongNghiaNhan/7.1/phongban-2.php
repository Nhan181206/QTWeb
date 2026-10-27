<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "qlnhanvien";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

$conn->set_charset("utf8mb4");

$sql = "SELECT * FROM phongban";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Danh Sách Phòng Ban - OOP</title>
    <link rel="stylesheet" href="./style.css">
</head>
<body>

    <h2>DANH SÁCH PHÒNG BAN</h2>

    <table>
        <tr>
            <th>Mã PB</th>
            <th>Tên phòng ban</th>
        </tr>
        <?php
        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td class='text-center'>" . htmlspecialchars($row["mapb"]) . "</td>";
                echo "<td>" . htmlspecialchars($row["tenpb"]) . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='2' class='text-center'>Không có dữ liệu phòng ban</td></tr>";
        }
        ?>
    </table>

</body>
</html>

<?php
$conn->close();
?>