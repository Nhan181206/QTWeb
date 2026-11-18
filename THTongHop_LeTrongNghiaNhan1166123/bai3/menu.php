<?php
include("include/ketnoi.php");
include("include/ham.php");
$tieude = "Menu";
$active = "menu";
include("include/header.php");
?>
<h1>Our Menu</h1>
<div class="jump">
    Jump to...
    <!-- Các mục lấy từ CSDL theo thứ tự trong file Excel, chọn xong tự động cuộn đến mục đó -->
    <select onchange="if (this.value != '') { window.location.hash = this.value; }">
        <option value="">-- Select --</option>
        <?php
        $rs = mysqli_query($conn, "select * from nhom order by thutu");
        while ($row = mysqli_fetch_assoc($rs)) {
            echo '<option value="nhom'.$row["manhom"].'">'.$row["tennhom"].'</option>';
        }
        ?>
    </select>
</div>

<?php
$rsnhom = mysqli_query($conn, "select * from nhom order by thutu");
while ($nhom = mysqli_fetch_assoc($rsnhom)) {
    // Tổng số lần bình chọn và điểm trung bình của các món ăn trong nhóm
    $sql = "select count(b.id) as soluot, avg(b.diem) as diemtb
            from binhchon b inner join monan m on b.mamon = m.mamon
            where m.manhom = ".$nhom["manhom"];
    $tk = mysqli_fetch_assoc(mysqli_query($conn, $sql));
    $soluot = $tk["soluot"];
    $diemtb = ($soluot > 0) ? number_format($tk["diemtb"], 1) : "0.0";
?>
<div class="nhom" id="nhom<?php echo $nhom["manhom"]; ?>">
    <img src="images/<?php echo $nhom["hinh"]; ?>" alt="<?php echo $nhom["tennhom"]; ?>">
    <h2><?php echo $nhom["tennhom"]; ?></h2>
    <p class="thongke"><?php echo $soluot.' '.tuRating($soluot).' - average rating '.$diemtb; ?></p>
    <ul>
        <?php
        // Các món ăn sắp xếp theo thứ tự abc, có liên kết để bình chọn
        $rsmon = mysqli_query($conn, "select * from monan where manhom = ".$nhom["manhom"]." order by tenmon");
        while ($mon = mysqli_fetch_assoc($rsmon)) {
            echo '<li><a href="detail.php?mamon='.$mon["mamon"].'">'.$mon["tenmon"].'</a>
                  <span class="gia">&pound;'.number_format($mon["gia"], 2).'</span></li>';
        }
        ?>
    </ul>
</div>
<?php
}
mysqli_close($conn);
include("include/footer.php");
?>
