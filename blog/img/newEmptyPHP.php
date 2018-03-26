<?php

$a = '1.jpg';
//$dfile ='img/'.$a; 
$filesize = filesize($a);
//echo $filesize;
//$a = 'x_'.$a;
header('Content-Type:application/octet-stream');
header("Content-Disposition:attachment;filename={$a}");
header("Content-length:{$filesize}");
readfile($a);