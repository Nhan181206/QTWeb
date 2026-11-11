<!DOCTYPE html>
<html lang="vi">
<head>

    <meta charset="UTF-8">
    <title>Kết Quả Upload File Hình</title>

    <style>

        body { font-family: Arial, sans-serif; text-align: center; margin-top: 30px; }
        .box { width: 600px; margin: 0 auto; border: 2px solid #005500; padding: 20px; }
        h2 { color: #008800; }
        img { max-width: 100%; height: auto; border: 1px solid #ccc; }
        .msg { font-weight: bold; margin-top: 15px; }

    </style>

</head>
<body>

    <div class="box">
        <h2>KẾT QUẢ UPLOAD FILE HÌNH</h2>

        <?php
        
        $thu_muc_luu = "BT9-3Uploads/";
        if (!is_dir($thu_muc_luu)) {
            mkdir($thu_muc_luu, 0777, true);
        }

        if (isset($_POST['btnUpload'])) {
            $file = $_FILES['fileHinh'];
            $ten_file = $file['name'];
            $tmp_name = $file['tmp_name'];
            $dung_luong = $file['size'];
            $loai_file = strtolower(pathinfo($ten_file, PATHINFO_EXTENSION));

            $danh_sach_duoi_hop_le = array('jpg', 'jpeg', 'png', 'gif');

            $thong_bao = "";
            $thanh_cong = false;

            $kiem_tra_anh = getimagesize($tmp_name);

            if ($kiem_tra_anh === false) {
                $thong_bao = "File được chọn không phải là file hình ảnh!";
            } 
   
            elseif (!in_array($loai_file, $danh_sach_duoi_hop_le)) {
                $thong_bao = "Chỉ chấp nhận các định dạng file: JPG, JPEG, PNG, GIF!";
            } 
      
            elseif ($dung_luong > 500 * 1024) {
                $thong_bao = "Kích thước file quá lớn! Dung lượng tối đa là 500KB.";
            } 
            else {
             
                $duong_dan_dich = $thu_muc_luu . basename($ten_file);

                if (file_exists($duong_dan_dich)) {
                
                    $ten_file = time() . "_" . $ten_file;
                    $duong_dan_dich = $thu_muc_luu . $ten_file;
                }

                
                if (move_uploaded_file($tmp_name, $duong_dan_dich)) {
                    $thanh_cong = true;
                    echo "<img src='" . $duong_dan_dich . "' alt='Hình đã upload'><br>";
                } else {
                    $thong_bao = "Có lỗi xảy ra trong quá trình upload file!";
                }
            }

            
            if ($thanh_cong) {
                echo "<div class='msg' style='color: green;'>Upload thành công</div>";
            } else {
                echo "<div class='msg' style='color: red;'>" . $thong_bao . "</div>";
            }
        }
        ?>
    </div>

</body>
</html>