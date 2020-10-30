<!DOCTYPE html>
<html>
<head>
    <title>登录成功</title>
    <meta name="content-type" charset="UTF-8">
</head>
<body> 
    <div> 
        <?php
            // $Id:$ //开启session
            session_start(); //声明变量
            $username = isset($_SESSION['user']) ? $_SESSION['user'] : ""; //判断session是否为空
            
            if (!empty($username)) { 
        ?> 
                <h1>登录成功！</h1> 欢迎您！
                <?php echo $username; ?> 
                <br/> 
                <a href="login.php">退出</a> //跳转至主网页
                <?php
            } else { //未登录，无权访问
                ?>
            <h1>你无权访问！！！</h1> 
            <?php
            } 
            ?> 
    </div>
</body>
</html>
