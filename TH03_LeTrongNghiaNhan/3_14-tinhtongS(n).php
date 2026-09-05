<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Tính Tổng S(n)</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 30px; }
        .box {
            border: 1.5px solid #337ab7;
            padding: 20px 30px;
            width: 420px;
            margin: 0 auto;
            background-color: #f9f9f9;
        }
        .title {
            color: #1b5e20;
            font-size: 17px;
            font-weight: bold;
            margin-bottom: 20px;
            text-align: center;
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
    <div class="title">TÍNH TỔNG S(n) = x*2 + x*4 + ... + x*2n</div>

    <form action="3_14-ketqua.php" method="POST">
        <div class="form-group">
            <label for="x">Nhập x:</label>
            <input type="number" step="any" id="x" name="x" required>
        </div>

        <div class="form-group">
            <label for="n">Nhập n:</label>
            <input type="number" id="n" name="n" min="1" required>
        </div>

        <div class="btn-center">
            <input type="submit" name="submit" value="Tính tổng">
        </div>
    </form>
</div>

</body>
</html>