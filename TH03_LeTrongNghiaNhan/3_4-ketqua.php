<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Kết quả bình phương</title>
    <style>
        /* Khung bên ngoài */
        .box-container {
            border: 1.5px solid #337ab7;
            padding: 20px 30px;
            display: inline-block;
            margin: 20px;
        }
        /* Tiêu đề màu xanh lá */
        .title {
            color: #1b5e20;
            text-align: center;
            font-size: 20px;
            font-weight: bold;
            margin-bottom: 20px;
            text-transform: uppercase;
        }
        /* Định dạng bảng */
        table {
            border-collapse: collapse;
            width: 100%;
            min-width: 300px;
            font-size: 18px;
        }
        table, th, td {
            border: 1px solid #333;
        }
        th, td {
            padding: 6px 15px;
            text-align: center;
        }
        th {
            font-weight: bold;
        }
    </style>
</head>
<body>

<?php
if (isset($_POST['number'])) {
    $n = (int)$_POST['number'];

    if ($n >= 1 && $n <= 999) {
?>
        <div class="box-container">
            <div class="title">BÌNH PHƯƠNG CỦA CÁC SỐ TỪ 1 ĐẾN <?php echo $n; ?> LÀ</div>

            <table>
                <thead>
                    <tr>
                        <th>Số i</th>
                        <th>Số i²</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // 1. Dùng vòng lặp FOR (Bạn có thể đổi sang WHILE hoặc DO...WHILE tùy ý)
                    for ($i = 1; $i <= $n; $i++) {
                        $binh_phuong = $i * $i;
                        echo "<tr>";
                        echo "<td>$i</td>";
                        echo "<td>$binh_phuong</td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
<?php
    } else {
        echo "<p style='color:red;'>Vui lòng nhập số nguyên từ 1 đến 999.</p>";
    }
} else {
    echo "<p>Vui lòng nhập dữ liệu từ trang form!</p>";
}
?>

</body>
</html>