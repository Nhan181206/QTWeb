<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>So sánh hai ngày</title>
    <link rel="stylesheet" href="./Style.css">
</head>
<body>
    <?php
        $ngay_1 = '';
        $ngay_2 = '';
        $ket_qua = '';

        if (isset($_POST['thuc_hien'])) {
            $ngay_1 = $_POST['ngay_1'] ?? '';
            $ngay_2 = $_POST['ngay_2'] ?? '';
            $ket_qua =$_POST['ket_qua'] ?? '';

            if (!empty($ngay_1) && !empty($ngay_2)) {
                $date1 = DateTime::createFromFormat('d/m/Y', trim($ngay_1));
                $date2 = DateTime::createFromFormat('d/m/Y', trim($ngay_2));

                if ($date1 && $date2) {
                    if ($date1 == $date2) {
                        $ket_qua = "2 thời gian = nhau";
                    } elseif ($date1 < $date2) {
                        $ket_qua = "Ngày thứ nhất < Ngày thứ hai";
                    } else {
                        $ket_qua = "Ngày thứ nhất > Ngày thứ hai";
                    }
                } else {
                    $ket_qua = "Định dạng không hợp lệ! (d/m/y)";
                }
            }
        }
    ?>

    <form action="" method="post">
        <div class="container">
            <h2>SO SÁNH 2 NGÀY</h2>
        </div>
        <table>
            <tr>
                <td>Nhập ngày thứ nhất:</td>
                <td>
                    <input type="text" name="ngay_1" value="<?php echo htmlspecialchars($ngay_1); ?>"/>
                </td>
            </tr>
            <tr>
                <td>Nhập ngày thứ hai:</td>
                <td>
                    <input type="text" name="ngay_2" value="<?php echo htmlspecialchars($ngay_2); ?>"/>
                </td>
            </tr>
            <tr>
                <td>Kiểm tra:</td>
                <td>
                    <input type="text" name="ket_qua" class="ket-qua-do" value="<?php echo htmlspecialchars($ket_qua); ?>"/>
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