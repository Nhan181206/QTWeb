<?php
    $thongbao = "";
    $tenhoa = "";
    $giaban = "";

    if (isset($_POST['them'])) {
        $tenhoa = trim($_POST['tenhoa'] ?? "");
        $giaban = trim($_POST['giaban'] ?? "");

        if ($tenhoa == "" || $giaban == "" || !is_numeric($giaban) || $giaban < 0) {
            $thongbao = "Vui lòng nhập thông tin hợp lệ!";
        }
        elseif (!isset($_FILES['hinhanh']) || $_FILES['hinhanh']['error'] != 0) {
            $thongbao = "Bạn chưa chọn hình ảnh!";
        }
        else {
            $duoi = strtolower(pathinfo($_FILES['hinhanh']['name'], PATHINFO_EXTENSION));
            $duoihople = ['jpg', 'jpeg', 'png', 'gif'];

            if (!in_array($duoi, $duoihople)) {
                $thongbao = "Chỉ được chọn ảnh JPG, PNG hoặc GIF!";
            }
            else {
                $thu_muc = "uploads/";

                if (!is_dir($thu_muc)) {
                    mkdir($thu_muc, 0777, true);
                }
                $tenfile = uniqid() . "." . $duoi;
                $duongdan = $thu_muc . $tenfile;

                if (move_uploaded_file(
                    $_FILES['hinhanh']['tmp_name'],
                    $duongdan
                )) {
                    $dong = $tenhoa . "|" . $giaban . "|" . $tenfile . PHP_EOL;
                    file_put_contents(
                        "bo_hoaxuan.txt",
                        $dong,
                        FILE_APPEND | LOCK_EX
                    );
                    $thongbao = "Đã ghi file thành công!";
                } else {
                    $thongbao = "Không thể tải ảnh lên!";
                }
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Thêm bó hoa mới</title>
    <link rel="stylesheet" href="./style_them.css">
</head>
<body>
    <div class="khung">
        <h1>THÊM BÓ HOA MỚI</h1>

        <form method="POST" enctype="multipart/form-data">
            <table>
                <tr>
                <td>Tên bó hoa: </td>
                <td>
                    <input type="text" name="tenhoa" value="<?php echo htmlspecialchars($tenhoa); ?>"/>
                </td>
            </tr>
            <tr>
                <td>Giá bán: </td>
                <td>
                    <input type="number" name="giaban" value="<?php echo htmlspecialchars($giaban); ?>"/>
                </td>
            </tr>
            <tr>
                <td>Hình bó hoa: </td>
                <td>
                    <input type="file" name="hinhanh" accept="image/*"/>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <button type="submit" name="them">Thêm bó hoa</button>
                </td>
            </tr>
            </table>
        </form>

        <div class="ketqua">
            
        <?php
            if ($thongbao != "") {
                echo "<b>" . htmlspecialchars($thongbao) . "</b><br>";
            }
            if ($thongbao == "Đã ghi file thành công!") {
                echo "Kết quả:<br>";
                echo "<img src='" . htmlspecialchars($duongdan) . "'><br>";
                echo "Tên bó hoa: <b>" . htmlspecialchars($tenhoa) . "</b><br>";
                echo "Giá bán: <b>" . number_format((float)$giaban) . " VNĐ</b><br>";
            }
        ?>
            <br>
            <a href="doc_bohoa.php">Xem các bó hoa</a>
        </div>
    </div>
</body>
</html>
