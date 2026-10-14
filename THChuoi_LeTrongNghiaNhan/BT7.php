<?php 
    $nhap = '';
    $kq = '';

    if(isset($_POST['thuchien'])){
        $nhap = $_POST['nhap'] ?? '';

        if(trim($nhap) !== ''){
            $nguyen_am = 0;
            $phu_am = 0;

            $vowels = [
                'a', 'e', 'i', 'o', 'u', 'y', 
                'à', 'á', 'ả', 'ã', 'ạ', 'ă', 'ằ', 'ắ', 'ẳ', 'ẵ', 'ặ', 'â', 'ầ', 'ấ', 'ẩ', 'ẫ', 'ậ',
                'è', 'é', 'ẻ', 'ẽ', 'ẹ', 'ê', 'ề', 'ế', 'ể', 'ễ', 'ệ',
                'ì', 'í', 'ỉ', 'ĩ', 'ị',
                'ò', 'ó', 'ỏ', 'õ', 'ọ', 'ô', 'ồ', 'ố', 'ổ', 'ỗ', 'ộ', 'ơ', 'ờ', 'ớ', 'ở', 'ỡ', 'ợ',
                'ù', 'ú', 'ủ', 'ũ', 'ụ', 'ư', 'ừ', 'ứ', 'ử', 'ữ', 'ự',
                'ỳ', 'ý', 'ỷ', 'ỹ', 'ỵ',
                'A', 'E', 'I', 'O', 'U', 'Y',
                'À', 'Á', 'Ả', 'Ã', 'Ạ', 'Ă', 'Ằ', 'Ắ', 'Ẳ', 'Ẵ', 'Ặ', 'Â', 'Ầ', 'Ấ', 'Ẩ', 'Ẫ', 'Ậ',
                'È', 'É', 'Ẻ', 'Ẽ', 'Ẹ', 'Ê', 'Ề', 'Ế', 'Ể', 'Ễ', 'Ệ',
                'Ì', 'Í', 'Ỉ', 'Ĩ', 'Ị',
                'Ò', 'Ó', 'Ỏ', 'Õ', 'Ọ', 'Ô', 'Ồ', 'Ố', 'Ổ', 'Ỗ', 'Ộ', 'Ơ', 'Ờ', 'Ớ', 'Ở', 'Ỡ', 'Ợ',
                'Ù', 'Ú', 'Ủ', 'Ũ', 'Ụ', 'Ư', 'Ừ', 'Ứ', 'Ử', 'Ữ', 'Ự',
                'Ý', 'Ỳ', 'Ỷ', 'Ỹ', 'Ỵ'
            ];

            $length = mb_strlen($nhap, 'UTF-8'); 

            for ($i = 0; $i < $length; $i++) {

                $char = mb_substr($nhap, $i, 1, 'UTF-8'); 

                if (preg_match('/^[a-zA-ZÀ-ỹđĐ]$/u', $char)) {
                    if (in_array($char, $vowels)) {
                        $nguyen_am++;
                    } else {
                        $phu_am++;
                    }
                }
            }

            $kq = "Có " . $nguyen_am . " nguyên âm và " . $phu_am . " phụ âm";
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
    <title>Đếm Nguyên Âm, Phụ Âm</title>
    <link rel="stylesheet" href="./Style.css">
</head>
<body>
    <form action="" method="post">
        <div>
            <h2>ĐẾM NGUYÊN ÂM, PHỤ ÂM</h2>
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