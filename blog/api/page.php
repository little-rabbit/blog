<?php
include_once '../lib/config.php';
$off = $_POST['off'];
$pagesize = $_POST['pagesize'];
$arid = $_POST['arid'];
//echo $arid.'<br>';

//$off = 2;
//$pagesize = 3;
//$arid = 10;

if($off < 2){
    echo 101;
    exit();
}

$link = mysqli_connect(db_host,db_user,db_pwd,db_lib);
if(!$link){
    echo '102';
    exit();
}

$pian = ($off-1) * $pagesize;
$sql = "SELECT * from pinglun_list where arid={$arid} and isdisplay=2 LIMIT {$pian},{$pagesize}";
//echo $sql;
$re = mysqli_query($link, $sql);

while ($row = mysqli_fetch_assoc($re)){
    $rows[] = $row;
}
//$num = count($rows);
//if($num<3){
//    
//}


if($rows){
    echo json_encode($rows);
}else{
    echo '0';
}