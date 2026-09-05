<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Kết Quả Thi Trắc Nghiệm</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 30px; }
        .result-box {
            border: 1.5px solid #000;
            padding: 25px 30px;
            width: 450px;
            margin: 50px auto;
            text-align: center;
        }
        .score-text, .comment-text {
            color: #000080; /* Màu xanh navy đậm */
            font-size: 22px;
            font-weight: bold;
            margin: 15px 0;
        }
        .back-link {
            display: inline-block;
            margin-top: 15px;
            color: #337ab7;
            text-decoration: none;
        }
    </style>
</head>
<body>

<div class="result-box">
    <?php
    // Đáp án đúng: Câu 1 = 6, Câu 2 = 4, Câu 3 = Nam Phi
    $dap_an_c1 = "6";
    $dap_an_c2 = "4";
    $dap_an_c3 = "Nam Phi";

    $diem = 0;

    // Kiểm tra và tính điểm
    if (isset($_POST['c1']) && $_POST['c1'] == $dap_an_c1) {
        $diem++;
    }
    if (isset($_POST['c2']) && $_POST['c2'] == $dap_an_c2) {
        $diem++;
    }
    if (isset($_POST['c3']) && $_POST['c3'] == $dap_an_c3) {
        $diem++;
    }

    // Đánh giá dựa trên số câu làm đúng
    switch ($diem) {
        case 3:
            $danh_gia = "Đúng hết, giỏi quá!";
            break;
        case 2:
            $danh_gia = "Tạm được!";
            break;
        case 1:
            $danh_gia = "Dở quá!";
            break;
        default:
            $danh_gia = "Tệ quá! Trời ơi trời!";
            break;
    }
    ?>

    <div class="score-text">- Tổng điểm của bạn là: <?php echo $diem; ?> điểm</div>
    <div class="comment-text">- <?php echo $danh_gia; ?></div>

    <a href="3_7-tracnghiem.php" class="back-link">Làm lại bài thi</a>
</div>

</body>
</html>