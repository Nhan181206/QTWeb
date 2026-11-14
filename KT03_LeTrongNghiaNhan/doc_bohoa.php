<?php
    $danhsach = [];

    if (file_exists("bo_hoaxuan.txt")) {
        $dongdulieu = file("bo_hoaxuan.txt", FILE_IGNORE_NEW_LINES);
        foreach ($dongdulieu as $dong) {
            $thongtin = explode("|", $dong);

            if (count($thongtin) == 3) {
                $danhsach[] = $thongtin;
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Danh sách bó hoa</title>
    <link rel="stylesheet" href="./style_doc.css">
</head>
<body>
    <div class="khung">
        <div class="container">
            <a href="them_bohoa.php">Thêm bó hoa mới!</a>
        </div>

        <h3>HOA ĐẸP BỐN MÙA</h3>

        <table>
            <?php
                foreach ($danhsach as $i => $hoa) {
                    if ($i % 3 == 0) {
                        echo "<tr>";
                    }

                    $tenhoa = htmlspecialchars($hoa[0]);
                    $giaban = (float)$hoa[1];
                    $tenanh = basename($hoa[2]);
                    $duongdan = "uploads/" . rawurlencode($tenanh);

                    echo "<td>";
                    echo "<b>" . $tenhoa . "</b><br>";
                    echo "<div class='gia'>Giá bán: " . number_format($giaban) . " VNĐ</div>";
                    echo "<br>";

                    if (file_exists("uploads/" . $tenanh)) {
                        echo "<img src='" . htmlspecialchars($duongdan) . "'>";
                    } else {
                        echo "Không tìm thấy ảnh";
                    }
                    echo "</td>";
                    if ($i % 3 == 2) {
                        echo "</tr>";
                    }
                }
                    if (count($danhsach) % 3 != 0) {
                        echo "</tr>";
                    }
            ?>
        </table>
    </div>
</body>
</html>
