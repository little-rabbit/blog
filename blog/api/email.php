<?php
include_once '../lib/class.phpmailer.php';
include_once '../lib/class.smtp.php';
include_once '../lib/config.php';
$userEmail = $_POST['email'];
$link = mysqli_connect(db_host,db_user,db_pwd,db_lib);
if(!$link){
    exit();
}
$sql = "SELECT * from user_list where email='".$userEmail."'";
$re = mysqli_query($link, $sql);
$row = mysqli_fetch_assoc($re);
if($row){
    echo '3';
    exit();
}

if(!preg_match('/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/', $userEmail)){
    echo '2';
    exit();
}
 $rand= mt_rand(100000, 999999);   
$email=new PHPMailer();  // 定义一个很多对象的邮件变量函数                   new 实例化$eamil类，这个类里面有很多方法   PHPMailer是一个用于发送电子邮件的PHP函数包。

$email->SMTPDebug=false;           //  是否显示发送过程中的信息                     false 是不用返回值 不输出值     TRUE  是会输出文档信息
$email->IsSMTP();                  //
$email->SMTPAuth=TRUE;
$email->Host='smtp.163.com';              //需要发送邮件的主机       通常是smtp.xx.com  xx代表qq，163,126；
$email->Username='18515248559@163.com';                      //发送邮箱的账号
$email->Password='liliang110';                    // 授权码 在邮箱里面设置  密码
$email->From='18515248559@163.com';                         //从哪里发送
$email->CharSet='utf-8';
$email->AddAddress($userEmail);                //接收邮件的地址
$email->Subject='李亮博客-注册验证码';                     //邮件标题
$email->Body="你的邮箱验证码为：".$rand."。欢迎注册";                        //邮件内容
$a = $email->send();

if($a){
    echo '1';
    session_start();
    $_SESSION['randcode']=$rand;
    $_SESSION['email']=$userEmail;
    
}

