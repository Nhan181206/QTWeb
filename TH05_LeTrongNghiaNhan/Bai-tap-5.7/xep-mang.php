<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sắp Xếp Mảng</title>
    <link rel="stylesheet" href="../Bai-tap-5.7/xep-mang.css">
</head>
<body>
    <?php
        $mang = [];
        $tang_dan = [];
        $giam_dan = [];
        function hoan_vi(&$a, &$b){
            $temp = $a;
            $a = $b;
            $b = $temp;
        }
        function sap_tang($mang){
            $soLuong = count($mang);
            for ($i = 0; $i < $soLuong - 1; $i++) {
                for ($j = $i + 1; $j < $soLuong; $j++) {
                    if ($mang[$i] > $mang[$j]) {
                        hoan_vi($mang[$i], $mang[$j]);
                    }
                }
            }
            return $mang;
        }
        if(isset($_POST['sap_xep'])){
            $nhap_mang = $_POST['nhap_mang'] ?? '';
            $mang = array_map('trim', explode(',', $nhap_mang));
            $mang = array_values(array_filter($mang, fn($value) => $value !== ''));
            $mang = array_map('intval', $mang);
            $tang_dan = sap_tang($mang);
            $giam_dan = array_reverse($tang_dan);
        }
    ?>

    <form action="xep-mang.php" method="post">
        <div>
            <h2>SẮP XẾP MẢNG</h2>
        </div>

        <table>
            <tr>
                <td>Nhập mảng: </td>
                <td>
                    <input type="text" name="nhap_mang" value="<?php echo htmlspecialchars($nhap_mang) ?>">
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <button type="submit" name="sap_xep" class="btn">Sắp xếp tăng/giảm</button>
                </td>
            </tr>
            <tr>
                <td style="color: red; font-weight: bold;">Sau khi sắp xếp: </td>
                <td></td>
            </tr>
            <tr>
                <td>Tăng dần: </td>
                <td>
                    <input type="text" disabled value="<?php echo htmlspecialchars(implode(', ', $tang_dan)) ?>">
                </td>
            </tr>
            <tr>
                <td>Giảm dần: </td>
                <td>
                    <input type="text" disabled value="<?php echo htmlspecialchars(implode(', ', $giam_dan)) ?>">
                </td>
            </tr>
        </table>
    </form>
</body>
</html>