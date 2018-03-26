<?php
include_once '../lib/config.php';
$email = $_POST['email'];
$pwd = $_POST['pwd'];
$code = $_POST['code'];

// 1 '验证码邮箱与注册邮箱不符'
// 2 '验证码错误'
// 3 "密码较段或者为空"
// 4 注册成功
// 5 注册失败
if($email==$_SESSION['email']){
    echo 1;
    exit();
}
if($code==$_SESSION['code']){
    echo 2;
    exit();
}
if(strlen($pwd)<6){
    echo 3;
    exit();
}
$pwd=md5($pwd);

$link = mysqli_connect(db_host,db_user,db_pwd,db_lib);
if(!$link){
    echo 6;
    exit();
}
$sql = "insert into user_list(email,pwd) values('".$email."','".$pwd."')";
//echo $sql;
$re = mysqli_query($link, $sql);
$id= mysqli_insert_id($re);
session_start();
$_SESSION['userId']=$id;

if($re){
    echo 4;
} else {
    echo 5;    
}