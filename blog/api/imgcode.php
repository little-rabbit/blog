<?php

include_once 'randcode.php';

$width = 100;
$height = 30;
$len = 4;
//创建画布
$image = imagecreatetruecolor($width, $height);
//画布的背景色
$white = imagecolorallocate($image, 255, 255, 255);
$black = imagecolorallocate($image, 0, 0, 0);

//填充画布 用矩形
imagefilledrectangle($image, 1, 1, $width - 2, $height - 2, $white);

//创建验证码

$str = randstr(3, $len);
session_start();
$_SESSION['imgcode'] = $str;

//创建字体
$fontfiles = ['SIMLI.TTF', 'SIMYOU.TTF', 'msyh.ttc', 'msyhbd.ttc', 'msyhl.ttc', 'simkai.ttf', 'simsun.ttc'];
//写入验证码

for ($i = 0; $i < $len; $i++) {
   
    $size = mt_rand(24, 28);
    
    $angle = mt_rand(-15, 15);
    $x = 3 + $i * $size;
    $y = mt_rand(26, 28);
    $color = imagecolorallocate($image, mt_rand(50, 70), mt_rand(60, 80), mt_rand(80, 100));
//    echo $i;
    $fontfile = "../fonts/".$fontfiles[mt_rand(0, count($fontfiles) - 1)];
    $text = substr($str, $i, 1);
    imagettftext($image, $size, $angle, $x, $y, $color, $fontfile, $text);
     
}
//干扰点
for ($i=0;$i<20;$i++){
    imagesetpixel($image,  mt_rand(1, $width-2), mt_rand(1, $height-2),$black);
}
$linecolor =imagecolorallocate($image, mt_rand(150, 170), mt_rand(190, 220), mt_rand(200, 230));
//告诉浏览器输出的类型
header('Content-Type: image/gif');
imagegif($image);





//imagegif($image);