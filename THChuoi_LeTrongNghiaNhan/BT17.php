<?php 
    $nhap = '';
    $chuoicon = '';
    $kq = '';

    if(isset($_POST['thuchien'])){
        $nhap = $_POST['nhap'] ?? '';
        $chuoicon = $_POST['chuoicon'] ?? '';

        if($nhap !== '' && $chuoicon !== ''){
            $solan = substr_count($nhap, $chuoicon);

            $kq = "Chuỗi con xuất hiện " . $solan . " lần";
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
    <title>Đếm Chuỗi Con</title>
    <link rel="stylesheet" href="./Style.css">
</head>
<body>
    <form action="" method="post">
        <div>
            <h2>ĐẾM CHUỖI CON</h2>
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