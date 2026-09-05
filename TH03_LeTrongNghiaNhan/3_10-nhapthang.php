<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Tính Số Ngày Trong Tháng</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 30px; }
        .box {
            border: 1.5px solid #337ab7;
            padding: 20px 30px;
            width: 400px;
            margin: 0 auto;
        }
        .title {
            color: #1b5e20;
            text-align: center;
            font-size: 20px;
            font-weight: bold;
            margin-bottom: 20px;
            text-transform: uppercase;
        }
        .form-group {
            margin-bottom: 12px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .form-group label { width: 35%; font-size: 15px; }
        .form-group input {
            width: 60%;
            padding: 5px;
            box-sizing: border-box;
            font-size: 14px;
        }
        .btn-center { text-align: center; margin-top: 15px; }
        .btn-center input {
            padding: 6px 20px;
            cursor: pointer;
            background-color: #e0e0e0;
            border: 1px solid #adadad;
        }
    </style>
</head>
<body>

<div class="box">
    <div class="title">TÍNH SỐ NGÀY TRONG THÁNG</div>

    <form action="3_10-insongay.php" method="POST">
        <div class="form-group">
            <label for="thang">Nhập tháng:</label>
            <input type="number" id="thang" name="thang" min="1" max="12" required>
        </div>

        <div class="form-group">
            <label for="nam">Nhập năm:</label>
            <input type="number" id="nam" name="nam" min="1" required>
        </div>

        <div class="btn-center">
            <input type="submit" name="submit" value="Tính số ngày">
        </div>
    </form>
</div>

</body>
</html>