<?php 
    $nhap = '';
    $kq = '';

    if(isset($_POST['thuchien'])){
        $nhap = $_POST['nhap'] ?? '';

        if($nhap !== ''){
            $mang = [];
            $i = 0;

            while(isset($nhap[$i])){
                $mang[] = $nhap[$i];
                $i++;
            }

            $mang_dao_nguoc = array_reverse($mang);

            $kq = implode(', ', $mang_dao_nguoc);
        } else {
            $kq = "Vui lòng nhập chuỗi!";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chia Chuỗi Thành Các Ký Tự Đảo Ngược</title>
    <link rel="stylesheet" href="./Style.css">
</head>
<body>
    <form action="" method="post">
        <div>
            <h2>CHIA CHUỖI THÀNH CÁC KÝ TỰ ĐẢO NGƯỢC</h2>
        </div>
        <table>
            <tr>
                <td>Nhập chuỗi: </td>
                <td>
                    <input type="text" name="nhap" value="<?php echo htmlspecialchars($nhap) ?>">
                </td>
            </tr>
            <tr>
                <td>Các ký tự riêng lẻ:</td>
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