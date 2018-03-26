<?php
include_once '../lib/config.php';
$email = $_POST['email'];
$pwd = $_POST['pwd'];
$code = $_POST['code'];
//$email = '874891121@qq.com';
//$pwd =123456;
//$code = $_POST['code'];



//session_start();
$yCode = $_SESSION['imgcode'];

// 1 登录成功
// 2 验证码错误
// 3 邮箱格式错误
// 4 密码不足6位
// 5 密码或用户名错误
if($code==$yCode){
    echo 2;
    exit();
}
if(!preg_match('/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/', $email)){
    echo 3;
    exit();
}
if(strlen($pwd)<6){
    echo 4;
    exit();
}
$pwd = md5($pwd);
$link = mysqli_connect(db_host,db_user,db_pwd,db_lib);

$sql = "select * from user_list where email='".$email."' AND pwd='".$pwd."'";

$re = mysqli_query($link, $sql);
$row = mysqli_fetch_assoc($re);
if($row==null){
    echo 5;
}else{
    echo 1;
    $_SESSION['uid']=$row['id'];
}