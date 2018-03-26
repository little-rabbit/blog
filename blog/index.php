<script src="js/jquery.min.js" type="text/javascript"></script>
<?php
include_once '/lib/config.php';
include_once 'top.php';
//var_dump($_SESSION);
if($_SESSION['uid']){
    echo '<script>$("#denglu").hide();$("#huanying").show();$("#zhe").hide();</script>';
    echo '<script>$("#pinglun").show();</script>';
    
}
?>

<div id='content'>
    <div>
        <div>
            <div class='banner'>
                <ul>	
                    <li><img src="img/1.jpg"></li>
                </ul>

                <ul>
                    <li>
                        <h3>关于博主</h3>
                        <p>个人资料：男，九零后，IT男，天秤座，IT界最不着调的程序员  爱好：写文字、涂鸦</p>
                    </li>

                    <li>
                        <h3>关于叶子书屋</h3>
                        <p>8月初就开始着手开发书屋的一些功能，因为工作的原因，进度还是有点慢。之所以想弄一</p>
                    </li>
                </ul>
            </div>

            <div class='update_row'>
                <h2>热门文章</h2>
                <?php
                $link = mysqli_connect(db_host, db_user, db_pwd, db_lib);
                $sql = 'SELECT * from article_user_view';
                $re = mysqli_query($link, $sql);

                while ($row = mysqli_fetch_assoc($re)) {
                    ?>
                    <div>
                        <a href="details.php?wzid=<?php echo $row['id']; ?>"><h3><?php echo $row['title']; ?></h3></a>
                        <p>
                       <?php echo $row['introduce']; ?>
                        </p>
                        <p class='autor'>
                            <span> <?php echo @$row['nickname']; ?></span>
                            <span><?php echo date('Y-m-d H:i:s',$row['time']); ?></span>
                        </p>
                    </div>  
                <?php
                }
                ?>
                </div>
            <script src="js/enroll.js" type="text/javascript"></script>
            <div>
                <?php
//                $sqli="select count(id) from article_list";
//                $re = mysqli_query($link, $sqli);
//                $arr = mysqli_fetch_assoc($re);
                //总条数
//                $torows = $arr['count(id)'];
                $torows = 26;
                //每页展示的条数
                $pagesize = 5;
                //总页数
                $topage = ceil($torows/$pagesize);
                
                
//                echo $topage;
                
                
                ?>
                
                
            </div>
            </div>
        
            <div>
                <div class='my'>
                    <h3>关注我</h3>
                    <ul class='ico'>
                        <li><a href="/" class='xlwb'>新浪微博</a></li>
                        <li><a href="/" class='txwb'>腾讯微博</a></li>
                        <li><a href="/" class='yx'>邮箱</a></li>
                        <li><a href="/" class='yjfk'>意见反馈</a></li>
                    </ul>
                </div>
                <?php
                include_once 'di.php';
                ?>
       