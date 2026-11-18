<?php
// Hàm upload hình theo cách trong giáo trình (bài 9)
// Trả về chuỗi rỗng nếu upload thành công (tên file lưu trong $tenfile), ngược lại trả về thông báo lỗi
function uploadHinh($tenobj, &$tenfile){
    $target_dir = "images/";
    $target_file = $target_dir . basename($_FILES[$tenobj]["name"]);
    $uploadOk = 1;
    $loi = "";
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Kiểm tra file ảnh là ảnh thật hay ảnh giả
    $check = getimagesize($_FILES[$tenobj]["tmp_name"]);
    if ($check === false) {
        $loi = "File không phải là hình ảnh.";
        $uploadOk = 0;
    }
    // Kiểm tra file đã tồn tại hay chưa
    if ($uploadOk == 1 && file_exists($target_file)) {
        $loi = "File hình đã tồn tại.";
        $uploadOk = 0;
    }
    // Kiểm tra kích thước file
    if ($uploadOk == 1 && $_FILES[$tenobj]["size"] > 500*1024) {
        $loi = "File hình quá lớn (tối đa 500KB).";
        $uploadOk = 0;
    }
    // Chỉ cho phép một số định dạng
    if ($uploadOk == 1 && $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
        $loi = "Chỉ cho phép file JPG, JPEG, PNG và GIF.";
        $uploadOk = 0;
    }
    if ($uploadOk == 1) {
        if (move_uploaded_file($_FILES[$tenobj]["tmp_name"], $target_file)) {
            $tenfile = basename($_FILES[$tenobj]["name"]);
        } else {
            $loi = "Có lỗi khi upload file.";
        }
    }
    return $loi;
}
?>
