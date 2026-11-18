<?php
session_start();
include "include/ketnoi.php";
$trang = "menu";
$id = $_GET['id'];

$rs = mysqli_query($conn, "select * from dish, category where dish.category_id = category.category_id and dish_id = $id");
$mon = mysqli_fetch_assoc($rs);
$title = "Gordon's Crown - " . $mon['title'];

$tbao = "";
$loi = "";
$hienform = false;

if (isset($_POST['btRating'])) {
    if (isset($_SESSION['rated'][$id])) {
        $tbao = "Menu has been rated!";
    } else if ($_POST['captcha'] == $_SESSION['captcha']) {
        $score = $_POST['score'];
        mysqli_query($conn, "insert into rating(dish_id, score) values($id, $score)");
        $_SESSION['rated'][$id] = 1;
        $tbao = "Menu has been rated successfully!";
    } else {
        $loi = "Text did not match the text on the CAPTCHA image. Try again with a new one!";
        $hienform = true;
    }
} else if (isset($_SESSION['rated'][$id])) {
    $tbao = "Menu has been rated!";
}

$rs = mysqli_query($conn, "select count(rating_id) as tong, avg(score) as diem from rating where dish_id = $id");
$st = mysqli_fetch_assoc($rs);
$tong = $st['tong'];
$diem = number_format($st['diem'], 1);
if ($tong > 1)
    $chu = "ratings";
else
    $chu = "rating";

include "include/header.php";
?>
    <div id="chitiet" style="width:600px">
      <p class="back tren"><a href="menu.php">&larr; Back to the menu</a></p>
      <h1><?php echo $mon['title']; ?> - &pound;<?php echo $mon['price']; ?></h1>
      <h3 class="cat"><?php echo $mon['category_name']; ?></h3>
      <img src="images/<?php echo $mon['image']; ?>" class="mon">
      <p class="mota"><?php echo nl2br($mon['description']); ?></p>
      <p class="rating-dong">Rating: <span><?php echo "$diem ($tong $chu)"; ?></span></p>
      <?php if ($tbao == "") { ?>
      <a href="#" id="lk-rating" onclick="hienForm(); return false;" <?php if ($hienform) echo "style='display:none'"; ?>>Add a rating</a>
      <form method="post" action="" id="frm-rating" <?php if ($hienform) echo "style='display:block'"; ?>>
        <table>
          <tr>
            <td>Select your rating:</td>
            <td>
              <select name="score">
                <option value="5">5 delicious</option>
                <option value="4">4 very good</option>
                <option value="3">3 good</option>
                <option value="2">2 fair</option>
                <option value="1">1 poor</option>
              </select>
            </td>
          </tr>
          <tr>
            <td>Type in the text from the image:</td>
            <td><img src="captcha.php" align="absmiddle"> <input type="text" name="captcha" class="cap"></td>
          </tr>
        </table>
        <div class="nutgui"><input type="submit" name="btRating" value="Submit rating" class="submit"></div>
        <?php if ($loi != "") echo "<div class='error'>$loi</div>"; ?>
      </form>
      <?php } else { ?>
      <div class="success" style="margin-left:10px"><?php echo $tbao; ?></div>
      <?php } ?>
      <p class="back"><a href="menu.php">&larr; Back to the menu</a></p>
    </div>
<?php include "include/footer.php"; ?>
