<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>In Các Số Chẵn Từ 0 Đến 100</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 30px; }
        .box {
            border: 1.5px solid #337ab7;
            padding: 20px;
            width: 450px;
            margin: 0 auto;
            background-color: #f9f9f9;
        }
        .title {
            color: #1b5e20;
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 15px;
            text-align: center;
            text-transform: uppercase;
        }
        .result {
            font-size: 15px;
            line-height: 1.8;
            color: #333;
            text-align: justify;
            word-break: break-word;
        }
    </style>
</head>
<body>

<div class="box">
    <div class="title">CÁC SỐ CHẴN TỪ 0 ĐẾN 100</div>
    <div class="result">
        <?php
        for ($i = 0; $i <= 100; $i += 2) {
            echo $i . ($i < 100 ? ", " : "");
        }
        ?>
    </div>
</div>

</body>
</html>