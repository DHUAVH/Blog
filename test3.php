<?php
	include("conn.php"); 
 
    if(isset($_SERVER['PATH_INFO'])) {
        //  /输入的id值/输入的title值.shtml 匹配pathinfo值，如果没匹配到则数据不合法，若匹配到做相应处理
            if(preg_match("/^\/(\d+)\/(\d+)(\.shtml)$/", $_SERVER['PATH_INFO'], $pathInfo)) {
                //var_dump($pathInfo);
                $id = $pathInfo[1]; 	// id的值
                $title = $pathInfo[2]; 	// title的值			
                $sql = "select * from user where `id` = ".$id." and `title` = ".$title."";
                try{
                    $result = mysqli_query($link, $sql);
                    if(!$result){
                        printf(mysqli_error($link));
                    }          
                    $rs = mysqli_fetch_array($result);   
                }catch(Exception $e) {
                        echo $e;        
                }
            } else {
            die('url error!');
            }
    }else{
            die('地址有误');
    }
?>

<div style="width:740px;margin:0 auto">
	<form >
		<fieldset>
			<h1><?php echo $rs['title'];?></h1>
			<div>
			   作者: <?php echo $rs['username'];?> 
			   发表时间：<?php echo $rs['date'];?> | 
			</div>			
			<hr>
			<?php echo $rs['content']?>
		</fieldset>
	</form>
</div>