
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

 <div class="container">
    <form action="edit.php" method="post">
        <div class="card">
            <div class="card-header">
                <textarea rows="1" cols="100" name="title" placeholder="输入博文标题"><?php echo $rs['title'];?></textarea>
            </div>
                
            <div class="card-body">
                <textarea rows="10" cols="100" name="con" placeholder="输入博文内容"><?php echo $rs['content'];?></textarea>
            </div>
        </div>  

        <div style="float: right;"><input type="submit"  name="sub" value="发表"></div>
    </form>  
 </div>

    

