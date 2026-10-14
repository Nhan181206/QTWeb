<?php 
    $nhap = '';
    $kieu = 'Thường';
    $kq = '';

    if(isset($_POST['thuchien'])){
        $nhap = $_POST['nhap'] ?? '';
        $kieu = $_POST['kieu'] ?? '';

        if($nhap !== ''){
            if($kieu === 'Thường'){
                $kq = mb_strtolower($nhap, 'UTF-8');
            } elseif($kieu === 'Hoa'){
                $kq = mb_strtoupper($nhap, 'UTF-8');
            } else {
                $kq = $nhap;
            }
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
    <title>Chuyển Chữ Hoa Thường</title>
    <link rel="stylesheet" href="./Style.css">
</head>
<body>
    <form action="" method="post">
        <div>
            <h2>CHUYỂN CHỮ HOA -&gt; THƯỜNG VÀ NGƯỢC LẠI</h2>
        </div>
        <table>
            <tr>
                <td>Nhập chuỗi:</td>
                <td>
                    <input type="text" name="nhap" value="<?php echo htmlspecialchars($nhap); ?>">
                </td>
            </tr>
            <tr>
                <td>Kiểu chuyển đổi:</td>
                <td>
                    <select name="kieu" style="width: 100%; padding: 4px 8px; font-size: 16px; font-family: inherit; border: 1px solid #707070; background-color: #ffffff; outline: none;">
                        <option value="Thường" <?php if($kieu == 'Thường') echo 'selected'; ?>>Thường</option>
                        <option value="Hoa" <?php if($kieu == 'Hoa') echo 'selected'; ?>>Hoa</option>
                    </select>
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