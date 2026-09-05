<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>SỐ NGUYÊN TỐ</title>
    <style>
        .box {
            width: 400px;
            border: 1px solid #3b7bb8;
            padding: 15px 20px;
            margin: 20px auto;
            font-family: Arial, sans-serif;
        }
        .title {
            color: green;
            text-align: center;
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
        }
        .form-group {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
        }
        .form-group label {
            font-weight: bold;
        }
        .form-group input {
            width: 150px;
            padding: 2px 4px;
        }
        .btn-group {
            text-align: center;
            margin-bottom: 20px;
        }
        .btn-group input {
            color: brown;
            background-color: #e0e0e0;
            border: 1px solid #999;
            padding: 3px 15px;
            margin: 0 5px;
            cursor: pointer;
        }
        .result {
            color: darkblue;
            text-align: center;
            font-size: 18px;
            font-weight: bold;
        }
    </style>
</head>
<body>

<?php
function kt_snt($number) {
    if ($number < 2) {
        return 0;
    }
    for ($i = 2; $i <= sqrt($number); $i++) {
        if ($number % $i == 0) {
            return 0;
        }
    }
    return 1;
}

$n = "";
$ketQua = "";

if (isset($_POST['thuc_hien'])) {
    $n = isset($_POST['n']) ? intval($_POST['n']) : "";
    
    if ($n >= 2) {
        $ds_snt = array();
        for ($i = 2; $i <= $n; $i++) {
            if (kt_snt($i) == 1) {
                $ds_snt[] = $i;
            }
        }
        $ketQua = "Các số nguyên tố <= $n là: " . implode(" ", $ds_snt);
    } else if ($n !== "") {
        $ketQua = "Vui lòng nhập số nguyên N >= 2";
    }
}
?>

<div class="box">
    <div class="title">SỐ NGUYÊN TỐ</div>
    
    <form method="POST" action="">
        <div class="form-group">
            <label for="n">Nhập số nguyên N</label>
            <input type="number" id="n" name="n" value="<?php echo htmlspecialchars($n); ?>" required min="1">
        </div>
        
        <div class="btn-group">
            <input type="submit" name="thuc_hien" value="Thực hiện">
            <input type="button" value="Làm lại" onclick="window.location.href=window.location.pathname;">
        </div>
    </form>

    <?php if ($ketQua != ""): ?>
        <div class="result">
            <?php echo $ketQua; ?>
        </div>
    <?php endif; ?>
</div>

</body>
</html>