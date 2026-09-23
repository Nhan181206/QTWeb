<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Bai-tap-5.7/xep-mang.css">
    <title>Xếp mảng</title>
</head>
<body>
    <?php
        $mang = [];
        $tangdan = [];
        $giamdan = [];
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
        if(isset($_POST['okay'])){
            $txt = $_POST['txt'] ?? '';
            $mang = array_map('trim', explode(',', $txt));
            $mang = array_values(array_filter($mang, fn($value) => $value !== ''));
            $mang = array_map('intval', $mang);
            $tangdan = sap_tang($mang);
            $giamdan = array_reverse($tangdan);
        }
    ?>
    <form action="xep-mang.php" method="post">
        <div class="container">
            <div class="header">
                <h1>SẮP XẾP MẢNG</h1>
            </div>
            <table>
                <tr>
                    <td><p>Nhập mảng</p></td>
                    <td><input type="text" name="txt" value="<?php echo htmlspecialchars($_POST['txt'] ?? '') ?>"></td>
                </tr>
                <tr>
                    <td></td>
                    <td><button type="submit" class="btn" name="okay">Sắp xếp tăng/giảm</button></td>
                </tr>
                <tr>
                    <td><p style="font-size: large; font-weight: bold; color: red;">Sau khi sắp xếp</p></td>
                    <td></td>
                </tr>
                <tr>
                    <td><p>Tăng dần:</p></td>
                    <td><input type="text" disabled="disabled" value="<?php echo htmlspecialchars(implode(', ', $tangdan)) ?>"></td>
                </tr>
                <tr>
                    <td><p>Giảm dần:</p></td>
                    <td><input type="text" disabled="disabled" value="<?php echo htmlspecialchars(implode(', ', $giamdan)) ?>"></td>
                </tr>
            </table>
        </div>
    </form>
</body>
</html>