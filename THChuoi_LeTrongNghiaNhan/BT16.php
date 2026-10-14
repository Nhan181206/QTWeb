<?php 
    $nhap = '';
    $kq = '';

    if(isset($_POST['thuchien'])){
        $nhap = $_POST['nhap'] ?? '';

        if($nhap !== ''){
            $char = mb_substr($nhap, 0, 1, 'UTF-8');

            if(preg_match('/^[a-zA-ZÀ-ỹ]$/u', $char)){
                if(mb_strtoupper($char, 'UTF-8') === $char && mb_strtolower($char, 'UTF-8') !== $char){
                    $kq = "Ký tự '" . $char . "' là chữ hoa.";
                } elseif(mb_strtolower($char, 'UTF-8') === $char && mb_strtoupper($char, 'UTF-8') !== $char){
                    $kq = "Ký tự '" . $char . "' là chữ thường.";
                } else {
                    $kq = "Ký tự '" . $char . "' là chữ cái.";
                }
            } else {
                $kq = "Ký tự '" . $char . "' không phải là chữ cái.";
            }
        } else {
            $kq = "Vui lòng nhập một ký tự!";
        }
    }
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kiểm Tra Chữ Hoa - Chữ Thường</title>
    <link rel="stylesheet" href="./Style.css">
</head>
<body>
    <form action="" method="post" class="form-kiem-tra-hoa-thuong">
        <div>
            <h2>KIỂM TRA CHỮ HOA - CHỮ THƯỜNG</h2>
        </div>
        <table>
            <tr>
                <td>Nhập một ký tự:</td>
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
                    <button name="thuchien" class="btn">Kiểm tra</button>
                </td>
            </tr>
        </table>
    </form>
</body>
</html>