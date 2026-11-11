<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Kết Quả Upload File Hình</title>
    <link rel="stylesheet" href="./style3.css">
</head>
<body>

    <div class="upload-box">
        <h2>KẾT QUẢ UPLOAD FILE HÌNH</h2>

        <?php
        $target_dir = "uploads/";
        if (!is_dir($target_dir)) {
            mkdir($target_dir, 0777, true);
        }

        if (isset($_FILES['filehinh'])) {
            $file = $_FILES['filehinh'];
            $filename = basename($file['name']);
            $target_file = $target_dir . $filename;
            $fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
            $fileSize = $file['size'];

            $uploadOk = 1;
            $error_message = "";

            $allowed_types = ['jpg', 'jpeg', 'png', 'gif'];
            if (!in_array($fileType, $allowed_types)) {
                $error_message = "Lỗi: Chỉ cho phép các định dạng JPG, JPEG, PNG, GIF!";
                $uploadOk = 0;
            }

            if ($fileSize > 500 * 1024) {
                $error_message = "Lỗi: Kích thước file không được vượt quá 500KB!";
                $uploadOk = 0;
            }

            if (file_exists($target_file)) {
                $filename = time() . "_" . $filename;
                $target_file = $target_dir . $filename;
            }

            if ($uploadOk == 1) {
                if (move_uploaded_file($file['tmp_name'], $target_file)) {
                    echo "<img src='" . $target_file . "' alt='Hình ảnh' class='uploaded-img'>";
                    echo "<div class='success-msg'>Upload thành công</div>";
                } else {
                    echo "<div class='error-msg'>Lỗi trong quá trình lưu file!</div>";
                }
            } else {
                echo "<div class='error-msg'>" . $error_message . "</div>";
            }
        } else {
            echo "<div class='error-msg'>Không có file nào được tải lên!</div>";
        }
        ?>

        <br>
        <a href="index.php" class="back-link">Quay lại trang upload</a>
    </div>

</body>
</html>