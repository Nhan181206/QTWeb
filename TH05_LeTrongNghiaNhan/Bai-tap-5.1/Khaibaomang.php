<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mảng số nguyên</title>
    <style>
        body {
            text-align: center;
            margin-top: 50px;
        }
    </style>
</head>
<body>
    <h2>Mảng số nguyên</h2>

    <?php
	$mang = array(3,6,9,10,15);
	$n = count($mang);
	echo 'Các số trong mảng là: ';
	for($i=0; $i<$n; $i++){
		echo $mang[$i]. ' ';
	}
?>

</body>
</html>