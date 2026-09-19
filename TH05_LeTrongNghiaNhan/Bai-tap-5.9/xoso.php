<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xổ Số</title>
    <link rel="stylesheet" href="../Bai-tap-5.9/xoso.css">
</head>
<body>
    <?php
        $nhap_so = $_POST['nhap_so'] ?? '';
        $day_tang = '';
        $may_sinh = '';
        $ket_qua = '';
        $mang_trung = [];

        function format_so($n){
            return sprintf("%02d", (int)$n);
        }

        if(isset($_POST['do_so'])){
            $nhap_so = trim($_POST['nhap_so']);

            if(!empty($nhap_so)){
                $mang_nhap = array_map('intval', explode('-', $nhap_so));
                sort($mang_nhap);
                $day_tang = implode('-', array_map('format_so', $mang_nhap));

                $mang_may = [];
                for($i = 0; $i < 5; $i++){
                    $mang_may[] = rand(0, 99);
                }

                $may_sinh = implode('-', array_map('format_so', $mang_may));
                $mang_trung = array_intersect($mang_nhap, $mang_may);
                $so_trung = count($mang_trung);

                if($so_trung > 0){
                    $list_trung = implode(', ', array_map('format_so', $mang_trung));
                    $ket_qua = "Bạn trúng $so_trung cặp số ($list_trung)";
                }else{
                    $ket_qua = "Bạn trúng 0 cặp số";
                }
            }
        }
    ?>

    <form action="xoso.php" method="post">
        <div class="title">
            <h2>CHƯƠNG TRÌNH SỔ XỐ BẰNG PHP</h2>
        </div>

        <table>
            <tr>
                <td>Nhập các cặp số</td>
                <td>
                    <input type="text" name="nhap_so" value="<?php echo htmlspecialchars($nhap_so); ?>">
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <button type="submit" name="do_so">Sinh số tự động và dò kết quả</button>
                </td>
            </tr>
            <tr>
                <td>Dãy số bạn đã nhập sau khi xếp tăng</td>
                <td>
                    <div class="result-box">
                        <?php 
                        if (!empty($day_tang)) {
                            $nums = explode('-', $day_tang);
                            foreach ($nums as $index => $num) {
                                $is_match = in_array((int)$num, $mang_trung);
                                $class = $is_match ? 'red-text' : '';
                                echo "<span class='$class'>$num</span>";
                                if ($index < count($nums) - 1) echo '-';
                            }
                        }
                        ?>
                    </div>
                </td>
            </tr>
            <tr>
                <td>Dãy số kết quả do máy sinh ra</td>
                <td>
                    <div class="result-box">
                        <?php 
                        if (!empty($may_sinh)) {
                            $nums = explode('-', $may_sinh);
                            foreach ($nums as $index => $num) {
                                $is_match = in_array((int)$num, $mang_trung);
                                $class = $is_match ? 'red-text' : '';
                                echo "<span class='$class'>$num</span>";
                                if ($index < count($nums) - 1) echo '-';
                            }
                        }
                        ?>
                    </div>
                </td>
            </tr>
            <tr>
                <td>Kết quả dò số</td>
                <td>
                    <div class="result-box">
                        <?php echo htmlspecialchars($ket_qua); ?>
                    </div>
                </td>
            </tr>
        </table>
    </form>
</body>
</html>