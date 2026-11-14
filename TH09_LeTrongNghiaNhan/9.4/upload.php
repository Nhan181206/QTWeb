<?php
$target_dir = "uploads/";
if (!is_dir($target_dir)) {
    mkdir($target_dir, 0777, true);
}

$soluong = isset($_REQUEST['soluong']) ? (int)$_REQUEST['soluong'] : 0;
$uploaded_files = [];
$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['action']) && $_POST['action'] == 'do_upload') {
    if (isset($_FILES['hinh'])) {
        $files = $_FILES['hinh'];
        $count = count($files['name']);

        for ($i = 0; $i < $count; $i++) {
            if ($files['error'][$i] == 0) {
                $filename = basename($files['name'][$i]);
                $target_file = $target_dir . time() . "_" . $filename;
                
                if (move_uploaded_file($files['tmp_name'][$i], $target_file)) {
                    $uploaded_files[] = $target_file;
                }
            }
        }
        $message = "Upload thành công " . count($uploaded_files) . " file!";
    }
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Upload Nhiều File Hình</title>
    <link rel="stylesheet" href="./style4.css">
</head>
<body>

    <div class="upload-box">
        <form action="" method="GET">
            <div class="form-group">
                Chọn số hình cần upload 
                <input type="number" name="soluong" value="<?php echo $soluong > 0 ? $soluong : ''; ?>" min="1" max="100" required>
                <input type="submit" value="Tiếp tục" class="btn">
            </div>
        </form>

        <hr>

        <?php if ($soluong > 0): ?>
            <form action="" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="action" value="do_upload">
                <input type="hidden" name="soluong" value="<?php echo $soluong; ?>">

                <div class="form-group">
                    <b>Bạn đang chọn upload tối đa <?php echo $soluong; ?> file</b>
                </div>

                <?php for ($i = 0; $i < $soluong; $i++): ?>
                    <div class="file-row">
                        <input type="file" name="hinh[]" required>
                    </div>
                <?php endfor; ?>

                <div class="form-group" style="margin-top: 15px;">
                    <input type="submit" value="Upload" class="btn">
                </div>
            </form>
        <?php endif; ?>

        <?php if (!empty($message)): ?>
            <div class="success-msg"><?php echo $message; ?></div>
            <div class="uploaded-img-list">
                <?php foreach ($uploaded_files as $img): ?>
                    <img src="<?php echo $img; ?>" alt="Uploaded Image">
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>

</body>
</html>