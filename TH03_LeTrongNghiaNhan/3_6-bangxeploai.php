<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Bảng Kết Quả Xếp Loại</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 30px; }
        .box-result {
            border: 1.5px solid #337ab7;
            padding: 20px;
            width: 450px;
            margin: 0 auto;
        }
        .title {
            color: #1b5e20;
            text-align: center;
            font-weight: bold;
            font-size: 18px;
            margin-bottom: 20px;
            text-transform: uppercase;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 15px;
        }
        table, th, td {
            border: 1px solid #333;
        }
        th, td {
            padding: 8px 12px;
            text-align: center;
        }
        th {
            background-color: #f2f2f2;
        }
        .error { color: red; margin-bottom: 10px; }
        .back-btn { text-align: center; }
        .back-btn a { color: #337ab7; text-decoration: none; font-weight: bold; }
    </style>
</head>
<body>

<div class="box-result">
    <div class="title">KẾT QUẢ XẾP LOẠI</div>

    <?php
    if (isset($_POST['submit'])) {
        $hoten = trim($_POST['hoten']);
        $diem = trim($_POST['diem']);
        $errors = array();

        // 1. Kiểm tra chưa nhập dữ liệu
        if (empty($hoten)) {
            $errors[] = "Chưa nhập Họ tên.";
        }
        if ($diem === '') {
            $errors[] = "Chưa nhập Điểm.";
        } 
        // 2. Kiểm tra dữ liệu dạng số
        else if (!is_numeric($diem)) {
            $errors[] = "Điểm nhập vào phải là dạng số.";
        } else {
            $diem = (float)$diem;
            if ($diem < 0 || $diem > 10) {
                $errors[] = "Điểm phải nằm trong khoảng từ 0 đến 10.";
            }
        }

        // Nếu có lỗi thì hiển thị thông báo
        if (!empty($errors)) {
            foreach ($errors as $err) {
                echo "<p class='error'>• $err</p>";
            }
        } else {
            // 3. Tính Kết quả (Đạt / Không đạt)
            $ket_qua = ($diem >= 5) ? "Đạt" : "Không đạt";

            // 4. Tính Xếp loại
            if ($diem >= 9 && $diem <= 10) {
                $xep_loai = "Giỏi";
            } else if ($diem >= 7) {
                $xep_loai = "Khá";
            } else if ($diem >= 5) {
                $xep_loai = "Trung bình";
            } else {
                $xep_loai = "Yếu";
            }

            // 5. Hiển thị dưới dạng BẢNG
            ?>
            <table>
                <thead>
                    <tr>
                        <th>Họ tên</th>
                        <th>Điểm</th>
                        <th>Kết quả</th>
                        <th>Xếp loại</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?php echo htmlspecialchars($hoten); ?></td>
                        <td><?php echo $diem; ?></td>
                        <td><?php echo $ket_qua; ?></td>
                        <td><b><?php echo $xep_loai; ?></b></td>
                    </tr>
                </tbody>
            </table>
            <?php
        }
    } else {
        echo "<p class='error'>Vui lòng nhập dữ liệu từ form!</p>";
    }
    ?>

    <div class="back-btn">
        <a href="3_6-xeploai.php">Quay lại trang nhập</a>
    </div>
</div>

</body>
</html>