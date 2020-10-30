<?php
    session_start();
    $username=isset($_POST['username']) ? $_POST['username'] : "";
    $password=isset($_POST['password']) ? $_POST['password'] : "";
    $remember=isset($_POST['remember']) ? $_POST['remember'] : "";
    $captcha=isset($_REQUEST['authcode']) ? $_POST['authcode'] : "";

    //判断用户名和密码是否为空
    if(!empty($username) && !empty($password)){
        include("conn.php");

        $sql="select username,password from user where username='$username' and password='$password'";
        $query=mysqli_query($link,$sql);
        $row=mysqli_fetch_array($query);  
        
        //判断用户名和密码是否正确
        if($username == $row['username'] && $password == $row['password']){
            //判断验证码是否正确
            if(strtolower($captcha) == $_SESSION['authcode']){
                //创建session
                $_SESSION['user'] = $username; 
                
                if($remember == "on"){
                    //创建cookie,用户信息7天后过期
                    setcookie("username", $username, time() + 7 * 24 * 3600);
    
                    //写入日志
                    $ip = $_SERVER['REMOTE_ADDR'];
                    $date = date('Y-m-d H:m:s');
                    $info = sprintf("当前访问用户：%s,IP地址：%s,时间：%s /n", $username, $ip, $date);
                    $sql_logs = "INSERT INTO logs(username,ip,date) VALUES('$username','$ip','$date')";
                    //日志写入文件，如实现此功能，需要创建文件目录logs
                    $f = fopen('./logs/' . date('Ymd') . '.log', 'a+');
                    fwrite($f, $info);
                    fclose($f); 
                }
                
                //跳转到index.php页面
                header("Location:index.php");
            }else{
                //验证码错误，err赋值为3
                header("Location:login.php?err=3");
            }

        } else{
                //用户名或密码错误，err赋值为1
                header("Location:login.php?err=1");
            }

        } else{
            //用户名或密码为空，err赋值为2
            header("Location:login.php?err=2");
        }
?>