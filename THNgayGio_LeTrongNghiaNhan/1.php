<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tính Khoảng Cách</title>
    <link rel="stylesheet" href="./Style.css">
</head>
<body>
    <?php
        $ngay_hien_tai = '';
        $ngay_sinh_nhat = '';
        $ket_qua = '';

        if(isset($_POST['thuc_hien'])){
            $ngay_hien_tai = $_POST['ngay_hien_tai'];
            $ngay_sinh_nhat = $_POST['ngay_sinh_nhat'];
            $ket_qua = $_POST['ket_qua'];

            if(!empty($ngay_hien_tai) && !empty($ngay_sinh_nhat)){
                $date1 = DateTime::createFromFormat('d/m/Y', trim($ngay_hien_tai));
                $date2 = DateTime::createFromFormat('d/m/Y', trim($ngay_sinh_nhat));

                if($date1 && $date2){
                    $di = $date1->diff($date2);
                    $ket_qua = "Cách nhau " . $di->days . " ngày";
                }else{
                    $ket_qua = "Định dạng này không hợp lệ! (d/m/y)";
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
                <td>Ngày hiện tại: </td>
                <td>
                    <input type="text" name="ngay_hien_tai" value="<?php echo htmlspecialchars($ngay_hien_tai) ?>"/>
                </td>
            </tr>
            <tr>
                <td>Nhập sinh nhật kế: </td>
                <td>
                    <input type="text" name="ngay_sinh_nhat" value="<?php echo htmlspecialchars($ngay_sinh_nhat) ?>"/>
                </td>
            </tr>
            <tr>
                <td>Khoảng cánh: </td>
                <td>
                    <input type="text" name="ket_qua" value="<?php echo htmlspecialchars($ket_qua) ?>"/>
                </td>
            </tr>
            <tr>
                <td colspan="2" class="btn-row">
                    <button type="submit" name="thuc_hien">Thực hiện</button>
                </td>
                <td></td>
            </tr>
        </table>
    </form>
</body>
</html>