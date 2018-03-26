

            <div class='my'>
                <h3>最新文章</h3>

                <ul class='update'>
                   <?php
                   $sql = 'SELECT * from article_list ORDER BY time desc LIMIT 4;';
                   $re = mysqli_query($link, $sql);
                   while ($row = mysqli_fetch_assoc($re)){
                   ?>
                    <a href="details.php?wzid=<?php echo $row['id']; ?>"><li><?php echo $row['title']; ?></li></a>
                
                <?php
                }
                ?>
                  </ul>
            </div>
        </div>
    </div>
</div>
<script src="js/jquery.min.js" type="text/javascript"></script>
<script src="js/login.js" type="text/javascript"></script>
<script src="js/enroll.js" type="text/javascript"></script>
</div>
</body>
</html>
