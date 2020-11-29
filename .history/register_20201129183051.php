<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="CSS\blog.css"> 
    <link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://cdn.staticfile.org/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdn.staticfile.org/popper.js/1.15.0/umd/popper.min.js"></script>
    <script src="https://cdn.staticfile.org/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <title>注册界面</title>
</head>
<body class="background">
    <div class="container">
        <h1 class="text-center">注册</h1>
        <div class="row">
            <div class="col-sm-4 offset-sm-4">
                <form action="registerAction.php" method="POST">
                    <div class="text-center">
                        <input class="_input" type="text" name="username" placeholder="请输入用户名" required>
                    </div>

                    <div class="text-center">
                        <input class="_input" type="password" name="password" placeholder="请输入密码" required>
                    </div>

                    <div class="text-center">
                        <input class="_input" type="password" name="re_password" placeholder="请再次输入密码"  required>
                    </div>

                    <div class="text-center">
                        <input class="_input" type="email" name="email" placeholder="请输入邮箱"  required>
                    </div>

                    <div class="text-center">
                        <input class="_input" type="text" name="phone" placeholder="请输入手机号码"  required>
                    </div> 

                    <span colspan="2" class="text-center" style="color:red;font-size:10px;"></span>
                    <?php
                    $err=isset($_GET["err"]) ? $_GET["err"] : "";
                    switch($err){
                        case 1:
                            echo "<div class='alert alert-waring alert-dismissible fade show' role='alert'>";
                            echo "<strong>警告!用户名已存在！</strong>";
                            echo "<button type=button' class='close' data-dismiss='alert' aria-label='Close'>";
                            echo "<span aria-hidden='true'>&times;</span>";
                            echo "</button>";
                        break;

                        case 2:
                            echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>";
                            echo "<strong>错误!密码与重复密码不一致!</strong>";
                            echo "<button type=button' class='close' data-dismiss='alert' aria-label='Close'>";
                            echo "<span aria-hidden='true'>&times;</span>";
                            echo "</button>";
                        break;
                    }
                    ?>

                    <div class="d-flex justify-content-center">
                        <input type="submit" id="register" name="register" value="注册">
                        <input class="reset" type="reset" id="reset" name="reset" value="重置">
                    </div>
                                
                    <div class="text-center">
                        <span colspan="2" >如果已有账号，快去<a href="login.php">登录</a>吧！</span>
                    </div>  
                </form>
            </div>
        </div>
    </div>
</body>
</html>
