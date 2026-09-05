<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Tính Tiền Điện</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 30px; }
        .box {
            border: 1.5px solid #337ab7;
            padding: 20px 30px;
            width: 450px;
            margin: 0 auto;
        }
        .title {
            color: #1b5e20;
            text-align: center;
            font-size: 22px;
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
        .form-group label { width: 45%; font-size: 15px; }
        .form-group input {
            width: 52%;
            padding: 4px 6px;
            box-sizing: border-box;
            font-size: 14px;
        }
        .btn-center {
            text-align: center;
            margin-top: 15px;
            margin-left: 45%;
        }
        .btn-center input {
            padding: 5px 15px;
            cursor: pointer;
            background-color: #e0e0e0;
            border: 1px solid #adadad;
        }
    </style>
</head>
<body>

<div class="box">
    <div class="title">TÍNH TIỀN ĐIỆN</div>

    <form action="3_9-hoadontiendien.php" method="POST">
        <div class="form-group">
            <label for="hoten">Nhập tên khách hàng</label>
            <input type="text" id="hoten" name="hoten" required>
        </div>

        <div class="form-group">
            <label for="chisodau">Nhập chỉ số đầu tháng</label>
            <input type="number" id="chisodau" name="chisodau" min="0" required>
        </div>

        <div class="form-group">
            <label for="chisocuoi">Nhập chỉ số cuối tháng</label>
            <input type="number" id="chisocuoi" name="chisocuoi" min="0" required>
        </div>

        <div class="btn-center">
            <input type="submit" name="submit" value="Tính tiền điện">
        </div>
    </form>
</div>

</body>
</html>