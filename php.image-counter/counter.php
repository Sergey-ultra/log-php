<?php
require_once 'db.php';

$imgUrl='images/3.jpg';
$image = imagecreatefromjpeg($imgUrl);
header('Content-type: image/jpeg');
imagejpeg($image);
imagedestroy($image);

