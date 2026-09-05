<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Tính Tổng Bằng Vòng Lặp For</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 30px; }
        .box {
            border: 1.5px solid #337ab7;
            padding: 20px;
            width: 350px;
            text-align: center;
            margin: 0 auto;
            background-color: #f9f9f9;
        }
        .title {
            color: #1b5e20;
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 15px;
            text-transform: uppercase;
        }
        .result {
            font-size: 18px;
            color: #d32f2f;
            font-weight: bold;
            margin-top: 10px;
        }
    </style>
</head>
<body>

<div class="box">
    <div class="title">TỔNG CÁC SỐ TỪ 1 ĐẾN 100</div>
    
    <?php
    $tong = 0;

    for ($i = 1; $i <= 100; $i++) {
        $tong += $i;
    }

    echo "<p class='result'>Tổng = " . number_format($tong) . "</p>";
    ?>
</div>

</body>
</html>