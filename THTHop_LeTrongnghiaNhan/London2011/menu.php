<?php
session_start();
include "include/ketnoi.php";
$trang = "menu";
$title = "Gordon's Crown - Menu";
include "include/header.php";

$sql = "select category.category_id, category_name, category.image, count(rating_id) as tong, avg(score) as diem
        from category left join dish on category.category_id = dish.category_id
        left join rating on dish.dish_id = rating.dish_id
        group by category.category_id, category_name, category.image
        order by category.category_id";
$rs = mysqli_query($conn, $sql);
?>
    <h1>Menu of Gordon's Crown</h1>
    <div id="jump">
      <h3>Jump to ...</h3>
      <ul>
        <?php
        $rs_jump = mysqli_query($conn, "select * from category order by category_id");
        while ($row = mysqli_fetch_assoc($rs_jump)) {
            echo "<li><a href='#cat" . $row['category_id'] . "'>" . $row['category_name'] . "</a></li>";
        }
        ?>
      </ul>
    </div>
    <?php
    while ($row = mysqli_fetch_assoc($rs)) {
        $tong = $row['tong'];
        $diem = number_format($row['diem'], 1);
        if ($tong > 1)
            $chu = "ratings";
        else
            $chu = "rating";
    ?>
    <div class="nhom" id="cat<?php echo $row['category_id']; ?>">
      <h2><?php echo $row['category_name']; ?></h2>
      <p class="rating">Rating: <?php echo "$diem ($tong $chu)"; ?></p>
      <div class="box">
        <img src="images/<?php echo $row['image']; ?>" width="299">
        <ul>
          <?php
          $rs_mon = mysqli_query($conn, "select * from dish where category_id = " . $row['category_id'] . " order by title");
          while ($mon = mysqli_fetch_assoc($rs_mon)) {
              echo "<li><a href='detail.php?id=" . $mon['dish_id'] . "'>" . $mon['title'] . " - &pound;" . $mon['price'] . "</a></li>";
          }
          ?>
        </ul>
      </div>
    </div>
    <?php } ?>
    <div id="rss"><a href="rss.php"><img src="images/rss.png" width="16" height="16" border="0"></a></div>
<?php include "include/footer.php"; ?>
