<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mảng tên người</title>
    <style>
       body {
            text-align: center;
            margin-top: 50px;
        }
    </style>
</head>
<body>

    <h2>Danh sách tên 5 người trong mảng:</h2>

    <?php
	$mang = array('An', 'Bình', 'Dương', 'Đạt', 'Hùng');
	$n = count($mang);
	echo 'Các tên có trong mảng là: ';
	for($i=0; $i<$n; $i++){
		$stt = $i+1;
		echo '<br /> '.$stt.'. '.$mang[$i];
}
?>


</body>
</html>