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
    <div class="card">
        <div class="card-head">
            <?php echo $rs['title'];?>
            <!--面包屑导航-->
            <div class="breadcrumb">
				<div class="breadcrumb-item">作者: <?php echo $rs['username'];?></div>
				<div class="breadcrumb-item">发表时间：<?php echo $rs['date'];?></div>               
                <div class="breadcrumb-item">
					<a href="edit.php?id=<?php echo $rs['id'];?>" data-toggle="tooltip" title="修改文章内容">
						<i class="fa fa-pencil"></i>
                    </a>
                </div>
                <div class="breadcrumb-item">
					<a href="del.php?id=<?php echo $rs['id'];?>" data-toggle="tooltip" title="删除此篇文章">
						<i class="fa fa-trash"></i>
                    </a>
                </div>						
			</div>
        </div>

        <div class="card-body">
            
            			
				<?php echo $rs['content']?>
        </div>
					
    </div>
					

</div>
