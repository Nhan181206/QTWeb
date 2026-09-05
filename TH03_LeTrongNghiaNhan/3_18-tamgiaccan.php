<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>In Tam Giác Cân</title>
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
            font-size: 18px;
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
        .form-group label { width: 45%; font-size: 15px; }
        .form-group input, .form-group select {
            width: 52%;
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
    <div class="title">IN TAM GIÁC CÂN</div>

    <form action="3_18-ketqua.php" method="POST">
        <div class="form-group">
            <label for="h">Nhập chiều cao (h):</label>
            <input type="number" id="h" name="h" min="1" required>
        </div>

        <div class="form-group">
            <label for="loai">Kiểu in:</label>
            <select id="loai" name="loai">
                <option value="dac">In đặc</option>
                <option value="rong">In rỗng (chỉ lấy viền)</option>
            </select>
        </div>

        <div class="btn-center">
            <input type="submit" name="submit" value="In tam giác">
        </div>
    </form>
</div>

</body>
</html>