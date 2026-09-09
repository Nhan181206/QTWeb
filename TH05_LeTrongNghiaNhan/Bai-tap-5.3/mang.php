<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thao tác mảng</title>
</head>
<body>
    <?php
        $nhap = "";
        $mang = explode(',', $nhap);
        $mang_so = array_map('trim', $mang);
        $hien_thi = implode(' ', $mang_so);
    ?>

    <div>
        <div>
            <div>
                <label>Nhập dãy số</label>
                <input type="text" readonly value=" 
                <?php
                    echo $nhap;
                ?> ">
            </div>
        </div>
    </div>
</body>
</html>