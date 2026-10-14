<?php 
    $nhap = '';
    $kq = '';

    if(isset($_POST['thuchien'])){
        $nhap = $_POST['nhap'] ?? '';

        if($nhap !== ''){
            $mang = array_map('trim', explode(',', $nhap));

            sort($mang, SORT_STRING | SORT_FLAG_CASE);

            $kq = implode(', ', $mang);
        } else {
            $kq = "Vui lòng nhập chuỗi!";
        }
    }
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sắp Xếp Các Chuỗi</title>
    <link rel="stylesheet" href="./Style.css">
</head>
<body>
    <form action="" method="post">
        <div>
            <h2>SẮP XẾP CÁC CHUỖI</h2>
        </div>
        <table>
            <tr>
                <td>Nhập chuỗi:</td>
                <td>
                    <input type="text" name="nhap" value="<?php echo htmlspecialchars($nhap); ?>">
                </td>
            </tr>
            <tr>
                <td>Kết quả:</td>
                <td>
                    <input type="text" name="kq" readonly value="<?php echo htmlspecialchars($kq); ?>">
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