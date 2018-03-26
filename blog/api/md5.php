<?php
header('Content-Type: text/html; charset=utf-8');
include_once ROOT.'/lib/crypt3des.php';
//$a = md5('liliang');
//echo $a;

$des = new Crypt3Des();
$name = $des->encrypt('liliang');


setcookie('name',$name,time()+60*60*24,'/');


$cookieName = $des->decrypt($_COOKIE['name']);
//echo $cookieName;
var_dump($_SERVER['DOCUMENT_ROOT']);