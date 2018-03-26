<?php
include_once '/lib/config.php';
include_once 'top.php';
?>

<div id='content'>
    <div>
        <div>
            <div class='details'>
                <h2>您现在的位置：<a href="index.php">首页</a> > <a href="">你的当前位置</a></h2>
                  <?php
                  $wzid = $_GET['wzid'];
                  $sqlsss = 'SELECT * from article_user_view where id='.$wzid;
                  $re = mysqli_query($link, $sqlsss);
//                  echo '123';
//                  var_dump($re);
                  if($re->num_rows == 0){
                      echo '<h3>文章不存在或是已经删除</h3>';
                  }
//                  echo '234';
                  $row = mysqli_fetch_assoc($re);
                  ?>
                <div class='content'>
                    <div id="arid" arid="<?php echo $row['id']; ?>"><?php echo $row['title']; ?></div>

                    <div>
                        <span>作者:<?php echo $row['nickname']; ?></span>
                        <span><?php echo date('Y-m-d H:i:s',$row['time']); ?></span>
                    </div>

                    <div>
                        <p>
                           <?php echo $row['content']; ?>
                        </p>  
                    </div>
                    <div id="pinglun" style="display: none;">
                        <p style="margin-top: 60px;">欢迎评论</p>
                        <textarea id="neirong" style="width: 600px;height: 200px;" placeholder="请输入300字以内的评论"></textarea>
                        <button id="but">提交评论</button>
                    </div>
                    <div id="yuanshi">
                        <ul>
                            <li>
                                <div>
                                    <p>评论内容</p>
                                    <span>作者：</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>时间：</span>
                                </div>
                            </li>
                            <li>
                                <div>
                                    <p>评论内容</p>
                                    <span>作者：</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>时间：</span>
                                </div>
                            </li>
                            <li>
                                <div>
                                    <p>评论内容</p>
                                    <span>作者：</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>时间：</span>
                                </div>
                            </li>
                        </ul>
                        <button id="pjiazai">加载更多...</button>
                        <span style="display: none;" id="dibu">我已经是底部了</span>
                    </div>
                </div>
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
            <script src="js/jquery.min.js" type="text/javascript"></script>
            <script src="js/login.js" type="text/javascript"></script>
            <script src="js/enroll.js" type="text/javascript"></script>
            <?php
            include_once 'di.php';
            ?>