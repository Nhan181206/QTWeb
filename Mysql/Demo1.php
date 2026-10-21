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
    // $sqlSelect = "SELECT * FROM tin_xahoi";

    // $sqlInsert = "INSERT INTO tin_xahoi (title, date, description, content)
    //              VALUES ('Tin hot', '2016-10-24', 'Đây là mô tả cho tin hot', 'Nội dung chi tiết của tin hot')";

    // $sqlDelete = "DELETE FROM tin_xahoi WHERE id = 11";

    // $sqlUpdate = "UPDATE tin_xahoi SET title = 'Học có trễ đâu', content = 'Đây là nội dung của bài viết Học có trễ đâu' WHERE id = 1";

    // Select
    // $result = $connect -> query($sqlSelect);
    // if ($result === false) {
    //     die("Lỗi truy vấn danh sách: " . $connect -> error);
    // }

    // if($result -> num_rows > 0) {
    //     while ($row = $result -> fetch_assoc()) {
    //         echo "ID: " .$row["id"] . "<br>" . " - Title: " . $row["title"] . "<br>" . " - Date: " . $row["date"] . "<br>" . " - Description: " . $row["description"] . "<br>" . "<br>";
    //     }
    // } else {
    //     echo "Không có dữ liệu" . "<br>";
    // }

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
    // if($connect -> query($sqlUpdate) === true) {
    //     echo "Dữ liệu đã được cập nhật<br>";
    // } else {
    //     echo "Lỗi cập nhật: " . $connect -> error;
    // }
    // $connect -> close();

    //3. Khai báo giá trị ban đầu, nếu không có thì khi chưa submit câu lệnh insert sẽ báo lỗi
    $title = "";
    $date = "";
    $description = "";
    $content = "";

    //4. Lấy giá trị POST từ form vừa submit
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if(isset($_POST["title"])) { $title = $_POST['title']; }
        if(isset($_POST["date"])) { $date = $_POST['date']; }
        if(isset($_POST["description"])) { $description = $_POST['description']; }
        if(isset($_POST["content"])) { $content = $_POST['content']; }

        //5. Code xử lý, insert dữ liệu vào table
        $sql = "INSERT INTO tin_xahoi (title, date, description, content)
        VALUES ('$title', '$date', '$description', '$content')";

        if ($connect->query($sql) === TRUE) {
            echo "Thêm dữ liệu thành công";
        } else {
            echo "Error: " . $sql . "<br>" . $connect->error;
        }
    }

    //6. Đóng database
    $connect->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <table>
            <tr>
                <th>Tiêu đề:</th>
                <td>
                    <input type="text" name="title" value="">
                </td>
            </tr>
            <tr>
                <th>Ngày tháng:</th>
                <td>
                    <input type="date" name="date" value="">
                </td>
            </tr>
            <tr>
                <th>Mô tả:</th>
                <td>
                    <input type="text" name="description" value="">
                </td>
            </tr>
            <tr>
                <th>Nội dung:</th>
                <td>
                    <textarea cols="30" rows="7" name="content"></textarea>
                </td>
            </tr>
        </table>

        <button type="submit">Gửi</button>
    </form>
</body>
</html>