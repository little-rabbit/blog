<?php
//将文件转换成二进制文件
header('Content-Type: application/octet-stream');
//下载指定内容文件
header('Content-Disposition: attachment; filename=on_'.$_GET['file'].'');

//获取文件地址
$filename = '../'.$_GET['file'];
//获取文件大小
$filesize = filesize($filename);

//告诉浏览器文件长度
header('Content-length:'.$filesize);

//将文件流动到浏览器
readfile($filename);
