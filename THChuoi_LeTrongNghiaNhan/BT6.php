<?php 
    $nhap = '';
    $chu1 = '';
    $chu2 = '';
    $kytu = '';

    if(isset($_POST['thuchien'])){
        $nhap = $_POST['nhap'] ?? '';

        $chucai = 0;
        $chuso = 0;
        $dacbiet = 0;
        $i = 0;

        while(isset($nhap[$i])){
            $char = $nhap[$i];

            if(preg_match('/^[a-zA-ZÀ-ỹ]$/u', $char)){
                $chucai++;
            } 
            elseif(is_numeric($char)){
                $chuso++;
            } 
            elseif($char !== ' ') {
                $dacbiet++;
            }
            $i++;
        }

        $chu1 = $chucai;
        $chu2 = $chuso;
        $kytu = $dacbiet;
    }
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đếm Số Ký Tự Trong Chuỗi</title>
    <link rel="stylesheet" href="./Style.css">
</head>
<body>
    <form action="" method="post" class="form-dem-chi-tiet">
        <div>
            <h2>ĐẾM SỐ KÝ TỰ TRONG CHUỖI</h2>
        </div>
        <table>
            <tr>
                <td>Nhập chuỗi:</td>
                <td>
                    <input type="text" name="nhap" value="<?php echo htmlspecialchars($nhap); ?>">
                </td>
            </tr>
            <tr>
                <td>Số chữ cái:</td>
                <td>
                    <input type="text" name="chu1" readonly value="<?php echo htmlspecialchars($chu1); ?>">
                </td>
            </tr>
            <tr>
                <td>Số chữ số:</td>
                <td>
                    <input type="text" name="chu2" readonly value="<?php echo htmlspecialchars($chu2); ?>">
                </td>
            </tr>
            <tr>
                <td>Số ký tự đặc biệt:</td>
                <td>
                    <input type="text" name="kytu" readonly value="<?php echo htmlspecialchars($kytu); ?>">
                </td>
            </tr>
            <tr>
                <td colspan="2" class="btn-row">
                    <button name="thuchien" class="btn">Đếm</button>
                </td>
            </tr>
        </table>
    </form>
</body>
</html>