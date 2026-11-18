<?php
include "include/ketnoi.php";
$goc = "http://" . $_SERVER['HTTP_HOST'] . rtrim(dirname($_SERVER['SCRIPT_NAME']), "/");

header("Content-Type: application/rss+xml; charset=utf-8");
echo "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n";
?>
<rss version="2.0">
  <channel>
    <title>Gordon's Crown - Menu</title>
    <link><?php echo $goc; ?>/menu.php</link>
    <description>Dedicated to delicious British Food</description>
<?php
$rs = mysqli_query($conn, "select * from dish order by category_id, title");
while ($row = mysqli_fetch_assoc($rs)) {
?>
    <item>
      <title><?php echo htmlspecialchars($row['title']); ?></title>
      <link><?php echo $goc; ?>/detail.php?id=<?php echo $row['dish_id']; ?></link>
      <description><?php echo htmlspecialchars($row['description']); ?></description>
    </item>
<?php } ?>
  </channel>
</rss>
