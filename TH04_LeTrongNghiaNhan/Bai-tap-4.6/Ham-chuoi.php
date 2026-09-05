<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Tách Họ Tên</title>
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
            width: 100px;
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
function ten($chuoi) {
    $chuoi = trim($chuoi);
    $arr = explode(" ", $chuoi);
    return end($arr);
}

function ho($chuoi) {
    $chuoi = trim($chuoi);
    $arr = explode(" ", $chuoi);
    array_pop($arr);
    return implode(" ", $arr);
}

$hoTen = "";
$hoVaTenLot = "";
$ten = "";
$thongBaoLoi = "";

if (isset($_POST['tinh'])) {
    $hoTen = isset($_POST['hoTen']) ? trim($_POST['hoTen']) : "";

    $hoTenChuanHoa = preg_replace('/\s+/', ' ', $hoTen);
    $arrTu = explode(" ", $hoTenChuanHoa);

    if (count($arrTu) >= 2) {
        $hoVaTenLot = ho($hoTenChuanHoa);
        $ten = ten($hoTenChuanHoa);
    } else {
        $thongBaoLoi = "Vui lòng nhập họ tên đầy đủ (ít nhất 2 từ trở lên)!";
    }
}
?>

<div class="box">
    <div class="title">TÁCH HỌ TÊN</div>
    
    <form method="POST" action="">
        <div class="form-group">
            <label for="hoTen">Họ tên</label>
            <input type="text" id="hoTen" name="hoTen" value="<?php echo htmlspecialchars($hoTen); ?>" required>
        </div>

        <div class="btn-group">
            <input type="submit" name="tinh" value="TÍNH">
        </div>

        <div class="form-group">
            <label for="hoVaTenLot">Họ và tên lót</label>
            <input type="text" id="hoVaTenLot" readonly value="<?php echo htmlspecialchars($hoVaTenLot); ?>">
        </div>

        <div class="form-group">
            <label for="ten">Tên</label>
            <input type="text" id="ten" readonly value="<?php echo htmlspecialchars($ten); ?>">
        </div>
    </form>

    <?php if ($thongBaoLoi != ""): ?>
        <div class="error-msg"><?php echo $thongBaoLoi; ?></div>
    <?php endif; ?>
</div>

</body>
</html>