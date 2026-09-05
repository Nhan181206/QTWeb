<?php
$so_ngau_nhien = rand(1, 20);

if ($so_ngau_nhien <= 10) {
    $ket_qua = "Đúng (Số nhỏ hơn hoặc bằng 10)";
} else {
    $ket_qua = "Sai (Số lớn hơn 10)";
}

echo "Số ngẫu nhiên được tạo: " . $so_ngau_nhien . "<br>";
echo "Thông báo kiểm tra (<= 10): " . $ket_qua;
?>