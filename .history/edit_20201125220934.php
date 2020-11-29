
<?php
    include("conn.php"); 
    include("navigation.html");
 
	if(!empty($_GET['id'])){
		$edit = $_GET['id'];
		$sql = "select * from user where id='$edit'";
		$query = mysqli_query($link, $sql);
		$rs = mysqli_fetch_array($query);
	}
 
    if (!empty($_POST['sub'])) {    
        $title = $_POST['title'];  //获取title表单内容
        $con = $_POST['con'];      //获取content表单内容  
		$hid = $_POST['hid'];
	
        //插入博文信息
		$sql="update user set title='$title', content='$con' where id='$hid'";
        $query=mysqli_query($link, $sql);    
        
         if($query){
            echo "<script>alert('博文修改成功！');location.href='index.php'</script>";
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
            background-image: url('images/editBg.png');
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div id='edit' class="col-sm-8 offset-sm-2">
                <form action="edit.php" method="post">
                    博文标题:<br> 
                    <textarea rows="1" cols="100" name="title"><?php echo $rs['title'];?></textarea>
                    博文内容:<br> 
                    <textarea rows="10" cols="100" name="con" ><?php echo $rs['content'];?></textarea>
                    <div style="float: right;"><input type="submit"  name="sub" value="发表"></div>
                </form>
            </div>
        </div>   
    </div>

</body>
</html>
 
    

