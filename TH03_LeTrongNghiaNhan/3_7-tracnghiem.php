<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Thi Trắc Nghiệm</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 30px; }
        .main-box {
            border: 1.5px solid #000;
            padding: 20px 40px;
            width: 550px;
            margin: 0 auto;
        }
        .title {
            color: #1b5e20;
            text-align: center;
            font-size: 20px;
            font-weight: bold;
            margin-bottom: 25px;
            text-transform: uppercase;
        }
        .question-item {
            margin-bottom: 20px;
        }
        .q-title {
            display: flex;
            margin-bottom: 8px;
        }
        .q-label {
            width: 70px;
            font-weight: normal;
        }
        .q-text {
            flex: 1;
        }
        .answers {
            margin-left: 70px;
        }
        .answers label {
            display: block;
            margin-bottom: 4px;
            font-weight: normal;
            cursor: pointer;
        }
        .btn-group {
            text-align: center;
            margin-top: 25px;
            margin-left: 70px;
        }
        .btn-group input {
            padding: 4px 12px;
            margin: 0 5px;
            cursor: pointer;
            background-color: #e0e0e0;
            border: 1px solid #adadad;
        }
    </style>
</head>
<body>

<div class="main-box">
    <div class="title">CHƯƠNG TRÌNH THI TRẮC NGHIỆM</div>

    <form action="3_7-ketqua.php" method="POST">
        <!-- Câu 1 -->
        <div class="question-item">
            <div class="q-title">
                <span class="q-label">Câu 1:</span>
                <span class="q-text">Thế giới có mấy châu lục?</span>
            </div>
            <div class="answers">
                <label><input type="radio" name="c1" value="3"> 3 châu</label>
                <label><input type="radio" name="c1" value="4"> 4 châu</label>
                <label><input type="radio" name="c1" value="5"> 5 châu</label>
                <label><input type="radio" name="c1" value="6"> 6 châu</label>
            </div>
        </div>

        <!-- Câu 2 -->
        <div class="question-item">
            <div class="q-title">
                <span class="q-label">Câu 2:</span>
                <span class="q-text">Con lừa có mấy chân ?</span>
            </div>
            <div class="answers">
                <label><input type="radio" name="c2" value="2"> 2 chân</label>
                <label><input type="radio" name="c2" value="4"> 4 chân</label>
                <label><input type="radio" name="c2" value="5"> 5 chân</label>
                <label><input type="radio" name="c2" value="6"> 6 chân</label>
            </div>
        </div>

        <!-- Câu 3 -->
        <div class="question-item">
            <div class="q-title">
                <span class="q-label">Câu 3:</span>
                <span class="q-text">Worldcup 2010 sẽ diễn ra ở đâu? ?</span>
            </div>
            <div class="answers">
                <label><input type="radio" name="c3" value="Đức"> Đức</label>
                <label><input type="radio" name="c3" value="Nam Phi"> Nam Phi</label>
                <label><input type="radio" name="c3" value="Anh"> Anh</label>
                <label><input type="radio" name="c3" value="Bờ biển ngà"> Bờ biển ngà</label>
            </div>
        </div>

        <!-- Nút bấm -->
        <div class="btn-group">
            <input type="submit" value="Chấm điểm">
            <input type="reset" value="Làm lại">
        </div>
    </form>
</div>

</body>
</html>