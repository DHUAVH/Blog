<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://cdn.staticfile.org/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdn.staticfile.org/popper.js/1.15.0/umd/popper.min.js"></script>
    <script src="https://cdn.staticfile.org/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <title>注册界面</title>
</head>
<body>
    <div class="container">
        <h1 class="text-center">注册</h1>
        <div class="row">
            <div class="col-sm-4 offset-sm-4">
                <form action="registerAction.php" method="POST">
                    <table class="table table-sm">
                        <tr>
                            <td>用户名：</td>
                            <td><input type="text" name="username" required></td>
                        </tr>

                        <tr>
                            <td>密   码：</td>
                            <td><input type="password" name="password" required></td> 
                        </tr>

                        <tr>
                            <td>重复密码：</td> 
                            <td><input type="password" name="re_password" required></td>
                        </tr>

                        <tr>
                            <td>Email：</td> <td><input type="email" name="email" required></td>
                        </tr>

                        <tr>
                            <td>电话：</td> <td><input type="text" name="phone" required></td>
                        </tr>
                        
                        <tr>
                            <td colspan="2" class="text-center" style="color:red;font-size:10px;">
                            <?php
                            $err=isset($_GET["err"]) ? $_GET["err"] : "";
                            switch($err){
                                case 1:
                                    echo "<div class='alert alert-waring alert-dismissible fade show' role='alert'>";
                                    echo "<strong>警告!用户名已存在！</strong>";
                                    echo "<button type=button' class='close' data-dismiss='alert' aria-label='Close'>";
                                    echo "<span aria-hidden='true'>&times;</span>";
                                    echo "";
                                break;

                                case 2:
                                    echo "密码与重复密码不一致";
                                break;
                            }
                            ?>
                            </td>
                        </tr>

                        <tr>
                            <td colspan="2" class="text-center">
                                <input type="submit" id="register" name="register" value="注册">
                                <input type="reset" id="reset" name="reset" value="重置">
                            </td>
                        </tr>

                        <tr>
                            <td colspan="2" class="text-center">如果已有账号，快去<a href="login.php">登录</a></td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </div>

</body>
</html>
