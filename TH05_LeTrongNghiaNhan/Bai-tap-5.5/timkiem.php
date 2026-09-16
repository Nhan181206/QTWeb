<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tìm Kiếm</title>
    <link rel="stylesheet" href="../Bai-tap-5.5/timkiem.css">
</head>
<body>
    <?php
        $nhap_mang = '';
        $so_can_tim = '';
        $mang_str = '';
        $ket_qua = '';

        if(isset($_POST['tim_kiem'])){
            $nhap_mang = $_POST['nhap_mang'] ?? '';
            $so_can_tim = $_POST['so_can_tim'] ?? '';

            if($nhap_mang !== '' && $so_can_tim !== ''){
                $mang = array_map('trim', explode(',', $nhap_mang));
                $mang_str =implode(', ', $mang);
                $vi_tri = array_search(trim($so_can_tim), $mang);

                if($vi_tri !== false){
                    $hienthi = $vi_tri + 1;
                    $ket_qua = "Tìm thấy $so_can_tim tại vị trí thứ $hienthi của mảng";
                }else{
                    $ket_qua = "Không tìm thấy $so_can_tim trong mảng";
                }
            }
        }
    ?>

    <form action="timkiem.php" method="post">
        <div class="container">
            <h2>Tìm Kiếm</h2>
        </div>
        <table>
            <tr>
                <td>Nhập mảng: </td>
                <td> 
                    <input type="text" name="nhap_mang" value="<?php echo htmlspecialchars($nhap_mang) ?>" >
                </td>
            </tr>
            <tr>
                <td>Nhập số cần tìm: </td>
                <td>
                    <input type="text" name="so_can_tim" value="<?php echo htmlspecialchars($so_can_tim) ?>" >
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <button type="submit" name="tim_kiem" class="btn">Tìm kiếm</button>
                </td>
            </tr>
            <tr>
                <td>Mảng: </td>
                <td>
                    <input type="text" disabled value="<?php echo htmlspecialchars($mang_str) ?>" >
                </td>
            </tr>
            <tr>
                <td>Kết quả tìm kiếm: </td>
                <td>
                    <input type="text" disabled value="<?php echo htmlspecialchars($ket_qua) ?>">
                </td>
            </tr>
        </table>
    </form>
</body>
</html>