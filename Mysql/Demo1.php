<?php
    $name = "user_tintuc";
    $pass = "123456";
    $server = "localhost";
    $dbname = "tintuc";
    $connect = new mysqli($server, $name, $pass, $dbname);

    // Báo lỗi nếu không kết nối được
    if ($connect -> connect_error) {
        die("Không thể kết nối: " . $connect -> connect_error);
        exit();
    }

    // Câu lệnh truy vấn để đọc và thêm dữ liệu từ database local
    $sqlSelect = "SELECT * FROM tin_xahoi";

    // $sqlInsert = "INSERT INTO tin_xahoi (title, date, description, content)
    //              VALUES ('Tin hot', '2016-10-24', 'Đây là mô tả cho tin hot', 'Nội dung chi tiết của tin hot')";

    // $sqlDelete = "DELETE FROM tin_xahoi WHERE id = 11";

    $sqlUpdate = "UPDATE tin_xahoi SET title = 'Học có trễ đâu', content = 'Đây là nội dung của bài viết Học có trễ đâu' WHERE id = 1";

    // Select
    $result = $connect -> query($sqlSelect);
    if ($result === false) {
        die("Lỗi truy vấn danh sách: " . $connect -> error);
    }

    if($result -> num_rows > 0) {
        while ($row = $result -> fetch_assoc()) {
            echo "ID: " .$row["id"] . "<br>" . " - Title: " . $row["title"] . "<br>" . " - Date: " . $row["date"] . "<br>" . " - Description: " . $row["description"] . "<br>" . "<br>";
        }
    } else {
        echo "Không có dữ liệu" . "<br>";
    }

    // Insert
    // if($connect -> query($sqlInsert) === true) {
    //     echo "Thêm dữ liệu thành công<br>";
    // } else {
    //     echo "Error: " . $sqlInsert . $connect -> error;
    // }

    // Delete
    // if($connect -> query($sqlDelete) === true) {
    //     echo "Dữ liệu đã bị xóa<br>";
    // } else {
    //     echo "Lỗi delete: " . $connect -> error;
    // }

    // Update
    if($connect -> query($sqlUpdate) === true) {
        echo "Dữ liệu đã được cập nhật<br>";
    } else {
        echo "Lỗi cập nhật: " . $connect -> error;
    }
    $connect -> close();
?>