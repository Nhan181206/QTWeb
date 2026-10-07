<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tính Khoảng Cách Giữa Hai Ngày Bất Kì</title>
    <link rel="stylesheet" href="./Style.css">
</head>
<body>
    <?php
        $nagy_bat_dau = '';
        $ngay_ket_thuc = '';
        $ket_qua = '';

        if(isset($_POST['thuc_hien'])){
            $nagy_bat_dau = $_POST['ngay_bat_dau'] ?? '';
            $ngay_ket_thuc = $_POST['ngay_ket_thuc'] ?? '';
            $ket_qua = $_POST['ket_qua'] ?? '';

            if(!empty($nagy_bat_dau) && !empty($ngay_ket_thuc)){
                $date1 = DateTime::createFromFormat('d/m/Y', trim($nagy_bat_dau));
                $date2 = DateTime::createFromFormat('d/m/Y', trim($ngay_ket_thuc));

                if($date1 && $date2){
                    $tinh = $date1 -> diff($date2);

                    $nam = $tinh -> y;
                    $thang = $tinh -> m;
                    $ngay = $tinh -> d;

                    $ket_qua = "Cách nhau {$nam} năm {$thang} tháng {$ngay} ngày";
                }else{
                    $ket_qua = "Định dạng không hợp lệ! (d/m/y)";
                }
            }
        }
    ?>

    <form action="" method="post">
        <div class="container">
            <h2>TÍNH KHOẢNG CÁCH</h2>
        </div>

        <table>
            <tr>
                <td>Nhập ngày bắt đầu: </td>
                <td>
                    <input type="text" name="ngay_bat_dau" value="<?php echo htmlspecialchars($nagy_bat_dau) ?>"/>
                </td>
            </tr>
            <tr>
                <td>Nhập ngày kết thúc: </td>
                <td>
                    <input type="text" name="ngay_ket_thuc" value="<?php echo htmlspecialchars($ngay_ket_thuc) ?>"/>
                </td>
            </tr>
            <tr>
                <td>Khoảng cách: </td>
                <td>
                    <input type="text" name="ket_qua" value="<?php echo htmlspecialchars($ket_qua) ?>"/>
                </td>
            </tr>
            <tr>
                <td></td>
                <td colspan="3">
                    <button type="submit" name="thuc_hien" >Thực hiện</button>
                </td>
                <td></td>
            </tr>
        </table>
    </form>
</body>
</html>