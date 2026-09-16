<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tổng các số lẻ có trong mảng</title>
    <link rel="stylesheet" href="../Bai-tap-5.4/mang-tongle.css">
</head>
<body>
    <?php
    $kq = '';
    if (isset($_POST['okay'])){
        $dayso = $_POST['txt'] ?? '';
        $mang = explode(',',$dayso);

        foreach($mang as $mot_phan_tu){
            if ($mot_phan_tu % 2 != 0){
                $kq = $kq . ' ' .$mot_phan_tu;
            }
        }
    }
    ?>
    <form action="" method="post">
        <div class="container">
            <div class="header">
                <h1>Tổng các số lẻ trong mảng</h1>
            </div>

            <table class="content">
                <tr>
                    <td>Nhập dãy số</td>
                    <td><input type="text" name="txt" value="<?php echo $_POST['txt'] ?? ''; ?>"></td>
                </tr>
                <tr>
                    <td></td>
                    <td><button type="submit" name="okay" class="btn">Thực hiện</button></td>
                </tr>
                <tr>
                    <td>Tổng các số lẻ trong mảng là:</td>
                    <td><input type="text" disabled="disabled" value="<?php echo $kq?>"></td>
                </tr>
            </table>
        </div>
    </form>
</body>
</html>