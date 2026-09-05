<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Tính Tổng 2 Số</title>
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
        }
        .form-group {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 10px;
        }
        .form-group label {
            font-weight: bold;
        }
        .form-group input {
            width: 180px;
            padding: 2px 4px;
        }
        .btn-group {
            text-align: center;
            margin-top: 15px;
        }
        .btn-group button {
            color: brown;
            background-color: #e0e0e0;
            border: 1px solid #999;
            padding: 3px 15px;
            margin: 0 5px;
            cursor: pointer;
        }
    </style>
</head>
<body>

<div class="box">
    <div class="title">TÍNH TỔNG 2 SỐ</div>
    <div class="subtitle">Viết và dùng hàm tong(a,b)</div>
    
    <form id="sumForm">
        <div class="form-group">
            <label for="numA">Nhập số nguyên A</label>
            <input type="number" id="numA" required>
        </div>
        <div class="form-group">
            <label for="numB">Nhập số nguyên B</label>
            <input type="number" id="numB" required>
        </div>
        
        <div class="btn-group">
            <button type="button" onclick="xuLyTinhTong()">Thực hiện</button>
            <button type="reset">Làm lại</button>
        </div>
    </form>
</div>

<script>
    function tong(a, b) {
        let result = a + b;
        alert("Tổng của hai số " + a + " và " + b + " là: " + result);
    }

    function xuLyTinhTong() {
        let a = parseInt(document.getElementById("numA").value);
        let b = parseInt(document.getElementById("numB").value);

        if (isNaN(a) || isNaN(b)) {
            alert("Vui lòng nhập đầy đủ 2 số nguyên!");
            return;
        }

        tong(a, b);
    }
</script>

</body>
</html>