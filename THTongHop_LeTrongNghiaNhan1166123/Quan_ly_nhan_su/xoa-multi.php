<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: dangnhap.php");
    exit();
}

$conn = mysqli_connect("localhost", "root", "", "qlnhanvien");
if (!$conn) {
    die("Kết nối thất bại: " . mysqli_connect_error());
}
mysqli_set_charset($conn, "utf8");

$thongbao = "";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['xoanhieu'])) {
    if (!empty($_POST['ids']) && is_array($_POST['ids'])) {
        $ids = $_POST['ids'];
        $escaped_ids = array_map(function($id) use ($conn) {
            return "'" . mysqli_real_escape_string($conn, $id) . "'";
        }, $ids);
        
        $id_string = implode(',', $escaped_ids);
        $sql_delete = "DELETE FROM nhanvien WHERE manv IN ($id_string)";
        
        if (mysqli_query($conn, $sql_delete)) {
            $thongbao = "Xóa thành công các nhân viên đã chọn!";
        } else {
            $thongbao = "Lỗi khi xóa dữ liệu!";
        }
    } else {
        $thongbao = "Vui lòng chọn ít nhất một nhân viên để xóa!";
    }
}

$sql = "SELECT * FROM nhanvien";
$result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Xóa Nhiều Nhân Viên</title>
    <link rel="stylesheet" href="./style.css">
</head>
<body>

    <div class="header-banner">
        <a href="index.php">
            ỦY BAN NHÂN DÂN TỈNH ĐỒNG NAI<br>
            <span>TRƯỜNG CAO ĐẲNG KỸ THUẬT CÔNG NGHỆ ĐỒNG NAI</span>
            DONG NAI COLLEGE OF HIGH TECHNOLOGY<br>
            <b>NHẤT NGHỆ TINH - NHẤT THÂN VINH</b>
        </a>
    </div>

    <h2 class="title">XÓA NHIỀU NHÂN VIÊN</h2>

    <?php if ($thongbao !== ''): ?>
        <div class="notification"><?php echo $thongbao; ?></div>
    <?php endif; ?>

    <form action="" method="POST">
        <table class="nv-table">
            <tr>
                <th style="width: 40px; text-align: center;"><input type="checkbox" id="checkAll"></th>
                <th>Mã NV</th>
                <th>Họ Tên</th>
                <th>Phái</th>
                <th>Ngày Sinh</th>
                <th>Địa Chỉ</th>
                <th>Email</th>
            </tr>
            <?php
            if ($result && mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $hoten = htmlspecialchars(trim(($row['ho'] ?? '') . ' ' . ($row['ten'] ?? '')));
                    $manv = htmlspecialchars($row['manv']);
                    echo "<tr>";
                    echo "<td align='center'><input type='checkbox' name='ids[]' value='{$manv}'></td>";
                    echo "<td align='center'>" . $manv . "</td>";
                    echo "<td>" . $hoten . "</td>";
                    echo "<td align='center'>" . htmlspecialchars($row['phai'] ?? '') . "</td>";
                    echo "<td align='center'>" . htmlspecialchars($row['ngaysinh'] ?? '') . "</td>";
                    echo "<td>" . htmlspecialchars($row['diachi'] ?? '') . "</td>";
                    echo "<td>" . htmlspecialchars($row['email'] ?? '') . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='7' align='center'>Không có dữ liệu nhân viên</td></tr>";
            }
            ?>
        </table>

        <div class="action-container">
            <input type="submit" name="xoanhieu" value="Xóa" onclick="return confirm('Bạn có chắc chắn muốn xóa các nhân viên đã chọn không?');">
            <a href="index.php">Trang chủ</a>
        </div>
    </form>

    <div class="footer-banner">
        SVTH: Nguyễn Đăng Khoa - Khoa Công Nghệ Thông Tin.<br>
        Trường Cao Đẳng Kỹ Thuật Công Nghệ Đồng Nai - Số 8, Nguyễn Văn Hoa, Thống Nhất, Biên Hòa.
    </div>

    <script>
        document.getElementById('checkAll')?.addEventListener('click', function() {
            let checkboxes = document.querySelectorAll('input[name="ids[]"]');
            checkboxes.forEach(cb => cb.checked = this.checked);
        });
    </script>

</body>
</html>
<?php mysqli_close($conn); ?>