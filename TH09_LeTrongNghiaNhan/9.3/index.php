<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Upload File Hình</title>
    <link rel="stylesheet" href="./style3.css">
</head>
<body>

    <div class="upload-box">
        <h2>UPLOAD FILE HÌNH</h2>

        <form action="xl-upload.php" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                Chọn file hình cần upload<br>
                <span class="note">(Chỉ chọn *.jpg, *.gif, *.png)</span>
            </div>
            
            <div class="form-group">
                <input type="file" name="filehinh" required>
            </div>

            <div class="form-group">
                <input type="submit" name="submit" value="Upload hình" class="btn-upload">
            </div>
        </form>
    </div>

</body>
</html>