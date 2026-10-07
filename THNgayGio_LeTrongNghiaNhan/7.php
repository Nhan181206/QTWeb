<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xuất ngày đầu, cuối</title>
    <link rel="stylesheet" href="./Style.css">
</head>
<body>
    <?php
       $ngay_nhap = '';
        $ngay_dau = '';
        $ngay_cuoi = '';

        if (isset($_POST['thuc_hien'])) {
            $ngay_nhap = $_POST['ngay_nhap'] ?? '';
            $ngay_dau = $_POST['ngay_dau'] ?? '';
            $ngay_cuoi = $_POST['ngay_cuoi'] ?? '';

            if (!empty($ngay_nhap)) {
                $date = DateTime::createFromFormat('d/m/Y', trim($ngay_nhap));

                if ($date) {
                    $ngay_dau = $date->format('01/m/Y');

                    $ngay_cuoi = $date->format('t/m/Y');
                } else {
                    $ngay_dau = "Ngày không hợp lệ!";
                    $ngay_cuoi = "Ngày không hợp lệ!";
                }
            }
        }
    ?>

    <form action="" method="post">
        <div class="container">
            <h2>XUẤT NGÀY ĐẦU, CUỐI</h2>
        </div>

        <table>
            <tr>
                <td>Nhập ngày: </td>
                <td>
                    <input type="text" name="ngay_nhap" value="<?php echo htmlspecialchars($ngay_nhap) ?>"/>
                </td>
            </tr>
            <tr>
                <td>Ngày đầu: </td>
                <td>
                    <input type="text" name="ngay_dau" value="<?php echo htmlspecialchars($ngay_dau) ?>"/>
                </td>
            </tr>
            <tr>
                <td>Ngày cuối: </td>
                <td>
                    <input type="text" name="ngay_cuoi" value="<?php echo htmlspecialchars($ngay_cuoi) ?>"/>
                </td>
            </tr>
            <tr>
                <td colspan="2" class="btn-row">
                    <button type="submit" name="thuc_hien">Thục hiện</button>
                </td>
                <td></td>
            </tr>
        </table>
    </form>
</body>
</html>