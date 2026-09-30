<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ngày Hôm Qua</title>
    <link rel="stylesheet" href="Style.css">
</head>
<body>
    <?php
        $ngay_hien_tai = '';
        $ngay_hom_qua = '';

        if (isset($_POST['thuc_hien'])) {
            $ngay_hien_tai = $_POST['ngay_hien_tai'] ?? '';

            if (!empty($ngay_hien_tai)) {
                $date = DateTime::createFromFormat('d/m/Y', trim($ngay_hien_tai));

                if ($date) {
                    $date->modify('-1 day');
                    $ngay_hom_qua = $date->format('d/m/Y');
                } else {
                    $ngay_hom_qua = "Định dạng không hợp lệ! (d/m/Y)";
                }
            }
        }
    ?>

    <form action="4.php" method="post">
        <div class="container">
            <h2>NGÀY HÔM QUA</h2>
        </div>
        <table>
            <tr>
                <td>Ngày hiện tại:</td>
                <td>
                    <input type="text" name="ngay_hien_tai" value="<?php echo htmlspecialchars($ngay_hien_tai); ?>"/>
                </td>
            </tr>
            <tr>
                <td>Ngày hôm qua:</td>
                <td>
                    <input type="text" name="ngay_hom_qua" value="<?php echo htmlspecialchars($ngay_hom_qua); ?>"/>
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