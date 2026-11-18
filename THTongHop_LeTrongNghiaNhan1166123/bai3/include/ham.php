<?php
// Nếu chưa có bình chọn hoặc có 1 bình chọn thì từ rating không có s ở cuối từ
function tuRating($soluot){
    if ($soluot <= 1) {
        return "rating";
    }
    return "ratings";
}
?>
