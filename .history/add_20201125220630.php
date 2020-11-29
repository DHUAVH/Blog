<?php
   session_start();
    include("conn.php");     
    include("navigation.html");

    if(!empty($_POST['sub'])) {  
        $username = $_SESSION['user'];
        $title = $_POST['title'];  //获取title表单内容
        $con = $_POST['con'];      //获取content表单内容 
        
        $sql="INSERT INTO user(username,id, title, date, content) VALUES ('$username',null,'$title',now(),'$con')";
        $query=mysqli_query($link, $sql);  
        
         if($query){
            echo "<script>alert('博文创建成功！');location.href='index.php'</script>";
         } else {
             //插入失败则显示插入函数的错误描述
            printf("Error: %s\n", mysqli_error($link));
         }		
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <style>
        #edit{
            background-image: url('images\editBg.png');
        }
    </style>
</head>

<body>
    <!--博文填写表单-->
    <div class="container">
        <div style="width: 740px; margin:0 auto" id='edit'>
            <form role="form" action="add.php" method="POST" >   
                <b>博文标题:</b><br>
                <textarea rows="1" cols="100" name="title"></textarea><br><br>
                <b>博文内容:</b><br>
                <textarea rows="10" cols="100" name="con"></textarea><br><br>	   
                <div style="float: right;"><input type="submit" name="sub" value="发表"></div>
            </form>
        </div>
    </div>
</body>
</html>
	
