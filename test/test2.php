<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://cdn.staticfile.org/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdn.staticfile.org/popper.js/1.15.0/umd/popper.min.js"></script>
    <script src="https://cdn.staticfile.org/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>

</head>

<body>
    <div class="container">
        <h1 class="text-center">登录</h1>
        <div class="row">                         
                <div class="col-sm-4 offset-sm-4">    <!--使用网格系统和偏移量设置居中-->
                    <form role="form" action="loginAction.php" method="POST">
                        <table class="table table-sm">      <!--设置表格样式-->
                            <tr>
                                <td><label for="ID">账户：</label></td>
                                <td><input id="ID" type="text" name="username" 
                                value="<?php echo isset($_COOKIE['username']) ? $_COOKIE['username'] : "";?>"  placeholder="请输入账户" required></td>
                            </tr>

                            <tr>
                                <td><label for="lastname">密码：</label></td>
                                <td><input type="password" id="lastname" name="password" placeholder="请输入密码" required></td>
                            </tr>

                            <tr>
                                <td>
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="checkbox"><small>记住我</small>
                                     </label>             
                                </td>
                            </tr>

                            <tr>
                                <td colspan="2" class="text-center" style="color:red;font-size:10px;">
                                    <?php
                                        $err = isset($_GET["err"]) ? $_GET["err"] : "";
                                        switch($err){
                                            case 1:
                                                echo "用户名或密码错误！";
                                            break;

                                            case 2:
                                                echo "用户名和密码不能为空！";
                                            break;

                                            case 3:
                                                echo "验证码错误！";
                                            break;
                                        }
                                    ?>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <label for="authcode">验证：</label>                                  
                                </td>

                                <td>
                                    <div>
                                        <img id="captcha" src="captcha.php?r=<?php echo rand();?>" width="100">
                                        <a href="javascript:void(0)" onclick="document.getElementById('captcha').src='captcha.php?r='+Math.random()">换一个</a><br>
                                        <input type="text" name="authcode" value="" required></p>  
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td class="text-center" colspan="2">
                                    <input type="submit" name="login" value="登录">
                                    <input type="reset" name="reset" value="重置">
                                </td>
                            </tr>

                            <tr>
                                <td class="text-center" colspan="2" >还没有账号？快去<a href="register.php">注册</a>吧！</td>
                            </tr>
                        </table> 
                    </form>
                </div>
        </div>     
    </div>   
</body>
</html>