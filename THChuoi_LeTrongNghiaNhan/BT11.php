<?php 
    $nhap = '';
    $vitri = '';
    $dodai = '';
    $kq = '';

    if(isset($_POST['thuchien'])){
        $nhap = $_POST['nhap'] ?? '';
        $vitri = $_POST['vitri'] ?? '';
        $dodai = $_POST['dodai'] ?? '';

        if($nhap !== '' && $vitri !== '' && $dodai !== ''){
            $kq = substr($nhap, $vitri, $dodai);
        } else {
            $kq = "Vui lòng nhập đầy đủ thông tin!";
        }
    }
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lấy Chuỗi Con Từ 1 Chuỗi</title>
    <link rel="stylesheet" href="./Style.css">
</head>
<body>
    <form action="" method="post">
        <div>
            <h2>LẤY CHUỖI CON TỪ 1 CHUỖI</h2>
        </div>
        <table>
            <tr>
                <td>Nhập chuỗi:</td>
                <td>
                    <input type="text" name="nhap" value="<?php echo htmlspecialchars($nhap); ?>">
                </td>
            </tr>
            <tr>
                <td>Vị trí bắt đầu:</td>
                <td>
                    <input type="text" name="vitri" value="<?php echo htmlspecialchars($vitri); ?>">
                </td>
            </tr>
            <tr>
                <td>Độ dài:</td>
                <td>
                    <input type="text" name="dodai" value="<?php echo htmlspecialchars($dodai); ?>">
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