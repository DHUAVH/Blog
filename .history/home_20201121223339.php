<?php
  session_start();
	include("conn.php");
    include("navigation.html");
    
    function getRow($id,$link){
        $query = "SELECT * FROM user where id=$id";

        $result = mysqli_query($link,$query);
        if(!$result){
            echo mysqli_error($link);
        }
        
        return mysqli_fetch_assoc($result);
    }
    
?>

<!DOCTYPE html>
<html>
<head>
  <title>index</title>
<style>
  /* Make the image fully responsive */
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
        <div class="carousel-caption">
            <h3><?php echo getRow(31+rand(0,12))['title']?></h3>
        </div>

        </div>
        <div class="carousel-item">
        <img src="images\2.jpg">
        <div class="carousel-caption">
            <h3><?php echo $row['title']?></h3>
        </div>

        </div>
        <div class="carousel-item">
        <img src="images\3.jpg">
        <div class="carousel-caption">
            <h3><?php echo $row['title']?></h3>
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
