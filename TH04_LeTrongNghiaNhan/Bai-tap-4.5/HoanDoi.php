<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Hoán Đổi Giá Trị</title>
    <style>
        .box {
            width: 440px;
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
        .form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 10px 20px;
            margin-bottom: 15px;
        }
        .form-group {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .form-group label {
            font-size: 13px;
            color: #333;
        }
        .form-group input {
            width: 65px;
            padding: 2px 4px;
            text-align: center;
            border: 1px solid #777;
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
    </style>
</head>
<body>

<?php
function hoanDoi(&$a, &$b) {
    $temp = $a;
    $a = $b;
    $b = $temp;
}

$a_banDau = "";
$b_banDau = "";
$a_lucSau = "";
$b_lucSau = "";

if (isset($_POST['tinh'])) {
    $a_banDau = $_POST['a_banDau'];
    $b_banDau = $_POST['b_banDau'];

    if (is_numeric($a_banDau) && is_numeric($b_banDau)) {
        $a_lucSau = $a_banDau;
        $b_lucSau = $b_banDau;

        hoanDoi($a_lucSau, $b_lucSau);
    }
}
?>

<div class="box">
    <div class="title">HOÁN ĐỔI GIÁ TRỊ</div>
    
    <form method="POST" action="">
        <div class="form-grid">
            <div class="form-group">
                <label for="a_banDau">Số A ban đầu</label>
                <input type="number" id="a_banDau" name="a_banDau" value="<?php echo htmlspecialchars($a_banDau); ?>" required>
            </div>

            <div class="form-group">
                <label for="a_lucSau">Số A lúc sau</label>
                <input type="text" id="a_lucSau" readonly value="<?php echo htmlspecialchars($a_lucSau); ?>">
            </div>

            <div class="form-group">
                <label for="b_banDau">Số B ban đầu</label>
                <input type="number" id="b_banDau" name="b_banDau" value="<?php echo htmlspecialchars($b_banDau); ?>" required>
            </div>

            <div class="form-group">
                <label for="b_lucSau">Số B lúc sau</label>
                <input type="text" id="b_lucSau" readonly value="<?php echo htmlspecialchars($b_lucSau); ?>">
            </div>
        </div>
        
        <div class="btn-group">
            <input type="submit" name="tinh" value="TÍNH">
        </div>
    </form>
</div>

</body>
</html>