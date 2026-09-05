<form method="POST" action="">
    <label>Nhập số nguyên N:</label>
    <input type="number" name="n" min="0" max="999" required>
    <input type="submit" value="Tính giai thừa">
</form>

<hr>

<?php
// Kiểm tra dữ liệu gửi từ form (nếu có)
if (isset($_POST['n'])) {
    $n = $_POST['n'];
    
    if (is_numeric($n) && $n >= 0 && $n <= 999) {
        $n = (int)$n;
        $giaithua = 1;
        for ($i = 1; $i <= $n; $i++) {
            $giaithua *= $i;
        }
        
        echo "Số n: " . $n . "<br>";
        echo "Giai thừa của số " . $n . " là: " . $giaithua;
    } else {
        echo "Vui lòng nhập số nguyên hợp lệ từ 0 đến 999.";
    }
}
?>