<?php
session_start();
$string = md5(rand(0, 9999));
$string = substr($string, 10, 5);
$_SESSION['captcha'] = $string;

$img = imagecreate(60, 20);
$background = imagecolorallocate($img, 255, 255, 255);
$text_color = imagecolorallocate($img, 255, 0, 0);
$line_color = imagecolorallocate($img, 0, 255, 0);
imageline($img, 0, 10, 60, 10, $line_color);
imageline($img, 0, 11, 60, 11, $line_color);
imagestring($img, 4, 10, 2, $string, $text_color);

header("Cache-Control: no-cache");
header("Content-type: image/png");
imagepng($img);
imagedestroy($img);
?>
