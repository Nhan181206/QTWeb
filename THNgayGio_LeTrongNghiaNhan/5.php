<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kiểm Tra Ngày Cuối Tuần</title>
    <link rel="stylesheet" href="./Style.css">
</head>
<body>
    <?php
        $ngay_nhap = '';
        $ket_qua = '';

        if (isset($_POST['thuc_hien'])) {
            $ngay_nhap = $_POST['ngay_nhap'] ?? '';

            if (!empty($ngay_nhap)) {
                $date = DateTime::createFromFormat('d/m/Y', trim($ngay_nhap));

                if ($date) {
                    $day_of_week = $date->format('N');

                    if ($day_of_week == 6 || $day_of_week == 7) {
                        $ket_qua = "Đây là ngày cuối tuần.";
                    } else {
                        $ket_qua = "Đây không phải là ngày cuối tuần.";
                    }
                } else {
                    $ket_qua = "Định dạng không hợp lệ! (d/m/y)";
                }
            }
        }
    ?>

    <form action="" method="post">
        <div class="container">
            <h2>KIỂM TRA NGÀY</h2>
        </div>
        <table>
            <tr>
                <td>Nhập:</td>
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