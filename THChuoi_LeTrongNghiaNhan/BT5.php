<?php 
    $nhap1 = '';
    $nhap2 = '';
    $kq = '';
    $kt1 = '';
    $kt2 = '';

    if(isset($_POST['thuchien'])){
        $nhap1 = $_POST['nhap1'] ?? '';
        $nhap2 = $_POST['nhap2'] ?? '';

        $dem1 = 0;
        while(isset($nhap1[$dem1])){
            $dem1++;
        }

        $dem2 = 0;
        while(isset($nhap2[$dem2])){
            $dem2++;
        }

        $kt1 = $dem1;
        $kt2 = $dem2;

        if($dem1 > $dem2){
            $kq = "Chuỗi 1 lớn hơn chuỗi 2.";
        } elseif($dem1 < $dem2){
            $kq = "Chuỗi 1 nhỏ hơn chuỗi 2.";
        } else {
            $kq = "Hai chuỗi bằng nhau.";
        }
    }
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đếm và So Sánh Ký Tự</title>
    <link rel="stylesheet" href="./Style.css">
</head>
<body>
    <form action="" method="post">
        <div>
            <h2>ĐẾM KÝ TỰ</h2>
        </div>
        <table>
            <tr>
                <td>Nhập chuỗi 1:</td>
                <td>
                    <input type="text" name="nhap1" required value="<?php echo htmlspecialchars($nhap1); ?>">
                </td>
            </tr>
            <tr>
                <td>Nhập chuỗi 2:</td>
                <td>
                    <input type="text" name="nhap2" required value="<?php echo htmlspecialchars($nhap2); ?>">
                </td>
            </tr>
            <tr>
                <td>Kết quả so sánh:</td>
                <td>
                    <input type="text" name="kq" readonly value="<?php echo htmlspecialchars($kq); ?>">
                </td>
            </tr>
            <tr>
                <td>Số ký tự chuỗi 1:</td>
                <td>
                    <input type="text" name="kt1" readonly value="<?php echo htmlspecialchars($kt1); ?>">
                </td>
            </tr>
            <tr>
                <td>Số ký tự chuỗi 2:</td>
                <td>
                    <input type="text" name="kt2" readonly value="<?php echo htmlspecialchars($kt2); ?>">
                </td>
            </tr>
            <tr>
                <td colspan="2" class="btn-row">
                    <button name="thuchien" class="btn">Thực hiện</button>
                </td>
            </tr>
        </table>
    </form>
</body>
</html>