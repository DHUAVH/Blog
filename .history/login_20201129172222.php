<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://cdn.staticfile.org/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdn.staticfile.org/popper.js/1.15.0/umd/popper.min.js"></script>
    <script src="https://cdn.staticfile.org/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <title>登陆界面</title>

    <style>
        body{
            background:url(images/bg.jpg);
            background-size:contain;
            background-repeat: no-repeat;
        }
    </style>
</head>

<body>
    <div class="container">
    <h1 class="text-center">登录</h1>
    <div class="row">                         
        <div class="col-sm-4 offset-sm-4">    <!--使用网格系统和偏移量设置居中-->                      
            <form role="form" action="loginAction.php" method="POST"> 
                <div class="text-center">
                    <input id="ID" type="text" name="username" 
                        value="<?php echo isset($_COOKIE['username']) ? $_COOKIE['username'] : "";?>"  placeholder="请输入账户" required>
                </div>
                
                <div class="text-center">
                    <input type="password" id="lastname" name="password" placeholder="请输入密码" required>
                </div>
                                                                                                                      
                <div class="form-check text-center">
                    <label class="form-check-label">
                        <input class="form-check-input" type="checkbox"><small>记住我</small>
                    </label>
                </div>        

                <span colspan="2" class="text-center" style="color:red;font-size:10px;"></span>
                    <?php
                        $err = isset($_GET["err"]) ? $_GET["err"] : "";
                        switch($err){
                            case 1:
                                // 可取消的警告框
                                echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>";
                                echo "<strong>用户名或密码错误!请检查用户名或重新输入密码！</strong>";
                                echo "<button type=button' class='close' data-dismiss='alert' aria-label='Close'>";
                                echo "<span aria-hidden='true'>&times;</span>";
                                echo "</button>";
                            break;

                            case 2:
                                // 可取消的警告框
                                echo "<div class='alert alert-waring alert-dismissible fade show' role='alert'>";
                                echo "<strong>警告!用户名和密码不能为空！</strong>";
                                echo "<button type=button' class='close' data-dismiss='alert' aria-label='Close'>";
                                echo "<span aria-hidden='true'>&times;</span>";
                                echo "</button>";
                            break;

                            case 3:
                                // 可取消的警告框
                                echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>";
                                echo "<strong>验证码错误!请重新输入验证码！</strong>";
                                echo "<button type=button' class='close' data-dismiss='alert' aria-label='Close'>";
                                echo "<span aria-hidden='true'>&times;</span>";
                                echo "</button>";
                            break;
                        }                       
                    ?>

                    <div class="d-flex justify-content-center">
                        <img id="captcha" src="captcha.php?r=<?php echo rand();?>" width="100" class="img-thumbnail">
                        <a href="javascript:void(0)" onclick="document.getElementById('captcha').src='captcha.php?r='+Math.random()">换一个</a>
                    </div>

                    <input type="text" name="authcode" placeholder="请输入验证码" required> 
                                


                            <td class="text-center" colspan="2">
                                <input type="submit" name="login" value="登录">
                                <input type="reset" name="reset" value="重置">


                            <td class="text-center" colspan="2" >还没有账号？快去<a href="register.php">注册</a>吧！</td>
                </form>
                </div>
                
            </div>
        </div>     
    </div>   
</body>
</html>