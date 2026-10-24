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

$sql = "SELECT * FROM khach_hang";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Thông Tin Khách Hàng</title>
    <link rel="stylesheet" href="./style3.css">
</head>
<body>

    <div class="title">THÔNG TIN KHÁCH HÀNG</div>

    <table>
        <tr>
            <th>Mã KH</th>
            <th>Tên khách hàng</th>
            <th>Giới tính</th>
            <th>Địa chỉ</th>
            <th>Số điện thoại</th>
        </tr>

        <?php
        if ($result && $result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td class='text-center'>" . htmlspecialchars($row["Ma_khach_hang"]) . "</td>";
                echo "<td>" . htmlspecialchars($row["Ten_khach_hang"]) . "</td>";

                echo "<td class='text-center'>";
                if ($row["Phai"] == 1) {
                    echo "<img src='images/nu.png' alt='Nữ' width='30' height='30'>"; 
                } else {
                    echo "<img src='images/nam.png' alt='Nam' width='30' height='30'>";
                }
                echo "</td>";
                
                echo "<td>" . htmlspecialchars($row["Dia_chi"]) . "</td>";
                echo "<td>" . htmlspecialchars($row["Dien_thoai"]) . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='5' class='text-center'>Không có dữ liệu khách hàng</td></tr>";
        }
        ?>
    </table>

</body>
</html>

<?php
$conn->close();
?>