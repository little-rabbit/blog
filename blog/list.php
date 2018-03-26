<?php
include_once '/lib/config.php';
include_once 'top.php';
?>


<div id='content'>
    <div>
        <div>
            <div class='update_row'>
                <h2>标题名称</h2>

                <?php
                $classid = $_GET['classid'];
                if($classid>6 || $classid<1){
                    $classid=1;
                }
                
                $sql = "SELECT * FROM article_user_list_view where classid=" . $classid . " LIMIT 4";
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
                            <span><?php echo date('Y-m-d H:i:s', $row['time']); ?></span>
                        </p>
                    </div>  
                    <?PHP
                }
                ?>
            </div>
        </div>

        <div>
            <div class='my'>
                <ul class='xiangqing_nav'>
                    <li><a href="">关于博主</a></li>
                    <li><a href="">心情随笔</a></li>                        
                    <li><a href="">韶华追忆</a></li>                        
                    <li><a href="">网站首页</a></li>                        
                    <li><a href="">Blog留言</a></li>                        
                    <li><a href="">叶子书屋</a></li>                        
                </ul>
            </div>

            <?php
            include_once 'di.php';
            ?>