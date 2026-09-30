<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kiểm Tra Ngày Hợp Lệ</title>
    <link rel="stylesheet" href="Style.css">
</head>
<body>
    <?php
        $ngay_nhap = '';
        $ket_qua = '';

        if (isset($_POST['thuc_hien'])) {
            $ngay_nhap = $_POST['ngay_nhap'] ?? '';

            if (!empty($ngay_nhap)) {
                $parts = explode('/', trim($ngay_nhap));

                if (count($parts) === 3 && is_numeric($parts[0]) && is_numeric($parts[1]) && is_numeric($parts[2])) {
                    $day = (int)$parts[0];
                    $month = (int)$parts[1];
                    $year = (int)$parts[2];

                    if (checkdate($month, $day, $year)) {
                        $ket_qua = "Ngày hợp lệ";
                    } else {
                        $ket_qua = "Ngày không hợp lệ";
                    }
                } else {
                    $ket_qua = "Ngày không hợp lệ";
                }
            }
        }
    ?>

    <form action="" method="post">
        <div class="container">
            <h2>KIỂM TRA NGÀY HỢP LỆ</h2>
        </div>
        <table>
            <tr>
                <td>Nhập ngày:</td>
                <td>
                    <input type="text" name="ngay_nhap" value="<?php echo htmlspecialchars($ngay_nhap); ?>"/>
                </td>
            </tr>
            <tr>
                <td>Kiểm tra:</td>
                <td>
                    <input type="text" name="ket_qua" value="<?php echo htmlspecialchars($ket_qua); ?>"/>
                </td>
            </tr>
            <tr>
                <td colspan="2" class="btn-row">
                    <button type="submit" name="thuc_hien">Thực hiện</button>
                </td>
            </tr>
        </table>
    </form>
</body>
</html>