<?php
// Thiết lập múi giờ Việt Nam
date_default_timezone_set('Asia/Ho_Chi_Minh');

// Lấy số thứ tự của ngày trong tuần: 1 (Thứ 2) đến 7 (Chủ Nhật)
$day_of_week = date('N');

// Lấy ngày, tháng, năm
$ngay = date('d');
$thang = date('m');
$nam = date('Y');

// Chuyển đổi số thứ tự ngày sang tiếng Việt bằng cấu trúc switch...case
switch ($day_of_week) {
    case 1:
        $thu = "thứ hai";
        break;
    case 2:
        $thu = "thứ ba";
        break;
    case 3:
        $thu = "thứ tư";
        break;
    case 4:
        $thu = "thứ năm";
        break;
    case 5:
        $thu = "thứ sáu";
        break;
    case 6:
        $thu = "thứ bảy";
        break;
    case 7:
        $thu = "Chủ nhật";
        break;
    default:
        $thu = "";
        break;
}

// In ra màn hình theo đúng định dạng
echo "Hôm nay là " . $thu . ", ngày " . $ngay . " tháng " . $thang . " năm " . $nam;
?>