<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông Tin</title>
    <link rel="stylesheet" href="./style1.css">
</head>
<body>
    <?php
        $dir = "docs/";

        $thongtin = file($dir . "thongtin.txt", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        echo "<h3>Thông tin học sinh:</h3>";
        echo "Họ tên: " . ($thongtin[0] ?? '') . "<br>";
        echo "Giới tính: " . ($thongtin[1] ?? '') . "<br>";
        echo "Ngày sinh: " . ($thongtin[2] ?? '') . "<br>";
        echo "Điện thoại: " . ($thongtin[3] ?? '') . "<br>";

        $sothich = file($dir . "sothich.txt", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        echo "<h3>Sở thích:</h3><select>";
        foreach ($sothich as $st) {
            echo "<option value='" . htmlspecialchars($st) . "'>" . htmlspecialchars($st) . "</option>";
        }
        echo "</select>";

        $dulich = file($dir . "dulich.txt", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        echo "<h3>Điểm du lịch:</h3><ul>";
        foreach ($dulich as $dl) {
            echo "<li>" . htmlspecialchars($dl) . "</li>";
        }
        echo "</ul>";
    ?>
</body>
</html>