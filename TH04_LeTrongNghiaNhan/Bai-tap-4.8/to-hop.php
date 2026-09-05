<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Tính Tổ Hợp C(k, n)</title>
    <style>
        .box {
            width: 380px;
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
            margin-bottom: 5px;
        }
        .subtitle {
            color: red;
            text-align: center;
            font-style: italic;
            margin-bottom: 15px;
            font-weight: bold;
        }
        .form-group {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 10px;
        }
        .form-group label {
            font-weight: bold;
            color: #333;
        }
        .form-group input {
            width: 180px;
            padding: 2px 4px;
            border: 1px solid #777;
        }
        .btn-group {
            text-align: center;
            margin-top: 15px;
        }
        .btn-group input[type="submit"] {
            color: brown;
            background-color: #e0e0e0;
            border: 1px solid #999;
            padding: 3px 20px;
            cursor: pointer;
        }
        .result {
            color: darkblue;
            text-align: center;
            font-size: 16px;
            font-weight: bold;
            margin-top: 15px;
        }
        .error-msg {
            color: red;
            text-align: center;
            font-size: 13px;
            margin-top: 10px;
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

function tohop($k, $n) {
    return giaithua($n) / (giaithua($k) * giaithua($n - $k));
}

$kInput = "";
$nInput = "";
$ketQua = "";
$thongBaoLoi = "";

if (isset($_POST['thuc_hien'])) {
    $kInput = $_POST['k'];
    $nInput = $_POST['n'];

    if (is_numeric($kInput) && is_numeric($nInput)) {
        $k = intval($kInput);
        $n = intval($nInput);

        if ($k >= 1 && $k <= $n) {
            $c_k_n = tohop($k, $n);
            $ketQua = "Tổ hợp C($k, $n) = $c_k_n";
        } else {
            $thongBaoLoi = "Vui lòng nhập k và n thỏa mãn điều kiện (1 <= k <= n)!";
        }
    } else {
        $thongBaoLoi = "Vui lòng nhập các số nguyên hợp lệ!";
    }
}
?>

<div class="box">
    <div class="title">TÍNH TỔ HỢP C<sup>k</sup><sub>n</sub></div>
    <div class="subtitle">(1&lt;=k&lt;=n)</div>
    
    <form method="POST" action="">
        <div class="form-group">
            <label for="k">Nhập k</label>
            <input type="number" id="k" name="k" value="<?php echo htmlspecialchars($kInput); ?>" required min="1">
        </div>
        <div class="form-group">
            <label for="n">Nhập n</label>
            <input type="number" id="n" name="n" value="<?php echo htmlspecialchars($nInput); ?>" required min="1">
        </div>
        
        <div class="btn-group">
            <input type="submit" name="thuc_hien" value="Thực hiện">
        </div>
    </form>

    <?php if ($ketQua != ""): ?>
        <div class="result"><?php echo $ketQua; ?></div>
    <?php endif; ?>

    <?php if ($thongBaoLoi != ""): ?>
        <div class="error-msg"><?php echo $thongBaoLoi; ?></div>
    <?php endif; ?>
</div>

</body>
</html>