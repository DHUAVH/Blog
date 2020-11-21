<?php
  session_start();
	include("conn.php");
    include("navigation.html");
    
    //获取数据库信息的函数
    function getRow($id,$link){
        $query = "SELECT * FROM user where id=$id";

        $result = mysqli_query($link,$query);
        if(!$result){
            echo mysqli_error($link);
        }
        
        return mysqli_fetch_assoc($result);
    }

    // 获取数据库信息的id
    function create_id(){
        $id = array();
        for($i=0;$i<3;$i++){
            $id[$i] = rand(31,43);
        }

        return $id;
    }

    $id = create_id();
?>

<!DOCTYPE html>
<html>
<head>
  <title>index</title>
<style>
  .carousel-inner img {
      width: 100%;
      height: 100%;
  }
  </style>
</head>
<body>
<div id="index" class="carousel slide" data-ride="carousel">
    
    <!-- 指示符 -->
    <ul class="carousel-indicators">
        <li data-target="#index" data-slide-to="0" class="active"></li>
        <li data-target="#index" data-slide-to="1"></li>
        <li data-target="#index" data-slide-to="2"></li>
    </ul>
    
    <!-- 轮播图片 -->
    <div class="carousel-inner">
        <div class="carousel-item active">
        <img src="images\1.jpg">
        <!--图片描述-->
        <div class="carousel-caption">
            <h3 data-toggle="modal" data-target="#artical_1"><?php echo getRow($id[0],$link)['title']?></h3>      <!--随机一篇博客的标题-->
        </div>

          <!-- 模态框 -->
        <div class="modal fade" id="artical_1">
            <div class="modal-dialog">
                <div class="modal-content">
            
                    <!-- 模态框头部 -->
                    <div class="modal-header">
                        <h4 class="modal-title"><?php echo getRow($id[0],$link)['title']?></h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
            
                    <!-- 模态框主体 -->
                    <div class="modal-body">
                        <?php echo getRow($id[0],$link)['content']?>
                    </div>
            
                    <!-- 模态框底部 -->
                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">关闭</button>
                    </div>
            
                </div>
            </div>
        </div>
  

        </div>
        <div class="carousel-item">
        <img src="images\2.jpg">
        <!--图片描述-->
        <div class="carousel-caption">
            <h3 data-toggle="modal" data-target="#artical_2"><?php echo getRow($id[1],$link)['title']?></h3>      <!--随机一篇博客的标题-->
        </div>

        </div>
        <div class="carousel-item">
        <img src="images\3.jpg">
        <!--图片描述-->
        <div class="carousel-caption">
            <h3 data-toggle="modal" data-target="#artical_3"><?php echo getRow($id[2],$link)['title']?></h3>      <!--随机一篇博客的标题-->
        </div>
        </div>
    </div>
    
    <!-- 左右切换按钮 -->
    <a class="carousel-control-prev" href="#index" data-slide="prev">
        <span class="carousel-control-prev-icon"></span>
    </a>
    <a class="carousel-control-next" href="#index" data-slide="next">
        <span class="carousel-control-next-icon"></span>
    </a>
    
    </div>
</div>
    

</body>
</html>
