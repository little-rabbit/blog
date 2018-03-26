<?php

function randstr($type=1,$len=4){
    if($type==1){
        $str = implode('',range(0,9));
    }elseif ($type==2) {
        $str = implode('',array_merge(range('A','Z'),range('a','z')));
    }elseif ($type==3) {
        //创建字符串
        $str = implode('',array_merge(range('A','Z'),range('a','z'),range(0,9)));
        //implode 将一维数组转换为字符串
        //array_merge 合并数组
        //range 取范围值的
    }
    
    //随机打乱字符串
    $strs = str_shuffle($str);
    
    if($len > strlen($strs)){
        $len = strlen($strs);
    }
    
    //根据长度截取字符串
    return substr($strs,0,$len);
//    return $str;
}


