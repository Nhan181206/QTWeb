<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ho = $_POST["ho"] ?? "";
    $ten = $_POST["ten"] ?? "";
    $email = $_POST["email"] ?? "";

    echo "Chào bạn $ho $ten<br>";
    echo "Email của bạn là: $email<br><br>";
    echo "<b style='color: red;'>Chúc mừng bạn trở thành một thành viên của CLB PHP cơ bản</b>";
} else {
    echo "Vui lòng đăng ký từ trang dangky.php.";
}
?>