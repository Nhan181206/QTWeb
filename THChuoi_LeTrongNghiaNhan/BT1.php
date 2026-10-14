<?php 
    $nhap = '';
    $kq = '';

    if(isset($_POST['thuchien'])){
        $nhap = $_POST['nhap'] ?? '';

        if($nhap !== ''){
            $dem = 0;
            while(isset($nhap[$dem])){
                $dem++;
            }
            $kq = "Độ dài chuổi của bạn là: " . $dem;
        } else {
            $kq = "Vui lòng nhập chuổi!";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tìm độ dài chuổi</title>
    <link rel="stylesheet" href="./Style.css">
</head>
<body>
    <form action="" method="post">
        <div class="container">
            <h2>ĐỘ DÀI CHUỔI</h2>
        </div>
        <table>
            <tr>
                <td>Nhập chuổi: </td>
                <td>
                    <input type="text" name="nhap" value="<?php echo htmlspecialchars($nhap) ?>">
                </td>
            </tr>
            <tr>
                <td>Độ dài chuổi: </td>
                <td>
                    <input type="text" name="kp" readonly value="<?php echo htmlspecialchars($kq) ?>">
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