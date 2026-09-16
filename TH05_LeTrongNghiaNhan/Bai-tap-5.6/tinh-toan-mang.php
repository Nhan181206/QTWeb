<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tính toán mảng</title>
    <link rel="stylesheet" href="../Bai-tap-5.6/tinh-toan-mang.css">
</head>
<body>
    <?php
        $n = "";
        $mang =[];
        $max = "";
        $min = "";
        $tong = "";
        if(isset($_POST['okay'])){
            $n = (int)($_POST['txt'] ?? 0);
            if($n > 0){
                $mang = [];
                for ($i = 0; $i < $n; $i++){
                    $mang[] = rand(0, 20);
                }
                $max = max($mang);
                $min = min($mang);
                $tong = array_sum($mang);
            }
        }
    ?>
    <form action="" method="post">
        <div class="container">
            <div class="header">
                <h1>PHÁT SINH MẢNG VÀ TÍNH TOÁN</h1>
            </div>
            <table class="content">
                <tr>
                    <td><p>Nhập số phần tử:</p></td>
                    <td><input type="text" name="txt" value="<?php echo htmlspecialchars($_POST['txt'] ?? '') ?>"></td>
                </tr>
                <tr>
                    <td></td>
                    <td><button type="submit" class="btn" name="okay">Phát sinh và tính toán</button></td>
                </tr>
                <tr>
                    <td><p>Mảng:</p></td>
                    <td><input type="text" name="mang" disabled="disabled" value="<?php echo htmlspecialchars(implode(', ',$mang))?>"></td>
                </tr>
                <tr>
                    <td><p>GTLN (MAX) trong mảng:</p></td>
                    <td><input type="text" name="max" disabled="disabled" value="<?php echo htmlspecialchars((string)$max) ?>"></td>
                </tr>
                <tr>
                    <td>GTNN (MIN) trong mảng:</td>
                    <td><input type="text" name="min" disabled="disabled" value="<?php echo htmlspecialchars((string)$min) ?>"></td>
                </tr>
                <tr>
                    <td>Tổng mảng:</td>
                    <td><input type="text" disabled="disabled" value="<?php echo htmlspecialchars((string)$tong) ?>"></td>
                </tr>
            </table>
        </div>
    </form>
</body>
</html>