<form action="3_4-ketqua.php" method="POST">
    Nhập vào 1 số (tối đa 3 chữ số): 
    <input type="number" name="number" min="1" max="999" required>
    <input type="submit" value="Submit">
</form>

<hr>

<?php
if (isset($_POST['number'])) {
    $n = (int)$_POST['number'];

    if ($n >= 1 && $n <= 999) {
        
        // 1. Dùng vòng lặp FOR
        echo "<b>CÁC SỐ TỪ 1 ĐẾN $n VÀ BÌNH PHƯƠNG (DÙNG FOR):</b><br>";
        for ($i = 1; $i <= $n; $i++) {
            $binh_phuong = $i * $i;
            echo "Số i = $i | Số i² = $binh_phuong <br>";
        }

        echo "<hr>";

        // 2. Dùng vòng lặp WHILE
        echo "<b>CÁC SỐ TỪ 1 ĐẾN $n VÀ BÌNH PHƯƠNG (DÙNG WHILE):</b><br>";
        $j = 1;
        while ($j <= $n) {
            $binh_phuong = $j * $j;
            echo "Số i = $j | Số i² = $binh_phuong <br>";
            $j++;
        }

        echo "<hr>";

        // 3. Dùng vòng lặp DO...WHILE
        echo "<b>CÁC SỐ TỪ 1 ĐẾN $n VÀ BÌNH PHƯƠNG (DÙNG DO...WHILE):</b><br>";
        $k = 1;
        do {
            $binh_phuong = $k * $k;
            echo "Số i = $k | Số i² = $binh_phuong <br>";
            $k++;
        } while ($k <= $n);

    } else {
        echo "Vui lòng nhập số nguyên từ 1 đến 999.";
    }
} else {
    echo "Vui lòng nhập dữ liệu từ trang binhphuong.php";
}
?>