<?php
$conn = mysqli_connect("localhost", "root", "", "ql_ban_sua");
if (!$conn) {
    die("Kết nối thất bại: " . mysqli_connect_error());
}
mysqli_set_charset($conn, "utf8");

$sql = "SELECT * FROM khach_hang";
$result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Thông Tin Khách Hàng</title>
    <link rel="stylesheet" href="./style12.css">
</head>
<body>

    <h2 class="title">THÔNG TIN KHÁCH HÀNG</h2>

    <table class="customer-table">
        <tr>
            <th>Mã KH</th>
            <th>Tên khách hàng</th>
            <th>Giới tính</th>
            <th>Địa chỉ</th>
            <th>Số điện thoại</th>
            <th>Email</th>
            <th>Sửa</th>
            <th>Xóa</th>
        </tr>
        <?php
        if ($result && mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $makh = urlencode($row['Ma_khach_hang']);
                $phai = ($row['Phai'] == 0 || strtolower($row['Phai']) == 'nam') ? 'Nam' : 'Nữ';

                echo "<tr>";
                echo "<td align='center'>" . htmlspecialchars($row['Ma_khach_hang']) . "</td>";
                echo "<td>" . htmlspecialchars($row['Ten_khach_hang']) . "</td>";
                echo "<td align='center'>" . $phai . "</td>";
                echo "<td>" . htmlspecialchars($row['Dia_chi']) . "</td>";
                echo "<td align='center'>" . htmlspecialchars($row['Dien_thoai']) . "</td>";
                echo "<td>" . htmlspecialchars($row['Email']) . "</td>";
                echo "<td align='center'><a href='Capnhap_KH.php?makh={$makh}'>Sửa</a></td>";
                echo "<td align='center'><a href='Xoa_KH.php?makh={$makh}' style='color:red;'>Xóa</a></td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='8' align='center'>Không có dữ liệu khách hàng</td></tr>";
        }
        ?>
    </table>

</body>
</html>
<?php mysqli_close($conn); ?>