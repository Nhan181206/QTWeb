<?php
    $server = "localhost";
    $name = "root";
    $pass = "";
    $dbname = "ql_ban_sua";

    $conn = new mysqli($server, $name, $pass, $dbname);

    if($conn -> connect_error){
        die("kết nối thất bại" . $conn -> connect_error);
    }

    $conn -> set_charset("utf8mb4");

    $sql = "SELECT * FROM hang_sua";
    $result = $conn -> query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông tin hãng sữa</title>
    <link rel="stylesheet" href="./style1.css">
</head>
<body>
    <div class="title">
        <h2>THÔNG TIN HÃNG SỮA</h2>
    </div>

    <table>
        <tr>
            <th>Mã HS</th>
            <th>Tên hãng sữa</th>
            <th>Địa chỉ</th>
            <th>Điện thoại</th>
            <th>Email</th>
        </tr>

        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td style='text-align: center;'>" . $row["Ma_hang_sua"] . "</td>";
                echo "<td>" . $row["Ten_hang_sua"] . "</td>";
                echo "<td>" . $row["Dia_chi"] . "</td>";
                echo "<td style='text-align: center;'>" . $row["Dien_thoai"] . "</td>";
                echo "<td>" . $row["Email"] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='5' style='text-align: center;'>Không có dữ liệu hãng sữa</td></tr>";
        }
        ?>
    </table>
</body>
</html>