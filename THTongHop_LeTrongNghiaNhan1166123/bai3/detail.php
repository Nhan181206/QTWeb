<?php
session_start();
include("include/ketnoi.php");
include("include/ham.php");

$mamon = isset($_GET["mamon"]) ? (int)$_GET["mamon"] : (isset($_POST["mamon"]) ? (int)$_POST["mamon"] : 0);

$thongbao = "";       // Thông báo hiện dưới nút Submit rating
$hienform = false;    // Có hiện form bình chọn ngay khi load trang hay không

// Mỗi phiên làm việc chỉ được bình chọn 1 lần cho một món ăn
$dabinhchon = isset($_SESSION["binhchon"][$mamon]);

if (isset($_POST["submit"])) {
    if ($dabinhchon) {
        $thongbao = '<div class="error">Menu has been rated!</div>';
    }
    else if (!isset($_POST["diem"])) {
        $thongbao = '<div class="error">Please choose a rating.</div>';
        $hienform = true;
    }
    else if ($_POST["captcha"] != $_SESSION["captcha"]) {
        // Nhập sai Captcha: thông báo lỗi màu đỏ
        $thongbao = '<div class="error">Wrong captcha, please try again.</div>';
        $hienform = true;
    }
    else {
        // Nhập đúng Captcha: lưu bình chọn
        $diem = (int)$_POST["diem"];
        $sql = "insert into binhchon(mamon, diem, ngay) values($mamon, $diem, now())";
        if (mysqli_query($conn, $sql)) {
            $_SESSION["binhchon"][$mamon] = true;
            $dabinhchon = true;
            $thongbao = '<div class="success">Thank you! Your rating has been added successfully.</div>';
        } else {
            $thongbao = '<div class="error">Error: '.mysqli_error($conn).'</div>';
            $hienform = true;
        }
    }
}
else if ($dabinhchon) {
    // Đã bình chọn mà chọn lại món ăn đó
    $thongbao = '<div class="error">Menu has been rated!</div>';
}

// Lấy thông tin món ăn (sau khi bình chọn để cập nhật lại số lần và điểm trung bình)
$sql = "select m.*, n.tennhom from monan m inner join nhom n on m.manhom = n.manhom where m.mamon = $mamon";
$mon = mysqli_fetch_assoc(mysqli_query($conn, $sql));

$tieude = "Menu detail";
$active = "menu";
include("include/header.php");

if (!$mon) {
    echo '<p>Menu item not found.</p><p><a href="menu.php">Back to menu</a></p>';
} else {
    $tk = mysqli_fetch_assoc(mysqli_query($conn, "select count(id) as soluot, avg(diem) as diemtb from binhchon where mamon = $mamon"));
    $soluot = $tk["soluot"];
    $diemtb = ($soluot > 0) ? number_format($tk["diemtb"], 1) : "0.0";
?>
<script>
// Hiện form bình chọn và ẩn liên kết 'Add a rating'
function hienForm() {
    document.getElementById("rate-form").style.display = "block";
    document.getElementById("add-rating").style.display = "none";
}
// Ẩn form bình chọn và hiện lại liên kết 'Add a rating'
function anForm() {
    document.getElementById("rate-form").style.display = "none";
    document.getElementById("add-rating").style.display = "inline";
}
</script>
<h1><?php echo $mon["tenmon"]; ?></h1>
<p><strong>Category:</strong> <?php echo $mon["tennhom"]; ?></p>
<p><strong>Price:</strong> &pound;<?php echo number_format($mon["gia"], 2); ?></p>
<p><?php echo $mon["mota"]; ?></p>
<p><strong>Rating:</strong> <?php echo $diemtb; ?> (<?php echo $soluot.' '.tuRating($soluot); ?>)</p>

<?php if (!$dabinhchon) { ?>
<p id="add-rating"<?php if ($hienform) echo ' style="display:none"'; ?>><a href="javascript:hienForm()">Add a rating</a></p>

<form id="rate-form" method="post" action="detail.php?mamon=<?php echo $mamon; ?>"<?php if ($hienform) echo ' style="display:block"'; ?>>
    <input type="hidden" name="mamon" value="<?php echo $mamon; ?>">
    <p>Your rating:
        <input type="radio" name="diem" value="1"> 1
        <input type="radio" name="diem" value="2"> 2
        <input type="radio" name="diem" value="3"> 3
        <input type="radio" name="diem" value="4"> 4
        <input type="radio" name="diem" value="5"> 5
    </p>
    <p>Captcha: <img src="captcha.php?t=<?php echo time(); ?>" alt="captcha" align="middle">
       <input type="text" name="captcha" size="8" autocomplete="off"></p>
    <p><input type="submit" name="submit" value="Submit rating">
       <input type="button" value="Cancel" onclick="anForm()"></p>
</form>
<?php } ?>

<!-- Thông báo nằm dưới nút 'Submit rating' và trên link 'Back to menu' -->
<?php echo $thongbao; ?>
<p><a href="menu.php">Back to menu</a></p>
<?php
}
mysqli_close($conn);
include("include/footer.php");
?>
