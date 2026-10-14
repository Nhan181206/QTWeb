<?php 
    $nhap = '';
    $kq = '';

    if(isset($_POST['thuchien'])){
        $nhap = $_POST['nhap'] ?? '';

        if($nhap !== ''){
            $demmang = [];
            $i = 0;

            while(isset($nhap[$i])){
                $char = $nhap[$i];

                if($char !== ' '){
                    if(isset($demmang[$char])){
                        $demmang[$char]++;
                    } else {
                        $demmang[$char] = 1;
                    }
                }
                $i++;
            }

            if(!empty($dem_mang)){
                $maxchar = '';
                $maxcount = -1;

                foreach($demmang as $char => $count){
                    if($count > $maxcount){
                        $maxcount = $count;
                        $maxchar = $char;
                    }
                }

                $kq = "Ký tự " . $maxchar . " xuất hiện nhiều nhất.";
            } else {
                $kq = "Chuỗi chỉ chứa khoảng trắng!";
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
    <title>Tìm Ký Tự Xuất Hiện Nhiều Nhất</title>
    <link rel="stylesheet" href="./Style.css">
</head>
<body>
    <form action="" method="post">
        <div>
            <h2>TÌM KÝ TỰ XUẤT HIỆN NHIỀU NHẤT</h2>
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