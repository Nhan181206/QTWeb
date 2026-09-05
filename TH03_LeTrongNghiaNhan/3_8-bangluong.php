<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Tính Tiền Lương</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 30px; }
        .box {
            border: 1.5px solid #337ab7;
            padding: 20px 30px;
            width: 420px;
            margin: 0 auto 30px auto;
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
            margin-bottom: 10px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .form-group label { width: 40%; font-size: 15px; }
        .form-group input, .form-group select {
            width: 58%;
            padding: 4px 6px;
            box-sizing: border-box;
            font-size: 14px;
        }
        .form-group input[readonly] {
            background-color: #eee;
            border: 1px solid #ccc;
        }
        .btn-center {
            text-align: center;
            margin-top: 15px;
            margin-left: 40%;
        }
        .btn-center input {
            padding: 4px 15px;
            cursor: pointer;
            background-color: #e0e0e0;
            border: 1px solid #adadad;
        }
    </style>
</head>
<body>

<!-- FORM NHẬP THÔNG TIN -->
<div class="box">
    <div class="title">TÍNH TIỀN LƯƠNG</div>

    <form action="3_8-ketqualuong.php" method="POST">
        <div class="form-group">
            <label for="hoten">Nhập họ tên</label>
            <input type="text" id="hoten" name="hoten" required value="<?php echo isset($_POST['hoten']) ? htmlspecialchars($_POST['hoten']) : ''; ?>">
        </div>

        <div class="form-group">
            <label for="ngaycong">Nhập số ngày công</label>
            <input type="number" id="ngaycong" name="ngaycong" min="1" max="31" required value="<?php echo isset($_POST['ngaycong']) ? $_POST['ngaycong'] : ''; ?>">
        </div>

        <div class="form-group">
            <label for="chucvu">Chọn chức vụ</label>
            <select id="chucvu" name="chucvu">
                <option value="Giám đốc" <?php if(isset($_POST['chucvu']) && $_POST['chucvu']=='Giám đốc') echo 'selected'; ?>>Giám đốc</option>
                <option value="Phó giám đốc" <?php if(isset($_POST['chucvu']) && $_POST['chucvu']=='Phó giám đốc') echo 'selected'; ?>>Phó giám đốc</option>
                <option value="Trưởng phòng" <?php if(isset($_POST['chucvu']) && $_POST['chucvu']=='Trưởng phòng') echo 'selected'; ?>>Trưởng phòng</option>
                <option value="Phó phòng" <?php if(isset($_POST['chucvu']) && $_POST['chucvu']=='Phó phòng') echo 'selected'; ?>>Phó phòng</option>
                <option value="Nhân viên" <?php if(isset($_POST['chucvu']) && $_POST['chucvu']=='Nhân viên') echo 'selected'; ?>>Nhân viên</option>
            </select>
        </div>

        <div class="btn-center">
            <input type="submit" name="submit" value="Tính">
        </div>
    </form>
</div>
</body>
</html>