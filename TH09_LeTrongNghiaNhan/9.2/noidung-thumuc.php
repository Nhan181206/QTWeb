<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Nội Dung Thư Mục Docs</title>
    <link rel="stylesheet" href="./style2.css">
</head>
<body>

    <div class="container">
        <?php
        $dir = "docs/";

        if (is_dir($dir)) {
            if ($dh = opendir($dir)) {
                while (($file = readdir($dh)) !== false) {
                    if ($file != "." && $file != "..") {
                        $filepath = $dir . $file;

                        if (is_file($filepath)) {
                            echo "<div class='file-block'>";
                            echo "<div class='file-title'>" . htmlspecialchars($file) . "</div>";

                            $lines = file($filepath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
                            echo "<div class='file-body'>";
                            foreach ($lines as $line) {
                                echo "- " . htmlspecialchars($line) . "<br>";
                            }
                            echo "</div>";
                            echo "</div>";

                            echo "<div class='separator'>************************************************</div>";
                        }
                    }
                }
                closedir($dh);
            }
        } else {
            echo "<p>Thư mục 'docs' không tồn tại!</p>";
        }
        ?>
    </div>

</body>
</html>