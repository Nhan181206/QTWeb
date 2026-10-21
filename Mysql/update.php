<form action="process.php" method="post">
    <table>
        <tr>
            <th>ID:</th>
            <td><input type="hidden" name="id" value=""></td>
        </tr>
        <tr>
            <th>Tiêu đề:</th>
            <td><input type="text" name="title" value=""></td>
        </tr>

        <tr>
            <th>Ngày tháng:</th>
            <td><input type="date" name="date" value=""></td>
        </tr>

        <tr>
            <th>Mô tả:</th>
            <td><input type="text" name="description" value=""></td>
        </tr>

        <tr>
            <th>Nội dung:</th>
            <td><textarea cols="30" rows="7" name="content"></textarea></td>
        </tr>
    </table>
    <button type="submit">Gửi</button>
</form>
