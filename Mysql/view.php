<?php
$username = "user_tintuc"; // Khai báo username
$password = "123456";      // Khai báo password
$server   = "localhost";   // Khai báo server
$dbname   = "tintuc";      // Khai báo database

// Kết nối database tintuc
$connect = mysqli_connect($server, $username, $password, $dbname);

//Nếu kết nối bị lỗi thì xuất báo lỗi và thoát.
if (!$connect) {
    die("Không kết nối :" . mysqli_connect_error());
    exit();
}

//Code xử lý, insert dữ liệu vào table
$sql    = "SELECT * FROM tin_xahoi";
$ket_qua = mysqli_query($connect,$sql);

//Nếu kết quả kết nối không được thì xuất báo lỗi và thoát
if (!$ket_qua) {
    die("Không thể thực hiện câu lệnh SQL: " . mysqli_error($connect));
    exit();
}

//Dùng vòng lặp while truy xuất các phần tử trong table
while ($row = mysqli_fetch_array($ket_qua)) {
    echo "<p>ID: " . $row['id'] . "</p>";
    echo "<p>Tiêu đề: " . $row['title'] . "</p>";
    echo "<p>Ngày: " . $row['date'] . "</p>";
    echo "<p>Mô tả: " . $row['description'] . "</p>";
    echo "<p>Nội dung: " . $row['content'] . "</p>";

    //Truyền tham số id tới trang update.php
    echo "<p><a href='update.php?id=" . $row['id'] . "'>Update</a></p>";
    echo "<hr>";
}

//Đóng kết nối database tintuc
mysqli_close($connect);
?>
