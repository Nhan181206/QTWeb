<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Tính Giai Thừa</title>
    <style>
        .box {
            width: 380px;
            border: 1px solid #3b7bb8;
            padding: 15px 20px;
            margin: 20px auto;
            font-family: Arial, sans-serif;
        }
        .title {
            color: #00a651;
            text-align: center;
            font-size: 20px;
            font-weight: bold;
            margin-bottom: 20px;
        }
        .form-group {
            display: flex;
            align-items: center;
            margin-bottom: 12px;
        }
        .form-group label {
            width: 140px;
            font-size: 14px;
            color: #333;
        }
        .form-group input {
            flex: 1;
            padding: 3px 6px;
            border: 1px solid #999;
            font-size: 14px;
        }
        .btn-group {
            text-align: center;
            margin: 15px 0;
        }
        .btn-group input[type="submit"] {
            background: linear-gradient(to bottom, #e8f3fe, #b5d5f5);
            border: 1px solid #7096d1;
            padding: 4px 25px;
            color: #000;
            font-size: 13px;
            cursor: pointer;
            border-radius: 3px;
        }
        .btn-group input[type="submit"]:hover {
            background: linear-gradient(to bottom, #d6e8fc, #9cc4ee);
        }
        .error-msg {
            color: red;
            text-align: center;
            font-size: 13px;
            margin-top: 5px;
        }
    </style>
</head>
<body>

<?php
function giaithua($n) {
    $gt = 1;
    for ($i = 1; $i <= $n; $i++) {
        $gt *= $i;
    }
    return $gt;
}

$nInput = "";
$ketQua = "";
$thongBaoLoi = "";

if (isset($_POST['tinh'])) {
    $nInput = $_POST['n'];

    if (is_numeric($nInput)) {
        $n = intval($nInput);

        if ($n > 1) {
            $ketQua = giaithua($n);
        } else {
            $thongBaoLoi = "Vui lòng nhập số nguyên n > 1!";
        }
    } else {
        $thongBaoLoi = "Vui lòng nhập một số nguyên hợp lệ!";
    }
}
?>

<div class="box">
    <div class="title">TÍNH GIAI THỪA</div>
    
    <form method="POST" action="">
        <div class="form-group">
            <label for="n">Nhập n (n > 1):</label>
            <input type="number" id="n" name="n" value="<?php echo htmlspecialchars($nInput); ?>" required min="2">
        </div>

        <div class="btn-group">
            <input type="submit" name="tinh" value="TÍNH">
        </div>

        <div class="form-group">
            <label for="ketQua">Giai thừa (n!):</label>
            <input type="text" id="ketQua" readonly value="<?php echo htmlspecialchars($ketQua); ?>">
        </div>
    </form>

    <?php if ($thongBaoLoi != ""): ?>
        <div class="error-msg"><?php echo $thongBaoLoi; ?></div>
    <?php endif; ?>
</div>

</body>
</html>