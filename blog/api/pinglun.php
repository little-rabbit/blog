<?php

$neirong = $_POST['neirong'];
$arid = $_POST['arid'];

//判断内容
if (!$neirong && strlen($string)>1000) {
    echo '0';
    exit();
}

//判断是否登录
include_once '../lib/config.php';

//if (!isset($_SESSION['userId'])) {
//    echo '0';
//    exit();
//}
//$uid = $_SESSION['uid'];
$uid = 3;

$link = mysqli_connect(db_host, db_user, db_pwd,db_lib);
$sql = "INSERT into pinglun_list(arid,neirong,uid,`time`) VALUES({$arid},'".$neirong."',{$uid},".time().");";
$bool = mysqli_query($link, $sql);

if($bool){
    echo 1;
}else{
    echo 0;
}
