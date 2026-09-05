<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Rút Gọn Phân Số</title>
    <style>
        .box {
            width: 420px;
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
        .form-content {
            display: flex;
            align-items: center;
            justify-content: space-around;
            margin-bottom: 20px;
        }
        .fraction-input, .fraction-result {
            display: inline-block;
            vertical-align: middle;
            text-align: center;
        }
        .fraction-input input, .fraction-result input {
            width: 70px;
            text-align: center;
            padding: 2px 4px;
            font-size: 14px;
            border: 1px solid #777;
        }
        .fraction-line {
            border-bottom: 2px solid #333;
            margin: 4px 0;
            width: 78px;
        }
        .label-text {
            font-size: 14px;
            color: #333;
        }
        .btn-group {
            text-align: center;
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
            margin-top: 10px;
            font-size: 13px;
        }
    </style>
</head>
<body>

<?php
function usc($a, $b) {
    $a = abs($a);
    $b = abs($b);
    while ($b != 0) {
        $temp = $b;
        $b = $a % $b;
        $a = $temp;
    }
    return $a;
}

function rutGonPhanSo($tu, $mau) {
    $ucln = usc($tu, $mau);
    
    $tuRutGon = $tu / $ucln;
    $mauRutGon = $mau / $ucln;

    if ($mauRutGon < 0) {
        $tuRutGon = -$tuRutGon;
        $mauRutGon = -$mauRutGon;
    }

    return array(
        'tu' => $tuRutGon,
        'mau' => $mauRutGon
    );
}

$tuInput = "";
$mauInput = "";
$tuRutGon = "";
$mauRutGon = "";
$thongBaoLoi = "";

if (isset($_POST['tinh'])) {
    $tuInput = $_POST['tu'];
    $mauInput = $_POST['mau'];

    if (is_numeric($tuInput) && is_numeric($mauInput)) {
        $tu = intval($tuInput);
        $mau = intval($mauInput);

        if ($mau == 0) {
            $thongBaoLoi = "Mẫu số phải khác 0!";
        } else {
            if ($tu == 0) {
                $tuRutGon = 0;
                $mauRutGon = $mau;
            } else {
                $ketQua = rutGonPhanSo($tu, $mau);
                $tuRutGon = $ketQua['tu'];
                $mauRutGon = $ketQua['mau'];
            }
        }
    } else {
        $thongBaoLoi = "Vui lòng nhập đầy đủ tử số và mẫu số!";
    }
}
?>

<div class="box">
    <div class="title">RÚT GỌN PHÂN SỐ</div>
    
    <form method="POST" action="">
        <div class="form-content">
            <span class="label-text">Phân số</span>

            <div class="fraction-input">
                <input type="number" name="tu" value="<?php echo htmlspecialchars($tuInput); ?>" required><br>
                <div class="fraction-line"></div>
                <input type="number" name="mau" value="<?php echo htmlspecialchars($mauInput); ?>" required>
            </div>

            <span class="label-text">Kết quả rút gọn</span>

            <div class="fraction-result">
                <input type="text" readonly value="<?php echo htmlspecialchars($tuRutGon); ?>"><br>
                <div class="fraction-line"></div>
                <input type="text" readonly value="<?php echo htmlspecialchars($mauRutGon); ?>">
            </div>
        </div>
        
        <div class="btn-group">
            <input type="submit" name="tinh" value="TÍNH">
        </div>
    </form>

    <?php if ($thongBaoLoi != ""): ?>
        <div class="error-msg"><?php echo $thongBaoLoi; ?></div>
    <?php endif; ?>
</div>

</body>
</html>