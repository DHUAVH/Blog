<?php
session_start();
$_SESSION['username'] = $username = isset($_POST['username']) ? $_POST['username'] : "";
$_SESSION['password'] = $password = isset($_POST['password']) ? $_POST['password'] : "";
$_SESSION['re_password'] = $re_password = isset($_POST['re_password']) ? $_POST['re_password'] : "";
$_SESSION['email'] = $email = isset($_POST['email']) ? $_POST['email'] : "";
$_SESSION['phone'] = $phone = isset($_POST['phone']) ? $_POST['phone'] : "";

if($password == $re_password){
    include("conn.php");
    $sql_select = "SELECT username FROM user WHERE username = '$username'"; //执行SQL语句
    $query = mysqli_query($link, $sql_select);
    $row = mysqli_fetch_array($query);

    //判断用户名是否已存在
    if($username == $row['username']){
        header("Location:register.php?err=1"); //用户名已存在，显示提示信息
    } else{
        $sql_insert = "INSERT INTO user(username,password,email,phone) VALUES('$username','$password','$email','$phone')"; 
        mysqli_query($link, $sql_insert);
        header("Location:login.php");
     } 
} else{
    header("Location:register.php?err=2");  
}
?>