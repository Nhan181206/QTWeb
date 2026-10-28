<?php
$conn = mysqli_connect("localhost", "root", "", "qlnhanvien");

if (!$conn) {
    die("Kết nối thất bại: " . mysqli_connect_error());
}

mysqli_set_charset($conn, "utf8mb4");

$sql = "SELECT manv, CONCAT(ho, ' ', ten) as hoten, phai, ngaysinh, diachi, mapb FROM nhanvien";
$result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Danh Sách Nhân Viên</title>
    <link rel="stylesheet" href="./style1.css">
</head>
<body>

    <h2>DANH SÁCH NHÂN VIÊN</h2>

    <table>
        <tr>
            <th>STT</th>
            <th>Mã NV</th>
            <th>Họ tên</th>
            <th>Phái</th>
            <th>Ngày sinh</th>
            <th>Địa chỉ</th>
            <th>Phòng ban</th>
        </tr>
        <?php
        if ($result && mysqli_num_rows($result) > 0) {
            $stt = 1;
            while ($row = mysqli_fetch_assoc($result)) {
                $phai_text = ($row["phai"] == 1 || strtolower($row["phai"]) == 'nam') ? "Nam" : "Nữ";

                echo "<tr>";
                echo "<td class='text-center'>" . $stt++ . "</td>";
                echo "<td class='text-center'>" . htmlspecialchars($row["manv"]) . "</td>";
                echo "<td>" . htmlspecialchars($row["hoten"]) . "</td>";
                echo "<td class='text-center'>" . htmlspecialchars($phai_text) . "</td>";
                echo "<td class='text-center'>" . htmlspecialchars($row["ngaysinh"]) . "</td>";
                echo "<td>" . htmlspecialchars($row["diachi"]) . "</td>";
                echo "<td class='text-center'>" . htmlspecialchars($row["mapb"]) . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='7' class='text-center'>Không có dữ liệu nhân viên</td></tr>";
        }
        ?>
    </table>

</body>
</html>

<?php
mysqli_close($conn);
?>