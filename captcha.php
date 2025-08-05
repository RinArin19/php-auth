<?php
session_start();
$captcha = substr(str_shuffle("ABCDEFGHJKLMNPQRSTUVWXYZ23456789"), 0, 5);
$_SESSION['captcha'] = $captcha;

header("Content-type: image/png");
$image = imagecreate(100, 30);
$bg = imagecolorallocate($image, 255, 255, 255);
$text = imagecolorallocate($image, 0, 0, 0);
imagestring($image, 5, 20, 5, $captcha, $text);
imagepng($image);
imagedestroy($image);
?>
