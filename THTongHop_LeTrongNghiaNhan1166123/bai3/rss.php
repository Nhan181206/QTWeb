<?php
include("include/ketnoi.php");
header("Content-Type: application/rss+xml; charset=utf-8");
$goc = "http://".$_SERVER["HTTP_HOST"].rtrim(dirname($_SERVER["SCRIPT_NAME"]), "/\\");

echo '<?xml version="1.0" encoding="UTF-8"?>';
?>

<rss version="2.0">
<channel>
    <title>Gordon's Crown - Menu</title>
    <link><?php echo $goc; ?>/menu.php</link>
    <description>Menu of Gordon's Crown pub, London</description>
    <?php
    $sql = "select m.*, n.tennhom from monan m inner join nhom n on m.manhom = n.manhom order by n.thutu, m.tenmon";
    $rs = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($rs)) {
        echo '<item>
        <title>'.htmlspecialchars($row["tenmon"]).' (&#163;'.number_format($row["gia"], 2).')</title>
        <link>'.$goc.'/detail.php?mamon='.$row["mamon"].'</link>
        <description>'.htmlspecialchars($row["tennhom"].': '.$row["mota"]).'</description>
    </item>';
    }
    mysqli_close($conn);
    ?>
</channel>
</rss>
