<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang Quản Lý Dự Án</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f7f6;
            margin: 0;
            padding: 50px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        h1 {
            color: #333;
            margin-bottom: 30px;
        }
        .menu-container {
            display: flex;
            flex-direction: column;
            gap: 15px;
            width: 100%;
            max-width: 400px;
        }
        a {
            text-decoration: none;
            background-color: #ffffff;
            color: #2c3e50;
            padding: 15px 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            font-size: 16px;
            font-weight: bold;
            text-align: center;
            transition: all 0.3s ease;
            border-left: 5px solid #3498db;
        }
        a:hover {
            background-color: #3498db;
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 6px 8px rgba(0,0,0,0.15);
        }
    </style>
</head>
<body>

    <h1>Danh Mục Quản Lý</h1>
    
    <div class="menu-container">
        <a href="Quan_ly_nhan_vien/">Quản lý nhân viên</a>
        <a href="Quan_ly_xe_may/">Quản lý xe máy</a>
        <a href="London2011/">London 2011</a>
    </div>

</body>
</html>