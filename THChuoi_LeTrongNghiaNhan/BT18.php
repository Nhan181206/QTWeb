<?php 
    $nhap = '';
    $chuoicon = '';
    $vitri = '';
    $kq = '';

    if(isset($_POST['thuchien'])){
        $nhap = $_POST['nhap'] ?? '';
        $chuoicon = $_POST['chuoicon'] ?? '';
        $vitri = $_POST['vitri'] ?? '';

        if($nhap !== '' && $chuoicon !== '' && $vitri !== ''){
            $pos = (int)$vitri;
            $kq = mb_substr($nhap, 0, $pos, 'UTF-8') . $chuoicon . mb_substr($nhap, $pos, null, 'UTF-8');
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
    <title>Chèn Chuỗi Con</title>
    <link rel="stylesheet" href="./Style.css">
</head>
<body>
    <form action="" method="post">
        <div>
            <h2>CHÈN CHUỖI CON</h2>
        </div>
        <table>
            <tr>
                <td>Nhập chuỗi:</td>
                <td>
                    <input type="text" name="nhap" value="<?php echo htmlspecialchars($nhap); ?>">
                </td>
            </tr>
            <tr>
                <td>Nhập chuỗi con:</td>
                <td>
                    <input type="text" name="chuoicon" value="<?php echo htmlspecialchars($chuoicon); ?>">
                </td>
            </tr>
            <tr>
                <td>Vị trí:</td>
                <td>
                    <input type="text" name="vitri" value="<?php echo htmlspecialchars($vitri); ?>">
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