<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Ước Số Chung Lớn Nhất</title>
    <style>
        .box {
            width: 350px;
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
            justify-content: space-between;
            align-items: center;
            margin-bottom: 12px;
        }
        .form-group label {
            color: #333;
            font-size: 14px;
        }
        .form-group input {
            width: 160px;
            padding: 2px 4px;
            border: 1px solid #999;
        }
        .btn-group {
            text-align: center;
            margin-top: 15px;
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
        .result {
            margin-top: 15px;
            text-align: center;
            font-weight: bold;
            color: #d9534f;
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

$a = "";
$b = "";
$ketQua = "";

if (isset($_POST['tinh'])) {
    $a = $_POST['a'];
    $b = $_POST['b'];

    if (is_numeric($a) && is_numeric($b)) {
        $valA = intval($a);
        $valB = intval($b);

        if ($valA == 0 && $valB == 0) {
            $ketQua = "Không có ước số chung lớn nhất cho (0, 0)";
        } else {
            $uscln = usc($valA, $valB);
            $ketQua = "Ước số chung lớn nhất của $valA và $valB là: $uscln";
        }
    } else {
        $ketQua = "Vui lòng nhập đầy đủ hai số nguyên!";
    }
}
?>

<div class="box">
    <div class="title">ƯỚC SỐ CHUNG LỚN NHẤT</div>
    
    <form method="POST" action="">
        <div class="form-group">
            <label for="a">Số nguyên A</label>
            <input type="number" id="a" name="a" value="<?php echo htmlspecialchars($a); ?>" required>
        </div>
        <div class="form-group">
            <label for="b">Số nguyên B</label>
            <input type="number" id="b" name="b" value="<?php echo htmlspecialchars($b); ?>" required>
        </div>
        
        <div class="btn-group">
            <input type="submit" name="tinh" value="TÍNH">
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