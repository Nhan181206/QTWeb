<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Bài 9.2 - Nội Dung Thư Mục</title>
</head>
<body>

<?php
    
    $duongdan = "BT9_1-2Docs/";

    if (is_dir($duongdan)) {
        
        $files = scandir($duongdan);

        foreach ($files as $file) {
            
            if ($file != "." && $file != "..") {
                $filepath = $duongdan . $file;

                if (is_file($filepath)) {
                    
                    echo "<b>" . $file . "</b><br>";

                    $noidung = file($filepath);
                  
                    foreach ($noidung as $dong) {
                        echo "- " . trim($dong) . "<br>";
                    }
                    echo "****************************************<br><br>";
                }
            }
        }
    } else {
        echo "Thư mục không tồn tại!";
    }
?>

</body>
</html>