<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Upload File Hình</title>

    <style>

        body { font-family: Arial, sans-serif; text-align: center; margin-top: 50px; }
        .box { width: 500px; margin: 0 auto; border: 2px solid #005500; padding: 20px; }
        h2 { color: #008800; }
        .note { font-style: italic; color: red; }

    </style>

</head>

<body>

    <div class="box">
        <h2>UPLOAD FILE HÌNH</h2>

        <form action="BT9-3XL_UpLoad.php" method="POST" enctype="multipart/form-data">

            <p>
                Chọn file hình cần upload<br>
                <span class="note">(Chỉ chọn *.jpg, *.gif, *.png)</span>
            </p>

            <p>
                <input type="file" name="fileHinh" required>
            </p>

            <p>
                <input type="submit" name="btnUpload" value="Upload hình">
            </p>
            
        </form>

    </div>

</body>
</html>