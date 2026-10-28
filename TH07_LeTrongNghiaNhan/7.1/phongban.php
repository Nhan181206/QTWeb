<?php
$conn = mysqli_connect("localhost", "root", "", "qlnhanvien");

if (!$conn) {
    die("Kết nối thất bại: " . mysqli_connect_error());
}

mysqli_set_charset($conn, "utf8mb4");

$sql = "SELECT * FROM phongban";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Danh Sách Phòng Ban</title>
    <link rel="stylesheet" href="./style1.css">
</head>
<body>

    <h2>DANH SÁCH PHÒNG BAN</h2>

    <table>
        <tr>
            <th>Mã PB</th>
            <th>Tên phòng ban</th>
        </tr>
        <?php
        if ($result && mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
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
mysqli_close($conn);
?>