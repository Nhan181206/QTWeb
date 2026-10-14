<?php 
    $nhap = '';
    $kq = '';

    if(isset($_POST['thuchien'])){
        $nhap = $_POST['nhap'] ?? '';

        if($nhap !== ''){
            $mang = [];
            $i = 0;

            while(isset($nhap[$i])){
                $char = $nhap[$i];

                if($char !== ' '){
                    $mang[] = $char;
                }
                $i++;
            }

            sort($mang);

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
    <title>Sắp Xếp Ký Tự Tăng Dần</title>
    <link rel="stylesheet" href="./Style.css">
</head>
<body>
    <form action="" method="post">
        <div>
            <h2>SẮP XẾP KÝ TỰ TĂNG DẦN</h2>
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