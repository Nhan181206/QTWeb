<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chuyển Tháng Thành Chữ</title>
    <link rel="stylesheet" href="./Style.css">
</head>
<body>
    <?php
        $thang_so = '';
        $thang_chu = '';

        if(isset($_POST['thuc_hien'])){
            $thang_so = $_POST['thang_so'] ?? '';

            if(is_numeric($thang_so)){
                $thang = (int)$thang_so;

                $danh_sach_thang = [
                    1  => 'January',
                    2  => 'February',
                    3  => 'March',
                    4  => 'April',
                    5  => 'May',
                    6  => 'June',
                    7  => 'July',
                    8  => 'August',
                    9  => 'September',
                    10 => 'October',
                    11 => 'November',
                    12 => 'December',
                ];

                if(isset($danh_sach_thang[$thang])){
                    $thang_chu = $danh_sach_thang[$thang];
                }else{
                    $thang_chu = "Tháng không hợp lệ! (1-12)";
                }
            }else if(!empty($thang_so)){
                $thang_chu = "Vui lòng nhập số!";
            }
        }
    ?>

    <form action="" method="post">
        <div class="container">
            <h2>CHUYỂN THÁNG THÀNH CHỮ</h2>
        </div>

        <table>
            <tr>
                <td>Nhập tháng(số): </td>
                <td>
                    <input type="text" name="thang_so" value="<?php echo htmlspecialchars($thang_so) ?>"/>
                </td>
            </tr>
            <tr>
                <td>Tháng(chữ): </td>
                <td>
                    <input type="text" name="thang_chu" value="<?php echo htmlspecialchars($thang_chu) ?>"/>
                </td>
            </tr>
            <tr>
                <td colspan="2" class="btn-row">
                    <button type="submit" name="thuc_hien" >Thực hiện</button>
                </td>
                <td></td>
            </tr>
        </table>
    </form>
</body>
</html>