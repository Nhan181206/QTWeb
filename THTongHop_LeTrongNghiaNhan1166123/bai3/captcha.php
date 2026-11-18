<?php
session_start();
$string = md5(rand(0,9999));
$string = substr($string, 10, 5);
$_SESSION['captcha'] = $string;
$img = imagecreate(60,20);
//set nền màu trắng RGB 255,255,255
$background = imagecolorallocate($img, 255,255,255);
//set chữ màu đỏ RGB 255,0,0
$text_color = imagecolorallocate($img, 255,0,0);
//set đường line màu xanh RGB 0,255,0
$line_color = imagecolorallocate($img, 0,255,0);
imageline($img,0,10,60,10,$line_color);
imageline($img,0,11,60,11,$line_color);
imagestring($img, 10,7,2, $string, $text_color);
header('content-type: image/jpeg');
imagejpeg($img);
imagedestroy($img);
?>
