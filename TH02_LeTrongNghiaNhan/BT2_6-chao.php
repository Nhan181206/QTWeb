<?php
$hoTen = "";

if (isset($_POST['thucHien']))
    $hoTen = $_POST['hoTen'];
?>

<h2 style="color:blue">HIỆN CÂU CHÀO</h2>

<form method="post">
    Nhập họ tên:
    <input type="text" name="hoTen">
    <br><br>

    <input type="submit" name="thucHien" value="Thực hiện">

    <?php
    if ($hoTen != "")
        echo "<h2>Xin chào $hoTen</h2>";
    ?>
</form>