<?php

$link = mysqli_connect('localhost', 'root', 'li0liang', 'leaf');

$sqli = "select count(id) from article_list";
$re = mysqli_query($link, $sqli);
$arr = mysqli_fetch_assoc($re);
//总条数  
$torows = $arr['count(id)'];
//$torows = 50;
//每页展示的条数
$pagesize = 4;
//总页数
$topage = ceil($torows / $pagesize);
//当前页
$page = $_GET['page'] ? $_GET['page'] : 1;


//用户恶意输入 
if($page<1||$page==null|| !is_numeric($page)){
    $page=1;
}
//如果输入大于总页数=总页数
if($page>$topage){
    $page=$topage;
}
//偏移量

$off = ($page - 1) * $pagesize;

$sql = "SELECT * from article_list LIMIT {$off},{$pagesize}";//echo $sql;
//echo "<br>";
$re = mysqli_query($link, $sql);

while ($row = mysqli_fetch_assoc($re)) {
//    echo "<h2>{$row['title']}</h2>";
//    echo "<p>{$row['content']}</p>";
}

#计算分页的开始和结束
for ($i = 1; $i <= $topage; $i++) {
    if ($page == $i) {
        $p .= "<a>{$i}</a>";
    } else {
        $p .= "<a href='?page=" . $i . "'>{$i}</a>";
    }
}
//获取当前路径
$url = $_SERVER['PHP_SELF'];

$index = ($page==1)?"<a>首页</a>":"<a href='".$url."?page=1'>首页</a>";
$last = ($page==$topage)?"<a>尾页</a>":"<a href='".$url."?page=".$topage."'>尾页</a>";
$prev = ($page==1)?"<a>上一页</a>":"<a href='".$url."?page=".($page-1)."'>上一页</a>";
$next = ($page==$topage)?"<a>下一页</a>":"<a href='".$url."?page=".($page+1)."'>下一页</a>";
$str="总页数{$topage}";
$th = "当前页{$page}";
$rows = "总共{$torows}条";
echo $str.'/'.$th.'/'.$rows.'<br>'.$index.$prev.$p.$next.$last;
