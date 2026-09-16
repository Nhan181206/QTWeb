<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Từ Điển Anh Việt</title>
    <link rel="stylesheet" href="../Bai-tap-5.10/tudien.css">
</head>
<body>
    <?php
        $dictionary = [
            'apple' => "trái táo, quả táo",
            'age' => "tuổi\nEx: What is your age? - Bạn bao nhiêu tuổi?",
            'ball' => "trái banh, trái bóng",
            'cat' => "con mèo",
            'hello' => "xin chào, chào bạn",
            'chicken' => "gà, con gà\nEx: I would like a chicken hamburger - Tôi muốn một hamburger gà",
            'crocodile' => "cá sấu",
            'dog' => "con chó\nEx: Bi is my dog - Bi là con chó của tôi\n - Tom has a big dog - Tom có nuôi một con chó to.",
            'egg' => "quả trứng",
            'fish' => "cá",
            'horse' => "con ngựa",
            'knife' => "con dao",
            'live' => "sống, còn sống, trực tiếp\nEx: I live at 23 Võ Thị Sáu Street - Tôi sống tại số 23 đường Võ Thị Sáu\n - There is a live football match on TV - Có một trận đấu bóng đá đang được tường thuật trực tiếp trên TV",
            'melon' => "trái dưa hấu\nEx: My son loves melon, we always have melons on Tet holiday - Con trai tôi thích dưa hấu, chúng tôi luôn ăn dưa hấu vào dịp tết",
            'next' => "Kế tiếp, tiếp tục"
        ];

        $tu_can_tim = '';
        $nghia_tu = '';

        if (isset($_POST['tra_tu'])) {
            $tu_can_tim = trim($_POST['tu_can_tim']);
            $tu_tim_kiem = strtolower($tu_can_tim);

            if (!empty($tu_tim_kiem)) {
                if (array_key_exists($tu_tim_kiem, $dictionary)) {
                    $nghia_tu = $dictionary[$tu_tim_kiem];
                } else {
                    $nghia_tu = "Không tìm thấy từ này trong từ điển!";
                }
            }
        }
    ?>

    <form action="tudien.php" method="post">
        <h2>TỪ ĐIỂN ANH VIỆT</h2>
        <table>
            <tr>
                <td>Nhập từ cần tìm</td>
                <td>
                    <input type="text" name="tu_can_tim" value="<?php echo htmlspecialchars($tu_can_tim); ?>">
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <button type="submit" name="tra_tu">Tra từ</button>
                </td>
            </tr>
            <tr>
                <td style="vertical-align: top;">Nghĩa của từ, ví dụ</td>
                <td>
                    <textarea name="nghia_tu" rows="6" cols="40" readonly><?php echo htmlspecialchars($nghia_tu); ?></textarea>
                </td>
            </tr>
        </table>
    </form>
</body>
</html>