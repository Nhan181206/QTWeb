<?php
$conn = mysqli_connect("localhost", "root", "", "qlsinhvien");
if (!$conn) {
    die("Kết nối thất bại: " . mysqli_connect_error());
}
mysqli_set_charset($conn, "utf8");

$limit = 5;
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
if ($page < 1) $page = 1;

$offset = ($page - 1) * $limit;

$sql_total = "SELECT COUNT(*) as total FROM sinhvien";
$res_total = mysqli_query($conn, $sql_total);
$row_total = mysqli_fetch_assoc($res_total);
$total_pages = ceil($row_total['total'] / $limit);

$sql = "SELECT * FROM sinhvien LIMIT $offset, $limit";
$result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Danh Sách Sinh Viên</title>
    <link rel="stylesheet" href="./style4.css">
</head>
<body>

    <h2 class="title">DANH SÁCH SINH VIÊN</h2>

    <table class="sv-table">
        <tr>
            <th>Mã SV</th>
            <th>Họ tên</th>
            <th>Phái</th>
            <th>Ngày sinh</th>
            <th>Mã lớp</th>
        </tr>
        <?php
        if ($result && mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $gioi_tinh = isset($row['GioiTinh']) ? $row['GioiTinh'] : 0;
                $phai = ($gioi_tinh == 0) ? 'Nữ' : 'Nam';

                $ho_ten = isset($row['HoTen']) ? $row['HoTen'] : ($row['Ho'] . ' ' . $row['Ten']);

                echo "<tr>";
                echo "<td align='center'>" . htmlspecialchars($row['MaSV']) . "</td>";
                echo "<td>" . htmlspecialchars($ho_ten) . "</td>";
                echo "<td align='center'>" . $phai . "</td>";
                echo "<td align='center'>" . htmlspecialchars($row['NgaySinh']) . "</td>";
                echo "<td align='center'>" . htmlspecialchars($row['MaLop']) . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='5' align='center'>Không có dữ liệu sinh viên</td></tr>";
        }
        ?>
    </table>

    <div class="pager">
        <?php
        for ($i = 1; $i <= $total_pages; $i++) {
            if ($i == $page) {
                echo "<span class='active-page'>$i</span> ";
            } else {
                echo "<a href='?page=$i'>$i</a> ";
            }
        }
        ?>
    </div>

</body>
</html>
<?php mysqli_close($conn); ?>