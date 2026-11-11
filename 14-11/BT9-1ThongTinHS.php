<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Bài 9.1 - Đọc File Text</title>
</head>
<body>

<?php
    $duongdan = "BT9_1-2Docs/";

    if (!is_dir($duongdan)) {
        mkdir($duongdan);
        echo "Đã tạo thư mục docs!<br><br>";
    }

    $files = array(
        "ThongTin.txt" => "THÔNG TIN HỌC SINH",
        "SoThich.txt"  => "DANH SÁCH SỞ THÍCH",
        "DuLich.txt"   => "ĐỊA ĐIỂM DU LỊCH"
    );

    foreach ($files as $filename => $title) {
        $filepath = $duongdan . $filename;

        echo "<h3>" . $title . " (" . $filename . ")</h3>";

        if (file_exists($filepath)) {
         
            $noidung = file($filepath);

            echo "<ul>";
            foreach ($noidung as $dong) {
                echo "<li>" . htmlspecialchars($dong) . "</li>";
            }
            echo "</ul>";
        } else {
            echo "<p style='color:red;'>Khó tìm thấy file: " . $filename . "</p>";
        }
        echo "<hr>";
    }
?>

</body>
</html>