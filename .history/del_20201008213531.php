<br><br><br>
<?php    
    include("conn.php"); 	
    include("navigation.html");
    
    if (!empty($_GET['id'])) {        
        $delid = $_GET['id'];  
        //删除blog 	
		$sql="delete from user where id='$delid' ";
        if(mysqli_query($link, $sql)){
            echo "<script>alert('删除成功！');location.href='index.php'</script>";
        } else{
                printf("Error: %s\n", mysqli_error($link));
        } 
    } 
?>