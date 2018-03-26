
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" type="text/css" href="index.css">
        <link href="css/index.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>

        <div id="zhe" style="position: fixed;left: 0;right: 0;top:0;bottom: 0;width:100%;height: 100%;background: rgba(0,0,0,0.5);display: none;z-index: 6;">
            <div id="login" style="margin: 100px auto;background:#F7F7F7;width: 400px;height: 500px;display: none;" >
                <div id="ltop" style="width: 100%;height: 100px;background: #9999ff;font-size: 32px;line-height: 100px;text-align: center;">注&nbsp;&nbsp;&nbsp;册</div>
                <div id="lsh" style="width: 100%;height: 400px;background:#ffffff;" >
                    <table>
                        <tr>
                            <td>用户名：</td>
                            <td><input id="email" type="text" name="name" placeholder="请输入邮箱"/></td>
                        </tr>
                        <tr>
                            <td>密&nbsp;&nbsp;&nbsp;&nbsp;码:</td>
                            <td><input id="pwd" type="password" name="pwd" /></td>
                        </tr>
                        <tr>
                            <td>验证码：</td>
                            <td><input type="text" name="code" id="code"/>
                                <a id="send">发送验证码</a>
                            </td>
                        </tr>
                    </table> 
                    <button style="width: 200px;height: 32px;display: block;margin: 0 auto;background: #66ffff;border: none;" id="add">提交</button>

                    <a id="yiyou" style="display: block;margin-left: 250px;margin-top: 40px;">已有账号，登录</a>
                </div>
            </div>
            <div id="enroll" style="margin: 100px auto;background:#F7F7F7;width: 400px;height: 500px;" >
                <div id="ltop" style="width: 100%;height: 100px;background: #9999ff;font-size: 32px;line-height: 100px;text-align: center;">登&nbsp;&nbsp;&nbsp;录</div>
                <div id="lsh" style="width: 100%;height: 400px;background:#ffffff;" >
                    <table>
                        <tr>
                            <td>用户名：</td>
                            <td><input id="names" type="text" name="name" placeholder="请输入邮箱"/></td>
                        </tr>
                        <tr>
                            <td>密&nbsp;&nbsp;&nbsp;&nbsp;码:</td>
                            <td><input id="pwds" type="password" name="pwd" /></td>
                        </tr>
                        <tr>
                            <td>验证码：</td>
                            <td>
                                <input type="text" name="imgcode" style="width: 60px;" id="codes"/>
                                <img id="imgcode" src="api/imgcode.php" style="width: 100px;height: 32px;vertical-align: bottom;" alt="图像验证码"/>
                            </td>
                        </tr>
                    </table> 
                    <button style="width: 200px;height: 32px;display: block;margin: 0 auto;background: #66ffff;border: none;" id="adds">提交</button>

                    <a id="zhuce" style="display: block;margin-left: 250px;margin-top: 40px;">注册</a>
                </div>
            </div>
            
        </div>

        <div id='app'>


            <div id='head'>
                <div>
                    <a href="/">关于我</a>
                    <a href="/">Home</a>
                    <a id="denglu">登录/注册</a>
                    <a id="huanying" style="display: none;">欢迎您</a>
                </div>
                <div id='headline'></div>
                <div id='logo'></div>
                <nav id='headnav'>
                    <ul>
                        <li><a href="index.php">首页</a></li>
                        <?php
                        $link = mysqli_connect(db_host, db_user, db_pwd, db_lib);
                        $sql = 'SELECT * from class_list';
                        $re = mysqli_query($link, $sql);

                        while ($row = mysqli_fetch_assoc($re)) {
                            ?>
                            <li><a href="list.php?classid=<?php echo $row['id']; ?>"><?php echo $row['classname']; ?></a></li>
                            <?php
                        }
                        ?>
                        <li><a href="list.php">关于我</a></li>
                    </ul>
                </nav>
            </div>
            <script src="js/jquery.min.js" type="text/javascript"></script>
            <script src="js/enroll.js" type="text/javascript"></script>
            <script>
                $("#imgcode").click(function(){
//                    alert('./api/imgcode.php'+Math.random());
                    $("#imgcode").attr('src','./api/imgcode.php?mtp='+Math.random());
                })
            </script>