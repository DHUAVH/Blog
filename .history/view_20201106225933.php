<?php
	include("conn.php"); 
	include("navigation.html");
 
	if(!empty($_GET['id'])){
		$id = $_GET['id'];
		$sql = "select * from user where id='$id'";
		$query = mysqli_query($link, $sql);

		if (!$query) {
			printf("Error: %s\n", mysqli_error($link));
			exit();
		   }

		$rs = mysqli_fetch_array($query);
	}
?>

<div class="container">
	<div class="row">
		<div class="col-sm-8 offset-sm-2">
			<form role="form">
				<fieldset>
					<h1><?php echo $rs['title'];?></h1>
					<div class="breadcrumb">
						作者: <?php echo $rs['username'];?> 
						发表时间：<?php echo $rs['date'];?> | 
						<a href="edit.php?id=<?php echo $rs['id'];?>">修改</a>| 
						<a href="del.php?id=<?php echo $rs['id'];?>">删除</a>
					</div>			
					<hr>
					<?php echo $rs['content']?>
				</fieldset>
			</form>
		</div>
	</div>
</div>