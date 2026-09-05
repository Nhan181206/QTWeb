<html>
    <style>
        .box {
            width: 500px;
            margin: 30px auto;
            padding: 20px;
            border: 2px solid #4a90e2;
            font-family: "Times New Roman";
        }
        h1 {
            text-align: center;
            color: green;
        }
        input {
            margin: 8px;
        }
        .result {
            color: blue;
            text-align: center;
        }
    </style>
</head>

<body>
<div class="box">
    <h1>TÍNH TỔNG 2 SỐ</h1>

    <form method="post">
        Nhập số nguyên A:
        <input type="number" name="a" required><br>

        Nhập số nguyên B:
        <input type="number" name="b" required><br>

        <center>
            <input type="submit" name="tinh" value="Thực hiện">
            <input type="reset" value="Làm lại">
        </center>
    </form>

    <?php
    if (isset($_POST["tinh"])) {
        $a = $_POST["a"];
        $b = $_POST["b"];
        echo "<p class='result'>Tổng = " . ($a + $b) . "</p>";
    }
    ?>
</div>
</body>
</html>