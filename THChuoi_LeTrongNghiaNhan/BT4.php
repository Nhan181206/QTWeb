<?php 
    $nhap = '';
    $kq = '';

    if(isset($_POST['thuchien'])){
        $nhap = $_POST['nhap'] ?? '';

        if(trim($nhap) !== ''){
            $chuoitrim = trim($nhap);
            $mang_tu = preg_split('/\s+/', $chuoitrim);
            $so_tu = count($mang_tu);

            $kq = "Số từ có trong chuỗi là: " . $so_tu;
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
    <title>Đếm Số Từ Trong Chuỗi</title>
    <link rel="stylesheet" href="./Style.css">
</head>
<body>
    <form action="" method="post">
        <div>
            <h2>ĐẾM SỐ TỪ CÓ TRONG MỘT CHUỖI</h2>
        </div>
        <table>
            <tr>
                <td>Nhập chuỗi: </td>
                <td>
                    <input type="text" name="nhap" value="<?php echo htmlspecialchars($nhap) ?>">
                </td>
            </tr>
            <tr>
                <td>Số từ có trong từng chuỗi là: </td>
                <td>
                    <input type="text" name="kq" readonly value="<?php echo htmlspecialchars($kq) ?>">
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <button name="thuchien" class="btn">Thực hiện</button>
                </td>
            </tr>
        </table>
    </form>
</body>
</html>